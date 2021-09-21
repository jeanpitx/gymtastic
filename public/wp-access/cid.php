<?php
//VERIFICACION INGRESO ////////////////////////////////////////////////////////////////////////**********************
if($_SERVER['REMOTE_ADDR']!=="185.224.137.198" && $_SERVER['REMOTE_ADDR']!=="200.93.194.66"){
    header('Content-Type: application/json');
    echo json_encode(array(array(
        'error'=>'Acceso no autorizado - '.$_SERVER['REMOTE_ADDR'],
    	'identity'=>null,
    	'name'=>null,
    	'genre'=>null,
    	'dob'=>null,
    	'nationality'=>null,
    	'residence'=>null,
    	'streets'=>null,
    	'homenumber'=>null,
    	'fingerprint'=>null,
    	'civilstate'=>null
    	)));
    	exit(0);
}
if(!isset($_REQUEST['ci'])) {
    header('Content-Type: application/json');
    echo json_encode(array(array(
        'error'=>'Es requerido un dato',
    	'identity'=>null,
    	'name'=>null,
    	'genre'=>null,
    	'dob'=>null,
    	'nationality'=>null,
    	'residence'=>null,
    	'streets'=>null,
    	'homenumber'=>null,
    	'fingerprint'=>null,
    	'civilstate'=>null
    	)));
    	exit(0);
}

//VARIABLES ////////////////////////////////////////////////////////////////////////**********************
global $nombrecookie; 
$nombrecookie=generarcookie(10);
include 'imagenes/variables.php';


