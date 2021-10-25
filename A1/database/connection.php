<?php
include_once '../config/config.php';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_errno) {
  echo "Error al conectar a MySQL: " . $mysqli->connect_error;
}