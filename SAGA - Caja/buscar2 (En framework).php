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

if (($_SESSION["caja"]==1) || ($_SESSION["caja"]==2) )
{
?>

<?php
$numero = $_POST['numero'];
mysql_select_db($database_sle, $sle);
mysql_query("SET NAMES 'utf8'");

$sqlR="SELECT * FROM certificado WHERE codigo = '$numero'";
$resultR = mysql_query($sqlR);
while ($rowR = mysql_fetch_row($resultR)){
	
$sqlCIU="SELECT * FROM cliente WHERE identificacion = '$rowR[1]'";
$resultCIU = mysql_query($sqlCIU);
$rowCIU = mysql_fetch_row($resultCIU);
  
?>

<BR><BR>
<table width="900" border="1" align="center">
  <tr>
    <td width="300" align="center"><img src="../imagenes/Logo1.png" width="120" height="89" /></td>
    <td width="300" align="center">PAZ Y SALVO VALORIZACION</td>
    <td width="300"><p>PROCESO : Administracion Financiera</p>
<p>Version 1</p>
    <p>Fecha 01/09/2014</p></td>
  </tr>

  <tr>
    <td colspan="3">
    
<TABLE width="900">
  <tr>
    <td width="300">&nbsp;</td>
    <td width="300">&nbsp;</td>
    <td width="300">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="TitGRANDE">PAZ Y SALVO N°</td>
    <td class="TitGRANDE"><?php echo $rowR[0]?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="TitNormal">Propietario</td>
    <td colspan="2"><?php echo $rowCIU[2]?> <?php echo $rowCIU[3]?> <?php echo $rowCIU[4]?> <?php echo $rowCIU[5]?></td>
  </tr>
  <tr>
    <td class="TitNormal">Identificacion N°</td>
    <td colspan="2"><?php echo $rowCIU[1]?><?php echo $rowR[1]?></td>
  </tr>
  <tr>
    <td class="TitNormal">Ficha Catastral N°</td>
    <td colspan="2"><?php echo $rowR[6]?></td>
  </tr>
  <tr>
    <td class="TitNormal">Direccion predio</td>
    <td colspan="2"><?php echo $rowR[2]?> - Barrio <?php echo $rowR[3]?></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Concepto</td>
    <td colspan="2">CONTRIBUCION POR VALORIZACION AL INSTITUTO DE DESARROLLO MUNICIPAL</td>
    </tr>
  <tr>
    <td>Se expide unicamente para</td>
    <td colspan="2"><?php echo $rowR[7]?></td>
  </tr>
  <tr>
    <td>Fecha de Expedicion</td>
    <td colspan="2"><?php echo $rowR[8]?></td>
  </tr>
  <tr>
    <td>Valido hasta</td>
    <td colspan="2"><?php 
    $nuevafecha = date('Y-m-d', strtotime("$rowR[8] + 30 day"));
	echo $nuevafecha;
	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Firma Autorizada</td>
    <td colspan="2">__________________________________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</TABLE>    
    
    </td>
  </tr>
</table>
<BR>
<input type='button' onclick='window.print();' value='Imprimir' />
<BR>
<?php 
}
} 
?>

<?php echo $Pie;?>
</body>
</html>

