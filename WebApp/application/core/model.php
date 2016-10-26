<?php

class Model {
	protected static $table_name = "";

	const DBHOST = 'localhost';
	const DBPORT = '5432';
	const DBNAME = 'SportsInstitutions';
	const DBUSER = 'postgres';
	const DBPASSWORD = 'postgres';

	public static function connect () {
		$connection = pg_pconnect("host=".Model::DBHOST." port=".Model::DBPORT." dbname=".Model::DBNAME." user=".Model::DBUSER." password=".Model::DBPASSWORD);
		if (!$connection) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $connection;
	}

	public static function executeQuery ($query) {
		$connection = Model::connect();
		$result = pg_query($connection, $query);
		$result_arr = array();
		while ($row = pg_fetch_assoc ($result)) {
			array_push($result_arr, $row);
		}
		pg_close($connection);
		return $result_arr;
	} 

	public static function find ($id) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE id=".$id." LIMIT 1";
		return executeQuery($sql);
	}

	public static function where ($query_str) {
		$query = new Query(static::$table_name);
		$query->where($query_str);
		return $query;
	}

	public static function exists ($query_str) {
		$query = new Query(static::$table_name);
		$result = $query->where($query_str)->limit(1)->take();
		return (count($result) > 0);
	}

	public static function insert (array $data) {
		$connection = Model::connect();
		if ($data["contact_phone"][0] != '+') {
			$data["contact_phone"] .= '+';
		}
		return pg_insert($connection, static::$table_name, $data);
	}
}
?>