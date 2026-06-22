<?php


require_once __DIR__ . '/../backend/includes/db_connection.php';
require_once __DIR__ . '/../backend/config.php';

$slug = $_GET['slug'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM services WHERE slug=? AND status='active'");
$stmt->execute([$slug]);
$singleService = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>

    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>

    <?php require_once __DIR__ . '/includes/page_hero.php'; ?>

    <section class="service_section my-20">
        <div class="container mx-auto my-10 px-5 lg:px-20">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="">
                    <div class="">
                        <?= $singleService['detail_title'] ?>
                    </div>
                    <div class="mt-5 text-[justify]">
                        <?= $singleService['short_description'] ?>
                    </div>
                </div>
                <div class="">
                    <?php if (!empty($singleService['featured_image'])) : ?>
                        <img class="rounded"
                            src="<?= BASE_URL . 'uploads/' . htmlspecialchars($singleService['featured_image']) ?>"
                            alt="">
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-20">
                <?= $singleService['long_description'] ?>
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