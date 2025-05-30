<?php
try {
    $host = 'localhost';
    $dbname = 'nombre_db';
    $user = 'usuario';
    $pass = 'contraseña';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ejemplo de consulta segura
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Usuario: " . htmlspecialchars($usuario['nombre']);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>