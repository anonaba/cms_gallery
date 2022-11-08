<?php 

class User {
	static private $db;

	static protected $table_name = "users";
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

	public function properties(){
		return get_object_vars($this); //returns an array of properties of this user class
	}

	// verify the user when login
	static public function verify_user($user,$pass) {
		
		$username = self::$db->escape_string($user);
		$password = self::$db->escape_string($pass);

		$sql = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE username = '${username}' ";
		$sql .= "AND password = '${password}' LIMIT 1";

		$the_result_array =  self::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

	static public function find_all_users() {
		return self::find_this_query('SELECT * FROM users');
	}

	static public function find_user_by_id($id) {

		$sql = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE id = ".self::$db->escape_string($id);
		$sql .= " LIMIT 1";

		$the_result_array =  self::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

		// return self::find_this_query($sql);

		// $result = self::find_this_query($sql);
		// $result_set = $result->fetch_assoc();
		// return $result_set;	

	}

	// update if id is set, create if id is not set
	public function save() {
		return isset($this->id) ?  $this->update() : $this->create();
	}

	public function create() {
		$properties = $this->properties();

		$username 	= self::$db->escape_string($this->username);
		$password 	= self::$db->escape_string($this->password);
		$first_name = self::$db->escape_string($this->first_name);
		$last_name 	= self::$db->escape_string($this->last_name);

		// $sql = "INSERT INTO ".self::$table_name." (`username`, `password`, `first_name`, `last_name`) ";
		// $sql .= "VALUES ('${username}', '${password}','${first_name}','${last_name}') ";

		$comma_separated = implode("`,`",array_keys($this->properties()));
        $comma_separated_backtick_qoute = "`".$comma_separated."`";

        $comma_separated_val = implode("','",array_values($this->properties()));
        

		$sql = "INSERT INTO ".self::$table_name." (${comma_separated_backtick_qoute}) ";
		$sql .= "VALUES ('${comma_separated_val}') ";
		

		if(self::$db->query($sql)) {
			$this->id = self::$db->the_insert_id(); // probably optional
			return true;
		} else {
			return false;
		}	
		// return $sql;
	
	}

	public function update() {
		$id 		= self::$db->escape_string($this->id);
		$username 	= self::$db->escape_string($this->username);
		$password 	= self::$db->escape_string($this->password);
		$first_name = self::$db->escape_string($this->first_name);
		$last_name 	= self::$db->escape_string($this->last_name);

		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= "username = '${username}', password = '${password}', first_name = '${first_name}', last_name =  '${last_name}' ";
		$sql .= "WHERE id = ${id}";

		self::$db->query($sql);

		return (mysqli_affected_rows(self::$db->conn) === 1) ? true : false;

		// return $sql;
	
	}

	public function delete() {
		$id = self::$db->escape_string($this->id);

		$sql = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE id = ${id} LIMIT 1";

		self::$db->query($sql);

		return (mysqli_affected_rows(self::$db->conn) === 1) ? true : false;
	}
}