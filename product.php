<?php include "function-customer.php";?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<?php
$mainString = "";
$subString = "";
$subStringL = "";
if (isset($_GET["ptype"])) {
  if ($_GET["ptype"] == "keychain" || $_GET["ptype"] == "pin" || $_GET["ptype"] == "magnet") {
    $mainString = "Badge";
  } else if ($_GET["ptype"] == "transparent" || $_GET["ptype"] == "vinyl") {
    $mainString = "Sticker";
  }
  else {
    echo "<script>location.href='index.php';</script>";
  }
  $subString = ucwords($_GET["ptype"]);
  $subStringL = $_GET["ptype"];
} else {
  echo "<script>location.href='index.php';</script>";
}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>ButtonMiUp - <?php echo $mainString; ?> </title>


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
      <!--      <div class="col-12">-->
      <!--        <h1 class="fs-1 fs-sm-3 fs-md-3 mb-4">--><?php //if (isset($_GET["ptype"])) { echo ucwords($_GET["ptype"]); } else { echo ""; } ?><!--</h1>-->
      <!--      </div>-->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="product-slider" id="galleryTop">
          <div class="swiper-container theme-slider position-lg-absolute all-0" data-swiper='{"autoHeight":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"thumb":{"spaceBetween":5,"slidesPerView":5,"loop":true,"freeMode":true,"grabCursor":true,"loopedSlides":5,"centeredSlides":true,"slideToClickedSlide":true,"watchSlidesVisibility":true,"watchSlidesProgress":true,"parent":"#galleryTop"},"slideToClickedSlide":true}'>
            <div class="swiper-wrapper h-100">
              <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="assets/img/buttonmiup/product/<?php echo $subStringL;?>/1.jpg" alt="" /></div>
              <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="assets/img/buttonmiup/product/<?php echo $subStringL;?>/2.jpg" alt="" /></div>
              <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="assets/img/buttonmiup/product/<?php echo $subStringL;?>/3.jpg" alt="" /></div>
              <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="assets/img/buttonmiup/product/<?php echo $subStringL;?>/4.jpg" alt="" /></div>
              <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="assets/img/buttonmiup/product/<?php echo $subStringL;?>/5.jpg" alt="" /></div>
              <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="assets/img/buttonmiup/product/<?php echo $subStringL;?>/6.jpg" alt="" /></div>
            </div>
            <div class="swiper-nav">
              <div class="swiper-button-next swiper-button-white"></div>
              <div class="swiper-button-prev swiper-button-white"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h4 class="mb-4 mt-lg-5"> <?php echo $subString." ".$mainString; ?> </h4>
        <h2 class="d-flex align-items-center mb-4 me-2 text-theme-cus">RM&nbsp;
          <span id="priceChange">
            <?php if ($subStringL == "transparent") { echo "1.10"; } else if ($subStringL == "vinyl") { echo "1.50"; } else if ($subStringL == "keychain") { echo "2.00"; } else if ($subStringL == "pin") { echo "1.00"; } else if ($subStringL == "magnet") { echo "1.50"; } ?>
          </span>
        </h2>
        <div class="row">
          <?php if ($mainString == "Badge") { ?>
            <div class="col-12 pe-0 mb-4">
              <div class="row">
                <div class="col-4 d-flex align-items-center">
                  <h6 class="m-0 fw-light fs-lg-0">Size (mm)</h6>
                </div>
                <div class="col-8">
                  <input type="radio" class="btn-check" name="options-outlined" value="32" id="32" autocomplete="off" checked>
                  <label class="btn btn-outline-cus fs-lg-1" for="32">32</label>
                  <input type="radio" class="btn-check" name="options-outlined" value="58" id="58" autocomplete="off">
                  <label class="btn btn-outline-cus fs-lg-1" for="58">58</label>
                </div>
              </div>
            </div>

            <script>
              var num, qty, total, priceVal = <?php if ($subStringL == "keychain") { echo "2"; } else if ($subStringL == "pin") { echo "1"; } else if ($subStringL == "magnet") { echo "1.5"; } ?>;

              const radioButtons = document.querySelectorAll('input[name="options-outlined"]');

              for(const radioButton of radioButtons){
                radioButton.addEventListener('change', showSelected);
              }

              function showSelected(e) {
                //console.log(e);
                if (this.checked) {
                  qty = $('#qtyChange').val();
                  if (this.value === '32'){
                    priceVal = <?php if ($subStringL == "keychain") { echo "2"; } else if ($subStringL == "pin") { echo "1"; } else if ($subStringL == "magnet") { echo "1.5"; } ?>;
                    num = priceVal*parseFloat(qty);
                  }
                  else if (this.value === '58') {
                    priceVal = <?php if ($subStringL == "keychain") { echo "2.5"; } else if ($subStringL == "pin") { echo "1.5"; } else if ($subStringL == "magnet") { echo "2"; } ?>;
                    num = priceVal*parseFloat(qty);
                  }
                  $('#priceChange').html(num.toFixed(2));
                }
              }
            </script>
          <?php } else if ($mainString == "Sticker") { ?>
            <div class="col-12 pe-0 mb-4">
              <div class="row">
                <div class="col-4 d-flex align-items-center">
                  <h6 class="m-0 fw-light fs-lg-0">Size (mm)</h6>
                </div>
                <div class="col-8">
                  <input type="radio" class="btn-check" name="options-outlined" value="30x60" id="30x60" autocomplete="off" checked>
                  <label class="btn btn-outline-cus fs-lg-1" for="30x60">30 x 60</label>
                  <input type="radio" class="btn-check" name="options-outlined" value="50x50" id="50x50" autocomplete="off">
                  <label class="btn btn-outline-cus fs-lg-1" for="50x50">50 x 50</label>
                  <input type="radio" class="btn-check" name="options-outlined" value="60x120" id="60x120" autocomplete="off">
                  <label class="btn btn-outline-cus fs-lg-1" for="60x120">60 x 120</label>
                </div>
              </div>
            </div>
            <div class="col-12 pe-0 mb-4">
              <div class="row">
                <div class="col-4 d-flex align-items-center">
                  <h6 class="m-0 fw-light fs-lg-0">Color</h6>
                </div>
                <div class="col-8">
                  <input type="radio" class="btn-check" name="options-outlined-2" id="whitecolor" autocomplete="off" checked>
                  <label class="btn btn-outline-cus fs-lg-1" for="whitecolor">White</label>
                  <input type="radio" class="btn-check" name="options-outlined-2" id="blackcolor" autocomplete="off">
                  <label class="btn btn-outline-cus fs-lg-1" for="blackcolor">Black</label>
                  <input type="radio" class="btn-check" name="options-outlined-2" id="goldcolor" autocomplete="off">
                  <label class="btn btn-outline-cus fs-lg-1" for="goldcolor">Gold</label>
                </div>
              </div>
            </div>

            <script>
              var num, qty, total, priceVal = <?php if ($subStringL == "transparent") { echo "1.10"; } else if ($subStringL == "vinyl") { echo "1.50"; } ?>;

              const radioButtons = document.querySelectorAll('input[name="options-outlined"]');

              for(const radioButton of radioButtons){
                radioButton.addEventListener('change', showSelected);
              }

              function showSelected(e) {
                //console.log(e);
                if (this.checked) {
                  qty = $('#qtyChange').val();
                  if (this.value === '30x60'){
                    priceVal = <?php if ($subStringL == "transparent") { echo "1.10"; } else if ($subStringL == "vinyl") { echo "1.50"; } ?>;
                    num = priceVal*parseFloat(qty);
                  }
                  else if (this.value === '50x50') {
                    priceVal = <?php if ($subStringL == "transparent") { echo "1.5"; } else if ($subStringL == "vinyl") { echo "2"; } ?>;
                    num = priceVal*parseFloat(qty);
                  }
                  else if (this.value === '60x120') {
                    priceVal = <?php if ($subStringL == "transparent") { echo "2"; } else if ($subStringL == "vinyl") { echo "2.50"; } ?>;
                    num = priceVal*parseFloat(qty);
                  }
                  $('#priceChange').html(num.toFixed(2));
                }
              }
            </script>
          <?php } ?>
          <div class="col-12 pe-0 mb-4">
            <div class="row">
              <div class="col-4 d-flex align-items-center">
                <h6 class="m-0 fw-light fs-lg-0">Quantity</h6>
              </div>
              <div class="col-8">
                <div class="input-group input-group" data-quantity="data-quantity">
                  <button class="btn btn-sm btn-outline-cus border-300 fs-lg-2" data-field="input-quantity" data-type="minus" onclick="qtySelectedMinus()">-</button>
                  <input class="form-control text-center input-quantity input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="max-width: 100px; background: white;" id="qtyChange" readonly/>
                  <button class="btn btn-sm btn-outline-cus border-300 fs-lg-2" data-field="input-quantity" data-type="plus" onclick="qtySelectedAdd()">+</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-2 px-md-3 d-flex justify-content-center mt-4 mb-3">
            <a class="btn bg-theme-cus" href="cart.php"><span class="fas fa-cart-plus me-2"></span>Proceed To Cart</a>
          </div>
          <!--          <div class="col-12 d-flex justify-content-center">-->
          <!--            <p class="fs--1 mb-0"><span class="text-danger">Disclaimer:</span> This page is only for product preview.</p>-->
          <!--          </div>-->
          <div class="col-12 d-flex justify-content-center mb-lg-5">
            <p class="fs--1 text-center">Order customization will be done at <a href="cart.php">cart</a>.<br>Price shown are estimation.</p>
          </div>
          <!--          <div class="col-auto px-0"><a class="btn btn-sm btn-outline-danger border-300" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wish List"><span class="far fa-heart me-1"></span>282</a></div>-->
        </div>
      </div>
    </div>
  </div>

</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
<script>
  function qtySelectedAdd() {
    qty = $('#qtyChange').val();
    total = parseFloat(priceVal)*(parseInt(qty)+1);
    $('#priceChange').html(total.toFixed(2));
  }

  function qtySelectedMinus() {
    qty = $('#qtyChange').val();
    if (qty != 1) {
      total = parseFloat(priceVal)*(parseInt(qty)-1);
      $('#priceChange').html(total.toFixed(2));
    }
  }
</script>


<?php include "page-foot-customer.php";?>

</body>

</html>