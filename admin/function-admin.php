<?php
$dbcon = "";
include "../config/db_conn.php";

if (isset($_GET['delete_row'])) {
    $row = $_GET['delete_row'];

    $sql = "delete from allproje_csc578.`order`";
    return mysqli_affected_rows($dbcon);
}

if (isset($_POST["type"])) {


}

if (isset($_GET["type"])) {





}

?>