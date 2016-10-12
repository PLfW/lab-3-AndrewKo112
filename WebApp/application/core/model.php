<?php
class Model
{
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

	public static function find ($id) {
		$connection = Model::connect();
		$sql = "SELECT * FROM ".static::$table_name." WHERE id=".$id." LIMIT 1";
		$result = pg_query($connection, $sql);
		$result_arr = array();
		while ($row = pg_fetch_assoc ($result)) {
			array_push($result_arr, $row);
		}
		$result_arr = $result_arr[0];
		pg_close($connection);
		return $result_arr;
	}

}
?>