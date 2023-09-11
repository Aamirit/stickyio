<?php
  if(isset($_GET['errorFound']) && $_GET['errorFound'] == 1){
      echo $_GET['orderId'];
      exit;
  }
$aff_id = "";
if(!empty($_GET['aff'])){
    $aff_id = $_GET['aff'];
}
$fundingsource = "sofort,giropay,bancontact,ideal,paylater";

?>
<style>
   .respback {
  border: 1px solid;
}
.coupon-resp.text-primary {
  padding: 10px;
}
   .card-body {
   padding: 20px;
   }
   .fa-check:before {
   display: none;
   }
   .fa-times:before {
   display: none;
   }
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
   .paypal_btn_style{
   width: 100%;
   margin: auto;
   display: flex;
   justify-content: center;
   }
   .paypal_btn_style button:hover{
   color: white;
   }
   .pb-20{
   padding-bottom: 20px;
   }
   #jsx-iframe-de730ef01e .paypal-button-number-0{
       display: none !important;
   }
</style>
<!-- id="checkout-form" -->
<!--<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&components=buttons,payment-fields,marks,funding-eligibility&enable-funding=sofort&currency=EUR"></script>-->
<div class="card checkout-form mb-3 mt-3">
   <form name="order-form" class="checkout-form-fr" id="chec-form"  method="post" action="./api/proccess.php?action=create_order">
      <input type="hidden" name="_token" value="0aDBFpT4AknMfj7wjzBELdXCLlAAgu0nLjjqMbVY">
      <input type="hidden" id="offerspackage" name="offers[]" value="15">
      <input type="hidden" name="prd_id" value="3" id="prd_id" class="hdn_val">
       <input type="hidden" name="compaign_id" value="<?php echo $all_products[$lang][3]['campaign_id']; ?>"  class="compaign_id">
      <input type="hidden" name="amount" value="9495" id="amount">
      <div style="display: none">
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
               <div class="border-bottom mb-3 text-center">
                  <h3> <?php  echo step1; ?> : </h3>
                  <h5> <?php  echo info1; ?> </h5>
               </div>
               <!--                    <div class="row mb-3">-->
               <!--                        <div class="col-3">-->
               <!--                            <div class="form-check">-->
               <!--                                <input class="form-check-input" id="customerGenderMale" type="radio" name="gender" value="male" checked="">-->
               <!--                                <label class="form-check-label" for="customerGenderMale"> Monsieur </label>-->
               <!--                            </div>-->
               <!--                        </div>-->
               <!--                        <div class="col-3">-->
               <!--                            <div class="form-check">-->
               <!--                                <input class="form-check-input" id="customerGenderFemale" type="radio" name="gender" value="female">-->
               <!--                                <label class="form-check-label" for="customerGenderFemale"> Madame </label>-->
               <!--                            </div>-->
               <!--                        </div>-->
               <!--                    </div>-->
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo firstname; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="<?php echo mailos1; ?>" required="" type="text" class="form-control" name="firstname" value="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo nametitle; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="<?php echo mailos2; ?>" required="" type="text" class="form-control" name="lastname" value="">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo tel; ?> <span class="text-danger">*</span>
                        </label>
                        <input pattern="^[0-9]{6,}$" data-fv-not-empty___message="<?php echo mailos3; ?>" data-fv-regexp___message="<?php echo mailos4; ?>" inputmode="numeric" required="" type="text" class="form-control" name="phone" value="">
                     </div>
                  </div>
                  <div class="col-md-6" >
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo mailos; ?> <span class="text-danger">*</span>
                        </label>
                        <input data-fv-not-empty___message="<?php echo mailos5; ?>" data-fv-email-address___message="<?php echo mailos6; ?>" required="" type="email" class="form-control" name="email" value="">
                     </div>
                  </div>
               </div>
               <div class="mb-3 ">
                  <label class="form-label"> <?php  echo adress1; ?> <span class="text-danger">*</span>
                  </label>
                  <input autocomplete="off" data-fv-not-empty___message="<?php echo mailos7; ?>" data-fv-regexp___message="customer.street.invalid" required="" type="text" class="form-control" id="street" name="address" value="" maxlength="50">
               </div>
                <input type="hidden" name="aff_id" value="<?php echo $aff_id; ?>">
               <div class="row">
                  <div class="col-5 col-md-4">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo postal; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="<?php echo mailos8; ?>" data-fv-regexp___message="<?php echo mailos9; ?>" required="" type="text" class="form-control" id="zipCode" name="zip" value="">
                     </div>
                  </div>
                  <div class="col-7 col-md-8">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo city; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="<?php echo mailos10; ?>" required="" type="text" class="form-control" id="city" name="city" value="">
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-6 col-md-6">
                     <label class="form-label"> <?php echo spays; ?> <span class="text-danger">*</span>
                     </label>
                     <select class="form-control" id="id_country" name="country" required="required">
                        <option value="<?php echo forcepays2;?>" class="different option" selected="selected"><?php echo forcepays;?></option>
                        <option value="DE" class="different option"><?php echo Allemagne;?></option>
                        <option value="AD" class="different option"><?php echo Andorre;?></option>
                        <option value="AR" class="different option"><?php echo Argentine;?></option>
                        <option value="AU" class="different option"><?php echo Australie;?></option>
                        <option value="AT" class="different option"><?php echo Autriche;?></option>
                        <option value="BE" class="different option"><?php echo Belgique;?></option>
                        <option value="BO" class="different option"><?php echo Bolivie;?></option>
                        <option value="CA" class="different option"><?php echo Canada;?></option>
                        <option value="CL" class="different option"><?php echo Chili;?></option>
                        <option value="CY" class="different option"><?php echo Chypre;?></option>
                        <option value="CO" class="different option"><?php echo Colombie;?></option>
                        <option value="CR" class="different option"><?php echo CostaRica;?></option>
                        <option value="HR" class="different option"><?php echo Croatie;?></option>
                        <option value="DK" class="different option"><?php echo Danemark;?></option>
                        <option value="DO" class="different option"><?php echo DominicanRepublic;?></option>
                        <option value="EC" class="different option"><?php echo Ecuador;?></option>
                        <option value="SV" class="different option"><?php echo ElSalvador;?></option>
                        <option value="AE" class="different option"><?php echo EmiratsArabesUnis;?></option>
                        <option value="ES" class="different option"><?php echo Espagne;?></option>
                        <option value="EE" class="different option"><?php echo Estonie;?></option>
                        <option value="FJ" class="different option"><?php echo Fidji;?></option>
                        <option value="FI" class="different option"><?php echo Finlande;?></option>
                        <option value="FR" class="different option"><?php echo France;?></option>
                        <option value="GR" class="different option"><?php echo Grece;?></option>
                        <option value="GP" class="different option"><?php echo Guadeloupe;?></option>
                        <option value="GT" class="different option"><?php echo Guatemala;?></option>
                        <option value="GF" class="different option"><?php echo Guyane;?></option>
                        <option value="HK" class="different option"><?php echo HongKong;?></option>
                        <option value="HU" class="different option"><?php echo Hongrie;?></option>
                        <option value="HN" class="different option"><?php echo Honduras;?></option>
                        <option value="IS" class="different option"><?php echo Iceland;?></option>
                        <option value="IN" class="different option"><?php echo Inde;?></option>
                        <option value="IE" class="different option"><?php echo Irlande;?></option>
                        <option value="IT" class="different option"><?php echo Italie;?></option>
                        <option value="RE" class="different option"><?php echo LaReunion;?></option>
                        <option value="LV" class="different option"><?php echo Lettonie;?></option>
                        <option value="LT" class="different option"><?php echo Lituanie;?></option>
                        <option value="LU" class="different option"><?php echo Luxembourg;?></option>
                        <option value="MT" class="different option"><?php echo Malte;?></option>
                        <option value="MQ" class="different option"><?php echo Martinique;?></option>
                        <option value="YT" class="different option"><?php echo Mayotte;?></option>
                        <option value="MC" class="different option"><?php echo Monaco;?></option>
                        <option value="NC" class="different option"><?php echo NouvelleCaledonie;?></option>
                        <option value="NZ" class="different option"><?php echo NouvelleZelande;?></option>
                        <option value="NL" class="different option"><?php echo PaysBas;?></option>
                        <option value="PL" class="different option"><?php echo Pologne;?></option>
                        <option value="PF" class="different option"><?php echo Polynesie;?></option>
                        <option value="PT" class="different option"><?php echo Portugal;?></option>
                        <option value="CZ" class="different option"><?php echo RepubliqueTcheque;?></option>
                        <option value="RO" class="different option"><?php echo Roumanie;?></option>
                        <option value="GB" class="different option"><?php echo RoyaumeUni;?></option>
                        <option value="BL" class="different option"><?php echo SaintBarthelemy;?></option>
                        <option value="MF" class="different option"><?php echo SaintMartin;?></option>
                        <option value="PM" class="different option"><?php echo SaintPierreetMiquelon;?></option>
                        <option value="SK" class="different option"><?php echo Slovaquie;?></option>
                        <option value="SI" class="different option"><?php echo Slovenie;?></option>
                        <option value="SE" class="different option"><?php echo Suede;?></option>
                        <option value="CH" class="different option"><?php echo Suisse;?></option>
                        <option value="US" class="different option"><?php echo USA;?></option>
                        <option value="WF" class="different option"><?php echo WallisetFutuna;?></option>
                     </select>
                  </div>
                  <div id="state-container" class="col-6 col-md-6">
                  </div>
               </div>
               <div class="mt-1 mb-1 text-muted small text-center">
                  <i class="fa fa-lock"></i> <?php echo mailos11; ?>
               </div>
            </div>
            <div class="col-md-6">
               <div class="border-bottom mb-3 text-center mb-0">
                  <h3> <?php echo mailos12; ?> : </h3>
                  <h5> <?php echo mailos13; ?> </h5>
               </div>
               <div id="error-message" style="display:none;background-color:red;color:white;padding:10px;font-weight:bold;margin-bottom:20px;">
               </div>
               <ul class="payment-options list-unstyled">
                  <li>
                     <div class="form-check mb-3">
                        <input class="form-check-input select_payment_method" id="payment-stripeCheckout" type="radio" name="payment_method" value="credit_card" checked="">
                        <label for="payment-stripeCheckout" class="mb-0 form-check-label">
                        <img src="img/stripeCheckout.png" style="margin-left:10px;">
                        <img style="height: 25px;margin-right:10px;" src="img/bleu.webp" title="Carte Bancaires" alt="Carte Bancaires Logo"> <b><?php echo mailos14; ?></b>
                        </label>
                     </div>
                     <div class="credit_card payment_methods_row">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="mb-3 ">
                                 <label class="form-label"> <?php echo mailos15; ?> <span class="text-danger">*</span>
                                 </label>
                                 <input inputmode="numeric" required="" type="number" class="form-control" id="card_number" name="ccnumber">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <label class="form-label"> <?php echo mailos16; ?><span class="text-danger">*</span>
                              </label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="mb-3 ">
                                 <select class="form-control" id="card_exp_month" name="expdatem" required="required">
                                    <option value=""><?php echo mailos17; ?></option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="mb-3 ">
                                 <select class="form-control" id="card_exp_year" name="expdatey" required="required">
                                    <option value=""><?php echo mailos18; ?></option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                         <input value="credit_card" type="hidden" id="payment_type" name="payment_type">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="mb-3 ">
                                 <label class="form-label">CVV <span class="text-danger">*</span>
                                 </label>
                                 <input inputmode="numeric" required="" type="number" class="form-control" id="card_cvv" name="cvv" value="" minlength="3" maxlength="4">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-check mb-3">
                        <input class="form-check-input select_payment_method" id="payment-paypal" type="radio" name="payment_method" value="paypal">
                        <label for="payment-paypal" class="mb-0 form-check-label">
                        Pay With <img src="img/paypal_logo.svg" style="margin-left:10px;">
                        </label>
                     </div>
                     <div class="paypal payment_methods_row d-none pb-20">
                         <button id="pay_with_paypal" type="button" class="btn btn-primary btn-block btn-lg mb-2 mt-2 paypal_btn_style">
                        Pay With  <img src="img/paypal_logo.svg" style="margin-left:10px;">
                        </button>
                     </div>
                     <div class="form-check mb-3">
                        <input id="klarna" name="payment_method" type="radio" class="form-check-input select_payment_method" value="klarna">
                        <label for="payment-stripeCheckout" class="mb-0 form-check-label">
                        <img style="height: 25px;margin-right:10px;" src="img/klarna.svg" title="klarna" alt="klarna"> <b><?php echo mailos19; ?></b>
                        </label>
                     </div>
                     <div class="klarna payment_methods_row d-none pb-20">
                     </div>
                      <div class="klarna payment_methods_row d-none pb-20">
                         <div id="klarna-payments-container">

                         </div>
                      </div>

                      <div class="form-check mb-3">
                          <input class="form-check-input select_payment_method"  type="radio" name="payment_method" value="sanfort">
                          <label for="payment-paypal" class="mb-0 form-check-label">
                              Pay with <img width="100px" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQwIiBoZWlnaHQ9IjkwIiB2aWV3Qm94PSIwIDAgMjQwIDkwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDomI3gyRjsmI3gyRjt3d3cudzMub3JnJiN4MkY7MjAwMCYjeDJGO3N2ZyI+PHBhdGggZD0iTTIyNS4wMjMgOTBIMEwxNC45NzY4IDBIMjQwTDIyNS4wMjMgOTBaIiBmaWxsPSIjMzkzQTQxIj48L3BhdGg+PHBhdGggZD0iTTc0LjAzNDEgMzBDNjMuOTI1MyAzMCA1Ni4yNTExIDM3LjQ2MDMgNTYuMjUxMSA0Ni4zNDkyQzU2LjI1MTEgNTQuMzkxNSA2Mi41NDkzIDYwIDcxLjEyMzIgNjBDODEuMjMyIDYwIDg4Ljg1MzMgNTIuMzI4IDg4Ljg1MzMgNDMuNDM5MkM4OC45MDYyIDM1LjM0MzkgODIuNjA4MSAzMCA3NC4wMzQxIDMwWk03MS43NTgzIDUyLjQzMzlDNjcuODk0OCA1Mi40MzM5IDY1LjE5NTYgNDkuODk0MiA2NS4xOTU2IDQ1Ljk3ODhDNjUuMTk1NiA0MS42NDAyIDY4LjUyOTkgMzcuNTEzMiA3My4zNDYxIDM3LjUxMzJDNzcuMjA5NyAzNy41MTMyIDc5LjkwODkgNDAuMTU4NyA3OS45MDg5IDQ0LjA3NDFDNzkuOTYxOCA0OC40NjU2IDc2LjU3NDYgNTIuNDMzOSA3MS43NTgzIDUyLjQzMzlaIiBmaWxsPSIjRURFREVEIj48L3BhdGg+PHBhdGggZD0iTTEzNC44NDYgMzBDMTI0LjczNyAzMCAxMTcuMTE2IDM3LjQ2MDMgMTE3LjExNiA0Ni4zNDkyQzExNy4xMTYgNTQuMzkxNSAxMjMuNDE0IDYwIDEzMS45ODggNjBDMTQyLjA5NiA2MCAxNDkuNzE4IDUyLjMyOCAxNDkuNzE4IDQzLjQzOTJDMTQ5Ljc3MSAzNS4zNDM5IDE0My40NzMgMzAgMTM0Ljg0NiAzMFpNMTMyLjYyMyA1Mi40MzM5QzEyOC43NTkgNTIuNDMzOSAxMjYuMDYgNDkuODk0MiAxMjYuMDYgNDUuOTc4OEMxMjYuMDYgNDEuNjQwMiAxMjkuMzk0IDM3LjUxMzIgMTM0LjIxMSAzNy41MTMyQzEzOC4wNzQgMzcuNTEzMiAxNDAuNzczIDQwLjE1ODcgMTQwLjc3MyA0NC4wNzQxQzE0MC43NzMgNDguNDY1NiAxMzcuNDM5IDUyLjQzMzkgMTMyLjYyMyA1Mi40MzM5WiIgZmlsbD0iI0VERURFRCI+PC9wYXRoPjxwYXRoIGQ9Ik0xNzkuNDYyIDM5LjQ3MDlDMTc5LjQ2MiAzNC4wNzQxIDE3NS4yODEgMzAuNjM0OSAxNjcuNjYgMzAuNjM0OUgxNTYuOTY5TDE1Mi4yNTggNTkuMzY1MUgxNjEuMjU2TDE2Mi43MzcgNTAuMzE3NUgxNjMuMTYxTDE2Ny45MjQgNTkuMzY1MUgxNzguMjQ1TDE3MS42MjkgNDkuMzEyMkMxNzYuNTUxIDQ3LjYxOSAxNzkuNDYyIDQzLjk2ODMgMTc5LjQ2MiAzOS40NzA5Wk0xNjUuMDY2IDQ0LjIzMjhIMTYzLjc0M0wxNjQuNzQ5IDM4LjIwMTFIMTY1Ljk2NkMxNjguNzcxIDM4LjIwMTEgMTcwLjI1MyAzOS4wNDc2IDE3MC4yNTMgNDAuODk5NUMxNzAuMjUzIDQzLjA2ODggMTY4LjEzNiA0NC4yMzI4IDE2NS4wNjYgNDQuMjMyOFoiIGZpbGw9IiNFREVERUQiPjwvcGF0aD48cGF0aCBkPSJNNDUuOTMwNiA0Mi4xMTY0QzQyLjQ5MDQgNDAuMzcwNCA0MS43NDk1IDM5Ljk0NzEgNDEuNzQ5NSAzOC45OTQ3QzQxLjc0OTUgMzcuODMwNyA0My4xMjU2IDM3LjI0ODcgNDQuOTc3OSAzNy4yNDg3QzQ3LjE0NzkgMzcuMjQ4NyA1MC40MjkzIDM3LjUxMzIgNTMuNjU3NyA0MC41ODJDNTQuNDUxNiAzOC4wOTUyIDU1Ljc3NDggMzUuODczIDU3LjQ2ODQgMzMuOTE1M0M1Mi45MTY4IDMxLjMyMjggNDguNjgyNyAzMCA0NC44MTkyIDMwQzM3LjE0NSAzMCAzMi42OTkyIDM0LjEyNyAzMi42OTkyIDM5LjEwMDVDMzIuNjk5MiA0My4zODYyIDM1LjkyNzcgNDUuNjA4NSAzOS43MzgzIDQ3LjU2NjFDNDMuMTc4NSA0OS4zMTIyIDQ0LjAyNTMgNDkuODk0MiA0NC4wMjUzIDUwLjk1MjRDNDQuMDI1MyA1Mi4xMTY0IDQyLjU5NjMgNTIuNzUxMyA0MC42OTEgNTIuNzUxM0MzNy40MDk2IDUyLjc1MTMgMzMuNTk4OSA1MC42ODc4IDMxLjMyMzEgNDguNTcxNEwzMCA1Ni41NjA4QzMyLjMyODcgNTguMjU0IDM1LjcxNiA2MCA0MC44NDk4IDYwQzQ4Ljc4ODYgNjAgNTMuMDc1NiA1NS45Nzg4IDUzLjA3NTYgNTAuODQ2NkM1My4wNzU2IDQ2LjYxMzggNTAuMzIzNCA0NC4zMzg2IDQ1LjkzMDYgNDIuMTE2NFoiIGZpbGw9IiNFREVERUQiPjwvcGF0aD48cGF0aCBkPSJNMTEyLjYxNyA0My4yMjc1SDEwMi4wMzJMMTAyLjg3OSAzOC4yMDExSDExNC4yMDVDMTE1LjY4NyAzNS4xODUyIDExNy45NjIgMzIuNTkyNiAxMjAuNzY3IDMwLjYzNDlIMTAyLjI0M0M5OC4xMTUzIDMwLjYzNDkgOTQuNjIyMiAzMy40MzkyIDk0LjA0IDM3LjI0ODdMOTAuNDQxIDU5LjQxOEg5OS40Mzg0TDEwMC45MiA1MC4zNzA0SDExMS42MTFMMTEyLjQwNSA0NS40NDk3QzExMi40NTggNDQuNjU2MSAxMTIuNTExIDQzLjk2ODMgMTEyLjYxNyA0My4yMjc1WiIgZmlsbD0iI0VERURFRCI+PC9wYXRoPjxwYXRoIGQ9Ik0xNzkuNjc0IDMwLjYzNDlDMTgyLjEwOCAzMi40ODY4IDE4My41OSAzNS4wNzk0IDE4My45MDggMzguMjAxMUgxOTEuNDIzTDE4Ny45ODMgNTkuMzY1MUgxOTYuOThMMjAwLjQyIDM4LjIwMTFIMjA4Ljc4M0wyMTAgMzAuNjM0OUgxNzkuNjc0WiIgZmlsbD0iI0VERURFRCI+PC9wYXRoPjwvc3ZnPg" alt="" class="paypal-logo paypal-logo-sofort paypal-logo-color-black">
                          </label>
                      </div>
                      <div id="pay_with_sanfort_container" class="sanfort payment_methods_row d-none pb-20">

                      </div>


                  </li>
               </ul>
               <div class="neos-contentcollection"></div>
               <div class="d-grid mt-3">
                  <button id="order_submit_btn" type="submit" class="btn btn-primary btn-block btn-lg mb-2 mt-2">
                  <i class="fa fa-arrow-circle-right"></i> <?php echo mailos20; ?> </button>
               </div>
               <img class="img-fluid mt-1 mb-1" src="../img/Signs.jpg" alt="">
               <div class="mt-3 d-grid">
                  <button id="toggle_discount_btn" class="btn btn-outline-secondary" type="button" onclick="toggleCouponForm()"> Avez-vous reçu un code de réduction ? </button>
               </div>
               <div id="coupon-form" class="card mt-2" style="display: none;">
                  <div class="card-body">
                     <div class="coupon-form">
                        <div class="input-group">
                           <input placeholder="Code de réduction" type="text" class="form-control" id="couponCode1" name="discount_code">
                           <div class="input-group-addon p-0">
                              <a style="color: white" id="coupn_submit" data-locale="fr_FR" class="btn-block btn btn-secondary" >
                              <i class="fa fa-arrow-circle-right"></i> Envoyer </a>
                           </div>
                        </div>
                        <p class="mt-3 coupon-error text-danger" style="display: none;">
                           <i class="fa fa-warning"></i> Veuillez entrer un code de réduction valable svp
                        </p>
                        <div class="new-price text-success" style="display: none"> Contribution réussie ! Nouveau montant total : <br>
                           <strong></strong>
                        </div>
                     </div>
                  </div>
               </div>
                <span class="coupon-resp text-primary"></span>
            </div>
         </div>
      </div>
   </form>
   <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
     <script src="https://www.paypal.com/sdk/js?client-id=ARpwn_WrDUK6pQpvzQIMLpCaj85fktud-DT7foGFjoZ-p0iX0SL-RaBqT8eLib8B_wVNQKoRPG5RMLtT&enable-funding=<?php echo $fundingsource; ?>&currency=<?php echo $all_products[$lang][3]['currency']; ?>&components=buttons,funding-eligibility&disable-funding=credit,card"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script type="text/javascript" src="https://x.klarnacdn.net/kp/lib/v1/api.js"></script>
    <form id="paypal_form" method="post" action="./api/proccess.php?action=create_paypal_order">
        <input type="hidden" name="aff_id" value="<?php echo $aff_id; ?>">
        <input type="hidden" class="paypal_compaign_id" value="<?php echo $all_products[$lang][3]['paypal_compaign_id']; ?>" name="compaign_id">
        <input type="hidden" id="selected_paypal_product" value="3" name="prd_id">
    </form>
