<?php
session_start();

$id_jefes = $_SESSION['id_jefes'];
echo $id_jefes . "soy jefes";
include 'conexion.php';
$query = mysqli_query($mysqli, "SELECT * FROM jefes WHERE id_jefes ='$id_jefes'");

$consulta1 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes'");
$row_cnt1 = $consulta1->num_rows;
echo $row_cnt1;
$consulta2 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Gastronomía'");
$row_cnt2 = $consulta2->num_rows;
echo $row_cnt2;
$consulta3 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Mantenimiento Industrial'");
$row_cnt3 = $consulta3->num_rows;
echo $row_cnt3;
$consulta4 = mysqli_query($mysqli, "SELECT * FROM respuestas WHERE id_jefes ='$id_jefes' AND carrera = 'Desarrollo de negocios'");
$row_cnt4 = $consulta4->num_rows;
echo $row_cnt4;