<?php

if(isset($_POST['pokeName']) && preg_replace('/[^a-z]/i', '', $_POST['pokeName']) != "" && strlen($_POST['pokeName'] <= 11)){
	$name = filter_input(INPUT_POST, 'pokeName', FILTER_SANITIZE_STRING);
}
else{
	$name = null;
}
if(isset($_POST['genNum']) && $_POST['genNum'] != "" && is_numeric($_POST['genNum']) && preg_match('/([1-7])/', $_POST['genNum']) && strlen($_POST['genNum'] == 1)){
	$gen = filter_input(INPUT_POST, 'genNum', FILTER_SANITIZE_NUMBER_INT);
}
else{
	$gen = null;
}
if(isset($_POST['pokeType']) && $_POST['pokeType'] != "" && preg_replace('/[^a-z]/i', '', $_POST['pokeType']) != ""){
	$type = $_POST['pokeType'];
	$type = filter_input(INPUT_POST, 'pokeType', FILTER_SANITIZE_STRING);
	if(!check_type_match($type)){
		$type = null;
	}
}
else{
	$type = null;
}


?>