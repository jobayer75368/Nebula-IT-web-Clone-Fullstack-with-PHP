<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";
$id = $_GET['id'] ?? null;

if ($id) {

    $statement = $pdo->prepare("SELECT featured_image FROM services WHERE id=?");
    $statement->execute([$id]);

    $service = $statement->fetch(PDO::FETCH_ASSOC);

    if ($service && !empty($service['featured_image'])) {

        $imagePath = __DIR__ . "/../../../" . ltrim($service['featured_image'], '/');

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $statement = $pdo->prepare("DELETE FROM services WHERE id=?");
    $statement->execute([$id]);
}

header("Location: /admin/services");
exit();
