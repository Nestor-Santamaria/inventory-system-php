<?php

session_start(); // Inicia sesión

$route = $_GET['route'] ?? 'home'; // Obtiene la ruta, por defecto 'home'

/** Rutas del sistema 
 * - 'home': Página principal del sistema de inventario
 * - 'login': Página de inicio de sesión (en construcción)
*/
if ($route === 'login') { 
    require 'views/login.php';
} else {
    echo "Home del sistema de inventario"; 
}