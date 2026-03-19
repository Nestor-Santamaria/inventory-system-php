<h1>Editar producto</h1>

<form method='POST'>
    Nombre: <input type='text' name='name' value='<?= $product['name']?>' required><br>
    Stock: <input type='number' name='stock' value='<?=$product['stock']?>' required><br>
    Precio: <input type='number' step='0.01' name='price' value='<?=$product['price']?>' required><br>

    <button>Actualizar producto</button>
</form>