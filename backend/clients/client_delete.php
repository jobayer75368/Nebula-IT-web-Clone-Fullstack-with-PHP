<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";
$id = $_GET['id'] ?? null;

if ($id) {

    $statement = $pdo->prepare("SELECT image FROM clients WHERE id=?");
    $statement->execute([$id]);

    $client = $statement->fetch(PDO::FETCH_ASSOC);

    if ($client && !empty($client['image'])) {

        $imagePath = __DIR__ . "/../../../" . ltrim($client['image'], '/');

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $statement = $pdo->prepare("DELETE FROM clients WHERE id=?");
    $statement->execute([$id]);
}

header("Location: /admin/clients");
exit();
