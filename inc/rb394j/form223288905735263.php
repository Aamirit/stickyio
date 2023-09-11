<form class="jotform-form" action="https://submit.jotform.com/submit/<?php echo formid;?>/" method="post" name="form_<?php echo formid;?>" id="<?php echo formid;?>" accept-charset="utf-8" autocomplete="on">


  <div class="card-body">
    <div class="row">

<a name="pack" id="pack"></a>

  <input type="hidden" name="formID" value="<?php echo formid;?>" />
  <input type="hidden" id="JWTContainer" value="" />
  <input type="hidden" id="cardinalOrderNumber" value="" />

  <div role="main" class="form-all">

    <style>
      .form-all:before { background: none;}
    </style>

    <ul class="form-section page-section">

<div class="col-md-6">

  <div class="border-bottom mb-3 text-center">
    <br>
    <h3> <?php echo step1;?> : </h3>
    <h5> <?php echo info1;?> </h5>
  </div>



      <li class="form-line jf-required" data-type="control_fullname" id="id_4">

        <label class="form-label form-label-top form-label-auto" id="label_4" for="first_4">
          <?php echo nametitle;?>
          <span class="form-required">
            *
          </span>
        </label>

        <div id="cid_4" class="form-input-wide jf-required" data-layout="full">
          <div data-wrapper-react="true">

            <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
              <input type="text" id="first_4" name="q4_nom[first]" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 given-name" size="10" value="" data-component="first" aria-labelledby="label_4 sublabel_4_first" required="" />
              <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px" aria-hidden="false"> <?php echo firstname;?> </label>
            </span>

            <span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
              <input type="text" id="last_4" name="q4_nom[last]" class="form-textbox validate[required]" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" value="" data-component="last" aria-labelledby="label_4 sublabel_4_last" required="" />
              <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px" aria-hidden="false"> <?php echo name;?> </label>
            </span>


          </div>
        </div>

      </li>


      <li class="form-line jf-required" data-type="control_address" id="id_5">
        <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5_addr_line1">
          <?php echo adress1;?>
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_5" class="form-input-wide jf-required" data-layout="full">
          <div summary="" class="form-address-table jsTest-addressField">
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span class="form-address-line form-address-street-line jsTest-address-lineField">
                <span class="form-sub-label-container" style="vertical-align:top">
                  <input type="text" id="input_5_addr_line1" name="q5_adresse[addr_line1]" class="form-textbox validate[required] form-address-line" data-defaultvalue="" autoComplete="section-input_5 address-line1" value="" data-component="address_line_1" aria-labelledby="label_5 sublabel_5_addr_line1" required="" />
                  <label class="form-sub-label" for="input_5_addr_line1" id="sublabel_5_addr_line1" style="min-height:13px" aria-hidden="false"> <?php echo adress;?> </label>
                </span>
              </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span class="form-address-line form-address-street-line jsTest-address-lineField">
                <span class="form-sub-label-container" style="vertical-align:top">
                  <input type="text" id="input_5_addr_line2" name="q5_adresse[addr_line2]" class="form-textbox form-address-line" data-defaultvalue="" autoComplete="section-input_5 address-line2" value="" data-component="address_line_2" aria-labelledby="label_5 sublabel_5_addr_line2" />
                  <label class="form-sub-label" for="input_5_addr_line2" id="sublabel_5_addr_line2" style="min-height:13px" aria-hidden="false"> <?php echo adress2;?> </label>
                </span>
              </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                <span class="form-sub-label-container" style="vertical-align:top">
                  <input type="text" id="input_5_city" name="q5_adresse[city]" class="form-textbox validate[required] form-address-city" data-defaultvalue="" autoComplete="section-input_5 address-level2" value="" data-component="city" aria-labelledby="label_5 sublabel_5_city" required="" />
                  <label class="form-sub-label" for="input_5_city" id="sublabel_5_city" style="min-height:13px" aria-hidden="false"> <?php echo city;?> </label>
                </span>
              </span>
              <span class="form-address-line form-address-state-line jsTest-address-lineField ">
                <span class="form-sub-label-container" style="vertical-align:top">
                  <input type="text" id="input_5_state" name="q5_adresse[state]" class="form-textbox validate[required] form-address-state" data-defaultvalue="" autoComplete="section-input_5 address-level1" value="" data-component="state" aria-labelledby="label_5 sublabel_5_state" required="" />
                  <label class="form-sub-label" for="input_5_state" id="sublabel_5_state" style="min-height:13px" aria-hidden="false"> <?php echo state;?> </label>
                </span>
              </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span class="form-address-line form-address-zip-line jsTest-address-lineField ">
                <span class="form-sub-label-container" style="vertical-align:top">
                  <input type="text" id="input_5_postal" name="q5_adresse[postal]" class="form-textbox validate[required] form-address-postal" data-defaultvalue="" autoComplete="section-input_5 postal-code" value="" data-component="zip" aria-labelledby="label_5 sublabel_5_postal" required="" />
                  <label class="form-sub-label" for="input_5_postal" id="sublabel_5_postal" style="min-height:13px" aria-hidden="false"> <?php echo postal;?> </label>
                </span>
              </span>
              <span class="form-address-line form-address-country-line jsTest-address-lineField ">
                <span class="form-sub-label-container" style="vertical-align:top">
                  <select class="form-dropdown validate[required] form-address-country noTranslate" name="q5_adresse[country]" id="input_5_country" data-component="country" required="" aria-labelledby="label_5 sublabel_5_country" autoComplete="section-input_5 country">
                    <option value=""> <?php echo selectpays;?> </option>
                    <?php echo Allemagne;?>
                    <?php echo France;?>
                    <?php echo Andorre;?>
                    <?php echo Autriche;?>
                    <?php echo Belgique;?>
                    <?php echo Espagne;?>
                    <?php echo Finlande;?>
                    <?php echo Guadeloupe;?>
                    <?php echo Hongrie;?>
                    <?php echo Irlande;?>
                    <?php echo Italie;?>
                    <?php echo Luxembourg;?>
                    <?php echo Martinique;?>
                    <?php echo Monaco;?>
                    <?php echo newcaledonie;?>
                    <?php echo nerderrland;?>
                    <?php echo polynesie;?>
                    <?php echo papoousie;?>
                    <?php echo Pologne;?>
                    <?php echo Portugal;?>
                    <?php echo suede;?>
                    <?php echo Suisse;?>

                  </select>
                  <label class="form-sub-label" for="input_5_country" id="sublabel_5_country" style="min-height:13px" aria-hidden="false"> <?php echo spays;?> </label>
                </span>
              </span>
            </div>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_phone" id="id_6">
        <label class="form-label form-label-top form-label-auto" id="label_6" for="input_6_full">
          <?php echo tel;?>
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_6" class="form-input-wide jf-required" data-layout="half">
          <span class="form-sub-label-container" style="vertical-align:top">
            <input type="tel" id="input_6_full" name="q6_numeroDe[full]" data-type="mask-number" class="mask-phone-number form-textbox validate[required, Fill Mask]" data-defaultvalue="" autoComplete="section-input_6 tel-national" style="width:310px" data-masked="true" value="" placeholder="<?php echo telfr;?>" data-component="phone" aria-labelledby="label_6 sublabel_6_masked" required="" />
            <label class="form-sub-label" for="input_6_full" id="sublabel_6_masked" style="min-height:13px" aria-hidden="false"> <?php echo telthanks;?> </label>
          </span>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_email" id="id_7">
        <label class="form-label form-label-top form-label-auto" id="label_7" for="input_7">
          E-mail
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_7" class="form-input-wide jf-required" data-layout="half">
          <span class="form-sub-label-container" style="vertical-align:top">
            <input type="email" id="input_7" name="q7_email" class="form-textbox validate[required, Email]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="email" aria-labelledby="label_7 sublabel_input_7" required="" />
            <label class="form-sub-label" for="input_7" id="sublabel_input_7" style="min-height:13px" aria-hidden="false"> <?php echo exemple;?> </label>
          </span>
        </div>
      </li>

      <div class="mt-4 flex-col p-4 bg-white rounded-xl overflow-hidden items-center space-y-2 divide-y">

          </div>

          <div class="mt-1 mb-1 text-muted text-center">
            <i class="fa fa-lock"></i> <?php echo secure;?>
          </div>

