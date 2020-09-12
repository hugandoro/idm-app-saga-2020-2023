<?php 
require_once('Connections/sle.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>
<?php require_once('parametros/variables.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">  
<head profile="http://gmpg.org/xfn/11"> 
	<title><?php echo "$nombre_corto $version";?></title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="STYLESHEET" type="text/css" href="estilos.css">
</head> 
<body>
<CENTER>
<TABLE>
<TR><TD align="center">
<?php echo "<img src=$banner_cabezera>"; ?> 
</TD></TR>
</TABLE>
</CENTER>
<?php
//VERIFICA SI EL USUARIO Y LA CONTRASEÑA SON VALIDOS
$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

mysqli_select_db($sle, $database_sle);
$sql="SELECT * FROM usuarios WHERE  (cedula like '$usuario') AND (password like '$contrasena')"; 
$resultado=mysqli_query($sle, $sql)or die (mysql_error()); 
if (mysqli_num_rows($resultado) == 0) {
    echo "<center><BR>USUARIO O CONTRASENA INCORRECTOS - Acceso Denegado</center>";
    exit;
}
$row = mysqli_fetch_row($resultado);
if ($row[6] == 0) { //USUARIO EXISTE PERO ESTA INACTIVO EN EL SISTEMA
    echo "<center><BR>USUARIO INACTIVO EN EL SISTEMA - Acceso Denegado</center>";
    exit;
}

$_SESSION["estado"] = $row[6];
$_SESSION["cedula"] = $row[0]; 
$_SESSION["usuario"] = $row[1]." ".$row[2]." ".$row[3]." ".$row[4];
$_SESSION["radicador"] = $row[7]; // 1 - Consulta // 2 - Administrador
$_SESSION["caja"] = $row[8]; // 1 - Consulta // 2 - Administrador

//****************************************************
?>

<CENTER>
<TABLE>
<TR><TD align="center">
  <?php
    echo "Bienvenido ".$_SESSION["usuario"];
  ?>
  
  <p><a href="menu.php">
    <input class="Boton1" type="submit" value="Cargar Modulos" />
  </a></p>
</TD></TR>
</TABLE>
</CENTER>


<?php echo $Pie;?>
</body>
</html>

