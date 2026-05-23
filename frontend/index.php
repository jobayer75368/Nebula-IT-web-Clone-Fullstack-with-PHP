<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>

    <!-- header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>


    <div class="floating_div_first fixed z-50 shadow-lg"><a
            class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Our Team</a>
    </div>
    <div class="floating_div_second fixed z-50 shadow-lg">
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Website Development</a>
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Software Development</a>
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Apps Development</a>
    </div>
    <section class="hero bg-violet-70 flex items-center mb-8">
        <div class="container mx-auto px-5 lg:px-20 sm:flex items-center justify-between gap-10">
            <div>
                <h2 class=" mb-5">
                    <span>We Are </span>Professional <span>To Grow Your </span>Business
                </h2>
                <div>
                    <img class="hero_img lg:hidden w-100" src="/frontend/assets/images/hero_img.PNG" alt="">
                </div>
                <p class="mt-5 mb-5 leading-8 text-justify">At <span class="font-semibold">Nebula IT</span>, we
                    specialize in
                    helping
                    businesses grow with smart
                    digital solutions and
                    expert
                    strategies. Our professional team is committed to delivering high-quality services tailored to
                    your unique goals. From web development to digital marketing and IT consulting, we provide the
                    tools and support you need to succed in a competitive market.</p>
                <a class="primary_link hero_contact" href="">Contact Us</a>
            </div>
            <div>
                <img class="hero_img hidden lg:block" src="/frontend/assets/images/hero_img.PNG" alt="">
            </div>
        </div>
    </section>
    <section class="service_section">
        <div class="container mx-auto my-10 px-5 lg:px-20 ">
            <div class="my-10 flex flex-col items-center">
                <h2 class="text-center"><span>Reach your</span> Business <span>Goals with our</span> services
                </h2>
                <div class="Under_line"><span class="udot"></span><span class="udot"></span><span
                        class="udot"></span><span class="uline"></span></div>
            </div>
            <div class="service_grid grid grid-cols-1 lg:grid-cols-3 gap-6 my-10">
                <div class="shadow shadow-black/35 p-10 w-100 rounded-md ">
                    <i class="fa-solid fa-globe text-5xl my-5"></i>
                    <h4 class="font-semibold my-3">Website Development</h4>
                    <p class="my-3">Reach your business goals with expert strategies & tailored web
                        solutions. Boost
                        growth,
                        efficiency, & success. Achive excellence together. Start now!</p>
                    <a class="secondary_link" href="">Learn more</a>
                </div>
                <div class="shadow shadow-black/35 p-10 w-100 rounded-md">
                    <i class="fa-solid fa-mobile-screen-button text-5xl my-5"></i>
                    <h4 class="font-semibold my-3">Apps Development</h4>
                    <p class="my-3">Reach your business goals faster with our app's tailored solutions. Streamline
                        operations, boost growth, and track real-time progress. Elevate success now!</p>
                    <a class="secondary_link" href="">Learn more</a>
                </div>
                <div class="shadow shadow-black/35 p-10 w-100 rounded-md">
                    <i class="fa-solid fa-gears text-5xl my-5"></i>
                    <h4 class="font-semibold my-3">Software Development</h4>
                    <p class="my-3">Drive business success with custom software. Optimize workflows, accelerate growth,
                        scale smarter. Expert solutions for measurable results.</p>
                    <a class="secondary_link" href="">Learn more</a>
                </div>
            </div>
        </div>
    </section>
    <section class="expertise_section py-8 bg-[var(--expertise-color)]">
        <div class="container mx-auto pb-8 px-5 lg:px-20">
            <div class="my-10 flex flex-col items-center">
                <h2><span>Industry </span>expertise
                </h2>
                <div class="Under_line"><span class="udot"></span><span class="udot"></span><span
                        class="udot"></span><span class="uline"></span></div>
            </div>
            <div class="expertise_grid grid grid-cols-1 lg:grid-cols-4 gap-5">
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-house-chimney text-5xl"></i>
                    <p>Real Estate</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-sack-dollar text-5xl"></i>
                    <p>Financeial Services</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-cart-shopping text-5xl"></i>
                    <p>E-Commerce</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-code text-5xl"></i>
                    <p>Software</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-school text-5xl"></i>
                    <p>Public Sector</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-wifi text-5xl"></i>
                    <p>IT Services</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-file-video text-5xl"></i>
                    <p>Entertainment</p>
                </div>
                <div
                    class="h-52 border border-gray-300 flex flex-col gap-5 justify-center items-center w-100 rounded-md">
                    <i class="fa-solid fa-gears text-5xl my-5"></i>
                    <p>Manufacturing</p>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio_section py-8">
        <div class="container mx-auto px-5 lg:px-20">
            <div class="my-10 flex flex-col items-center">
                <h2><span>Our </span>Portfolio
                </h2>
                <div class="Under_line"><span class="udot"></span><span class="udot"></span><span
                        class="udot"></span><span class="uline"></span></div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="preview_card p-4">
                    <div class="grid_site">
                        <iframe src="https://styleecho.net/"></iframe>
                    </div>
                    <div class="grid_text flex flex-col justify-center items-center">
                        <h4 class="font-semibold">Fashion (eCommerce)</h4>
                        <a class="secondary_link" href="">Visit Website</a>
                    </div>
                </div>
                <div class="preview_card p-4">
                    <div class="grid_site">
                        <iframe src="https://angelrosebeautycarebd.com/"></iframe>
                    </div>
                    <div class="grid_text flex flex-col justify-center items-center">
                        <h4 class="font-semibold">Beauty & Personal Care (eCommerce)</h4>
                        <a class="secondary_link" href="">Visit Website</a>
                    </div>
                </div>
                <div class="preview_card p-4">
                    <div class="grid_site">
                        <iframe src="https://intostudy.net/"></iframe>
                    </div>
                    <div class="grid_text flex flex-col justify-center items-center">
                        <h4 class="font-semibold">Education Consultancy (Portfolio)</h4>
                        <a class="secondary_link" href="">Visit Website</a>
                    </div>
                </div>
                <div class="preview_card p-4">
                    <div class="grid_site">
                        <iframe src="https://taskininterior.com/"></iframe>
                    </div>
                    <div class="grid_text flex flex-col justify-center items-center">
                        <h4 class="font-semibold">Interior Design (Portfolio)</h4>
                        <a class="secondary_link" href="">Visit Website</a>
                    </div>
                </div>
                <div class="preview_card p-4">
                    <div class="grid_site">
                        <iframe src="https://meklasca.com/"></iframe>
                    </div>
                    <div class="grid_text flex flex-col justify-center items-center">
                        <h4 class="font-semibold">CA (Portfolio)</h4>
                        <a class="secondary_link" href="">Visit Website</a>
                    </div>
                </div>
                <div class="preview_card p-4">
                    <div class="grid_site">
                        <iframe src="https://arcgroup-bd.com/"></iframe>
                    </div>
                    <div class="grid_text flex flex-col justify-center items-center">
                        <h4 class="font-semibold">Business/Corporate (Portfolio)</h4>
                        <a class="secondary_link" href="">Visit Website</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="w-100 text-center">
        <a class="primary_link" href="">View More</a>
    </div>
    <section class="clients_section mt-20 py-8">
        <div class="container mx-auto px-20">
            <div class="my-10 flex flex-col items-center">
                <h2><span>Our </span>Clients
                </h2>
                <div class="Under_line"><span class="udot"></span><span class="udot"></span><span
                        class="udot"></span><span class="uline"></span></div>
            </div>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-base md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/frontend/assets/images/Clients/client-1.PNG"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/frontend/assets/images/Clients/client-2.PNG"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/frontend/assets/images/Clients/client-3.PNG"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/frontend/assets/images/Clients/client-4.PNG"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/frontend/assets/images/Clients/client-5.PNG"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/frontend/assets/images/Clients/client-6.PNG"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>

                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m15 19-7-7 7-7" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m9 5 7 7-7 7" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            <div class="w-100 text-center mb-8">
                <a class="primary_link" href="">View More</a>
            </div>
        </div>
    </section>
    <!-- footer  -->

    <?php require_once __DIR__ . "/includes/footer.php" ?>


    <a href="#top"><i class="fa-solid fa-angle-up"></i></a>
    <?php require_once __DIR__ . '/includes/javascript.php' ?>

</body>

</html>