<?php


require_once __DIR__ . '/../../backend/includes/db_connection.php';
require_once __DIR__ . '/../../backend/config.php';

// Services 
$statement = $pdo->prepare("SELECT * FROM services WHERE services.status ='active'");
$statement->execute();
$services = $statement->fetchAll(PDO::FETCH_ASSOC);

// settings 
$settingsStmt = $pdo->prepare("SELECT * FROM settings WHERE id=1");
$settingsStmt->execute();
$settings = $settingsStmt->fetch(PDO::FETCH_ASSOC);

// Our Clients 
$sql = "SELECT * FROM clients";
$clientStatement = $pdo->prepare($sql);
$clientStatement->execute();
$clients = $clientStatement->fetchAll(PDO::FETCH_ASSOC)


?>
<?php
$currentPage = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentPage ? ucfirst(($currentPage)) . ' -' : ''; ?> Nebula Web Service</title>
    <!-- Title icon  -->
    <link rel="shortcut icon" href="/frontend/assets/images/NEBULAICON.png" type="image/x-icon">
    <!-- tailwind cdn link  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Vanilla CSS link -->
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/responsive.css">
    <!-- font awosome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
    <!-- google font link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        .page_hero {
            background: url(<?= !empty($settings['hero_cover']) ? BASE_URL . 'uploads/' . $settings['hero_cover'] : ''; ?>);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>


</head>