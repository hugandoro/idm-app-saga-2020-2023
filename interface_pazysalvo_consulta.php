<?php require_once('SAGA - Caja/Connections/bd_caja.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IDM | Consulta paz y salvo</title>

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
        ?>

        <div class="row">

            <?php
            if (isset($_POST["codigo"])) {
            ?>


                <?php
                $codigo = $_POST["codigo"];
                $sql = "SELECT * FROM certificado WHERE ( codigo ='$codigo')";
                $resultado = mysqli_query($sle, $sql);
                while ($row = mysqli_fetch_row($resultado)) {
                ?>

                    <div class="col-md-12 mb-12">
                        <hr>
                        <center>
                            Certificado de paz y salvo<br>
                            <h3>N° <?php echo $codigo; ?></h3>

                            <div class="alert alert-success">
                                <strong>Oficialmente expedido por el IDM</strong>
                            </div>

                            <table class="table">
                                <tr>
                                    <th style="width: 40%;">N° de ficha catastral</th>
                                    <td>
                                        <h4><?php echo $row[6] ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Concepto</th>
                                    <td>Contribucion por valorizacion al Instituto de Desarrollo Municipal de Dosquebradas</td>
                                </tr>
                                <tr>
                                    <th>Motivo de expedicion</th>
                                    <td><?php echo $row[7] ?></td>
                                </tr>
                                <tr>
                                    <th>Fecha de expedicion</th>
                                    <td><?php echo $row[8] ?></td>
                                </tr>
                            </table>

                        </center>
                        <hr>
                    </div>

                <?php } ?>

                <div class="col-md-12 mb-12">
                    <center>
                        <a href="interface_pazysalvo_consulta.php"><button type="submit" class="btn btn-warning">Regresar</button></a>
                    </center>
                </div>

            <?php
            } else {
            ?>

                <!-- En caso de no existir un codigo de consulta - Carga el formulario -->
                <div class="col-md-12 mb-12">
                    <center>
                        <form action="interface_pazysalvo_consulta.php" method="POST">

                            <div class="form-group">
                                <table class="table table-striped">
                                    <tr>
                                        <td style="width: 30%;"><label for="codigo">N° de paz y salvo</label></td>
                                        <td><input required type="number" class="form-control" id="codigo" name="codigo" aria-describedby="emailHelp" placeholder="Digite el N° de paz y salvo valorizacion a consultar..."></td>
                                    </tr>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-warning">Validar paz y salvo...</button>
                        </form>

                        <div>
                            <hr>
                            (*) Los datos facilitados en este formulario, pasarán a formar parte de los archivos automatizados propiedad de la
                            Entidad y podrán ser utilizados por el titular del archivo para el ejercicio de las funciones propias en el ámbito
                            de sus competencias. De conformidad con la Ley 1581 del 17 de octubre de 2012, de Protección de Datos de Carácter
                            Personal, Ud. podrá ejercitar los derechos de acceso, rectificación, cancelación y oposición mediante instancia presentada.
                        </div>
                    </center>
                </div>
                <!-- FIN - En caso de no existir un codigo de consulta - Carga el formulario -->

            <?php
            }
            ?>


        </div>


    </div>
    <!-- /.container -->



    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>