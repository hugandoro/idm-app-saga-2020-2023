<?php
//FUNCION DE VALIDACION DE NIVELES DE ACCESO
//*******************************************
function Seguridad()
{
  if (isset($_SESSION['estado'])){ //Si Existe un Nivel de Acceso 
    if ($_SESSION['estado'] == "0"){
      echo "<BR><CENTER>USUARIO INACTIVO EN EL SISTEMA</CENTER>";
	  return 0;  
    }
  }
  else //Si NO existe un Nivel de Acceso 
  {
    echo "<BR><CENTER>SU SESION A EXPIRADO POR TIEMPO O NO SE HA REGISTRADO EN NUESTRO SISTEMA</CENTER>";
    return 0;
  }
  
  return 1;
}
//*******************************************
//*******************************************


//FUNCION DE CREACION DEL MENU PRINCIPAL*****
//*******************************************
function Menu()
{
  $ruta_principal = "/idm-app-saga-2020-2023";
  $ruta_radicador = "/idm-app-saga-2020-2023/SAGA - Radicador";	
  $ruta_caja = "/idm-app-saga-2020-2023/SAGA - Caja";	
  
  $Menu_Global_Abre = "<div id='cssmenu'>
  <ul>";
 
//CAJA  
  $Menu_Caja_CONSULTA = "
     <li class='active'><a href='#'><span>Tesoreria y Caja</span></a>
       <ul>
           <li class='has-sub'><a href='$ruta_caja/buscar1.php'><span>Consultar Paz y Salvo por N°</span></a></li>
           <li class='has-sub'><a href='$ruta_caja/listarrangofechas1.php'><span>Informe por rango de fechas</span></a></li>
       </ul>   
     </li>";
  $Menu_Caja_ADMINISTRADOR = "
     <li class='active'><a href='#'><span>Tesoreria y Caja</span></a>
       <ul>
           <li class='has-sub'><a href='$ruta_caja/nuevo1.php'><span>Nuevo Paz y Salvo</span></a></li>
           <li class='has-sub'><a href='$ruta_caja/buscar1.php'><span>Consultar Paz y Salvo por N°</span></a></li>
           <li class='has-sub'><a href='$ruta_caja/anular1.php'><span>Anular Paz y Salvo°</span></a></li>
           <li class='has-sub'><a href='$ruta_caja/listarrangofechas1.php'><span>Informe por rango de fechas</span></a></li>
       </ul>   
     </li>";
//*********
//RADICADOR   
   $Menu_Radicador_CONSULTA = "
     <li class='has-sub'><a href='#'><span>Radicador de Correspondencia</span></a>
        <ul>
           <li class='has-sub'><a href='$ruta_radicador/buscar1.php'><span>Busqueda</span></a>
              <ul>
                 <li><a href='$ruta_radicador/buscar1.php'><span>Buscar por N° Radicado</span></a></li>                         
              </ul>
           </li>
        </ul>
     </li>
   
     <li><a href='#'><span>PQR</span></a>
        <ul>
           <li class='has-sub'><a href='#'><span>Semaforo</span></a>
              <ul>
                 <li><a href='$ruta_radicador/semaforo1.php'><span>General</span></a></li>
                 <li><a href='$ruta_radicador/semaforoareas1.php'><span>Por Areas</span></a></li>
              </ul>
           </li>
        </ul>
     </li>";
   $Menu_Radicador_ADMINISTRADOR = "
     <li class='has-sub'><a href='#'><span>Radicador de Correspondencia</span></a>
        <ul>
           <li class='has-sub'><a href='#'><span>Radicacion</span></a>
              <ul>
                 <li><a href='$ruta_radicador/nuevo1.php'><span>Nuevo Radicado</span></a></li>
                 <li><a href='$ruta_radicador/editar1.php'><span>Editar Radicado</span></a></li>
              </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Busqueda</span></a>
              <ul>
                 <li><a href='$ruta_radicador/buscar1.php'><span>Buscar por N° Radicado</span></a></li>                          
              </ul>
           </li>
           <li class='has-sub'><a href='#'><span>Informes</span></a>
              <ul>
                 <li><a href='$ruta_radicador/listarrangofechas1.php'><span>Informe Rango de Fechas</span></a></li>
              </ul>
           </li>
        </ul>
     </li>
   
     <li><a href='#'><span>PQR</span></a>
        <ul>
           <li class='has-sub'><a href='#'><span>Semaforo</span></a>
              <ul>
                 <li><a href='$ruta_radicador/semaforo1.php'><span>General</span></a></li>
                 <li><a href='$ruta_radicador/semaforoareas1.php'><span>Por Areas</span></a></li>
              </ul>
           </li>
           <li class='has-sub'><a href=''><span>Informes</span></a>
              <ul>
                 <li><a href='$ruta_radicador/PQRlistarrangofechas1.php'><span>Informe Rango de Fechas</span></a></li>
              </ul>
           </li>
        </ul>
     </li>";
//******
//OTROS   
     $Menu_Otros = "
     <li class='last'><a href='$ruta_principal\logout.php'><span>Cerrar Sesion</span></a></li>";
//******
	 
  $Menu_Global_Cierra = "</ul>
  </div>";
  
  
  $Menu_Completo = $Menu_Global_Abre; 
  
  if ($_SESSION['radicador'] == "1")
    $Menu_Completo = $Menu_Completo."".$Menu_Radicador_CONSULTA;
  if ($_SESSION['radicador'] == "2")
    $Menu_Completo = $Menu_Completo."".$Menu_Radicador_ADMINISTRADOR;
  if ($_SESSION['caja'] == "1")
    $Menu_Completo = $Menu_Completo."".$Menu_Caja_CONSULTA;
  if ($_SESSION['caja'] == "2")
    $Menu_Completo = $Menu_Completo."".$Menu_Caja_ADMINISTRADOR;
  
  $Menu_Completo = $Menu_Completo."".$Menu_Otros."".$Menu_Global_Cierra;
  echo $Menu_Completo; 
}
//*******************************************
//*******************************************

