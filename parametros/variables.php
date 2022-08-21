<?php
$ruta_principal = "/idm-app-saga-2020-2023";
$ruta_radicador = "/idm-app-saga-2020-2023/SAGA - Radicador";
$ruta_caja = "/idm-app-saga-2020-2023/SAGA - Caja";

$icono_verde = $ruta_principal."/imagenes/Verde.png"; //Imagen de Cabezera
$icono_amarillo = $ruta_principal."/imagenes/Amarillo.png"; //Imagen de Cabezera
$icono_rojo = $ruta_principal."/imagenes/Rojo.png"; //Imagen de Cabezera
$icono_cerrado = $ruta_principal."/imagenes/Cerrado.png"; //Imagen de Cabezera
$icono_abierto = $ruta_principal."/imagenes/Abierto.png"; //Imagen de Cabezera
$icono_expedientes = $ruta_principal."/imagenes/Expediente.png"; //Imagen de Cabezera

$peticiones=0;
$quejas=0;
$reclamos=0;
$tutelas=0;
$general=0;
$abiertas=0;
$cerradas=0;
$rojo=0;
$amarillo=0;
$verde=0;

$banner_cabezera = $ruta_principal."/imagenes/header.png"; //Imagen de Cabezera

$licenciado = "EDOS Dosquebradas"; //Empresa licenciada

$logos_licenciado = "<table width='220' border='0'> 
    <tr>
      <td width='100'><span class='Subtitulo'><img src='$ruta_principal/imagenes/Logo1.png' height='90'></span></td>
      <td width='20'>&nbsp;</td>
      <td width='100'><span class='Subtitulo'><img src='$ruta_principal/imagenes/Logo2.png' alt='' height='90'></span></td>
    </tr>
  </table>"; //Logos de la empresa licenciada

$nombre_corto = "SAGA"; //Nombre Corto del Aplicativo
$nombre_largo = "Sistema Asistencial y Gestion de Archivo";  //Nombre Largo del Aplicativo 
$version = "2.0"; //Version del Aplicativo
$copyright1 =  "EDOS Dosquebradas 2020 - 2023"; //Copyright Fecha
$copyright2 = "Desarrollador por Genus Group SAS<BR>"; //Copyright Fabricante
$logo_fabricante = $ruta_principal."/imagenes/Logo0.png"; //Copyright Logo

$Pie= "<HR><CENTER>
$logos_licenciado <HR>
<p class='Subtitulo'><B>$nombre_corto $version</B> - $nombre_largo
<BR>$copyright1<BR>$copyright2</p>
<img src=$logo_fabricante>
</CENTER>";
?>