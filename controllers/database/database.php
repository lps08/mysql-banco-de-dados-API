<?php

class DBClass {
   
    public static function connect(){
       $connection = null;
          
       try{
           $connection = new PDO("mysql:host=" . $_ENV["DB_LINK_NAME"] . ";dbname=" . $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWD"]);
           $connection->exec("set names utf8");
       }catch(PDOException $exception){
           echo "Error mt error: " . $exception->getMessage();
       }
       return $connection;
    }
}

?>