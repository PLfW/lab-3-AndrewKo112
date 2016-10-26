<?php
class User extends Model
{
	protected static $table_name = "account";

	public function get_current_user() {
		return User::where("email='".$_SESSION["email"]."' AND password='".$_SESSION["password"]."'")->take_one();
	}
}
?>