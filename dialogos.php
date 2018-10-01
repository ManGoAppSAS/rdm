<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Diálogos</title>
	<link rel="stylesheet" href="https://www.mangoapp.co/a-recursos/css/estilos.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/push.min.js"></script>
    <script type="text/javascript" src="js/serviceWorker.min.js"></script>
    <script src='https://code.jquery.com/jquery-latest.min.js' type="text/javascript"></script>
</head>
<body>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h2 class="rdm-toolbar--titulo">Diálogos</h2>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">

    <button class="rdm-boton--resaltado" id="abrir_modal">abrir dialogo</button>

    <div id="dialogo" class="rdm-tarjeta--modal">
     
        <div class="rdm-tarjeta--modal-contenido">  
            

            <div class="rdm-tarjeta--primario-largo">
                <h1 class="rdm-tarjeta--titulo-largo">Título del diálogo</h1>
                <h2 class="rdm-tarjeta--subtitulo-largo">Subtitulo diálogo</h2>
            </div>

            <div class="rdm-tarjeta--cuerpo">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat
            </div>

            <div class="rdm-tarjeta--acciones-derecha">
                <button class="rdm-boton--plano" id="cerrar_modal">Cancelar</button>
                <button class="rdm-boton--plano-resaltado" >Acción</button>
            </div>

        </div>

    </div>

</main>

<footer>
	

</footer>

<script type="text/javascript">
    var modal = document.getElementById('dialogo');
    var btn = document.getElementById("abrir_modal");
    var span = document.getElementById("cerrar_modal");
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
	
</body>
</html>