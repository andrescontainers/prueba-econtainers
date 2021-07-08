<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="dist/css/style.css" rel="stylesheet">
  <title>Usuarios</title>
</head>

<body>
  <!-- Header -->
  <?php include 'view/header.html'; ?>
  <!-- -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-6">
        <h3>Usuarios</h3>
      </div>
      <!-- Botón agregar usuario -->
      <div class="col-6 text-right">
        <div class="pull-right mb-4">
          <button class="btn btn-success" data-toggle="modal" data-target="#add_user_modal" title="Agregar">
            <img src="dist/img/icon-add-user.png" height="25px">
          </button>
        </div>
      </div>
      <!-- Tabla de usuarios -->
      <div class="col-md-12">
        <div class="table-responsive" id="list_users"></div>
      </div>
    </div>
  </div>
  <!-- Formulario de registro -->
  <?php include 'view/modal-add.html'; ?>
  <!-- Formulario para actualizar -->
  <?php include 'view/modal-update.html'; ?>
  <!-- Footer -->
  <?php include 'view/footer.html'; ?>
  <!-- Jquery -->
  <script type="text/javascript" src="dist/jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="dist/js/script.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="dist/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>