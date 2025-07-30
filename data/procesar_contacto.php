<?php
    require_once 'db.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $conexion = new DB_Conexion();
        $conexion->enviarComentario();

        echo "<script>alert('Comentario enviado correctamente'); window.location.href='../cuentanos.php'</script>";
    }
?>