<?php
if (isset($_COOKIE['news'])) {
  setcookie('news', '', time() - 3600);
  unset($_COOKIE['news']);
}

header('Location: index.php');