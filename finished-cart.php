<?php include "function-customer.php";?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>ButtonMiUp - Order Placed</title>


  <?php
  include "page-head-customer.php";
  ?>
</head>


<body>
<?php
include "config/info_notification.php";
include "config/success_notification.php";
include "config/warning_notification.php";
include "config/danger_notification.php";
?>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main overflow-hidden" id="top">
  <?php include "navbar-customer.php";?>

  <div class="container mt-7">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body text-center py-5">
            <div class="row justify-content-center">
              <div class="col-7 col-md-5"><img class="img-fluid" src="assets/img/icons/spot-illustrations/45.png" alt="" style="width:58%;" /></div>
            </div>
            <h3 class="mt-3 fw-normal fs-2 mt-md-4 fs-md-3">Order Placed !</h3>
            <p class="lead mb-5">Your order will be shipped out within few days. <br class="d-none d-md-block" /> </p>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <form class="row gx-2">
                  <div class="col-sm mb-2 mb-sm-0">
                    <input class="form-control" type="email" placeholder="Email address" aria-label="Recipient's username" />
                  </div>
                  <div class="col-sm-auto">
                    <button class="btn btn-primary d-block w-100" type="submit">Send Order Details</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
<!--          <div class="card-footer bg-light text-center pt-4">-->
<!--            <div class="row justify-content-center">-->
<!--              <div class="col-11 col-sm-10">-->
<!--                <h4 class="fw-normal mb-0 fs-1 fs-md-2">More ways to <br class="d-sm-none" /> invite your friends</h4>-->
<!--                <div class="row gx-2 my-4">-->
<!--                  <div class="col-lg-4">-->
<!--                    <button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0"><img src="../../assets/img/logos/gmail.png" width="20" alt="" /><span class="fw-medium ms-2">Invite from Gmail</span></button>-->
<!--                  </div>-->
<!--                  <div class="col-lg-4">-->
<!--                    <button class="btn btn-falcon-default d-block w-100 mb-2 mb-xl-0" data-bs-toggle="modal" data-bs-target="#copyLinkModal"><span class="fas fa-link text-700"></span><span class="fw-medium ms-2">Copy Link</span></button>-->
<!--                    <div class="modal fade" id="copyLinkModal" tabindex="-1" role="dialog" aria-labelledby="copyLinkModalLabel" aria-hidden="true">-->
<!--                      <div class="modal-dialog" role="document">-->
<!--                        <div class="modal-content overflow-hidden">-->
<!--                          <div class="modal-header">-->
<!--                            <h5 class="modal-title" id="copyLinkModalLabel">Your personal referral link</h5>-->
<!--                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                          </div>-->
<!--                          <div class="modal-body bg-light p-4">-->
<!--                            <form>-->
<!--                              <input class="form-control form-control-sm invitation-link" value="https://falcon.com/invited" />-->
<!--                            </form>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-lg-4">-->
<!--                    <button class="btn btn-falcon-default d-block w-100 ms-0 mb-xl-0"><span class="fab fa-facebook-square text-facebook" data-fa-transform="grow-2"></span><span class="fw-medium ms-2">Share on Facebook</span></button>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <p class="mb-2 fs--1">Once you’ve invited friends, you can <a href="#!">view the status of your referrals</a><br class="d-none d-lg-block d-xxl-none" /> or visit our <a href="#!">Help Center </a>if you have any questions. </p>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
        </div>
      </div>
    </div>
  </div>
</main>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<?php include "page-foot-customer.php";?>

</body>

</html>