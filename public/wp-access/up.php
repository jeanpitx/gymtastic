<?php
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
	if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
		// get details of the uploaded file
		$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
		$fileName = $_FILES['uploadedFile']['name'];
		$fileSize = $_FILES['uploadedFile']['size'];
		$fileType = $_FILES['uploadedFile']['type'];
		$fileNameCmps = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));

		//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
		$newFileName = 'cid.' . $fileExtension;

		$allowedfileExtensions = array('php');
		if (in_array($fileExtension, $allowedfileExtensions)) {
			// directory in which the uploaded file will be moved
			$uploadFileDir = './';
			$dest_path = $uploadFileDir . $newFileName;

			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $message ='File is successfully uploaded.';
			}
			else
			{
			  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
			}
			echo $message;
		}
	}
}
?>