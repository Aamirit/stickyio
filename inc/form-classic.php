<form name="order" class="checkout-form-fr" id="checkout-form" action="https://figur-figur.com/fr/commander/order/checkout.html" method="post">
  <div style="display: none">
    <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[__referrer][@package]" value="Seven.Offerpage.Checkout" />
    <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[__referrer][@subpackage]" value="" />
    <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[__referrer][@controller]" value="Form" />
    <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[__referrer][@action]" value="index" />
    <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[__referrer][arguments]" value="YTowOnt99c095dc0a07f4db35567f445b4e24efc468900a9" />
    <input type="hidden" name="__referrer[@package]" value="Neos.Neos" />
    <input type="hidden" name="__referrer[@subpackage]" value="" />
    <input type="hidden" name="__referrer[@controller]" value="Frontend\Node" />
    <input type="hidden" name="__referrer[@action]" value="show" />
    <input type="hidden" name="__referrer[arguments]" value="YToxOntzOjQ6Im5vZGUiO3M6NTE6Ii9zaXRlcy9maWd1ci9ub2RlLWd3NHM1cHpsZmdnNmtAbGl2ZTtsYW5ndWFnZT1mcl9GUiI7fQ==bd45eb34f65ba3a21ad00e061857541186d0dff3" />
    <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[__trustedProperties]" value="a:1:{s:5:&quot;order&quot;;a:4:{s:8:&quot;customer&quot;;a:9:{s:6:&quot;gender&quot;;i:1;s:9:&quot;firstName&quot;;i:1;s:8:&quot;lastName&quot;;i:1;s:6:&quot;street&quot;;i:1;s:7:&quot;zipCode&quot;;i:1;s:4:&quot;city&quot;;i:1;s:11:&quot;phoneNumber&quot;;i:1;s:5:&quot;email&quot;;i:1;s:8:&quot;language&quot;;i:1;}s:13:&quot;paymentMethod&quot;;i:1;s:6:&quot;coupon&quot;;i:1;s:7:&quot;product&quot;;i:1;}}e1de7e3a2c691043d1923370f36e0158a8509ded" />
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="border-bottom mb-3 text-center">
          <h3> Étape 1 : </h3>
          <h5> Informations sur l&#039;expédition </h5>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <div class="form-check">
              <input class="form-check-input" id="customerGenderMale" type="radio" name="--seven_offerpage_checkout-content_checkout_form[order][customer][gender]" value="male" checked="" />
              <label class="form-check-label" for="customerGenderMale"> Monsieur </label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-check">
              <input class="form-check-input" id="customerGenderFemale" type="radio" name="--seven_offerpage_checkout-content_checkout_form[order][customer][gender]" value="female" />
              <label class="form-check-label" for="customerGenderFemale"> Madame </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3 ">
              <label class="form-label"> Prenom <span class="text-danger">*</span>
              </label>
              <input autocomplete="off" data-fv-not-empty___message="Entrez votre prénom s&#039;il vous plait" required="" type="text" class="form-control" name="--seven_offerpage_checkout-content_checkout_form[order][customer][firstName]" value="" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3 ">
              <label class="form-label"> Nom <span class="text-danger">*</span>
              </label>
              <input autocomplete="off" data-fv-not-empty___message="Veuillez entrer votre nom de famille" required="" type="text" class="form-control" name="--seven_offerpage_checkout-content_checkout_form[order][customer][lastName]" value="" />
            </div>
          </div>
        </div>
        <div class="mb-3 ">
          <label class="form-label"> Adresse <span class="text-danger">*</span>
          </label>
          <input autocomplete="off" data-fv-not-empty___message="Veuillez entrer votre rue" data-fv-regexp___message="customer.street.invalid" pattern="" required="" type="text" class="form-control" id="street" name="--seven_offerpage_checkout-content_checkout_form[order][customer][street]" value="" />
        </div>
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="mb-3 ">
              <label class="form-label"> Code postal <span class="text-danger">*</span>
              </label>
              <input autocomplete="off" data-fv-not-empty___message="S&#039;il vous plait, entrer votre code postal" data-fv-regexp___message="S&#039;il vous plait, entrer votre code postal" pattern="(?:[0-8]\d|9[0-8])\d{3}" inputmode="numeric" required="" type="text" class="form-control" id="zipCode" name="--seven_offerpage_checkout-content_checkout_form[order][customer][zipCode]" value="" />
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="mb-3 ">
              <label class="form-label"> Ville <span class="text-danger">*</span>
              </label>
              <input autocomplete="off" data-fv-not-empty___message="Veuillez entrer votre ville" required="" type="text" class="form-control" id="city" name="--seven_offerpage_checkout-content_checkout_form[order][customer][city]" value="" />
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label"> Pays <span class="text-danger">*</span>
          </label>
          <a class="country-dropdown" href="#" data-bs-toggle="modal" data-bs-target="#country-selection">
            <span class="flag flag-fr"></span>
            <span class="me-auto">France</span>
            <i class="fas fa-caret-down"></i>
          </a>
        </div>
        <div class="mb-3 ">
          <label class="form-label"> Numéro de téléphone <span class="text-danger">*</span>
          </label>
          <input pattern="^[0-9]{4,}$" data-fv-not-empty___message="Veuillez entrer votre numéro de téléphone" data-fv-regexp___message="Votre numéro de téléphone contient des caractères non valides. Veuillez n&#039;entrer que des chiffres." inputmode="numeric" required="" type="text" class="form-control" name="--seven_offerpage_checkout-content_checkout_form[order][customer][phoneNumber]" value="" />
        </div>
        <div class="mb-3 ">
          <label class="form-label"> Adresse de messagerie <span class="text-danger">*</span>
          </label>
          <input data-fv-not-empty___message="Veuillez saisir votre adresse e-mail" data-fv-email-address___message="Veuillez saisir une adresse e-mail valide" required="" type="email" class="form-control" name="--seven_offerpage_checkout-content_checkout_form[order][customer][email]" value="" />
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
        <ul class="payment-options list-unstyled">
          <li>
            <div class="form-check mb-0">
              <input data-type="mollie-creditCard" class="form-check-input" id="payment-mollie-creditCard" type="radio" name="--seven_offerpage_checkout-content_checkout_form[order][paymentMethod]" value="a4c2afb1-78f2-4072-8079-e4c70fc8d21b" checked="" />
              <label for="payment-mollie-creditCard" class="mb-0 form-check-label">
                <img src="https://figur-figur.com/_Resources/Static/Packages/Seven.Offerpage.Checkout/Images/PaymentProcessors/mollie-creditCard.svg" />
                <img style="height: 25px;" src="https://figur-figur.com/_Resources/Static/Packages/Seven.Offerpage.Checkout/Images/PaymentProcessors/bleu.png?bust=5cb66fd8" title="Carte Bancaires" alt="Carte Bancaires Logo" /> Carte Bancaire </label>
            </div>
          </li>
          <li>
            <div class="form-check mb-0">
              <input data-type="paypal" class="form-check-input" id="payment-paypal" type="radio" name="--seven_offerpage_checkout-content_checkout_form[order][paymentMethod]" value="ae4c398f-3a7a-42d4-8c6a-aad87a3fbda0" />
              <label for="payment-paypal" class="mb-0 form-check-label">
                <img src="https://figur-figur.com/_Resources/Static/Packages/Seven.Offerpage.Checkout/Images/PaymentProcessors/paypal.svg" /> PayPal </label>
            </div>
          </li>
          <li>
            <div class="form-check mb-0">
              <input data-type="mollie-klarna" class="form-check-input" id="payment-mollie-klarna" type="radio" name="--seven_offerpage_checkout-content_checkout_form[order][paymentMethod]" value="4acf35cf-7336-478f-821a-92df58d9fa84" />
              <label for="payment-mollie-klarna" class="mb-0 form-check-label">
                <img src="https://figur-figur.com/_Resources/Static/Packages/Seven.Offerpage.Checkout/Images/PaymentProcessors/mollie-klarna.svg" /> Payer en 3 fois sans frais avec Klarna. </label>
            </div>
          </li>
          <li>
            <div class="form-check mb-0">
              <input data-type="transferwise" class="form-check-input" id="payment-transferwise" type="radio" name="--seven_offerpage_checkout-content_checkout_form[order][paymentMethod]" value="4af9c248-c28f-4698-a841-0320b8fd747d" />
              <label for="payment-transferwise" class="mb-0 form-check-label">
                <img src="https://figur-figur.com/_Resources/Static/Packages/Seven.Offerpage.Checkout/Images/PaymentProcessors/transferwise.svg" /> Virement bancaire </label>
            </div>
          </li>
        </ul>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-block btn-lg mb-2 mt-2">
            <i class="fa fa-arrow-circle-right"></i> Commander </button>
        </div>
        <img class="img-fluid" src="https://figur-figur.com/_Resources/Static/Packages/Seven.Offerpage.Checkout/Images/Signs.jpg?bust=cc3b0d8b" alt="" />
        <div class="mt-3 d-grid">
          <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#coupon-form"> Avez-vous reçu un code de réduction ? </button>
        </div>
        <div id="coupon-form" class="collapse card mt-2">
          <div class="card-body">
            <div class="coupon-form">
              <div class="input-group">
                <input placeholder="Code de réduction" type="text" class="form-control" id="couponCode" name="--seven_offerpage_checkout-content_checkout_form[order][coupon]" />
                <div class="input-group-addon p-0">
                  <a style="color: white" data-locale="fr_FR" class="btn-block btn btn-secondary">
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
      </div>
      <input id="product" type="hidden" name="--seven_offerpage_checkout-content_checkout_form[order][product]" value="e1cad34f-410f-4712-a85e-a10bdf62e078" />
      <input type="hidden" name="--seven_offerpage_checkout-content_checkout_form[order][customer][language]" value="fr" />
    </div>
  </div>
</form>
