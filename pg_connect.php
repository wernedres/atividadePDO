<?php

try {
    $db = new PDO("pgsql:host=localhost dbname=pro_pdo user=postgres password=m2smart");
} catch (PDOException $e) {
    print $e->getMessage();
}