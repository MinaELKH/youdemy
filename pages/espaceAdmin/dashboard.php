<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
ob_start();
?>


<?php
$content = ob_get_clean();
include('layout.php');
?>