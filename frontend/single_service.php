<?php


require_once __DIR__ . '/../backend/includes/db_connection.php';
require_once __DIR__ . '/../backend/config.php';

$slug = $_GET['slug'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM services WHERE slug=? AND status='active'");
$stmt->execute([$slug]);

$service = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>

    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>

    <section class="page_hero text-white">
        <div class="page_hero_overlay">
            <div class="container mx-auto px-20 text-center">
                <h1>Services</h1>
                <p><a class="text-red-500" href="/">Home</a> / Services</p>
            </div>
        </div>
    </section>
    <section class="service_section my-20">
        <div class="container mx-auto my-10 px-5 lg:px-20">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="">
                    <h2><?= $service['detail_title'] ?></h2>
                    <p class="mt-5 text-justify"><?= $service['short_description'] ?></p>
                </div>
                <div class="">
                    <img class="rounded" src="<?= BASE_URL . 'uploads/' . $service['featured_image'] ?>" alt="">
                </div>
            </div>
            <div class="mt-20">
                <?= $service['long_description'] ?>
            </div>

        </div>
    </section>
    <!-- Footer  -->
    <?php require_once __DIR__ . '/includes/footer.php' ?>
    <!-- Back to top  -->
    <a href="#top"><i class="fa-solid fa-angle-up"></i></a>
    <!-- Javascript  -->
    <?php require_once __DIR__ . '/includes/javascript.php' ?>

</body>

</html>