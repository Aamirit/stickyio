var __mollie = {
  state: {
    previousSelectedAPM: null
  },
  init: function() {
    var paymentFieldId = $$('input[name="simple_fpc"]')[0].value;
    this.paymentField = document.getElementsByClassName('form-address-table payment-form-table')[0];
    this.isCardForm = !!window.CardForm;
    this.dummyField = document.getElementById('mollie_dummy');
    this.submitButton = $$('.form-submit-button')[0];
    this.form = $$('.jotform-form')[0];
    var formId = this.form.id;
    var isSandbox = document.getElementById('mollie-payment-wrapper').getAttribute('data-sandbox') === 'Yes';
    var isAPM = document.getElementById('mollie-payment-wrapper').getAttribute('data-apm');
    this.isApplePay = isAPM ? isAPM.indexOf('Apple Pay') > -1 : false;

    var self = this;
    this.navigator = self.setLanguage(navigator.language || navigator.browserLanguage || navigator.userLanguage);
    setTimeout( function () {
      self.mollieProfileId(formId, isSandbox);
      self.loadAPMS(formId, isSandbox);
    }, 0);
  },

  formHasErrors: function () {
    var hasErrors = false;
    $$("li.form-line").each(function (e, index) {
      if (e.hasClassName('form-line-error')) {
        hasErrors = true;
      }
    });
    return hasErrors;
  },

  movePaymentFieldIntoTheCreditCard: function() {
    var isCardForm = !!window.CardForm;
    var ccFields = document.querySelector('#mollie-creditcard');
    var creditCardField = $$("div[data-id='creditcard']")[0];
    if (typeof ccFields !== 'undefined' && typeof creditCardField !== 'undefined') {
      if ( isCardForm &&
           creditCardField.getElementsByClassName('form-radio-item') &&
           creditCardField.getElementsByClassName('form-radio-item').length === 1
        ) {
          creditCardField.getElementsByClassName('form-radio-item')[0].appendChild(ccFields);
      } else {
        creditCardField.appendChild(ccFields);
      }
    }
  },

  createAndMountComponents: function(mollie) {
    var $this = this;

    if($this.isCardForm) {
      var creditCard = document.getElementById('mollie-creditcard');
      var fullNameField = creditCard.select("[data-type='cc_fullName']")[0].classList;
      var ccNumberField = creditCard.select("[data-type='cc_number']")[0].classList;
      var ccCCVField = creditCard.select("[data-type='cc_ccv']")[0].classList;
      fullNameField.remove('isFilled');
      ccNumberField.remove('isFilled');
      ccCCVField.remove('isFilled');

      var ccExpField = creditCard.select("[data-type='cc_exp_month']")[0];
      if (ccExpField) {
        var ccExpFieldSubTitle = ccExpField.select('.jfField-sublabel')[0];
        ccExpFieldSubTitle.style.display = 'none';
      }
    }

    return new Promise(function(resolve, reject) {
      var cardHolder = mollie.createComponent('cardHolder');
      cardHolder.mount('#ccFirstName');
      cardHolder.addEventListener("change", function(event) {
        if($this.isCardForm) {
          var creditCard = document.getElementById('mollie-creditcard');
          var fullNameField = creditCard.select("[data-type='cc_fullName']")[0].classList;
          event.dirty ? fullNameField.add('isFilled') :  fullNameField.remove('isFilled');
        }

        if (event.error && event.touched) {
          if (JotForm.isPaymentSelected() && JotForm.paymentTotal) {
            $this.errored(event.error, ['ccFirstName']);
          }
        } else {
          $this.corrected();
        }
      });

      var cardNumber = mollie.createComponent('cardNumber');
      cardNumber.mount('#ccNumber');
      cardNumber.addEventListener('change', function (event) {
        if($this.isCardForm) {
          var creditCard = document.getElementById('mollie-creditcard');
          var ccNumberField = creditCard.select("[data-type='cc_number']")[0].classList;
          event.dirty ? ccNumberField.add('isFilled') :  ccNumberField.remove('isFilled');
        }

        if (event.error && event.touched) {
          if (JotForm.isPaymentSelected() && JotForm.paymentTotal) {
            $this.errored(event.error, ['ccNumber']);
          }
        } else {
          $this.corrected();        }
      });

      var expiryDate = mollie.createComponent('expiryDate');
      expiryDate.mount('#ccExpMonthWithYear');
      expiryDate.addEventListener("change", function(event) {
        if($this.isCardForm) {
          // event.dirty
          var creditCard = document.getElementById('mollie-creditcard');
          var ccExpField = creditCard.select("[data-type='cc_exp_month']")[0];
          var ccExpLabel = ccExpField.select('.jfField-sublabel')[0];

          if (ccExpLabel) {
            ccExpLabel.style.display = event.dirty ? '' : 'none';
          }
        }
        if (event.error && event.touched) {
          if (JotForm.isPaymentSelected() && JotForm.paymentTotal) {
            $this.errored(event.error, ['ccExpMonthWithYear']);
          }
        } else {
          $this.corrected();        }
      });

      var verificationCode = mollie.createComponent('verificationCode');
      verificationCode.mount('#ccCCV');
      verificationCode.addEventListener("change", function (event) {
        if($this.isCardForm) {
          var creditCard = document.getElementById('mollie-creditcard');
          var ccCCVField = creditCard.select("[data-type='cc_ccv']")[0].classList;
          event.dirty ? ccCCVField.add('isFilled') :  ccCCVField.remove('isFilled');
        }
        if (event.error && event.touched) {
          if (JotForm.isPaymentSelected() && JotForm.paymentTotal) {
            $this.errored(event.error, ['ccCCV']);
          }
        } else {
          $this.corrected();        }
      });

      resolve(mollie);
    });
  },

  initializeMollieComponents: function (profileId, isSandbox) {
    var mollie = Mollie(profileId, { testmode: isSandbox, locale: this.navigator });
    this.createAndMountComponents(mollie).then(
      function(mollie) {
        return mollie;
      },
      function(reject) {
        return Promise.reject(reject);
      }
    );

    this.isPaymentRequired = function() {
      return $(JotForm.getContainer(this.paymentField)).hasClassName('jf-required');
    };

    this.form.addEventListener("submit", function(event) {
      event.preventDefault();
      var paymentSelected = false;
      var apmselected = false;
      var mollieRadio = !!this.isCardForm ? document.getElementsByName('radio-apm-cardform') : document.getElementsByName('mollie-payment-method');
      var adressedAPM = null;
      var selectedAPM = null;

      for (var i = 0; i < mollieRadio.length; i++) {
        if (mollieRadio[i].type === 'radio' && mollieRadio[i].checked && mollieRadio[i].value !== 'mollie-creditcard') {
          selectedAPM = mollieRadio[i];

          // get value, set checked flag or do whatever you need to
          console.log(mollieRadio[i].value);
          if (mollieRadio[i].value !== 'creditcard') {
            apmselected = true;
            paymentSelected = true;
          }

          if (mollieRadio[i].value === 'creditcard') {
            paymentSelected = true;
          }
          if(['klarnapaylater', 'klarnasliceit', 'voucher'].indexOf(mollieRadio[i].value) >= 0) {
            adressedAPM = mollieRadio[i];
          }
        }
      }

      // if there is min order amount in the form, require payment field selection
      if (JotForm.hasMinTotalOrderAmount() === true) {
        if (JotForm.paymentTotal < parseInt(JotForm.minTotalOrderAmount)) {
          return false;
        }
      }

      if ((!JotForm.isPaymentSelected() && !JotForm.paymentTotal && !this.isPaymentRequired()) || (document.querySelectorAll('[data-payment]').length > 0 && document.querySelectorAll('[data-payment]')[0].hasClassName('form-field-hidden'))) {
        this.pleaseWaitButton();
        this.form.submit();
      }

      if (JotForm.isPaymentSelected()) {
        if (paymentSelected === false) {
          JotForm.errored($('mollie_dummy'), 'Payment Method is not selected.');
          // this.pleaseWaitButton();
          // this.form.submit();
          this.resetButton();
        } else {
          JotForm.corrected($('mollie_dummy'));
          JotForm.corrected(JotForm.getContainer(this.paymentField));
        }

        if (apmselected === true) {
          // Re-submit form to the server
          if (!this.formHasErrors()) {
            JotForm.corrected($('mollie_dummy'));
            this.pleaseWaitButton();
            console.log("submitting form");

            $(this.form).insert(new Element('input', {
              name: 'browser-language',
              type: 'hidden',
            }).putValue(navigator.language || navigator.browserLanguage || navigator.userLanguage));

            var addressField = adressedAPM !== null ? document.getElementById('mollie-credit-card-address-' + adressedAPM.id) : null;
            if (addressField !== null && adressedAPM !== null && adressedAPM.id) {
              // TODO We need to refactor this part of the code
              if(!!window.CardForm) {
                var email = addressField.querySelector("[data-component='cc_email']").value;
                var streetAddress = addressField.querySelector("[data-component='address_line_1']").value;
                var streetAddress2 = addressField.querySelector("[data-component='address_line_2']").value;
                var city = addressField.querySelector("[data-component='city']").value;
                var stateProvince = addressField.querySelector("[data-component='state']").value;
                var portalZipCode = addressField.querySelector("[data-component='zip']").value;
                var country = addressField.querySelector("[data-component='country']").value;
              } else {
                var email = addressField.querySelector("[data-component='cc_email']").value;
                var streetAddress = addressField.querySelector("[data-component='addr_line1']").value;
                var streetAddress2 = addressField.querySelector("[data-component='addr_line2']").value;
                var city = addressField.querySelector("[data-component='city']").value;
                var stateProvince = addressField.querySelector("[data-component='state']").value;
                var portalZipCode = addressField.querySelector("[data-component='postal']").value;
                var country = addressField.querySelector("[data-component='country']").value;
              }


              var emailInput = document.createElement("input");
              emailInput.setAttribute("name", "mollie-email");
              emailInput.setAttribute("value", email);
              emailInput.setAttribute("type", "hidden");
              this.form.appendChild(emailInput);

              var streetAddressInput = document.createElement("input");
              streetAddressInput.setAttribute("name", "mollie-streetAddress");
              streetAddressInput.setAttribute("value", streetAddress);
              streetAddressInput.setAttribute("type", "hidden");

              this.form.appendChild(streetAddressInput);

              var streetAddress2Input = document.createElement("input");
              streetAddress2Input.setAttribute("name", "mollie-streetAddress2");
              streetAddress2Input.setAttribute("value", streetAddress2);
              streetAddress2Input.setAttribute("type", "hidden");
              this.form.appendChild(streetAddress2Input);

              var cityInput = document.createElement("input");
              cityInput.setAttribute("name", "mollie-city");
              cityInput.setAttribute("value", city);
              cityInput.setAttribute("type", "hidden");
              this.form.appendChild(cityInput);

              var stateProvinceInput = document.createElement("input");
              stateProvinceInput.setAttribute("name", "mollie-stateProvince");
              stateProvinceInput.setAttribute("value", stateProvince);
              stateProvinceInput.setAttribute("type", "hidden");
              this.form.appendChild(stateProvinceInput);

              var portalZipCodeInput = document.createElement("input");
              portalZipCodeInput.setAttribute("name", "mollie-portalZipCode");
              portalZipCodeInput.setAttribute("value", portalZipCode);
              portalZipCodeInput.setAttribute("type", "hidden");
              this.form.appendChild(portalZipCodeInput);

              var countryInput = document.createElement("input");
              countryInput.setAttribute("name", "mollie-country");
              countryInput.setAttribute("value", country);
              countryInput.setAttribute("type", "hidden");
              this.form.appendChild(countryInput);
            }

            if (selectedAPM && selectedAPM.id) {
              var selectedAPMDOM = document.createElement("input");
              selectedAPMDOM.setAttribute("name", "selectedAPM");
              selectedAPMDOM.setAttribute("value", selectedAPM.id);
              selectedAPMDOM.setAttribute("type", "hidden");

              this.form.appendChild(selectedAPMDOM);
            }

            this.form.submit();
          }
        }
        // Get a payment token
        mollie.createToken().then(function(result) {
          // Add token to the form
          if (result.error) {
            this.showMollieTokenError(result.error, apmselected);
            return;
          }

          var tokenInput = document.createElement("input");
          tokenInput.setAttribute("name", "cardToken");
          tokenInput.setAttribute("type", "hidden");
          tokenInput.setAttribute("value", result.token);

          this.form.appendChild(tokenInput);

          // Re-submit form to the server
          if (!this.formHasErrors()) {
            JotForm.corrected($('mollie_dummy'));
            this.pleaseWaitButton();
            console.log("submitting form");
            this.form.submit();
          }
        }.bind(this)).catch(function(error) {
          this.showMollieTokenError(error, apmselected);
        }.bind(this));
      }

    }.bind(this));
  },

  pleaseWaitButton: function () {
    $$('.form-submit-button[type=submit]').each(function (but) {
      if (but.innerHTML.indexOf('<img') === -1) {
        but.innerHTML = JotForm.texts.pleaseWait;
      }
    });
  },

  mollieProfileId: function (formId, isSandbox) {
    var $this = this;
    var configuration;

    var apiURL = '';

    if (JotForm.url && JotForm.url.indexOf('.pro') > -1) {
      apiURL = JotForm.url.slice(0, -1) + '/API';
    } else if (!JotForm.enterprise && window.location.origin && window.location.origin.indexOf('jotform') === -1) {
      apiURL = 'https://api.jotform.com';
    } else {
      apiURL = JotForm.APIUrl;
    }

    JotForm._xdr(apiURL + '/payment/mollie/profileId/' + formId, 'post', null,
      function(response) {
        if (response.content) {
          var profileId = response.content;
          $this.initializeMollieComponents(profileId, isSandbox);
        }
      },
      function (error) {
        JotForm.warn($('mollie_dummy'), error);
      });
  },

  loadAPMS: function(formId, isSandbox) {
    var apiURL = '';
    var self = this;
    var isCardForm = !!window.CardForm;

    if (JotForm.url && JotForm.url.indexOf('.pro') > -1) {
      apiURL = JotForm.url.slice(0, -1) + '/API';
    } else if (!JotForm.enterprise && window.location.origin && window.location.origin.indexOf('jotform') === -1) {
      apiURL = 'https://api.jotform.com';
    } else {
      apiURL = JotForm.APIUrl;
    }

    JotForm._xdr(
      apiURL + '/payment/mollie/getapm/' + formId,
      'post',
      JotForm.serialize({
        currency: JotForm.paymentProperties.currency,
        sandbox: JotForm.paymentProperties.sandbox
      }),
      function(response) {
        if (response.content.errorDetails) {
          JotForm.errored($('mollie_dummy'), response.content.errorDetails);
        } else if (response.responseCode === 200 && response.content) {
          try {
            var apmList = JSON.parse(response.content);
            if (Object.isArray(apmList)) {

              var creditCardAPM = null;
              var creditCardAPMIndex = null;
              for (var i  = 0; i<apmList.length; i++) {
                if (apmList[i].id === 'creditcard') {
                  creditCardAPM = Object.assign({}, apmList[i]);
                  creditCardAPMIndex = i;
                  break;
                }
              }
              if (creditCardAPM !== null && creditCardAPMIndex !== null) {
                apmList.splice(creditCardAPMIndex, 1);
                apmList.unshift(creditCardAPM);
              }

              if (self.isApplePay) {
                var listHasCreditCard = apmList.filter(function(apm) { return apm.id === 'creditcard' });
                if (listHasCreditCard.length === 0) {
                  var objCreditCard = {
                    id: 'creditcard',
                    image: 'https://cdn.jotfor.ms/assets/img/payments/CC_icon.png'
                  };
                  apmList.unshift(objCreditCard);
                }

                var listHasApplePay = apmList.filter(function(apm) { return apm.id === 'applepay' });
                if (listHasApplePay.length === 0) {
                  var objApplePay = {
                    id: 'applepay',
                    image: 'https://cdn.jotfor.ms/assets/img/payments/apple_icon_black.png'
                  };
                  apmList.push(objApplePay);
                }
                apmList = apmList.filter(function(apm) { return (apm.id === 'applepay' || apm.id === 'creditcard') });
              }

              self.createApmDom(apmList);
              var allAPMList = [];
              apmList.forEach(function(apm) {
                allAPMList.push(apm.id);
              });

              // Add apm list to the form
              var insertAPM = document.createElement("input");
              insertAPM.setAttribute("name", "allAPMList");
              insertAPM.setAttribute("type", "hidden");
              insertAPM.setAttribute("value", allAPMList);
              self.form.appendChild(insertAPM);

              self.changeAddressPlaceOnCardForm(apmList);

              self.renderAPMListTitle();
              if (isCardForm) {
                self.apmEventOnChangedCardForm();
              } else {
                self.apmEventOnChanged();
              }

              self.movePaymentFieldIntoTheCreditCard();
            }
          } catch (error) {
            JotForm.errored($('mollie_dummy'), error);
          }
        }
      }, function (error) {
        JotForm.errored($('mollie_dummy'), error);
      }
    );
  },

  apmEventOnChanged: function() {
    var mollieAPMList = document.getElementById('payment-apm-list');
    if (typeof mollieAPMList !== 'undefined')
      mollieAPMList.addEventListener('click', function(event) {
        event.stopPropagation();

        var selectedAPMID = event.target.getAttribute('data-id');
        var selectedAPMWrapper = document.querySelector("div[data-id='" + selectedAPMID + "'].payment-method-container");

        // Check and Uncheck Input Field
        var radioButton = document.querySelector("input[data-id='" + selectedAPMID + "']");
        if (radioButton !== null && selectedAPMWrapper !== null) {
            if (this.state.previousSelectedAPM !== null) {
              this.state.previousSelectedAPM.removeClassName('selected');
            }
            selectedAPMWrapper.addClassName('selected');
            this.state.previousSelectedAPM = selectedAPMWrapper;
            radioButton.checked = true;
        }
      }.bind(this));
  },

  apmEventOnChangedCardForm: function() {
    var mollieAPMList = document.getElementById('payment-apm-list');
    if (typeof mollieAPMList !== 'undefined') {
      mollieAPMList.addEventListener('click', function(event) {
        event.stopPropagation();

        var selectedAPMWrapper = event.target.closest('.payment-method-container');

        if (selectedAPMWrapper &&  selectedAPMWrapper.getElementsBySelector("[name='radio-apm-cardform']")) {
          // Not Selected
          if (selectedAPMWrapper.getElementsBySelector("[name='radio-apm-cardform']")[0].checked === false) {
            if (this.state.previousSelectedAPM !== null) {
              this.state.previousSelectedAPM.removeClassName('selected');
            }
            selectedAPMWrapper.addClassName('selected');
            this.state.previousSelectedAPM = selectedAPMWrapper;
          }
        }
      }.bind(this));
    }
  },

  renderAPMListTitle: function() {
    if (!!window.CardForm) { return; }
    var mollieApmWrapper = document.getElementById('mollie-apm');

    var titleDOM = new Element('h4');
    titleDOM.innerText = '';

    mollieApmWrapper.prepend(titleDOM);
  },

  changeAddressPlaceOnCardForm: function(apmList) {
    var addressFields = ['klarnapaylater', 'klarnasliceit', 'voucher'];
    var isCardForm = !!window.CardForm;

    apmList.forEach(function(el) {
      if(addressFields.indexOf(el.id) >= 0) {
        var addressField = document.getElementById('mollie-credit-card-address-' + el.id);

        var apmSearchQuery = isCardForm ? ('#' + el.id + ' > .form-radio-item') : ('#' + el.id);

        // Move to proper places
        var apmField = document.querySelector(apmSearchQuery);
        if (apmField && addressField) {
          apmField.appendChild(addressField);
          addressFields.splice(addressFields.indexOf(el.id), 1);

          // CardFormCountryDropDown Handler
          if(!!window.CardForm) {
            var countryDropdown = apmField.querySelector("[data-component='country']");
            if (countryDropdown) {

              // Country Sub-Label Initial Rendering
              var countrySubLabel = apmField.querySelector('[data-type="country"] .jfField-sublabel');
              if (countrySubLabel) {
                countrySubLabel.style.display = 'none';
              }

              // Country Sub-Label Operations
              countryDropdown.addEventListener('change', function(event) {
                try {
                  var subLabelDisplayReference = event.target.parentNode.
                    querySelector('.jfField-sublabel').style.display
                    = (event.target.value === '') ? 'none' : '';
                } catch(e) {
                  console.log(e);
                }
              }.bind(this));
            }
          }

          // Move Description Field
          if (el.id === 'klarnasliceit') {
            var klarnasliceitDescription = document.
              getElementById('mollie-credit-card-address-klarnasliceit-description');
            var klarnasliceItAdressField =
              apmField.getElementsBySelector('#mollie-credit-card-address-klarnasliceit');

              if(klarnasliceitDescription !== null && klarnasliceItAdressField && klarnasliceItAdressField[0])
                  apmField.insertBefore(klarnasliceitDescription, klarnasliceItAdressField[0]);
          }
        }
      }
    });

    // Remove Unnecessarry Address
    if (addressFields.length > 0) {
      addressFields.forEach(element => {
        var addressField = document.getElementById("mollie-credit-card-address-" + element);
        if (addressField !== null) {
          addressField.remove();
          if (element === 'klarnasliceit') {
            var description = document.getElementById("mollie-credit-card-address-klarnasliceit-description");
            if(description !== null) {
              description.remove();
            }
          }
        }
      });
    }
  },

  prettifyApmName: function(gateway) {
    var apmName = gateway.id;
    switch (gateway.id) {
      case 'ideal':
        apmName = 'iDEAL';
        break;
      case 'applepay':
        apmName = 'Apple Pay';
        break;
      case 'banktransfer':
        apmName = 'Bank Transfer';
        break;
      case 'paypal':
        apmName = 'PayPal';
        break;
      case 'klarnapaylater':
        apmName = 'Klarna: Pay Later';
        break;
      case 'klarnasliceit':
        apmName = 'Klarna: Slice It';
        break;
      case 'creditcard':
        apmName = '<?php echo visa;?>';
        break;
      case 'belfius':
        apmName = 'Belfius Pay Button';
        break;
      case 'kbc':
        apmName = 'KBC/CBC Payment Button';
        break;
      case 'giftcard':
        apmName = 'Gift Cards';
        break;
      case 'eps':
        apmName = 'EPS';
        break;
      default:
        apmName = apmName && apmName[0].toUpperCase() + apmName.slice(1);
        break;
    }

    return apmName;
  },

  createApmDom: function(apmList) {
    var self = this;
    var documentFragment = document.createDocumentFragment();
    var isCardForm = !!window.CardForm;

    if (isCardForm) {
      apmList.forEach(function(apm) {
        var name = self.prettifyApmName(apm);
        var data = apm;

        var container = new Element('div', {
          class: 'payment-method-container',
          id: data.id,
          'data-id': data.id,
        });


        var radioDiv = new Element('div', {
          class: 'form-radio-item'
        });

        var radioLabel = new Element('label', {
          'data-id': 'label_input_' + data.id,
          class: 'jfRadio withoutImage'
        });

        var radioLabelInput = new Element('input', {
          class: 'jfRadio-input form-radio',
          type: 'radio',
          id: data.id,
          name: 'radio-apm-cardform',
          value: data.id
        });

        var radioLabelDiv = new Element('div', {
          class: 'jfRadio-label'
        });

        var radioLabelDivSpan = new Element('span', {
          class: 'jfRadio-customInput'
        });
        var radioLabelDivSpanSpan = new Element('span', {
          class: 'jfRadio-customInputIcon'
        });
        radioLabelDivSpan.appendChild(radioLabelDivSpanSpan);

        var radioLabelDivImg = new Element('img', {
          class: 'jfRadio-visual',
          alt: 'Radio'
        });

        var radioLabelDivSecondSpan = new Element('span', {
          class: 'jfRadio-labelText'
        });
        radioLabelDivSecondSpan.textContent = name;

        radioLabelDiv.appendChild(radioLabelDivSpan);
        radioLabelDiv.appendChild(radioLabelDivImg);
        radioLabelDiv.appendChild(radioLabelDivSecondSpan);


        radioLabel.appendChild(radioLabelInput);
        radioLabel.appendChild(radioLabelDiv);

        var apmImg = new Element('img', {
          src: data.image, 'data-id': data.id
        });

        radioDiv.appendChild(radioLabel);
        radioDiv.appendChild(apmImg);

        container.appendChild(radioDiv);

        documentFragment.appendChild(container);
      });

      $('payment-apm-list').classList.add('jfQuestion-fields');
      $('payment-apm-list').classList.add('form-multiple-column');

      $('payment-apm-list').setAttribute("data-columncount", "1");
      $('payment-apm-list').setAttribute("data-component", "radio");

      $('payment-apm-list').appendChild(documentFragment);
    } else {
      apmList.forEach(function(apm) {
        var name = self.prettifyApmName(apm);
        var data = apm;

        var container = new Element('div', {
          class: 'payment-method-container',
          id: data.id,
          'data-id': data.id,
        });

        var input = new Element('input', {
          class: 'form-radio',
          type: 'radio',
          name: 'mollie-payment-method',
          'data-id': data.id,
          id: data.id,
          value: data.id
        });

        var label = new Element('label', { for: data.id, 'data-id': data.id }).update(name);
        var img = new Element('img', { src: data.image, 'data-id': data.id, alt: '' });

        container.appendChild(img);
        container.appendChild(input);
        container.appendChild(label);

        documentFragment.appendChild(container);
      });

      $('payment-apm-list').appendChild(documentFragment);
      JotForm.iframeHeightCaller && JotForm.iframeHeightCaller();
    }
  },

  showMollieTokenError: function(error, apmselected) {
    var message = error.message + ". Please check Test/Live Mode first.";
    if (JotForm.isPaymentSelected() && JotForm.paymentTotal) {
      if (apmselected) {
        JotForm.corrected($('mollie_dummy'));
      } else {
        this.errored(message, []);
      }
    }
    console.error(error.message);
    this.resetButton();
  },

  errored: function (msg, erroredFields) {
    if (this.dummyField) {
      this.paymentField.addClassName('form-line-error');
      this.dummyField.addClassName('form-error-message');
      this.dummyField.style = 'display:block;';
      if (this.isCardForm) { this.dummyField.style = 'display:block; margin-top:12px'; }
      this.dummyField.innerHTML = msg;
    } else {
      JotForm.errored($('mollie_dummy'), msg);
      erroredFields.each(function (f) {
        document.getElementById(f).addClassName('form-validation-error');
      });
    }
    if (!this.isCardForm) { JotForm.showButtonMessage(); }
  },


  corrected: function () {
    if (this.dummyField) {
      this.paymentField.classList.remove('form-line-error');
      this.dummyField.classList.remove('form-error-message');
      this.dummyField.style = 'display:none;';
      this.dummyField.innerHTML = '';
    } else {
      JotForm.corrected($('mollie_dummy'));
    }
  },

  resetButton: function () {
    var $this = this;
    $$('.form-submit-button').each(function (button) {
      if (button.innerHTML.indexOf('<img') === -1 && button.type === 'submit') {
        button.innerHTML = 'Submit';
      }
      button.enable();
    });
  },

  setLanguage: function (language) {
    if (typeof language !== undefined) {
      var mollieSupportedLangCodes = ['en_US', 'nl_NL', 'nl_BE', 'fr_FR', 'fr_BE', 'de_DE', 'de_AT', 'de_CH', 'es_ES', 'ca_ES', 'pt_PT', 'it_IT', 'nb_NO', 'sv_SE', 'fi_FI', 'da_DK', 'is_IS', 'hu_HU', 'pl_PL', 'lv_LV', 'lt_LT'];
      var lang = language.replace('-', '_');
      var isDirectlyMatched = mollieSupportedLangCodes.includes(lang);

      if (isDirectlyMatched) {
        return lang;
      } else if (lang.indexOf('en') > -1) {
        return 'en_US';
      } else if (lang.indexOf('nl') !== false) {
        return 'nl_NL';
      } else if (lang.indexOf('fr') !== false) {
        return 'fr_FR';
      } else if (lang.indexOf('de') !== false) {
        return 'de_DE';
      } else if (lang.indexOf('es') !== false) {
        return 'es_ES';
      } else if (lang.indexOf('ca') !== false) {
        return 'ca_ES';
      } else if (lang.indexOf('pt') !== false) {
        return 'pt_PT';
      } else if (lang.indexOf('it') !== false) {
        return 'it_IT';
      } else if (lang.indexOf('nb') !== false) {
        return 'nb_NO';
      } else if (lang.indexOf('sv') !== false) {
        return 'sv_SE';
      } else if (lang.indexOf('fi') !== false) {
        return 'fi_FI';
      } else if (lang.indexOf('da') !== false) {
        return 'da_DK';
      } else if (lang.indexOf('is') !== false) {
        return 'is_IS';
      } else if (lang.indexOf('hu') !== false) {
        return 'hu_HU';
      } else if (lang.indexOf('pl') !== false) {
        return 'pl_PL';
      } else if (lang.indexOf('lv') !== false) {
        return 'lv_LV';
      } else if (lang.indexOf('lt') !== false) {
        return 'lt_LT';
      }

      return 'en_US';

    }

  }

};
