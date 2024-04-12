<?php

if (isset($_GET['id_jefes'])) {
    $id_jefes = $_GET['id_jefes'];
} else {
    session_start();
    $id_jefes = $_SESSION['id_jefes'];
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Highcharts Example</title>

    <style type="text/css">

    </style>
</head>

<body>
    <center>
        <H1>Inventario de Intereses</H1>

        <br>
        <script src="code/highcharts.js"></script>
        <script src="code/modules/exporting.js"></script>
        <script src="code/modules/export-data.js"></script>

        <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>


        <?php

        require 'conexion.php';
        $consulta = mysqli_query($conn, "SELECT * FROM puntos where id_jefes = '$id_jefes'");

        ?>

        <script type="text/javascript">
            Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'RESULTADOS DE LA EVALUACIÓN'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ['Tecnologias de la Informacion', 'Gastronomia', 'Mantenimiento Industrial', 'Desarrollo de Negocios'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Puntos',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' Puntos'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Reactivos',
                    data: [
                        [<?php $datos = mysqli_fetch_array($consulta);

                        echo $datos['tics']; ?>],
                        [<?php echo $datos['gastronomia']; ?>],

                        [<?php echo $datos['mantenimiento']; ?>],

                        [<?php echo $datos['desarrollo']; ?>],


                    ]
                }]
            });
        </script>
        <?php echo "<a target ='derecha' href='../pdf/index.php?id_jefes=" . $id_jefes . "' ><button class='btn btn-primary' >Ver PDF</button></a> " ?>
        <a target="_top" href="../cerrar_sesion.php"><button class="btn btn-dark boton">Cerrar sesión</button></a>
</body>

</html>