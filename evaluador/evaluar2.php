<?php
session_start();
$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get('America/Mexico_City');
$fecha = date("m/d/y ");
$fechahora = $fecha . "-" . $hora->format('H:i:s');
$array = array();

include "../conexion.php";

$id_subordinado = $_POST['id_jefes'];
$consult = mysqli_query($conn, "SELECT * FROM jefes WHERE id_jefes = '$id_subordinado' ")
  or die("error al actualizar los datos");
$dato = mysqli_fetch_assoc($consult);
$area = $dato['area'];
$departamento = $dato['departamento'];
$nombrecompleto = $dato['nombre'] . " " . $dato['ap'] . " " . $dato['am'];
//echo "subordinado: ".$id_subordinado;
$nfilas = $_POST['filas'];
//echo "numero de resultados: ".$nfilas;
$id_encuesta = $_POST['id_encuesta'];
//echo "encuesta: ".$id_encuesta;
//echo "<br>";
$titulo = $_POST['titulo'];
//echo "encuesta titulo : ".$titulo;
//echo "<br>";

$consulta = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_subordinado = '$id_subordinado' AND id_encuesta = '$id_encuesta'")
  or die("error al actualizar los datos");
if ($datos = mysqli_fetch_assoc($consulta)) {
  echo "<center><h2>Ya evaluaste a este usuario, intenta con otro o otra competencia.</h2></center>";
} else {

  for ($i = 1; $i <= 100; $i++) {
    if (isset($_POST[$i])) {
      $array[$i] = $_POST[$i];
      //echo $array[$i];
      //echo "<br>";	
    }
  }
  $suma = array_sum($array);
  //echo "los puntos del subordinado son: ".$suma;
//echo "<br>";
  $m = 5 * $nfilas;
  //echo $m." puntos maximos";
  //echo "<br>";
  $res = ($suma / $m) * 100;
  // echo round($res,1);
  //echo "<br>";
  if ($res <= 20) {
    $resultado1 = 'Nada productivo';
    //echo $resultado1;
    $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha')";
    $result = $conn->query($sql);
  } else if (($res >= 21.0) and ($res <= 35.9)) {
    $resultado1 = "Nada productivo";
    //echo $resultado1;
    $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha')";
    $result = $conn->query($sql);
  } else if (($res >= 36) and ($res <= 51.9)) {
    $resultado1 = "Poco productivo";
    //echo $resultado1;
    $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha')";
    $result = $conn->query($sql);
  } else if (($res >= 52) and ($res <= 67.9)) {
    $resultado1 = "Regular";
    //echo $resultado1;
    $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha')";
    $result = $conn->query($sql);
  } else if (($res >= 68) and ($res <= 83.9)) {
    $resultado1 = "Productivo";
    //echo $resultado1;
    $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha')";
    $result = $conn->query($sql);
  } else if (($res >= 84) and ($res <= 100)) {
    $resultado1 = "Muy productivo";
    //echo $resultado1;
    $sql = "INSERT INTO respuestas (id_subordinado,id_encuesta,area,departamento,titulo,opcion,opcion2,fecha) VALUES('$id_subordinado','$id_encuesta','$area','$departamento','$titulo','$res','$resultado1','$fecha')";
    $result = $conn->query($sql);
  }

  $consulta2 = mysqli_query($conn, "SELECT * FROM respuestas_areas WHERE id_subordinado = '$id_subordinado'")
    or die("error al actualizar los datos");
  $rowcnt = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_subordinado = '$id_subordinado'")
    or die("error al actualizar los datos");
  $datos = mysqli_fetch_assoc($consulta2);
  if (isset($datos)) {
    $consulta3 = mysqli_query($conn, "SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
      or die("error al actualizar los datos");
    $datos3 = mysqli_fetch_assoc($consulta3);
    //echo "soy la suma de los promedios conseguidos en la tabla de respuestas en actualizar".$datos3['total'];
    $row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/
    $promedio = $datos3['total'] / $row_cnt;
    //echo $promedio."soy el promemdio en actualizacion <br>";

    /*$sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombre','$area','$promedio','$valoracion','$fecha')";
                  $result = $conn->query($sql);*/
    if ($promedio <= 20) {
      $resultado1 = 'Nada productivo';
      //echo $resultado1;
      $query = "UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 21.0) and ($promedio <= 35.9)) {
      $resultado1 = "Nada productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 36) and ($promedio <= 51.9)) {
      $resultado1 = "Poco productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 52) and ($promedio <= 67.9)) {
      $resultado1 = "Regular";
      //echo $resultado1;
      $query = "UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 68) and ($promedio <= 83.9)) {
      $resultado1 = "Productivo";
      ////echo $resultado1;
      $query = "UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 84) and ($promedio <= 100)) {
      $resultado1 = "Muy productivo";
      ////echo $resultado1;
      $query = "UPDATE respuestas_areas SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    }
  } else {
    $consulta3 = mysqli_query($conn, "SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
      or die("error al actualizar los datos");
    $datos3 = mysqli_fetch_assoc($consulta3);
    $total2 = $datos3['total'];
    $row_cnt = $rowcnt->num_rows;
    /*echo "nummero de resultados ".$row_cnt;
    echo "<br>";
    echo $sumar['total'];*/
    $promedio = $datos3['total'] / $row_cnt;
    /*$sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombre','$area','$promedio','$valoracion','$fecha')";
                  $result = $conn->query($sql);*/
    if ($promedio <= 20) {
      $resultado1 = 'Nada productivo';
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 21.0) and ($promedio <= 35.9)) {
      $resultado1 = "Nada productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 36) and ($promedio <= 51.9)) {
      $resultado1 = "Poco productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 52) and ($promedio <= 67.9)) {
      $resultado1 = "Regular";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 68) and ($promedio <= 83.9)) {
      $resultado1 = "Productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 84) and ($promedio <= 100)) {
      $resultado1 = "Muy productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    }
  }

  unset($promedio);
  unset($row_cnt2);
  unset($datos3);
  unset($total2);
  unset($consulta2);

  /*aqui esta lo del departamentos------------------------------------------------------------------------------------------------------------------*/

  $consulta2 = mysqli_query($conn, "SELECT * FROM respuestas_departamentos WHERE id_subordinado = '$id_subordinado'")
    or die("error al actualizar los datos");
  $rowcnt = mysqli_query($conn, "SELECT * FROM respuestas WHERE id_subordinado = '$id_subordinado'")
    or die("error al actualizar los datos");
  $datos = mysqli_fetch_assoc($consulta2);
  if (isset($datos)) {
    $consulta3 = mysqli_query($conn, "SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
      or die("error al actualizar los datos");
    $datos3 = mysqli_fetch_assoc($consulta3);
    //echo "soy la suma de los promedios conseguidos en la tabla de respuestas en actualizar".$datos3['total'];
    $row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/
    $promedio = $datos3['total'] / $row_cnt;
    //echo $promedio."soy el promemdio en actualizacion <br>";

    /*$sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombre','$area','$promedio','$valoracion','$fecha')";
                  $result = $conn->query($sql);*/
    if ($promedio <= 20) {
      $resultado1 = 'Nada productivo';
      //echo $resultado1;
      $query = "UPDATE respuestas_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 21.0) and ($promedio <= 35.9)) {
      $resultado1 = "Nada productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 36) and ($promedio <= 51.9)) {
      $resultado1 = "Poco productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 52) and ($promedio <= 67.9)) {
      $resultado1 = "Regular";
      //echo $resultado1;
      $query = "UPDATE respuestas_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 68) and ($promedio <= 83.9)) {
      $resultado1 = "Productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 84) and ($promedio <= 100)) {
      $resultado1 = "Muy productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_departamentos SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE id_subordinado='$id_subordinado'";
      $resultado = $conn->query($query);
    }
  } else {
    $consulta3 = mysqli_query($conn, "SELECT SUM(opcion) as total FROM respuestas WHERE id_subordinado = '$id_subordinado'")
      or die("error al actualizar los datos");
    $datos3 = mysqli_fetch_assoc($consulta3);
    $total2 = $datos3['total'];
    $row_cnt = $rowcnt->num_rows;
    /*echo "nummero de resultados ".$row_cnt;
    echo "<br>";
    echo $sumar['total'];*/
    $promedio = $datos3['total'] / $row_cnt;
    /*$sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombre','$area','$promedio','$valoracion','$fecha')";
                  $result = $conn->query($sql);*/
    if ($promedio <= 20) {
      $resultado1 = 'Nada productivo';
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_departamentos (id_subordinado,nombre,departamento,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 21.0) and ($promedio <= 35.9)) {
      $resultado1 = "Nada productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_departamentos (id_subordinado,nombre,departamento,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 36) and ($promedio <= 51.9)) {
      $resultado1 = "Poco productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_departamentos (id_subordinado,nombre,departamento,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 52) and ($promedio <= 67.9)) {
      $resultado1 = "Regular";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_departamentos (id_subordinado,nombre,departamento,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 68) and ($promedio <= 83.9)) {
      $resultado1 = "Productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_departamentos (id_subordinado,nombre,departamento,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 84) and ($promedio <= 100)) {
      $resultado1 = "Muy productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_departamentos (id_subordinado,nombre,departamento,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombrecompleto','$departamento','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    }
  }

  unset($promedio);
  unset($row_cnt);
  unset($datos3);
  unset($total2);
  unset($consulta2);



  /*aqui van los generales-------------------------------------------------------------------------------------------------------------------*/






  $consulta2 = mysqli_query($conn, "SELECT * FROM respuestas_generales WHERE area = '$area'")
    or die("error al actualizar los datos");
  $rowcnt = mysqli_query($conn, "SELECT * FROM respuestas_areas WHERE area = '$area'")
    or die("error al actualizar los datos");
  $datos = mysqli_fetch_assoc($consulta2);
  if (isset($datos)) {
    $consulta3 = mysqli_query($conn, "SELECT SUM(promedio) as total FROM respuestas_areas WHERE area = '$area'")
      or die("error al actualizar los datos");
    $datos3 = mysqli_fetch_assoc($consulta3);
    //echo "soy la suma de los promedios conseguidos en la tabla de respuestas en actualizar".$datos3['total'];
    $row_cnt = $rowcnt->num_rows; //echo "soy el row cont".$row_cnt."<br>"; 
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/
    $promedio = $datos3['total'] / $row_cnt;
    //echo $promedio."soy el promemdio en actualizacion <br>";

    /*$sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombre','$area','$promedio','$valoracion','$fecha')";
                  $result = $conn->query($sql);*/
    if ($promedio <= 20) {
      $resultado1 = 'Nada productivo';
      //echo $resultado1;
      $query = "UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 21.0) and ($promedio <= 35.9)) {
      $resultado1 = "Nada productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 36) and ($promedio <= 51.9)) {
      $resultado1 = "Poco productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 52) and ($promedio <= 67.9)) {
      $resultado1 = "Regular";
      //echo $resultado1;
      $query = "UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 68) and ($promedio <= 83.9)) {
      $resultado1 = "Productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
      $resultado = $conn->query($query);
    } else if (($promedio >= 84) and ($promedio <= 100)) {
      $resultado1 = "Muy productivo";
      //echo $resultado1;
      $query = "UPDATE respuestas_generales SET promedio='$promedio',valoracion='$resultado1',fecha='$fecha' WHERE area='$area'";
      $resultado = $conn->query($query);
    }
  } else {
    $consulta3 = mysqli_query($conn, "SELECT SUM(promedio) as total FROM respuestas_areas WHERE area = '$area'")
      or die("error al actualizar los datos");
    $datos3 = mysqli_fetch_assoc($consulta3);
    $total2 = $datos3['total'];
    $row_cnt = $rowcnt->num_rows;
    /*echo "nummero de resultados ".$row_cnt;
    echo "<br>";
    echo $sumar['total'];*/
    $promedio = $datos3['total'] / $row_cnt;
    /*$sql = "INSERT INTO respuestas_areas (id_subordinado,nombre,area,promedio,valoracion,fecha) VALUES('$id_subordinado','$nombre','$area','$promedio','$valoracion','$fecha')";
                  $result = $conn->query($sql);*/
    if ($promedio <= 20) {
      $resultado1 = 'Nada productivo';
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha) VALUES('$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 21.0) and ($promedio <= 35.9)) {
      $resultado1 = "Nada productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha) VALUES('$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 36) and ($promedio <= 51.9)) {
      $resultado1 = "Poco productivo";
      // echo $resultado1;
      $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha) VALUES('$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 52) and ($promedio <= 67.9)) {
      $resultado1 = "Regular";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha) VALUES('$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 68) and ($promedio <= 83.9)) {
      $resultado1 = "Productivo";
      //echo $resultado1;
      $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha) VALUES('$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    } else if (($promedio >= 84) and ($promedio <= 100)) {
      $resultado1 = "Muy productivo";
      // echo $resultado1;
      $sql = "INSERT INTO respuestas_generales (area,promedio,valoracion,fecha) VALUES('$area','$promedio','$resultado1','$fecha')";
      $result = $conn->query($sql);
    }
  }
  mysqli_close($conn);
  ?>

  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Evaluar 2</title>
  </head>

  <body>
    <?php
    echo "<center><h2>Gracias por evaluar a este usuario.</h2></center>";

    exit();
}
?>
</body>

</html>