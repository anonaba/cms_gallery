<?php 

class User {
	static private $db;

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;


	static public function set_database($database) {
     self::$db = $database;
	}
	
	// static public function find_this_query($sql) {return self::$db->query($sql);}

	static public function find_this_query($sql) {
		$resutl_set = self::$db->query($sql);
		$the_object_array = [];

		while($row = mysqli_fetch_array($resutl_set)) {
			$the_object_array[] = self::instantiation($row);
		}

		// while($row = mysqli_fetch_array($resutl_set)) {
		// 	$the_object_array[] = $row;
		// }

		mysqli_free_result($resutl_set);

		return $the_object_array;
	}

	static public function instantiation($the_record) {
		$the_object = new self;

		// $the_object->id = $found_user['id'];
		// $the_object->username = $found_user['username'];
		// $the_object->password = $found_user['password'];
		// $the_object->first_name = $found_user['first_name'];
		// $the_object->last_name = $found_user['last_name'];

		foreach ($the_record as $key_prop => $value) {
			if($the_object->has_properties($key_prop)) {
				$the_object->$key_prop = $value;
			}
		}

		return $the_object;
	}

	private function has_properties($properties) {
		$object_prop = get_object_vars($this);
		return array_key_exists($properties, $object_prop); 
	}



	static public function find_all_users() {
		return self::find_this_query('SELECT * FROM users');
	}

	static public function find_all_user_by_id($id) {

		$sql = 'SELECT * FROM users ';
		$sql .= 'WHERE id = '.self::$db->escape_string($id);
		$sql .= ' LIMIT 1';

		$the_result_array =  self::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

		// return self::find_this_query($sql);

		// $result = self::find_this_query($sql);
		// $result_set = $result->fetch_assoc();
		// return $result_set;	

	}
}