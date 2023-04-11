<?php
/**
 * Created by PhpStorm.
 * User: ntv
 * Date: 11/11/2021
 * Time: 15:05
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*$data_forex = curl_get('https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx');
$xml = simplexml_load_string($data_forex, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$curentcyfrom = $array['Exrate'][19]['@attributes']['CurrencyCode'];
$buy = $array['Exrate'][19]['@attributes']['Buy'];
$transfer = $array['Exrate'][19]['@attributes']['Transfer'];
$sell = $array['Exrate'][19]['@attributes']['Sell'];

$floatval_sell = floatval(str_replace(',','',$sell));

$sell_after = $floatval_sell + $floatval_sell * 0.025;
$sell_after = number_format($sell_after,0,'.',',');

$response = 'Vietcombank: USD -> VND: Tỷ giá gốc :'.$sell. ' / Tỷ giá nhân 2.5%: '.$sell_after;

echo $response;exit;*/

$data = file_get_contents('php://input');//file_get_contents('https://api.telegram.org/bot2065843826:AAHtCj4oUalFk_zKUDIK8o4bca6MgjQ8NGY/getUpdates');

//file_put_contents('tbotlog.txt',$data);

$data = json_decode($data);
$command = $data->message->text;
$chat_id = $data->message->chat->id;

$response = '';

if($command == '/tygia' || $command == '/forex'){
    $data_forex = curl_get('https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx');
    if(!empty($data_forex)){
        file_put_contents('vcb_extrade_log.txt',$data_forex);
    }else{
        $data_forex = file_get_contents('vcb_extrade_log.txt');
    }
    $xml = simplexml_load_string($data_forex, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    $curentcyfrom = $array['Exrate'][19]['@attributes']['CurrencyCode'];
    $buy = $array['Exrate'][19]['@attributes']['Buy'];
    $transfer = $array['Exrate'][19]['@attributes']['Transfer'];
    $sell = $array['Exrate'][19]['@attributes']['Sell'];

    $floatval_sell = floatval(str_replace(',','',$sell));

    $sell_after = $floatval_sell + $floatval_sell * 0.025;
    $sell_after = number_format($sell_after,0,'.',',');

    $response = 'Vietcombank: USD -> VND: Tỷ giá gốc :'.$sell. ' / Tỷ giá nhân 2.5%: '.$sell_after;

    curl_get('https://api.telegram.org/bot2065843826:AAHtCj4oUalFk_zKUDIK8o4bca6MgjQ8NGY/sendMessage?chat_id='.$chat_id.'&text='.$response);
}elseif($command == '/leetran'){
    $response = 'https://drive.google.com/file/d/19kRkRfJJFU7oY3qT_PSxlITlPmwfJ22P/view';
    curl_get('https://api.telegram.org/bot2065843826:AAHtCj4oUalFk_zKUDIK8o4bca6MgjQ8NGY/sendMessage?chat_id='.$chat_id.'&text='.$response);
}

function curl_get($url){
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, $url);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    return $data;
}