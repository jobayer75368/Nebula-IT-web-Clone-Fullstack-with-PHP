<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- sidebar -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>
    <!-- header  -->

    <?php require_once __DIR__ . '/includes/header.php' ?>
    <section class="page_hero text-white">
        <div class="page_hero_overlay">
            <div class="container mx-auto px-20 text-center">
                <h1>About US</h1>
                <p><a class="text-red-500" href="/">Home</a> / About</p>
            </div>
        </div>
    </section>
    <section class="about_about my-24 w-100">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between gap-10">
            <div class="about_about_img">
                <img class="hidden lg:block" src="/frontend/assets/images/about_img.PNG" alt="">
            </div>
            <div>
                <h2 class="mb-5"><span>Who </span>We Are</h2>
                <img class="lg:hidden mb-5" src="/frontend/assets/images/about_img.PNG" alt="">
                <p class="text-[var(--tertiary-font-color)]">At Nebula Web Service, we are a team of passionate cloud
                    technology experts dedicated to redifining
                    web infrastructure. Founded on the priciples of <span class="font-semibold">innovation, reliability,
                        and customer-centric
                        solutions</span>,we've grown from a visionary startup into a trusted name in cloud computing.
                </p>
                <br>
                <p class="text-[var(--tertiary-font-color)]">Our team combines deep technical, expertise with a
                    commitment to excellence, delivering
                    enterprise-grade web sevices with the agility of a modern tech company. We believe in making
                    high-performance cloud solutions <span class="font-semibold">accessible, secure, and scalable for
                        businesses of all sizes--from abitious startups to global enterprises.</span></p>
                <br>
                <p class="text-[var(--tertiary-font-color)]">Beyond technology, we're driven by a culture of <span
                        class="font-semibold">integrity, transparency,
                        and forward-thinking</span>. Every server we deploy, every feature we build, and every client we
                    support redlects our core philosophy: <span class="font-semibold">Empowering your digital journey
                        with cloud solutions
                        that just work.</span></p>
                <br>
                <p class="font-semibold text-[var(--tertiary-font-color)]">Innovators by nature. Partners by choice.🚀
                </p>
            </div>
        </div>
    </section>
    <section class="about_goal my-20 bg-[var(--expertise-color)] py-20">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between gap-10">
            <div class="text-[var(--tertiary-font-color)] text-justify">
                <h2 class="mb-5"><span>Our</span> Goal</h2>
                <img class="lg:hidden mb-5" src="/frontend/assets/images/about_img2.PNG" alt="">
                <p class="mb-4">At Nebula Web Service, Our goal is to revolutionize the cloud computing experience by
                    providing <span class="font-semibold">fast, secure and scalable </span>web solutions that empower
                    businesses to
                    succed in the digital era. We strive to:</p>
                <ul class="flex flex-col gap-2">
                    <li><span class="font-semibold">Deliver unmatched performance</span> through cutting-egde
                        infrastructure and global data centers.</li>
                    <li><span class="font-semibold">Ensure ironclad security</span> with advanced potection against
                        cyber threats.</li>
                    <li><span class="font-semibold">Offer seamless sclabality</span> so businesses can grow without
                        limitations.</li>
                    <li><span class="font-semibold">Provide 24/7 expert support</span> to guarantee smooth and
                        uninterrupted operations.</li>
                    <li><span class="font-semibold">Promote sustainable cloud computing</span> with energy-efficient
                        technologies.</li>
                </ul>
                <p class="my-3">We are commited to being more than just a service provider--we aim to be yout trusted
                    partner in
                    innovatin, helping you achieve <span class="font-semibold">speed, reliability, and growth</span> in
                    an ever-evolving digital world.</p>
                <p class="font-semibold">Your success is our mission. Let's build the future, together. 🌎✨</p>

            </div>
            <div class="about_goal_img hidden lg:block">
                <img src="/frontend/assets/images/about_img2.PNG" alt="">
            </div>
        </div>
    </section>
    <section class="about_story mb-20">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between items-center gap-10">
            <div class="about_story_img">
                <img class="hidden lg:block" src="/frontend/assets/images/about_img3.PNG" alt="">
            </div>
            <div class="text-[var(--tertiary-font-color)] text-justify">
                <h2 class="mb-5"><span>Origin</span> Story</h2>
                <img class="lg:hidden" src="/frontend/assets/images/about_img3.PNG" alt="">
                <p>Nebula IT is one of the technology-based institutions in Bangladesh. We focus on learning and
                    development that's why we believe quality learning develops you.</p>
                <br>
                <p>Our institute is manned by highly experienced individuals who have 3 years to 10 years of industry
                    experience and freelancing experience.</p>
                <br>
                <p>Our expertise and guidline help you to develop your professional skills like basic computer, graphic
                    design, UX/UI design, web design, WordPress, and web development. We will fully assist you to build
                    your career as a freelancer.</p>
            </div>
        </div>
    </section>
    <section class="about_choose bg-[var(--expertise-color)] py-20">
        <div class="container mx-auto px-5 lg:px-20">
            <h2><span>Why</span> Choose Us</h2>
            <div class="flex flex-col lg:flex-row justify-between  my-20 items-center gap-10">
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
                <div class="about_choose_img hidden lg:block">
                    <img src="/frontend/assets/images/about_4.PNG" alt="">
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