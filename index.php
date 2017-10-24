<?php
// POS receipe writer
// version: v1.0
// october 2017.
// support: support@olsa.me

// Configuration:
// write allowed domain or IP address
header('Access-Control-Allow-Origin: http://192.168.174.128:8000');    
header('Cache-Control: no-cache');

// development mode?
$development = false;

// metalinker inputfile
$in_path = 'C:\\In\\';
// metalinker output file
$out_path = 'C:\\Out\\';

$user_id = 1;
$end_of_sale_mark = "";
$end_of_pay_mark = "";
$footer_1 = "";
$footer_2 = "HVALA NA POSJETI!";
// end configuration

// check if we have a POST request
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}
 
// Receive the RAW post data and decode from JSON
$input = json_decode(file_get_contents("php://input"));
 
// Check if there are items in receipe and processing
if(isset($input->items) && !empty($input->items)){
	
	// prepare empty variable to store receipe details
	$csv = '';

	// parse items one by one and fill $csv variable
	foreach($input->items as $item){
		$csv .= implode(',',
				array(
					$item->item_code,                 // art_id
					get_tax_id($item->item_tax_rate), // tax_id
					$item->item_name,                 // art_desc
					$item->rate,                      // sale_price
					$item->qty,                       // sale_qty
					$item->discount_percentage,       // disc_perc
					)
				);
		$csv .= "\n";
	}

	// write last part of receipe in $csv variable
	$csv .= 'END_OF_SALE' . ',,' . $end_of_sale_mark . "\n";
    $pay_mode = strtoupper($input->payments[0]->mode_of_payment);	
	$csv .= 'PAY_' . $pay_mode . ',,' . $pay_mode . ',' . $input->paid_amount . "\n";
	$csv .= 'END_OF_PAY' . ',,' . $end_of_pay_mark . "\n";
	$csv .= 'USER_ID'. ',,' . $user_id . "\n";//$input->user_id
	$csv .= 'USER_NAME'. ',,' . $input->owner . "\n";
	$csv .= 'FOOTER_1'. ',,' . $footer_1 . "\n";
	$csv .= 'FOOTER_2'. ',,' . $footer_2 . "\n";
	
	// file paths
	$tmp_path = dirname(__FILE__).'/';
    $in_path = $development ? $tmp_path : $in_path;
    $out_path = $development ? $tmp_path : $out_path;

	// write csv file	
	$csv_handler = fopen ($in_path . get_filename(get_max($out_path)), 'w');
	fwrite ($csv_handler, $csv);
	fclose ($csv_handler);

	// response to request
	header("Content-Type: application/json; charset=utf-8");
	echo json_encode(array('status' => 'OK'));

	// important!
	exit();
}

// return tax id
function get_tax_id( $rates ){
	
	$id = '0';
	// defined taxes ID's by country law
	$taxes_id = array(
			'17%' => '0',
			'0%'  => '1',
			'7%'  => '2',
			'19%' => '3'
		         );	
  
	$item_rates = json_decode($rates, true); 		
	if(!empty($item_rates)){		
		$first_tax_value = array_values($item_rates)[0];		
	    $id = isset($taxes_id[($first_tax_value.'%')]) ? $taxes_id[($first_tax_value.'%')] : '0';		
	}
	return $id;
}

// return max number filename
function get_max($out_path){	
	
	$files = new FilesystemIterator($out_path);
	$max[] = 0;
	if(count($files)){
		foreach($files as $fileinfo){
			if(preg_match('#(\d+)#', $fileinfo->getFilename(), $matches)){
				$max[] = $matches[1];
			}			
		}
	}	
	return ((int)max($max));
}

// return four digit filename
function get_filename($max){
	$out = '1';
	if( $max < 9999 ){
		$out = (string) $max + 1;
	}
    $out = str_pad( $out, 4, "0", STR_PAD_LEFT );	
    return 'ABC_'.$out.'.csv';	
}
