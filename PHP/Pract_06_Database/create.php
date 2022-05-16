<?php
require_once('connection.php');


$results = mysqli_query($mysqli, "SELECT * FROM ciudades");

if (!empty($_POST)) {
  if (!empty($_POST['ciudad']) && !empty($_POST['pais']) && !empty($_POST['habitantes']) && !empty($_POST['superficie'])) {

    $ciudad = mysqli_real_escape_string($mysqli, $_POST['ciudad']);
    $pais = mysqli_real_escape_string($mysqli, $_POST['pais']);
    $habitantes = mysqli_real_escape_string($mysqli, $_POST['habitantes']);
    $superficie = mysqli_real_escape_string($mysqli, $_POST['superficie']);
    $tieneMetro = !empty($_POST['tieneMetro']) ? $_POST['tieneMetro'] : 0;

    $query = "INSERT INTO ciudades (ciudad, pais, habitantes,superficie,tieneMetro) VALUES ('$ciudad', '$pais', '$habitantes','$superficie','$tieneMetro')";
    $res = mysqli_query($mysqli, $query);

    if ($res) {
      $value = "Se guardo con exito el documento!";
      setcookie('success', $value, time() + (10 * 1));
      header('Location: index.php');
    } else {
      $error = 'Hubo un error al insertar el registro . intenta otra vez';
    }
  } else {
    $error = 'All the fields are required';
  }
}

?>
<?php include_once('header.php') ?>

<div class="form-box">
  <form action="" method="POST" class="form">
    <?= isset($error) ?  "<p class='error'> .  $error </p>"  : '' ?>
    <h4 class="text-2xl font-bold text-blue-300 uppercase">Agregar Ciudad</h4>
    <fieldset>
      <label for="ciudad">Cuidad</label>
      <input type="text" name="ciudad" placeholder="nombre de la ciudad">
    </fieldset>
    <fieldset>
      <label for="pais">Pais</label>
      <input type="text" name="pais" placeholder="nombre del pais">
    </fieldset>
    <fieldset>
      <label for="habitantes">Habitantes</label>
      <input type="number" name="habitantes" placeholder="12212412">
    </fieldset>
    <fieldset>
      <label for="superficie">Superficie</label>
      <input type="number" step="0.001" name="superficie" placeholder="42343">
    </fieldset>
    <fieldset class="flex">
      <label for="tieneMetro">TieneMetro</label>
      <input type="checkbox" value="1" name="tieneMetro" id="tieneMetro">
    </fieldset>
    <fieldset>
      <button class="btn" name="submit" type="submit">Agregar Ciudad</button>
    </fieldset>
  </form>
</div>
<?php include_once('footer.php') ?>