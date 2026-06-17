<?php require_once __DIR__ . '/../backend/includes/db_connection.php';
require_once __DIR__ . '/../backend/config.php';

// contact info from settings
$stmt = $pdo->prepare("SELECT * FROM settings WHERE id=:id");
$stmt->execute([':id' => 1]);
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

// Contact 

$name = $email = $subject = $message = "";
$error = [];
$sent = "";
function sanitize(string $data)
{
    $data = trim(htmlspecialchars($data));
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize($_POST["name"]);
    $email = sanitize($_POST["email"]);
    $subject = sanitize($_POST["subject"]);
    $message = sanitize($_POST["message"]);

    if (empty($name)) {
        $error["name"] = "Your name is required";
    }
    if (empty($email)) {
        $error["email"] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Invalid Email address!";
    }

    if (empty($error)) {
        $sql = "INSERT INTO contacts (name, email, subject, message)
                VALUES (:name, :email,:subject,:message)";
        $result = $statement = $pdo->prepare($sql);
        $statement->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
        $name = $email = $subject = $message = "";

        $sent = '<p class="bg-green-300 p-4 rounded-lg font-semibold">Message Sent Successfully!</p>';
    } else {
        $sent = '<p class="bg-red-300 p-4 rounded-lg font-semibold">Error!</p>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- Head  -->
<?php require_once __DIR__ . '/includes/head.php'; ?>

<body id="top">
    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>
    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>

    <section class="page_hero text-white">
        <div class="page_hero_overlay">
            <div class="container mx-auto px-20 text-center">
                <h1>Contact</h1>
                <p><a class="text-red-500" href="/">Home</a> / Contact</p>
            </div>
        </div>
    </section>
    <section class="contact_sec py-20 bg-white">
        <div class="container mx-auto px-5 lg:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <div
                    class="grid_card border border-gray-300 flex flex-col gap-5 justify-center items-center text-center py-14 rounded-md">
                    <div class="card_icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h3 class="font-semibold text-2xl">Address</h3>
                    <p class="font-medium text-zinc-500"><?= $settings['location'] ?></p>
                </div>
                <div
                    class="grid_card border border-gray-300 flex flex-col gap-5 justify-center items-center text-center py-14 rounded-md">
                    <div class="card_icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <h3 class="font-semibold text-2xl">Phone</h3>
                    <p class="font-medium text-zinc-500 w-[12rem]"><?= $settings['phone'] ?></p>
                </div>
                <div
                    class="grid_card border border-gray-300 flex flex-col gap-5 justify-center items-center text-center py-14 rounded-md">
                    <div class="card_icon">
                        <i class="fa-solid fa-envelope-open"></i>
                    </div>
                    <h3 class="font-semibold text-2xl">Email</h3>
                    <p class="font-medium text-zinc-500 w-[18rem]"><?= $settings['email'] ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="contact_form my-20">
        <div class="container mx-auto px-5 lg:px-20 sm:flex justify-between">
            <div class="form_info w-100">
                <h2 class="mb-5"><span>Send Us a</span> message</h2>
                <img class="lg:hidden" src="<?= BASE_URL . 'uploads/' . $settings['contact_image']; ?>" alt="Contact Image">
                <form class="bg-white p-5 rounded-md shadow-lg w-100 flex flex-col" action="" method="POST">
                    <?= $sent; ?>
                    <div class="mb-4 mt-5">
                        <label for="name">Your Name</label>
                        <input id="name" class="w-100 px-4 py-2 border border-gray-300 rounded-lg mt-2" type="text"
                            placeholder="Enter your name" name="name" value="<?= $name ?>">
                        <p class="text-red-700"><?= isset($error['name']) ? $error['name'] : ''; ?></p>
                    </div>
                    <div class="mb-4">
                        <label for="email">Your Email</label>
                        <input id="email" class="w-100 px-4 py-2 border border-gray-300 rounded-lg mt-2" type="email"
                            placeholder="Enter your email" name="email" value="<?= $email ?>">
                        <p class="text-red-700"><?= isset($error['email']) ? $error['email'] : ''; ?></p>
                    </div>
                    <div class="mb-4">
                        <label for="subject">Your Subject</label>
                        <input id="subject" class="w-100 px-4 py-2 border border-gray-300 rounded-lg mt-2" type="text"
                            placeholder="Enter your subject" name="subject" value="<?= $subject ?>">
                    </div>
                    <div class="w-100 mb-4">
                        <label for="message">Your Message (optional)</label>
                        <textarea id="message" class="w-100 px-4 py-2 border border-gray-300 rounded-lg mt-2"
                            placeholder=" Write Your Message..." name="message"><?= $message ?></textarea>
                    </div>
                    <input class="secondary_link" type="submit" value="Submit">
                </form>
            </div>
            <div>
                <img class="hidden lg:block" src="<?= BASE_URL . 'uploads/' . $settings['contact_image'] ?>" alt="">
            </div>
        </div>
    </section>
    <section class="location flex justify-center">
        <?= !empty($settings['map_location']) ? $settings['map_location'] : 'Error: Map did not load'; ?>
    </section>
    <!-- Footer  -->
    <?php require_once __DIR__ . '/includes/footer.php' ?>
    <!-- Back to top  -->
    <a href="#top"><i class="fa-solid fa-angle-up"></i></a>
    <!-- Javascript  -->
    <?php require_once __DIR__ . '/includes/javascript.php' ?>
</body>

</html>