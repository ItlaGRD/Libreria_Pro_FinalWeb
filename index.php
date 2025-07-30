<?php
  include 'data/db.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Compra Conocimiento - Librería Gerny</title>
    <link rel="icon" href="assets/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <img alt="Logo ITLA" src="img/logo ITLA.png" />
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Librería Gerny</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cuentanos.php">Cuéntanos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="acercade.html">Acerca De</a>
            </li>
          </ul>
          <form class="d-flex">
            <button
              type="button"
              class="btn btn-outline-light"
              onclick="window.open('https://github.com/ItlaGRD/Libreria_Pro_FinalWeb.git', '_blank')"
            >
              <i class="bi bi-github"></i> GitHub
            </button>
          </form>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="bg-dark py-5">
      <div class="container text-center text-white">
        <h1 class="display-4 fw-bolder">Librería Gerny</h1>
        <p class="lead fw-normal text-white-100 mb-0">Compra Conocimiento</p>
      </div>
    </header>

    <!-- Sección Productos -->
    <section class="py-5">
      <h2 id="baner">Libros</h2>
      <div class="container px-4 px-lg-5 mt-5">
        <div
          id="articuloitem"
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
        >
        <?php
          $cargar = new DB_Conexion();
          $libros = $cargar->getLibros();

            foreach($libros as $registro) {
              echo '
                <div class="col mb-5">
                  <div class="card h-100">
                    <div class="card-body p-4 text-center">
                      <h5 class="fw-bolder">' . $registro['titulo'] . '</h5>
                      <br/>
                      <h5><strong>Tema</strong></h5>
                      <p>'. $registro['tipo'] .'
                      <h5><strong>Precio:</strong></h5>
                      <p>' . $registro['precio'] . '</p>
                    </div>
                  </div>
                </div>';
            }
          ?>
      </div>
      </div>
    </section>

    <!-- Sección Autores -->
    <section class="py-5">
      <h2 id="baner2">Autores</h2>
      <div class="container px-4 px-lg-5 mt-3">
            <br/>
        <div
          id="articuloitem2"
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-4"
        >
         <?php
            $cargar = new DB_Conexion();
            $autores = $cargar->getAutores();

            foreach ($autores as $registro) {
              echo '
                <div class="col mb-5">
                  <div class="card h-100">
                    <div class="card-body p-4 text-center">
                      <h5 class="fw-bolder">' . $registro['nombre'] . ' ' . $registro['apellido'] . '</h5>
                      <h5><strong>Contacto: </strong></h5>
                      <p>' . $registro['telefono'] . '</p>
                    </div>
                  </div>
                </div>';
            }
          ?>
      </div>
      </div>
    </section>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container text-center text-white">
        Copyright &copy; Librería Gerny 2025
      </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
