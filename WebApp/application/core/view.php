<?php
class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	function generate($content_view, $template_view = null, $params = null)
	{
		/*
		if(is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		if ($template_view) {
			include 'application/views/'.$template_view;
		} else {
			include 'application/views/'.$content_view;
		}
	}
}
?>