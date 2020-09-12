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

if (($_SESSION["radicador"]==1) || ($_SESSION["radicador"]==2) )
{
?>
  <BR><BR>
  <form id="form1" name="form1" method="post" action="semaforoareas2.php">
  <table width="600" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td class="Subtitulo"><span class="TITULO">SELECCIONE EL AREA A MOSTRAR</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="161">Area</td>
      <td width="423">
<span class="TextField1">
        <select name="area" id="area">
          <?php			  	
		    mysqli_select_db($sle,$database_sle);
			$sql="SELECT * FROM area";
		    $resultado=mysqli_query($sle,$sql)or die (mysql_error());	
			while ($row = mysqli_fetch_row($resultado)) 
			  echo "<option value=$row[0]>$row[1]</option>";
		  ?>  
        </select>
      </span>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="button" type="submit" class="Boton1" id="button" value="Cargar Semaforo" /></td>
    </tr>
  </table>
  </form>
  <BR><BR>
<?php 
} 
?>

<?php echo $Pie;?>
</body>
</html>

