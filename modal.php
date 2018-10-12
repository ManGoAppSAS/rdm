<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Modal</title>
	<link rel="stylesheet" href="https://www.mangoapp.co/a-recursos/css/estilos.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/push.min.js"></script>
    <script type="text/javascript" src="js/serviceWorker.min.js"></script>
    <script src='https://code.jquery.com/jquery-latest.min.js' type="text/javascript"></script>
    
    
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</head>
<body>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h2 class="rdm-toolbar--titulo">Modal</h2>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">

    <?php 
    $variable1 = 1;
    $variable2 = 2;
    $variable3 = 3;
     ?>

    <button class="rdm-boton--resaltado" data-toggle="modal" data-target="#dialogo" data-elemento_id="<?php echo ($variable1) ?>">Abrir para <?php echo ($variable1) ?></button>
    <button class="rdm-boton--resaltado" data-toggle="modal" data-target="#dialogo" data-elemento_id="<?php echo ($variable2) ?>">Abrir para <?php echo ($variable2) ?></button>
    <button class="rdm-boton--resaltado" data-toggle="modal" data-target="#dialogo" data-elemento_id="<?php echo ($variable3) ?>">Abrir para <?php echo ($variable3) ?></button>


    <div class="modal" id="dialogo" tabindex="-1" role="dialog">

      <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            
            <div class="rdm-tarjeta--primario-largo">
                <h1 class="rdm-tarjeta--titulo-largo">
                    Titulo para <span class="modal-texto-titulo"></span>
                </h1>
            </div>

            <div class="rdm-tarjeta--cuerpo">
                <span class="modal-texto-cuerpo"></span>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat
            </div>
              
                
            <input class="modal-input" type="hidden" id="recipient-name">

            <div class="rdm-tarjeta--acciones-derecha">
                <button class="rdm-boton--plano" data-dismiss="modal">Cancelar</button>
                <button class="rdm-boton--plano-resaltado" >Acción</button>
            </div>            
          
        </div>

      </div>

    </div>  



</main>

<footer>
	

</footer>

<script>
$('#dialogo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('elemento_id') 
  var modal = $(this)
  modal.find('.modal-texto-titulo').text('Titulo para ' + recipient + '?')
  modal.find('.modal-texto-cuerpo').text('¿Deseas eliminar  ' + recipient + '?')
  modal.find('.modal-input').val(recipient)
})
</script>
	
</body>
</html>