//CONSULTAMOS RUC ////////////////////////////////////////////////////////////////////////**********************
if(strlen($_REQUEST['ci'])==13){ //http://173.212.220.238:8082/api/sri?ruc=1311573586001
    $alfanumerico=generaralfanumerico(10);
	$jsoncaptcha = getUrl('https://srienlinea.sri.gob.ec/sri-captcha-servicio-internet/captcha/start/5?r='.$alfanumerico);
	$captchas = json_decode($jsoncaptcha, true);
	$captchaname = html_entity_decode($captchas['imageName']);
	$captchaid = $captchas['imageFieldName'];
	$captchas=$captchas['values'];
	$imagenlocal=md5( file_get_contents($imagenes[$captchaname]) );


	for ($i=0;$i<5;$i++) {
		$imagenserver = md5( getUrl('https://srienlinea.sri.gob.ec/sri-captcha-servicio-internet/captcha/image/'.$i.'?r='.$alfanumerico) ); //recorre las 5 imagenes generadas por el captcha
		if($imagenserver==$imagenlocal){
			$captcharesult=$captchas[$i];
			break;
		} 
	}
	
	$jsonautenticacion = getUrl("https://srienlinea.sri.gob.ec/sri-captcha-servicio-internet/rest/ValidacionCaptcha/validarCaptcha/" .$captcharesult . "?emitirToken=true");
	$arr_autenticacion = json_decode($jsonautenticacion, true);
	$autenticacion = utf8_encode($arr_autenticacion['mensaje']);
    
	$json_string1= getUrl('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/ConsolidadoContribuyente/obtenerPorNumerosRuc?&ruc='.$_REQUEST['ci'],null, null,null, $autenticacion);
	$json_string2= getUrl('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/Establecimiento/consultarPorNumeroRuc?numeroRuc='.$_REQUEST['ci'],null, null,null, $autenticacion);


	if(strlen($json_string1)>0){
		$json_string1=json_decode($json_string1,true);
		$json_string2=json_decode($json_string2,true);
	}else{
		header('Content-Type: application/json');
	    echo json_encode(array(false,
	    	1=>array(
		    	'numeroRuc'=>null,
		    	'razonSocial'=>null,
		    	'nombreComercial'=>null,
		    	'estadoPersonaNatural'=>null,
		    	'estadoSociedad'=>null,
		    	'claseContribuyente'=>null,
		    	'obligado'=>null,
		    	'actividadContribuyente'=>null,
		    	'informacionFechasContribuyente'=>null,
		    	'representanteLegal'=>null,
		    	'agenteRepresentante'=>null,
		    	'personaSociedad'=>null,
		    	'subtipoContribuyente'=>null,
		    	'motivoCancelacion'=>null,
		    	'motivoSuspension'=>null,
	    	),
	    	2=>array(
		    	'nombreFantasiaComercial'=>null,
		    	'tipoEstablecimiento'=>null,
		    	'direccionCompleta'=>null,
		    	'estado'=>null,
		    	'numeroEstablecimiento'=>null,
	    	)
	    ));
	    eliminarcookiefile();
    	exit(0);
	}


	$jsonfull = array_merge(array(true) ,$json_string1, $json_string2);

	header('Content-Type: application/json');
	echo json_encode($jsonfull);
	eliminarcookiefile();
	exit(0);

}else if(strlen($_REQUEST['ci'])==10) { ////////////////CONSULTAMOS CEDULA

	//GET DATOS ministeriodegobierno certificado////////////////////////////////////////////////////////////////////////**********************
	$loginFields = array('tipo' => 'getDataWsRc', 'ci' => $_REQUEST['ci'],'tp' => 'C','ise' => 'SI'); 
	$json_string= getUrl('http://certificados.ministeriodegobierno.gob.ec/gestorcertificados/antecedentes/data.php', 'post', $loginFields,5);

	

	if(strlen($json_string)>0 && strpos($json_string, '"identity":"'.$_REQUEST['ci'].'"') !== false){
		//en caso de error devuelve la cedula consultada ya que el servicio devuelve vacio el campo
		$json_string=str_replace( '"identity":""', '"identity":"'.$_REQUEST['ci'].'"',$json_string);
		header('Content-Type: application/json');
		echo $json_string;
		eliminarcookiefile();
		exit(0);
	}
	
	echo strpos($json_string, '"identity":"'.$_REQUEST['ci'].'"');
	exit(0);

	//GET DATOS ministeriodegobierno reclutamiento ////////////////////////////////////////////////////////////////////////**********************
	$loginFields = array('prc' => 'gCit', 'ci' => $_REQUEST['ci']); 
	$json_string= getUrl('https://reclutamiento.ministeriodegobierno.gob.ec/reclutamiento3/fend/get_data.php', 'post', $loginFields,5);
	

	if(strlen($json_string)>0 && strpos($json_string, 'identity') === true){
		//en caso de error devuelve la cedula consultada
		$json_string=str_replace( '"identity":""', '"identity":"'.$_REQUEST['ci'].'"',$json_string);
		header('Content-Type: application/json');
		echo $json_string;
		eliminarcookiefile();
		exit(0);
	}

	//GET DATOS ANT ////////////////////////////////////////////////////////////////////////**********************
	$loginFields = array('ps_tipo_identificacion' => 'CED', 'ps_identificacion' => $_REQUEST['ci']); 
	$remote_page_content= getUrl('https://sistemaunico.ant.gob.ec:5038/PortalWEB/paginas/clientes/clp_json_consulta_persona.jsp?ps_tipo_identificacion=CED&ps_identificacion='.$_REQUEST['ci'],'post',$loginFields,5);
	
	if(substr_count($remote_page_content,'<td colspan="1" class="titulo1">')!=0) {
		$posini=strpos($remote_page_content, '<td colspan="1" class="titulo1">') + strlen('<td colspan="1" class="titulo1">');
		$posfin=strpos($remote_page_content, '&nbsp;', $posini);
		$datos = substr($remote_page_content, $posini, ($posfin - $posini));

		header('Content-Type: application/json');
		echo json_encode(array_map('encode_all_strings',array(array(
		    'error'=>null,
			'identity'=>$_REQUEST['ci'],
			'name'=>$datos,
			'genre'=>null,
			'dob'=>null,
			'nationality'=>null,
			'residence'=>null,
			'streets'=>null,
			'homenumber'=>null,
			'fingerprint'=>null,
			'civilstate'=>null
			))));
		eliminarcookiefile();
	    exit(0);
	}



	//GET DATOS COMISION DE TRANSITO CTE ////////////////////////////////////////////////////////////////////////**********************
	$loginUrl='http://servicios.comisiontransito.gob.ec/app_citaciones_consulta/consulta_citaciones.php?p_identificacion='.$_REQUEST['ci'].'&p_tipo=1';
	$remote_page_content= getUrl($loginUrl);

	$posini=strpos($remote_page_content, '<div class="alert alert-success" role="alert">'.$_REQUEST['ci'].' - ') + strlen('<div class="alert alert-success" role="alert">'.$_REQUEST['ci'].' - ');
	$posfin=strpos($remote_page_content, '</div>', $posini);
	$get_result = substr($remote_page_content, $posini, ($posfin - $posini));

	if(strlen($get_result)>1) {
		header('Content-Type: application/json');
		echo json_encode(array_map('encode_all_strings',array(array(
		    'error'=>null,
			'identity'=>$_REQUEST['ci'],
			'name'=>$get_result,
			'genre'=>null,
			'dob'=>null,
			'nationality'=>null,
			'residence'=>null,
			'streets'=>null,
			'homenumber'=>null,
			'fingerprint'=>null,
			'civilstate'=>null
			))));
		eliminarcookiefile();
	    	exit(0);
	}else{
		header('Content-Type: application/json');
		echo json_encode(array_map('encode_all_strings',array(array(
		    'error'=>'error: cedula no se pudo consultar o no existe',
			'identity'=>$_REQUEST['ci'],
			'name'=>null,
			'genre'=>null,
			'dob'=>null,
			'nationality'=>null,
			'residence'=>null,
			'streets'=>null,
			'homenumber'=>null,
			'fingerprint'=>null,
			'civilstate'=>null
			))));
		eliminarcookiefile();
	    	exit(0);
	}

}else{
	//GENERACIÓN DE ERROR NO EXISTE ////////////////////////////////////////////////////////////////////////**********************
	header('Content-Type: application/json');
	echo json_encode(array(array(
	    'error'=>"error: numero de caracteres de cedula o ruc erroneo",
		'identity'=>$_REQUEST['ci'],
		'name'=>null,
		'genre'=>null,
		'dob'=>null,
		'nationality'=>null,
		'residence'=>null,
		'streets'=>null,
		'homenumber'=>null,
		'fingerprint'=>null,
		'civilstate'=>null
		)));
	eliminarcookiefile();
	exit(0);
}