</div>

<div class="col-md-6">
  <div class="border-bottom mb-3 text-center mb-0">
    <br>
    <h3> <?php echo step2;?> : </h3>
    <h5> <?php echo info2;?> </h5>
  </div>


      <li class="form-line jf-required" data-type="control_mollie" id="id_3" data-payment="true">


        <label class="form-label form-label-top" id="label_3" for="input_3">
          <?php echo produit;?>
          <span class="form-required">
            *
          </span>
        </label>

        <div id="cid_3" class="form-input-wide jf-required" data-layout="full">

          <div data-wrapper-react="true" id="mollie-payment-wrapper" class="mollie-payment-wrapper" data-sandbox="No" data-mollie-currency="EUR">


            <div data-wrapper-react="true" class="product-container-wrapper">
              <div class="filter-container">
              </div>
              <input type="hidden" name="simple_fpc" data-payment_type="mollie" data-component="payment1" value="3" />
              <input type="hidden" name="payment_total_checksum" id="payment_total_checksum" data-component="payment2" />
              <div id="image-overlay" class="overlay-content" style="display:none">
                <img id="current-image" />
                <span class="lb-prev-button">
                  prev
                </span>
                <span class="lb-next-button">
                  next
                </span>
                <span class="lb-close-button">
                  ( X )
                </span>
                <span class="image-overlay-product-container">
                  <ul class="form-overlay-item" pid="1001" hasicon="false" hasimages="false" iconvalue="">
                  </ul>
                  <ul class="form-overlay-item" pid="1002" hasicon="false" hasimages="false" iconvalue="">
                  </ul>
                  <ul class="form-overlay-item" pid="1003" hasicon="false" hasimages="false" iconvalue="">
                  </ul>
                </span>
              </div>


              <div data-wrapper-react="true">
                <span class="form-product-item hover-product-item  full_img new_ui" categories="non-categorized" pid="1001" aria-labelledby="label_3">
                  <div data-wrapper-react="true" class="form-product-item-detail new_ui">
                    <div class="p_col">
                      <div class="p_checkbox">
                        <input type="radio" class="form-radio validate[required]  form-product-input" id="input_3_1001" name="q3_mesProduits[][id]" value="1001" />
                        <div class="checked">
                        </div>
                        <div class="select_border">
                        </div>
                      </div>
                    </div>
                    <div class="p_image">
                      <div role="img" aria-label="Pack 1" class="image_area null">
                      </div>
                    </div>
                    <div for="input_3_1001" class="form-product-container">
                      <span data-wrapper-react="true">
                        <div class="title_description">
                          <span class="form-product-name" id="product-name-input_3_1001">
                            <?php echo quantpack1;?>
                          </span>
                          <span class="form-product-description" id="product-name-description-input_3_1001">
                          </span>
                        </div>

                      </span>
                    </div>
                    <div class="focus_action_button_container">
                      <a class="btn-inline-product-delete"> </a>
                      <a class="btn-inline-product-settings"> </a>
                    </div>
                  </div>
                </span>
                <div class="p_item_separator ">
                </div>
                <span class="form-product-item hover-product-item  full_img new_ui" categories="non-categorized" pid="1002" aria-labelledby="label_3">
                  <div data-wrapper-react="true" class="form-product-item-detail new_ui">
                    <div class="p_col">
                      <div class="p_checkbox">
                        <input type="radio" class="form-radio validate[required]  form-product-input" id="input_3_1002" name="q3_mesProduits[][id]" value="1002" />
                        <div class="checked">
                        </div>
                        <div class="select_border">
                        </div>
                      </div>
                    </div>
                    <div class="p_image">
                      <div role="img" aria-label="Forfait 2" class="image_area null">
                      </div>
                    </div>
                    <div for="input_3_1002" class="form-product-container">
                      <span data-wrapper-react="true">
                        <div class="title_description">
                          <span class="form-product-name" id="product-name-input_3_1002">
                            <?php echo quantpack3;?>
                          </span>
                          <span class="form-product-description" id="product-name-description-input_3_1002">
                          </span>
                        </div>

                      </span>
                    </div>
                    <div class="focus_action_button_container">
                      <a class="btn-inline-product-delete"> </a>
                      <a class="btn-inline-product-settings"> </a>
                    </div>
                  </div>
                </span>
                <div class="p_item_separator ">
                </div>
                <span class="form-product-item hover-product-item  full_img new_ui" categories="non-categorized" pid="1003" aria-labelledby="label_3">
                  <div data-wrapper-react="true" class="form-product-item-detail new_ui">
                    <div class="p_col">
                      <div class="p_checkbox">
                        <input type="radio" class="form-radio validate[required]  form-product-input" id="input_3_1003" name="q3_mesProduits[][id]" value="1003" checked=""/>
                        <div class="checked">
                        </div>
                        <div class="select_border">
                        </div>
                      </div>
                    </div>
                    <div class="p_image">
                      <div role="img" aria-label="Forfait 3" class="image_area null">
                      </div>
                    </div>
                    <div for="input_3_1003" class="form-product-container">
                      <span data-wrapper-react="true">
                        <div class="title_description">
                          <span class="form-product-name" id="product-name-input_3_1003">
                            <?php echo quantpack2;?>
                          </span>
                          <span class="form-product-description" id="product-name-description-input_3_1003">
                          </span>
                        </div>

                      </span>
                    </div>
                    <div class="focus_action_button_container">
                      <a class="btn-inline-product-delete"> </a>
                      <a class="btn-inline-product-settings"> </a>
                    </div>
                  </div>
                </span>

              </div>
            </div>

            <span style="display:none">

              <table id="mollie-creditcard" class="form-address-table payment-form-table" cellPadding="0" cellSpacing="0">

                <tbody>
                  <tr>
                    <td width="100%" colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <div id="ccFirstName" style="border:1px solid #ccc;min-height:16px" class="form-textbox validate[required] cc_firstName">
                        </div>
                        <label class="form-sub-label" for="input_3_cc_firstName" id="sublabel_cc_firstName" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Nom complet </label>
                      </span>
                    </td>
                  </tr>
                  <tr class="if_cc_field">
                    <td width="100%" colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <div id="ccNumber" style="border:1px solid #ccc;min-height:13px" class="form-textbox cc_number">
                        </div>
                        <label class="form-sub-label" for="input_3_cc_number" id="sublabel_cc_number" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Numéro de carte bancaire </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <div id="ccExpMonthWithYear" class="form-textbox">
                        </div>
                        <label class="form-sub-label" for="input_3_cc_card_expiry" id="sublabel_cc_card_expiry" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Expiration Date </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <div id="ccCCV" style="border:1px solid #ccc;min-height:13px" class="form-textbox cc_ccv">
                        </div>
                        <label class="form-sub-label" for="input_3_cc_ccv" id="sublabel_cc_ccv" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Code de sécurité </label>
                      </span>
                    </td>
                    <td width="50%">
                      <tr>
                        <td>
                          <div id="mollie_dummy" style="display:none">
                          </div>
                        </td>
                      </tr>
                    </td>
                  </tr>
                </tbody>
              </table>

              <span id="mollie-credit-card-address-klarnapaylater">
                <h4>
                  Email
                </h4>
                <table class="form-address-table payment-form-table mollie-address" cellPadding="0" cellSpacing="0">
                  <tr>
                    <td>
                      <input type="email" id="input_3_cc_email" name="q3_mesProduits[cc_email]" class="form-textbox validate[required] cc_email" data-defaultvalue="" size="20" value="" placeholder="example@example.com" data-component="cc_email" />
                    </td>
                  </tr>
                  <tr>
                    <th colSpan="2" style="text-align:left;margin-top:20px;display:table">
                      Adresse de facturation
                    </th>
                  </tr>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_addr_line1" name="q3_mesProduits[addr_line1]" class="form-textbox validate[required] form-address-line" data-defaultvalue="" value="" data-component="addr_line1" />
                        <label class="form-sub-label" for="input_3_addr_line1" id="sublabel_3_addr_line1" style="min-height:13px" aria-hidden="false"> Numéro et rue </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_addr_line2" name="q3_mesProduits[addr_line2]" class="form-textbox form-address-line" data-defaultvalue="" size="46" value="" data-component="addr_line2" />
                        <label class="form-sub-label" for="input_3_addr_line2" id="sublabel_3_addr_line2" style="min-height:13px" aria-hidden="false"> Complément d&#x27;adresse </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_city" name="q3_mesProduits[city]" class="form-textbox validate[required] form-address-city" data-defaultvalue="" size="21" value="" data-component="city" />
                        <label class="form-sub-label" for="input_3_city" id="sublabel_3_city" style="min-height:13px" aria-hidden="false"> Ville </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_state" name="q3_mesProduits[state]" class="form-textbox validate[required] form-address-state" data-defaultvalue="" size="22" value="" data-component="state" />
                        <label class="form-sub-label" for="input_3_state" id="sublabel_3_state" style="min-height:13px" aria-hidden="false"> État/Région </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_postal" name="q3_mesProduits[postal]" class="form-textbox validate[required] form-address-postal" data-defaultvalue="" size="10" value="" data-component="postal" />
                        <label class="form-sub-label" for="input_3_postal" id="sublabel_3_postal" style="min-height:13px" aria-hidden="false"> Code Postal </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <select class="form-dropdown validate[required] form-address-country" name="q3_mesProduits[country]" id="input_3_country" data-component="country">
                          <option value="" selected=""> Veuillez sélectionner </option>
                          <option value="Autriche"> Autriche </option>
                          <option value="Belgique"> Belgique </option>
                          <option value="Finlande"> Finlande </option>
                          <option value="Allemagne"> Allemagne </option>
                          <option value="Pays-Bas"> Pays-Bas </option>
                        </select>
                        <label class="form-sub-label" for="input_3_country" id="sublabel_3_country" style="min-height:13px" aria-hidden="false"> Pays </label>
                      </span>
                    </td>
                  </tr>
                </table>
              </span>
              <span id="mollie-credit-card-address-klarnasliceit-description">
                Klarna: Slice it requires a minimum payment amount for these countries:
                <div>
                  <b>
                    Germany:
                  </b>
                  <span>
                    &euro; 45,
                  </span>
                  <b>
                    Finland and Australia:
                  </b>
                  <span>
                    &euro; 100
                  </span>
                </div>
              </span>
              <span id="mollie-credit-card-address-klarnasliceit">
                <h4>
                  Email
                </h4>
                <table class="form-address-table payment-form-table mollie-address" cellPadding="0" cellSpacing="0">
                  <tr>
                    <td>
                      <input type="email" id="input_3_cc_email" name="q3_mesProduits[cc_email]" class="form-textbox validate[required] cc_email" data-defaultvalue="" size="20" value="" placeholder="example@example.com" data-component="cc_email" />
                    </td>
                  </tr>
                  <tr>
                    <th colSpan="2" style="text-align:left;margin-top:20px;display:table">
                      Adresse de facturation
                    </th>
                  </tr>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_addr_line1" name="q3_mesProduits[addr_line1]" class="form-textbox validate[required] form-address-line" data-defaultvalue="" value="" data-component="addr_line1" />
                        <label class="form-sub-label" for="input_3_addr_line1" id="sublabel_3_addr_line1" style="min-height:13px" aria-hidden="false"> Numéro et rue </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_addr_line2" name="q3_mesProduits[addr_line2]" class="form-textbox form-address-line" data-defaultvalue="" size="46" value="" data-component="addr_line2" />
                        <label class="form-sub-label" for="input_3_addr_line2" id="sublabel_3_addr_line2" style="min-height:13px" aria-hidden="false"> Complément d&#x27;adresse </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_city" name="q3_mesProduits[city]" class="form-textbox validate[required] form-address-city" data-defaultvalue="" size="21" value="" data-component="city" />
                        <label class="form-sub-label" for="input_3_city" id="sublabel_3_city" style="min-height:13px" aria-hidden="false"> Ville </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_state" name="q3_mesProduits[state]" class="form-textbox validate[required] form-address-state" data-defaultvalue="" size="22" value="" data-component="state" />
                        <label class="form-sub-label" for="input_3_state" id="sublabel_3_state" style="min-height:13px" aria-hidden="false"> État/Région </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_postal" name="q3_mesProduits[postal]" class="form-textbox validate[required] form-address-postal" data-defaultvalue="" size="10" value="" data-component="postal" />
                        <label class="form-sub-label" for="input_3_postal" id="sublabel_3_postal" style="min-height:13px" aria-hidden="false"> Code Postal </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <select class="form-dropdown validate[required] form-address-country" name="q3_mesProduits[country]" id="input_3_country" data-component="country">
                          <option value="" selected=""> Veuillez sélectionner </option>
                          <option value="Autriche"> Autriche </option>
                          <option value="Finlande"> Finlande </option>
                          <option value="Allemagne"> Allemagne </option>
                        </select>
                        <label class="form-sub-label" for="input_3_country" id="sublabel_3_country" style="min-height:13px" aria-hidden="false"> Pays </label>
                      </span>
                    </td>
                  </tr>
                </table>
              </span>
              <span id="mollie-credit-card-address-voucher">
                <h4>
                  Email
                </h4>
                <table class="form-address-table payment-form-table mollie-address" cellPadding="0" cellSpacing="0">
                  <tr>
                    <td>
                      <input type="email" id="input_3_cc_email" name="q3_mesProduits[cc_email]" class="form-textbox validate[required] cc_email" data-defaultvalue="" size="20" value="" placeholder="example@example.com" data-component="cc_email" />
                    </td>
                  </tr>
                  <tr>
                    <th colSpan="2" style="text-align:left;margin-top:20px;display:table">
                      Adresse de facturation
                    </th>
                  </tr>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_addr_line1" name="q3_mesProduits[addr_line1]" class="form-textbox validate[required] form-address-line" data-defaultvalue="" value="" data-component="addr_line1" />
                        <label class="form-sub-label" for="input_3_addr_line1" id="sublabel_3_addr_line1" style="min-height:13px" aria-hidden="false"> Numéro et rue </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colSpan="2">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_addr_line2" name="q3_mesProduits[addr_line2]" class="form-textbox form-address-line" data-defaultvalue="" size="46" value="" data-component="addr_line2" />
                        <label class="form-sub-label" for="input_3_addr_line2" id="sublabel_3_addr_line2" style="min-height:13px" aria-hidden="false"> Complément d&#x27;adresse </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_city" name="q3_mesProduits[city]" class="form-textbox validate[required] form-address-city" data-defaultvalue="" size="21" value="" data-component="city" />
                        <label class="form-sub-label" for="input_3_city" id="sublabel_3_city" style="min-height:13px" aria-hidden="false"> Ville </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_state" name="q3_mesProduits[state]" class="form-textbox validate[required] form-address-state" data-defaultvalue="" size="22" value="" data-component="state" />
                        <label class="form-sub-label" for="input_3_state" id="sublabel_3_state" style="min-height:13px" aria-hidden="false"> État/Région </label>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%">
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_3_postal" name="q3_mesProduits[postal]" class="form-textbox validate[required] form-address-postal" data-defaultvalue="" size="10" value="" data-component="postal" />
                        <label class="form-sub-label" for="input_3_postal" id="sublabel_3_postal" style="min-height:13px" aria-hidden="false"> Code Postal </label>
                      </span>
                    </td>
                    <td>
                      <span class="form-sub-label-container" style="vertical-align:top">
                        <select class="form-dropdown validate[required] form-address-country" name="q3_mesProduits[country]" id="input_3_country" data-component="country">
                          <option value="" selected=""> Veuillez sélectionner </option>
                          <option value="Belgique"> Belgique </option>
                        </select>
                        <label class="form-sub-label" for="input_3_country" id="sublabel_3_country" style="min-height:13px" aria-hidden="false"> Pays </label>
                      </span>
                    </td>
                  </tr>
                </table>
              </span>

            </span>

            <div class="mollie-apm" id="mollie-apm">
              <center><h3> <?php echo step3;?> : </h3>
            <h5><?php echo pouce;?></h5></center>
              <div class="payment-apm-list" id="payment-apm-list" style="margin-top:13px">
              </div>
            </div>
          </div>
        </div>
      </li>


      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide" data-layout="full">
          <div class="d-grid" data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
            <button id="input_2" type="submit" class="btn btn-primary btn-block btn-lg mb-2 mt-2" data-component="button" data-content="">
              <?php echo commander;?>
            </button>
          </div>
        </div>
      </li>
      <img class="img-fluid" src="<?php echo url;?>/<?php echo racine;?>/img/Signs.jpeg" alt="" />

<br><br>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>

      </div>


    </ul>
    </div>

</div>

  <input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="<?php echo formid;?>" />
  <script type="text/javascript">
  var all_spc = document.querySelectorAll("form[id='<?php echo formid;?>'] .si" + "mple" + "_spc");
for (var i = 0; i < all_spc.length; i++)
{
  all_spc[i].value = "<?php echo formid;?>-<?php echo formid;?>";
}
  </script>

</form>
