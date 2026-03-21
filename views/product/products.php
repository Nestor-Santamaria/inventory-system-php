<?php require 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="mb-0">Lista de Productos</h2>

    <a class="btn btn-outline-dark" href="?route=create-product">
        <i class="bi bi-plus-lg"></i> Crear producto
    </a>

</div>

<hr>

<table class="table table-dark table-hover border-secondary">
    <thead>
        <tr>
            <th class="small uppercase">Nombre</th>
            <th class="small uppercase">Stock</th>
            <th class="small uppercase">Precio</th>
            <th class="small uppercase text-center">Acciones</th>
        </tr>
    </thead>

    <tbody class="align-middle table-light">
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td class="fw-bold"><?= $row['name'] ?></td>
                <td>
                    <span class="badge bg-dark bg-opacity-75">
                        <?= $row['stock'] ?> unidades
                    </span>
                </td>
                <td class="fw-semibold">$<?= number_format($row['price'], 2) ?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-outline-success border-2 fw-bold" href="?route=edit-product&id=<?= $row['id'] ?>">
                        Editar
                    </a>
                    <a class="btn btn-sm btn-outline-danger border-2 fw-bold ms-1" href="?route=delete-product&id=<?= $row['id'] ?>"
                        onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>


<?php require 'views/layout/footer.php'; ?>