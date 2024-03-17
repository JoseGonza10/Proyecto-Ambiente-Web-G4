<?phpdescripcionDia
require_once '../config/Conexion.php';

class Dias extends conexion
{
    /*=================================Atributos de clase=================================*/
    protected static $conn;
    private $idDia=null;
    private $descripcionDia=null;

    /*=================================Constructor=================================*/

    public function __construct(){}

    /*=================================Encapsuladores=================================*/

    

    //idDia
    public function getIdDia()
    {
        return $this->idDia;
    }

    public function setIdDia($idDia)
    {
        $this->idDia=$idDia;
    }

    //descripcionDia
    public function getDescripcionDia()
    {
        return $this->descripcionDia;
    }

    public function setDescripcionDia($descripcionDia)
    {
        $this->descripcionDia=$descripcionDia;
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