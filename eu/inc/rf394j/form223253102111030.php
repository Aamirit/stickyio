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
                        <input autocomplete="off" data-fv-not-empty___message="Entrez votre prénom s'il vous plait" required="" type="text" class="form-control" name="firstname" value="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo nametitle; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="Veuillez entrer votre nom de famille" required="" type="text" class="form-control" name="lastname" value="">
                     </div>
                  </div>
               </div>
               <div class="row">
               <div class="col-md-6">
               <div class="mb-3 ">
                  <label class="form-label"> <?php echo tel; ?> <span class="text-danger">*</span>
                  </label>
                  <input pattern="^[0-9]{6,}$" data-fv-not-empty___message="Veuillez entrer votre numéro de téléphone" data-fv-regexp___message="Votre numéro de téléphone contient des caractères non valides. Veuillez n'entrer que des chiffres." inputmode="numeric" required="" type="text" class="form-control" name="phone" value="">
               </div>
                </div>

               <div class="col-md-6" >
               <div class="mb-3 ">
                  <label class="form-label"> Adresse email <span class="text-danger">*</span>
                  </label>
                  <input data-fv-not-empty___message="Veuillez saisir votre adresse e-mail" data-fv-email-address___message="Veuillez saisir une adresse e-mail valide" required="" type="email" class="form-control" name="email" value="">
               </div>
               </div>
               </div>

               <div class="mb-3 ">
                  <label class="form-label"> <?php  echo adress1; ?> <span class="text-danger">*</span>
                  </label>
                  <input autocomplete="off" data-fv-not-empty___message="Veuillez entrer votre rue" data-fv-regexp___message="customer.street.invalid" required="" type="text" class="form-control" id="street" name="address" value="" maxlength="50">
               </div>
               <div class="row">
                  <div class="col-5 col-md-4">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo postal; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="S'il vous plait, entrer votre code postal" data-fv-regexp___message="S'il vous plait, entrer votre code postal" required="" type="text" class="form-control" id="zipCode" name="zip" value="">
                     </div>
                  </div>
                  <div class="col-7 col-md-8">
                     <div class="mb-3 ">
                        <label class="form-label"> <?php echo city; ?> <span class="text-danger">*</span>
                        </label>
                        <input autocomplete="off" data-fv-not-empty___message="Veuillez entrer votre ville" required="" type="text" class="form-control" id="city" name="city" value="">
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-6 col-md-6">
                     <label class="form-label"> <?php echo spays; ?> <span class="text-danger">*</span>
                     </label>
                     <select class="form-control" id="id_country" name="country" required="required">
                        <option value="FR" class="different option" selected="selected">France</option>
                        <option value="BE" class="different option">Belgium</option>
                        <option value="CH" class="different option">Switzerland</option>
                        <option value="LU" class="different option">Luxembourg</option>
                     </select>
                  </div>
                  <div id="state-container" class="col-6 col-md-6">
                  </div>
               </div>

               <div class="mt-1 mb-1 text-muted small text-center">
                  <i class="fa fa-lock"></i> Vos données personnelles sont sures et cryptées
               </div>
            </div>
            <div class="col-md-6">
               <div class="border-bottom mb-3 text-center mb-0">
                  <h3> Étape 2 : </h3>
                  <h5> Mode de paiement </h5>
               </div>
               <div id="error-message" style="display:none;background-color:red;color:white;padding:10px;font-weight:bold;margin-bottom:20px;">
               </div>
               <ul class="payment-options list-unstyled">
                  <li>

                    <div class="mt-4 flex space-x-4 items-center cursor-pointer">
                    <input id="credit_card" name="payment_method" type="radio" class="focus:ring-orange-500 h-4 w-4 text-orange-500 border-gray-300" value="credit_card" checked="">
                    <div class="flex space-x-1 items-center">
                    <div class="flex flex-col space-y-1"><div class="flex space-x-1 items-center"><div class="rounded border">
                    <img src="../img/71a20f5a6c5413cb6973c9de6142e23a022a37ab62ce41ad2ac6abb420a46fc0.svg" width="50">
                    </div>
                    <div class="rounded border"><img src="../img/2659ae94c062303bc1e52715342bdcb307c19b65ffa10a48adb70dfd76843adf.svg" width="50">
                    </div>
                    <div class="rounded border overflow-hidden">
                    <img src="../img/cb.jpeg" width="50"></div><label for="credit_card" class="block font-medium text-gray-900 pl-2">Bank card</label>
                    </div><div></div></div></div></div>

                     <div class="row">
                        <div class="col-md-8">
                           <div class="mb-3 ">
                              <label class="form-label"> Numéro de Carte <span class="text-danger">*</span>
                              </label>
                              <input inputmode="numeric" required="" type="number" class="form-control" id="card_number" name="ccnumber">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="mb-3 ">
                              <label class="form-label"> Date d'expiration <span class="text-danger">*</span>
                              </label>
                              <select class="form-control" id="card_exp_month" name="expdatem" required="required">
                                 <option value="">Mois</option>
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
                                 <option value="">Année</option>
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

                     <div class="mt-4 flex space-x-4 items-center border-t pt-4 cursor-pointer">
                     <input id="klarna" name="payment_method" type="radio" class="focus:ring-orange-500 h-4 w-4 text-orange-500 border-gray-300" value="klarna">
                     <div class="flex space-x-1 items-center">
                     <div class="flex flex-col space-y-1">
                     <div class="overflow-hidden">
                     <img src="../img/klarna.svg" width="60">
                     </div>
                     <div>
                     <span class="text-sm text-gray-500">Pay later and/or Pay in 3 installments without interest.</span>
                     </div>
                     </div>
                     </div>
                     </div>



                  </li>
               </ul>
               <div class="neos-contentcollection"></div>
               <div class="d-grid mt-3">
                  <button type="submit" class="btn btn-primary btn-block btn-lg mb-2 mt-2">
                  <i class="fa fa-arrow-circle-right"></i> Commander </button>
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