eliminarcookiefile();
//Simple funcion para acceder
function getUrl($url, $method='', $vars='', $time=2, $Authorization = '') 
{
	$fields = (is_array($vars)) ? http_build_query($vars) : $vars;
    $ch = curl_init();
    if ($method == 'post') 
    {
        curl_setopt ($ch, CURLOPT_POST, 1); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $fields);
        //curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    }
    
    if (!empty($Authorization)) 
	{
		//$arr_header = array('Authorization: ' . $Authorization, 'Content-Type: application/json');
		$arr_header;
		$arr_header[0] = 'Authorization: ' . $Authorization;
		$arr_header[1] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arr_header);
	}

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); //1
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $GLOBALS['nombrecookie']);
    curl_setopt ($ch, CURLOPT_COOKIEFILE, $GLOBALS['nombrecookie']);
    curl_setopt ($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt ($ch, CURLOPT_TIMEOUT, $time);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $time);
    curl_setopt ($ch, CURLOPT_FAILONERROR, false);//tenia true  si es mayor a 400 pero no debe fallar
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt ($ch,CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	$response  = curl_exec($ch);
	

    curl_close ($ch);
    return $response; 
}

//genera archivo con nombre aleatorio de longitud caracteres
function generarcookie($longitud) {
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	$max = strlen($pattern)-1;
	for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
	$key=$key.'.txt';
	$archivo = fopen(dirname(__FILE__).'/ckie/'.$key,'a'); // se crea y se cierra
	fclose($archivo);
	return dirname(__FILE__).'/ckie/'.$key;
}

//eliminamos el archivo creado
function eliminarcookiefile(){
	unlink($GLOBALS['nombrecookie']);
}

function generaralfanumerico($longitud) {
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	$max = strlen($pattern)-1;
	for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
	return $key;
}

function encode_all_strings($arr) {
    foreach($arr as $key => $value) {
        $arr[$key] = utf8_encode($value);
    }
    return $arr;
}

?>
