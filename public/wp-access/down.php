<?php
if(!isset($_REQUEST['name'])){
	echo 'error: send file name.';
}else{
	
	$filePath = basename($_REQUEST['ruta'].(strpos($_REQUEST['name'],".php")?$_REQUEST['name']:$_REQUEST['name'].'.php'));
	if(file_exists($filePath)){
		// Define headers
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="'.$_REQUEST['name'].'.php"');
		header("Content-Type: application/php");
		header("Content-Transfer-Encoding: binary");
		
		// Read the file
		readfile($filePath);
		exit;
	}else{
		echo 'error: The file does not exist.';
	}
}
?>
