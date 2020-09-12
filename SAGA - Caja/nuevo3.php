<?php require_once('Connections/bd_caja.php'); 
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>

<?php require_once('../parametros/variables.php'); ?>
<?php require_once('../parametros/procesos.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head profile="http://gmpg.org/xfn/11"> 
	<title><?php echo "$nombre_corto $version";?></title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="STYLESHEET" type="text/css" href="../estilos.css"> 
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
$respuesta = Seguridad();
if ($respuesta==0) exit;

Menu();

if ($_SESSION["caja"]==2)
{
?>
  <BR><BR>
  <table width="600" border="0" align="center">
    <tr>
      <td width="161">&nbsp;</td>
      <td width="423" class="Subtitulo"><span class="TITULO">NUEVO CERTIFICADO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
      <?php
		$tipo = $_POST['tipo'];
		$identificacion = $_POST['identificacion'];
		$nombre1 = $_POST['nombre1'];
		$nombre2 = $_POST['nombre2'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$direccion = $_POST['direccion'];
		$barrio = $_POST['barrio'];
		$fijo = $_POST['fijo'];
		$celular = $_POST['celular'];
		$ficha = $_POST['ficha'];
		$motivo = $_POST['motivo'];
		
		$expidio = $_SESSION["cedula"];

		
		$sql="INSERT INTO certificado (identificacion, direccion, barrio, tel_fijo, tel_celular, catastral, motivo, expidio) VALUES ('$identificacion', '$direccion', '$barrio', '$fijo', '$celular', '$ficha', '$motivo', $expidio)";
		mysqli_query($sle,$sql)or die (mysql_error());	
		echo "<BR>Certificacion generada exitosamente<BR>";
		
		$sql="INSERT INTO cliente (identificacion, tipo_identificacion, nombre1, nombre2, apellido1, apellido2) VALUES ('$identificacion', '$tipo', '$nombre1', '$nombre2', '$apellido1', '$apellido2')";
		mysqli_query($sle,$sql);
		
		$sql="UPDATE cliente SET nombre1='$nombre1', nombre2='$nombre2', apellido1='$apellido1', apellido2='$apellido2' WHERE identificacion = '$identificacion'";
		mysqli_query($sle,$sql)or die (mysql_error());
		
		$sql = "SELECT * FROM certificado ORDER BY codigo DESC LIMIT 1";
		$result = mysqli_query($sle,$sql)or die (mysql_error());
		$p = mysqli_fetch_row($result);
		echo "<HR><span class='TITULO'>CERTIFICADO N° <B>".$p[0]."</B></span><BR>";
		
        echo "<form 
        name='contacto' 
        method='post' 
        action='buscar2.php' 
        target='confirma' 
        onSubmit='confirma = window.open('','confirma', 'width=1000 height=500, status=no scrollbars=no, location=no, resizable=no, manu=no');'>";

		echo "<input type='hidden' name='numero' id='numero' value='$p[0]' />";
		echo "<input name='button' type='submit' class='Boton1' id='button' value='Generar Recibo' />"; 
		echo "</form>";		

		mysqli_close($sle);  
	  ?> 
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
  </table>
  <BR><BR>
<?php 
} 
?>

<?php echo $Pie;?>
</body>
</html>

