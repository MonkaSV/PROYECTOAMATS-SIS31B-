<?php
include 'Credenciales.php';
class Conexion{
	protected $conn;
	public function Conexion(){
		$this->conn=new mysqli(SERVIDOR, USUARIO, CONTRA, BASEDATOS);
	}
	public function desconectar(){
		$this->conn->close();
	}
	public function consultar($sql){
		$this->Conexion();
		$res = $this->conn->query($sql);
		$this->desconectar();
		return $res;
	}
	public function ejecutar($sql){
		$this->Conexion();
		$this->conn->query($sql);
		$this->desconectar();
		return true;
	}

}

	class Db{
		private static $conexion=null;
		private function __construct(){}

		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion=new PDO('mysql:host=localhost;dbname=encuestasmaker','root','',$pdo_options);
			return self::$conexion;
		}
	}
$Usuario='root';
$Contraseña='';
$Servidor='localhost';
$Basededatos='encuestasmaker';
	$conexion= new mysqli($Servidor,$Usuario,$Contraseña,$Basededatos);
	if ($conexion->connect_error) {
	die("Conexion fallida:".$conexion->connect_error);
	}
?>