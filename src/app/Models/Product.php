<?php

namespace App\Models;
use PDO;
class Product
{
    public function getData()
    {
        $dsn = "mysql:host=localhost;dbname=php_mvc;charset=utf8;port=3306";

        $pdo = new PDO($dsn, "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->query("SELECT * FROM products");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}