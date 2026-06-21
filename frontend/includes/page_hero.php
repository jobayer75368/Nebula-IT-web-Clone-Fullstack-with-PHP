<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pageName = '';

// Frontend 
switch ($request) {

    case '/about':
        $pageName = "About Us";
        break;

    case '/services':
        $pageName = "Servici";
        break;

    case '/portfolio':
        $pageName = "Portfolio";
        break;

    case '/clients':
        $pageName = "Our Clients";

        break;
    case '/blogs':
        $pageName = "Blog";
        break;

    case '/contact':
        $pageName = "Contact US";
        break;
    // single blog page 
    case (preg_match('#^/blogs/([a-zA-Z0-9-]+)$#', $request, $matches) ? true : false):
        $_GET['slug'] = $matches[1];
        $pageName = "Blog";
        break;
    // single service page 
    case (preg_match('#^/services/([a-zA-Z0-9-]+)$#', $request, $matches) ? true : false):
        $_GET['slug'] = $matches[1];
        $pageName = "Services";
        break;

    default:
        $pageName = "";
        break;
}

?>

<section class="page_hero text-white">
    <div class="page_hero_overlay">
        <div class="container mx-auto px-20 text-center">
            <h1><?= $pageName ?></h1>
            <p><a class="text-red-500" href="/">Home </a>/ <?= $pageName ?> </p>
        </div>
    </div>
</section>