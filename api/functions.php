<?php
session_start();
include 'api_const.php';
function get_discount($data){
    $data['response'] = false;
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $email = $data['email'];
    $promocode = $data['discount_code'];
   if(isset($data['payment_type']) && $data['payment_type'] == 'credit_card'){
       $campaign_id = 1;
   } else if(isset($data['payment_type']) && $data['payment_type'] == 'paypal'){
       $campaign_id = 2;
   } else {
       $campaign_id = 1;
   }

    $pro_id = $data['prd_id'];
    $request_data = array(
        'email'=>'mfarhanriaz14@gmail.com',
        'promo_code'=>$promocode,
        'campaign_id'=>$campaign_id,
        'shipping_id'=>2,
        'products'=>array(
            array(
                'product_id'=>$pro_id,
                 'quantity'=>1
            )
        ));
        // print_r($request_data);
        // exit;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/coupon_validate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($request_data),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            "Authorization: Basic ".$credentials
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, true);
    $coupon_amount = $result['coupon_amount'];
    $message = $result['response_code'];
    if($coupon_amount == '0'){
        $data['response'] = true;
        $_SESSION['discount_amount'] = $coupon_amount;
        $data['discount_value'] ="Your Coupon Code Expired";
    } else {
        $data['response'] = true;
        $_SESSION['discount_amount'] = $coupon_amount;
        $data['discount_value'] ="Congratulations! You Got Discount of &nbsp" .$coupon_amount. "&nbsp $";
    }
    $_SESSION['COUPON'] = $promocode;
    echo json_encode($data);
}

function nothanks($formData){
     $_SESSION['is_upsell_skip'] = true;
     $data = array();
     $data['skip'] = true;
     echo json_encode($data);
}


function create_new_prospect($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/new_prospect',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($data),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic c2VfNjc5MDpjNWRhOGNlNWUzNjY4MQ=='
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}
function upadate_prospect($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/prospect_update',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($data),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic 2VfNjc5MDpjNWRhOGNlNWUzNjY4MQ=='
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function checkout_process($formData){
    $data = [];
    $resp = array();
    $data['response'] = false;
        $credentials = base64_encode(USERNAME.":".PASSWORD);
        $customerEmail = $formData['email'];
        $firstname = $formData['firstname'];
        $lastname = $formData['lastname'];
        $phone = $formData['phone'];
        $address = $formData['address'];
        $zip = $formData['zip'];
        $city = $formData['city'];
        $country = $formData['country'];
        $cardNumber= $formData['ccnumber'];
        $expdatem = $formData['expdatem'];
        $expdatey = $formData['expdatey'];
        $expdate = $expdatem.$expdatey;
        $cvv = $formData['cvv'];
        $pro_id = $formData['prd_id'];
        if (substr($cardNumber, 0, 1) == '4') {
            $cardType = 'visa';

        }elseif (substr($cardNumber, 0, 1) == '5'){
            $cardType = 'master';
        }else{
            $cardType = 'discover';
        }
        $ip_server = get_client_ip();
        $curl = curl_init();
        $qty = 1;
        if($pro_id == 2){
            $qty = 1;
        }
    if($pro_id == 3){
        $qty = 3;
    }
    if($pro_id == 4){
        $qty = 2;
    }
      $product = array( [
        'offer_id'=> '1',
        'product_id'=> $pro_id ,
        'billing_model_id'=> '2',
        'quantity'=> $qty,
        'step_num'=>'2'],
        );
      $_SESSION['compaign_id'] = $formData['compaign_id'];
        $params = array(
            'firstName'=>$firstname,
            'lastName'=>$lastname,
            'billingFirstName'=>$firstname,
            'billingLastName'=>$lastname,
            'billingAddress1'=>$address,
            'billingAddress2'=> 'FL 7',
            'billingCity'=> $city,
            'billingState'=>'N/A',
            'billingZip'=>$zip,
            'billingCountry'=>$country,
            'phone'=>$phone,
            'email'=>$customerEmail,
            'creditCardType'=> $cardType,
            'creditCardNumber'=> $cardNumber,
            'expirationDate'=> $expdate,
            'CVV'=> $cvv,
            'shippingId'=> '2',
            'tranType'=> 'Sale',
            'ipAddress'=>  $ip_server,
            'campaignId'=> $formData['compaign_id'],
            'offers' => $product,
            'billingSameAsShipping'=>'YES',
            'shippingAddress1'=> $address,
            'shippingAddress2'=>'APT 7',
            'shippingCity'=> $city,
            'shippingState'=>'N/A',
            'shippingZip'=> $zip,
            'shippingCountry'=> $country,
            'AFFID'=>!empty($_SESSION['aff'])?$_SESSION['aff']:"",
            'promoCode' =>!empty($_SESSION['COUPON']) ? $_SESSION['COUPON'] : ''
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/new_order',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Basic ".$credentials
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response, true);
        if(!empty($result['resp_msg']) && $result['resp_msg'] == "Approved"){
            $_SESSION['payment_type'] = 'credits';
            $data['response'] = true;
            $data['msg'] = "Order Created Succesfully";
            $_SESSION['pro_id'] = $pro_id;
            $_SESSION['order_id'] = $result['order_id'];
            $_SESSION['aff'] = !empty($formData['aff_id'])?$formData['aff_id']:"";
            saveOrder($result['order_id']);
        }
        else {
            $data['error'] = $result['error_message'];
        }
      echo json_encode($data);
}
function paypal_checkout_process($formData){
    $data = [];
    $resp = array();
    $_SESSION['aff'] = !empty($formData['aff_id'])?$formData['aff_id']:"";
    $data['response'] = false;
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $pro_id = $formData['prd_id'];
    $ip_server = get_client_ip();
    $curl = curl_init();
    $qty = 1;
    if($pro_id == 2){
        $qty = 1;
    }
    if($pro_id == 3){
        $qty = 3;
    }
    if($pro_id == 4){
        $qty = 2;
    }
    $product = array( [
        'offer_id'=> '1',
        'product_id'=> $pro_id ,
        'billing_model_id'=> '2',
        'quantity'=> $qty,
        'step_num'=>'2'],
    );
     $_SESSION['compaign_id'] = $formData['compaign_id'];
    $params = array(
        'shippingId'=> '2',
        'tranType'=> 'Sale',
        'ipAddress'=>  $ip_server,
        'campaignId'=> $formData['compaign_id'],
        'offers' => $product,
        'creditCardType'=>'paypal',
        'alt_pay_return_url'=>ALT_PAY_RETURN_URL,
        'AFFID'=>!empty($_SESSION['aff'])?$_SESSION['aff']:""
    );
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/new_order',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Basic ".$credentials
        ),
    ));

    $response = curl_exec($curl);
    $info = curl_getinfo($curl);

    $parts = parse_url($info['url']);
    parse_str($parts['query'], $query);
    $order_id =  $query['id'];
    $_SESSION['order_id'] = $order_id;
    $_SESSION['payment_type'] = 'paypal';
    saveOrder($order_id);
    echo $response;
    exit;
}


