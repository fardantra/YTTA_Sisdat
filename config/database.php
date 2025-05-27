<?php
$env = parse_ini_file(__DIR__ . '/../.env');

$host = $env["DB_HOSTNAME"];
$user = $env["DB_USER"];
$password = $env["DB_PASSWORD"];
$db_name = $env["DB_NAME"];
$port = $env["DB_PORT"];

$conn = new mysqli($host, $user, $password, $db_name, $port);

if ($conn->connect_error) {
  die("Connection Failed");
}


