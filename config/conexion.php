<?php
require_once "global.php";

class Conexion
{
function __construct()
{
}

public static function conectar()
{
    try{
        $conn=new PDO("mysql:host=".DB_HOST_MYSQL.";dbname=".DB_NAME_MYSQL.";charset=utf8",DB_USER_MYSQL,DB_PASSWORD_MYSQL);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException $ex){
        die($ex->getMessage());
    }
}
}