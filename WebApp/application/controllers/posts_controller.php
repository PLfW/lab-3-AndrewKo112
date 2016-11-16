<?php
class Posts_Controller extends Controller {
	
	function add_post () {
		$this->params["post"]["account_id"] = $_SESSION["user"]["id"];
		$res = Post::insert($this->params["post"]);
		if ($res) {
			$last_id = Model::executeQuery("SELECT MAX(id) FROM post")[0]["max"];
			$inserted = Post::find(Post::where("id=".$last_id)->take_one()["id"]);
			echo json_encode(array('status'=>'success', 'post' => Post::to_html($inserted, true)));
		} else {
			echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
		}
	}

	function remove_post () {
		if (Post::delete($this->params["id"])) {
			echo json_encode(array('status'=>'success'));
		} else {
			echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
		}
	}
}
