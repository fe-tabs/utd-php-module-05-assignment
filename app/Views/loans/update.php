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
    <form action="<?php $baseURL;?>/loans/save" method="POST">
      <div class="mb-3">
        <label for="user_id" class="form-label">Usuário</label>
        <select class="form-select" id="user_id" name="user_id">
          <?php foreach($users as $user): ?>
            <option value="<?=$user['id']?>"><?=$user['name']?></option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <div class="mb-3">
        <label for="loan_date" class="form-label">Data de Empréstimo</label>
        <input type="date" class="form-control" id="loan_date" name="loan_date" value="<?=$data['loan_date'];?>">
      </div>    

      <div class="mb-3">
        <label for="return_date" class="form-label">Data de Devolução</label>
        <input type="date" class="form-control" id="return_date" name="return_date" value="<?=$data['return_date'];?>">
      </div>

      <div class="form-check mb-3">
        <label for="is_returned" class="form-check-label">Devolvido</label>
        <input type="checkbox" class="form-check-input" id="is_returned" name="is_returned" value="<?=$data['is_returned'];?>">
      </div>    
      
      <input type="hidden" id="book_id" name="book_id" value="<?=$data['book_id'];?>">
      <input type="hidden" id="id" name="id" value="<?=$data['id'];?>">
      <input type="hidden" id="action" name="action" value="update">

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
  