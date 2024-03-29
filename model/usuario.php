<?php
require_once '../config/Conexion.php';

class Usuario extends Conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idUsuario=null;
    private $direccionUsuario=null;
    private $sexo=null;
    private $tipoUsuario=null;
    private $nombreUsuario=null;
    private $primerApellido=null;
    private $segundoApellido=null;
    private $telefonoUsuario=null;
    private $correoUsuario=null;
    private $fechaNacimiento=null;
    private $claveUsuario=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/
   
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getDireccionUsuario()
    {
        return $this->direccionUsuario;
    }

    public function setDireccionUsuario($direccionUsuario)
    {
        $this->direccionUsuario = $direccionUsuario;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    }

    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    }

    public function getTelefonoUsuario()
    {
        return $this->telefonoUsuario;
    }

    public function setTelefonoUsuario($telefonoUsuario)
    {
        $this->telefonoUsuario = $telefonoUsuario;
    }

    public function getCorreoUsuario()
    {
        return $this->correoUsuario;
    }

    public function setCorreoUsuario($correoUsuario)
    {
        $this->correoUsuario = $correoUsuario;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getClaveUsuario()
    {
        return $this->claveUsuario;
    }

    public function setClaveUsuario($claveUsuario)
    {
        $this->claveUsuario = $claveUsuario;
    }

    /*=================================Metodos=================================*/
    public static function getConexion()
    {
        self::$conn=conexion::conectar();
    }

    public static function desconectar(){
        self::$conn = null;
    }
 
    public function verificarUsuario($usuarioCorreo,$usuarioClave){
        $sql="SELECT * FROM usuarios WHERE CorreoUsuario=:CorreoUsuario AND ClaveUsuario=:ClaveUsuario";
        $correo=$usuarioCorreo;
        $clave=$usuarioClave;
        $usuarioEncontrado = false;
    try{
    self::getConexion();
    $rs=self::$conn->prepare($sql);
    $rs->bindParam(":CorreoUsuario",$correo,PDO::PARAM_STR);
    $rs->bindParam(":ClaveUsuario",$clave,PDO::PARAM_STR);
    $rs->execute();
    self::desconectar();
    foreach($rs->fetchAll() as $reg){
        $usuarioEncontrado = true;
    }
    return $usuarioEncontrado;
    }catch(PDOException $e){
        self::desconectar();
        $error = "Error ".$e->getCode( ).": ".$e->getMessage( );;
        return json_encode($error);
    }finally{
        self::desconectar();
    }

    }
    
}