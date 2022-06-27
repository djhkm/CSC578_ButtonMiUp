<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'allproje_csc578';
$DATABASE_PASS = 'FreePassword12';
$DATABASE_NAME = 'allproje_csc578';

$dbcon = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ($dbcon->connect_errno) {
  echo 'Failed to connect to MySQL: ' . $dbcon->connect_error;
  exit();
}
?>