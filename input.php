<?php 
if(isset($_POST['valor'])) $valor = $_POST['valor']; elseif(isset($_GET['valor'])) $valor = $_GET['valor']; else $valor = null;

$valor = str_replace('.','',$valor);

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Tipografias</title>
	<link rel="stylesheet" href="css/estilos.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"> </script>
 	<script src="https://cdn.jsdelivr.net/autonumeric/2.0.0/autoNumeric.min.js"></script>

	<script type="text/javascript">		
		$(document).ready(function () {
			     
		}); 

	  	jQuery(function($) {
	      	$('#selector').autoNumeric('init', {aSep: '.', aDec: ',', mDec: '0'}); 
	      	
	  	});
	</script>
</head>
<body>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h2 class="rdm-toolbar--titulo">Input numérico</h2>
		</div>
		
	</div>
</header>

<main class="rdm--contenedor-toolbar">
    
    <section class="rdm-formulario">
	
	<form action="input.php" method="post" enctype="multipart/form-data">
  		
  		<p class="rdm-formularios--label"><label for="categoria">Dinero: <?php echo $valor; ?></label></p>
  		<p><input class="rdm-formularios--input-grande" type="tel" name="valor" id="selector" class="someID" placeholder="Dinero"></p>
  		<p class="rdm-formularios--ayuda">Este input pone los separadores de miles y millones</p>

  		<p><button type="submit" class="rdm-boton--resaltado">Enviar</button></p>

  	</form>

  	</section>

</main>
	
</body>
</html>