<h2>Lista de Productos</h2>

<a href="?route=create-product">Crear producto</a><br><br>

<?php while ($row = $result->fetch_assoc()): ?>
    <?= $row['name'] ?> |
    <?= $row['stock'] ?> |
    $<?= $row['price'] ?> |
    <a href="?route=edit-product&id=<?= $row['id'] ?>">Editar</a> |
    <a href="?route=delete-product&id=<?= $row['id'] ?>">Eliminar</a>
    <br>
<?php endwhile ?>
