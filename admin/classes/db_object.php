<?php


class DB_Object {
	static protected $db;

	static protected $db_table_name = "";

	static public function set_database($database) {
     	static::$db = $database;
	}

	static public function find_all() {
		return static::find_by_query("SELECT * FROM ". static::$db_table_name);
	}

	static public function find_by_id($id) {

		$sql = "SELECT * FROM ".static::$db_table_name;
		$sql .= " WHERE id = ".static::$db->escape_string($id);
		$sql .= " LIMIT 1";

		$the_result_array =  static::find_by_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;	

	}

	static public function find_by_query($sql) {
		$resutl_set = static::$db->query($sql);
		$the_object_array = [];

		while($row = mysqli_fetch_array($resutl_set)) {
			$the_object_array[] = static::instantiation($row);
		}		

		mysqli_free_result($resutl_set);

		return $the_object_array;
	}

	static public function instantiation($the_record) {
		$calling_class = get_called_class(); // it will return the name of the class you extended it to
		$the_object = new $calling_class;
		// $the_object = new static; //pwede

		foreach ($the_record as $key_prop => $value) {
			if($the_object->has_properties($key_prop)) {
				$the_object->$key_prop = $value;
			}
		}

		return $the_object;
	}

	protected function has_properties($properties) {
		$object_prop = get_object_vars($this);
		return array_key_exists($properties, $object_prop); 
	}

	protected function properties(){

		$properties = [];

		foreach(static::$db_col_name as $prop) {
			if(property_exists($this, $prop)) {
				$properties[$prop] = $this->$prop;			
			} 			
		}

		return $properties;
	}

	protected function clean_properties(){

		$clean_properties = [];

		foreach($this->properties() as $key => $value) {
			$clean_properties[$key] = static::$db->escape_string($value);
		}

		return $clean_properties;
	}

	// update if id is set, create if id is not set
	public function save() {
		return isset($this->id) ?  $this->update() : $this->create();
	}

	public function create() {

		$comma_separated = implode("`,`",array_keys($this->properties()));
        $comma_separated_backtick_qoute = "`".$comma_separated."`";

        $comma_separated_val = implode("','",array_values($this->clean_properties()));        
        // $comma_separated_val = static::$db->escape_string($value);

		$sql = "INSERT INTO ".static::$db_table_name." (${comma_separated_backtick_qoute}) ";
		$sql .= "VALUES ('${comma_separated_val}') ";		

		if(static::$db->query($sql)) {
			$this->id = static::$db->the_insert_id(); // probably optional
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		$id = static::$db->escape_string($this->id);
		
		$properties = $this->clean_properties();

		$properties_pairs = [];

		foreach($properties as $key => $value) {
			$properties_pairs[] = "${key} = '${value}'";
		}

		$sql = "UPDATE ".static::$db_table_name." SET ";
		$sql .= implode(', ', $properties_pairs);
		$sql .= " WHERE id = ${id}";

		static::$db->query($sql);

		return (mysqli_affected_rows(static::$db->conn) === 1) ? true : false;
	}

	public function delete() {
		$id = static::$db->escape_string($this->id);

		$sql = "DELETE FROM ".static::$db_table_name;
		$sql .= " WHERE id = ${id} LIMIT 1";

		static::$db->query($sql);

		return (mysqli_affected_rows(static::$db->conn) === 1) ? true : false;
	}
}