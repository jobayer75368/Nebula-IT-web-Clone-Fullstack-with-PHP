<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- sidebar -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>
    <!-- header  -->

    <?php require_once __DIR__ . '/includes/header.php' ?>

    <?php require_once __DIR__ . '/includes/page_hero.php' ?>
    <section class="about_about my-24 w-100">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between gap-10">
            <div class="about_about_img" data-aos="fade-right" data-aos-duration="1000">
                <img class="hidden lg:block" src="<?= !empty($settings['image_1']) ? BASE_URL . 'uploads/' . $settings['image_1'] : ''; ?>" alt="">
            </div>
            <div>
                <h2 class="mb-5" data-aos="fade-down" data-aos-duration="1000"><span>Who </span>We Are</h2>
                <img class="lg:hidden mb-5" data-aos="fade-right" data-aos-duration="1000" src="<?= !empty($settings['image_1']) ? BASE_URL . 'uploads/' . $settings['image_1'] : ''; ?>" alt="">
                <div data-aos="fade-left" data-aos-duration="1000">
                    <?= $settings['who_we_are'] ?>
                </div>
            </div>
        </div>
    </section>
    <section class="about_goal my-20 bg-[var(--expertise-color)] py-20">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between gap-10">
            <div class="text-[var(--tertiary-font-color)] text-justify">
                <h2 class="mb-5" data-aos="fade-down" data-aos-duration="1000"><span>Our</span> Goal</h2>
                <img class="lg:hidden mb-5" data-aos="fade-left" data-aos-duration="1000" src="<?= !empty($settings['image_2']) ? BASE_URL . 'uploads/' . $settings['image_2'] : ''; ?>" alt="">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <?= $settings['our_goal'] ?>
                </div>

            </div>
            <div class="about_goal_img hidden lg:block" data-aos="fade-left" data-aos-duration="1000">
                <img src="<?= !empty($settings['image_2']) ? BASE_URL . 'uploads/' . $settings['image_2'] : ''; ?>" alt="">
            </div>
        </div>
    </section>
    <section class="about_story mb-20">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between items-center gap-10">
            <div class="about_story_img">
                <img class="hidden lg:block" data-aos="fade-right" data-aos-duration="1000" src="<?= !empty($settings['image_3']) ? BASE_URL . 'uploads/' . $settings['image_3'] : ''; ?>" alt="">
            </div>
            <div class="text-[var(--tertiary-font-color)] text-justify">
                <h2 class="mb-5" data-aos="fade-down" data-aos-duration="1000"><span>Origin</span> Story</h2>
                <img class="lg:hidden" data-aos="fade-right" data-aos-duration="1000" src="<?= !empty($settings['image_3']) ? BASE_URL . 'uploads/' . $settings['image_3'] : ''; ?>" alt="">
                <div data-aos="fade-left" data-aos-duration="1000">
                    <?= $settings['origin_story'] ?>
                </div>
            </div>
        </div>
    </section>
    <section class="about_choose bg-[var(--expertise-color)] py-20">
        <div class="container mx-auto px-5 lg:px-20">
            <h2 data-aos="fade-down" data-aos-duration="1000"><span>Why</span> Choose Us</h2>
            <div class="flex flex-col lg:flex-row justify-between  my-20 items-center gap-10" data-aos="fade-right" data-aos-duration="1000">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <div class="flex gap-10">
                        <div
                            class="choose bg-[var(--secondary-color)] text-white rounded-md flex justify-center items-center text-4xl hover:bg-[var(--footer-color)] transition-hover duration-300">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-xl mb-3">Always-On Security</h4>
                            <p class="text-[var(--tertiary-font-color)]">Multi-layered protection including web
                                application firewalls and automated threat
                                blocking.</p>
                        </div>
                    </div>
                    <div class="flex gap-10">
                        <div
                            class="choose bg-[var(--secondary-color)] text-white rounded-md flex justify-center items-center text-4xl hover:bg-[var(--footer-color)] transition-hover duration-300">
                            <i class="fa-solid fa-bolt-lightning"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-xl mb-3">Blazing Fast Performance</h4>
                            <p class="text-[var(--tertiary-font-color)]">Powered by global edge networks and NVMe
                                storage for near-instant page loads.</p>
                        </div>
                    </div>
                    <div class="flex gap-10">
                        <div
                            class="choose bg-[var(--secondary-color)] text-white rounded-md flex justify-center items-center text-4xl hover:bg-[var(--footer-color)] transition-hover duration-300">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-xl mb-3">Smart Scalablity</h4>
                            <p class="text-[var(--tertiary-font-color)]">Auto scaling resources that adapt to your
                                traffic patterns in real time.</p>
                        </div>
                    </div>
                    <div class="flex gap-10">
                        <div
                            class="choose bg-[var(--secondary-color)] text-white rounded-md flex justify-center items-center text-4xl hover:bg-[var(--footer-color)] transition-hover duration-300">
                            <i class="fa-solid fa-computer"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-xl mb-3">Real Human Support</h4>
                            <p class="text-[var(--tertiary-font-color)]">Dedicated cloud engineers available 24/7 via
                                chat, phone, or ticket.</p>
                        </div>
                    </div>
                </div>
                <div class="about_choose_img hidden lg:block" data-aos="fade-left" data-aos-duration="1000">
                    <img src="<?= !empty($settings['image_4']) ? BASE_URL . 'uploads/' . $settings['image_4'] : ''; ?>" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer  -->
    <?php require_once __DIR__ . '/includes/footer.php' ?>
    <a href="#top"><i class="fa-solid fa-angle-up"></i></a>

    <!-- Javascript  -->
    <?php require_once __DIR__ . '/includes/javascript.php' ?>

</body>

</html>