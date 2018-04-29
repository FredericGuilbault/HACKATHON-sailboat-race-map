<?php

class Db {
    private $con ;

    function connect(){
        $con = new PDO('sqlite:database.sqlite');
        $this->con = $con ;
        return $con;
    }

    function addCourseur($club,$classe,$voile,$cookie,$provenance){
        $this->con->query("INSERT INTO `courseur`(`club`,`classe`,`voile`,`cookie`,`provenance`) VALUES ('".$club."','".$classe."','".$voile."','".$cookie."','".$provenance."');");
    }

    function addEquipier($cookie, $role, $nom){
        $this->con->query("INSERT INTO `equipage`(`cookie`,`role`,`nom`) VALUES ('".$cookie."','".$role."','".$nom."');");
    }

    function addCoordonate($cookie,$lat,$lon){
        $this->con->query("INSERT INTO `positions`(`cookie`,`heure`,`lat`,`lon`) VALUES ('".$cookie."',"."CURRENT_TIMESTAMP".",'".$lat."','".$lon."');");
    }

    function getActiveBoats($min){
                    $rboat = $this->con->query("SELECT * FROM `courseur` " );
        return $rboat->fetchAll(2);
    }

    function  getLastPosOf($cookie){
        $r = $this->con->query("SELECT lat, lon FROM `positions` WHERE `cookie` LIKE '$cookie' ORDER BY datetime(heure) DESC  LIMIT 1" );
        return $r->fetchAll(2);
    }

    function getBoatData($cookie){
        $boatData= array();
        $boat = $this->con->query("SELECT * FROM `courseur` WHERE  `cookie` = '".$cookie."'" );
        //FIXME  assume array of boatdata
        return $boatData;


    }
}
