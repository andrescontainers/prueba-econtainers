<?php
    include '../model/conexion.php';

    if(isset($_POST)) {
        $query = $conexion->prepare("UPDATE usuarios SET user_id = :user_id, type_id = :type_id, name = :name, contact = :contact, date_birth = :date_birth WHERE id = :id");

        $query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
		$query->bindParam(':user_id', $_POST['user_id'], PDO::PARAM_INT);
		$query->bindParam(':type_id', $_POST['type_id'], PDO::PARAM_STR);
		$query->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
		$query->bindParam(':contact', $_POST['contact'], PDO::PARAM_INT);
		$query->bindParam(':date_birth', $_POST['date_birth']);

		$query->execute();
    }
?>