function upsell_paypal_checkout_process($formData){
    $data = [];
    $resp = array();
    $data['response'] = false;
    // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $pro_id = !empty($formData['u1_id']) ? $formData['u1_id']: $formData['u2_id'];
    $ip_server = get_client_ip();
    $curl = curl_init();
    $qty = 1;
    $product = array( [
        'offer_id'=> '1',
        'product_id'=> $pro_id ,
        'billing_model_id'=> '2',
        'quantity'=> $qty,
        'step_num'=>'2'],
    );
    if(!empty($formData['u1_id'])){
        $alt_url = ALT_PAY_RETURN_URL2;
    } else {
        $alt_url = THANK_YOU;
    }
    $coupon = "";
    if(!empty($formData['u2_id']) && isset($_SESSION['is_upsell_skip'])){
        $coupon = "50PercentDiscount";
    }
    $params = array(
        'shippingId'=> '2',
        'tranType'=> 'Sale',
        'ipAddress'=>  $ip_server,
        'campaignId'=> '2',
        'offers' => $product,
        'creditCardType'=>'paypal',
        'alt_pay_return_url'=>$alt_url,
        'promoCode' =>$coupon,
        'AFFID'=>!empty($_SESSION['aff'])?$_SESSION['aff']:""
    );
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/new_order',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Basic ".$credentials
        ),
    ));

    $response = curl_exec($curl);
    $info = curl_getinfo($curl);
    if(!empty($formData['u1_id'])){
        $_SESSION['u1_id'] = $formData['u1_id'];
    }
    if(!empty($formData['u2_id'])){
        $_SESSION['u2_id'] = $formData['u2_id'];
    }

    $parts = parse_url($info['url']);
    parse_str($parts['query'], $query);
    $order_id =  $query['id'];
    $_SESSION['order_id'] = $order_id;
    $_SESSION['payment_type'] = 'paypal';
    saveOrder($order_id);
    echo $response;
    exit;
}


