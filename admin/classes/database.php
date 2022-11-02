<?php 

class Database {
	protected $conn;


    public function __construct() {
        $this->conn = new mysqli(DB_SERVER,DB_USER,DB_PASS, DB_NAME);      
        $this->confirm_db_connection($this->conn);
    }

    private function confirm_db_connection($database) {
        if($database->connect_errno) {
            $msg = "Database failed to connect so badly: ";
            $msg .= $database->connect_error;
            $msg .= " (" .$database->connect_errno . ")";
            exit($msg);
        }
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result) {
        if(!$result) {
            exit('Query Failed');
        }
    }

    public function escape_string($string) {
        return $this->conn->escape_string($string);
    }
}