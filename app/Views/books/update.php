<?php

  use Config\App;

  $data = $update;
  
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

    <main class="container py-4 h-100">
      <form action="<?php $baseURL;?>/books/save" method="POST">
        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $data['title'];?>">
        </div>
        
        <div class="mb-3">
          <label for="author" class="form-label">Autor</label>
          <input type="text" class="form-control" id="author" name="author" value="<?= $data['author'];?>">
        </div>
        
        <div class="mb-3">
          <label for="genre" class="form-label">Gênero</label>
          <input type="text" class="form-control" id="genre" name="genre" value="<?= $data['genre'];?>">
        </div>
        
        <div class="mb-3">
          <label for="language" class="form-label">Idioma</label>
          <input type="text" class="form-control" id="language" name="language" value="<?= $data['language'];?>">
        </div>
        
        <div class="mb-3">
          <label for="isbn_13" class="form-label">ISBN-13</label>
          <input type="text" class="form-control" id="isbn_13" name="isbn_13" value="<?= $data['isbn_13'];?>">
        </div>
        
        <div class="mb-3">
          <label for="series_name" class="form-label">Série</label>
          <input type="text" class="form-control" id="series_name" name="series_name" value="<?= $data['series_name'];?>">
        </div>
        
        <div class="mb-3">
          <label for="series_volume" class="form-label">Volume</label>
          <input type="int" class="form-control" id="series_volume" name="series_volume" value="<?= $data['series_volume'];?>">
        </div>
        
        <div class="mb-3">
          <label for="quantity" class="form-label">Quantidade</label>
          <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $data['quantity'];?>">
        </div>
        
        <div class="mb-3">
          <label for="cover_image" class="form-label">Imagem de Capa</label>
          <input type="text" class="form-control" id="cover_image" name="cover_image" value="<?= $data['cover_image'];?>">
        </div>
        
        <input type="hidden" id="id" name="id" value="<?=$data['id'];?>">
        <input type="hidden" id="action" name="action" value="update">
        
        <button type="submit" class="btn btn-primary">Atualizar livro</button>
      </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
  