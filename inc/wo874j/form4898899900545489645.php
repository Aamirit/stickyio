<style>
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
</style>
<!-- id="checkout-form" -->
<div class="card checkout-form mb-3 mt-3">
   <form name="order-form" class="checkout-form-fr" id="chec-form"  method="post" action="./api/proccess.php?action=create_order">
      <input type="hidden" name="_token" value="0aDBFpT4AknMfj7wjzBELdXCLlAAgu0nLjjqMbVY">
      <input type="hidden" id="offerspackage" name="offers[]" value="15">
      <input type="hidden" name="prd_id" value="" id="prd_id" class="hdn_val">
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
                    <input class="form-check-input" id="payment-stripeCheckout" type="radio" name="payment_method" value="credit_card" checked="">
                    <label for="payment-stripeCheckout" class="mb-0 form-check-label">
                    <img src="../img/stripeCheckout.png" style="margin-left:10px;">
                    <img style="height: 25px;margin-right:10px;" src="../img/bleu.webp" title="Carte Bancaires" alt="Carte Bancaires Logo"> <b><?php echo mailos14; ?></b>
                    </label>
                    </div>

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
                        <div class="col-md-4">
                           <div class="mb-3 ">
                              <label class="form-label"> <?php echo mailos16; ?> <span class="text-danger">*</span>
                              </label>
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
                              <label class="form-label">
                              &nbsp;
                              </label>
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
                     <div class="row">
                        <div class="col-md-4">
                           <div class="mb-3 ">
                              <label class="form-label"> CVV <span class="text-danger">*</span>
                              </label>
                              <input inputmode="numeric" required="" type="number" class="form-control" id="card_cvv" name="cvv" value="" minlength="3" maxlength="4">
                           </div>
                        </div>
                     </div>




                     <div class="form-check mb-3">
                       <input id="klarna" name="payment_method" type="radio" class="form-check-input" value="klarna" checked="">
                     <label for="payment-stripeCheckout" class="mb-0 form-check-label">
                     <img style="height: 25px;margin-right:10px;" src="../img/klarna.svg" title="klarna" alt="klarna"> <b><?php echo mailos19; ?></b>
                     </label>
                     </div>



                  </li>
               </ul>
               <div class="neos-contentcollection"></div>
               <div class="d-grid mt-3">
                  <button type="submit" class="btn btn-primary btn-block btn-lg mb-2 mt-2">
                  <i class="fa fa-arrow-circle-right"></i> <?php echo mailos20; ?> </button>
               </div>
               <img class="img-fluid mt-1 mb-1" src="../img/Signs.jpg" alt="">
               <!--                    <div class="mt-3 d-grid">-->
               <!--                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#coupon-form"> Avez-vous reçu un code de réduction ? </button>-->
               <!--                    </div>-->
               <!--                    <div id="coupon-form" class="collapse card mt-2">-->
               <!--                        <div class="card-body">-->
               <!--                            <div class="coupon-form">-->
               <!--                                <div class="input-group">-->
               <!--                                    <input placeholder="Code de réduction" type="text" class="form-control" id="couponCode" name="discount_code">-->
               <!--                                    <div class="input-group-addon p-0">-->
               <!--                                        <a style="color: white" data-locale="fr_FR" class="btn-block btn btn-secondary">-->
               <!--                                            <i class="fa fa-arrow-circle-right"></i> Envoyer </a>-->
               <!--                                    </div>-->
               <!--                                </div>-->
               <!--                                <p class="mt-3 coupon-error text-danger" style="display: none;">-->
               <!--                                    <i class="fa fa-warning"></i> Veuillez entrer un code de réduction valable svp-->
               <!--                                </p>-->
               <!--                                <div class="new-price text-success" style="display: none"> Contribution réussie ! Nouveau montant total : <br>-->
               <!--                                    <strong></strong>-->
               <!--                                </div>-->
               <!--                            </div>-->
               <!--                        </div>-->
               <!--                    </div>-->
            </div>
         </div>
      </div>
   </form>
   <div id="loader" style="display:none;"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $("#chec-form").on("submit" , function(event) {
       const selectedProducts = $(".product-item-selected").data("prid");
      // alert(selectedProducts);
       $(".hdn_val").val(selectedProducts)
       });
   })

</script>
<script>
   $(document).ready(function(){
   $(document).on('submit', '#chec-form', function (e) {

   e.preventDefault();
   $('#loader').show();
   var obj = $(this);
   var formData = $(this).serializeArray();
   $.ajax({
       url: "./api/proccess.php?action=create_order",
       data: formData,
       dataType: 'JSON',
       method: 'POST',
       success: function (data) {
           $('#loader').hide();
           if(data.response){
               alert(data.msg)
               window.location = "./u1.php?lang=fr";
           }
           else{
            alert(data.error);
           }
       },

   });
   })
   });

</script>
