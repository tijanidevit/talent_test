<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$users_obj = new Users();
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);


			if (! $users_obj->check_username($username)) {
				return displayWarning('Username not found!');
			}
			if ($users_obj->login($username,$password)) {
				$session->create_session('elect_users','users');
				return 1;
			}
			else{
				return displayWarning('Invalid Password.');
			}
		}
	}
?>