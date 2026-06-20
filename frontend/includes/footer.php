<?php


require_once __DIR__ . '/../../backend/includes/db_connection.php';
require_once __DIR__ . '/../../backend/config.php';

// Services 
$statement = $pdo->prepare("SELECT * FROM services WHERE services.status ='active'");
$statement->execute();
$services = $statement->fetchAll(PDO::FETCH_ASSOC);

// From settings 
$settingsStmt = $pdo->prepare("SELECT * FROM settings WHERE id=1");
$settingsStmt->execute();
$setting = $settingsStmt->fetch(PDO::FETCH_ASSOC);


?>

<footer class="text-white">
    <div class="container mx-auto px-5 lg:px-20">
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-16">
            <div class="footer_about">
                <div>
                    <img src="/frontend/assets/images/footer_logo.png" alt="">
                </div>
                <div>
                    <p class="mt-5 mb-5 leading-8 sm:text-justify text-white">At <span class="font-semibold">Nebula
                            IT</span>, we
                        specialize in
                        helping
                        businesses grow with smart
                        digital solutions and
                        expert
                        strategies. Our professional team is committed to delivering high-quality
                        services
                        tailored
                        to
                        your unique goals. From web development to digital marketing and IT consulting, we
                        provide
                        the
                        tools and support you need to succed in a competitive market.
                    </p>
                </div>
                <div class="flex gap-2">
                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-facebook-f text-2xl"></i></a>
                    </div>
                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-twitter text-2xl"></i></a>
                    </div>
                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-linkedin-in text-2xl"></i></a>
                    </div>
                    <div class="social_links">
                        <a href="">
                            <i class="fa-solid fa-basketball text-2xl"></i>
                        </a>
                    </div>
                    <div class="social_links">
                        <a href=""><i class="fa-brands fa-instagram text-2xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="links_1 flex flex-col gap-5">
                <h4 class="font-semibold">Useful Links</h4>
                <ul class="flex flex-col gap-2">
                    <li><a href="/">Home</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="links_2 flex flex-col gap-5">
                <h4 class="font-semibold">Services</h4>
                <ul class="flex flex-col gap-2">
                    <?php if (!empty($services)): ?>
                        <?php foreach ($services as $service): ?>
                            <li><a href="/services/<?= $service['slug']; ?>"><?= $service['title'] ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <h4 class="font-semibold">Contact Us</h4>
                <ul class="flex flex-col gap-5">
                    <li class="flex items-center gap-7">
                        <i class="fa-solid fa-location-dot text-[var(--secondary-color)] text-2xl"></i>
                        <p class=" hover:text-[var(--primary-color)] transition duration-300">
                            <?= $setting['location'] ?></p>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-regular fa-envelope text-[var(--secondary-color)] text-2xl"></i>
                        <p class=" hover:text-[var(--primary-color)] transition duration-300"><?= $setting['email'] ?>
                        </p>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-[var(--secondary-color)] text-2xl"></i>
                        <p class=" hover:text-[var(--primary-color)] transition duration-300"><?= $setting['phone'] ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="mt-20">
    <div class="container mx-auto px-20 my-8">
        <div class="sm:flex justify-between">
            <p>@2016 <span class="text-[var(--primary-color)]">Nebula IT</span>. All Rights Reserved.</p>
            <p class="flex 
                gap-3"><a class="hover:text-[var(--primary-color)]" href="">Team & Condition</a>
                <a class="hover:text-[var(--primary-color)]" href="">Privacy Policy</a>
            </p>
        </div>
    </div>
</footer>