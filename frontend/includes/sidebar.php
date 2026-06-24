<?php

require_once __DIR__ . '/../../backend/includes/db_connection.php';

$currentPage = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));



?>

<div class="sideBar bg-white z-50 fixed h-screen w-screen font-semibold">
    <div class="flex justify-end w-100">
        <button
            class="nav_close text-white bg-[var(--primary-color)] hover:bg-[var(--footer-color)] px-3 py-1 rounded mr-10 mt-6 menu-toggle">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <ul class="flex flex-col gap-8 pl-5 ">
        <li class="hover:text-[var(--primary-color)] transition-all duration-300"><a class="<?php if ($currentPage == '/') echo 'active_page'; ?>" href="/">Home</a></li>
        <li class="hover:text-[var(--primary-color)] transition-all duration-300"><a class="about_p <?php if ($currentPage == '/about') echo 'active_page'; ?>" href="/about">About</a><i
                class="fa-solid fa-chevron-down text-xs"></i>
        </li>
        <li class="hover:text-[var(--primary-color)] transition-all duration-300"><a class="service_p <?php if ($currentPage == '/services' || str_starts_with($currentPage, '/services/')) echo 'active_page'; ?>"
                href="/services">Services</a><i class="fa-solid fa-chevron-down text-xs"></i>
        </li>
        <li class="hover:text-[var(--primary-color)]"><a class="<?php if ($currentPage == '/portfolio') echo 'active_page'; ?>" href="/portfolio">Portfolio</a></li>
        <li class="hover:text-[var(--primary-color)]"><a class="<?php if ($currentPage == '/clients') echo 'active_page'; ?>" href="/clients">Our Clients</a></li>
        <li class="hover:text-[var(--primary-color)]"><a class="<?php if ($currentPage == '/blogs' || str_starts_with($currentPage, '/blogs/')) echo 'active_page'; ?>" href="/blogs">Blog</a></li>
        <li class="hover:text-[var(--primary-color)]"><a class="<?php if ($currentPage == '/contact') echo 'active_page'; ?>" href="/contact">Contact</a></li>
    </ul>
</div>