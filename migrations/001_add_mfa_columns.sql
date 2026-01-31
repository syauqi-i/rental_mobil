-- Migration: add MFA columns to tbl_akun
ALTER TABLE `tbl_akun`
  ADD COLUMN `mfa_enabled` tinyint(1) NOT NULL DEFAULT 0 AFTER `foto`,
  ADD COLUMN `mfa_secret` varchar(255) DEFAULT NULL AFTER `mfa_enabled`,
  ADD COLUMN `mfa_recovery` text DEFAULT NULL AFTER `mfa_secret`,
  ADD COLUMN `mfa_type` varchar(20) DEFAULT NULL AFTER `mfa_recovery`;
