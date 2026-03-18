<?php

session_start(); // Inicia sesión

require 'config/database.php'; // Incluye la conexión a la base de datos

$route = $_GET['route'] ?? 'home'; // Obtiene la ruta, por defecto 'home'

/** Rutas del sistema 
 * - 'home': Página principal del sistema de inventario
 * - 'login': Página de inicio de sesión (en construcción)
 */

// Lógica de enrutamiento de Login
if ($route === 'login') {

    // Aquí se procesaría el formulario de login
    // REQUEST_METHOD se utiliza para verificar si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Vamos a obtener los datos del formulario de login
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validamos que los campos no estén vacíos
        if (empty($email) || empty($password)) {
            echo "Todos los campos son obligatorios.";
            exit;
        }

        // Aquí se realizaría la consulta a la base de datos para verificar las credenciales
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result(); // get_result obtiene el resultado de la consulta como un objeto mysqli_result
        $user = $result->fetch_assoc(); // fetch_assoc obtiene una fila de resultados como un array asociativo

        if ($user && $user['password'] === $password) {
            $_SESSION['user'] = $email; // Guarda el email en la sesión
            header(('Location: ?route=dashboard')); // Redirige a un dashboard

            exit;
        } else {
            echo "Credenciales incorrectas. Inténtalo de nuevo.";
        }

        /*
        if ($email === 'admin@test.com' && $password === '1234') {

            $_SESSION['user'] = $email; // Guarda el email en la sesión
            header(('Location: ?route=dashboard')); // Redirige a un dashboard

            exit;
        } else {
            echo "Credenciales incorrectas. Inténtalo de nuevo.";
        }*/

        exit;
    }
    require 'views/login.php';
}
// Lógica de enrutamiento del Dashboard
elseif ($route === 'dashboard') {

    if (!isset($_SESSION['user'])) {
        header("Location: ?route=login");
        exit;
    }

    echo "Bienvenido al dashboard <br><br>";
    echo "<a href='?route=products'>Ir a productos</a><br>";
    echo "<a href='?route=logout'>Cerrar sesión</a>";
}
// Lógica de enrutamiento de Productos
elseif ($route === 'products') {

    if (!isset($_SESSION['user'])) {
        header("Location: ?route=login");
        exit;
    }

    echo "Lista de productos";
}
// Lógica de enrutamiento del Logout
elseif ($route === 'logout') {

    session_destroy(); // Destruye la sesión

    header("Location: ?route=login");
    exit;
} else {
    echo "Home del sistema de inventario";
}
