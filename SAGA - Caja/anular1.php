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
    
<script>	
	//ACEPTAR SOLO NUMEROS
	var nav4 = window.Event ? true : false;
    function acceptNum(evt)
    {
        var key = nav4 ? evt.which : evt.keyCode;
        return (key <= 13 || (key >= 48 && key <= 57));
    }
	
	//CAMPOS OBLIGATORIOS
    function validacion(){		
		if(document.getElementById('radicado').value==''){
		  alert('DEBE DIGITAR EL NUMERO DE RADICADO A EDITAR');
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

if ($_SESSION["caja"]==2)
{
?>
  <BR><BR>
<form 
name="contacto" 
method="post" 
action="anular2.php" 
> 
  <table width="600" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td class="Subtitulo"><span class="TITULO">ANULAR PAZ Y SALVO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="161">N° de Certificado</td>
      <td width="423">
        <input name="numero" type="numero" class="TextField1" id="numero" />
        *
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="button" type="submit" class="Boton1" id="button" value="Buscar" /></td>
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

