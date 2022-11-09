<?php 

class User extends DB_Object{
	
	static protected $db_table_name = "users";
	static protected $db_col_name = ['username','password','first_name', 'last_name'];
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;


	protected function properties(){

		$properties = [];

		foreach(self::$db_col_name as $prop) {
			if(property_exists($this, $prop)) {
				$properties[$prop] = $this->$prop;			
			} 			
		}

		return $properties;
	}

	protected function clean_properties(){

		$clean_properties = [];

		foreach($this->properties() as $key => $value) {
			$clean_properties[$key] = self::$db->escape_string($value);
		}

		return $clean_properties;
	}



	// verify the user when login
	static public function verify_user($user,$pass) {
		
		$username = self::$db->escape_string($user);
		$password = self::$db->escape_string($pass);

		$sql = "SELECT * FROM ".self::$db_table_name;
		$sql .= " WHERE username = '${username}' ";
		$sql .= "AND password = '${password}' LIMIT 1";

		$the_result_array =  self::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

	// update if id is set, create if id is not set
	public function save() {
		return isset($this->id) ?  $this->update() : $this->create();
	}

	public function create() {

		$comma_separated = implode("`,`",array_keys($this->properties()));
        $comma_separated_backtick_qoute = "`".$comma_separated."`";

        $comma_separated_val = implode("','",array_values($this->clean_properties()));        
        // $comma_separated_val = self::$db->escape_string($value);

		$sql = "INSERT INTO ".self::$db_table_name." (${comma_separated_backtick_qoute}) ";
		$sql .= "VALUES ('${comma_separated_val}') ";		

		if(self::$db->query($sql)) {
			$this->id = self::$db->the_insert_id(); // probably optional
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		$id = self::$db->escape_string($this->id);
		
		$properties = $this->clean_properties();

		$properties_pairs = [];

		foreach($properties as $key => $value) {
			$properties_pairs[] = "${key} = '${value}'";
		}

		$sql = "UPDATE ".self::$db_table_name." SET ";
		$sql .= implode(', ', $properties_pairs);
		$sql .= " WHERE id = ${id}";

		self::$db->query($sql);

		return (mysqli_affected_rows(self::$db->conn) === 1) ? true : false;
	}

	public function delete() {
		$id = self::$db->escape_string($this->id);

		$sql = "DELETE FROM ".self::$db_table_name;
		$sql .= " WHERE id = ${id} LIMIT 1";

		self::$db->query($sql);

		return (mysqli_affected_rows(self::$db->conn) === 1) ? true : false;
	}
}