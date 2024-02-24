<?php
require_once '../config/Conexion.php';

class Sexo extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idSexo=null;
    private $descripcionSexo=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    //idSexo
    public function getIdSexo()
    {
        return $this->idSexo;
    }

    public function setIdSexo($idSexo)
    {
        $this->idSexo=$idSexo;
    }

    //descripcionSexo
    public function getDescripcionSexo()
    {
        return $this->descripcionSexo;
    }

    public function setDescripcionSexo($descripcionSexo)
    {
        $this->descripcionSexo=$descripcionSexo;
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