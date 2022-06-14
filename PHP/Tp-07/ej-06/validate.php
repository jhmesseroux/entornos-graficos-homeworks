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
$connection = Connect();

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  var_dump($email);
  $conn = Connect();
  $sql = "SELECT * FROM users WHERE email = '$email' limit 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['username'] = $result->fetch_assoc()['username'];
    header('Location: welcome.php');
  } else {
    echo 'No existe este email :  ' . $email . ' en la base de datos . <a href="index.php">Inicia Sesion</a> </span>';
    // echo ' <span> No puede visitar esta pagina ! Primero debes <a href="index.php">Inicia Sesion</a> </span>';

    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
} else {
}