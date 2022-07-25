<?php
$dbcon = "";
include "../config/db_conn.php";

if (isset($_GET['delete_row'])) {
    $row = $_GET['delete_row'];

    $sql = "delete from allproje_csc578.`order`";
    return mysqli_affected_rows($dbcon);
}

if (isset($_POST["btn_modal_submit"])) {

  //update

}

if (isset($_POST["delete"])) {



}

if (isset($_GET["delete_row"])) {





}

?>