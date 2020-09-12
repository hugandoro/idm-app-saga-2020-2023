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

if (($_SESSION["radicador"]==1) || ($_SESSION["radicador"]==2) )
{
?>
  <BR><BR>
  
  <?php 
  Estadisticos('T',$sle);
  $area = 'T';
  ?>
  <table width="813" border="0" align="center">
    <tr>
      <td colspan="3" align="center"><span class="TITULO">SEMAFORO DE ESTADOS PQR Y TUTELAS</span></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>PQR &amp; T GENERADAS</td>
      <td><?php echo "<img src=$icono_expedientes>"; ?> </td>
      <td><span class="TITULO"><?php echo "$general"; ?></span></td>
    </tr>
    <tr>
      <td>PQR &amp; T EN ESTADO &quot;ABIERTO&quot;</td>
      <td><?php echo "<img src=$icono_abierto>"; ?> </td>
      <td><span class="TITULO"><?php echo "$abiertas"; ?></span></td>
    </tr>
    <tr>
      <td>PQR  &amp; T EN ESTADO &quot;CERRADO&quot;</td>
      <td><?php echo "<img src=$icono_cerrado>"; ?> </td>
      <td><span class="TITULO"><?php echo "$cerradas"; ?></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>VENCIDAS</td>
      <td><?php echo "<img src=$icono_rojo>"; ?> </td>
      <td><span class="TITULO"><?php echo "$rojo"; ?></span></td>
    </tr>
    <tr>
      <td>POR VENCER</td>
      <td><?php echo "<img src=$icono_amarillo>"; ?> </td>
      <td><span class="TITULO"><?php echo "$amarillo"; ?></span></td>
    </tr>
    <tr>
      <td>DENTRO DE LOS TERMINOS</td>
      <td><?php echo "<img src=$icono_verde>"; ?> </td>
      <td><span class="TITULO"><?php echo "$verde"; ?></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="246">&nbsp;</td>
      <td width="80">&nbsp;</td>
      <td width="473">&nbsp;</td>
    </tr>
        <tr>
      <td colspan="3" align="center">
        <a href="semaforo_listado.php?t=1&area=<?php echo $area?>"><input name="button2" type="submit" class="Boton2" id="button2" value="Vencidas" /></a>
        <a href="semaforo_listado.php?t=2&area=<?php echo $area?>"><input name="button3" type="submit" class="Boton2" id="button3" value="Por Vencer" /></a>
        <a href="semaforo_listado.php?t=3&area=<?php echo $area?>"><input name="button5" type="submit" class="Boton2" id="button5" value="Terminos" /></a>
        <a href="semaforo_listado.php?t=4&area=<?php echo $area?>"><input name="button" type="submit" class="Boton2" id="button" value="Abiertas" /></a>
        <a href="semaforo_listado.php?t=5&area=<?php echo $area?>"><input name="button4" type="submit" class="Boton2" id="button4" value="Cerradas" /></a>
      </td>
    </tr>
  </table>
  <BR><BR>
<?php 
} 
?>

<?php echo $Pie;?>
</body>
</html>

