<?php 

class User extends DB_Object{
	
	static protected $db_table_name = "users";
	static protected $db_col_name = ['username','password','first_name', 'last_name', 'user_image'];
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_image;

	public $tmp_path;
	public $upload_dir = "images";
	public $image_placeholder = "https://via.placeholder.com/300.png/09f/fff";

	public $errors = [];
	private $upload_err_succ_array = [
		UPLOAD_ERR_OK => "Image was succesfully uploaded",
		UPLOAD_ERR_INI_SIZE => "The uploaded filex execeeds the upload_max_filesize directive",
		UPLOAD_ERR_FORM_SIZE => "The uploaded filex execeeds the max_file_size directive",
		UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",		
		UPLOAD_ERR_NO_FILE => "No file was uploaded",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
		UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
		UPLOAD_ERR_EXTENSION => "A PHP extention stopped the file upload."
	];


	public function user_profile_pic() {
		// if the user does not upload profile image put a placeholder instead
		return empty($this->user_image) ? $this->image_placeholder : $this->upload_dir."/".$this->user_image;
	}

	public function set_file($file) {

		if(empty($file) || !$file || !is_array($file)) {
			$this->errors[] = "There was no fle uploaded here";
			return false;
		} elseif ($file['error'] !== 0) {
			$this->errors[] = $this->upload_err_succ_array[$file['error']];
			return false;
		} else {
			$this->user_image = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
		}		
	}

	public function save_profile_pic_and_data() {
			//check to see of errors array has value and if there are return false
			if(!empty($this->errors)) {
				return false;
			}

			if(empty($this->user_image) || empty($this->tmp_path)) {
				$this->errors[] = "The file was not available";
				return false;
			}

			$target_path = SITE_ROOT."/admin/".$this->upload_dir."/".$this->user_image;

			if(file_exists($target_path)) {
				$this->errors[] = "The file ${$this->user_image} already exists";
				return false;
			}

			if(move_uploaded_file($this->tmp_path, $target_path)) {
				if($this->id) {
					$this->update();
				} else {
					if($this->create()) {
						unset($this->tmp_path); // unset the varialbe cause is not need in any more after the proccess
						return true;
					}
				}
			
			} else {
				$this->erros[] = "The file directory probably does not have permission";
				return false;
			}

		
	}

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