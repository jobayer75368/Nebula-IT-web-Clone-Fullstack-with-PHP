<?php
require_once __DIR__ . '/../backend/includes/db_connection.php';
require_once __DIR__ . '/../backend/config.php';

$statement = $pdo->prepare("SELECT * FROM blogs");
$statement->execute();
$blogs = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">


<!-- Head  -->
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
                <h1>Blog</h1>
                <p><a class="text-red-500" href="/">Home</a> / Blog</p>
            </div>
        </div>
    </section>
    <section class="blog_sec my-20">
        <div class="container mx-auto px-5 lg:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <?php if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog) : ?>
                        <div class="blog-card p-5 bg-white shadow-lg rounded-lg relative">
                            <div class="img_overlay">
                                <img src="<?= !empty($blog["featured_image"]) ? BASE_URL . 'uploads/' . $blog["featured_image"] : '/frontend/assets/images/no-image.png';  ?>" alt="">
                                <a href="/blog/<?= $blog['slug']; ?>">
                                    <div class="blog_overlay">
                                        <div class="bg-blue-500 text-white text-sm inline-block px-2 py-1 rounded-sm ml-3 mt-2">
                                            Blog
                                        </div>
                                        <div class="date m-0"><?= date("d", strtotime($blog['created_at'])) ?><span class="text-sm font-normal m-0"><?= date("M", strtotime($blog['created_at'])) ?></span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-4 mt-6">
                                <p class="font-semibold blog_head transition-all duration-300">Nebula IT vs. Competitors- What
                                    Makes Them The Best Choice?
                                </p>
                                <a class="secondary_link mt-7 inline-block" href="">Learn more</a>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- <div class="blog-card p-5 bg-white shadow-lg rounded-lg relative">
                    <div class="img_overlay">
                        <img src="/frontend/assets/images/blog/blog_01.jpg.bv.webp" alt="">
                        <a href="">
                            <div class="blog_overlay">
                                <div class="bg-blue-500 text-white text-sm inline-block px-2 py-1 rounded-sm ml-3 mt-2">
                                    Blog
                                </div>
                                <div class="date m-0">30<span class="text-sm font-normal m-0">Apr</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="p-4 mt-6">
                        <p class="font-semibold blog_head transition-all duration-300">Nebula IT vs. Competitors- What
                            Makes Them The Best Choice?
                        </p>
                        <a class="secondary_link mt-7 inline-block" href="">Learn more</a>
                    </div>

                </div>
                <div class="blog-card p-5 bg-white shadow-lg rounded-lg relative">
                    <div class="img_overlay">
                        <img src="/frontend/assets/images/blog/blog_02.jpg.bv.webp" alt="">
                        <a href="">
                            <div class="blog_overlay">
                                <div class="bg-blue-500 text-white text-sm inline-block px-2 py-1 rounded-sm ml-3 mt-2">
                                    Blog
                                </div>
                                <div class="date m-0">30<span class="text-sm font-normal m-0">Apr</span></div>
                            </div>
                        </a>
                    </div>
                    <div class="p-4 mt-6">
                        <p class="font-semibold blog_head transition-all duration-300">Nebula IT vs. Competitors- What
                            Makes Them The Best Choice?
                        </p>
                        <a class="secondary_link mt-7 inline-block" href="">Learn more</a>
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