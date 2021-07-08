<?php
    include '../model/conexion.php';

    if(isset($_POST['id']) && isset($_POST['id']) != "") {
        $query = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
        $query->bindParam(':id', $_POST['id']);
        $query->execute();
        
        $response = array();
        $count = $conexion->query("SELECT COUNT(*) FROM usuarios WHERE id = ".$_POST['id']);
        if ($count) {
            if ($count->fetchColumn() > 0) {
                while ($res = $query->fetch(PDO::FETCH_ASSOC)){
                    $response = $res;
                }
            } else {
                $response['status'] = 200;
                $response['message'] = "Data not found1!";
            }
        } else {
            $response['status'] = 200;
            $response['message'] = "Data not found2!";
        }

        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = "Invalid Request!";
    }
?>