<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>

    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>

    <?php require_once __DIR__ . '/includes/page_hero.php' ?>


    <section class="service_section my-20">
        <div class="container mx-auto my-10 px-5 lg:px-20">
            <div class="service_grid grid grid-cols-1 lg:grid-cols-3 gap-6 my-10">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service) : ?>
                        <div class="shadow shadow-black/35 p-10 w-full rounded-md" data-aos="zoom-in" data-aos-duration="1000">
                            <h2 class="my-5"><?= $service['service_icon'] ?></h2>
                            <h4 class="font-semibold my-3"><?= $service['title'] ?></h4>
                            <p class="my-3 text-justify"><?= $service['featured_description'] ?></p>
                            <a class="secondary_link" href="/services/<?= $service['slug']; ?>">Learn more</a>
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