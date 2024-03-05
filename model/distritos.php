<?php
require_once '../config/Conexion.php';

class Distrito extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idDistrito=null;
    private $canton=null;
    private $DescripcionDistrito=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    

    //idDistrito
    public function getIdDistrito()
    {
        return $this->idDistrito;
    }

    public function setIdDistrito($idDistrito)
    {
        $this->idDistrito=$idDistrito;
    }

    //canton
    public function getCanton()
    {
        return $this->canton;
    }
    
    public function setCanton($canton)
    {
        $this->canton = $canton;
    }

    //descripcionDistrito
    public function getDescripcionDistrito()
    {
        return $this->descripcionDistrito;
    }

    public function setDescripcionDistrito($descripcionDistrito)
    {
        $this->descripcionDistrito=$descripcionDistrito;
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