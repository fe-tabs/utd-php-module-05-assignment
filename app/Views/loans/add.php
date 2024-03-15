<?php

  use Config\App;

  $session = session();

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
  <header class="bg-primary d-flex justify-content-between p-2 sticky-top fs-5">
      <nav class="nav navbar-expand-lg w-100" data-bs-theme="dark">
        <div class="container-fluid order-lg-2">
          <button 
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div id="navbar-navigation" class="collapse navbar-collapse order-lg-1 px-3 pt-1">
          <div class="navbar-nav gap-3 text-white">
            <a class="nav-link" href="<?php $baseURL;?>">Início</a>

            <div class="dropdown">
              <a href="#" role="button" class="nav-link" data-bs-toggle="dropdown">
                Livros
              </a>

              <div class="dropdown-menu bg-primary px-3 py-2">
                <a 
                  href="<?php $baseURL;?>/books"
                  class="dropdown-item nav-link bg-primary"
                >
                  Lista de Livros
                </a>

                <?php 
                
                  echo ($session->get('type') && $session->get('type') == 'Administrador') ? '
                    <a 
                      href="http://localhost:8080/books/new"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Adicionar Livro
                    </a>
                  ' : '';

                ?>
              </div>
            </div>

            <?php 
            
              echo ($session->get('type') && $session->get('type') == 'Administrador') ? '
                <div class="dropdown">
                  <a href="#" role="button" class="nav-link" data-bs-toggle="dropdown">
                    Usuários
                  </a>

                  <div class="dropdown-menu bg-primary px-3 py-2">
                    <a 
                      href="http://localhost:8080/users"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Lista de Usuários
                    </a>

                    <a 
                      href="http://localhost:8080/users/new"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Adicionar Usuário
                    </a>
                  </div>
                </div>

                <div class="dropdown">
                  <a href="#" role="button" class="nav-link" data-bs-toggle="dropdown">
                    Empréstimos
                  </a>

                  <div class="dropdown-menu bg-primary px-3 py-2">
                    <a 
                      href="http://localhost:8080/loans"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Lista de Empréstimos
                    </a>
                  </div>
                </div>
              ' : '';
            
            ?>

            <div class="dropdown">
              <a href="#" role="button" class="nav-link" data-bs-toggle="dropdown">
                Autenticação
              </a>

              <div class="dropdown-menu bg-primary px-3 py-2">
                <?php
                
                  
                  echo ($session->get('name')) ? '
                    <a 
                      href="http://localhost:8080/auth/sign-out"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Sair
                    </a>
                  ' : '
                    <a 
                      href="http://localhost:8080/auth/sign-up"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Criar Conta
                    </a>

                    <a 
                      href="http://localhost:8080/auth"
                      class="dropdown-item nav-link bg-primary"
                    >
                      Entrar
                    </a>
                  ';
                ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>

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
          <input type="date" class="form-control" id="loan_date" name="loan_date">
        </div>    

        <div class="mb-3">
          <label for="return_date" class="form-label">Data de Devolução</label>
          <input type="date" class="form-control" id="return_date" name="return_date">
        </div>

        <div class="form-check mb-3">
          <label for="is_returned" class="form-check-label">Devolvido</label>
          <input type="checkbox" class="form-check-input" id="is_returned" name="is_returned">
        </div>    
        
        <input type="hidden" id="book_id" name="book_id" value="<?=$book_id;?>">
        <input type="hidden" id="action" name="action" value="insert">

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
  