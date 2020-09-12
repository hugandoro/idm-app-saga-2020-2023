<?php
    header("Content-type: application/vnd.ms-excel; name='excel'");
    header("Content-Disposition: filename=ListaExcel.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
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
</head> 
<body>

<?php
$respuesta = Seguridad();
if ($respuesta==0) exit;

if ($_SESSION["radicador"]==2)
{
?>
  <BR><BR>
  
  <?php
  $fecha1 = $_GET['fecha1'];
  $fecha2 = $_GET['fecha2'];
  
echo "<CENTER>";  
//echo "<TABLE border='0'>";
//echo "<TR>";
//echo "<TD colspan='2' align='left'><img src='http://192.168.2.136".$ruta_principal."/imagenes/Logo3.png' height='110'></TD>";
//echo "<TD colspan='4' align='center'><img src='http://192.168.2.136".$ruta_principal."/imagenes/Logo2.png' height='110'></TD>";
//echo "<TD colspan='2' align='right'><img src='http://192.168.2.136".$ruta_principal."/imagenes/Logo1.png' height='110'></TD>";
//echo "</TR>";
//echo "<TR><TD colspan='8'></TD></TR>";
//echo "<TR><TD colspan='8'></TD></TR>";
//echo "<TR><TD colspan='8'></TD></TR>";
//echo "<TR><TD colspan='8'></TD></TR>";
//echo "<TR><TD colspan='8'></TD></TR>";
//echo "</TABLE>";

echo "<TABLE border='1'>";
echo "<TR><TD colspan='5'><B>RADICADOR DE CORRESPONDENCIA DIRECCION 2014</B></TD><TD colspan='4'>ENERO 2014</TD></TR>";
echo "<TR><TD colspan='5'><B>COMUNICACIONES OFICIALES - RADICADOR DE VENTANILLA UNICA</B></TD><TD colspan='1'>COD DG-100.05</TD><TD colspan='3'>VERSION 2 - FECHA 11/10/12</TD></TR>";

echo "<TR><TD colspan='2'><B>Informe</B></TD><TD colspan='7'>Peticiones - Quejas - Reclamos - Tutelas</TD></TR>";
echo "<TR><TD colspan='2'><B>Rango del Informe</B></TD><TD colspan='7'>".$fecha1." al ".$fecha2."</TD></TR>";

echo "<TR>";
echo "<TD width='50'><B>N°</B></TD>";
echo "<TD width='90'><B>Fecha</B></TD>";
echo "<TD width='150'><B>Peticionario</B></TD>";
echo "<TD width='150'><B>Objeto</B></TD>";
echo "<TD width='150'><B>Tipo</B></TD>";
echo "<TD width='150'><B>Vencimiento</B></TD>";
echo "<TD width='100'><B>Responsable</B></TD>";
echo "<TD width='100'><B>Respuesta</B></TD>";
echo "<TD width='100'><B>Fecha Respuesta</B></TD>";
echo "</TR>";	

mysqli_query($sle, "SET NAMES 'utf8'");

$sqlF="SELECT * FROM radicador WHERE (radicadorfecharadicado BETWEEN DATE('$fecha1') and DATE('$fecha2')) AND ((documentacion_documentacioncodigo = '2') OR (documentacion_documentacioncodigo = '3') OR  (documentacion_documentacioncodigo = '4') OR (documentacion_documentacioncodigo = '6'))";
$resultF = mysqli_query($sle,$sqlF);
while ($rowF = mysqli_fetch_row($resultF))
{
		echo "<TR>";
	    echo "<TD align='left'><span class='Texto1'>$rowF[0]</span></TD>";
	    echo "<TD align='left'><span class='Texto1'>$rowF[1]</span></TD>";
	    echo "<TD align='left'><span class='Texto1'>$rowF[4]</span></TD>";
		echo "<TD align='left'><span class='Texto1'>$rowF[11]</span></TD>";
		
		$sqlD="SELECT * FROM documentacion";
		$resultadoD=mysqli_query($sle,$sqlD)or die (mysql_error());	
		while ($rowD = mysqli_fetch_row($resultadoD)) {
		  if ($rowF[15] == $rowD[0])
		    echo "<TD  align='left'><span class='Texto1'>$rowD[1]</span></TD>";
		}		
		
	    echo "<TD  align='left'><span class='Texto1'>$rowF[18]</span></TD>";		
		
		$sqlFU="SELECT * FROM funcionarios WHERE funcionarioscodigo = '$rowF[17]'";
		$resultadoFU = mysqli_query($sle,$sqlFU)or die (mysql_error());	
		$rowFU = mysqli_fetch_row($resultadoFU);
		echo "<TD><span class='Texto1'>$rowFU[1]</span></TD>";
		
		echo "<TD><span class='Texto1'>$rowF[14] // Oficio N° $rowF[19]</span></TD>";
		echo "<TD><span class='Texto1'>$rowF[12]</span></TD>";
		echo "</TR>";
}
echo "</TABLE>";  
echo "<CENTER>";  

?>

<BR><BR>
<?php 
} 
?>

</body>
</html>