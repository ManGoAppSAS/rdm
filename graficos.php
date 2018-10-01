<?php
//declaro las variables que pasan por formulario o URL
date_default_timezone_set('America/Bogota');

if(isset($_POST['fecha_inicio'])) $fecha_inicio = $_POST['fecha_inicio']; elseif(isset($_GET['fecha_inicio'])) $fecha_inicio = $_GET['fecha_inicio']; else $fecha_inicio = date('Y-m-d');
if(isset($_POST['hora_inicio'])) $hora_inicio = $_POST['hora_inicio']; elseif(isset($_GET['hora_inicio'])) $hora_inicio = $_GET['hora_inicio']; else $hora_inicio = "00:00";

if(isset($_POST['fecha_fin'])) $fecha_fin = $_POST['fecha_fin']; elseif(isset($_GET['fecha_fin'])) $fecha_fin = $_GET['fecha_fin']; else $fecha_fin = date('Y-m-d');
if(isset($_POST['hora_fin'])) $hora_fin = $_POST['hora_fin']; elseif(isset($_GET['hora_fin'])) $hora_fin = $_GET['hora_fin']; else $hora_fin = "23:59";

if(isset($_POST['rango'])) $rango = $_POST['rango']; elseif(isset($_GET['rango'])) $rango = $_GET['rango']; else $rango = "hoy";
?>

<?php
//calculo el rango de la jornada segun las horas de inicio y fin
$jornada_hora_inicio = "23:00";
$jornada_hora_fin = "22:00";

if ($jornada_hora_inicio < $jornada_hora_fin)
{
    $jornada_duracion = round((strtotime($jornada_hora_inicio) - strtotime($jornada_hora_fin)) / 3600);
    $jornada_desde = 0;
    $jornada_hasta = 0;
}
else
{
    $jornada_duracion = 24 - (round((strtotime($jornada_hora_inicio) - strtotime($jornada_hora_fin)) / 3600));
    $jornada_desde = -12;
    $jornada_hasta = 12;    
}
?>

<?php
//concateno la fecha y la hora en una sola variable
$desde = "$fecha_inicio $hora_inicio";
$hasta = "$fecha_fin $hora_fin";

$desde = date('Y-m-d H:i:s', strtotime($desde));
$hasta = date('Y-m-d H:i:s', strtotime($hasta));
?>

