<?php
	function cleanInput($input)
	{
		$search = array
		(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);
		$output = preg_replace($search, '', $input);
		return $output;
	}
	function sanitize($input)
	{
		if (is_array($input))
		{
			foreach($input as $var=>$val)
			{
				$output[$var] = sanitize($val);
			}
		}
		else
		{
			if (get_magic_quotes_gpc())
			{
				$input = stripslashes($input);
			}
			$input  = cleanInput($input);
			$output = $input;
		}
		return $output;
	}
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