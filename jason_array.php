<?php
$jsonData = '{"nombre":"Juan","edad":30,"ciudad":"Madrid"}';
$data = json_decode($jsonData, true); // Convierte a array asociativo

if (json_last_error() === JSON_ERROR_NONE) {
    echo "Nombre: " . htmlspecialchars($data['nombre']);
} else {
    echo "Error al decodificar JSON.";
}
?>