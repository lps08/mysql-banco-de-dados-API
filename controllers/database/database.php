<?php

class DBClass {

    private static $host = $_ENV["HOST"];
    private static $username = $_ENV["DB_USER"];
    private static $password = $_ENV["DB_PASSWD"]; 
    private static $database = $_ENV["DB_NAME"];
   
    public static function connect(){
       $connection = null;
   
       try{
           $connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database, self::$username, self::$password);
           $connection->exec("set names utf8");
       }catch(PDOException $exception){
           echo "Error: " . $exception->getMessage();
       }
       return $connection;
    }
}

?>