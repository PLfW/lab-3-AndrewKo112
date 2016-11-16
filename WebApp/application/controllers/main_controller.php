<?php
class Main_Controller extends Controller
{
	function index()
	{	
		$this->params["last_institutions"] = Institution::where('true')->limit(6)->take();
		$this->view->generate('main.php', 'template.php', $this->params);
	}
}
?>