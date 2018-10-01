<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Vacio</title>
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
			<h2 class="rdm-toolbar--titulo">Notificaciones</h2>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">

    <button id="demo_button" class="rdm-boton--resaltado" >Mostrar notificación</button>

</main>

<footer>
	

</footer>

<script type="text/javascript">
    window.onload = function(){
        Push.Permission.request();
    }

    Push.config({
        serviceWorker: './service-worker.js', // Sets a custom service worker script
        fallback: function(payload) {
        }
    });

    Push.create('Notificación', {
        body: 'Notifación nueva',
        icon: 'img/a1.jpg',
        link: '/#',
        timeout: 5000,
        vibrate: [200, 100, 200, 100, 200, 100, 200],
        onClick: function () {
            window.location = "index.php";
            this.close();
        }
        
    });

    function demo() {
        Push.create('Notificación', {
            body: 'Notifación nueva',
            icon: 'img/a1.jpg',
            link: '/#',
            timeout: 5000,
            vibrate: [200, 100, 200, 100, 200, 100, 200],
            onClick: function () {
                window.location = "index.php";
                this.close();
            }
            
        });
    }

    $(document).ready(function() {
        $("#demo_button").click(demo);
    });
</script>
	
</body>
</html>