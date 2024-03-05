<?php
require_once '../config/Conexion.php';

class TipoUsuario extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idTipoUsuario=null;
    private $descripcionTipo=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    

    //idTipoUsuario
    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario=$idTipoUsuario;
    }

    //descripcionTipo
    public function getDescripcionTipo()
    {
        return $this->descripcionTipo;
    }

    public function setDescripcionTipo($descripcionTipo)
    {
        $this->descripcionTipo=$descripcionTipo;
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