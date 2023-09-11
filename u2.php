<?php
include 'api/functions.php';
if (isset($_GET['errorFound']) && $_GET['errorFound'] == 1 && isset($_GET['orderId'])) {
    deleteOrder($_GET['orderId']);
    header('Location: '.BASE_URL.'/u1.php?lang=fr');
    exit;
}
if(isset($_SESSION['order_id'])){
$order_id = $_SESSION['order_id'];
checkOrder($order_id);
    $img = "u2-fr.png";
    $availibleLangues = array("fr","ch","de","it","nl","uk","us");
    $price = $all_products[$lang][6]['price'];
    if(isset($_GET['lang']) && !empty($_GET['lang']) && in_array($_GET['lang'], $availibleLangues)){
       if(isset($_SESSION['is_upsell_skip'])){
           $lng = $_GET['lang'].'-v2';
           $price = $price/2;
       } else {
           $lng = $_GET['lang'];
       }

        $img = "u2-$lng.png";
    }
    $fundingsource = "sofort,giropay,bancontact,ideal,paylater";
include('inc/rf394j/header.php') ?>
<style>
    #loader {
   position: absolute;
   top: 50%;
   left: 44%;
   transform: translate(-50%, -50%);
   z-index: 999;
   border: 16px solid #f3f3f3;
   border-top: 16px solid #3498db;
   border-radius: 50%;
   width: 120px;
   height: 120px;
   animation: spin 2s linear infinite;
   }
   @keyframes spin {
   0% { transform: rotate(0deg); }
   100% { transform: rotate(360deg); }
   }

   a.mbl-disp {
    display: none;
}
    #pay_with_sanfort_container .paypal-buttons{
        width: 30% !important;
    }
   @media only screen and (max-width:767px){
      .m-5 {
     margin: 10px 0 0 0 !important;
}
       .desktop-dis{
           background: none;
           border: none;
           color: black;
       }
       #pay_with_sanfort_container .paypal-buttons{
           width: 100% !important;
       }
       #pay_with_sanfort_container{
           margin-top: 20px;
       }
   }
