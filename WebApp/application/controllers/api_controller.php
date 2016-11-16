<?php
class API_Controller extends Controller {
	
	function user_data () {
		if (array_key_exists('id', $this->params)) {
			$user = User::find($this->params["id"]);
		} else if (array_key_exists('email', $this->params)) {
			$user = User::where("email='".$this->params["email"]."'").take_one();
		}
		if ($user) {
			unset($user["password"]);
			unset($user["updated_at"]);

			header('Content-type: application/json');
			echo json_encode($user, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		} else {
			echo json_encode("");
		}
	}

	function find_users () {
		if (array_key_exists('name', $this->params)) {
			$name = mb_strtolower ($this->params["name"]);
			$exploded = explode(' ', $name);
			if (count($exploded) > 1) {
				$query = User::where("LOWER(first_name) LIKE '%".$exploded[0]."%'");
				$query->where("LOWER(last_name) LIKE '%".$exploded[1]."%'");
			} else {
				$query = User::where("LOWER(first_name) LIKE '%".$exploded[0]."%' OR LOWER(last_name) LIKE '%".$exploded[0]."%'");
			}
			$result = $query->take();
		}

		if ($result) {
			header('Content-type: application/json');
			echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		} else {
			echo json_encode("");
		}
	}

	function institution_data () {
		if (array_key_exists('id', $this->params)) {
			$institution = Institution::find($this->params["id"]);
		}

		if (isset($institution)) {
			header('Content-type: application/json');
			echo json_encode($institution, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		} else {
			echo json_encode("");
		}
	}

	function find_institutions () {
		if (array_key_exists('name', $this->params)) {
			$name = mb_strtolower ($this->params["name"]);
			$exploded = explode(' ', $name);
			$query = Institution::where("LOWER(name) LIKE '%".$name."%'");
			$result = $query->take();
		}

		if ($result) {
			header('Content-type: application/json');
			echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		} else {
			echo json_encode("");
		}
	}

	function login () {
		$user = User::where("email='".$this->params["email"]."' AND password='".$this->params["password"]."'")->take_one();
		if ($user) {
			$_SESSION["email"] = $this->params["email"];
			$_SESSION["password"] = $this->params["password"];
			echo json_encode(array('status' => 'success'), JSON_PRETTY_PRINT);
		} else {
			echo json_encode(array('status' => 'fail'), JSON_PRETTY_PRINT);
		}
	}

	function logout () {
		$_SESSION["user"] = null;
		$_SESSION["email"] = null;
		$_SESSION["password"] = null;
		echo json_encode("you have been logged out");
	}

	function signup () {
		if (array_key_exists('user', $this->params)) {
			$result = User::insert($this->params["user"]);
			if ($result) {
				echo json_encode(array('status' => 'success'), JSON_PRETTY_PRINT);
			} else {
				echo json_encode(array('status' => 'fail'), JSON_PRETTY_PRINT);
			}
		} else {
			echo json_encode(array('status' => 'fail', 'error' => 'user parameter was not specified'));
		}
	}

	function new_institution () {
		if (array_key_exists('institution', $this->params)) {
			$result = User::insert($this->params["institution"]);
			if ($result) {
				echo json_encode(array('status' => 'success'), JSON_PRETTY_PRINT);
			} else {
				echo json_encode(array('status' => 'fail'), JSON_PRETTY_PRINT);
			}
		} else {
			echo json_encode(array('status' => 'fail', 'error' => 'institution parameter was not specified'));
		}
	}

	function update_user () {
		if (array_key_exists('id', $this->params)) {
			$user = User::find($this->params["id"]);
		}
		$curr_user = $_SESSION["user"];
		if (isset($user) && isset($curr_user) && ($curr_user["permissions"] == "admin" || $user["id"] == $curr_user["id"])) {
			$result = User::update($this->params["values"], array('id' => $this->params["id"]));
			if ($result) {
				echo json_encode(array('status' => 'success'), JSON_PRETTY_PRINT);
			} else {
				echo json_encode(array('status' => 'fail'), JSON_PRETTY_PRINT);
			}
		}
	}

	function update_institution () {
		if (array_key_exists('id', $this->params)) {
			$institution = Institution::find($this->params["id"]);
		}
		$user = $_SESSION["user"];
		if (isset($institution) && isset($user) && ($user["permissions"] == "admin" || $user["id"] == $institution["user_id"])) {
			$result = Institution::update($this->params["values"], array('id' => $this->params["id"]));
			if ($result) {
				echo json_encode(array('status' => 'success'), JSON_PRETTY_PRINT);
			} else {
				echo json_encode(array('status' => 'fail'), JSON_PRETTY_PRINT);
			}
		}
	}
}
?>
