<!DOCTYPE html>
<?php include "function-customer.php";?>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>ButtonMiUp - Blank Page</title>


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

  <div class="container-fluid mt-7">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">Blank</div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">Blank v2</div>
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