<?php
require_once '../config/Conexion.php';

class Cancha extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idCancha=null;
    private $descripcionCancha=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    

    //idCancha
    public function getIdCancha()
    {
        return $this->idCancha;
    }

    public function setIdCancha($idCancha)
    {
        $this->idCancha=$idCancha;
    }

    //DescripcionCancha
    public function getDescripcionCancha()
    {
        return $this->descripcionCancha;
    }

    public function setDescripcionCancha($descripcionCancha)
    {
        $this->descripcionCancha=$descripcionCancha;
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