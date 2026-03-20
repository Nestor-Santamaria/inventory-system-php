<?php require 'views/layout/header.php'; ?>

<h2>Crear nuevo producto</h2>

<form method="POST">
    Nombre: <input type="text" name="name" required><br>
    Stock: <input type="number" name="stock" required><br>
    Precio: <input type="number" step="0.01" name="price" required><br>
    <button>Crear producto</button>
</form>

<?php require 'views/layout/footer.php'; ?>