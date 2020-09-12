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
    
<script>		
	//CAMPOS OBLIGATORIOS
    function validacion(){		
		if(document.getElementById('fecha1').value==''){
		  alert('DEBE SELECCIONAR UNA FECHA INICIAL');
		  return false;
		}		
		if(document.getElementById('fecha2').value==''){
		  alert('DEBE SELECCIONAR UNA FECHA FINAL');
		  return false;
		}	
		
		return true;
	}	
</script>    
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
   <form id="form1" name="form1" method="post" action="PQRlistarrangofechas2.php">
  <table width="600" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td class="Subtitulo"><span class="TITULO">LSITAR  RADICADOS POR RANGO DE FECHAS</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="161">Fecha Inicial</td>
      <td width="423">
      <input name="fecha1" type="date" class="TextField1" id="fecha1" /></td>
    </tr>
    <tr>
      <td>Fecha Final</td>
      <td><input name="fecha2" type="date" class="TextField1" id="fecha2" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="Continuar4" type="submit" class="Boton1" id="Continuar4" value="Siguiente" /></td>
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

