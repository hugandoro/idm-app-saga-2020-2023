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
  
  <?php
  $fecha1 = $_POST['fecha1'];
  $fecha2 = $_POST['fecha2'];
  
echo "<CENTER>";  
echo "<TABLE border='0'>";

//echo "<TR>";
//echo "<TD colspan='2' align='left'><img src='http://192.168.2.136".$ruta_principal."/imagenes/Logo3.png' height='110'></TD>";
//echo "<TD colspan='4' align='center' height='130'><img src='http://192.168.2.136".$ruta_principal."/imagenes/Logo2.png' height='110'></TD>";
//echo "<TD colspan='2' align='right' height='130'><img src='http://192.168.2.136".$ruta_principal."/imagenes/Logo1.png' height='110'></TD>";
//echo "</TR>";

echo "<TR><TD colspan='5'><B>RADICADOR DE CORRESPONDENCIA DIRECCION 2014</B></TD><TD colspan='3'>ENERO 2014</TD></TR>";
echo "<TR><TD colspan='5'><B>COMUNICACIONES OFICIALES - RADICADOR DE VENTANILLA UNICA</B></TD><TD colspan='1'>COD DG-100.05</TD><TD colspan='2'>VERSION 2 - FECHA 11/10/12</TD></TR>";

echo "<TR><TD bgcolor='#CCCCCC' colspan='2'>Informe</TD><TD colspan='7'>Radicador de Correspondencia Entrante</TD></TR>";
echo "<TR><TD bgcolor='#CCCCCC' colspan='2'>Rango del Informe</TD><TD colspan='7'>".$fecha1." al ".$fecha2."</TD></TR>";

echo "<TR bgcolor='#CCCCCC'>";
echo "<TD width='50'>N°</TD>";
echo "<TD width='90'>Fecha</TD>";
echo "<TD width='150'>Peticionario</TD>";
echo "<TD width='150'>Objeto</TD>";
echo "<TD width='150'>Tipo</TD>";
echo "<TD width='150'>Vencimiento</TD>";
echo "<TD width='100'>Responsable</TD>";
echo "<TD width='100'>Respuesta</TD>";
echo "<TD width='50'></TD>";
echo "<TR>";

echo "<TR><TD colspan='9'><HR></TD></TR>";		
		
$sqlF="SELECT * FROM radicador WHERE (radicadorfecharadicado BETWEEN DATE('$fecha1') and DATE('$fecha2'))";

mysqli_query($sle, "SET NAMES 'utf8'");
$resultF = mysqli_query($sle, $sqlF);
while ($rowF = mysqli_fetch_row($resultF))
{
		echo "<TR>";
	    echo "<TD><span class='Texto1'>$rowF[0]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowF[1]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowF[4]</span></TD>";
		echo "<TD><span class='Texto1'>$rowF[11]</span></TD>";
		
		$sqlD="SELECT * FROM documentacion";
		$resultadoD=mysqli_query($sle, $sqlD)or die (mysql_error());	
		while ($rowD = mysqli_fetch_row($resultadoD)) {
		  if ($rowF[15] == $rowD[0])
		    echo "<TD><span class='Texto1'>$rowD[1]</span></TD>";
		}		
		
	    echo "<TD><span class='Texto1'>$rowF[18]</span></TD>";		
		
		echo "<TD><span class='Texto1'></span></TD>";
		echo "<TD><span class='Texto1'></span></TD>";
		echo "<TD><a href='fichacompleta.php?codigo=$rowF[0]'><input type='button' name='Continuar4' id='Continuar4' value='Ficha' /></a></TD>";
		echo "<TR>";
		echo "<TR><TD colspan='9'><HR></TD></TR>";
}
echo "</TABLE>";  
echo "<a href='listarrangofechasexcel.php?fecha1=$fecha1&fecha2=$fecha2'><input type='button' name='Continuar4' id='Continuar4' class='Boton1' value='EXPORTAR A EXCEL' /></a></TD>";
echo "<CENTER>";  

?>

<BR><BR>
<?php 
} 
?>

<?php echo $Pie;?>
</body>
</html>

