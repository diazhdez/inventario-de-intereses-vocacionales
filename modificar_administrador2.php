<?php

include 'conexion.php';
$id_j = $_POST['id_jefes'];

$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];

$correo = $_POST['correo'];
$password = $_POST['pass'];

$query = "UPDATE jefes SET nombre='$nombre',ap='$ap',am='$am',correo='$correo',password = '$password'   WHERE id_jefes='$id_j'";
$resultado = $conn->query($query);
if ($resultado > 0) {

  $modificado = "Datos modificados correctamentes";
  include_once 'administracion_contra.php';
} else {
  echo "ocurrio un error";
}
?>