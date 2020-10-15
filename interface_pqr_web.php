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

        <div class="row">

            <div class="col-md-12 mb-12">
                <center>
                    <form action="interface_pqr_web_store.php" method="POST">

                        <div class="form-group">
                            <table class="table table-striped">
                                <tr>
                                    <td style="width: 30%;"><label for="identificacion">N° de identificacion</label></td>
                                    <td><input required type="number" class="form-control" id="identificacion" name="identificacion" aria-describedby="emailHelp" placeholder=""></td>
                                </tr>

                                <tr>
                                    <td><label for="remitente">Nombre y apellidos</label></td>
                                    <td><input required type="text" class="form-control" id="remitente" name="remitente" aria-describedby="emailHelp" placeholder="" onkeyup="this.value=this.value.toUpperCase()"></td>
                                </tr>

                                <tr>
                                    <td><label for="direccion">Direccion fisica</label></td>
                                    <td><input required type="text" class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp" placeholder="" onkeyup="this.value=this.value.toUpperCase()"></td>
                                </tr>

                                <tr>
                                    <td><label for="ciudad">Ciudad</label></td>
                                    <td><input required type="text" class="form-control" id="ciudad" name="ciudad" aria-describedby="emailHelp" placeholder="" onkeyup="this.value=this.value.toUpperCase()"></td>
                                </tr>

                                <tr>
                                    <td><label for="telefono">N° Telefonico o Celular</label></td>
                                    <td><input required type="number" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" placeholder=""></td>
                                </tr>

                                <tr>
                                    <td><label for="email">Correo electronico</label></td>
                                    <td><input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="" onkeyup="this.value=this.value.toUpperCase()"></td>
                                </tr>

                                <tr>
                                    <td><label for="tipo">Tipo de requerimiento (Peticion | Queja | Reclamo | Sugerencia)</label></td>
                                    <td>
                                        <select class="form-control" id="tipo" name="tipo" aria-describedby="emailHelp" placeholder="">
                                            <option selected value="2">PETICION</option>
                                            <option value="3">QUEJA</option>
                                            <option value="4">RECLAMO</option>
                                            <option value="5">SUGERENCIA</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="motivo">Mensaje (Motivo)</label></td>
                                    <td><textarea required class="form-control" id="motivo" name="motivo" rows="10" cols="50" onkeyup="this.value=this.value.toUpperCase()"></textarea></td>
                                </tr>

                            </table>
                        </div>

                        <button type="submit" class="btn btn-warning">Radicar PQR via Web...</button>
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
        </div>


    </div>
    <!-- /.container -->



    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>