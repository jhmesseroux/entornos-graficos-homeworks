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
  }
  </style>
</head>

<body>

  <form class="col-6 shadow-2 rounded p-4 bg-light" method="POST" action="sendContact.php">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="James rodriguez" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
      <label for="subject" class="form-label">Sujeto</label>
      <input type="text" name="subject" class="form-control" id="subject" placeholder="Consulta sobre..." required>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Mensaje</label>
      <textarea name="message" class="form-control" id="message" placeholder="Escribe un mensaje..." rows="3"
        required></textarea>
    </div>
    <button class="btn  btn-primary">Contact</button>
  </form>


</body>

</html>