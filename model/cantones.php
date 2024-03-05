<?php
require_once '../config/Conexion.php';

class Canton extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idCanton=null;
    private $provincia=null;
    private $descripcionCanton=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    

    //idCanton
    public function getIdCanton()
    {
        return $this->idCanton;
    }

    public function setIdCanton($idCanton)
    {
        $this->idCanton=$idCanton;
    }

    //provincia
    public function getProvincia()
    {
        return $this->provincia;
    }
    
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    //descripcionCanton
    public function getDescripcionCanton()
    {
        return $this->descripcionCanton;
    }

    public function setDescripcionCanton($descripcionCanton)
    {
        $this->descripcionCanton=$descripcionCanton;
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