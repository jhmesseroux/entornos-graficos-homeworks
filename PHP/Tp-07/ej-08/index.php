<?php

function Connect()
{

  $servername = "localhost";
  $username = "root";
  $password = "jhm.ok";

  try {
    $conn = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conn, 'entornos_try');
    return $conn;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  } finally {
    // mysqli_close($conn);
  }
}
$conn = Connect();

if (isset($_GET['song'])) {
  $song = $_GET['song'];
  setcookie('song', $song);
  $sql = "SELECT * FROM songs WHERE cancion LIKE '%$song%'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
} else {
  if (isset($_COOKIE['song'])) {
    $song = $_COOKIE['song'];
    $sql = "SELECT * FROM songs WHERE cancion LIKE '%$song%'";
    $lastSearch = mysqli_query($conn, $sql);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css">
  <title>Buscador de canciones</title>
</head>

<body>
  <form action="" id="form1" method="get" class="form">
    <div class='search-box'>
      <input value="<?= isset($_GET['song']) ? $_GET['song'] : '' ?>" type="song" id='song' name="song"
        placeholder="Buscar canciones">
      <button id='btn' type="submit" class="btn">
        Buscar
      </button>
    </div>
  </form>
  <?php if (isset($_GET["song"])) : ?>
  <div class="results">
    <ul>
      <?php while ($song = mysqli_fetch_array($result)) : ?>
      <li>
        <a href="">
          <span><?= $song['cancion'] ?></span>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php endif; ?>

  <?php if (isset($_COOKIE["song"]) && empty($_GET["song"])) : ?>
  <h3>Ultima Busqueda</h3>
  <div class="results">
    <ul>
      <?php while ($song = mysqli_fetch_array($lastSearch)) : ?>
      <li>
        <a href="">
          <span><?= $song['cancion'] ?></span>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php endif; ?>

</body>

</html>