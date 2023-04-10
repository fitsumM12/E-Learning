<?php
ini_set('mysqli.connect_timeout',300);
ini_set('default_socket_timeout',3000);
require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/includes/dbh.inc.php";
class payment{
    private $db;
    function __construct()
    {
        $this->db = new elearnDb();
    }

function getTransaction(){
    $pymt = "SELECT * FROM `payment` WHERE `payment_status` = 'paid'";
    $result = mysqli_query($this->db->makeConnect(),$pymt);
    return $result;
}
// currency converter

function currencyConverter($fromCurrency,$toCurrency,$amount) {
	$fromCurrency = urlencode($fromCurrency);
	$toCurrency = urlencode($toCurrency);
	$url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
	$get = file_get_contents($url);
	$data = preg_split('/\D\s(.*?)\s=\s/',$get);
	$exhangeRate = (float) substr($data[1],0,7);
	$convertedAmount = $amount/$exhangeRate;
    return $convertedAmount;
}

// to get the total payment

function getTotalTrans($dt){
    $pymt = "SELECT * FROM `payment` WHERE `payment_status` = 'paid' and date(`created`) = '$dt'";
    $result = mysqli_query($this->db->makeConnect(),$pymt);
    $sum =0;
    while($row = mysqli_fetch_assoc($result)){
    if($row['item_price_currency'] == $row['paid_amount_currency']){
        $sum = $sum + $row['paid_amount'];
    }else{
    $converted_currency=$this->currencyConverter($row['item_price_currency'], $row['paid_amount_currency'], $row['paid_amount']);
	 $sum = $sum + $converted_currency;
    }
    }
    return $sum;
}
}
?>