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

if (($_SESSION["radicador"]==1) || ($_SESSION["radicador"]==2) )
{
?>

<?php
$radicado = $_POST['radicado'];
mysqli_select_db($sle, $database_sle);
mysqli_query($sle, "SET NAMES 'utf8'");

$sqlR="SELECT * FROM radicador WHERE radicadorcodigo = '$radicado'";
$resultR = mysqli_query($sle, $sqlR);
while ($rowR = mysqli_fetch_row($resultR)){  
?>

<BR><BR>
  <table width="600" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td class="Subtitulo"><span class="TITULO">DETALLES COMPLETO DEL RADICADO</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Radicado N°</td>
      <td><input name="radicado" type="text" class="TextField1" id="radicado" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[0]?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td width="161">Fecha de Recepcion</td>
      <td width="423">
        <input name="fecha" type="date" class="TextField1" id="fecha" value="<?php echo $rowR[1]?>" readonly="readonly"/>
        *
      </td>
    </tr>
    <tr>
      <td>Medio por el que se recibe</td>
      <td class="TextField1">
      <input name="medio" type="text" class="TextField1" id="medio" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[2]?>" readonly="readonly"/> 
      </td>
    </tr>
    <tr>
      <td>Oficio o Serie N°</td>
      <td><input name="sn" type="text" class="TextField1" id="sn" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[3]?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Nombre del remitente</td>
      <td><input name="remitente" type="text" class="TextField1" id="remitente" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[4]?>" readonly="readonly"/>
        *</td>
    </tr>
    <tr>
      <td>Documento o Nit</td>
      <td><input name="identificacion" type="text" class="TextField1" id="identificacion" onkeypress="return acceptNum(event)" value="<?php echo $rowR[5]?>" readonly="readonly"/>
        *</td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td><input name="telefono" type="text" class="TextField1" id="telefono" onkeypress="return acceptNum(event)" value="<?php echo $rowR[6]?>" readonly="readonly"/>
        *</td>
    </tr>
    <tr>
      <td>Celular</td>
      <td><input name="celular" type="text" class="TextField1" id="celular" onkeypress="return acceptNum(event)" value="<?php echo $rowR[7]?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="email" type="text" class="TextField1" id="email" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[8]?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><input name="direccion" type="text" class="TextField1" id="direccion" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[9]?>" readonly="readonly"/>
        *</td>
    </tr>
     <tr>
      <td>Ciudad</td>
      <td class="TextField1"><input name="ciudad" type="text" class="TextField1" id="ciudad" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[10]?>" readonly="readonly"/> 
      </td>
    </tr>
    <tr>
      <td>Motivo</td>
      <td rowspan="2"><label for="motivo"></label>
      <textarea name="motivo" cols="45" rows="5" class="TextArea1" id="motivo" onkeyup="this.value=this.value.toUpperCase()" readonly="readonly"><?php echo $rowR[11]?></textarea>
      *</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo de Documento</td>
      <td>  
      <?php			  	
	    mysqli_select_db($sle, $database_sle);
		$sql="SELECT * FROM documentacion";
		$resultado=mysqli_query($sle, $sql)or die (mysql_error());	
		while ($row = mysqli_fetch_row($resultado)) 
		{
		  if ($rowR[15] == $row[0])
		  $paso = $row[1];
		}
	  ?>          
      <input name="tipo" type="text" class="TextField1" id="tipo" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $paso?>" readonly="readonly"/>   
      </td>
    </tr>
    <tr>
      <td>Fecha de Vencimiento</td>
      <td><input name="diasvencimiento" type="text" class="TextField1" id="diasvencimiento" onkeypress="return acceptNum(event)" value="<?php echo $rowR[18]?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Area asignada</td>
      <td>
      <?php			  	
	    mysqli_select_db($sle, $database_sle);
		$sql="SELECT * FROM area";
		$resultado=mysqli_query($sle, $sql)or die (mysql_error());	
		while ($row = mysqli_fetch_row($resultado))
		{ 
		  if ($rowR[16] == $row[0])
		    $paso = $row[1];
		}
	  ?>        
      <input name="area" type="text" class="TextField1" id="area" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $paso?>" readonly="readonly"/>     
      </td>
    </tr>
    <tr>
      <td>Funcionario asignado</td>
      <td>
      <?php			  	
		mysqli_select_db($sle, $database_sle);
		$sql="SELECT * FROM funcionarios";
		$resultado=mysqli_query($sle, $sql)or die (mysql_error());	
		while ($row = mysqli_fetch_row($resultado)) 
		{
		  if ($rowR[17] == $row[0])
		    $paso = $row[1];
		}
	  ?>  
      <input name="funcionario" type="text" class="TextField1" id="funcionario" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $paso?>" readonly="readonly"/>        
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><HR></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Fecha Respuesta</td>
      <td><input name="fechaR" type="text" class="TextField1" id="fechaR" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[12]?>" readonly="readonly"/> 
      </td>
    </tr>
    <tr>
      <td>Medio de Respuesta</td>
      <td><input name="medioR" type="text" class="TextField1" id="medioR" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[13]?>" readonly="readonly"/> 
      </td>
    </tr>
    <tr>
      <td>Oficio N°</td>
      <td><input name="oficioR" type="text" class="TextField1" id="oficioR" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[19]?>" readonly="readonly"/> 
      </td>
    </tr>
    <tr>
      <td>Respuesta</td>
      <td><input name="respuesta" type="text" class="TextField1" id="respuesta" onkeyup="this.value=this.value.toUpperCase()" value="<?php echo $rowR[14]?>" readonly="readonly"/> 
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="select"></label></td>
    </tr>
        <tr>
      <td colspan="2" align="center"><input name="button" type="submit" class="Boton1" id="button" value="Imprimir" onclick='window.print();'/></td>
    </tr>
  </table>
  
  <BR><BR>
<?php 
}
} 
?>

<?php echo $Pie;?>
</body>
</html>

