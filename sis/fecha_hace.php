<?php 
//funcion desde hace x tiempo
//$fecha_hace = "2015-09-23 18:52:10";


function tiempo_transcurrido($fecha_hace)
{
	if(empty($fecha_hace))
	{
		  return "No hay fecha";
	}
   
	$intervalos = array("segundo", "minuto", "hora", "día", "semana", "mes", "año");
	$duraciones = array("60","60","24","7","4.35","12");
   
	$ahora = time();
	$Fecha_Unix = strtotime($fecha_hace);
	
	if(empty($Fecha_Unix))
	{   
		  return "Fecha incorracta";
	}

	if($ahora > $Fecha_Unix)
	{   
		  $diferencia = $ahora - $Fecha_Unix;
		  $tiempo = "Hace";
	}
	else
	{
		  $diferencia = $Fecha_Unix -$ahora;
		  $tiempo = "Dentro de";
	}

	for($j = 0; $diferencia >= $duraciones[$j] && $j < count($duraciones)-1; $j++)
	{
	  $diferencia /= $duraciones[$j];
	}
   
	$diferencia = round($diferencia);
	
	if($diferencia != 1)
	{
		$intervalos[5].="e"; //meses
		$intervalos[$j].= "s";
	}
   
    return "$tiempo $diferencia $intervalos[$j]";
}
echo tiempo_transcurrido($fecha_hace);
?>