<?php

class TwoFactorAuth {
    // Minimal TOTP implementation (no external deps)

    private function base32Decode($b32) {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $b32 = strtoupper($b32);
        $l = strlen($b32);
        $buffer = 0;
        $bitsLeft = 0;
        $out = '';
        for ($i = 0; $i < $l; $i++) {
            $val = strpos($alphabet, $b32[$i]);
            if ($val === false) continue;
            $buffer = ($buffer << 5) | $val;
            $bitsLeft += 5;
            if ($bitsLeft >= 8) {
                $bitsLeft -= 8;
                $out .= chr(($buffer >> $bitsLeft) & 0xFF);
            }
        }
        return $out;
    }

    private function base32Encode($data) {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        $bits = 0;
        $value = 0;
        $output = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $value = ($value << 8) | ord($data[$i]);
            $bits += 8;
            while ($bits >= 5) {
                $bits -= 5;
                $output .= $alphabet[($value >> $bits) & 0x1F];
            }
        }
        if ($bits > 0) {
            $output .= $alphabet[($value << (5 - $bits)) & 0x1F];
        }
        while (strlen($output) % 8 != 0) $output .= '=';
        return $output;
    }

    public function createSecret($length = 16){
        $random = random_bytes($length);
        return rtrim($this->base32Encode($random), '=');
    }

    public function getQRCodeUrl($label, $issuer, $secret){
        $otpauth = "otpauth://totp/" . rawurlencode($issuer) . ":" . rawurlencode($label) . "?secret=" . $secret . "&issuer=" . rawurlencode($issuer) . "&algorithm=SHA1&digits=6&period=30";
        $google = "https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=" . rawurlencode($otpauth);

        // Try to fetch the QR image server-side and return as data URI to avoid client-side blocking
        $img = false;
        if (function_exists('file_get_contents') && ini_get('allow_url_fopen')) {
            $img = @file_get_contents($google);
        }

        if ($img === false && function_exists('curl_version')) {
            $ch = curl_init($google);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // set a browser-like user agent to avoid some blocking
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; TwoFactorAuth/1.0)');
            $img = curl_exec($ch);
            curl_close($ch);
        }

        // Verify the fetched content is an image
        if ($img !== false) {
            $info = @getimagesizefromstring($img);
            if ($info !== false && !empty($info['mime'])) {
                return 'data:' . $info['mime'] . ';base64,' . base64_encode($img);
            }
            // if fetched content wasn't an image, discard and fallback to URL
            $img = false;
        }

        // Fallback: return the Google Chart URL (may still work in browser)
        return $google;
    }

    // Return the raw otpauth:// URI so clients can generate QR locally if needed
    public function getOtpAuthUrl($label, $issuer, $secret){
        return "otpauth://totp/" . rawurlencode($issuer) . ":" . rawurlencode($label) . "?secret=" . $secret . "&issuer=" . rawurlencode($issuer) . "&algorithm=SHA1&digits=6&period=30";
    }

    private function hotp($secret, $counter, $digits = 6){
        $secretKey = $this->base32Decode($secret);
        $counterBytes = pack('N*', 0) . pack('N*', $counter);
        $hash = hash_hmac('sha1', $counterBytes, $secretKey, true);
        $offset = ord($hash[19]) & 0xf;
        $code = (ord($hash[$offset]) & 0x7f) << 24 |
                (ord($hash[$offset + 1]) & 0xff) << 16 |
                (ord($hash[$offset + 2]) & 0xff) << 8 |
                (ord($hash[$offset + 3]) & 0xff);
        $mod = pow(10, $digits);
        return str_pad($code % $mod, $digits, '0', STR_PAD_LEFT);
    }

    public function getCode($secret, $timeSlice = null){
        if ($timeSlice === null) $timeSlice = floor(time() / 30);
        return $this->hotp($secret, $timeSlice);
    }

    public function verifyCode($secret, $code, $discrepancy = 1){
        $code = trim($code);
        for ($i = -$discrepancy; $i <= $discrepancy; $i++){
            $calc = $this->getCode($secret, floor(time() / 30) + $i);
            if (hash_equals($calc, $code)) return true;
        }
        return false;
    }
}
