<?php
if(!isset($_SESSION['lg']) || $_SESSION['lg']=="") {
	$_SESSION['lg']='fr'; // valeur par defaut
}
if ( !empty ( $_GET['lang'] ) ) {
   $_SESSION['lg']=$_GET['lang'];
}
$file_lang = 'lang/fr-lang.php'; // valeur par defaut
/*
On teste l'existence du fichier, afin d'eviter le cas ou on
modifie l'URL pour demander a avoir du CZ (tcheque) par exemple.
Plutot que le is_file, on pourrait aussi utiliser un Array $Alangues contenant les langues acceptees
et tester le in_array( $langue, $Alangues )...
Cette methode permet de gerer sans probleme du multi-langue, et d'en rajouter/enlever facilement...
*/
if ( is_file ( 'lang/'.$_SESSION['lg'].'-lang.php' ) ) { // si le fichier existe
   $file_lang =  'lang/'.$_SESSION['lg'].'-lang.php';
}
include ( $file_lang );
?>
