<?php 

class User extends DB_Object{
	
	static protected $db_table_name = "users";
	static protected $db_col_name = ['username','password','first_name', 'last_name'];
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	// verify the user when login
	static public function verify_user($user,$pass) {
		
		$username = self::$db->escape_string($user);
		$password = self::$db->escape_string($pass);

		$sql = "SELECT * FROM ".self::$db_table_name;
		$sql .= " WHERE username = '${username}' ";
		$sql .= "AND password = '${password}' LIMIT 1";

		$the_result_array =  self::find_by_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}
	
}