<?php 
$argsout = array(
	"backgroundheader" => array(
		"backgroundColor" => "aqua"
	)
);
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  
echo json_encode($argsout);
die();
?>