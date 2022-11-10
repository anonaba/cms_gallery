<?php 

class Photo extends DB_Object {

	static protected $db_table_name = "photos";
	static protected $db_col_name = ['title','description', 'filename', 'type', 'size'];
	public $photo_id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $size;

	public $tmp_path;
	public $upload_dir = "images";
	public $custom_err = [];
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
	
}