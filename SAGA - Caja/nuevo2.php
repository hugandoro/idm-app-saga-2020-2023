<?php require_once('Connections/bd_caja.php');
$currentPage = $_SERVER["PHP_SELF"];
session_start();
?>
<?php require_once('../parametros/variables.php');?>
<?php require_once('../parametros/procesos.php');?>
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
		  alert('DEBE INGRESAR UN NUMERO DE IDENTIFICACION');
		  return false;
		}
		if(document.getElementById('nombre1').value==''){
		  alert('DEBE INGRESAR EL PRIMER NOMBRE');
		  return false;
		}
		if(document.getElementById('apellido1').value==''){
		  alert('DEBE INGRESAR EL PRIMER APELLIDO');
		  return false;
		}
		if(document.getElementById('direccion').value==''){
		  alert('DIRECCION NO PUEDE ESTAR VACIO');
		  return false;
		}
		if(document.getElementById('ficha').value==''){
		  alert('DEBE DIGITAR UN NUMERO DE FICHA CATASTRAL');
		  return false;
		}	
		
		return true;
	}	
</script> 
<script language="JavaScript"> 
function pregunta(){ 
    if (confirm('Confirmar generacion de paz y salvo')){ 
       document.tuformulario.submit() 
    } 
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
  $tipoA = $_POST['tipo'];
  $identificacionA = $_POST['identificacion'];	
  
  $p[0] = $identificacionA;
  $p[1] = $tipoA;
  $p[2] = "";
  $p[3] = "";
  $p[4] = "";
  $p[5] = "";  
  
  $sql = "SELECT * FROM cliente WHERE identificacion = '$identificacionA'";
  $result = mysqli_query($sle,$sql)or die (mysql_error());
  if (mysqli_num_rows($result) != 0) $p = mysqli_fetch_row($result);	
  
?>
  <BR><BR>
  <form id="form1" onsubmit="return validacion()" name="form1" method="post" action="nuevo3.php">
  <table width="600" border="0" align="center">
    <tr>
      <td width="161">&nbsp;</td>
      <td width="423" class="Subtitulo"><span class="TITULO">NUEVO CERTIFICADO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo Documento</td>
      <td class="TextField1"><label for="tipo"></label>
      <input name="tipo" type="text" class="TextField1" id="tipo" onkeypress="return acceptNum(event)" value="<?php echo "$p[1]"; ?>" readonly="readonly""/>
      *</td>
    </tr>
    <tr>
      <td>Documento</td>
      <td><input name="identificacion" type="text" class="TextField1" id="identificacion" onkeypress="return acceptNum(event)" value="<?php echo "$p[0]"; ?>" readonly="readonly""/>
        *</td>
    </tr>
    <tr>
      <td>Nombre 1</td>
      <td><input name="nombre1" type="text" class="TextField1" id="nombre1" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo "$p[2]"; ?>"/>
        *</td>
    </tr>
    <tr>
      <td>Nombre 2</td>
      <td><input name="nombre2" type="text" class="TextField1" id="nombre2" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo "$p[3]"; ?>"/></td>
    </tr>
    <tr>
      <td>Apellido 1</td>
      <td><input name="apellido1" type="text" class="TextField1" id="apellido1" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo "$p[4]"; ?>"/>
        *</td>
    </tr>
    <tr>
      <td>Apellido 2</td>
      <td><input name="apellido2" type="text" class="TextField1" id="apellido2" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo "$p[5]"; ?>"/></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><input name="direccion" type="text" class="TextField1" id="direccion" onkeyup="this.value=this.value.toUpperCase()"/>
        *</td>
    </tr>
    <tr>
      <td>Barrio</td>
      <td><input name="barrio" type="text" class="TextField1" id="barrio" onkeyup="this.value=this.value.toUpperCase()"/></td>
    </tr>
    <tr>
      <td>Telefono Fijo</td>
      <td><input name="fijo" type="text" class="TextField1" id="fijo" onkeypress="return acceptNum(event)"/></td>
    </tr>
    <tr>
      <td>Telefono Celular</td>
      <td><input name="celular" type="text" class="TextField1" id="celular" onkeypress="return acceptNum(event)"/></td>
    </tr>
    <tr>
      <td>N° de Ficha Catastral</td>
      <td><input name="ficha" type="text" class="TextField1" id="ficha" onkeyup="this.value=this.value.toUpperCase()"/>
        *</td>
    </tr>
    <tr>
      <td>Motivo</td>
      <td rowspan="2"><label for="motivo"></label>
      <textarea name="motivo" cols="45" rows="5" class="TextArea1" id="motivo" onkeyup="this.value=this.value.toUpperCase()">ABIERTO</textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="button" type="submit" class="Boton1" id="button" value="Genera Paz  y Salvo" onclick="pregunta()" /></td>
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

