<?php
	function encrypt($string)
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'w89sdfbsdinf9nq23nf9nf9wnfw9en';
		$secret_iv = 'c0shsd9fhShfa9fna9enadaWf';
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}
?>