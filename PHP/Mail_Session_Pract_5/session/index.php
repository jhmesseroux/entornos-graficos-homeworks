<?php
session_start();
if (isset($_SESSION['counter'])) {
  $_SESSION['counter'] += 1;
} else {
  setcookie('counter', 1);
}
echo "Cant. pagina visitada : " . $_SESSION['counter'];
echo '<br>';
echo '<br>';

echo '<a href="/entornos/Prueba/HomeWork/session/">Home</a>';
echo '<br>';
echo '<a href="page01.php">page 01</a>';
echo '<br>';
echo '<a href="page02.php">page 02</a>';
echo '<br>';
echo '<a href="page03.php">page 03</a>';
echo '<br>';
echo '<a href="page04.php">Resetear contador</a>';
echo '<br>';