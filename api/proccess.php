<?php
    include 'functions.php';
  if(isset($_GET['action']) && $_GET['action'] == 'create_order'){
      checkout_process($_POST);
  }
  if(isset($_GET['action']) && $_GET['action'] == 'create_upsell'){
    upsell_process($_POST);
  }
if(isset($_GET['action']) && $_GET['action'] == 'create_paypal_order'){
    paypal_checkout_process($_POST);
}
if(isset($_GET['action']) && $_GET['action'] == 'create_pay_upsell'){
    upsell_postOrder($_POST);
}
if(isset($_GET['action']) && $_GET['action'] == 'nothanksu1'){
  nothanks($_POST);
}
if(isset($_GET['action']) && $_GET['action'] == 'get_discount'){
  get_discount($_POST);
}
if(isset($_GET['action']) && $_GET['action'] == 'create_kalarna_order'){
  getOrderId($_GET['token']);
}

if(isset($_GET['action']) && $_GET['action'] == 'generate_token'){
  echo json_encode([
    'client_id' => klarnaSession(product_price, klarnaProducts)
  ]);
  exit;
}
if(isset($_GET['action']) && $_GET['action'] == 'vistor'){
    saveVisitor();
}
if(isset($_GET['action']) && $_GET['action'] == 'create_offline_order'){
    postOrder($_POST);
   exit;
}
?>