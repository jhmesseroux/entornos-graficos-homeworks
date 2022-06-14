<?php

if (!isset($_COOKIE['counter']) || $_COOKIE['counter'] == null) {
  setcookie('counter', 1, time() + 60 * 60 * 24 * 200);
  echo 'Bienvenido !';
  return;
}
echo  $_COOKIE['counter'];
$v = $_COOKIE['counter'] + 1;
setcookie('counter', $v, time() + 60 * 60 * 24 * 200);

echo 'Has visitado esta pagina ' . $_COOKIE['counter'] . ' veces';