function upsell_process($formData){
    $data = [];
    $data['response'] = false;
    $pro_id = !empty($formData['u1_id']) ? $formData['u1_id']: $formData['u2_id'];
    $order_id = $formData['order_id'];
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $coupon = "";
    if(!empty($formData['u2_id']) && isset($_SESSION['is_upsell_skip'])){
      $coupon = "50PercentDiscount";
    }
    $ip_server = get_client_ip();
    $curl = curl_init();
    $product = array([
        'offer_id'=> '1',
        'product_id'=> $pro_id, //only change product id
        'billing_model_id'=> '2',
        'quantity'=>'1',
        'step_num'=>'2'],
    );

    $params = array(
        'previousOrderId'=> $order_id,
        'shippingId'=> '2',
        'tranType'=> 'Sale',
        'ipAddress'=>  $ip_server,
        'campaignId'=> $_SESSION['compaign_id'],
        'offers' => $product,
        'promoCode' =>$coupon,
        'AFFID'=>!empty($_SESSION['aff'])?$_SESSION['aff']:""
    );
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/new_upsell',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Basic ".$credentials
        ),
    ));

    $response = curl_exec($curl);

    $result = json_decode($response, true);
    curl_close($curl);
    if(!empty($result['resp_msg']) && $result['resp_msg'] == "Approved"){
        $data['response'] = true;
        $data['msg'] = "Upsell added Succesfully";
        if(!empty($formData['u1_id'])){
            $_SESSION['u1_id'] = $formData['u1_id'];
        }
        if(!empty($formData['u2_id'])){
            $_SESSION['u2_id'] = $formData['u2_id'];
        }
        saveOrder($result['order_id']);
    }
    else {
        $data['error'] = $result['error_message'];
    }
  echo json_encode($data);
}

function paypal_upsell_process($formData){
    $data = [];
    $resp = array();
    $data['response'] = false;
    $pro_id = !empty($formData['u1_id']) ? $formData['u1_id']: $formData['u2_id'];
    $order_id = $formData['order_id'];
    // print_r($order_id);
    // exit;
    // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $ip_server = get_client_ip();
    $curl = curl_init();
    $product = array([
        'offer_id'=> '1',
        'product_id'=> $pro_id, //only change product id
        'billing_model_id'=> '2',
        'quantity'=>'1',
        'step_num'=>'2'],
    );

    $params = array(
        'previousOrderId'=> $order_id,
        'shippingId'=> '2',
        'tranType'=> 'Sale',
        'ipAddress'=>  $ip_server,
        'campaignId'=> '2',
        'offers' => $product
    );
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/new_upsell',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Basic ".$credentials
        ),
    ));

    $response = curl_exec($curl);
   echo $response; exit;
}

// klarna processing start
const product_price = 10;
const klarnaProducts = [];
function klarnaSession($amount = 0, $products = [])
{
    $amount = 10 * 100;
    // print_r($amount);
    // exit;
    if (empty($amount)) {
        return false;
    }

    $klarnaProducts = [];

    $product_price = 10;
    $quantity_price = $product_price * 1;

    $klarnaDetail = [];
    $klarnaDetail['name'] = 'Test Product';
    $klarnaDetail['quantity'] = 1;
    $klarnaDetail['unit_price'] = $product_price * 100;
    $klarnaDetail['total_amount'] = round($quantity_price, 2);
    $klarnaDetail['total_amount'] = $klarnaDetail['total_amount'] * 100;

    array_push($klarnaProducts, $klarnaDetail);

    $post = [
        "locale" => "en-GB",
        "purchase_country" => "GB",
        "purchase_currency" => "GBP",
        "order_amount" => $amount,
        "order_tax_amount" => 0,
        "order_lines" => $klarnaProducts
    ];

    $api = KLARNA_URL . "payments/v1/sessions";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:application/json",
        "Authorization: Basic " . base64_encode(KLARNA_CREDENTIALS)
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    if (!empty($response['session_id'])) {
        $_SESSION['session_id'] = $response['session_id'];
        return $response['client_token'];
    }
    return false;
}


function getOrderId($token)
{
    $session_id = $_SESSION['session_id'];
    $api = KLARNA_URL."payments/v1/sessions/".$session_id;
    
    // Set cURL options
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:application/json",
        "Authorization: Basic " . base64_encode(KLARNA_CREDENTIALS)
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    print_r($response);
    exit;
   
}

