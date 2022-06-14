<?php
require_once('connection.php');

if (!empty($_POST['submit'])) {
  if (!empty($_POST['ciudad']) && !empty($_POST['pais']) && !empty($_POST['habitantes']) && !empty($_POST['superficie'])) {

    $ciudad = mysqli_real_escape_string($mysqli, $_POST['ciudad']);
    $pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
    $habitantes = mysqli_real_escape_string($mysqli, $_POST['habitantes']);
    $superficie = mysqli_real_escape_string($mysqli, $_POST['superficie']);
    $tieneMetro = !empty($_POST['tieneMetro']) ? $_POST['tieneMetro'] : 0;
    $id = $_GET['id'];

    $query = "UPDATE  ciudades set ciudad = '$ciudad' , pais = '$pais' , habitantes ='$habitantes' ,superficie='$superficie',tieneMetro='$tieneMetro'  where id = '$id' ";
    var_dump($query);
    $res = mysqli_query($mysqli, $query);

    if ($res) {
      $value = "Se actualizo con exito el documento!";
      setcookie('success', $value, time() + (10 * 1));
      header('Location: index.php');
    } else {
      $error = 'Hubo un error al insertar el registro . intenta otra vez';
    }
  } else {
    $error = 'All the fields are required';
  }
} else {
  $query = "SELECT * FROM  ciudades WHERE id = " .  $_GET['id'] . " limit 1 ";
  $res = mysqli_query($mysqli, $query);
  $city = mysqli_fetch_assoc($res);
}
?>
<?php include_once('header.php') ?>

<div class="form-box">
  <form action="" method="POST" class="form">
    <?= isset($error) ?  "<p class='error'> .  $error </p>"  : '' ?>
    <h4 class="text-2xl font-bold text-blue-300 uppercase">Editar Ciudad <?= $city['id'] ?> </h4>
    <fieldset>
      <label for="ciudad">Cuidad</label>
      <input type="text" value="<?= $city['ciudad'] ?>" name="ciudad" placeholder="nombre de la ciudad">
    </fieldset>
    <fieldset>
      <label for="pais">Pais</label>
      <input type="text" value="<?= $city['pais'] ?>" name="pais" placeholder="nombre del pais">
    </fieldset>
    <fieldset>
      <label for="habitantes">Habitantes</label>
      <input type="number" value="<?= $city['habitantes'] ?>" name="habitantes" placeholder="12212412">
    </fieldset>
    <fieldset>
      <label for="superficie">Superficie</label>
      <input type="number" value="<?= $city['superficie'] ?>" step="0.001" name="superficie" placeholder="42343">
    </fieldset>
    <fieldset class="flex">
      <label for="tieneMetro">TieneMetro</label>
      <input type="checkbox" <?= $city['tieneMetro'] == 1 ? 'checked' : '' ?> value='1' name="tieneMetro"
        id="tieneMetro">
    </fieldset>
    <fieldset>
      <input class="btn" name="submit" value="Editar Ciudad" type="submit"></input>
    </fieldset>
  </form>
</div>
<?php include_once('footer.php') ?>