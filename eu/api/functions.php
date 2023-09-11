<?php
session_start();
include 'api_const.php';
function get_discount($data){
    $request_data = array('email'=>'phpclicks@gmail.com','promo_code'=>$data['promo_code'],'campaign_id'=>$data['campaign_id'],'shipping_id'=>$data['shipping_id'],'products'=>array(array('product_id'=>$data['product_id'],'quantity'=>1)));
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
            'Authorization: Basic DpjNWRhOGNlNWUzNjY4MQ=='
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
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
   // if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
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
        // print_r($pro_id);
        // exit;
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
        // 'product_id'=> '6' ,
        'product_id'=> $pro_id ,
        'billing_model_id'=> '2',
        'quantity'=> $qty,
        'step_num'=>'2'],
        );

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
            'campaignId'=> '1',
            'offers' => $product,
            'billingSameAsShipping'=>'YES',
            'shippingAddress1'=> $address,
            'shippingAddress2'=>'APT 7',
            'shippingCity'=> $city,
            'shippingState'=>'N/A',
            'shippingZip'=> $zip,
            'shippingCountry'=> $country
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
            $data['response'] = true;
            $data['msg'] = "Order Created Succesfully";
            $_SESSION['pro_id'] = $pro_id;
            $_SESSION['order_id'] = $result['order_id'];
        }
        else {
            $data['error'] = $result['error_message'];
        }
      echo json_encode($data);


}
function upsell_process($formData){
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
        'campaignId'=> '1',
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

    }
    else {
        $data['error'] = $result['error_message'];
    }
  echo json_encode($data);

  

}