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

if (($_SESSION["caja"]==1) || ($_SESSION["caja"]==2) )
{
?>
  <BR><BR>
  
  <?php
  $fecha1 = $_POST['fecha1'];
  $fecha2 = $_POST['fecha2'];

mysqli_query($sle,"SET NAMES 'utf8'");
$sqlF="SELECT * FROM certificado WHERE (fecha_hora BETWEEN DATE('$fecha1') and DATE('$fecha2'))";
$resultF = mysqli_query($sle,$sqlF);

echo "<CENTER>";
echo "<TABLE border = '1'>";
echo "<TR>";
echo "<TD><span class='TitNormal'>N° Certificado</span></TD>";
echo "<TD><span class='TitNormal'>Tipo identificacion</span></TD>";
echo "<TD><span class='TitNormal'>Identificacion</span></TD>";
echo "<TD><span class='TitNormal'>Nombre 1</span></TD>";
echo "<TD><span class='TitNormal'>Nombre 2</span></TD>";
echo "<TD><span class='TitNormal'>Apellido 1</span></TD>";
echo "<TD><span class='TitNormal'>Apellido 2</span></TD>";
echo "<TD><span class='TitNormal'>N° de Ficha del Predio</span></TD>";
echo "<TD><span class='TitNormal'>Fecha de Expedicion</span></TD>";
echo "<TD><span class='TitNormal'>Estado</span></TD>";
echo "</TR>";

while ($rowF = mysqli_fetch_row($resultF))
{
		echo "<TR>";
        $sqlCIU="SELECT * FROM cliente WHERE identificacion = '$rowF[1]'";
        $resultCIU = mysqli_query($sle,$sqlCIU);
        $rowCIU = mysqli_fetch_row($resultCIU);	
	    echo "<TD><span class='Texto1'>$rowF[0]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowCIU[1]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowF[1]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowCIU[2]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowCIU[3]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowCIU[4]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowCIU[5]</span></TD>";
	    echo "<TD><span class='Texto1'>$rowF[6]</span></TD>";
		echo "<TD><span class='Texto1'>$rowF[8]</span></TD>";
		echo "<TD><span class='Texto1'>$rowF[9]</span></TD>";
		echo "</TR>";
}
echo "</TABLE>";  
echo "</CENTER>";  

?>

<BR><BR>
<?php 
} 
?>

<?php echo $Pie;?>
</body>
</html>

