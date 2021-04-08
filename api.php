<?php
header("Content-Type:application/json");
require_once("Caculator.php");


if(!empty($_GET['action']))
{   
    $action = $_GET['action'];
    // $width = $_GET['width'];
    // $height = $_GET['height'];
    // $amount = $_GET['amount'];
    // $decan_type = $_GET['decan_type'];
    // $print_type = $_GET['print_type'];
    // $membrane_type = $_GET['membrane_type'];
   // echo $action;
	if($action == 'get-price'){
        response(200,"get price done",get_price());
    }
	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}

function get_price(){
    $cal = new Caculator();
    return $cal->calculator_price($width, $height, $amount, $print_type, $decan_type); 
}

?>