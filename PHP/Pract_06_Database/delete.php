<?php
require_once('connection.php');


if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM  ciudades WHERE id = " .  $_GET['id'] . " limit 1 ";
  $res = mysqli_query($mysqli, $query);
  var_dump($res->num_rows);

  if (isset($res) && $res->num_rows == 1) {
    $queryDelete = "DELETE FROM ciudades WHERE id = " .  $_GET['id'] . " limit 1 ";
    $resDelete = mysqli_query($mysqli, $queryDelete);
    if ($resDelete) {
      $value = "Se borro con exito el documento!";
      setcookie('success', $value, time() + (10 * 1));
      header('Location: index.php');
    } else {
      $error = 'Hubo un error al insertar el registro . intenta otra vez';
    }
  } else {
    echo 'not existe';
  }


  // if (!empty($_POST['ciudad']) && !empty($_POST['pais']) && !empty($_POST['habitantes']) && !empty($_POST['superficie'])) {

  //   $ciudad = mysqli_real_escape_string($mysqli, $_POST['ciudad']);
  //   $pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
  //   $habitantes = mysqli_real_escape_string($mysqli, $_POST['habitantes']);
  //   $superficie = mysqli_real_escape_string($mysqli, $_POST['superficie']);
  //   $tieneMetro = !empty($_POST['tieneMetro']) ? $_POST['tieneMetro'] : 0;

  //   $query = "UPDATE  ciudades set ciudad = '$ciudad' , pais = '$pais' , habitantes ='$habitantes' ,superficie='$superficie',tieneMetro='$tieneMetro'  where id = '$id' ";
  //   var_dump($query);
  //   $res = mysqli_query($mysqli, $query);

  //   if ($res) {
  //     header('Location: index.php');
  //   } else {
  //     $error = 'Hubo un error al insertar el registro . intenta otra vez';
  //   }
  // } else {
  //   $error = 'All the fields are required';
  // }
} else {
  //   $query = "SELECT * FROM  ciudades WHERE id = " .  $_GET['id'] . " limit 1 ";
  //   $res = mysqli_query($mysqli, $query);
  //   $city = mysqli_fetch_assoc($res);
}