<?php 
class Database
{
    private $servidor="localhost";
    private $baseDeDatos="bolsas";
    private $usuario="root";
    private $contraseña="";
    private $charset = "utf8";

    function conectar()
    {
        try {
            $conexion = "mysql:host=" . $this->servidor . ";dbname=" . $this->baseDeDatos . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conexion, $this->usuario, $this->contraseña, $options);
            return $pdo;
        } catch(PDOException $e) {
            echo "Error conexión: " . $e->getMessage();
            exit;
        }
    }
}
?>
