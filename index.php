<?php
header("Access-Control-Allow-Origin: *");

require 'stripe/Stripe.php';
Stripe::setApiKey("sk_test_udw56z4V1NbZNOdNWDrDNfdK"); 
/* I mashed the keyboard again. */

try {
  if (!isset($_GET['stripeToken']))
    throw new Exception("The Stripe Token was not generated correctly");
  Stripe_Charge::create(array("amount" => 1000,
                              "currency" => "usd",
                              "card" => $_GET['stripeToken']));
  $success = 'Your payment was successful.';
}
catch (Exception $e) {
  $error = $e->getMessage();
}

$resp = array();
$resp['success'] = $success;
$resp['error'] = $error;
echo json_encode($resp);

?>