</div>
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
                    details['product_id'] = product_id;
                    details['compaign_id'] = $(".product-item-selected").data('paypal-compaign_id');
                    createOfflineOrder(details);
                     window.location = "./u1.php?lang=fr";
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
            url: "./api/proccess.php?action=create_offline_order",
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
    let price_unit = $(".product-item-selected").data("price");
    price_unit = price_unit*3;
    price_unit = round(price_unit, 2);
    let currency = $(".product-item-selected").data("currency");
    paypalButtonRender(price_unit,currency);
});
$(document).on('click', '#coupn_submit', function(e){
    e.preventDefault();
    layerStart();
     var form = $('#chec-form');
    var formData = form.serialize();
    $.ajax({
       url: "./api/proccess.php?action=get_discount",
       data: formData,
       dataType: 'JSON',
       method: 'POST',
       success: function (data) {
          layerStop();
           if(data.response){
            $(".coupon-resp").html(data.discount_value)
           }
         
       },
   });
});

$(document).on('click','.product-item',function (){
   $("#pay_with_sanfort_container").html("");
    let product_id = $(this).data('prid');
    let price_unit = $(".product-item-selected").data("price");
    let currency = $(".product-item-selected").data("currency");
   if(product_id == 2){
       paypalButtonRender(price_unit,currency);
   } else if(product_id == 3){
       price_unit = price_unit*3;
       price_unit = round(price_unit, 2);
       paypalButtonRender(price_unit,currency);
   } else {
        price_unit = price_unit*2;
       price_unit = round(price_unit, 2);
       paypalButtonRender(price_unit,currency);
   }
});
</script>

