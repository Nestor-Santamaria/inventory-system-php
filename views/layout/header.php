<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Inventory System</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">

            <a class="navbar-brand" href="?route=dashboard">
                Sistema de Inventario
            </a>

        </div>

        <a class="btn btn-outline-light me-2" href="?route=dashboard">
            Dashboard
        </a>

        <a class="btn btn-outline-light me-2" href="?route=products">
            Productos
        </a>

        <a class="btn btn-outline-light me-2" href="?route=logout">
            Cerrar
        </a>

    </nav>

    <hr>

    <div class="container mt-4">

        <?php show_flash(); ?>