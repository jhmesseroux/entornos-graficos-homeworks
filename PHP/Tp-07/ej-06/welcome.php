<?php
session_start();
if (!empty($_SESSION['username'])) {
  echo 'welcome ' . $_SESSION['username'];
} else {
  echo ' <span> No puede visitar esta pagina ! Primero debes <a href="index.php">Inicia Sesion</a> </span>';
}