<?php
class Institutions_Controller extends Controller {
	
	function index () {	
		$this->institution();
	}

	function institution () {
		if (!array_key_exists("id", $this->params)) {
			$this->to404();
		}

		try {
			$institution = @Institution::find($this->params["id"]);
			if (!$institution)
				throw new Exception("Невірне ID", 1);
				
			$this->params["institution"] = $institution;
			$this->view->generate('institution.php', 'template.php', $this->params);
		} catch (Exception $e) {
			$this->to404();
		}
	}
	
	function new_institution () {
		$this->view->generate('new_institution.php', 'template.php');
	}

	function edit () {
		$this->params["edit"] = true;
		$this->params["institution"] = Institution::find($this->params["id"]);

		$this->view->generate('new_institution.php', 'template.php', $this->params);
	}

	function search () {
		$this->params["query"] = mb_strtolower($this->params["query"]);
		$result = Institution::where("LOWER(name) LIKE '%".$this->params["query"]."%'")->take();
		if ($result) {
			$res ='';
			foreach ($result as $key => $value) {
				$res .= Institution::to_html($value);
			}
			echo json_encode(array('status'=>'success', 'result'=>$res));
		} else {
			echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
		}
	}

	function delete () {
		$id = $this->params["id"];
		$institution = Institution::find($id);
		if ($id == $institution["account_id"] || $_SESSION["user"]["permissions"] == 'admin') {
			Institution::delete($id);
		}
		Route::redirect("user?id=".$_SESSION["user"]["id"]);
	}

	function add_institution () {
		if (array_key_exists("id", $this->params)) {
			$res = Institution::update($this->params["institution"], array("id"=>$this->params["id"]));
			if ($res) {
				echo json_encode(array('status'=>'success', 'redirect_to'=>'institution?id='.$this->params["id"]));
			} else {
				echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
			}
		} else if (!Institution::exists("name='".$this->params["institution"]["name"]."' AND city='".$this->params["institution"]["city"]."' AND address='".$this->params["institution"]["address"]."'")) {
			$this->params["institution"]["account_id"] = $_SESSION["user"]["id"];
			$res = Institution::insert($this->params["institution"]);
			if ($res) {
				echo json_encode(array('status'=>'success', 'redirect_to'=>'user?id='.$_SESSION["user"]["id"]));
			} else {
				echo json_encode(array('status'=>'error', 'error'=>pg_last_error()));
			}
		} else {
			echo json_encode(array('status'=>'error', 'error'=>'Такий заклад вже існує'));
		}
	}
}
?>
