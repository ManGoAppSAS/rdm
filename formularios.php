<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Formularios</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h1 class="rdm-toolbar--titulo">Formularios</h1>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">

    <section class="rdm-formulario">
        
        <p class="rdm-formularios--label"><label for="categoria">Correo electrónico</label></p>
        <p><input class="rdm-formularios--input-grande" type="email" id="nombre" placeholder="Correo"></p>

        <div class="rdm-formularios--submit">            
            <button class="rdm-boton--resaltado">enviar</button>
            <button class="rdm-boton--plano-resaltado">cancelar</button>
        </div>

    </section>

    <input type="search" id="nombre" results="5" placeholder="Buscar...">
    
    <section class="rdm-formulario">

        <p class="rdm-formularios--label"><label for="categoria">Nombre*</label></p>
        <p><input type="text" id="nombre" placeholder="Nombre"></p>
        <p class="rdm-formularios--ayuda">Texto de ayuda</p>

        <p class="rdm-formularios--label"><label for="categoria">Apellido*</label></p>
        <p><input type="text" id="nombre" placeholder="Apellido"></p>

        <p class="rdm-formularios--label"><label for="categoria">Edad</label></p>
        <p><input type="number" id="nombre" placeholder="Edad"></p>

        <p class="rdm-formularios--label"><label for="categoria">Sexo</label></p>
        <p><select id="tipo" name="tipo" required>
            <option value=""></option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select></p>
        
        <p class="rdm-formularios--label"><label for="categoria">Historia</label></p>
        <p><textarea placeholder="Escribe algo aquí"></textarea></p>

        <p class="rdm-formularios--label"><label for="categoria">Imagen</label></p>
        <p><input type="file" id="nombre" placeholder="Edad"></p>

        <div class="rdm-formularios--submit">            
            <button class="rdm-boton--resaltado">enviar</button>
            <button class="rdm-boton--plano-resaltado">cancelar</button>
        </div>

    </section>

    

</main>
	
</body>
</html>