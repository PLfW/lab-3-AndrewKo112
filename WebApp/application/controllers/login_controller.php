<?php
class Login_Controller extends Controller {
	
	function login() {
		$this->view->generate('login.php', 'template.php');
	}

	function index() {
		$this->login();
	}
	
	function confirm_login() {
		$user = User::where("email='".$this->params["email"]."' AND password='".$this->params["password"]."'")->take_one();
		if ($user) {
			$_SESSION["email"] = $this->params["email"];
			$_SESSION["password"] = $this->params["password"];
			Route::redirect("/");
		} else {
			Route::redirect("/login");
		}
	}

	function logout () {
		$_SESSION["user"] = null;
		$_SESSION["email"] = null;
		$_SESSION["password"] = null;
		Route::redirect("login");
	}
}