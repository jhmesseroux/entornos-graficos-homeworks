<?php

if (!empty($_POST)) {
  if (!empty($_POST['email'])) {
    $to = $_POST['email'];
    $subject = 'Recommendacion';
    $message = '<span>Hola hermano,te recommiendo esta pagina esta muy bueno. Link : www.hilairemesseroux.com</span>';
    $headers = 'From: hiliare@messeroux.com\r\n';
    $headers .= 'Reply-To: example@gmail.com\r\n';
    $headers .= 'Content-type: text/html\r\n';
    try {
      mail($to, $subject, $message, $headers);
      $message = 'exito!';
    } catch (Exception $e) {
      throw new Exception('Error al enviar el email.Intente de nuevo');
      var_dump($e->getMessage());
    }
  } else {

    $error['email'] = 'Email incorrecto y\o vacio';
  }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Contacto</title>

  <style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    flex-direction: column;
  }
  </style>
</head>

<body>

  <form class="col-6 shadow-2 rounded p-4 bg-light" method="POST" action="recommendSite.php">
    <h6>Ingrese su email para mandar la invitacion</h6>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
    </div>
    <?php
    if (isset($message)) echo "<div class='alert alert-success'>Mail enviado con exito!!</div>"
    ?>
    <?php
    if (isset($error['email'])) {

      echo "<div class='alert alert-danger'>";

      echo $error['email'];

      echo "</div>";
    }
    ?>
    <button class="btn  btn-primary">Recommendar</button>
  </form>


</body>

</html>