function confirmation(){
//    $data = [];
//    // $order_id = $this->session->userdata('order_id');
//    // $where = "transaction_id = '".$order_id."'";
//    // $result = $this->orders->get_where('*', $where, true, '' , '', '');
//    if(!empty($result)){
//        $this->session->set_userdata('is_klarna', 'YES');
//        redirect('klarna/order_confirmation');
//    }
//    $api = KLARNA_URL."ordermanagement/v1/orders/".$order_id;
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $api);
//    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET' );
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//    curl_setopt($ch, CURLOPT_HTTPHEADER , array(
//        "Content-Type:application/json",
//        "Authorization: Basic ".base64_encode(KLARNA_CREDENTIALS)
//    ));
//    $response = curl_exec( $ch );
//    curl_close( $ch );
//    $response = json_decode($response , true);
//    print_r($response);
//    if(!empty($response['status']) && $response['status']=="AUTHORIZED"){
//        $order = [];
//        $order['customer_name'] = $response['billing_address']['given_name'].' '.$response['billing_address']['family_name'];
//        $order['email'] = $response['billing_address']['email'];
//        $order['transaction_id'] = $response['order_id'];
//        $order['transaction_status'] = 'Completed';
//        $order['payer_id'] = null;
//        $order['payment_method'] = 'Klarna';
//        $order['paid_amount'] = $response['order_amount']/100;
//        $order['shipping_address_1'] = $response['billing_address']['street_address'];
//        $order['postal_code'] = $response['billing_address']['postal_code'];
//        $order['payment_id'] = null;
//        $order['payment_status'] = 'complete';
//        $order['shipping_address_2'] = $response['billing_address']['street_address2'];
//        $order['admin_area_1'] = $response['billing_address']['city'];
//        $order['country_code'] = $response['billing_address']['country'];
//        if($id = $this->orders->save($order)){
//            redirect('klarna/orderProcess/'.$id.'/1');
//        }
//    }
}
// klarna processing end

// order save to db start
function saveOrder($orderId){
    $data = array("order_id"=>array($orderId));
    $curl = curl_init();
    $credentials = base64_encode(USERNAME.":".PASSWORD);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://'.API_HOST.'.sticky.io/api/v1/order_view',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($data),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic '.$credentials
  ),
));

$response = curl_exec($curl);


$result = json_decode($response, true);

curl_close($curl);

$order_id = $result['order_id'];
$first_name = $result['billing_first_name'];
$last_name = $result['billing_last_name'];
$email = $result['email_address'];
$phone = $result['customers_telephone'];
$city = $result['billing_city'];
$country = $result['billing_country'];
$postal_code = $result['billing_postcode'];
$address = $result['billing_street_address'];
$compaign_id = $result['campaign_id'];
$contact_id = $result['contact_id'];
$order_total = $result['order_total'];
$order_status = $result['order_status'];
$product_id = $result['products']['0']['product_id'];
$offer_name = $result['products']['0']['offer']['name'];
$offer_id = $result['products']['0']['offer']['id'];
$payment_method =  isset($_SESSION['payment_type'])?$_SESSION['payment_type']:"OFFLINE PAYMENT";
$products = $result['products'];
//connection to db
$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//insert to database

// get data from db

$sqlfetch = "SELECT * FROM orders WHERE order_id = '".$order_id."'";
$result = $conn->query($sqlfetch);
$aff = !empty($_SESSION['aff'])?$_SESSION['aff']: "";
if ($result->num_rows == 0) {
    $sql = "INSERT INTO orders (order_id, user_id, customer_name, product_name, email, paid_amount, shipping_address_1, country_code, postal_code, payment_method,aff)
    VALUES ('".$order_id."', '".$contact_id."', '".$first_name."','".$offer_name."', '".$email."', '".$order_total."', '".$address."', '".$country."', '".$postal_code."', '".$payment_method."','".$aff."')";
    
    if ($conn->query($sql) === TRUE) {
       // echo "Order created";
    } else {
     //   echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    
    $sqlupdate = "UPDATE orders SET user_id = '".$contact_id."', customer_name = '".$first_name."', product_name = '".$offer_name."', email = '".$email."', paid_amount = '".$order_total."', shipping_address_1 = '".$address."', country_code = '".$country."', postal_code = '".$postal_code."' WHERE order_id = '".$order_id."'";
    if ($conn->query($sqlupdate) === TRUE) {
       // echo "Order updated";
    }
}


//   insert into order items
foreach($products as $prod){
    $product_id = $prod['product_id'];
$sqlfetchitems = "SELECT * FROM order_items WHERE order_id = '".$order_id."' AND product_id = '".$product_id."'";
$result = $conn->query($sqlfetchitems);

if ($result->num_rows == 0) {
    $sql1 = "INSERT INTO order_items (order_id, product_id, product_price, product_name)
    VALUES ('".$order_id."', '".$product_id."', '".$order_total."', '".$offer_name."')";

    if ($conn->query($sql1) === TRUE) {
     //   echo "Order Items Created";
    } else {
      //  echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
} else {
  //  echo "Order Items already exist.";
}
}


//  print_r($offer_name);


}

function deleteOrder($orderId){
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sqlfetch = "SELECT * FROM orders WHERE order_id = '".$orderId."'";
    $result = $conn->query($sqlfetch);
    if ($result->num_rows >= 1) {
        $sql = "DELETE FROM orders  WHERE order_id = '".$orderId."'";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "DELETE FROM order_items  WHERE order_id = '".$orderId."'";
            $conn->query($sql2);
        } else {

        }
    }
}

