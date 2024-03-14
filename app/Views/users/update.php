<?php
  $data = $update;

  use Config\App;

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Biblioteca UTD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
  <main class="container py-4">
    <form action="<?php $baseURL;?>/users/save" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="name" class="form-control" id="name" name="name" value="<?=$data['name'];?>">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$data['email'];?>">
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>    
      
      <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <input type="text" class="form-control" id="type" name="type" value="<?=$data['type'];?>">
      </div>    
      
      <input type="hidden" id="id" name="id" value="<?=$data['id'];?>">
      <input type="hidden" id="action" name="action" value="update">

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
  