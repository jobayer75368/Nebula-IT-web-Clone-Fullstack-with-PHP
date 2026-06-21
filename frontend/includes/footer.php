<?php


require_once __DIR__ . '/../../backend/includes/db_connection.php';
require_once __DIR__ . '/../../backend/config.php';

// Services 
// $statement = $pdo->prepare("SELECT * FROM services WHERE services.status ='active'");
// $statement->execute();
// $services = $statement->fetchAll(PDO::FETCH_ASSOC);

// From settings 
$settingsStmt = $pdo->prepare("SELECT * FROM settings WHERE id=1");
$settingsStmt->execute();
$settings = $settingsStmt->fetch(PDO::FETCH_ASSOC);


?>

<footer class="text-white overflow-hidden">
    <div class="container mx-auto px-5 lg:px-20 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- About -->
            <div>
                <img src="/frontend/assets/images/footer_logo.png" alt="">

                <p class="mt-5 mb-5 leading-6 text-justify">
                    <?= trim(htmlspecialchars($settings['footer_details'])) ?>
                </p>

                <div class="flex gap-3 flex-wrap">
                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-facebook-f text-xl"></i></a>
                    </div>

                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-twitter text-xl"></i></a>
                    </div>

                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-linkedin-in text-xl"></i></a>
                    </div>

                    <div class="social_links">
                        <a href=""><i class="fa-solid fa-basketball text-xl"></i></a>
                    </div>

                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>

            <div class="flex lg:flex-row gap-10">
                <!-- Useful Links -->
                <div>
                    <h4 class="font-semibold mb-5">Useful Links</h4>

                    <ul class="space-y-3">
                        <li><a class="hover:text-[var(--primary-color)]" href="/">Home</a></li>
                        <li><a class="hover:text-[var(--primary-color)]" href="/services">Services</a></li>
                        <li><a class="hover:text-[var(--primary-color)]" href="/about">About Us</a></li>
                        <li><a class="hover:text-[var(--primary-color)]" href="/contact">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-semibold mb-5">Services</h4>

                    <ul class="space-y-3">
                        <?php foreach ($services as $service): ?>
                            <li>
                                <a class="hover:text-[var(--primary-color)]" href="/services/<?= $service['slug']; ?>">
                                    <?= $service['title'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-semibold mb-5">Contact Us</h4>

                <ul class="space-y-5">

                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-location-dot text-2xl text-[var(--secondary-color)] mt-1 flex-shrink-0"></i>

                        <p class="break-words hover:text-[var(--primary-color)] duration-300">
                            <?= $settings['location'] ?>
                        </p>
                    </li>

                    <li class="flex items-start gap-4">
                        <i class="fa-regular fa-envelope text-2xl text-[var(--secondary-color)] mt-1 flex-shrink-0"></i>

                        <p class="break-all hover:text-[var(--primary-color)] duration-300">
                            <?= $settings['email'] ?>
                        </p>
                    </li>

                    <li class="flex items-start gap-4">
                        <i class="fa-solid fa-phone text-2xl text-[var(--secondary-color)] mt-1 flex-shrink-0"></i>

                        <p class="break-words hover:text-[var(--primary-color)] duration-300">
                            <?= $settings['phone'] ?>
                        </p>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <hr class="my-10">

    <!-- Bottom -->
    <div class="container mx-auto px-5 lg:px-20 my-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">

            <p>
                @2016
                <span class="text-[var(--primary-color)]">
                    <a href="/"><?= $settings['website_name'] ?></a>
                </span>.
                All Rights Reserved.
            </p>

            <div class="flex flex-wrap justify-center gap-5">
                <a class="hover:text-[var(--primary-color)]" href="">
                    Terms & Conditions
                </a>

                <a class="hover:text-[var(--primary-color)]" href="">
                    Privacy Policy
                </a>
            </div>

        </div>
    </div>

</footer>