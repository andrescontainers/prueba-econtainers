<?php
	include '../model/conexion.php';
	date_default_timezone_set('America/Bogota');

	if (isset($_POST['user_id']) && isset($_POST['type_id']) && isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['date_birth'])) {
		$query = $conexion->prepare("INSERT INTO usuarios (user_id, type_id, name, contact, date_birth, date_register) VALUES (:user_id, :type_id, :name, :contact, :date_birth, :date_register)");

		$query->bindParam(':user_id', $_POST['user_id'], PDO::PARAM_INT);
		$query->bindParam(':type_id', $_POST['type_id'], PDO::PARAM_STR);
		$query->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
		$query->bindParam(':contact', $_POST['contact'], PDO::PARAM_INT);
		$query->bindParam(':date_birth', $_POST['date_birth']);
		$query->bindParam(':date_register', date('Y-m-d H:i:s'));

		$query->execute();
	}
?>