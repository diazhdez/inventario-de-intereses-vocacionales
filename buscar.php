<?php
//include 'conexion.php';

$mysqli = new mysqli("localhost", "root", "IORIyagami300", "inventario");
echo "<h3>Estudiantes</h3>";
$consulta = "SELECT * FROM jefes where tipo_usuario= ''"
	or die("error al actualizar los datos");
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$consulta = "SELECT * FROM jefes WHERE nombre LIKE '%" . $q . "%' OR institucion LIKE'%" . $q . "%' OR bachillerato LIKE '%" . $q . "%' OR edad LIKE '%" . $q . "' OR ap LIKE '%" . $q . "%' OR carrera LIKE '%" . $q . "%' OR sexo LIKE '%" . $q . "%' OR am LIKE '%" . $q . "%' OR edad LIKE '%" . $q . "%' OR correo_electronico LIKE '%" . $q . "%' OR correo LIKE '%" . $q . "%' "
		or die("error al actualizar los datos");

}
$resultado = $mysqli->query($consulta);



echo "<table class='table table-sm table-bordered table-hover table-condensed'>";

echo "<tr  class='table-primary'>";

echo "<th id= 'nombre'>Nombre</th>";


echo "<th id= 'institucion'>Institucion</th>";
echo "<th id= 'bachillerato'>Bachillerato</th>";
echo "<th id= 'sexo'>Sexo</th>";
echo "<th id= 'carrera'>Carrera a la que se postuló</th>";
echo "<th id= 'edad'>Edad</th>";
echo "<th id= 'correo_electronico'>Correo Electronico</th>";
echo "<th id= 'correo'>Código</th>";
echo "<th >Acciones</th>";

echo "</tr>";

while ($datos = $resultado->fetch_assoc()) {
	echo "<tr>";

	echo "<td>" . $datos['nombre'] . ' ' . $datos['ap'] . ' ' . $datos['am'] . "</td>";

	echo "<td>" . $datos['institucion'] . "</td>";
	echo "<td>" . $datos['bachillerato'] . "</td>";
	echo "<td>" . $datos['sexo'] . "</td>";
	echo "<td>" . $datos['carrera'] . "</td>";
	echo "<td>" . $datos['edad'] . "</td>";
	echo "<td>" . $datos['correo_electronico'] . "</td>";
	echo "<td>" . $datos['correo'] . "</td>";


	echo "<td><button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Acción
    </button>
    <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
      <a class='dropdown-item' href='Highcharts-7.1.2/index.php?id_jefes=" . $datos['id_jefes'] . "''>Consultar</a>
      <a class='dropdown-item' href='eliminar_administrador.php?id_jefes=" . $datos['id_jefes'] . "''>Eliminar</a>
      </div> </td>";
	echo "</tr>";
}
echo "</table>";




?>