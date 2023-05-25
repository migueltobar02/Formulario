
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/css/bootstrap.min.css">
    <link href="assets/style_login.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <form class="mx-auto" action="app/ValidarUsuario.php" method="post">
      <h1 class="text-center">Login</h1>
      <div class="mb-3 mt-5">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required >
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password" name="password" required >
        </div>
        <div id="emailHelp" class="form-text mt-3">Recuperar contraseña?</div>
      </div>
      <button type="submit" class="btn btn-primary my-4">Ingresar</button>
    </form>     
  </div>
  <script src="assets/js/js/bootstrap.min.js"></script>
  <script src="assets/js/js/bootstrap.bundle.min.js"></script>
</body>
</html>