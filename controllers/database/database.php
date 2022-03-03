<?php

class DBClass {

    private static $host = "localhost";
    private static $username = "lps";
    private static $password = "lucianodb"; 
    private static $database = "form_med";
   
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