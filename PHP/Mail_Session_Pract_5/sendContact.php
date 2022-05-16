<?php

if (!empty($_POST)) {
  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    try {
      mail($_POST['email'], $_POST['subject'], $_POST['message']);
    } catch (Exception $e) {
      throw new Exception('Error al enviar el email.Intente de nuevo');
      var_dump($e->getMessage());
    }
  }
} else {
  header('Location: contact.php');
}