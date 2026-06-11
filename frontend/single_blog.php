<?php
require_once __DIR__ . '/../backend/includes/db_connection.php';
require_once __DIR__ . '/../backend/config.php';

$slug = $_GET['slug'] ?? '';

$sql = "SELECT blogs.*, users.name AS posted_by
FROM blogs
LEFT JOIN users ON blogs.created_by = users.id
WHERE slug=? AND blogs.status='published' LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$slug]);

$blog = $stmt->fetch(PDO::FETCH_ASSOC);


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

    <div class="floating_div_first fixed z-50 shadow-lg">
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Our Team</a>
    </div>
    <div class="floating_div_second fixed z-50 shadow-lg">
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Website Development</a>
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Software Development</a>
        <a class="block w-100 hover:text-[var(--primary-color)] hover:bg-gray-100" href="">Apps Development</a>
    </div>

    <section class="blog_sec mx-auto px-5 lg:px-20 my-10">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex flex-col lg:flex-row gap-10">

                <!-- ===================== MAIN BLOG CONTENT ===================== -->
                <div class="w-full lg:w-[68%]">

                    <!-- Featured Image -->
                    <div class="mb-6 rounded-lg overflow-hidden shadow-sm">
                        <img
                            src="<?= !empty($blog["featured_image"]) ? BASE_URL . 'uploads/' . $blog["featured_image"] : '/frontend/assets/images/no-image.png';  ?>" alt="">
                        <a href="/blogs/<?= $blog['slug']; ?> ?>"
                            alt="Best Choice"
                            class="w-full h-64 md:h-80 object-cover"></a>
                    </div>

                    <!-- Post Header -->
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 leading-snug">
                        <?= $blog['title']; ?>
                    </h1>
                    <p class="text-sm text-[var(--primary-color)] mb-8">
                        <span class="text-blue-700">By</span> <a href=""><?= $blog['posted_by'] ?></a> <span class="text-blue-600">/</span><?= date("d M Y", strtotime($blog['created_at'])) ?></span>
                    </p>

                    <!-- Short Description -->
                    <div class="mb-8">
                        <?= $blog['short_description'] ?>
                    </div>

                    <!--Long Description -->
                    <div class="mb-8">
                        <?= $blog['long_description']; ?>
                    </div>



                    <!-- Post Navigation -->
                    <div class="border-t border-gray-200 pt-6 mb-10">
                        <a href="#" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-[var(--primary-color)] transition-colors">
                            <i class="fa-solid fa-arrow-left text-xs"></i>
                            <div>
                                <div class="text-xs text-gray-400 uppercase tracking-wide">Previous</div>
                                <div class="font-medium">Nebula IT Web Services – Revolutionizing…</div>
                            </div>
                        </a>
                    </div>

                    <!-- Leave a Comment -->
                    <form action="" method="POST">
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                            <h2 class="text-xl not-italic font-bold text-gray-800 mb-1">Leave a Comment</h2>
                            <p class="text-sm text-gray-500 mb-5">Your email address will not be published. Required fields are marked *</p>

                            <div class="space-y-4">
                                <!-- Comment Textarea -->
                                <div>
                                    <textarea
                                        rows="6"
                                        placeholder="Type here..."
                                        class="w-full border border-gray-300 px-4 py-3 text-sm text-gray-700 placeholder-gray-400"></textarea>
                                </div>

                                <!-- Name, Email, Website -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <input
                                        type="text"
                                        placeholder="Name*"
                                        class="border border-gray-300 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400">
                                    <input
                                        type="email"
                                        placeholder="Email*"
                                        class="border border-gray-300 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 ">
                                    <input
                                        type="url"
                                        placeholder="Website"
                                        class="border border-gray-300 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400 ">
                                </div>

                                <!-- Save checkbox -->
                                <label class="flex items-center gap-3 cursor-pointer text-sm text-gray-600">
                                    <input type="checkbox" class="w-4 h-4 accent-blue-700 cursor-pointer ">
                                    <span>Save my name, email, and website in this browser for the next time I comment.</span>
                                </label>

                                <!-- Submit -->
                                <div>
                                    <button
                                        type="submit"
                                        class="bg-blue-700 hover:opacity-90 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-opacity cursor-pointer">
                                        Post Comment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div><!-- end main content -->


                <!-- ===================== SIDEBAR ===================== -->
                <aside class="w-full lg:w-[30%]">



                    <!-- Recent Posts -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Recent Posts</h3>
                        <div class="space-y-4">

                            <!-- Recent Post 1 -->
                            <a href="#" class="flex gap-3 group">
                                <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                    <img
                                        src="/frontend/assets/images/blog/blog_01.jpg.bv.webp"
                                        alt="Post thumbnail"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-700 group-hover:text-[var(--primary-color)] transition-colors leading-snug line-clamp-2">
                                        Nebula IT vs. Competitors – What Makes Them the Best Choice?
                                    </p>
                                    <span class="text-xs text-gray-400 mt-1 block">April 30, 2025</span>
                                </div>
                            </a>

                            <hr class="border-gray-100">

                            <!-- Recent Post 2 -->
                            <a href="#" class="flex gap-3 group">
                                <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                    <img
                                        src="/frontend/assets/images/blog/blog_01.jpg.bv.webp"
                                        alt="Post thumbnail"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-700 group-hover:text-[var(--primary-color)] transition-colors leading-snug line-clamp-2">
                                        Nebula IT Web Services – Revolutionizing Digital Solutions for Businesses
                                    </p>
                                    <span class="text-xs text-gray-400 mt-1 block">April 30, 2025</span>
                                </div>
                            </a>

                            <hr class="border-gray-100">

                            <!-- Recent Post 3 -->
                            <a href="#" class="flex gap-3 group">
                                <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                    <img
                                        src="/frontend/assets/images/blog/blog_01.jpg.bv.webp"
                                        alt="Post thumbnail"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-700 group-hover:text-[var(--primary-color)] transition-colors leading-snug line-clamp-2">
                                        The Future of Web Services – How Nebula IT is Leading the Way
                                    </p>
                                    <span class="text-xs text-gray-400 mt-1 block">April 30, 2025</span>
                                </div>
                            </a>

                        </div>
                    </div>

                </aside><!-- end sidebar -->

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