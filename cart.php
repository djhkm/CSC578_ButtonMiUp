<?php include "function-customer.php";?>
<!DOCTYPE html>
<?php
/* initialize cart items array */
if(!isset($_SESSION['badgeOrders']))
  $_SESSION['badgeOrders'] = [];
if(!isset($_SESSION['stickerOrders']))
  $_SESSION['stickerOrders'] = [];


/* initialize counts */
if(!isset($_SESSION['badgeCount']))
  $_SESSION['badgeCount'] = 0;
if(!isset($_SESSION['stickerCount']))
  $_SESSION['stickerCount'] = 0;
if(!isset($_SESSION['absoluteBR']))
  $_SESSION['absoluteBR'] = 0;
if(!isset($_SESSION['absoluteSR']))
  $_SESSION['absoluteSR'] = 0;


/* initialize <select> items */
if(!isset($_SESSION['badgeTypes'])){
  $badgeTypeQuery = "SELECT * FROM BADGE_DETAILS";
  if ($badgeTypeResults = mysqli_query($dbcon, $badgeTypeQuery)) {
    $index = 0;
    $_SESSION['badgeTypes'] = array();
    while ($badgeTypeRow = mysqli_fetch_assoc($badgeTypeResults)) {
      $_SESSION['badgeTypes'][$index] = array("id" => $badgeTypeRow['Type'], "desc" => $badgeTypeRow['Description']);
      $index++;
    }
  }
}

if(!isset($_SESSION['badgeSizes'])){
  $badgeSizeQuery = "SELECT * FROM BADGE_SIZE";
  if ($badgeSizeResults = mysqli_query($dbcon, $badgeSizeQuery)) {
    $index = 0;
    $_SESSION['badgeSizes'] = array();
    while ($badgeSizeRow = mysqli_fetch_assoc($badgeSizeResults)) {
      $_SESSION['badgeSizes'][$index] = array("id" => $badgeSizeRow['Size'], "desc" => $badgeSizeRow['Description']);
      $index++;
    }
  }
}

if(!isset($_SESSION['stickerTypes'])){
  $stickerTypeQuery = "SELECT * FROM STICKER_DETAILS";
  if ($stickerTypeResults = mysqli_query($dbcon, $stickerTypeQuery)) {
    $index = 0;
    $_SESSION['stickerTypes'] = array();
    while ($stickerTypeRow = mysqli_fetch_assoc($stickerTypeResults)) {
      $_SESSION['stickerTypes'][$index] = array("id" => $stickerTypeRow['Type'], "desc" => $stickerTypeRow['Description']);
      $index++;
    }
  }
}

if(!isset($_SESSION['stickerSizes'])){
  $stickerSizeQuery = "SELECT * FROM STICKER_SIZE";
  if ($stickerSizeResults = mysqli_query($dbcon, $stickerSizeQuery)) {
    $index = 0;
    $_SESSION['stickerSizes'] = array();
    while ($stickerSizeRow = mysqli_fetch_assoc($stickerSizeResults)) {
      $_SESSION['stickerSizes'][$index] = array("id" => $stickerSizeRow['Size'], "desc" => $stickerSizeRow['Description']);
      $index++;
    }
  }
}

