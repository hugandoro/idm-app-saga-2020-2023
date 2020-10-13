<?php require_once('Connections/sle.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IDM | Radicar PQR Web</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <?php
      $mysqli = new mysqli($hostname_sle, $username_sle, $password_sle, $database_sle);

      if (mysqli_connect_errno()) {
          printf("Falló la conexión: %s\n", mysqli_connect_error());
          exit();
      }

      //$consulta = "SELECT * FROM validador_en_campo WHERE identificacion = $identificacion LIMIT 1";
      //$resultado = $mysqli->query($consulta);
      //$resultado->close();
      $mysqli->close();
    ?>

    <?php if (isset($fila)) ?>
      <div class="row">

        <div class="col-md-12 mb-12">
          <center>
                <form action="" method="POST">

                <div class="form-group">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 30%;"><label for="identificacion">N° de identificacion</label></td>
                            <td><input type="number" class="form-control" id="identificacion" name="identificacion" aria-describedby="emailHelp" placeholder=""></td>
                        </tr>

                        <tr>
                            <td><label for="nombre_apellido">Nombre y apellidos</label></td>
                            <td><input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido" aria-describedby="emailHelp" placeholder=""></td>
                        </tr>

                        <tr>
                            <td><label for="telefono">N° Celular</label></td>
                            <td><input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder=""></td>
                        </tr>

                        <tr>
                            <td><label for="email">Correo electronico</label></td>
                            <td><input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder=""></td>
                        </tr>

                        <tr>
                            <td><label for="tipo">Tipo de requerimiento (Peticion | Queja | Reclamo | Sugerencia)</label></td>
                            <td>
                                <select class="form-control" id="tipo" name="tipo" aria-describedby="emailHelp" placeholder="">
                                    <option value="1" selected>Peticion</option> 
                                    <option value="2">Queja</option>
                                    <option value="3">Reclamo</option>
                                    <option value="4">Sugerencia</option>
                                    <option value="5">Felicitacion</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="mensaje">Mensaje (Motivo)</label></td>
                            <td><textarea  class="form-control" id="mensaje" name="mensaje" rows="10" cols="50"></textarea></td>
                        </tr>
                    </table>
                </div>

                <button type="submit" class="btn btn-warning">Radicar PQR via Web...</button>
                </form>
            </center>
        </div>
    </div>


  </div>
  <!-- /.container -->



  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
