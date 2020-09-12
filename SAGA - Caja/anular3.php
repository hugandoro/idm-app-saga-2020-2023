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
		if(document.getElementById('fecha').value==''){
		  alert('EL DOCUMENTO DEBE TENER UNA FECHA DE RECEPCION');
		  return false;
		}
		if(document.getElementById('remitente').value==''){
		  alert('EL DOCUMENTO DEBE TENER UN REMITENTE');
		  return false;
		}
		if(document.getElementById('identificacion').value==''){
		  alert('EL REMITENTE DEBE TENER UNA IDENTIFICACION');
		  return false;
		}
		if(document.getElementById('telefono').value==''){
		  alert('EL REMITENTE DEBE TENER UN TELEFONO');
		  return false;
		}
		if(document.getElementById('direccion').value==''){
		  alert('EL REMITENTE DEBE TENER UNA DIRECCION');
		  return false;
		}
		if(document.getElementById('ciudad').value==''){
		  alert('EL REMITENTE DEBE TENER UNA CIUDAD');
		  return false;
		}	
		if(document.getElementById('motivo').value==''){
		  alert('EL DOCUMENTO DEBE TENER UN MOTIVO');
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

<BR>
<BR>
<CENTER>
<?php
  $numero = $_POST['numero'];
  mysqli_select_db($sle,$database_sle);
  mysqli_query($sle,"SET NAMES 'utf8'");

  $anulado_por = $_SESSION["cedula"];

  $sql="UPDATE certificado SET estado = 'ANULADO', anulado_por = $anulado_por WHERE codigo = '$numero'";
  mysqli_query($sle,$sql)or die (mysql_error());	
  echo "<BR>CERTIFICADO ANULADO CORRECTAMENTE<BR>";
?>
</CENTER>
<BR>

<?php 
} 
?>

<?php echo $Pie;?>
</body>
</html>

