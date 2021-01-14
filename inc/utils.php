<?php

function redirect($url, $q=[], ) {
	$url = add_q($url, $q);
	
	header("Location: $url");
	
}

function add_q($url, $q){
	if (!empty($q)) {
		$url .= "?";
		foreach ($q as $name => $value) {
			$url .= "$name=$value";
		}
	}
	return $url;
}

function sanitize($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function prettyDump($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}