function checkOrder($orderId){
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB;
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sqlfetch = "SELECT * FROM orders WHERE order_id = '".$orderId."'";
    $result = $conn->query($sqlfetch);
    if ($result->num_rows >= 1) {

    } else {
        unset($_SESSION['u1_id']);
        unset($_SESSION['u2_id']);
        unset($_SESSION['order_id']);
        unset($_SESSION['payment_type']);
        header('Location: '.BASE_URL.'/rf394j.php?lang=fr');
    }
}

function saveVisitor(){
    $ip = get_client_ip();
    $type = !empty($_GET['type'])?$_GET['type']:"page_view";
    $page = !empty($_GET['page']) ? $_GET['page'] : "landing";
    //connection to db
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB;

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
//insert to database

// get data from db

    $sqlfetch = "SELECT * FROM vistor WHERE ip = '".$ip."' and vistor_type = '".$type."' and page = '".$page."'";
    $result = $conn->query($sqlfetch);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO vistor (ip, vistor_type, page)
VALUES ('".$ip."', '".$type."', '".$page."')";

        if ($conn->query($sql) === TRUE) {
            // echo "Order created";
        } else {
            //   echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}

 function postOrder($orderData)
{
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $data = [];
    $qty = 1;
    $pro_id = $orderData['product_id'];
    $customer = $orderData['payer'];
    $shipping  = $orderData['purchase_units'][0]['shipping'];
    if($pro_id == 2){
        $qty = 1;
    }
    if($pro_id == 3){
        $qty = 3;
    }
    if($pro_id == 4){
        $qty = 2;
    }
    $compaign_id = 2;

    if(isset($_SESSION['compaign_id'])){
        $compaign_id = $_SESSION['compaign_id'];
    } else {
        $compaign_id = $orderData['compaign_id'];
    }

    if(empty($compaign_id)){
        $compaign_id = $orderData['compaign_id'];
    }
    $_SESSION['compaign_id'] = $compaign_id;
    $post = [
        "firstName"=>$customer['name']['given_name'],
        "lastName"=>$customer['name']['surname'],
        "billingFirstName"=>$customer['name']['given_name'],
        "billingLastName"=>$customer['name']['surname'],
        "billingAddress1"=>$shipping['address']['address_line_1'],
        "billingAddress2"=>$shipping['address']['address_line_1'],
        "billingCity"=>$shipping['address']['admin_area_2'],
        "billingState"=>$shipping['address']['admin_area_2'],
        "billingZip"=>$shipping['address']['postal_code'],
        "billingCountry"=>$shipping['address']['country_code'],
        "phone"=>"+1343171137",
        "email"=>$customer['email_address'],
        "creditCardType"=>"offline",
        "ipAddress"=>get_client_ip(),
        "shippingId"=>'2',
        "tranType"=>"Sale",
        "campaignId"=>$compaign_id,
        "offers"=>
            [
                [
                    'offer_id'=> '1',
                    "product_id"=>$pro_id,
                    "billing_model_id"=>2,
                    "quantity"=>$qty,
                ],
            ],
        "billingSameAsShipping"=>"YES",
        "shippingAddress1"=>$shipping['address']['address_line_1'],
        "shippingAddress2"=>$shipping['address']['address_line_1'],
        "shippingCity"=>$shipping['address']['admin_area_2'],
        "shippingState"=>$shipping['address']['admin_area_2'],
        "shippingZip"=>$shipping['address']['postal_code'],
        "shippingCountry"=>$shipping['address']['country_code']
    ];
    $api = 'https://'.API_HOST.'.limelightcrm.com/api/v1/new_order';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST' );
    //curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPHEADER , array(
        "Content-Type:application/json",
        "Authorization: Basic ".$credentials,
    ));
    $response = curl_exec( $ch );
    curl_close( $ch );
    $response = json_decode($response , true);
    if(!empty($response['order_id'])){
        sticky_update_curl($response['order_id']);
        $_SESSION['order_id'] = $response['order_id'];
        $_SESSION['payment_type'] = 'paypal';
        $_SESSION['pro_id'] = $pro_id;
        saveOrder($response['order_id']);
    }
}

