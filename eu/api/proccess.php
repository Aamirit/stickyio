<?php
    include 'functions.php';
  if(isset($_GET['action']) && $_GET['action'] == 'create_order'){
       checkout_process($_POST);
  }
  if(isset($_GET['action']) && $_GET['action'] == 'create_upsell'){
    upsell_process($_POST);
  }
  



?>