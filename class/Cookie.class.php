<?php
class Cookie{

    static public function exist(){
        if (isset($_COOKIE['ID']) && strlen($_COOKIE['ID']) > 0  ){
            return true ;
        }else{
            return false ;
        }
    }

    static public function setNewId(){
        $id = md5(rand(0,999999999999));
        setcookie('ID',$id,time() + (86400* 7));
        return $id ;
    }

    static public function getId(){
        if( isset($_COOKIE['ID']) && strlen($_COOKIE['ID']) > 0 ){
            return $_COOKIE['ID'] ;
        }  else {
            return false ;
        }

    }
    
//   document.cookie = cookieId + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}