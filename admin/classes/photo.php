<?php 

class Photo extends DB_Object {

	static protected $db_table_name = "photos";
	static protected $db_col_name = ['title','caption','description','filename','alternate_text','type','size'];
	public $id;
	public $title;
	public $description;
	public $caption;
	public $filename;
	public $alternate_text;
	public $type;
	public $size;

	public $tmp_path;
	public $upload_dir = "images";
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

	//this is passing $_FILES['uploaded_file'] as an argument
	public function set_file($file) {

		if(empty($file) || !$file || !is_array($file)) {
			$this->errors[] = "There was no fle uploaded here";
			return false;
		} elseif ($file['error'] !== 0) {
			$this->errors[] = $this->upload_err_succ_array[$file['error']];
			return false;
		} else {
			$this->filename = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
		}		
	}

	public function picture_path() {
		return $this->upload_dir."/".$this->filename;
	}

	public function save() {
		if($this->id) {
			$this->update();
		} else {
			//check to see of errors array has value and if there are return false
			if(!empty($this->errors)) {
				return false;
			}

			if(empty($this->filename || empty($this->tmp_path))) {
				$this->errors[] = "The file was not available";
				return false;
			}

			$target_path = SITE_ROOT."/admin/".$this->upload_dir."/".$this->filename;

			if(file_exists($target_path)) {
				$this->errors[] = "The file ${$this->filename} already exists";
				return false;
			}

			if(move_uploaded_file($this->tmp_path, $target_path)) {
				if($this->create()) {
					unset($this->tmp_path); // unset the varialbe cause is not need in any more after the proccess
					return true;
				}
			} else {
				$this->erros[] = "The file directory probably does not have permission";
				return false;
			}

		}
	}
	//delete the actual image in the system directory "images"
	public function delete_photo()	{
		if($this->delete()) {
			$target_path = SITE_ROOT."/admin/".$this->picture_path();
			return unlink($target_path) ? true : false;
		} else {
			return false;
		}
	}
	
}