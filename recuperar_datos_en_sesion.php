<?php
// Iniciar la sesion para guardar cosas
session_start();

// Verificar si se envió el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtener los datos del formulario
    $variable1 = $_POST['variable1'];
    $variable2 = $_POST['variable2'];
    
    // Validar que no estén vacíos
    if(empty($variable1) || empty($variable2)) {
        echo "<script>alert('Falta variable1 o variable2'); window.history.back();</script>";
        exit;
    }
    
    // Guardar en sesión
    $_SESSION['variable1'] = $variable1;
    $_SESSION['variable2'] = $variable2;
    
    
    // Redirigir a tu pagina
    header("Location: tu pagina.php");
    exit;
    
} else {
    // Si no es POST, regresar
    header("Location: index.html");
    exit;
}
?>