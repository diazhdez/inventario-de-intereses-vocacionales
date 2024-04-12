<?php
session_start();

$id_jefes = $_SESSION['id_jefes'];

?>
<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/radio.css">
  <title>Cuestionario</title>
  <link rel="stylesheet" type="text/css" href="css/radio.css">
</head>
<style type="text/css">
  .tg {
    border-collapse: collapse;
    border-spacing: 0;
    border: none;
    border-color: #9ABAD9;
  }

  .tg td {
    font-family: Arial, sans-serif;
    font-size: 14px;
    padding: 10px 5px;
    border-style: solid;
    border-width: 0px;
    overflow: hidden;
    word-break: normal;
    border-color: #9ABAD9;
    color: #444;
    background-color: #EBF5FF;
  }

  .tg th {
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    padding: 10px 5px;
    border-style: solid;
    border-width: 0px;
    overflow: hidden;
    word-break: normal;
    border-color: #9ABAD9;
    color: #fff;
    background-color: #409cff;
  }

  .tg .tg-5tbv {
    background-color: #D2E4FC;
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: left;
    vertical-align: top
  }

  .tg .tg-bnwb {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: left;
    vertical-align: top
  }

  .tg .tg-zpid {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    background-color: #95c8fb;
    color: #000000;
    border-color: inherit;
    text-align: center;
    vertical-align: top
  }

  .tg .tg-lb2r {
    background-color: #D2E4FC;
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: center;
    vertical-align: top
  }

  .tg .tg-ge37 {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif !important;
    ;
    color: #000000;
    border-color: inherit;
    text-align: center;
    vertical-align: top
  }

  .tg .tg-svo0 {
    background-color: #D2E4FC;
    border-color: inherit;
    text-align: center;
    vertical-align: top
  }
</style>

<body>
  <center>
    <h2>Bienvenidos al inventario de intereses</h2>
    <h3>Lee detenidamente cada enunciado y selecciona la que mas te agrade</h3>
    <img src="img/logo.png" style="position: absolute; top: 0; left: 0;" />
    <br>

    <form action="evalua_orientacion.php" method="post">
      <input type="hidden" name="id_jefes" id="id_jefes" value="<?php echo $id_jefes; ?>">
      <table class="tg table table-hover">
        <tr>
          <th class="tg-zpid"></th>
          <th class="tg-zpid">Opción 1</th>
          <th class="tg-zpid">Opción 2</th>
        </tr>
        <tr>
          <td class="tg-5tbv">Opción 1° Me interesa aprender a reparar una computadora<br><br>Opción 2° Me interesa
            saber la forma de elaboración de distintos tipos de pan</td>
          <td class="tg-lb2r"><input class="rad" type="radio" value="1" name="uno"></td>
          <td class="tg-lb2r"><input class="rad" type="radio" value="2" name="uno"></td>
        </tr>
        <tr>
          <td class="tg-bnwb">Opción 1° Me interesa capacitarme para desarrollar aplicaciones móviles<br><br>Opción 2°
            Me llama la atención aprender a reparar máquinas y equipos industriales</td>
          <td class="tg-ge37"><input class="rad" type="radio" value="1" name="dos"></td>
          <td class="tg-ge37"><input class="rad" type="radio" value="3" name="dos"></td>
        </tr>
        <tr>
          <td class="tg-5tbv">Opción 1° Me interesa capacitarme para crear páginas web<br><br>Opción 2° Me llama la
            atención desarrollar la habilidad para realizar ventas</td>
          <td class="tg-svo0"><input class="rad" type="radio" value="1" name="tres"></td>
          <td class="tg-svo0"><input class="rad" type="radio" value="4" name="tres"></td>
        </tr>
      </table>

      <button class="btn btn-primary boton ">Evaluar</button>


    </form>
    <br>


  </center>

</body>

</html>