<?php
require_once 'conexion.php';

class sexo extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idUsuario=null;
    private $direccionUsuario=null;
    private $sexo=null;
    private $tipoUsuario=null;
    private $nombreUsuario=null;
    private $primerApellidoUsuario=null;
    private $segundoApellidoUsuario=null;
    private $telefonoUsuario=null;
    private $correoUsuario=null;
    private $fechaUsuario=null;
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

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getPrimerApellidoUsuario()
    {
        return $this->primerApellidoUsuario;
    }

    public function setPrimerApellidoUsuario($primerApellidoUsuario)
    {
        $this->primerApellidoUsuario = $primerApellidoUsuario;
    }

    public function getPrimerApellidoUsuario()
    {
        return $this->primerApellidoUsuario;
    }

    public function setPrimerApellidoUsuario($primerApellidoUsuario)
    {
        $this->primerApellidoUsuario = $primerApellidoUsuario;
    }

    public function getSegundoApellidoUsuario()
    {
        return $this->segundoApellidoUsuario;
    }

    public function setSegundoApellidoUsuario($segundoApellidoUsuario)
    {
        $this->segundoApellidoUsuario = $segundoApellidoUsuario;
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

    public function getFechaUsuario()
    {
        return $this->fechaUsuario;
    }

    public function setFechaUsuario($fechaUsuario)
    {
        $this->fechaUsuario = $fechaUsuario;
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
 
    public function encontrarUsuario($usuarioCorreo,$usuarioClave){
        $sql="SELECT FROM USUARIOS
    WHERE CorreoUsuario= :CorreoUsuario
    AND ClaveUsuario=:ClaveUsuario";
    $usuario = new usuario();
    try{
    self::getConexion();
    $rs=self::$conn->prepare($sql);
    $rs->bindParam(":CorreoUsuario",$usuarioCorreo,PDO::PARAM_STR);
    $rs->bindParam(":ClaveUsuario",$usuarioClave,PDO::PARAM_STR);
    $rs->execute();
    $usuarios=array();
    foreach($rs->fetchAll() as $row){
        if($row['CorreoUsuario'] === $usuarioCorreo && $row['ClaveUsuario'] === $usuarioClave){
            $usuario->direccionUsuario=$row['CorreoUsuario'];
            $usuario->claveUsuario=$row['ClaveUsuario'];
        }
    }
    return $usuario;
    }catch(PDOException $e){

    }finally{
        self::desconectar();
    }

    }
    
}