<!DOCTYPE html>
<?php
include "function-customer.php";
if(session_status() === PHP_SESSION_NONE)
    session_start();

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

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <?php include "navbar-customer.php"; ?>


        <div class="container-fluid mt-7">
            <form>
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
                                        <div class="row mt-2">
                                            <div class="col">
                                                <h4>Contact Details</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Name
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Phone
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Email
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <h4>Delivery Address</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Address Line 1" disabled/>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Address Line 2" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Postcode" disabled/>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="City" disabled/>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="State" disabled/>
                                            </div>
                                        </div>
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
                                                xx.xx
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
                                        <div class="row border-bottom">
                                            <div class="col-6">
                                                Total
                                            </div>
                                            <div class="col-2" align="right">
                                                RM
                                            </div>
                                            <div class="col-4" style="font-weight:bold" align="right">
                                                1337.00
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <button type="button" class="btn btn-lg btn-primary bg-theme-cus col-12">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <?php include "page-foot-customer.php"; ?>

</body>

</html>