<?php

class DashboardController
{
    public function index($conn)
    {
        // Consulta para obtener el valor total del inventario
        $inventoryCost = $conn->query('SELECT SUM(stock * price) AS total_cost FROM products')->fetch_assoc()['total_cost'];

        // Consulta para obtener el valor total de unidades en inventario
        $inventoryCant = $conn->query('SELECT SUM(stock) AS total_cantidad FROM products')->fetch_assoc()['total_cantidad'];

        // Consulta para obtener productos con stock bajo (≤ 5)
        $lowStock = $conn->query('
            SELECT name, stock FROM products WHERE stock <= 5 ORDER BY stock ASC
        ');
        require 'views/dashboard.php';
    }
}
