<?php require 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-5">

    <h2 class="mb-0">Editar Producto</h2>

    <a class="btn btn-outline-dark" href="?route=products">
        <i class="bi bi-plus-lg"></i> Regresar a productos
    </a>

</div>

<form method="POST" class="row bg-dark text-white g-3 align-items-end p-3 border rounded">
    <div class="col-md-4">
        <label class="form-label small fw-bold">Nombre</label>
        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
    </div>
    <div class="col-md-2">
        <label class="form-label small fw-bold">Stock</label>
        <input type="number" name="stock" class="form-control" value="<?= $product['stock'] ?>" required>
    </div>
    <div class="col-md-3">
        <label class="form-label small fw-bold">Precio</label>
        <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
    </div>
    <div class="col-md-3">
        <button class="btn btn-outline-light w-100">Editar producto</button>
    </div>
</form>


<?php require 'views/layout/footer.php'; ?>
