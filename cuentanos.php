<?php
    include 'data/db.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cuentanos - Librería Gerny</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!--<link href="css/styles.css" rel="stylesheet" />-->
    <link href="css/acerca.css" rel="stylesheet" />
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
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="cuentanos.php">Cuéntanos</a>
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

    <!-- Header-->
    <header class="py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder">Cuéntanos</h1>
        </div>
      </div>
    </header>

    <!-- Section-->
    <section class="py-5">
            <form class="formStyle" action="data/procesar_contacto.php" method="POST">
                <h3>Tu opinion es valiosa</h3>
                
                    <label for="correo">Correo electrónico:</label><br>
                    <input type="email" id="correo" name="correo" maxlength="50" required><br><br>

                    <label for="asunto">Asunto:</label><br>
                    <input type="text" id="asunto" name="asunto" maxlength="30" required><br><br>

                    <label for="comentario">Comentario:</label><br>
                    <textarea id="comentario" name="comentario" maxlength="200" rows="4" cols="50" required></textarea><br><br>

                    <input id='btnform' type="submit" value="Enviar">
            </form>
    </section>

    <!--Comentarios-->
    <section class="comentarios py-5" style="background-color:#f9f9f9;">
    <div class="container">
        <h3>Comentarios Recientes</h3>
        <div class="list-group">
        <?php
            $conexion = new DB_Conexion();
            $comentarios = $conexion->getComentarios(); // Ya contiene el resultado

            if (count($comentarios) > 0) {
            foreach ($comentarios as $fila) {
                echo "<div class='list-group-item'>";
                echo "<h5>" . htmlspecialchars($fila['asunto']) . "</h5>";
                echo "<p>" . nl2br(htmlspecialchars($fila['comentario'])) . "</p>";
                echo "<small class='text-muted'>De: " . htmlspecialchars($fila['correo']) . " | " . $fila['fecha'] . "</small>";
                echo "</div>";
            }
            } else {
            echo "<p>No hay comentarios aún. ¡Sé el primero en opinar!</p>";
            }
        ?>
        </div>
    </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; Librería Gerny 2025
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
