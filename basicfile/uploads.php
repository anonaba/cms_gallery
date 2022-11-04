<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$upload_error_and_sucess_message = [
		UPLOAD_ERR_OK => "Image was succesfully uploaded",
		UPLOAD_ERR_INI_SIZE => "The uploaded filex execeeds the upload_max_filesize directive",
		UPLOAD_ERR_FORM_SIZE => "The uploaded filex execeeds the max_file_size directive",
		UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",		
		UPLOAD_ERR_NO_FILE => "No file was uploaded",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
		UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
		UPLOAD_ERR_EXTENSION => "A PHP extention stopped the file upload."
	];

	$tmp_location = $_FILES['file_upload']['tmp_name'];
	$the_file = $_FILES['file_upload']['name'];
	$dir = "uploads";

	// move_uploaded_file(string:from, string:to)
	// move_uploaded_file($tmp_location, $dir."/".$the_file);
	if(move_uploaded_file($tmp_location, $dir."/".$the_file)) {
		$error_number = $_FILES['file_upload']['error'];
		$the_message = $upload_error_and_sucess_message[$error_number];
	} else {
		$error_number = $_FILES['file_upload']['error'];
		$the_message = $upload_error_and_sucess_message[$error_number];
	}

	// $image = $_FILES['file_upload'] ?? null;

 //    if (!is_dir('uploads')) {
 //        mkdir('uploads');
 //    }

 //    if ($image && $image['tmp_name']) {
 //        move_uploaded_file($image['tmp_name'], "uploads/".$image['name']);
 //    }

	

	// $error_number = $_FILES['file_upload']['error'];
	// $the_message = $upload_error_and_sucess_message[$error_number];
	
	// var_dump($_FILES['file_upload']);
	// echo $tmp_location;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		if(!empty($upload_error_and_sucess_message)) {
			echo $the_message;
		}
	?>
	<form action="uploads.php" enctype="multipart/form-data" method="post">
		<input type="file" name="file_upload">
		<button type="submit">Submit</button>
	</form>
	
</body>
</html>