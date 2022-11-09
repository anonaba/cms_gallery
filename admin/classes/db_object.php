<?php


class DB_Object {
	static protected $db;

	static protected $db_table_name = "";

	static public function set_database($database) {
     	static::$db = $database;
	}

	static public function find_all() {
		return static::find_this_query("SELECT * FROM ". static::$db_table_name);
	}

	static public function find_by_id($id) {

		$sql = "SELECT * FROM ".static::$db_table_name;
		$sql .= " WHERE id = ".static::$db->escape_string($id);
		$sql .= " LIMIT 1";

		$the_result_array =  static::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

		

	}

	static public function find_this_query($sql) {
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
}