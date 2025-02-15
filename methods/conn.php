<?php
$config = require 'config.php';

if (!isset($config['db'])) {
  die("Erro: Configurações do banco de dados não encontradas.");
}

$dbConfig = $config['db'];

$host = $dbConfig['host'];
$dbname = $dbConfig['dbname'];
$username = $dbConfig['username'];
$password = $dbConfig['password'];
$port = $dbConfig['port'];
$sslrootcert = $dbConfig['sslrootcert'];

if (!file_exists($sslrootcert)) {
  die("Erro: Certificado SSL não encontrado em $sslrootcert.");
}

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";

$options = [
  PDO::MYSQL_ATTR_SSL_CA => $sslrootcert,
  PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
];

try {
  $conn = new PDO($dsn, $username, $password, $options);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilita exceções para erros
} catch (PDOException $e) {
  die("Erro de conexão: " . $e->getMessage());
}
return $conn;
