<?php
function upload_file($file,$path)
{
	$file_name = rand(1000,9999).'-'.$file['name'];
	$file_name = str_replace(' ', '-', $file_name);
	$file_tmp = $file['tmp_name'];

	move_uploaded_file($file_tmp, $path.$file_name);
	return $file_name;
}

function upload_two_files($file,$path){
	$files_d = [];
	for ($i=0; $i < count($file['name']) ; $i++) { 
		$file_name = rand(1000,9999).'-'.$file['name'][$i];
		$file_name = str_replace(' ', '-', $file_name);

		$file_tmp = $file['tmp_name'][$i];
		move_uploaded_file($file_tmp, $path.$file_name);
		array_push($files_d, $file_name);
		if ($i == 1) {
			return $files_d;
		}
	}
	return $files_d;
}

function format_date($date){
	return date('F d, Y h:mA', strtotime($date));
}
function redirect($link){
	header("location:".$link);
}
function displayError($message)
{
	return '<div class="alert alert-danger">' . $message . '</div>';
}

function displayWarning($message)
{
	return '<div class="alert alert-warning">' . $message . '</div>';
}

function displaySuccess($message)
{
	return '<div class="alert alert-success">' . $message . '</div>';
}

function set_flash($title,$message)
{
	$_SESSION[$title] = $message;
}

function display_flash($title)
{
	if (isset($_SESSION[$title])) {
		echo $_SESSION[$title];
		unset($_SESSION[$title]);
	}
}


function getMonth($v){
	if ($v == 1) {
		echo 'January';
	}
	if ($v == 2) {
		echo 'February';
	}
	if ($v == 3) {
		echo 'March';
	}
	if ($v == 4) {
		echo 'April';
	}
	if ($v == 5) {
		echo 'May';
	}
	if ($v == 6) {
		echo 'June';
	}
	if ($v == 7) {
		echo 'July';
	}
	if ($v == 8) {
		echo 'August';
	}
	if ($v == 9) {
		echo 'September';
	}
	if ($v == 10) {
		echo 'October';
	}
	if ($v == 11) {
		echo 'November';
	}
	if ($v == 12) {
		echo 'December';
	}
}


?>