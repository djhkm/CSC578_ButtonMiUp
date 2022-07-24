<?php
require_once 'cartclasses.php';
if(session_status() === PHP_SESSION_NONE)
  session_start();

if(isset($_POST['index']) && isset($_FILES['file']['name'])){
  $index = filter_input(INPUT_POST, 'index', FILTER_SANITIZE_NUMBER_INT);

  $filename = $_POST['index']."-".date("dmyHis").".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
  $dir = 'assets/img/buttonmiup/cart/'.$filename;

  if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
    echo json_encode(array(
        "statusText" => "file upload success",
        "statusCode" => 200,
        "fileName" => $filename
    ));
    $_SESSION['badgeOrders'][$index] -> setFilename($filename);
  }
  else {
    echo json_encode(array(
        "statusText" => "file upload error, internal server error",
        "statusCode" => 500,
        "fileName" => ""
    ));
  }
}
?>