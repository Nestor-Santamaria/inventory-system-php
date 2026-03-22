<?php

session_start(); // Inicia sesión

function set_flash($msg, $type = 'success')
{
    $_SESSION['flash'] = [
        'message' => $msg,
        'type' => $type
    ];
}

function show_flash()
{
    if (isset($_SESSION['flash'])) {

        $type = $_SESSION['flash']['type'] === 'error' ? 'danger' : 'success';

        echo "<p class='alert alert-$type'>" . $_SESSION['flash']['message'] . "</p>";

        unset($_SESSION['flash']);
    }
}

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
            set_flash("Credenciales incorrectas. Inténtalo de nuevo.", 'error');
        }

        exit;
    }
    require 'views/login.php';
}


// Lógica de enrutamiento del Dashboard
elseif ($route === 'dashboard') {

    // Verificamos si el usuario está autenticado
    if (!isset($_SESSION['user'])) {
        header("Location: ?route=login");
        exit;
    }

    require 'app/controllers/DashboardController.php';

    $controller = new DashboardController();
    $controller->index($conn);
}


// Lógica de enrutamiento de Productos
elseif ($route === 'products') {

    // Verificamos si el usuario está autenticado
    if (!isset($_SESSION['user'])) {
        var_dump($_SESSION['user']);
        header("Location: ?route=login");
        exit;
    }

    $result = $conn->query("SELECT * FROM products");

    require 'views/product/products.php';
}


// Lógica de enrutamiento de Crear Producto
elseif ($route === 'create-product') {

    // Verificamos si el usuario está autenticado
    if (!isset($_SESSION['user'])) {
        header('Location: ?route=login');
    }

    // Aquí se procesaría el formulario de creación de producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];

        if (empty($name)) {
            set_flash('El nombre del producto es obligatorio.', 'error');
            header('Location: ?route=create-product');
            exit;
        }

        if (empty($stock) || $stock < 0) {
            set_flash('El stock del producto es obligatorio y no puede ser negativo.', 'error');
            header('Location: ?route=create-product');
            exit;
        }

        if (empty($price) || $price <= 0) {
            set_flash('El precio del producto es obligatorio y no puede ser negativo o cero.', 'error');
            header('Location: ?route=create-product');
            exit;
        }

        // Preparar la consulta para insertar el nuevo producto en la base de datos
        $stmt = $conn->prepare("INSERT INTO products (name, stock, price) VALUES (?,?,?)");
        $stmt->bind_param("sid", $name, $stock, $price);
        $stmt->execute();

        set_flash('Se ha creado el producto: ' . $name . ' correctamente.');
        header('Location: ?route=products');
        exit;
    }

    require 'views/product/create.php';
}


// Lógica de enrutamiento de Eliminar Producto
elseif ($route === 'delete-product') {

    // Verificamos si el usuario está autenticado
    if (!isset($_SESSION['user'])) {
        header('Location: ?route=login');
        exit;
    }

    // Obtiene el ID del producto a eliminar de la URL
    $id = $_GET['id'] ?? null;


    if ($id) {

        $stmt = $conn->prepare('DELETE FROM products WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();


        set_flash('Se ha eliminado el producto correctamente.');
        header('Location: ?route=products');
        exit;
    }
}


// Lógica de enrutamiento de Editar Producto
elseif ($route === 'edit-product') {

    // Verificamos si el usuario está autenticado
    if (!isset($_SESSION['user'])) {
        header('Location: ?route=login');
        exit;
    }

    $id = $_GET['id'] ?? null; // Obtiene el ID del producto a editar de la URL

    // Procesa el formulario de edición de producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];

        if (empty($name)) {
            set_flash('El nombre del producto es obligatorio.', 'error');
            header('Location: ?route=edit-product&id=' . $id);
            exit;
        }

        if (empty($stock) || $stock < 0) {
            set_flash('El stock del producto es obligatorio y no puede ser negativo.', 'error');
            header('Location: ?route=edit-product&id=' . $id);
            exit;
        }

        if (empty($price) || $price <= 0) {
            set_flash('El precio del producto es obligatorio y no puede ser negativo o cero.', 'error');
            header('Location: ?route=edit-product&id=' . $id);
            exit;
        }

        $stmt = $conn->prepare('UPDATE products SET name = ?, stock = ?, price = ? WHERE id = ?');
        $stmt->bind_param('sidi', $name, $stock, $price, $id);
        $stmt->execute();

        set_flash('Se ha actualizado el producto: ' . $name . ' correctamente.');
        header('Location: ?route=products');
        exit;
    }

    $stmt = $conn->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $product = $stmt->get_result()->fetch_assoc();

    require 'views/product/edit.php';
}

// Lógica de enrutamiento del Logout
elseif ($route === 'logout') {

    session_destroy(); // Destruye la sesión

    header("Location: ?route=login");
    exit;
}


// Ruta por defecto
else {
    echo "Home del sistema de inventario";
}
