<?php

require_once __DIR__ . "/../backend/includes/db_connection.php";
require_once __DIR__ . "/../backend/config.php";

$sql = "SELECT * FROM clients";
$statement = $pdo->prepare($sql);
$statement->execute();
$clients = $statement->fetchAll(PDO::FETCH_ASSOC)

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

    <section class="page_hero text-white">
        <div class="page_hero_overlay">
            <div class="container mx-auto px-20 text-center">
                <h1>Our Clients</h1>
                <p><a class="text-red-500" href="/">Home</a> / Clients</p>
            </div>
        </div>
    </section>
    <section class="client_grid my-20">
        <div class="container mx-auto px-5 lg:px-20">
            <div class="grid_cont grid grid-cols-2 lg:grid-cols-5 gap-10">
                <?php if (!empty($clients)): ?>
                    <?php foreach ($clients as $client): ?>
                        <div class="client_card">
                            <img class="client_image" src="<?= !empty($client['image']) ? BASE_URL . 'uploads/' . $client['image'] : '/frontend/assets/images/no-image.png'; ?>" alt="">
                            <div class="client_name">
                                <p><?= $client['name'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-2.PNG" alt="">
                    <div class="client_name">
                        <p>Angel Rose Beauty Care BD</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-3.PNG" alt="">
                    <div class="client_name">
                        <p>into study abroad</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-4.PNG" alt="">
                    <div class="client_name">
                        <p>taskin interior</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-5.PNG" alt="">
                    <div class="client_name">
                        <p>m. elas & co</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-6.PNG" alt="">
                    <div class="client_name">
                        <p>arc fire safety & controls LTD</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-7.PNG" alt="">
                    <div class="client_name">
                        <p>sunrise Education Consultants</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-8.PNG" alt="">
                    <div class="client_name">
                        <p>study abroad in italy</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-9.PNG" alt="">
                    <div class="client_name">
                        <p>global rise international</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-10.PNG" alt="">
                    <div class="client_name">
                        <p>trip travello</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-11.PNG" alt="">
                    <div class="client_name">
                        <p>beauty ever</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-12.PNG" alt="">
                    <div class="client_name">
                        <p>seki beauty</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-13.PNG" alt="">
                    <div class="client_name">
                        <p>khalid bazar</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-14.PNG" alt="">
                    <div class="client_name">
                        <p>institute of healthcare & development</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-15.PNG" alt="">
                    <div class="client_name">
                        <p>lighthouse paramount LTD</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-16.PNG" alt="">
                    <div class="client_name">
                        <p>SRG bangladesh LTD (SRGB)</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-17.PNG" alt="">
                    <div class="client_name">
                        <p>innovator IT</p>
                    </div>
                </div>
                <div class="client_card">
                    <img class="client_image" src="/frontend/assets/images/Clients/Our Clients/C-18.PNG" alt="">
                    <div class="client_name">
                        <p>cooking spaces</p>
                    </div>
                </div> -->
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