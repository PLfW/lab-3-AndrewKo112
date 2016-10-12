<?php
class Controller_Login extends Controller
{
	
	function login()
	{	
		$this->view->generate('login_view.php', 'template_view.php');
	}

	function index()
	{	
		$this->login();
	}
	

	function confirm_login() {
		echo "lol kek";
	}
}
?>