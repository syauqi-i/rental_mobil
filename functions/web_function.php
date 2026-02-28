<?php 

function partial($file, $data = null){
	require_once V_PATH . DS . '_partials' . DS . $file . '.php';
}