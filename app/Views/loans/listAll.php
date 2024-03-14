<?php 
  
  $data = $listAll;

  for ($i=0; $i < count($data); $i++) { 
    $data[$i]['action'] = '
      <div class="d-flex gap-3">
        <form action="http://localhost:8080/loans/update/'.$data[$i]['id'].'" method="POST">
          <input 
            id="id"
            name="id"
            type="hidden"
            value="'.$data[$i]['id'].'"
          />

          <input 
            class="btn btn-primary fs-4" 
            type="submit" 
            value="Editar"
          />
        </form>
        
        <form action="http://localhost:8080/loans/delete/'.$data[$i]['id'].'" method="POST">
          <input 
            id="id"
            name="id"
            type="hidden"
            value="'.$data[$i]['id'].'"
          />

          <input 
            class="btn btn-danger fs-4" 
            type="submit" 
            value="Excluir"
          />
        </form>
      </div>
    ';
  }

  $headers = [
    'ID',
    'Usuário',
    'Título',
    'Devolvido',
    'Data de Empréstimo',
    'Data de Devolução',
    'Ações'
  ];
  
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
    <main class="container py-4 h-100">
      <div class="card">
        <div class="card-body overflow-auto">
          <table class="table table-sm table-responsive align-middle">
            <thead class="align-middle text-nowrap">
              <?php foreach ($headers as $header) : ?>
                <th style="min-width: 160px;"><?= $header; ?></th>
              <?php endforeach; ?>
            </thead>
            <tbody>
              <?php foreach ($data as $row) : ?>
                <tr>
                  <td><?= $row['id']; ?></td>
                  <td><?= $row['userName']; ?></td>
                  <td><?= $row['bookTitle']; ?></td>
                  <td><?= $row['is_returned'] ? 'Sim' : 'Não'; ?></td>
                  <td><?= $row['loan_date']; ?></td>
                  <td><?= $row['return_date']; ?></td>
                  <td><?= $row['action']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
  