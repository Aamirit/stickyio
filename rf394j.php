

<?php
include('inc/header.php')
?>

  <body class="d-flex flex-column orderpage">
    <main class="flex-shrink-0">

<?php include('inc/menu.php') ?>

      <div class="neos-contentcollection">
        <div class="section pb-0">

<?php include('inc/pack.php') ?>

        </div>

<?php include('inc/rf394j/form.php') ?>
<?php
session_destroy();
unset($_SESSION['u1_id']);
unset($_SESSION['u2_id']);
unset($_SESSION['order_id']);
unset($_SESSION['payment_type']);
unset($_SESSION['is_upsell_skip']);
?>

        <div class="section ">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="neos-contentcollection">

                  <script type="application/ld+json">
                    {
                      "@context": "http:\/\/schema.org\/",
                      "@type": "Product",
                      "name": "looper3",
                      "aggregateRating": {
                        "@type": "AggregateRating",
                        "ratingValue": 4.7000000000000002,
                        "ratingCount": 17
                      }
                    }
                  </script>

<?php include('inc/avis.php') ?>

                  <div class="modal fade" id="reviewGalleryModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          <div class="spinner-border" role="status"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </main>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            let url = './api/proccess.php?action=vistor&page=rf394_page&type=page_view'
            fetch(url)
                .then(response => {
                    // handle the response
                })
                .catch(error => {
                    // handle the error
                });
        });
        document.addEventListener("click", function(event) {
            let url = './api/proccess.php?action=vistor&page=rf394_page&type=page_click'
            fetch(url)
                .then(response => {
                    // handle the response
                })
                .catch(error => {
                    // handle the error
                });
        });
    </script>
<?php include('inc/footer.php') ?>

<?php include('inc/flag.php') ?>
    <script src="js/Main.js"></script>
    <script src="js/main.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet">
  </body>

</html>
