<?php
session_start();
include('../includes/config.php');

function getPaymentKeys()
{
  global $dbh;
  $sql = $dbh ->query("SELECT PaymentSecretKey, PaymentPublicKey FROM tbl_admin");
  $results = $sql->fetchAll(PDO::FETCH_OBJ);
  foreach ($results as $result) {
    return $result;
  }
}


$curl = curl_init();
$paymentSecretKey = getPaymentKeys()->PaymentSecretKey;
$orphanId = $_POST['orphanId'];
$orphanageId = $_POST['orphanageId'];
$email = $_POST['email'];
$name = $_POST['name'];
$address = $_POST['address']; 
$phone = $_POST['phone']; 
$amount = $_POST['amount']; 
$callback_url = 'paystack/callback.php'; 

curl_setopt_array($curl, array(
   CURLOPT_SSL_VERIFYHOST =>  false,
  CURLOPT_SSL_VERIFYPEER  => false,
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
    'callback_url' => $callback_url
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: $paymentSecretKey",
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx['status']){
  print_r('API returned error: ' . $tranx['message']);
}

$access_code = $tranx['data']['access_code']; 
$reference = $tranx['data']['reference'];
$destination = $tranx['data']['authorization_url'];

$sql = $dbh ->query("INSERT INTO `tbl_donations` (`orphan_id`, `orphanage_id`, `donor_name`, `donor_email`, `donor_phone`, `amount`) VALUES ('$orphanId', '$orphanageId', '$name', '$email', '$phone', '$amount')");

include_once("../libs/SendMailValidation.php");
 
  //Database insert initializing
print_r($tranx);
header('Location: ' . $tranx['data']['authorization_url']);