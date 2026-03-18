<?php

$conn = new mysqli("localhost", "root", "Up3D@$1970@$", "inventario", 3306);

if ($conn->connect_error) {
    die("Error DB");
}