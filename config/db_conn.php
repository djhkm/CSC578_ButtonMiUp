<?php
if(session_status() === PHP_SESSION_NONE)
    session_start();

$DATABASE_HOST = '52.221.68.18';
$DATABASE_USER = 'albayenlite_1144474';
$DATABASE_PASS = 'FreePassword12';
$DATABASE_NAME = 'albayenlite_1144474';

$dbcon = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ($dbcon->connect_errno) {
  echo 'Failed to connect to MySQL: ' . $dbcon->connect_error;
  exit();
}

//$dbcon = mysqli_connect("52.221.68.18","albayenlite_1144474","FreePassword12","albayenlite_1144474");
//if (mysqli_connect_errno())
//{
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//  exit();
//}
?>