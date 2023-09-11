
<?php
// Spécifie la durée de mise en cache à 1 heure (3600 secondes)
$cache_expire = 60*60;
header("Pragma: public");
header("Cache-Control: max-age=".$cache_expire);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
?>

<?php
include 'api/functions.php';
include 'api/products.php';
$all_products = get_product();
$lang = 'us';

if(isset($_REQUEST['lang']) && !empty($_REQUEST['lang']) && array_key_exists($_GET['lang'],CURRENCIES)){
    $lang = $_GET['lang'];
}
$url=htmlentities($_SERVER['PHP_SELF']);
require("langues.php");
?>

<!DOCTYPE html>
<html lang="<?php echo geo2;?>">
<script>console.warn("Server Side Rendering => render-from ==> \n frontend");</script>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1">
  <meta name="HandheldFriendly" content="true">
  <link rel="stylesheet" href="css/Main.css?bust=1805a96d" media="all">
  <link rel="preload" as="image" href="../img/looper3-banner-mobile.webp">

        <title><?php echo title;?></title>
        <meta name="description" content="Obtenez une alimentation Keto optimale avec Looper3, les gommes à base de compléments alimentaires pour soutenir votre régime et atteindre vos objectifs de santé et de forme physique. Commandez dès maintenant sur notre site.">
        <meta name="robots" content="index,follow" />
        <link rel="canonical" href="<?php echo url;?>/<?php echo tunel;?>?lang=<?php echo geo;?>">
        <style>@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>

    <?php include('include/metadataform.php') ?>

        <link rel="alternate" hreflang="<?php echo geo2;?>" href="<?php echo url;?>/<?php echo tunel;?>?lang=<?php echo geo;?>">

        <script type="application/ld+json">
          {
            "@context": "http:\/\/schema.org\/",
            "@type": "BreadcrumbList",
              "item": "https:\/\/<?php echo ndd;?>\/<?php echo geo;?>"
            }, {
              "@type": "ListItem",
              "position": 2,
              "name": "<?php echo ndd;?>",
              "item": "https:\/\/<?php echo ndd;?>\/<?php echo geo;?>\/"
            }]
          }
        </script>
    <?php include('include/scriptform.php') ?>
<style>
    .header{
        background: black;
    }
</style>
  </head>
