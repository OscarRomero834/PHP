<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $directorio = 'uploads/';
    $nombreArchivo = basename($_FILES['archivo']['name']);
    $rutaCompleta = $directorio . $nombreArchivo;
    $extension = strtolower(pathinfo($rutaCompleta, PATHINFO_EXTENSION));

    // Validar tipo de archivo (ej: solo imágenes)
    $permitidos = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($extension, $permitidos)) {
        die("Solo se permiten archivos JPG, PNG o GIF.");
    }

    // Validar tamaño (ej: máximo 2MB)
    $tamañoMaximo = 2 * 1024 * 1024; // 2MB
    if ($_FILES['archivo']['size'] > $tamañoMaximo) {
        die("El archivo es demasiado grande.");
    }

    // Mover el archivo al directorio
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta)) {
        echo "Archivo subido correctamente: " . htmlspecialchars($nombreArchivo);
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="archivo" required>
    <button type="submit">Subir</button>
</form>