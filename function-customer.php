<?php
$dbcon = '';
include 'config/db_conn.php';

if (isset($_POST["type"])) {


  if ($_POST["type"] == "register_cust") {

    $name = $dbcon -> real_escape_string($_POST['name']);
    $email = $dbcon -> real_escape_string($_POST['email']);
    $password = $dbcon -> real_escape_string($_POST['password_1']);

    $query_register_cust = $dbcon -> query("INSERT INTO CUSTOMER (Name, Email, Password) VALUES ('$name', '$email', '".password_hash($password, PASSWORD_DEFAULT)."');");

    if ($query_register_cust) {
      echo json_encode(array(
          "statusText" => "register end",
          "statusCode" => 200
      ));
    }
    else {
      echo json_encode(array(
          "statusText" => "register gone",
          "statusCode" => 410
      ));
    }

  }


}
?>