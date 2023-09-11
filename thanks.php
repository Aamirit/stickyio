<?php
include 'api/functions.php';
unset($_SESSION['aff']);
if (isset($_GET['errorFound']) && $_GET['errorFound'] == 1 && isset($_GET['orderId'])) {
    deleteOrder($_GET['orderId']);
    header('Location: '.BASE_URL.'/u2.php?lang=fr');
    exit;
}
if(isset($_SESSION['order_id'])){
  $order_id = $_SESSION['order_id'];
  checkOrder($order_id);
if(!empty($_SESSION['pro_id'])){
  $pro_id = $_SESSION['pro_id'];
}
if(!empty($_SESSION['u1_id'])){
  $u1_id = $_SESSION['u1_id'];
}
if(!empty($_SESSION['u2_id'])){
  $u2_id = $_SESSION['u2_id'];
}
$discount = 0;
if(!empty($_SESSION['discount_amount'])){
    $discount = $_SESSION['discount_amount'];
}


include('inc/header.php') ?>

<link rel="stylesheet" href="/css/d8670a08152e397c.css" data-n-g=""/>

<script>(function(){"use strict";function n(n,e){var r;void 0===e&&(e="uclick");var c=null===(r=n.match(/\?.+?$/))||void 0===r?void 0:r[0];return c?Array.from(c.matchAll(new RegExp("[?&](clickid|"+e+")=([^=&]*)","g"))).map((function(n){return{name:n[1],value:n[2]}})):[]}function e(n){var e=n();return 0===e.length?{}:e.reduce((function(n,e){var r;return Object.assign(n,((r={})[e.name]=""+e.value,r))}),{})}function r(r){void 0===r&&(r="uclick");var c,t,u=e((function(){return(function(n){return void 0===n&&(n="uclick"),Array.from(document.cookie.matchAll(new RegExp("(?:^|; )(clickid|"+n+")=([^;]*)","g"))).map((function(n){return{name:n[1],value:n[2]}}))})(r)})),i=e((function(){return n(document.referrer,r)})),o=e((function(){return n(document.location.search,r)}));return(c=[r,"clickid"],t=[u,i,o],c.reduce((function(n,e){return n.concat(t.map((function(n){return[e,n]})))}),[])).map((function(n){return{name:n[0],value:n[1][n[0]]}})).find((function(n){return n.value}))||null}var c,t,u,i;(i=document.createElement("img")).src=(t=""+"https://golinkads.com/"+"start"+".php?payout=OPTIONAL",(u=r(c="uclick"))?t+"&cnv_id="+(u.name===c?"OPTIONAL":u.value)+(u.name===c?"&"+c+"="+u.value:""):t+"&cnv_id=OPTIONAL"),i.referrerPolicy="no-referrer-when-downgrade"})();</script>
<style>
    .line_items{
        display: flex;
        justify-content: center;
        width: 300px;
        margin: auto;
    }
</style>

<body class="d-flex flex-column ">
  <main class="flex-shrink-0">

  <?php include('inc/menu.php') ?>

  <section class="page-header">
    <div class="container">
      <h1><?php echo order_purchase; ?></h1>
    </div>
  </section>

  <div class="neos-contentcollection">

      <div class="section ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="neos-contentcollection">
                <div class="payment-details">
                  <div class="text-center no-print">
                    <i class="fa fa-thumbs-up fa-4x color-primary mb-2"></i>
                    <h2><?php echo order_heading_1; ?>.</h2>
                    <p class="pt-3 pb-1"><?php echo order_info_1; ?>.</p>
                    <a href="#" class="btn btn-primary d-print-none mb-3" onclick="print_order()">
                      <i class="fa fa-print"></i> <?php echo order_print; ?> </a>
                  </div>
                  <div class="card mt-1 mb-1">
                    <div class="card-body">
                    <center>
                      <br><br>
                      <p><?php echo order_Veuillez; ?>.</p>
                      <h4><?php echo order_number;  ?> :</h4>
                      <div class="payment-subject text-center display-3">
                        <strong><?php echo $order_id;?></strong>
                      </div>
                      <i class="fas fa-exclamation-triangle"></i> <?php  echo order_utiliser; ?>.<br><br>
                    </center>
                    </div>
                  </div>
                  <div class="text-center mt-3 no-print">
                    <a href="#" class="btn btn-primary d-print-none" onclick="print_order()">
                      <i class="fa fa-print"></i> <?php  echo order_print; ?> </a>
                  </div>


                  <?php if(!empty($pro_id) && $pro_id == 2 ){?>
                <div class="sm:mt-4 flex p-4 bg-white rounded-xl items-center space-x-4 text-center cart-img">
                    <label for="upsell" class="line_items flex flex-1 items-center">
                     <?php  $product_amount = 69.90 - $discount  ?>
                    <div class="ml-4">
                        <img alt="" aria-hidden="true" src="https://looper3.com/eur/img/package-1.7326984a.webp" style="display: flex;width:200px; max-width: 100%; background: none; opacity: 1; border: 0px; margin: auto;">
                        <p class="text-xl text-red-500 uppercase font-bold"><?php  echo quantpack1; ?></p>
                      <span class="font-bold text-sm"><?php echo $product_amount; ?> € </span></p>
                    </div>
                  </label>
                </div>
                <?php }?>

                <?php if(!empty($pro_id) && $pro_id == 3 ){?>
                <div class="sm:mt-4 flex p-4 bg-white rounded-xl items-center space-x-4 text-center cart-img">
                    <label for="upsell" class="line_items flex flex-1 items-center">
                        <?php  $product_amount = 124.95 - $discount  ?>
                    <div class="ml-4">
                        <img alt="" aria-hidden="true" src="https://looper3.com/eur/img/package-3.ba568a39.webp" style="display: flex;width:200px; max-width: 100%; background: none; opacity: 1; border: 0px; margin: auto;">
                      <p><?php echo order_month; ?>:<br>
                      <span class="font-bold text-sm"><?php echo $product_amount; ?> €</span></p>
                    </div>
                  </label>
                </div>
                <?php }?>

                <?php if(!empty($pro_id) && $pro_id == 4 ){?>
                <div class="sm:mt-4 flex p-4 bg-white rounded-xl items-center space-x-4 text-center cart-img" >
                    <label for="upsell" class="line_items flex flex-1 items-center">
                        <?php  $product_amount = 94.96 - $discount  ?>
                    <div class="ml-4">
                        <img alt="" aria-hidden="true" src="https://looper3.com/eur/img/package-2.906f1af0.webp" style="display: flex;width:200px; max-width: 100%; background: none; opacity: 1; border: 0px; margin: auto;">
                      <p><?php echo quantpack3; ?>:<br>
                      <span class="font-bold text-sm"><?php echo $product_amount; ?> € </span></p>
                    </div>
                  </label>
                </div>
                <?php }?>

                <?php if(!empty($u1_id) && $u1_id == 5 ){
                    $img = "u1-fr.png";
                    $availibleLangues = array("fr","ch","de","it","nl","uk","us");
                    if(isset($_GET['lang']) && !empty($_GET['lang']) && in_array($_GET['lang'], $availibleLangues)){
                        $lng = $_GET['lang'];
                        $img = "u1-$lng.png";
                    }
                    $img = 'bottle_cleanse.png';
                    ?>
                <div class="sm:mt-4 flex p-4 bg-white rounded-xl items-center space-x-4 text-center cart-img">

                    <label for="upsell" class="line_items flex flex-1 items-center">
                    <div class="ml-4">
                        <img  aria-hidden="true" src="./img/<?php echo $img; ?>" style="display: flex;width:200px; max-width: 100%; background: none; opacity: 1; border: 0px; margin: auto;">
                      <p><?php echo upsell_1; ?>:<br>
                      <span class="font-bold text-sm">69.90 € </span></p>
                    </div>
                  </label>
                </div>
                <?php }?>

                <?php if(!empty($u2_id) && $u2_id == 6 ){
                    $img = "u2-fr.png";
                    $availibleLangues = array("fr","ch","de","it","nl","uk","us");
                    if(isset($_GET['lang']) && !empty($_GET['lang']) && in_array($_GET['lang'], $availibleLangues)){
                        if(isset($_SESSION['is_upsell_skip'])){
                            $lng = $_GET['lang'].'-v2';
                        } else {
                            $lng = $_GET['lang'];
                        }

                        $img = "u2-$lng.png";
                    }
                    $img = 'bottle_acv.png';
                    ?>
                <div class="sm:mt-4 flex p-4 bg-white rounded-xl items-center space-x-4 text-center cart-img">
                  <label for="upsell" class="line_items flex flex-1 items-center">
                      <?php
                      if(!empty($_SESSION['is_upsell_skip'])){
                          $upsell_amount = 34.95;
                      } else {
                          $upsell_amount = 69.90;
                      }
                      ?>
                  <div class="ml-4">
                      <img alt="" aria-hidden="true" src="./img/<?php echo $img; ?>" style="display: flex;width:200px; max-width: 100%; background: none; opacity: 1; border: 0px; margin: auto;">
                    <p><?php echo upsell_2; ?>:<br>
                    <span class="font-bold text-sm"><?php echo $upsell_amount; ?> €</span></p>
                  </div>
                </label>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>

                                                </div>
                                              </main>

  <?php include('inc/footer.php') ?>
<?php
//session_destroy();
}
else{
    header('Location: '.BASE_URL.'/rf394j.php?lang=fr');
  exit();
}
?>
  <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(event) {
          let url = './api/proccess.php?action=vistor&page=thankyou_page&type=page_view'
          fetch(url)
              .then(response => {
                  // handle the response
              })
              .catch(error => {
                  // handle the error
              });
      });
      document.addEventListener("click", function(event) {
          let url = './api/proccess.php?action=vistor&page=thankyou_page&type=page_click'
          fetch(url)
              .then(response => {
                  // handle the response
              })
              .catch(error => {
                  // handle the error
              });
      });
  </script>
  <script async src="https://eu-library.klarnaservices.com/lib.js" data-client-id="282ae5c3-7477-59d3-ab49-3463fab8460c"></script>
  <script src="js/Main.js?bust=407c4aed"></script>
  <script src="js/main.min.js?bust=ef22ff16"></script>

  </body>
  <script>
      function print_order(){
          window.print();
          return false;
      }
  </script>
  </html>
