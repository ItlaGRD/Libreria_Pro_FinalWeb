<?php

    class DB_Conexion{
        private $host = 'localhost';
        private $dbname = 'dblibreria';
        private $user = 'root';
        private $pass = '';

        private function getConexion(){
            $obd = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            return $obd;  
        }

        public function getLibros(){
            $pdoConexion = $this->getConexion();
            $resultado = [];

            if(is_object($pdoConexion)){
                $sql = "SELECT * FROM titulos";
                $resultado = $pdoConexion->query($sql);
            }

            return $resultado;
        }

        public function getAutores(){
            $pdoConexion = $this->getConexion();
            $resultado = [];

            if(is_object($pdoConexion)){
                $sql = 'SELECT * FROM autores';
                $resultado = $pdoConexion->query($sql);
            }

            return $resultado;
        }

        public function enviarComentario(){
            $pdoConexion = $this->getConexion();
            //$resultado = [];
            $correo = strip_tags(trim($_POST["correo"] ?? ''));
            $asunto = strip_tags(trim($_POST["asunto"] ?? ''));
            $comentario = strip_tags(trim($_POST["comentario"] ?? ''));

            if(is_object($pdoConexion)){
                $sql = "INSERT INTO contacto (fecha, correo, asunto, comentario) VALUES (NOW(), :correo, :asunto, :comentario)";
                
                $stmt = $pdoConexion->prepare($sql);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':asunto', $asunto);
                $stmt->bindParam(':comentario', $comentario);

                $stmt->execute();
            }

        }

        public function getComentarios() {
            $pdo = $this->getConexion();
            $sql = "SELECT fecha, correo, asunto, comentario FROM contacto ORDER BY fecha DESC";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>