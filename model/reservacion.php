<?php
    require_once '../config/Conexion.php';

    class Reservaciones extends Conexion{
        protected static $conn;
        private $usuario;
        private $cancha;
        private $diaReservacion;
        private $codigoQR;
        private $fechaReservacion;
        private $horaReservacion;
        private $tamanoGrupo;
        private $estado;
        private $monto;
        private $paquete;
        private $personas;
        private $empresa;
    
        public function __construct() {}
    
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
    
        public function setCancha($cancha) {
            $this->cancha = $cancha;
        }
    
        public function setDiaReservacion($diaReservacion) {
            $this->diaReservacion = $diaReservacion;
        }
    
        public function setCodigoQR($codigoQR) {
            $this->codigoQR = $codigoQR;
        }
    
        public function setFechaReservacion($fechaReservacion) {
            $this->fechaReservacion = $fechaReservacion;
        }
    
        public function setHoraReservacion($horaReservacion) {
            $this->horaReservacion = $horaReservacion;
        }
    
        public function setTamanoGrupo($tamanoGrupo) {
            $this->tamanoGrupo = $tamanoGrupo;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function setMonto($monto){
            $this->monto = $monto;
        }

        public function setPaquete($paquete){
            $this->paquete = $paquete;
        }

        public function setpersonas($personas){
            $this->personas = $personas;
        }

        public function setEmpresa($empresa){
            $this->empresa = $empresa;
        }    

        public function getUsuario() {
            return $this->usuario;
        }
    
        public function getCancha() {
            return $this->cancha;
        }
    
        public function getDiaReservacion() {
            return $this->diaReservacion;
        }
    
        public function getCodigoQR() {
            return $this->codigoQR;
        }
    
        public function getFechaReservacion() {
            return $this->fechaReservacion;
        }
    
        public function getHoraReservacion() {
            return $this->horaReservacion;
        }
    
        public function getTamanoGrupo() {
            return $this->tamanoGrupo;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function getMonto() {
            return $this->monto;
        }

        public function getPaquete() {
            return $this->paquete;
        }

        public function getPersonas() {
            return $this->personas;
        }

        public function getEmpresa() {
            return $this->empresa;
        }

        public static function getConexion()
        {
            self::$conn=conexion::conectar();
        }
    
        public static function desconectar(){
            self::$conn = null;
        }
    

        public function crearReservacion($usuario, $cancha, $diaReservacion, $codigoQR, $fechaReservacion, $horaReservacion, $tamanoGrupo, $estado, $monto, $paquete, $personas, $empresa){
            $sql = "INSERT INTO paintballDB.RESERVACIONES (Usuario, Cancha, DiaReservacion, CodigoQR, FechaReservacion, HoraReservacion, TamanoGrupo, Estado, Monto, Paquete, Personas, Empresa) VALUES (:Usuario, :Cancha, :DiaReservacion, :CodigoQR, :FechaReservacion, :HoraReservacion, :TamanoGrupo, :Estado, :Monto, :Paquete, :Personas, :Empresa)";
            
            try {
                self::getConexion();
                $rs = self::$conn->prepare($sql);
        
                $rs->bindParam(":Usuario", $usuario, PDO::PARAM_INT);
                $rs->bindParam(":Cancha", $cancha, PDO::PARAM_INT);
                $rs->bindParam(":DiaReservacion", $diaReservacion, PDO::PARAM_INT);
                $rs->bindParam(":CodigoQR", $codigoQR, PDO::PARAM_STR);
                $rs->bindParam(":FechaReservacion", $fechaReservacion);
                $rs->bindParam(":HoraReservacion", $horaReservacion);
                $rs->bindParam(":TamanoGrupo", $tamanoGrupo, PDO::PARAM_INT);
                $rs->bindParam(":Estado", $estado, PDO::PARAM_BOOL);
        
                $rs->execute();
                
                // Opcional
                $ultimoId = self::$conn->lastInsertId();
                self::desconectar();
                return $ultimoId;

            } catch(PDOException $e) {
                self::desconectar();
                $error = "Error ".$e->getCode().": ".$e->getMessage();
                return json_encode($error);
            } finally {
                self::desconectar();
            }
        }
    }

    function actualizarReservacion(){

    }

    function visualizarReservaciones(){

    }

    function visualizarReservacion(){

    }


?>