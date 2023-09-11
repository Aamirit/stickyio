<?php include('inc/header.php') ?>

<body class="d-flex flex-column "><main class="flex-shrink-0">

  <?php include('inc/menu.php') ?>

  <section class="page-header"><div class="container"><h1><?php echo ingre;?></h1></div></section>
  <div class="neos-contentcollection">
    <div class="section section-table">
      <div class="container">
        <div class="row"><div class="col">
          <div class="neos-contentcollection"><div class="row align-items-center">
            <div class="col-sm-6"><div class="neos-contentcollection">
              <div class="image">
                <div><picture><source srcset="<?php echo url;?>/<?php echo racine;?>/img/IMG_4936-800x800.png" media="(max-width: 799px)" />
                  <source srcset="<?php echo url;?>/<?php echo racine;?>/img/IMG_4936-800x800.png 400w, <?php echo url;?>/<?php echo racine;?>/img/IMG_4936-800x800.png 600w, <?php echo url;?>/<?php echo racine;?>/img/IMG_4936-800x800.png 800w" media="(min-width: 800px)" />
                  <img class="img-fluid" src="<?php echo url;?>/<?php echo racine;?>/img/IMG_4936-800x800.png" /></picture>
                </div></div></div></div>
                <div class="col-sm-6">
                  <div class="neos-contentcollection"><div>
                    <figure class="table"><table>
                    <thead>
                    <tr><th><?php echo quant;?></th>
                      <th>&nbsp;</th><th>% NRV.</th></tr>
                    </thead>
                      <tbody><tr><td>L-Carnitine</td><td>50mg</td><td>**</td></tr><tr><td>L-Arginine</td><td>50mg</td><td>**</td></tr><tr><td><?php echo ingred1;?></td><td>50mg</td><td>**</td></tr><tr><td>L-Theanine</td><td>50mg</td><td>**</td></tr><tr><td>L-Leucine</td><td>75mg</td><td>**</td></tr><tr><td>L-Proline</td><td>75mg</td><td>**</td></tr><tr><td><?php echo ingred2;?></td><td>150mg</td><td>**</td></tr></tbody>
                    </table></figure>
                    <p>*<?php echo rapport;?></p></div></div></div></div></div></div></div></div></div>
                    <div class="section "><div class="container"><div class="row">
                      <div class="col"><div class="neos-contentcollection"><div><p><strong><?php echo dosage;?></p></div>
                      <div class="text-muted small pt-3"><p><?php echo complem;?></p></div></div></div></div></div></div></div></main>

  <?php include('inc/footer.php') ?>

  <script async src="https://eu-library.klarnaservices.com/lib.js" data-client-id="282ae5c3-7477-59d3-ab49-3463fab8460c"></script>
  <script src="js/Main.js?bust=407c4aed"></script>
  <script src="js/main.min.js?bust=ef22ff16"></script>

  </body>

  </html>