function Estadisticos($aux, $sle)
{
  global $general;
  global $abiertas;
  global $cerradas;
  global $amarillo;
  global $rojo;
  global $verde;
	  
  $general=0;
  $abiertas=0;
  $cerradas=0;
  $amarillo=0;
  $rojo=0;
  $verde=0;
  	  
  if ($aux != 'T')	  
    $sqlES="SELECT * FROM radicador WHERE ((documentacion_documentacioncodigo = '2') OR (documentacion_documentacioncodigo = '3') OR  (documentacion_documentacioncodigo = '4') OR (documentacion_documentacioncodigo = '6')) AND (area_areacodigo = '$aux')";
  if ($aux == 'T')
    $sqlES="SELECT * FROM radicador WHERE (documentacion_documentacioncodigo = '2') OR (documentacion_documentacioncodigo = '3') OR  (documentacion_documentacioncodigo = '4') OR (documentacion_documentacioncodigo = '6')";

  $resultES = mysqli_query($sle, $sqlES)  or die(mysql_error());
  while ($rowES = mysqli_fetch_row($resultES))
  {
	$general = $general + 1;
	if ($rowES[12] == '0000-00-00')
	{
	  $abiertas = $abiertas + 1;
	  
      $Fecha = getdate();
      $FechaR = $Fecha["year"]."/".$Fecha["mon"]."/".$Fecha["mday"];
      $Actual =  strtotime($FechaR);
      $Inicio = strtotime($rowES[1]);
      $Fin = strtotime($rowES[18]);
  
      $timestamp1 = mktime(0,0,0,date("m", $Actual),date("d", $Actual),date("Y", $Actual)); 
      $timestamp2 = mktime(0,0,0,date("m", $Fin),date("d", $Fin),date("Y", $Fin)); 
  
      $segundos_diferencia = $timestamp2 - $timestamp1;
      $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);  

	  if ($dias_diferencia >= 3)
	    $verde = $verde + 1;
	  if (($dias_diferencia >= 0) && ($dias_diferencia < 3))
	    $amarillo = $amarillo +1;
	  if ($dias_diferencia < 0)  
	    $rojo = $rojo + 1;

	}
	else
	  $cerradas = $cerradas + 1;  
  }
}

//*******************************************
//*******************************************

function Verificador_PQR($codigo,$tipo,$sle)
{ 	  
  $sqlES="SELECT * FROM radicador WHERE (radicadorcodigo = '$codigo')";

  $resultES = mysqli_query($sle, $sqlES)  or die(mysql_error());
  while ($rowES = mysqli_fetch_row($resultES))
  {	
	if ($rowES[12] == '0000-00-00')
	{  
	  if ($tipo==4)
	    return 1;
      $Fecha = getdate();
      $FechaR = $Fecha["year"]."/".$Fecha["mon"]."/".$Fecha["mday"];
      $Actual =  strtotime($FechaR);
      $Inicio = strtotime($rowES[1]);
      $Fin = strtotime($rowES[18]);
  
      $timestamp1 = mktime(0,0,0,date("m", $Actual),date("d", $Actual),date("Y", $Actual)); 
      $timestamp2 = mktime(0,0,0,date("m", $Fin),date("d", $Fin),date("Y", $Fin)); 
  
      $segundos_diferencia = $timestamp2 - $timestamp1;
      $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);  

	  if (($dias_diferencia >= 3)  && ($tipo==3))
	    return 1;
	  if (($dias_diferencia >= 0) && ($dias_diferencia < 3)  && ($tipo==2))
	    return 1;
	  if (($dias_diferencia < 0) && ($tipo==1))  
	    return 1;
	}
	else
	{
	  if ($tipo==5)
	    return 1;
	}
  }
}

?>

