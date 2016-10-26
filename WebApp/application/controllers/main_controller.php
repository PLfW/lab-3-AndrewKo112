<?php
class Main_Controller extends Controller
{
	function index()
	{	
		$this->view->generate('main.php', 'template.php', $this->params);
	}
}
?>