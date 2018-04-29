<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'class/database.class.php';


echo json_encode($_GET);
$db = new Db();
$db->connect();
$db->addCoordonate($_GET['id'],$_GET['lat'],$_GET['lon']);
