<?php require 'views/layout/header.php'; ?>

<h2>Bienvenido al dashboard</h2>

<hr>

<div class="row">

    <div class="col-md-6">

        <div class="card border-light bg-light shadow-sm">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Valor Total del Inventario</h5>
                </div>

                <h3>$<?= number_format($inventoryCost, 2) ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="card border-light bg-light shadow-sm">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Total de unidades en inventario</h5>
                </div>

                <h3><?= $inventoryCant . ' Unidades' ?></h3>
            </div>
        </div>
    </div>

</div>

<div class="mt-4">

    <div class="card border-light bg-light shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Productos con bajo stock</h5>
                <small class="text-muted">Stock ≤ 5</small>
            </div>

            <table class="table table-sm table-light align-middle">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Stock</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($row = $lowStock->fetch_assoc()): ?>

                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['stock'] ?></td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<?php require 'views/layout/footer.php'; ?>