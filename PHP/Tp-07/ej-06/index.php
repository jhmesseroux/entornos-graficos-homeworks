<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validate Student</title>
  <style>
  body {
    font-family: cursive;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  body {
    background-color: rgb(71 94 114);
    color: rgb(248, 248, 248);
  }

  body input {
    outline: none;
    border: none;
    padding: 8px 10px;
    border-radius: 3px;
    /* margin: 2rem; */
    background: #022644c2;
    color: white;
  }

  .form {
    width: 300px;
    margin: auto;
    /* height: 328px; */
    background: #e9e9e9;
    padding: 1rem;
    border-radius: 5px;
    box-shadow: 1px 1px 3px #03030336, -1px -1px 7px #0000004a;
  }

  body .form {
    width: 300px;
    margin: auto;
    /* height: 328px; */
    background: #011424;
    padding: 1rem;
    border-radius: 5px;
    box-shadow: 1px 1px 3px #03030336, -1px -1px 7px #0000004a;
  }

  fieldset {
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
    outline: 0;
    border: 0;
    margin: 0.5rem 0;
  }

  .btn {
    outline: 0;
    border: 0;
    padding: 8px 10px;
    border-radius: 3px;
    background: #ffc107;
    background: linear-gradient(60deg, #04a164, #1396ffd1);
    color: white;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
  }
  </style>

</head>

<body>
  <form action="validate.php" id="form1" method="post" class="form">
    <fieldset>
      <label for="email">Email</label>
      <input type="email" id='email' name="email" placeholder="escribe tu email ...">
    </fieldset>
    <button name="submit" id='btn' type="submit" class="btn">Validr Email</button>
  </form>
</body>

</html>