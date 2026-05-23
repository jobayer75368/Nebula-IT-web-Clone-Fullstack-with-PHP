<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>

    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>


    <div class="floating_div_first fixed z-50 shadow-lg"><a
            class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Our Team</a>
    </div>
    <div class="floating_div_second fixed z-50 shadow-lg">
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Website Development</a>
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Software Development</a>
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Apps Development</a>
    </div>
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
            <div class="service_grid grid grid-cols-1 lg:grid-cols-3 gap-6 my-10">
                <div class="shadow shadow-black/35 p-10 w-100 rounded-md">
                    <i class="fa-solid fa-globe text-5xl my-5"></i>
                    <h4 class="font-semibold my-3">Website Development</h4>
                    <p class="my-3 text-justify">Reach your business goals with expert strategies & tailored web
                        solutions. Boost
                        growth,
                        efficiency, & success. Achive excellence together. Start now!</p>
                    <a class="secondary_link" href="">Learn more</a>
                </div>
                <div class="shadow shadow-black/35 p-10 w-100 rounded-md">
                    <i class="fa-solid fa-mobile-screen-button text-5xl my-5"></i>
                    <h4 class="font-semibold my-3">Apps Development</h4>
                    <p class="my-3 text-justify">Reach your business goals faster with our app's tailored solutions.
                        Streamline
                        operations, boost growth, and track real-time progress. Elevate success now!</p>
                    <a class="secondary_link" href="">Learn more</a>
                </div>
                <div class="shadow shadow-black/35 p-10 w-100 rounded-md">
                    <i class="fa-solid fa-gears text-5xl my-5"></i>
                    <h4 class="font-semibold my-3">Software Development</h4>
                    <p class="my-3 text-justify">Drive business success with custom software. Optimize workflows,
                        accelerate growth,
                        scale smarter. Expert solutions for measurable results.</p>
                    <a class="secondary_link" href="">Learn more</a>
                </div>
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