<?php
$currentPage = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

?>

<header class="h-20 bg-white flex items-center shadow-md shadow-black/15 sticky top-0 z-40">
    <div class="container mx-auto px-5 lg:px-20 flex justify-between items-center">
        <div class="logo">
            <a href="/"><img src="/frontend/assets/images/header_logo.png" alt="NebulaIT img"></a>
        </div>
        <nav class="font-semibold">
            <ul class="flex gap-8">
                <li><a class=" <?php if ($currentPage == '/') echo 'active_page'; ?>" href="/">Home</a></li>
                <li><a class="about_p <?php if ($currentPage == '/about') echo 'active_page'; ?>" href="/about">About</a><i class="fa-solid fa-chevron-down text-xs"></i>
                </li>
                <li><a class="service_p <?php if ($currentPage == '/services') echo 'active_page'; ?>" href="/services">Services</a><i
                        class="fa-solid fa-chevron-down text-xs"></i></li>
                <li><a class="<?php if ($currentPage == '/portfolio') echo 'active_page'; ?>" href="/portfolio">Portfolio</a></li>
                <li><a class="<?php if ($currentPage == '/clients') echo 'active_page'; ?>" href="/clients">Our Clients</a></li>
                <li><a class="<?php if ($currentPage == '/blogs') echo 'active_page'; ?>" href="/blogs">Blog</a></li>
                <li><a class="<?php if ($currentPage == '/contact') echo 'active_page'; ?>" href="/contact">Contact</a></li>
            </ul>
        </nav>
        <div>
            <button
                class="nav_btn bg-red-600 text-white px-4 rounded py-1 hover:bg-[var(--footer-color)] cursor-pointer sm:hidden flex items-center">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </button>
        </div>

    </div>
</header>