</style>
<body class="d-flex flex-column orderpage">
   <main class="flex-shrink-0">
   <?php include('inc/menu.php') ?>
   <div class="section pt-0">
      <div class="container">
         <div class="row">
            <div class="col">
               <div class="neos-contentcollection">
                  <div class="image">
                     <div class="text-center">
                         <img class="img-fluid m-5"
                              src="./img/<?php echo $img; ?>"/>
                        <div class="img">
                        <form  id="u2frm">
                        <input type="hidden" name="u2_id" value="6">
                        <input type="hidden" name="order_id" value="<?php if (isset($order_id)) { echo $order_id; } ?>">
                            <?php if(isset($_SESSION['payment_type']) && $_SESSION['payment_type'] !== 'paypal'){ ?>
                                <div class="img">
                                    <button id="order_submit_btn" type="submit" class="btn btn-primary btn-block btn-lg mb-2 mt-2">
                                        <i class="fa fa-arrow-circle-right"></i> <?php echo mailos20; ?> </button>
                                </div>
                            <?php } else { ?>
                                <div id="pay_with_sanfort_container" class="img">
                                </div>
                            <?php } ?>

                              </form>
                        </div>
                         <a href="./thanks.php?lang=fr" class="btn desktop-dis">No, Thankyou</a>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php include('inc/footer.php') ?>
   <?php include('inc/flag.php') ?>
   <script async src="https://eu-library.klarnaservices.com/lib.js" data-client-id="282ae5c3-7477-59d3-ab49-3463fab8460c"></script>
   <script src="js/Main.js"></script>
   <script src="js/main.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
       <script src="https://www.paypal.com/sdk/js?client-id=ARpwn_WrDUK6pQpvzQIMLpCaj85fktud-DT7foGFjoZ-p0iX0SL-RaBqT8eLib8B_wVNQKoRPG5RMLtT&enable-funding=<?php echo $fundingsource; ?>&currency=EUR&components=buttons,funding-eligibility&disable-funding=credit,card"></script>
       <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
       <script type="text/javascript">
           document.addEventListener("DOMContentLoaded", function(event) {
               let url = './api/proccess.php?action=vistor&page=u2_page&type=page_view'
               fetch(url)
                   .then(response => {
                       // handle the response
                   })
                   .catch(error => {
                       // handle the error
                   });
           });
           document.addEventListener("click", function(event) {
               let url = './api/proccess.php?action=vistor&page=u2_page&type=page_click'
               fetch(url)
                   .then(response => {
                       // handle the response
                   })
                   .catch(error => {
                       // handle the error
                   });
           });
       </script>
       <script>
           function paypalButtonRender(price,currency){
               paypal.Buttons({
                   style: {
                       color:   'white',
                   },
                   createOrder: function(data, actions) {
                       return actions.order.create({
                           purchase_units: [{
                               amount: {
                                   value: price,
                                   "currency_code": currency,
                                   "breakdown": {
                                       "item_total": {
                                           "currency_code": currency,
                                           "value": price
                                       }
                                   }
                               },
                               items: [{
                                   name: 'Item 1',
                                   quantity: 1,
                                   unit_amount: {
                                       currency_code: currency,
                                       value: price
                                   }
                               }]
                           }]
                       });
                   },
                   onApprove: function(data, actions) {
                       return actions.order.capture().then(function(details) {
                           let product_id = $(".product-item-selected").data("prid");
                           details['u2_id'] = 6;
                           details['order_id'] = '<?php echo $order_id; ?>';
                           createOfflineOrder(details);
                           window.location = "./thanks.php?lang=fr";
                       });
                   },
                   onError: function(err) {
                       console.log('Error occurred:', err);
                   }
               }).render('#pay_with_sanfort_container');
           }
           function round(num, decimalPlaces = 0) {
               if (num < 0)
                   return -round(-num, decimalPlaces);
               var p = Math.pow(10, decimalPlaces);
               var n = num * p;
               var f = n - Math.floor(n);
               var e = Number.EPSILON * n;

               // Determine whether this fraction is a midpoint value.
               return (f >= .5 - e) ? Math.ceil(n) / p : Math.floor(n) / p;
           }
           function createOfflineOrder(data){
               $.ajax({
                   url: "./api/proccess.php?action=create_pay_upsell",
                   data: data,
                   dataType: 'JSON',
                   method: 'POST',
                   success: function (data) {
                       layerStop();
                       if(data.response){
                           window.location = "./u1.php?lang=fr";
                       }
                       else{
                           alert(data.error);
                       }
                   },
               });
           }
           $(document).ready(function(){
               let price_unit = '<?php echo $price; ?>';
               let currency = <?php echo $all_products[$lang][6]['currency']; ?>;
               paypalButtonRender(price_unit,currency);
           });
       </script>
       <script>
        $(document).ready(function(){
        $(document).on('submit', '#u2frm', function (e) {
        e.preventDefault();
            layerStart();
        var obj = $(this);
        var formData = $(this).serializeArray();
        $.ajax({
            url: "api/proccess.php?action=create_upsell",
            data: formData,
            dataType: 'JSON',
            method: 'POST',
            success: function (data) {
                if(data.response){
                    layerStop();
                    window.location = "./thanks.php?lang=fr";
                   
                }
            },
            
        });
        });
            $(document).on('submit', '#paypal_u1frm', function () {
                layerStart();
                var obj = $(this);
                var formData = $(this).serializeArray();
                $.ajax({
                    url: "api/proccess.php?action=create_pay_upsell",
                    data: formData,
                    dataType: 'JSON',
                    method: 'POST',
                    success: function (data) {
                        layerStop();
                        if(data.response){
                            window.location = "./thanks.php?lang=fr";
                        }
                    },

                });
            })
        });
        function layerStart(){
            $.LoadingOverlay("show", {
                image: "",
                fontawesome: "fa fa-cog fa-spin"
            });
        }
        function layerStop(){
            $.LoadingOverlay("hide", {
                image: "",
                fontawesome: "fa fa-cog fa-spin"
            });
        }
</script>
</body>
</html>
<?php 
} 
else{
    header('Location: '.BASE_URL.'/rf394j.php?lang=fr');
  exit();
}
?>