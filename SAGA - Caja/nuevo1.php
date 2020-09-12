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
		if(document.getElementById('identificacion').value==''){
		  alert('DEBE DIGITAR UN DOCUMENTO DE IDENTIFICACION');
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
  <form id="form1" onsubmit="return validacion()" name="form1" method="post" action="nuevo2.php">
  <table width="600" border="0" align="center">
    <tr>
      <td width="161">&nbsp;</td>
      <td width="423" class="Subtitulo"><span class="TITULO">NUEVO PAZ Y SALVO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo de Documento</td>
      <td class="TextField1"><label for="tipo"></label>
        <select name="tipo" id="tipo">
          <option value="CC" selected="selected">CC</option>
          <option value="NIT">NIT</option>
      </select></td>
    </tr>
    <tr>
      <td>Documento o Nit</td>
      <td><input name="identificacion" type="text" class="TextField1" id="identificacion" onkeypress="return acceptNum(event)"/>
        *</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="button" type="submit" class="Boton1" id="button" value="Validar" /></td>
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

