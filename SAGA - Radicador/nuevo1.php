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
  <form id="form1" onsubmit="return validacion()" name="form1" method="post" action="nuevo2.php">
  <table width="600" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td class="Subtitulo"><span class="TITULO">NUEVO RADICADO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="161">Fecha de Recepcion</td>
      <td width="423">
        <input name="fecha" type="date" class="TextField1" id="fecha" />
        *
      </td>
    </tr>
    <tr>
      <td>Medio por el que se recibe</td>
      <td class="TextField1"><label for="medio"></label>
        <select name="medio" id="medio">
          <option value="DOCUMENTO FISICO">DOCUMENTO FISICO</option>
          <option value="CORREO ELECTRONICO">CORREO ELECTRONICO</option>
          <option value="MEDIO MAGNETICO">MEDIO MAGNETICO</option>
          <option value="MEDIO MAGNETICO">PORTAL WEB</option>
      </select></td>
    </tr>
    <tr>
      <td>Oficio o Serie N°</td>
      <td><input name="sn" type="text" class="TextField1" id="sn" onkeyup="this.value=this.value.toUpperCase()"/></td>
    </tr>
    <tr>
      <td>Nombre del remitente</td>
      <td><input name="remitente" type="text" class="TextField1" id="remitente" onkeyup="this.value=this.value.toUpperCase()"/>
        *</td>
    </tr>
    <tr>
      <td>Documento o Nit</td>
      <td><input name="identificacion" type="text" class="TextField1" id="identificacion" onkeypress="return acceptNum(event)"/>
        *</td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td><input name="telefono" type="text" class="TextField1" id="telefono" onkeypress="return acceptNum(event)"/></td>
    </tr>
    <tr>
      <td>Celular</td>
      <td><input name="celular" type="text" class="TextField1" id="celular" onkeypress="return acceptNum(event)"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="email" type="text" class="TextField1" id="email" onkeyup="this.value=this.value.toUpperCase()"/></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><input name="direccion" type="text" class="TextField1" id="direccion" onkeyup="this.value=this.value.toUpperCase()"/></td>
    </tr>
     <tr>
      <td>Ciudad</td>
      <td class="TextField1"><label for="ciudad"></label>
        <select name="ciudad" id="ciudad">
          <option value="PEREIRA">PEREIRA</option>
          <option value="DOSQUEBRADAS" selected="selected">DOSQUEBRADAS</option>
          <option value="SANTA ROSA DE CABAL">SANTA ROSA DE CABAL</option>
          <option value="BOGOTA">BOGOTA</option>
          <option value="ARMENIA">ARMENIA</option>
          <option value="MANIZALES">MANIZALES</option>
          <option value="CALI">CALI</option>
          <option value="QUIBDO">QUIBDO</option>
          <option value="IBAGUE">IBAGUE</option>
          <option value="MEDELLIN">MEDELLIN</option>
       </select></td>
    </tr>
    <tr>
      <td>Motivo</td>
      <td rowspan="2"><label for="motivo"></label>
      <textarea name="motivo" cols="45" rows="5" class="TextArea1" id="motivo" onkeyup="this.value=this.value.toUpperCase()"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo de Documento</td>
      <td><span class="TextField1">
        <select name="tipo" id="tipo"> 
          <?php			  	
		    mysqli_select_db($sle, $database_sle);
			$sql="SELECT * FROM documentacion";
		    $resultado=mysqli_query($sle, $sql)or die (mysql_error());	
			while ($row = mysqli_fetch_row($resultado)) 
			  echo "<option value=$row[0]>$row[1]</option>";
		  ?>          
        </select>
      </span></td>
    </tr>
    <tr>
      <td>Fecha de Vencimiento</td>
      <td>        <input name="diasvencimiento" type="date" class="TextField1" id="diasvencimiento"/></td>
    </tr>
    <tr>
      <td>Area asignada</td>
      <td><span class="TextField1">
        <select name="area" id="area">
          <?php			  	
		    mysqli_select_db($sle, $database_sle);
			$sql="SELECT * FROM area";
		    $resultado=mysqli_query($sle, $sql)or die (mysql_error());	
			while ($row = mysqli_fetch_row($resultado)) 
			  echo "<option value=$row[0]>$row[1]</option>";
		  ?>  
        </select>
      </span></td>
    </tr>
    <tr>
      <td>Funcionario asignado</td>
      <td><span class="TextField1">
        <select name="funcionario" id="funcionario">
          <?php			  	
		    mysqli_select_db($sle, $database_sle);
			$sql="SELECT * FROM funcionarios";
		    $resultado=mysqli_query($sle, $sql)or die (mysql_error());	
			while ($row = mysqli_fetch_row($resultado)) 
			  if ($row[3]!='0') echo "<option value=$row[0]>$row[1]</option>";
		  ?>  
        </select>
      </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="button" type="submit" class="Boton1" id="button" value="Ingresar" /></td>
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

