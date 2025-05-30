<?php
// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpiar y validar datos
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);

    // Validar campos obligatorios
    $errores = [];
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if (!$email) {
        $errores[] = "El email no es válido.";
    }
    if ($edad < 18) {
        $errores[] = "Debes ser mayor de 18 años.";
    }

    // Si no hay errores, procesar datos
    if (empty($errores)) {
        echo "Datos válidos: Nombre: $nombre, Email: $email, Edad: $edad";
        // Guardar en BD, enviar email, etc.
    } else {
        // Mostrar errores
        foreach ($errores as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
?>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="edad" placeholder="Edad" required>
    <button type="submit">Enviar</button>
</form>