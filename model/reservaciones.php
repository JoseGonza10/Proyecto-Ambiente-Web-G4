<?php
require_once '../config/Conexion.php';

class Reservacion extends Conexion
 {
    /*===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === Atributos de clase ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === */
    protected static $conn;

    private $idReservacion = null;
    private $usuario = null;
    private $cancha = null;
    private $diaReservacion = null;
    private $codigoQR = null;
    private $fechaReservacion = null;
    private $horaReservacion = null;
    private $tamanoGrupo = null;

    /*===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === Constructor ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === */

    public function __construct() {
    }

    /*===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === Encapsuladores ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === */

    //idReservacion

    public function getIdReservacion()
 {
        return $this->idReservacion;
    }

    public function setIdReservacion( $idReservacion )
 {
        $this->idReservacion = $idReservacion;
    }

    //usuario

    public function getUsuario()
 {
        return $this->usuario;
    }

    public function setUsuario( $usuario )
 {
        $this->usuario = $usuario;

    }

    //cancha

    public function getCancha()
 {
        return $this->cancha;
    }

    public function setCancha( $cancha )
 {
        $this->cancha = $cancha;

    }

    //diaReservacion

    public function getDiaReservacion()
 {
        return $this->diaReservacion;
    }

    public function setDiaReservacion( $diaReservacion )
 {
        $this->diaReservacion = $diaReservacion;

    }

    //codigoQR

    public function getCodigoQR()
 {
        return $this->codigoQR;
    }

    public function setCodigoQR( $codigoQR )
 {
        $this->codigoQR = $codigoQR;

    }

    //fechaReservacion

    public function getFechaReservacion()
 {
        return $this->fechaReservacion;
    }

    public function setFechaReservacion( $fechaReservacion )
 {
        $this->fechaReservacion = $fechaReservacion;
    }

    //horaReservacion

    public function getHoraReservacion()
 {
        return $this->horaReservacion;
    }

    public function setHoraReservacion( $horaReservacion )
 {
        $this->horaReservacion = $horaReservacion;

    }

    //tamanoGrupo

    public function getTamanoGrupo()
 {
        return $this->tamanoGrupo;
    }

    public function setTamanoGrupo( $tamanoGrupo )
 {
        $this->tamanoGrupo = $tamanoGrupo;

    }

    /*======  ===  ===  ===  ===  ===  ===  ===  ===  === Metodos ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  === */

    public static function getConexion()
 {
        self::$conn = conexion::conectar();
    }

    public static function desconectar() {
        self::$conn = null;
    }

    // Inserción

    public function insertarReservacion() {
        $query = 'INSERT INTO `reservaciones`(`usuario`, `cancha`, `diaReservacion`, `codigoQR`, `fechaReservacion`, `horaReservacion`, `tamanoGrupo`) 
            VALUES (:usuario,:cancha,:diaReservacion,:codigoQR,:fechaReservacion,:horaReservacion,:tamanoGrupo,now())';
        try {
            self::getConexion();

            $usuario = $this->getUsuario();
            $cancha = $this->getCancha();
            $diaReservacion = $this->getDiaReservacion();
            $codigoQR = $this->getCodigoQR();
            $fechaReservacion = $this->getFechaReservacion();
            $horaReservacion = $this->getHoraReservacion();
            $tamanoGrupo = $this->getTamanoGrupo();

            $resultado = self::$cnx->prepare( $query );
            $resultado->bindParam( ':usuario', $usuario, PDO::PARAM_INT );
            $resultado->bindParam( ':cancha', $cancha, PDO::PARAM_INT );
            $resultado->bindParam( ':diaReservacion', $diaReservacion, PDO::PARAM_INT );
            $resultado->bindParam( ':codigoQR', $codigoQR, PDO::PARAM_STR );
            $resultado->bindParam( ':fechaReservacion', $fechaReservacion, PDO::PARAM_STR );
            $resultado->bindParam( ':horaReservacion', $horaReservacion, PDO::PARAM_STR );
            $resultado->bindParam( ':telefonoUsuario', $telefonoUsuario, PDO::PARAM_STR );
            $resultado->bindParam( ':tamanoGrupo', $correoUsuario, PDO::PARAM_INT );
            $resultado->execute();
            self::desconectar();
        } catch ( PDOException $Exception ) {
            self::desconectar();
            $error = 'Error '.$Exception->getCode().': '.$Exception->getMessage();
            ;
            return json_encode( $error );
        }
    }

}