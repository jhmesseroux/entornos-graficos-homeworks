<?php
if (!empty($_POST['name'])) {
  $name = $_POST['name'];
  setcookie('name', $name);
  header('Location: index.php');
} else {
  if (!empty($_COOKIE['name'])) {
    var_dump($_COOKIE['name']);
    $oldname = $_COOKIE['name'];
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COOKIE WITH USERNAME</title>
</head>

<body>
  <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div style="margin: 10px 0px;">
      <label for="name">Name</label>
      <input value="<?= isset($oldname) ? $oldname : '' ?>" id="name" name="name" type="text"
        placeholder="escribe su nombre...">
    </div>
    <div class="submit">
      <button name="submit" type="submit" class="">Crear Cookie</button>
    </div>
  </form>
</body>

</html>