<script>
   function toggleCouponForm() {
       var couponForm = document.getElementById("coupon-form");
       if (couponForm.style.display === "none") {
           couponForm.style.display = "block";
       } else {
           couponForm.style.display = "none";
       }
   }
</script>

<script type="text/javascript" async>
   $(document).ready(function(){
      $('a[href="#chec-form"]').on("click",function(){
         const selectedProducts = $(".product-item-selected").data("prid");
          generate_token(selectedProducts);
      })
   })  
    generate_token(3);
   function generate_token(product_id){
      $.ajax({
          url: "./api/proccess.php?action=generate_token&product_id="+product_id,
          data: {},
          dataType: 'JSON',
          method: 'POST',
          success: function (data) {
              klarnaBtn(data.client_id);
          }
      });
  }
   function klarnaBtn(clientToken){
       try {
           Klarna.Payments.init({
               client_token:clientToken
           });
           Klarna.Payments.load({
               container: '#klarna-payments-container',
               payment_method_category: 'pay_over_time',

           }, function (res) {
               console.debug(res);
           });
       } catch (e) {
           alert("error");
       }
   }
   $(function(){
  	$("body").on('click','button.authorize', function(){
		Klarna.Payments.authorize({
	  		payment_method_category: 'pay_over_time'
			}, {
			  billing_address: {
			    given_name: "Jane",
			    family_name: "Doe",
			    email: "jane@doe.com",
			    title: "Ms",
			    street_address: "512 City Park Ave",
			    postal_code: "43215",
			    city: "Columbus",
				region: "oh",
				phone: "6142607295",
			    country: "GB"
			  },
			  order_amount: 20000,
			  order_tax_amount: 0,
			  order_lines: [{
				type : "physical",
				reference : "19-402",
				name : "black T-Shirt",
				quantity : 2,
				unit_price : 5000,
				tax_rate : 0,
				total_amount : 10000,
				total_discount_amount : 0,
				total_tax_amount : 0
			},
			{
			type : "physical",
			reference : "19-402",
			name : "red trousers",
			quantity : 1,
			unit_price : 10000,
			tax_rate : 0,
			total_amount : 10000,
			total_discount_amount : 0,
			total_tax_amount : 0
    		}],
			 }, function(res) {

				console.log("Response from the authorize call:")
			 	console.log(res)
            if(res.approved){
               $.ajax({
                  url: "./api/proccess.php?action=create_kalarna_order",
                  data: {},
                  dataType: 'JSON',
                  method: 'POST',
                  success: function (data) {

                  },
               });
            }

			})
	})
  })
   $(document).ready(function(){
       $(".select_payment_method").click(function (){
          let selcted_class = $(this).val();
          $("#payment_type").val(selcted_class);
          if(selcted_class === 'credit_card' || selcted_class === 'paypal'){
              $("#order_submit_btn").removeClass("authorize");
              $("#order_submit_btn").attr("type","submit");
          } else {
              $("#order_submit_btn").addClass("authorize");
              $("#order_submit_btn").attr("type","button");
          }
          if(selcted_class === 'paypal'){
              $("#order_submit_btn").addClass("d-none");
          } else {
              $("#order_submit_btn").removeClass("d-none");
          }
          $(".payment_methods_row").not(`.${selcted_class}`).addClass("d-none");
           $(`.${selcted_class}`).removeClass(`d-none`);
       });
   $(document).on('submit', '#chec-form', function (e) {
   e.preventDefault();
       layerStart();
       $("#prd_id").val($(".product-item-selected").data('prid'));
       $(".compaign_id").val($(".product-item-selected").data('compaign_id'));
   var obj = $(this);
   var formData = $(this).serializeArray();
   $.ajax({
       url: "./api/proccess.php?action=create_order",
       data: formData,
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
   });
   
   $("#pay_with_paypal").click(function (){
       layerStart();
       $("#selected_paypal_product").val($(".product-item-selected").data('prid'));
       $(".paypal_compaign_id").val($(".product-item-selected").data('paypal-compaign_id'));
       $("#paypal_form").submit();
   });
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