function sticky_update_curl($order_id){
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $orderUpdate = array();
    $orderUpdate["order_id"][$order_id] = array(
        "payment_received" => 1
    );

    $sticky_io = 'https://'.API_HOST.'.limelightcrm.com/api/v1/order_update';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sticky_io);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderUpdate));
    curl_setopt($ch, CURLOPT_HTTPHEADER , array(
        "Content-Type:application/json",
        "Authorization: Basic ".$credentials,
    ));
    $sticky_response = curl_exec( $ch );
    curl_close( $ch );
    return $sticky_response;
}


function upsell_postOrder($orderData)
{
    $credentials = base64_encode(USERNAME.":".PASSWORD);
    $data = [];
    $qty = 1;
    $pro_id = !empty($orderData['u1_id']) ? $orderData['u1_id']: $orderData['u2_id'];
    $customer = $orderData['payer'];
    $shipping  = $orderData['purchase_units'][0]['shipping'];
    $compaign_id = 6;

    if(isset($_SESSION['compaign_id'])){
        $compaign_id = $_SESSION['compaign_id'];
    } else {
        $compaign_id = $orderData['compaign_id'];
    }

    if(empty($compaign_id)){
        $compaign_id = $orderData['compaign_id'];
    }
    $_SESSION['compaign_id'] = $compaign_id;
    $post = [
        "firstName"=>$customer['name']['given_name'],
        "lastName"=>$customer['name']['surname'],
        "billingFirstName"=>$customer['name']['given_name'],
        "billingLastName"=>$customer['name']['surname'],
        "billingAddress1"=>$shipping['address']['address_line_1'],
        "billingAddress2"=>$shipping['address']['address_line_1'],
        "billingCity"=>$shipping['address']['admin_area_2'],
        "billingState"=>$shipping['address']['admin_area_2'],
        "billingZip"=>$shipping['address']['postal_code'],
        "billingCountry"=>$shipping['address']['country_code'],
        "phone"=>"+1343171137",
        "email"=>$customer['email_address'],
        "creditCardType"=>"offline",
        "ipAddress"=>get_client_ip(),
        "shippingId"=>'2',
        "tranType"=>"Sale",
        "campaignId"=>$compaign_id,
        "offers"=>
            [
                [
                    'offer_id'=> '1',
                    "product_id"=>$pro_id,
                    "billing_model_id"=>2,
                    "quantity"=>$qty,
                ],
            ],
        "billingSameAsShipping"=>"YES",
        "shippingAddress1"=>$shipping['address']['address_line_1'],
        "shippingAddress2"=>$shipping['address']['address_line_1'],
        "shippingCity"=>$shipping['address']['admin_area_2'],
        "shippingState"=>$shipping['address']['admin_area_2'],
        "shippingZip"=>$shipping['address']['postal_code'],
        "shippingCountry"=>$shipping['address']['country_code']
    ];
    $api = 'https://'.API_HOST.'.limelightcrm.com/api/v1/new_order';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST' );
    //curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($ch, CURLOPT_HTTPHEADER , array(
        "Content-Type:application/json",
        "Authorization: Basic ".$credentials,
    ));
    $response = curl_exec( $ch );
    curl_close( $ch );
    $response = json_decode($response , true);
    if(!empty($response['order_id'])){
        sticky_update_curl($response['order_id']);
        if(!empty($orderData['u1_id'])){
            $_SESSION['u1_id'] = $orderData['u1_id'];
        }
        if(!empty($orderData['u2_id'])){
            $_SESSION['u2_id'] = $orderData['u2_id'];
        }
        saveOrder($response['order_id']);
    }
}