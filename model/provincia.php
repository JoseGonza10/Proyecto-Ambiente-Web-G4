<?php
require_once '../config/conexion.php';

class sexo extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idProvincia=null;
    private $descripcionProvincia=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    //idProvincia
    public function getIdProvincia()
    {
        return $this->idProvincia;
    }

    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia=$idProvincia;
    }

    //descripcionProvincia
    public function getDescripcionProvincia()
    {
        return $this->descripcionProvincia;
    }

    public function setDescripcionProvincia($descripcionProvincia)
    {
        $this->descripcionProvincia=$descripcionProvincia;
    }

    /*=================================Metodos=================================*/
    public static function getConexion()
    {
        self::$conn=conexion::conectar();
    }

    public static function desconectar(){
        self::$conn = null;
    }
}