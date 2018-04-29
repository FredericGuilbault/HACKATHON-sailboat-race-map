<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'class/database.class.php';
$db = new Db();
$db->connect();

if( isset($_GET['getBoatList']) && $_GET['getBoatList'] ){
    $boatList = $db->getActiveBoats(6); // the boats that was active in the last 6 min;
    echo json_encode($boatList);







}else if( $_GET['getCoor'] ){
    $coorList = array();

    foreach ( json_decode($_GET['boatList'] ) as $cookie ){
        $boatList[$cookie] = $db->getLastPosOf($cookie);
    }

    echo json_encode($boatList) ;

}