if(!isset($_SESSION['stickerColors'])) {
  $_SESSION['stickerColors'] = array();
  $_SESSION['stickerColors'][0] = array("id" => 1, "desc" => "White");
  $_SESSION['stickerColors'][1] = array("id" => 2, "desc" => "Black");
  $_SESSION['stickerColors'][2] = array("id" => 3, "desc" => "Gold");

}
?>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>ButtonMiUp - Cart</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <?php
  include "cartjs.php";
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
<main class="main" id="top">
  <?php include "navbar-customer.php"; ?>


  <div class="container-fluid mt-7">
    <form id="at_cart_form" method="post" enctype="multipart/form-data">
      <div class="row">
        <!--==================================================-->
        <!--                  Items                           -->
        <!--==================================================-->
        <div class="col-lg-9 col-sm-12">
          <!-- ============================================-->
          <!-- <section> begin ============================-->
          <div class="row text-center">
            <div class="col">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 mt-2">
                    <div class="card card-span h-100">
                      <a id="badgeBtn" class="btn stretched-link btn-info" onclick="updateCard(1)">
                        <div class="card-body pt-4 pb-4">
                          <h5>Badge</h5>
                          <p>Keychain, Pin, &amp; Magnet badges</p>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6 mt-2">
                    <div class="card card-span h-100">
                      <a id="stickerBtn" class="btn stretched-link" onclick="updateCard(2)">
                        <div class="card-body pt-4 pb-4">
                          <h5>Sticker</h5>
                          <p>Acrylic &amp; Transparent stickers</p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div> <!-- end of .container-->
            </div>
          </div>
          <!-- <section> close ============================-->
          <!-- ============================================-->
          <div class="row">
            &emsp;
          </div>
          <div class="card scrollbar-overlay" style="max-height: 600px;">
            <div id="cart-card" class="card-body"></div>
          </div>
        </div>
        <!--==================================================-->
        <!--                  Cart Total                      -->
        <!--==================================================-->
        <div class="col-lg-3 col-sm-12 mt-2">
          <div class="card sticky-top">
            <div class="card-body">
              <div class="row">
                <div class="container">

                  <?php
                  if (isset($_SESSION["user_id"])) {

                    $query_get_a_cust_details = $dbcon -> query("SELECT * FROM CUSTOMER WHERE CustomerID = '".$_SESSION["user_id"]."';");

                    $cart_cust_name = "";
                    $cart_cust_email = "";
                    $cart_cust_phone = "";
                    $cart_cust_address = "";

                    $output['address1'] = "";
                    $output['address2'] = "";
                    $output['postcode'] = "";
                    $output['city'] = "";
                    $output['state'] = "";

                    if ($query_get_a_cust_details -> num_rows == 1) {
                      $row_get_a_cust_details = $query_get_a_cust_details -> fetch_object();

                      $cart_cust_name = $row_get_a_cust_details -> Name;
                      $cart_cust_email = $row_get_a_cust_details -> Email;
                      $cart_cust_phone = $row_get_a_cust_details -> PhoneNum;
                      if ($cart_cust_phone == NULL) {
                        $cart_cust_phone = "<a class='fw-semi-bold' href='details-customer.php'>Click here to add</a>";
                      }

                      $cart_cust_address = $row_get_a_cust_details -> Address;

                      parse_str($row_get_a_cust_details -> Address, $output);
                    }
                    ?>
                    <div class="row mt-2">
                      <div class="col-12">
                        <h4>Contact Details</h4>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-12">
                        <p class="m-0">Name: <span class="fw-bold"><?php echo $cart_cust_name;?></span></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <p class="m-0">Email: <span class="fw-bold"><?php echo $cart_cust_email;?></span></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <p class="m-0">Phone: <span class="fw-bold"><?php echo $cart_cust_phone;?></span></p>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <h4>Delivery Address&nbsp;<?php if (!isset($output['address1'])) { echo "<a class='fs-1' href='details-customer.php'>Add Address</a>"; }?></h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <p class="m-0">Address Line 1: <span class="fw-bold"><?php if (isset($output['address1'])) { echo @$output['address1']; } else { echo "No data"; } ?></span></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <p class="m-0">Address Line 2: <span class="fw-bold"><?php if (isset($output['address1'])) { echo @$output['address2']; } else { echo "No data"; } ?></span></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <p class="m-0">Postcode: <span class="fw-bold"><?php if (isset($output['postcode'])) { echo @$output['address1']; } else { echo "No data"; } ?></span></p>
                      </div>
                      <div class="col-lg-6">
                        <p class="m-0">City: <span class="fw-bold"><?php if (isset($output['city'])) { echo @$output['address1']; } else { echo "No data"; } ?></span></p>
                      </div>
                      <div class="col-lg-12">
                        <p class="m-0">State: <span class="fw-bold"><?php if (isset($output['state'])) { echo @$output['address1']; } else { echo "No data"; } ?></span></p>
                      </div>
                    </div>
                    <?php
                  }
                  else {
                    ?>
                    <div class="row mt-2">
                      <div class="col">
                        <h4>Contact Details</h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        Name<span class="text-danger">*</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" required />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        Phone<span class="text-danger">*</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" required />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        Email<span class="text-danger">*</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="email" class="form-control" required />
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col">
                        <h4>Delivery Address</h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        Address Line 1<span class="text-danger">*</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" required  />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        Address Line 2
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        Postcode<span class="text-danger">*</span>
                        <input type="text" class="form-control" required />
                      </div>
                      <div class="col">
                        City<span class="text-danger">*</span>
                        <input type="text" class="form-control" required />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        State<span class="text-danger">*</span>
                        <input type="text" class="form-control" required />
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                  <div class="row mt-4">
                    <div class="col">
                      <h4>Estimated Price</h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      Subtotal
                    </div>
                    <div class="col-md-2" align="right">
                      RM
                    </div>
                    <div class="col-md-4" align="right">
                      0.00
                    </div>
                  </div>
                  <div class="row border-bottom">
                    <div class="col-md-6">
                      Shipping Fee
                    </div>
                    <div class="col-md-2" align="right">
                      RM
                    </div>
                    <div class="col-md-4" align="right">
                      8.00
                    </div>
                  </div>
                  <div class="row border-bottom d-flex align-items-center">
                    <div class="col-6">
                      Total
                    </div>
                    <div class="col-2" align="right">
                      RM
                    </div>
                    <div class="col-4 fs-3" style="font-weight:bold" align="right">
                      8.00
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col">
                      <button type="button" class="btn btn-lg bg-theme-cus col-12" id="at_cart_btn">Place Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <script>
      $(document).ready(function () {

        $('#at_cart_btn').on('click', function (event) {
          event.preventDefault();
          console.log('cart start');

          $.ajax({
            type: 'POST',
            url: 'function-customer.php',
            data: {
              type:'at_cart'
            },
            beforeSend:function () {
              $('#at_cart_btn').attr('disabled', 'disabled');
              $('#infoNotificationText').html('Validating...');
              $('#infoNotificationToast').toast('show');
              loader.showLoader();
            },
            success:function (data){
              //console.log('POSTED update, data is \n' + data);

              var dataResult = JSON.parse(data);
              document.getElementById('itemBadge[' + rowIndex + '][badgeImageName]').innerHTML = dataResult.fileName;
            }
          });

          // var xBadge = document.getElementById('badgeRows').querySelectorAll('.form-control, .form-select');
          // var iBadge, badgeProperties = '';
          // for (iBadge = 0; iBadge < xBadge.length; iBadge++) {
          //   badgeProperties += xBadge[iBadge].id + ',';
          // }
          // console.log(badgeProperties);
          //
          // var xSticker = document.getElementById('stickerRows').querySelectorAll('.form-control, .form-select');
          // var iSticker, stickerProperties = '';
          // for (iSticker = 0; iSticker < xSticker.length; iSticker++) {
          //   stickerProperties += xSticker[iSticker].id + ',';
          // }
          // console.log(stickerProperties);
        });

      });
    </script>
  </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<?php include "page-foot-customer.php"; ?>

</body>

</html>