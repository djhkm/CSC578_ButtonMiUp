<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$dbcon = "";
include "config/db_conn.php";
//include "http://csc578.allprojectcs270.com/db_conn.php";

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
          "statusText" => "register error, duplicated email, conflict",
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
            "statusText" => "register error, internal server error",
            "statusCode" => 500
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
            "statusText" => "login error, cred does not match, conflict",
            "statusCode" => 409
        ));
      }
    }
    else {
      echo json_encode(array(
          "statusText" => "login error, email not found, gone",
          "statusCode" => 410
      ));
    }
  }

  if ($_POST["type"] == "get_a_cust_details") {

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    $query_get_a_cust_details = $dbcon -> query("SELECT * FROM CUSTOMER WHERE CustomerID = '$id';");

    if ($query_get_a_cust_details -> num_rows == 1) {
      $row_get_a_cust_details = $query_get_a_cust_details -> fetch_object();

      $output['address1'] = "";
      $output['address2'] = "";
      $output['postcode'] = "";
      $output['city'] = "";
      $output['state'] = "";
      if ($row_get_a_cust_details -> Address != NULL) {
        parse_str($row_get_a_cust_details -> Address, $output);
      }

      echo json_encode(array(
          "name" => $row_get_a_cust_details -> Name,
          "email" => $row_get_a_cust_details -> Email,
          "phone" => $row_get_a_cust_details -> PhoneNum,
          "address1" => $output['address1'],
          "address2" => $output['address2'],
          "postcode" => $output['postcode'],
          "city" => $output['city'],
          "state" => $output['state'],
          "statusText" => "get a cust details end",
          "statusCode" => 200
      ));
    }
    else {
      echo json_encode(array(
          "statusText" => "get a cust details error, user not found, gone",
          "statusCode" => 410
      ));
    }
  }

  if ($_POST["type"] == "update_cust_details") {

    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
    $address1 = filter_input(INPUT_POST, "address1", FILTER_SANITIZE_STRING);
    $address2 = filter_input(INPUT_POST, "address2", FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_NUMBER_INT);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING);

    $full_address = "address1=".$address1."&address2=".$address2."&postcode=".$postcode."&city=".$city."&state=".$state;

    $query_update_cust_details = $dbcon -> query("UPDATE CUSTOMER SET Name = '$name', Email = '$email', PhoneNum = '$phone', Address = '$full_address' WHERE CustomerID = '$id';");

    if ($query_update_cust_details) {
      echo json_encode(array(
          "statusText" => "update cust details end",
          "statusCode" => 200
      ));
    }
    else {
      echo json_encode(array(
          "statusText" => "update cust details error, internal server error",
          "statusCode" => 500
      ));
    }

  }


}

if (isset($_GET["type"])) {


  if ($_GET["type"] == "logout_all") {

    unset($_SESSION["user_id"]);
    session_destroy();
    echo "<script>location.href = 'index.php';</script>";

  }


}
?>