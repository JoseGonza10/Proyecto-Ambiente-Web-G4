<?php
require_once '../config/Conexion.php';

class Reservacion extends Conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    
    private $idReservacion=null;
    private $usuario=null;
    private $cancha=null;
    private $diaReservacion=null;
    private $codigoQR=null;
    private $fechaReservacion=null;
    private $horaReservacion=null;
    private $tamanoGrupo=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/
   

    //idReservacion
    public function getIdReservacion()
    {
        return $this->idReservacion;
    }

    public function setIdReservacion($idReservacion)
    {
        $this->idReservacion = $idReservacion;
    }

    //usuario
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario; 
    }

    //cancha
    public function getCancha()
    {
        return $this->cancha;
    }

    /**
     * Set the value of cancha
     *
     * @return  self
     */ 
    public function setCancha($cancha)
    {
        $this->cancha = $cancha;

        
    }

    /**
     * Get the value of diaReservacion
     */ 
    public function getDiaReservacion()
    {
        return $this->diaReservacion;
    }

    /**
     * Set the value of diaReservacion
     *
     * @return  self
     */ 
    public function setDiaReservacion($diaReservacion)
    {
        $this->diaReservacion = $diaReservacion;

        
    }

    /**
     * Get the value of codigoQR
     */ 
    public function getCodigoQR()
    {
        return $this->codigoQR;
    }

    /**
     * Set the value of codigoQR
     *
     * @return  self
     */ 
    public function setCodigoQR($codigoQR)
    {
        $this->codigoQR = $codigoQR;

        
    }

    /**
     * Get the value of fechaReservacion
     */ 
    public function getFechaReservacion()
    {
        return $this->fechaReservacion;
    }

    /**
     * Set the value of fechaReservacion
     *
     * @return  self
     */ 
    public function setFechaReservacion($fechaReservacion)
    {
        $this->fechaReservacion = $fechaReservacion;

        
    }

    /**
     * Get the value of horaReservacion
     */ 
    public function getHoraReservacion()
    {
        return $this->horaReservacion;
    }

    /**
     * Set the value of horaReservacion
     *
     * @return  self
     */ 
    public function setHoraReservacion($horaReservacion)
    {
        $this->horaReservacion = $horaReservacion;

        
    }

    /**
     * Get the value of tamanoGrupo
     */ 
    public function getTamanoGrupo()
    {
        return $this->tamanoGrupo;
    }

    /**
     * Set the value of tamanoGrupo
     *
     * @return  self
     */ 
    public function setTamanoGrupo($tamanoGrupo)
    {
        $this->tamanoGrupo = $tamanoGrupo;

        
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