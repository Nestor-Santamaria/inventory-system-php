<?php

$conn = new mysqli("db", "root", "root", "inventario", 3306);

if ($conn->connect_error) {
    die("Error DB");
}