<script>	JotForm.newDefaultTheme = true;
	JotForm.extendsNewTheme = false;
	JotForm.singleProduct = false;
	JotForm.newPaymentUIForNewCreatedForms = true;
	JotForm.newPaymentUI = true;
	JotForm.clearFieldOnHide="disable";
	JotForm.submitError="jumpToFirstError";

	JotForm.init(function(){
	/*INIT-START*/
      JotForm.setPhoneMaskingValidator( 'input_6_full', '(###) ###-####' );
      productID = {"0":"input_3_1000","1":"input_3_1001","2":"input_3_1002"};
      paymentType = "subscription";
      JotForm.setCurrencyFormat('EUR',true, 'point');
      JotForm.totalCounter({"input_3_1000":{"price":"54.90"},"input_3_1001":{"price":"87.10"},"input_3_1002":{"price":"126.60"}});
      $$('.form-product-custom_quantity').each(function(el, i){el.observe('blur', function(){isNaN(this.value) || this.value < 1 ? this.value = '0' : this.value = parseInt(this.value)})});
      $$('.form-product-custom_quantity').each(function(el, i){el.observe('focus', function(){this.value == 0 ? this.value = '' : this.value})});
      JotForm.paymentProperties = {"sandbox":"Yes","currency":"EUR","paymentFormProperties":{"products":[{"chargeOnDay":"0","customFirstPaymentPrice":"0","customFirstPaymentPriceSource":"0","customPrice":"","customPriceSource":"0","description":"","fitImageToCanvas":"Yes","hasFirstPayment":"0","hasFirstPaymentPeriod":"0","hasTrialPeriod":"0","icon":"","images":"[]","name":"Pack 1","period":"Monthly","pid":"1000","price":"54.90","recurringtimes":"No Limit","required":"","selected":"","setupfee":"","setupfeePeriod":"","trial":"None"},{"chargeOnDay":"0","customFirstPaymentPrice":"0","customFirstPaymentPriceSource":"0","customPrice":"","customPriceSource":"0","description":"","fitImageToCanvas":"Yes","hasFirstPayment":"0","hasFirstPaymentPeriod":"0","hasTrialPeriod":"0","icon":"","images":"[]","name":"Pack 2","period":"Monthly","pid":"1001","price":"87.10","recurringtimes":"No Limit","required":"","selected":"","setupfee":"","setupfeePeriod":"","trial":"None"},{"chargeOnDay":"0","customFirstPaymentPrice":"0","customFirstPaymentPriceSource":"0","customPrice":"","customPriceSource":"0","description":"","fitImageToCanvas":"Yes","hasFirstPayment":"0","hasFirstPaymentPeriod":"0","hasTrialPeriod":"0","icon":"","images":"[]","name":"Pack 3","period":"Monthly","pid":"1002","price":"126.60","recurringtimes":"No Limit","required":"","selected":"1","setupfee":"","setupfeePeriod":"","trial":"None"}]}}
      JotForm.alterTexts({"ageVerificationError":"Vous devez avoir plus de {Ageminimum} ans pour envoyer ce formulaire.","alphabetic":"Ce champ ne peut contenir que des lettres","alphanumeric":"Ce champ ne peut contenir que des lettres et des chiffres.","appointmentSelected":"Vous avez sélectionné {time} le {date}","ccDonationMinLimitError":"Le montant minimum est de {minAmount} {currency}","ccInvalidCVC":"Le numéro CVC est invalide.","ccInvalidExpireDate":"La date d&amp;#039;expiration est invalide.","ccInvalidNumber":"Le numéro de la carte bancaire est invalide.","ccMissingDetails":"Please fill up the credit card details.","ccMissingDonation":"Veuillez saisir des valeurs numériques pour le montant des dons.","ccMissingProduct":"Veuillez sélectionner au moins un produit.","characterLimitError":"Trop de caractères. La limite est de","characterMinLimitError":"Nombre de caractères insuffisant. Le nombre minimum est de","confirmClearForm":"Êtes-vous certain de vouloir supprimer les inscriptions de ce formulaire ?","confirmEmail":"L&amp;#039;adresse e-mail ne correspond pas","currency":"Ce champ ne peut contenir que des valeurs monétaires.","cyrillic":"Ce champ ne peut contenir que des caractères cyrilliques","dateInvalid":"Ce format de date n&amp;#039;est pas valide. Le format de la date est {format}","dateInvalidSeparate":"Cette date n&amp;#039;est pas valide. Veuillez saisir une date valide {element}.","dateLimited":"Cette date est indisponible.","disallowDecimals":"Veuillez entrer un nombre entier.","dragAndDropFilesHere_infoMessage":"Glissez-déposez des fichiers ici","email":"Saisir une adresse courriel valide","fillMask":"La valeur du champ doit remplir le masque.","freeEmailError":"Les comptes e-mail gratuits ne sont pas autorisés","generalError":"Ce formulaire contient des erreurs. Veuillez les corriger avant de continuer.","generalPageError":"Cette page contient des erreurs. Veuillez les corriger avant de continuer.","gradingScoreError":"Le score total devrais être moins ou égal à","incompleteFields":"Des champs obligatoires ne sont pas remplis. Veuillez les compléter.","inputCarretErrorA":"Le nombre saisi ne peut pas être inférieur à la valeur minimum :","inputCarretErrorB":"Vous ne pouvez pas saisir une valeur supérieure à la valeur maximum :","justSoldOut":"Tout juste épuisé","lessThan":"Votre note doit être inférieure ou égale à","maxDigitsError":"Le nombre de chiffres maximum autorisé est de","maxFileSize_infoMessage":"Taille de fichier max.","maxSelectionsError":"The maximum number of selections allowed is ","minSelectionsError":"Le nombre minimum requis de sélections est de","multipleFileUploads_emptyError":"{file} est vide, veuillez sélectionner à nouveau les fichiers sans celui-ci.","multipleFileUploads_fileLimitError":"Seuls {fileLimit} téléchargements de fichiers sont autorisés.","multipleFileUploads_minSizeError":"{file} est trop petite, la taille de fichier minimale est {minSizeLimit}.","multipleFileUploads_onLeave":"Les fichiers sont en cours de téléchargement, si vous quittez maintenant le téléchargement sera annulé.","multipleFileUploads_sizeError":"{file} est trop volumineux, la taille maximale d&amp;#039;un fichier est de {sizeLimit}.","multipleFileUploads_typeError":"L&amp;#039;extension de {file} est invalide. Seules les extensions {extensions} sont autorisées.","multipleFileUploads_uploadFailed":"File upload failed, please remove it and upload the file again.","noSlotsAvailable":"Aucun emplacement disponible","notEnoughStock":"Pas assez de stock pour la sélection actuelle","notEnoughStock_remainedItems":"Pas assez de stock pour la sélection actuelle ({count} articles restants)","noUploadExtensions":"File has no extension file type (e.g. .txt, .png, .jpeg)","numeric":"Ce champ ne peut contenir que des valeurs numériques","pastDatesDisallowed":"La date ne doit pas se situer dans le passé.","pleaseWait":"Veuillez patienter.","required":"Ce champ est obligatoire.","requireEveryCell":"Toutes les cellules sont nécessaires.","requireEveryRow":"Chaque ligne est obligatoire.","requireOne":"Au moins un champ est requis","restrictedDomain":"This domain is not allowed","selectionSoldOut":"Sélection épuisée","slotUnavailable":"{heure} le {date} a été pris.Veuillez sélectionner un autre emplacement.","soldOut":"Epuisé","subProductItemsLeft":"({count} articles restants)","uploadExtensions":"Vous ne pouvez uploader que les fichiers suivants :","uploadFilesize":"La taille du fichier ne peut pas dépasser :","uploadFilesizemin":"la taille du fichier ne peut pas être inférieure à :","url":"Ce champ peut uniquement contenir une URL valide","validateEmail":"Vous devez valider cet e-mail","wordLimitError":"Trop de mots. Le nombre max. de mots est de","wordMinLimitError":"Nombre de mots insuffisants. Le minimum est de"});
      JotForm.alterTexts(undefined, true);
	/*INIT-END*/
	});

   JotForm.prepareCalculationsOnTheFly([null,null,{"name":"submit2","qid":"2","text":"Soumission","type":"control_button"},{"description":"","name":"mesProduits","qid":"3","text":"Mes produits","type":"control_mollie"},{"description":"","name":"nom","qid":"4","text":"Nom","type":"control_fullname"},{"description":"","name":"adresse","qid":"5","text":"Adresse","type":"control_address"},{"description":"","name":"numeroDe","qid":"6","text":"Numero de telephone","type":"control_phone"},{"description":"","name":"email","qid":"7","subLabel":"exemple@exemple.com","text":"E-mail","type":"control_email"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,{"name":"submit2","qid":"2","text":"Soumission","type":"control_button"},{"description":"","name":"mesProduits","qid":"3","text":"Mes produits","type":"control_mollie"},{"description":"","name":"nom","qid":"4","text":"Nom","type":"control_fullname"},{"description":"","name":"adresse","qid":"5","text":"Adresse","type":"control_address"},{"description":"","name":"numeroDe","qid":"6","text":"Numero de telephone","type":"control_phone"},{"description":"","name":"email","qid":"7","subLabel":"exemple@exemple.com","text":"E-mail","type":"control_email"}]);}, 20);
</script>