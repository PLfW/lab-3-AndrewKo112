<?php
class Rating_Controller extends Controller {
	
	function add_rating () {
		$this->params["rating"]["account_id"] = $_SESSION["user"]["id"];
		$res = Rating::insert($this->params["rating"]);
		if ($res) {
			$last_id = Model::executeQuery("SELECT MAX(id) FROM rating")[0]["max"];
			$inserted = Rating::find(Rating::where("id=".$last_id)->take_one()["id"]);
			echo json_encode(array('status'=>'success', 'rating' => Rating::to_html($inserted, true)));
		} else {
			echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
		}
	}

	function remove_rating () {
		if (Rating::delete($this->params["id"])) {
			echo json_encode(array('status'=>'success'));
		} else {
			echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
		}
	}
}
