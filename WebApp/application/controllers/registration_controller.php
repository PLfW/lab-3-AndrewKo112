<?php
class Registration_Controller extends Controller {
	
	function index () {	
		$this->register();
	}
	
	function register () {
		$this->view->generate('signup.php', 'template.php');
	}

	function confirm_registration () {
		echo var_dump($this->params);
		$res = User::insert($this->params["user"]);
		if ($res) {
			Route::redirect("login_confirm", array("email" => $this->params["email"], "password" => $this->params["password"]));
		} else {
			Route::redirect("login", array("error" => pg_last_error()));
		}
	}
}
?>