<?php require_once('Connections/sle.php'); ?>
<?php require_once('parametros/variables.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
 
<head profile="http://gmpg.org/xfn/11"> 
	<title><?php echo "$nombre_corto $version";?></title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="STYLESHEET" type="text/css" href="estilos.css">
</head> 
<body>

<CENTER>
<TABLE>
<TR><TD align="center">
<?php echo "<img src=$banner_cabezera>"; ?> 
</TD></TR>
</TABLE>
</CENTER>

<CENTER>
<BR>
<TABLE>
<TR><TD align="center">
    <form id="form2" name="form2" method="POST" action="validacion.php">
    <table width="160" border="0">
    <tr>
    <td>Usuario</td>
    <td>
    <label for="usuario"></label>
    <input name="usuario" type="text" class="TextField1" id="usuario" /></td></tr>
    <tr>
    <td>Contraseña</td>
    <td><input name="password" type="password" class="TextField1" id="password" /></td></tr>
    <tr>
    <td colspan="2" align="center">
    <br><input name="button" type="submit" class="Boton1" id="button" value="Iniciar Sesion" /></tr>
    </table>
    </form>
</TD></TR>
</TABLE>
<BR>
</CENTER>


<?php echo $Pie;?>
</body>
</html>

