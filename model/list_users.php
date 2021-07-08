<?php
	include 'conexion.php';

	$data = '<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Nombre</th>
						<th scope="col">Tipo de identificación</th>
						<th scope="col">Identificación</th>
						<th scope="col">Contacto</th>
						<th scope="col">Fecha de nacimiento</th>
						<th scope="col">Fecha de registro</th>
						<th scope="col" colspan="2">Opciones</th>
					</tr>
				</thead>
				<tbody>';

	if ($count_users = $conexion->query("SELECT COUNT(*) FROM usuarios;")) {
		if($count_users->fetchColumn() > 0) {
			$consulta = $conexion->query("SELECT * FROM usuarios;");
			$usuarios = $consulta->fetchAll(PDO::FETCH_OBJ);
			$id = 1;
			foreach ($usuarios as $usuario) {
				$data .= '<tr>
							<td class="d-none">'.$usuario->id.'</td>
							<td>'.$id.'</td>
							<td>'.$usuario->name.'</td>
							<td>'.$usuario->type_id.'</td>
							<td>'.$usuario->user_id.'</td>
							<td>'.$usuario->contact.'</td>
							<td>'.$usuario->date_birth.'</td>
							<td>'.$usuario->date_register.'</td>
							<td>
								<button onclick="list_data_user('.$usuario->id.')" class="btn btn-warning pl-2 pr-2 pt-1" title="Editar"><img src="dist/img/icon-edit.png" height="20px"></button>
							</td>
							<td>
								<button onclick="delete_user('.$usuario->id.')" class="btn btn-danger pl-2 pr-2 pt-1" title="Eliminar"><img src="dist/img/icon-delete.png" height="20px"></button>
							</td>
						</tr>';
				$id ++;
			}
		} else  {
			$data .= '<tr><td colspan="9">No hay registros!</td></tr>';
		}
	} else {
		$data .= '<tr><td colspan="9">No hay registros!</td></tr>';
	}

    $data .= '</tbody></table>';

    echo $data;
?>