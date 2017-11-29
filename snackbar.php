<?php
$condicion = "no";
if ($condicion == "si")
{	
	$body_snack = 'onLoad="Snackbar()">';	
}
else
{
	$body_snack = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Tarjetas</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body <?php echo $body_snack; ?>>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h1 class="rdm-toolbar--titulo">Snackbar</h1>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">

    <button class="rdm-boton--resaltado" onClick="Snackbar()">mostrar mensaje</button>

</main>

<div id="rdm-snackbar--contenedor">
	<div class="rdm-snackbar--fila">
		<div class="rdm-snackbar--primario-aviso">
			<h2 class="rdm-snackbar--titulo">Usuario agregado</h2>
		</div>
	</div>
</div>



<script>
function Snackbar() {
    var x = document.getElementById("rdm-snackbar--contenedor")
    x.className = "mostrar";
    setTimeout(function(){ x.className = x.className.replace("mostrar", ""); }, 5200);
}
</script>

</body>
</html>
	
</body>
</html>