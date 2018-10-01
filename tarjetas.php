<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Tarjetas</title>
	<link rel="stylesheet" href="https://www.mangoapp.co/a-recursos/css/estilos.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h1 class="rdm-toolbar--titulo">Tarjetas</h1>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">


	<section class="rdm-tarjeta" style="width: 200px; display: inline-block; ">		

		<div class="rdm-tarjeta--media" style="background-image: url(img/3c.jpg); height: 80px;"></div>

		<div style="background-image: url(img/3c.jpg); background-position: center; 
    background-repeat: no-repeat;
    background-size: cover;">

		<div class="rdm-tarjeta--primario-largo" style="padding: 0.25em; ">			
			<h2 class="rdm-lista--texto-secundario" style="margin: 0;" >Nombre plato</h2>
			<h2 class="rdm-lista--texto-valor" style="margin: 0">$ 15.200</h2>
	  	</div>
	  	

	  	<div class="rdm-tarjeta--acciones-izquierda">
		    <button class="rdm-boton--primario">+</button>
		    <button class="rdm-boton--resaltado">-</button>
	  	</div>

	  	</div>

	</section>





	<section class="rdm-tarjeta">

		<div class="rdm-tarjeta--primario">
			<div class="rdm-tarjeta--primario-contenedor">
				<div class="rdm-tarjeta--avatar" style="background-image: url(img/1.jpg);"></div>
			</div>

			<div class="rdm-tarjeta--primario-contenedor">
				<h1 class="rdm-tarjeta--titulo">Título</h1>
				<h2 class="rdm-tarjeta--subtitulo">Subtitulo</h2>
			</div>
	  	</div>

		<div class="rdm-tarjeta--media" style="background-image: url(img/2.jpg);"></div>

		<div class="rdm-tarjeta--primario-largo">
			<h1 class="rdm-tarjeta--titulo-largo">Título largo</h1>
			<h2 class="rdm-tarjeta--subtitulo-largo">Subtitulo largo</h2>
	  	</div>

	  	<div class="rdm-tarjeta--cuerpo">
		    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
		    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
		    commodo consequat
	  	</div>

	  	<div class="rdm-tarjeta--acciones-izquierda">
		    <button class="rdm-boton--plano-resaltado">Acción 1</button>
		    <button class="rdm-boton--plano">Acción 2</button>
	  	</div>

	</section>




	<section class="rdm-tarjeta">

		<div class="rdm-tarjeta--primario-largo">
			<h1 class="rdm-tarjeta--titulo-largo">Título largo</h1>
			<h2 class="rdm-tarjeta--subtitulo-largo">Subtitulo largo</h2>
	  	</div>

	  	<div class="rdm-tarjeta--cuerpo">
		    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
		    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
		    commodo consequat
	  	</div>

	  	<div class="rdm-tarjeta--acciones-izquierda">
		    <button class="rdm-boton--plano-resaltado">Acción 1</button>
		    <button class="rdm-boton--plano">Acción 2</button>
	  	</div>

	</section>

	<button class="rdm-boton--fab" ><i class="zmdi zmdi-plus zmdi-hc-2x"></i></button>

</main>	
	
</body>
</html>