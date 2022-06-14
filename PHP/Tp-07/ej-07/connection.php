<?php

$servername = "localhost";
$username = "root";
$password = "jhm.ok";
$nombreBaseDatos = 'entornos_try';
$mysqli = mysqli_connect($servername, $username, $password) or die('Failed!');
mysqli_select_db($mysqli, $nombreBaseDatos);
mysqli_set_charset($mysqli, 'utf8mb4');

return $mysqli;