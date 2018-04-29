<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'class/Cookie.class.php';
require_once 'class/database.class.php';
?>

<html>
<head>
    <title> Courseur </title>
</head>
<body>

<?php

if ( Cookie::exist() ){
    include('inc/tracking.php');

}else if( isset($_POST['new_courseur']) && $_POST['new_courseur'] ){
    $cookieId = Cookie::setNewId();

    //TODO write to database
    $db = new Db();
    $db->connect();

    $club = $_POST['club'];
    $classe = $_POST['embarcation'];
    $voile = $_POST['numVoile'];
    $provenance = $_POST['provenance'];

    $db->addCourseur($club,$classe,$voile,$cookieId,$provenance);
    $db->addEquipier($cookieId,$_POST['equipier_1_role'], $_POST['equipier_1_nom']);
    $db->addEquipier($cookieId,$_POST['equipier_2_role'], $_POST['equipier_2_nom']);
    $db->addEquipier($cookieId,$_POST['equipier_3_role'], $_POST['equipier_3_nom']);
    $db->addEquipier($cookieId,$_POST['equipier_4_role'], $_POST['equipier_4_nom']);

    //table user
    include('inc/tracking.php');

}else{
    include('inc/new_courseur.php');
}

?>

</body>
</html>