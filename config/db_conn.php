<?php
session_start();

$DATABASE_HOST = 'csc578.ml';
$DATABASE_USER = '1144474';
$DATABASE_PASS = 'FreePassword12';
$DATABASE_NAME = '1144474';

$dbcon = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME, '/var/run/mysqld/mysqld.sock');
if ($dbcon->connect_errno) {
  echo 'Failed to connect to MySQL: ' . $dbcon->connect_error;
  exit();
}
?>