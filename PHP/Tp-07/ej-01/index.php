<?php
if (isset($_POST)) {
  $theme = $_POST['theme'];
  setcookie('theme', $theme, time() + 60 * 60 * 24 * 2);
} else {
  if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
  } else {
    $theme = 'light';
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dark.css">
  <title>Cookies</title>
</head>

<body class="<?= $theme ?>">

  <h1>Elige un tema</h1>

  <form action="" method="POST">
    <fieldset>
      <input type="radio" name="theme" value="light" id="light">Blanco
      <input type="radio" name="theme" value="dark" id="dark">Negro
    </fieldset>
    <button type='submit'>Elija</button>
  </form>

</body>

</html>