<?php
    include '../model/conexion.php';

    if(isset($_POST['id']) && isset($_POST['id']) != "") {
        $query = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");

        $query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $query->execute();
    }
?>