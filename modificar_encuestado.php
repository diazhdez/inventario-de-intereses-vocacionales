<?php

include 'conexion.php';
#if ($conn){
#echo "conectado";
#}


$id_jefes = $_POST['id_jefes'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$institucion = $_POST['institucion'];
$bachillerato = $_POST['bachillerato'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$correo_electronico = $_POST['correo_electronico'];
$carrera = $_POST['carrera'];


$query = "UPDATE jefes SET nombre='$nombre',ap='$ap',am='$am',institucion='$institucion',bachillerato='$bachillerato',edad = '$edad',sexo = '$sexo',correo_electronico='$correo_electronico',carrera = '$carrera'   WHERE id_jefes='$id_jefes'";
$resultado = $conn->query($query);
if ($resultado > 0) {

  $modificado = "Datos modificados correctamente";
  #echo "datos guardatos";
  include_once 'instrucciones.php';
} else {
  echo "ocurrio un error";
}
?>