<?
include 'conexion.php';
session_start();
extract($_SESSION);



?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <center>
        <h1>Registro de datos</h1>
        <h3>Bienvenidos al inventario de intereses vocacionales, para continuar rellena los campos con tus datos</h3>
        <form action="modificar_encuestado.php" method="post">
            <?php
            if (isset($datos2)) {
                echo "<div class='alert alert-primary' role='alert'>" . $datos2 . "</div>";
            } else {

            }

            ?>
            <?php

            if (isset($_SESSION['id_jefes'])) {
                $id_jefes = $_SESSION['id_jefes'];

            } else {
                echo "mal todo mal";
            }

            ?>


            <div class="form-group col-md-5">
                Nombre:
                <input class="form-control" id="nombre" name="nombre" type="text" required
                    placeholder="Introduce tu nombre">
            </div>

            <input class="form-control" type="hidden" name="id_jefes" id="id_jefes" value="<?php echo $id_jefes; ?>">

            <div class="form-group col-md-5"> Apellido paterno:
                <input class="form-control" id="ap" name="ap" type="text" required placeholder="Introduce tu apellido">
            </div>

            <div class="form-group col-md-5">
                Apellido materno:
                <input class="form-control" id="am" name="am" type="text" required placeholder="Introduce tu apellido">
            </div>

            <div class="form-group col-md-5">
                Institución de procedencia:
                <input class="form-control" id="institucion" name="institucion" type="text" required
                    placeholder="Introduce tu institucion">
            </div>

            <div class="form-group col-md-5">
                Bachillerato:
                <input class="form-control" id="bachillerato" name="bachillerato" type="text" required
                    placeholder="Introduce tu bachillerato">
            </div>

            <div class="form-group col-md-5">
                Edad:
                <input class="form-control" id="edad" name="edad" type="text" required placeholder="Introduce tu edad">
            </div>

            <div class="form-group col-md-5">
                Sexo:
                <select class="form-control" id="sexo" name="sexo">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>

                </select>
            </div>

            <div class="form-group col-md-5">
                Correo electronico:
                <input class="form-control" id="correo_electronico" name="correo_electronico" type="email" required
                    placeholder="Introduce tu correo">
            </div>

            <div class="form-group col-md-5">
                Carrera a la cual desea postularse:
                <select class="form-control" id="carrera" name="carrera">
                    <option value="Tecnologías de la Información">Tecnologías de la Información</option>
                    <option value="Mantenimiento Industrial">Mantenimiento Industrial</option>
                    <option value="Desarrollo de Negocios">Desarrollo de Negocios</option>
                    <option value="Gastronomia">Gastronomia</option>
                </select>
            </div>

            <input type="submit" class="btn btn-dark" value="Comenzar">

        </form>
        <br>
        <a target="_top" href="cerrar_sesion.php"><button class="btn btn-dark boton">Cancelar</button></a>
    </center>
</body>

</html>