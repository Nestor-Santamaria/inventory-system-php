<?php

$conn = new mysqli("127.0.0.1", "root", "root", "inventario", 3306);

if ($conn->connect_error) {
    die("Error DB");
}