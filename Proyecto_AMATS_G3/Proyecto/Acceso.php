<?php
session_start();
include 'Credenciales.php';
//require_once('usuario.php');
//require_once('crud_usuario.php');

//	$usuario=new Usuario();
//	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definicda cuando el usuario se loguea, ya que la envía en la petición
	if (isset($_POST['registrarse'])) {
		$usuario->setNombre($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		if ($crud->buscarUsuario($_POST['usuario'])) {
			$crud->insertar($usuario);
			header('Location: loguinadmin.php');
		}else{
			header('Location: error.php?mensaje=El nombre de usuario ya existe');
		}		
		
	}elseif (isset($_POST['entrar'])) { //verifica si la variable entrar está definida
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['pas']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId()!=NULL) {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario
			header('Location: principal.php'); //envia a la página que simula la cuenta
		}else{
			header('Location: error.php?mensaje=Tus nombre de usuario o clave son incorrectos'); // cuando los datos son incorrectos envia a la página de error
		}

	/* if (isset($_REQUEST["btnIngresar"])) {
		$usuario=$_REQUEST["txtUsuario"];
		$contra=$_REQUEST["txtContra"];
		$conexion = new mysqli(SERVIDOR, USUARIO, CONTRA, BASEDATOS);
		$sql="select Clave from usuario where Nombre='$usuario' and Clave='$contra' ";
		$resultado= $conexion->query($sql);
		$cuantos = mysqli_num_rows ($resultado);

			if ($cuantos==0) {
				header("Location:Inicio.php");
			}
			$fila = $resultado->fetch_array(MYSQLI_NUM);
			    $nivel = $fila["0"];
				if ($nivel=="admin") {
					$_SESSION["Apellido"]["Nombre"]=$usuario;
					$_SESSION["Nombre"]["Clave"]=$nivel;
					header("Location:Principal.php");

				}else{

					header("Location:loguinadmin.php");
					echo "<script  language='javascript'>alert('Usuario Y Contraseña no Coinciden !');</script>";
				}*/
	}
if (isset($_REQUEST["cerrar"])) {
	session_destroy();
	header("Location:Inicio.php");
}
?>


<?php 
	//require_once('usuario.php');
	//require_once('crud_usuario.php');
	require_once('conexion.php');

	//inicio de sesion
	session_start();

	$usuario=new Usuario();
	$crud=new CrudUsuario();
	//verifica si la variable registrarse está definida
	//se da que está definicda cuando el usuario se loguea, ya que la envía en la petición
	if (isset($_POST['registrarse'])) {
		$usuario->setNombre($_POST['usuario']);
		$usuario->setClave($_POST['pas']);
		if ($crud->buscarUsuario($_POST['usuario'])) {
			$crud->insertar($usuario);
			header('Location: index.php');
		}else{
			header('Location: error.php?mensaje=El nombre de usuario ya existe');
		}		
		
	}elseif (isset($_POST['entrar'])) { //verifica si la variable entrar está definida
		$usuario=$crud->obtenerUsuario($_POST['usuario'],$_POST['pas']);
		// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
		if ($usuario->getId()!=NULL) {
			$_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario
			header('Location: cuenta.php'); //envia a la página que simula la cuenta
		}else{
			header('Location: error.php?mensaje=Tus nombre de usuario o clave son incorrectos'); // cuando los datos son incorrectos envia a la página de error
		}
	}elseif(isset($_POST['salir'])){ // cuando presiona el botòn salir
		header('Location: index.php');
		unset($_SESSION['usuario']); //destruye la sesión
	}
?>