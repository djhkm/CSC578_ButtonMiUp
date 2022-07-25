<?php
if(session_status() === PHP_SESSION_NONE)
  session_start();

include "function-admin.php";

if($_SESSION['role'] == 'Admin')
  header('Location: order-admin.php');

$errorMsg = "";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //$verify = 'no';
  $adminName = filter_input(INPUT_POST, 'adminName', FILTER_SANITIZE_STRING);
  $adminPass = filter_input(INPUT_POST, 'adminPass', FILTER_SANITIZE_STRING);
  $query_admin = "SELECT * FROM admin WHERE adminName = '$adminName'";

  if($result = mysqli_query($dbcon, $query_admin)){
    //$verify = "entered";
    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);

      if(password_verify($adminPass, $row['Password'])){
        $_SESSION['user_id'] = $row['AdminID'];
        $_SESSION['user_name'] = $row['AdminName'];
        $_SESSION['role'] = 'Admin';

        header('Location: order-admin.php');
        //$verify = 'yes';
      }else{
        $errorMsg = "Invalid login.";//. password_hash($adminPass, PASSWORD_BCRYPT) . " | " . $row['Password'];
        //$verify = "wrong pass";
      }
    }else{
      $errorMsg = "Invalid login.";
      //$verify = $errorMsg;
    }
  }else{
    $errorMsg = 'Invalid login.';
    //$verify = $errorMsg;
  }
  //echo "<script>console.log('login status: {$verify}')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>ButtonMiUp - Admin Login</title>
  <?php include "page-head-admin.php"; ?>
</head>
<body>
<main class="main overflow-hidden" id="top">
  <?php //include "navbar-admin.php";?>

  <div class="container mt-2">
    <div class="card">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-6 border-end">
              <img class="img-fluid float-end pe-6 mt-6" width="350px" src="../assets/img/logo-bmu.png"/>
            </div>
            <div class="col-6 ps-6">
              <form method="post" action="#">
                <div class="row">
                  <div class="mb-3">
                    <label class="form-label" for="adminName">Username</label>
                    <input class="form-control" id="adminName" name="adminName" type="text" placeholder="Enter username here." />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="adminPass">Password</label>
                    <input class="form-control" id="adminPass" name="adminPass" type="password" placeholder="Enter password here."/>
                  </div>
                </div>
                <div class="row">
                  <input type="submit" class="btn btn-primary" value="Login"/>
                </div>
                <?php
                  if(!empty($errorMsg)){
                ?>
                <div class="row mt-2">
                  <div class="alert alert-danger"><?=$errorMsg?></div>
                </div>
                <?php
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
</body>
</html>
