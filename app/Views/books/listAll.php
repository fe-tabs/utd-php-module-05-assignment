<?php 

  $data = $listAll;

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
      <section>
        <div class="row row-cols-1">
          <div class="col">
            <?php foreach($data as $book): ?>
              <div class="card container my-3">
                <div class="row">
                  <div class="col-sm-4 col-md-5 text-center book-cover">
                    <img 
                      class="rounded my-3" 
                      src="<?=$book['cover_image']?>" 
                      alt="Capa do Livro '<?=$book['title']?>'"
                    >
                  </div>
        
                  <div class="card-body d-flex flex-column justify-content-between col-sm-8 col-md-7">
                    <div>
                      <h5 class="card-title fw-bold fs-3">
                        <?=$book['title']?>
                      </h5>
                      <h6 class="card-subtitle fs-4 fw-bold">
                        <?=$book['author']?>
                      </h6>
                      <p class="card-text">
                        <?php
                          echo ($book['series_name'] != null) ? ('
                            <small class="text-body-secondary fs-5 fw-bolder">
                              Da série '.$book['series_name'].', Volume '.$book['series_volume'].'
                            </small>
                          ') : '';
                        ?>
                      </p>
                    </div>
    
                    <div class="d-flex gap-3 justify-content-end mt-3">
                      <form 
                        action="<?php $baseURL;?>/loans/new/<?=$book['id']?>" 
                        method="POST"
                      >
                        <input 
                          id="id"
                          name="id"
                          type="hidden"
                          value="<?=$book['id']?>"
                        />

                        <input 
                          class="btn btn-success fs-4" 
                          type="submit" 
                          value="Alugar"
                        />
                      </form>

                      <form 
                        action="<?php $baseURL;?>/books/update/<?=$book['id']?>" 
                        method="POST"
                      >
                          <input 
                            id="id"
                            name="id"
                            type="hidden"
                            value="<?=$book['id']?>"
                          />

                          <input 
                            class="btn btn-primary fs-4" 
                            type="submit" 
                            value="Editar"
                          />
                        </form>

                      <form 
                        action="<?php $baseURL;?>/books/delete/<?=$book['id']?>" 
                        method="POST"
                      >
                          <input 
                            id="id"
                            name="id"
                            type="hidden"
                            value="<?=$book['id']?>"
                          />

                          <input 
                            class="btn btn-danger fs-4" 
                            type="submit" 
                            value="Excluir"
                          />
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
  