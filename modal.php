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

    <button class="rdm-boton--resaltado" data-toggle="modal" data-target="#dialogo" data-dato1="$local" data-dato2="<?php echo ($variable1) ?>">Abrir para <?php echo ($variable1) ?></button>
    <button class="rdm-boton--resaltado" data-toggle="modal" data-target="#dialogo" data-dato1="$local" data-dato2="<?php echo ($variable2) ?>">Abrir para <?php echo ($variable2) ?></button>
    <button class="rdm-boton--resaltado" data-toggle="modal" data-target="#dialogo" data-dato1="$local" data-dato2="<?php echo ($variable3) ?>">Abrir para <?php echo ($variable3) ?></button>


    <div class="modal" id="dialogo" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="rdm-tarjeta--primario-largo">
                <h1 class="rdm-tarjeta--titulo-largo">
                    Agregar componente
                </h1>
            </div>

            <div class="rdm-tarjeta--cuerpo">                
                
                ¿Cuantos <b>K</b> de <b>Harina de trigo</b> deseas agregar a la composición de este producto?

            </div>            

            <div class="rdm-tarjeta--acciones-derecha">
                <form action="">
                  <input class="modal-input" type="hidden" name="id" value=""> 

                  <p><input class="rdm-formularios--input-grande" type="number" id="dinero" name="dinero" value="" placeholder="Cantidad..." ></p>


                  <button class="rdm-boton--plano" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="rdm-boton--plano-resaltado" name="agregar" value="si">Agregar</button>                  
                </form>
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
  var dato1 = button.data('dato1') 
  var dato2 = button.data('dato2') 
  var modal = $(this)
  modal.find('.modal-texto-titulo').text('' + dato1 + '')
  modal.find('.modal-texto-cuerpo').text('' + dato1 + '')
  modal.find('.modal-input').val(dato2)
})
</script>
	
</body>
</html>