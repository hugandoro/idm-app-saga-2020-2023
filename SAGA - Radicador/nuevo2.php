<?php require_once('Connections/bd_radicador.php'); 
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

if ($_SESSION["radicador"]==2)
{
?>
  <BR><BR>
  <table width="600" border="0" align="center">
    <tr>
      <td width="161">&nbsp;</td>
      <td width="423" class="Subtitulo"><span class="TITULO">NUEVO RADICADO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
      <?php
	    $fecha = $_POST['fecha'];
		$medio = $_POST['medio'];
		$remitente = $_POST['remitente'];
		$identificacion = $_POST['identificacion'];
		$telefono = $_POST['telefono'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion'];
		$ciudad = $_POST['ciudad'];
		$motivo = $_POST['motivo'];
		$tipo = $_POST['tipo'];
		$diasvencimiento = $_POST['diasvencimiento'];
		$area = $_POST['area'];
		$funcionario = $_POST['funcionario'];   
		$sn = $_POST['sn'];  
		
		$sql="INSERT INTO radicador (radicadorfecharadicado, radicadormedioradicado, radicadorpeticionario, radicadoridentificacion, radicadortelefono, radicadorcelular, radicadoremail, radicadordireccion, radicadorciudad, radicadorobjeto, documentacion_documentacioncodigo, area_areacodigo, funcionarios_funcionarioscodigo, radicadorsn, radicadordiasvencimiento) VALUES ('$fecha', '$medio', '$remitente', '$identificacion', '$telefono', '$celular', '$email', '$direccion', '$ciudad', '$motivo', '$tipo', '$area', '$funcionario', '$sn', '$diasvencimiento')";
		mysqli_query($sle, $sql)or die (mysql_error());	
		echo "Documento Radicado Exitosamente<BR>";
		
		$sql = "SELECT * FROM radicador ORDER BY radicadorcodigo DESC LIMIT 1";
		$result = mysqli_query($sle, $sql)or die (mysql_error());
		$p = mysqli_fetch_row($result);
		echo "<span class='TITULO'>Codigo unico de registro N° <B>".$p[0]."</B></span><BR>";
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

