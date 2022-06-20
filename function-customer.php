<?php
$dbcon = "";
include "config/db_conn.php";

if (isset($_POST["type"])) {


  if ($_POST["type"] == "register_cust") {

//    $name = $dbcon -> real_escape_string($_POST['name']);
//    $email = $dbcon -> real_escape_string($_POST['email']);
//    $password = $dbcon -> real_escape_string($_POST['password_1']);

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password_1", FILTER_SANITIZE_STRING);

    $query_check_email_cust = $dbcon -> query("SELECT Email FROM CUSTOMER WHERE Email = '$email';");

    if ($query_check_email_cust -> num_rows > 0) {
      echo json_encode(array(
          "statusText" => "register error, duplicated email",
          "statusCode" => 409
      ));
    }
    else {
      $query_register_cust = $dbcon -> query("INSERT INTO CUSTOMER (Name, Email, Password) VALUES ('$name', '$email', '".password_hash($password, PASSWORD_BCRYPT)."');");

      if ($query_register_cust) {
        echo json_encode(array(
            "statusText" => "register end",
            "statusCode" => 200
        ));
      }
      else {
        echo json_encode(array(
            "statusText" => "register error",
            "statusCode" => 410
        ));
      }
    }
  }

  if ($_POST["type"] == "login_all") {

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $query_check_login = $dbcon -> query("SELECT * FROM CUSTOMER WHERE Email = '$email';");

    if ($query_check_login -> num_rows == 1) {
      $row_check_login = $query_check_login -> fetch_object();
      if (password_verify($password, $row_check_login -> Password)) {
        $_SESSION["user_id"] = $row_check_login -> CustomerID;
        echo json_encode(array(
            "statusText" => "login end",
            "statusCode" => 200
        ));
      }
      else {
        echo json_encode(array(
            "statusText" => "login error, cred does not match",
            "statusCode" => 409
        ));
      }
    }
    else {
      echo json_encode(array(
          "statusText" => "login error, email not found",
          "statusCode" => 410
      ));
    }
  }


}
?>