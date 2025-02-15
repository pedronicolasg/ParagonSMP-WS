<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$basepath = $basepath ?? './';

require_once $basepath . 'methods/conn.php';
require_once $basepath . 'methods/ui.php';
require_once $basepath . 'methods/simpleclans.php';
require_once $basepath . 'methods/utils.php';

$UI = new UI($conn);
$utils = new Utils($conn);
$simpleClans = new SimpleClans($conn);

?>
<link rel="stylesheet" href="assets/css/custom.css"> 