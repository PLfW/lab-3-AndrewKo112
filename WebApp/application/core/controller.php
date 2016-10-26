<?php
class Controller {
	
	public $view;
	public $params;

	function __construct() {
		echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
		$parts = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
		parse_str($parts, $this->params);
		$this->view = new View();
	}
	
	function action_index() {}
}
?>