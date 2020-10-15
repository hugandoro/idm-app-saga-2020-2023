<?php require_once('SAGA - Radicador/Connections/bd_radicador.php'); ?>
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

        $fecha = date("Y") . "-" . date("m") . "-" . date("d");
        $medio = "PORTAL WEB";
        $remitente = $_POST['remitente'];
        $identificacion = $_POST['identificacion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $motivo = $_POST['motivo'];
        $tipo = $_POST['tipo'];

        $area = "2";
        $funcionario = "2";

        $sql = "INSERT INTO radicador (
                    radicadorfecharadicado,
                    radicadormedioradicado,
                    radicadorpeticionario,
                    radicadoridentificacion,
                    radicadortelefono,
                    radicadoremail, 
                    radicadordireccion,
                    radicadorciudad,
                    radicadorobjeto,
                    documentacion_documentacioncodigo,
                    area_areacodigo,
                    funcionarios_funcionarioscodigo,
                    radicadorsn,
                    radicadordiasvencimiento,
                    radicadorfecharespuesta)
                VALUES (
                    '$fecha',
                    '$medio',
                    '$remitente',
                    '$identificacion',
                    '$telefono',
                    '$email',
                    '$direccion',
                    '$ciudad',
                    '$motivo',
                    '$tipo',
                    '$area',
                    '$funcionario',
                    '',                         /* N° Serie radicador por defecto lo deja vacio por llegar via Web */ 
                    '0001-01-01',               /* Fecha de vencimiento pone fecha comodin 0001-01-01 no se usa 0 por version de MySQL - El radicador debe editar posteriormente */
                    '0001-01-01')";             /* Fecha de respuesta pone fecha comodin 0001-01-01 no se usa 0 por version de MySQL - El radicador debe editar posteriormente */

        if (!$resultado = $mysqli->query($sql)) {
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }


        $sql = "SELECT * FROM radicador ORDER BY radicadorcodigo DESC LIMIT 1";
        $resultado = $mysqli->query($sql);

        $p = mysqli_fetch_row($resultado);
        echo "<span class='TITULO'>Codigo unico de registro N° <B>" . $p[0] . "</B></span><BR>";

        $mysqli->close();
        ?>

        <div class="row">
            <div class="col-md-12 mb-12">
                <center>

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