<?php 
//calculo el periodo anterior segun el rango elegido
if ($rango == "hoy")
{
    $desde_anterior = date('Y-m-d 00:00:00', strtotime('yesterday'));
    $hasta_anterior = date('Y-m-d 23:59:59', strtotime('yesterday'));
    $rango_anterior = "día anterior";
    $rango_texto = date('d/m/y', strtotime('now')) . ", " . date('g:ia', strtotime($desde)) . " - " . date('g:ia', strtotime($hasta));
}
else
{
    if ($rango == "jornada")
    {
        $desde_anterior = date('Y-m-d ' . $jornada_hora_inicio .':00', strtotime('- 1 day' . $jornada_desde . 'hour'));
        $hasta_anterior = date('Y-m-d ' . $jornada_hora_fin .':59', strtotime('- 1 day' . $jornada_hasta . 'hour'));
        $rango_anterior = "jornada anterior";
        $rango_texto = date('d/m/y', strtotime($jornada_desde . 'hour')) . ", " . date('ga', strtotime($jornada_hora_inicio)) . " - " . date('d/m/y', strtotime($jornada_hasta . 'hour')) . ", " . date('ga', strtotime($jornada_hora_fin));

        $desde = date('Y-m-d ' . $jornada_hora_inicio .':00', strtotime($jornada_desde . 'hours'));
        $hasta = date('Y-m-d ' . $jornada_hora_fin .':59', strtotime($jornada_hasta . 'hours'));
    }
    else
    {
        if ($rango == "semana")
        {
            $desde_anterior = date('Y-m-d 00:00:00', strtotime('Last Monday - 1 week'));
            $hasta_anterior = date('Y-m-d 23:59:59', strtotime('Last Monday - 1 day'));
            $rango_anterior = "semana anterior";
            $rango_texto = date('d/m/y', strtotime('last monday')) . " - " . date('d/m/y', strtotime('next monday -1 day'));

            $desde = date('Y-m-d 00:00:00', strtotime('Last Monday'));
            $hasta = date('Y-m-d 23:59:59', strtotime('next monday -1 day'));
        }
        else
        {
            if ($rango == "mes")
            {
                $desde_anterior = date('Y-m-d 00:00:00', strtotime('first day of this month - 1 month'));
                $hasta_anterior = date('Y-m-d 23:59:59', strtotime('last day of this month - 1 month'));
                $rango_anterior = "mes anterior";
                $rango_texto = date('d/m/y', strtotime('first day of this month')) . " - " . date('d/m/y', strtotime('last day of this month'));

                $desde = date('Y-m-d 00:00:00', strtotime('first day of this month'));
                $hasta = date('Y-m-d 23:59:59', strtotime('last day of this month'));
            }
            else
            {
                $desde_anterior = "";
                $hasta_anterior = "";
                $rango_anterior = "no aplica";
                $rango_texto = date('d/m/y, g:ia', strtotime($desde)) . " - " . date('d/m/y, g:ia', strtotime($hasta));

                $desde = "$fecha_inicio $hora_inicio";
                $hasta = "$fecha_fin $hora_fin";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reglas de diseño ManGo! - Gráficos</title>
	<link rel="stylesheet" href="https://www.mangoapp.co/a-recursos/css/estilos.css">
    <link rel="stylesheet" href="css/estilos.css">

	<style type="text/css">
    #grafico1 {
        width: 100%;
        height: 10em;
        margin: 0 auto
    }
    </style>

    <script src="graficos/code/highcharts.js"></script>
	<script src="graficos/code/modules/exporting.js"></script>
</head>
<body>

<header class="rdm-toolbar--contenedor">
	<div class="rdm-toolbar--fila">
		<div class="rdm-toolbar--izquierda">
			<a href="index.php"><div class="rdm-toolbar--icono"><i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i></div></a>
			<h1 class="rdm-toolbar--titulo">Graficos</h1>
		</div>
	</div>
</header>

<main class="rdm--contenedor-toolbar">

    <section class="rdm-tarjeta">

        <div class="rdm-tarjeta--primario-largo">
            <h1 class="rdm-tarjeta--titulo-largo"><?php echo ucfirst($rango); ?></h1>
            <h2 class="rdm-tarjeta--subtitulo-largo"><?php echo "$rango_texto"; ?></h2>
            <h2 class="rdm-tarjeta--dashboard-titulo-positivo">$274.350</h2>
            <h2 class="rdm-tarjeta--dashboard-subtitulo-positivo"><i class="zmdi zmdi-long-arrow-up"></i> 22% <?php echo ucfirst($rango_anterior); ?> ($225.110)</h2>
        </div>

        <div class="rdm-tarjeta--dashboard-cuerpo">
            
            <div id="grafico1"></div>
                
                <script type="text/javascript">

                Highcharts.chart('grafico1', {

                    credits: {
                        enabled: false
                    },

                    title: {
                        text: null
                    },

                    subtitle: {
                        text: null
                    },

                    chart: {
                        type: 'area',
                        borderWidth: 0,
                        plotBorderWidth: 0,
                        marginTop: 0
                    },

                    navigation: {
                        buttonOptions: {
                            enabled: false
                        }
                    },

                    xAxis: {

                        labels: {
                            enabled: false,

                            formatter:function(){
                           
                                if((this.isFirst == true) || (this.isLast == true))
                                {
                                   return this.value;
                                }
                                
                            }
                        },

                        categories: [


                        '04pm',
                        '05pm',
                        '06pm',
                        '07pm',
                        '08pm',
                        '09pm',
                        '10pm',
                        '11pm',

                        ]
                    },
                    
                    yAxis: {
                        gridLineColor: null,

                        title: {
                            text: null
                        },

                        labels: {
                            enabled: false,
                            formatter: function() {
                            return '$ ' + this.value;
                            }
                        },
                    },

                    legend: {
                        enabled: false,
                        floating: true,
                        layout: 'vertical',
                        align: 'right',

                        verticalAlign: 'middle'
                    },

                    tooltip: {
                        valueSuffix: 'mil',
                        backgroundColor: '#f5f5f5',
                        style: {
                             color: '#222'
                          },
                        borderColor: '#f5f5f5',
                        borderRadius: 5,
                        borderWidth: 1,
                        crosshairs: true,
                        formatter: function() {
                        return this.x + '<br>'  + this.y + ' ventas';
                        }
                    },                    

                    plotOptions: {
                        series: {
                            color: '#009688',
                            marker: {
                                enabled: false,
                            },
                            fillOpacity: 0.1,
                            lineWidth: 1,
                            radius: 0,
                        }
                    },


                    
                    series: [{

                        name: 'Ventas',
                        data: [


                        3,
                        6,
                        10,
                        12,
                        7,
                        25,
                        13,
                        4,



                        ]



                    }

                    ],



                });
                </script>



            
                
                




        </div>

        

    </section>





















    <section class="rdm-tarjeta">

        <div class="rdm-tarjeta--primario-largo">
            <h1 class="rdm-tarjeta--titulo-largo">Gastos <?php echo ucfirst($rango); ?></h1>
            <h2 class="rdm-tarjeta--subtitulo-largo"><?php echo "$rango_texto"; ?></h2>
            <h2 class="rdm-tarjeta--dashboard-titulo-negativo">$274.350</h2>
        </div>

        <div class="rdm-tarjeta--dashboard-cuerpo">


        </div>

    </section>



    <h2 class="rdm-lista--titulo-largo">Periodos</h2>

    <section class="rdm-lista-sencillo">
        
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?fecha_inicio=<?php echo date('Y-m-d', strtotime($jornada_desde . 'hour')); ?>&hora_inicio=<?php echo "$jornada_hora_inicio"; ?>&fecha_fin=<?php echo date('Y-m-d', strtotime($jornada_hasta . 'hour')); ?>&hora_fin=<?php echo "$jornada_hora_fin"; ?>&rango=jornada">

            <article class="rdm-lista--item-sencillo">
                <div class="rdm-lista--izquierda-sencillo">
                    <div class="rdm-lista--contenedor">
                        <div class="rdm-lista--icono"><i class="zmdi zmdi-time-countdown zmdi-hc-2x"></i></div>
                    </div>
                    <div class="rdm-lista--contenedor">
                        <h2 class="rdm-lista--titulo">Jornada</h2>
                        <h2 class="rdm-lista--texto-secundario"><?php echo date('d/m/y', strtotime($jornada_desde . 'hour')); ?>, <?php echo date('ga', strtotime($jornada_hora_inicio)); ?> - <?php echo date('d/m/y', strtotime($jornada_hasta . 'hour')); ?>, <?php echo date('ga', strtotime($jornada_hora_fin)); ?></h2>
                    </div>
                </div>
                
            </article>

        </a>

        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?fecha_inicio=<?php echo date('Y-m-d', strtotime('now')); ?>&hora_inicio=00:00&fecha_fin=<?php echo date('Y-m-d', strtotime('now')); ?>&hora_fin=23:59&rango=hoy">

            <article class="rdm-lista--item-sencillo">
                <div class="rdm-lista--izquierda-sencillo">
                    <div class="rdm-lista--contenedor">
                        <div class="rdm-lista--icono"><i class="zmdi zmdi-calendar-alt zmdi-hc-2x"></i></div>
                    </div>
                    <div class="rdm-lista--contenedor">
                        <h2 class="rdm-lista--titulo">Hoy</h2>
                        <h2 class="rdm-lista--texto-secundario"><?php echo date('d/m/y', strtotime('now')); ?>, 12:00am - 11:59pm</h2>
                    </div>
                </div>
                
            </article>

        </a>

        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?fecha_inicio=<?php echo date('Y-m-d', strtotime('last monday')); ?>&hora_inicio=00:00&fecha_fin=<?php echo date('Y-m-d', strtotime('next monday -1 day')); ?>&hora_fin=23:59&rango=semana">

            <article class="rdm-lista--item-sencillo">
                <div class="rdm-lista--izquierda-sencillo">
                    <div class="rdm-lista--contenedor">
                        <div class="rdm-lista--icono"><i class="zmdi zmdi-calendar-note zmdi-hc-2x"></i></div>
                    </div>
                    <div class="rdm-lista--contenedor">
                        <h2 class="rdm-lista--titulo">Semana</h2>
                        <h2 class="rdm-lista--texto-secundario"><?php echo date('d/m/y', strtotime('last monday')); ?> - <?php echo date('d/m/y', strtotime('next monday -1 day')); ?></h2>
                    </div>
                </div>
                
            </article>

        </a>

        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?fecha_inicio=<?php echo date('Y-m-d', strtotime('first day of this month')); ?>&hora_inicio=00:00&fecha_fin=<?php echo date('Y-m-d', strtotime('last day of this month')); ?>&hora_fin=23:59&rango=mes">

            <article class="rdm-lista--item-sencillo">
                <div class="rdm-lista--izquierda-sencillo">
                    <div class="rdm-lista--contenedor">
                        <div class="rdm-lista--icono"><i class="zmdi zmdi-calendar-check zmdi-hc-2x"></i></div>
                    </div>
                    <div class="rdm-lista--contenedor">
                        <h2 class="rdm-lista--titulo">Mes</h2>
                        <h2 class="rdm-lista--texto-secundario"><?php echo date('d/m/y', strtotime('first day of this month')); ?> - <?php echo date('d/m/y', strtotime('last day of this month')); ?></h2>
                    </div>
                </div>
                
            </article>

        </a>

    </section>





    <section class="rdm-formulario">

        <form action="graficos.php">

            <input type="hidden" name="rango" value="consulta">

            <p class="rdm-formularios--label"><label for="fecha_inicio">Desde*</label></p>
            
            <div class="rdm-formularios--fecha">
                <p><input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo "$fecha_inicio"; ?>" placeholder="Fecha" required></p>
                <p class="rdm-formularios--ayuda">Fecha</p>
            </div>
            <div class="rdm-formularios--fecha">
                <p><input type="time" id="hora_inicio" name="hora_inicio" value="<?php echo "$hora_inicio"; ?>" placeholder="Hora" required></p>
                <p class="rdm-formularios--ayuda">Hora</p>
            </div>           

            <p class="rdm-formularios--label" style="margin-top: 0"><label for="fecha_fin">Hasta*</label></p>
            
            <div class="rdm-formularios--fecha">
                <p><input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo "$fecha_fin"; ?>" placeholder="Fecha" required></p>
                <p class="rdm-formularios--ayuda">Fecha</p>
            </div>
            <div class="rdm-formularios--fecha">
                <p><input type="time" id="hora_fin" name="hora_fin" value="<?php echo "$hora_fin"; ?>" placeholder="Hora" required></p>
                <p class="rdm-formularios--ayuda">Hora</p>
            </div>

            <div class="rdm-formularios--submit">            
                <button type="submit" class="rdm-boton--plano-resaltado">Mostrar</button>
            </div>

        </form>

    </section>



	















	<section class="rdm-lista--porcentaje">		

        <article class="rdm-lista--item-porcentaje">
            <div>
                <div class="rdm-lista--izquierda-porcentaje">
                    <h2 class="rdm-lista--titulo-porcentaje">Item porcentaje</h2>
                    <h2 class="rdm-lista--texto-secundario-porcentaje">90 ($90.000)</h2>
                </div>
                <div class="rdm-lista--derecha-porcentaje">
                    <h2 class="rdm-lista--texto-secundario-porcentaje">90.0%</h2>
                </div>
            </div>
            
            <div class="rdm-lista--linea-pocentaje-fondo" style="background-color: #B2DFDB">
                <div class="rdm-lista--linea-pocentaje-relleno" style="width: 90%; background-color: #009688;"></div>
            </div>
        </article>

        <article class="rdm-lista--item-porcentaje">
            <div>
                <div class="rdm-lista--izquierda-porcentaje">
                    <h2 class="rdm-lista--titulo-porcentaje">Item porcentaje</h2>
                    <h2 class="rdm-lista--texto-secundario-porcentaje">50 ($50.000)</h2>
                </div>
                <div class="rdm-lista--derecha-porcentaje">
                    <h2 class="rdm-lista--texto-secundario-porcentaje">50.0%</h2>
                </div>
            </div>
            
            <div class="rdm-lista--linea-pocentaje-fondo" style="background-color: #B2DFDB">
                <div class="rdm-lista--linea-pocentaje-relleno" style="width: 50%; background-color: #009688;"></div>
            </div>
        </article>

        <article class="rdm-lista--item-porcentaje">
            <div>
                <div class="rdm-lista--izquierda-porcentaje">
                    <h2 class="rdm-lista--titulo-porcentaje">Item porcentaje</h2>
                    <h2 class="rdm-lista--texto-secundario-porcentaje">5 ($5.000)</h2>
                </div>
                <div class="rdm-lista--derecha-porcentaje">
                    <h2 class="rdm-lista--texto-secundario-porcentaje">5.0%</h2>
                </div>
            </div>
            
            <div class="rdm-lista--linea-pocentaje-fondo" style="background-color: #FFCDD2">
                <div class="rdm-lista--linea-pocentaje-relleno" style="width: 5%; background-color: #F44336;"></div>
            </div>
        </article>



	</section>


    <section class="rdm-tarjeta">

        <div class="rdm-tarjeta--primario-largo">
            <h1 class="rdm-tarjeta--titulo-largo">Título largo</h1>
            <h2 class="rdm-tarjeta--subtitulo-largo">Rango: <?php echo ($rango); ?></h2>
            <h2 class="rdm-tarjeta--subtitulo-largo">Desde: <?php echo "$desde"; ?></h2>
            <h2 class="rdm-tarjeta--subtitulo-largo">Hasta: <?php echo "$hasta"; ?></h2>
            <h2 class="rdm-tarjeta--subtitulo-largo">Rango: <?php echo ($rango_anterior); ?></h2>
            <h2 class="rdm-tarjeta--subtitulo-largo">Desde anterior: <?php echo "$desde_anterior"; ?></h2>
            <h2 class="rdm-tarjeta--subtitulo-largo">Hasta anterior: <?php echo "$hasta_anterior"; ?></h2>




            




        </div>

        <div class="rdm-tarjeta--cuerpo">


        </div>

    </section>

	

</main>	
	
</body>
</html>