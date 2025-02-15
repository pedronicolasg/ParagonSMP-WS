<?php

$config = require 'config.php';

$host = $config['db']['host'];
$dbname = $config['db']['dbname'];
$username = $config['db']['username'];
$password = $config['db']['password'];

$connString = "mysql:host=$host;port=11574;dbname=$dbname;sslmode=require";

try {
  $conn = new PDO($connString, $username, $password);

} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
