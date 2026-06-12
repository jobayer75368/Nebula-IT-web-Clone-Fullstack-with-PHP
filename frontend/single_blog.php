<?php
require_once __DIR__ . '/../backend/includes/db_connection.php';
require_once __DIR__ . '/../backend/config.php';

$slug = $_GET['slug'] ?? '';

$stmt = $pdo->prepare("SELECT blogs.*, users.name AS posted_by
FROM blogs
LEFT JOIN users ON blogs.created_by = users.id
WHERE slug=? AND blogs.status='published'");
$stmt->execute([$slug]);

$blog = $stmt->fetch(PDO::FETCH_ASSOC);
$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

function sanitize(string $data)
{
    return htmlspecialchars(trim($data));
}

$name = $email = $website = $comment = '';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $website = sanitize($_POST['website']);
    $comment = sanitize($_POST['comment']);
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }

    if (empty($email)) {
        $error["email"] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Invalid Email!";
    }

    if (empty($comment)) {
        $errors['comment'] = "Comment is required";
    }

    if (empty($errors)) {
        $cmtStmt = $pdo->prepare("INSERT INTO comments (blog_id,name,email,website,comment) VALUES(?,?,?,?,?)");
        $cmtStmt->execute([
            $blog['id'],
            $name,
            $email,
            $website,
            $comment
        ]);
        header("Location: /blogs/" . $blog['slug']);
        exit();
    }
}
$statement = $pdo->prepare("SELECT * FROM comments
WHERE blog_id=? AND comments.status='approved' 
ORDER BY created_at DESC");
$statement->execute([$blog['id']]);
$comments = $statement->fetchAll(PDO::FETCH_ASSOC);


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

                    <!-- Leave a Comment -->
                    <form action="" method="POST">
                        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                            <h2 class="text-xl not-italic font-bold text-gray-800 mb-1">Leave a Comment</h2>
                            <p class="text-sm text-gray-500 mb-5">Your email address will not be published. Required fields are marked *</p>

                            <div class="space-y-4">
                                <!-- Comment Textarea -->
                                <div>
                                    <textarea name="comment"
                                        rows="6"
                                        placeholder="Type here..."
                                        class="w-full border border-gray-300 px-4 py-3 text-sm text-gray-700 placeholder-gray-400"></textarea>
                                </div>

                                <!-- Name, Email, Website -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <input name="name"
                                        type="text"
                                        placeholder="Name*"
                                        class="border border-gray-300 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400" Required>
                                    <input name="email"
                                        type="email"
                                        placeholder="Email*"
                                        class="border border-gray-300 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400" Required>
                                    <input name="website"
                                        type="url"
                                        placeholder="Website"
                                        class="border border-gray-300 px-4 py-2.5 text-sm text-gray-700 placeholder-gray-400">
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
                    <!-- Comment List  -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="mb-4">
                                Comments (<?= count($comments); ?>)
                            </h3>
                            <?php if (!empty($comments)): ?>
                                <?php foreach ($comments as $singleComment): ?>
                                    <div class="border-bottom pb-3 mb-3">
                                        <h6 class="mb-1 fw-bold">
                                            <?= htmlspecialchars($singleComment['name']); ?>
                                        </h6>
                                        <small class="text-muted d-block mb-2">
                                            <?= date('F d, Y h:i A', strtotime($singleComment['created_at'])); ?>
                                        </small>
                                        <p class="mb-0">
                                            <?= nl2br(htmlspecialchars($singleComment['comment'])); ?>
                                        </p>
                                    </div>
                                    <hr class="border-gray-400 mt-0 mb-10">
                                <?php endforeach; ?>
                            <?php else: ?>

                                <p class="text-muted mb-0">
                                    No comments yet.
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>


                </div><!-- end main content -->


                <!-- ===================== SIDEBAR ===================== -->
                <aside class="w-full lg:w-[30%]">


                    <!-- Recent Posts -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Recent Posts</h3>
                        <div class="space-y-4">

                            <?php if (!empty($blogs)): ?>
                                <?php foreach ($blogs as $recBlog): ?>
                                    <a href="#" class="flex gap-3 group">
                                        <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                            <img
                                                src="<?= !empty($recBlog['featured_image']) ? BASE_URL . 'uploads/' . $recBlog['featured_image'] : '/frontend/assets/images/no-image.png'; ?>"
                                                alt="Post thumbnail"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-700 group-hover:text-[var(--primary-color)] transition-colors leading-snug line-clamp-2">
                                                <?= $recBlog['title']; ?>
                                            </p>
                                            <span class="text-xs text-gray-400 mt-1 block"><?= date("d M Y", strtotime($recBlog['created_at'])) ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <hr class="border-gray-100">

                        </div>
                    </div>

                </aside>

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