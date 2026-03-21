<?php require 'views/layout/header.php'; ?>

<h2>Lista de Productos</h2>

<a class="btn btn-primary" href="?route=create-product">Crear producto</a>

<br><br>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['stock'] ?></td>
                <td>$<?= $row['price'] ?></td>
                <td>
                    <a class="btn btn-sm btn-success" href="?route=edit-product&id=<?= $row['id'] ?>">Editar</a>
                    <a class="btn btn-sm btn-danger" href="?route=delete-product&id=<?= $row['id'] ?>"
                        onclick="return confirm('Estas seguro de eliminar este producto?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>

</table>


<?php require 'views/layout/footer.php'; ?>