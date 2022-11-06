<?php 
$product_name = $_POST["product_name"] ;
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["mobile"];
$email = $_POST["email"];

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_471c4569e7c0bbec66bacecaea1', 'test_dbd4f9391fd3909c0736a61506d','https://test.instamojo.com/api/1.1/');

try {
        $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        "mobile" => $phone,
        "shipping_city" => $shipping_city,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://www.djtechblog.com/php/projects/payments/thankyou.php",
        "webhook" => "https://www.djtechblog.com/php/projects/payments/webhook.php"
        ));
 
    $pay_ulr = $response['longurl'];
    
 

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>