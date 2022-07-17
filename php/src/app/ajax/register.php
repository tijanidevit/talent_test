<?php 

session_start();
include_once '../core/core.function.php';
include_once '../core/users.class.php';

echo add_user();
function add_user(){
	try {
		$user_obj = new Users();

		if (!$_POST['email'] || $_POST['email']=="") {
			return  displayWarning('Email is required and cannot be empty');
		}


		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];
		$quantity = $_POST['quantity'];
		$role = $_POST['role'];
		$phone = $_POST['phone'];
		$password = md5($_POST['password']);



		if ($user_obj->check_email_existence($email)) {
			return  displayWarning('This email already exists in our database');
		}

		if ($user_obj->check_phone_existence($phone)) {
			return  displayWarning('Phone number already exists in our database');
		}

		$image = 'https://maize-micro.herokuapp.com/uploads/'.upload_file($_FILES['image'], '../uploads/');
		// $image = 'http://localhost:8888/maize/uploads/'.upload_file($_FILES['image'], '../uploads/');

		if ($user_obj->create($fullname,$email,$phone,$image,$role,$location,$quantity,$password)){
			if ($role == 0) {
				return displaySuccess('Account Created Successfully! You will be redirected to the buyers page');
			}
			return displaySuccess('Account Created Successfully! You will be redirected to the farmers/sellers page');
		}
		else{
			return displayError('Unable to add');
		}
	} catch (Exception $ex) {
		return displayError($ex->getMessage());
	}
}
?>