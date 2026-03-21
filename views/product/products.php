<?php require 'views/layout/header.php'; ?>

<h2>Lista de Productos</h2>

<a href="?route=create-product">Crear producto</a><br><br>

<?php while ($row = $result->fetch_assoc()): ?>
    <?= $row['name'] ?> |
    <?= $row['stock'] ?> |
    $<?= $row['price'] ?> |
    <a href="?route=edit-product&id=<?= $row['id'] ?>">Editar</a> |
    <a href="?route=delete-product&id=<?= $row['id'] ?>"
        onclick="return confirm('Estas seguro de eliminar este producto?')">
        Eliminar
    </a>
    <br>
<?php endwhile ?>

<?php require 'views/layout/footer.php'; ?>