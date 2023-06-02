<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexion.php");

	$id_Persona=$_POST['id'];
	$email=$_POST['email'];
	$passw=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$direccion=$_POST['ciudad'];
	$sexo=$_POST['sexo'];
	$pais=$_POST['pais'];
	$codigo_postal=$_POST['codigo_postal']
	
	// Verificar si el usuario ya existe en la base de datos
	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$resultado = mysqli_query($conn, $sql);
	if (mysqli_num_rows($resultado) > 0) {
		echo "Este email ya está registrado";
		exit();
	}
	
	// Insertar el nuevo usuario en la base de datos
	$sql = "INSERT ecommerce (nombre, email, contrasenia) VALUES ('$username', '$email', '$password')";
	if (mysqli_query($conn, $sql)) {
		echo "Registro exitoso";
		$_SESSION['username'] = $username;
		header("Location: home.php");
		exit();
	} else {
		echo "Error al registrar el usuario: " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
?>


