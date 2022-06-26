<?php
if(session_status() === PHP_SESSION_NONE)
    session_start();

$DATABASE_HOST = 'prolinguaconsultants.ipagemysql.com';
$DATABASE_USER = 'mseet_32042127';
$DATABASE_PASS = 'FreePassword12@';
$DATABASE_NAME = 'ss_dbname_32042127';

$dbcon = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ($dbcon->connect_errno) {
  echo 'Failed to connect to MySQL: ' . $dbcon->connect_error;
  exit();
}
?>