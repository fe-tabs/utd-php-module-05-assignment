<?php $data = $listAll;?>

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
  