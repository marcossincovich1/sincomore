<?php
include ("conexion.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

	$id_Persona=$_POST['id'];
	$email=$_POST['email'];
	$passw=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$direccion=$_POST['ciudad'];
	$sexo=$_POST['sexo'];
	$pais=$_POST['pais'];
	$codigo_postal=$_POST['codigo_postal']
	
	if (!$conn) {
	    die("Conexión fallida: " . mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM persona WHERE nombre = '$username' AND contrasenia = '$password'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	mysqli_close($conn);
	if($count == 1) {
		$_SESSION['username'] = $username;
		header("Location:http://localhost/sincomore/html/home.html");
		exit();
	} else {
		echo "Nombre de usuario o contraseña incorrectos";
		sleep(3);
		echo "<script>alert('Datos incorrectos'); window.location.assign('http://localhost/proyecto_1/login.php')</script>";
	}

	
}
?>
