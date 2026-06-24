<?php

require_once __DIR__ . "/../backend/includes/db_connection.php";
require_once __DIR__ . "/../backend/config.php";

// $sql = "SELECT * FROM clients";
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $clients = $statement->fetchAll(PDO::FETCH_ASSOC)

?>
<!DOCTYPE html>
<html lang="en">

<!-- Head  -->
<?php require_once __DIR__ . '/includes/head.php' ?>

<!-- body  -->

<body id="top">
    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>
    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>

    <!-- page hero  -->
    <?php require_once __DIR__ . '/includes/page_hero.php' ?>

    <section class="client_grid my-20">
        <div class="container mx-auto px-5 lg:px-20">
            <div class="grid_cont grid grid-cols-2 lg:grid-cols-5 gap-10">
                <?php if (!empty($clients)): ?>
                    <?php foreach ($clients as $client): ?>
                        <div class="client_card" data-aos="zoom-in" data-aos-duration="1000">
                            <img class="client_image" src="<?= !empty($client['image']) ? BASE_URL . 'uploads/' . $client['image'] : '/frontend/assets/images/no-image.png'; ?>" alt="">
                            <div class="client_name">
                                <p><?= $client['name'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

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