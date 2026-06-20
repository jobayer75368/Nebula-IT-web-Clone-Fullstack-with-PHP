<?php
require_once __DIR__ . "/session.php";
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/includes/db_connection.php";
require_once __DIR__ . "/restrict.php";


$id = $_SESSION['user_id'] ?? null;

$statement = $pdo->prepare("SELECT * FROM users WHERE id=?");
$statement->execute([$id]);
$currentUser = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM settings WHERE id=:id");
$statement->execute([':id' => 1]);
$settings = $statement->fetch(PDO::FETCH_ASSOC);

$websiteName = $websiteFooter = $aboutTitle = $aboutDetails = $aboutImg = $phone = $email = $location = $contactImage = $mapLocation = "";
$errors = [];
function sanitize(string $data)
{
    $data = trim(htmlspecialchars($data));
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $websiteName = $settings['website_name'] ?? '';
    $websiteFooter = $settings['website_footer'] ?? '';
    $aboutTitle = $settings['about_title'] ?? '';
    $aboutDetails = $settings['about_details'] ?? '';
    $phone = $settings['phone'] ?? '';
    $email = $settings['email'] ?? '';
    $location = $settings['location'] ?? '';
    $aboutImg = $settings['about_image'] ?? '';
    $contactImage = $settings['contact_image'] ?? '';
    $mapLocation = $settings['map_location'] ?? '';


    if (isset($_POST['general_settings'])) {
        $websiteName = sanitize($_POST["website_name"] ?? '');
        $websiteFooter = sanitize($_POST["website_footer"] ?? '');

        if (empty($websiteName)) {
            $errors['website_name'] = "Website Name is Required";
        }
        if (empty($websiteFooter)) {
            $errors['website_footer'] = "Website Footer is Required";
        }
    }
    if (isset($_POST['about_settings'])) {
        $aboutTitle = sanitize($_POST["about_title"] ?? '');
        $aboutDetails = $_POST["about_details"] ?? '';
        $aboutImg = $_POST["about_image"] ?? '';

        if (empty($aboutTitle)) {
            $errors['about_title'] = "About Title is Required";
        }
        if (empty($aboutDetails)) {
            $errors['about_details'] = "About Details is Required";
        }
    }
    if (isset($_POST['contact_settings'])) {
        $phone = htmlspecialchars($_POST["phone"] ?? '');
        $email = htmlspecialchars($_POST["email"] ?? '');
        $location = sanitize($_POST["location"] ?? '');
        // $contactImage = $_POST["contact_image"] ?? '';
        $mapLocation = trim($_POST['map_location'] ?? '');

        if (empty($phone)) {
            $errors['phone'] = "Phone Number is Required";
        }
        if (empty($email)) {
            $errors['email'] = "Email is Required";
        }
        if (empty($location)) {
            $errors['location'] = "Location is Required";
        }
    }

    if (!empty($_FILES['about_image']['name'])) {

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($_FILES['about_image']['type'], $allowedTypes)) {

            $errors['about_image'] = "Only JPEG, PNG and WebP allowed";
        } else {

            $uploadsDir = __DIR__ . '/../uploads/settings';

            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }

            $fileName = time() . "-" . basename($_FILES['about_image']['name']);
            $targetPath = $uploadsDir . "/" . $fileName;

            if (move_uploaded_file($_FILES['about_image']['tmp_name'], $targetPath)) {

                // Delete old image after successful upload
                if (!empty($settings['about_image'])) {

                    $oldImagePath = __DIR__ . "/../uploads/" . $settings['about_image'];

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $aboutImg = "settings/" . $fileName;
            } else {

                $errors['about_image'] = "Image upload failed";
            }
        }
    }

    if (!empty($_FILES['contact_image']['name'])) {

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($_FILES['contact_image']['type'], $allowedTypes)) {

            $errors['contact_image'] = "Only JPEG, PNG and WebP allowed";
        } else {

            $uploadsDir = __DIR__ . '/../uploads/settings';

            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }

            $fileName = time() . "-" . basename($_FILES['contact_image']['name']);
            $targetPath = $uploadsDir . "/" . $fileName;

            if (move_uploaded_file($_FILES['contact_image']['tmp_name'], $targetPath)) {

                // Delete old image after successful upload
                if (!empty($settings['contact_image'])) {

                    $oldImagePath = __DIR__ . "/../uploads/" . $settings['contact_image'];

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $contactImage = "settings/" . $fileName;
            } else {

                $errors['contact_image'] = "Image upload failed";
            }
        }
    }


    if (empty($errors)) {
        $sql = "UPDATE settings SET website_name =?, website_footer =?, about_title =?, about_details =?, about_image=?,phone = ?, email =?, location=?,contact_image=?,map_location=? WHERE id=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$websiteName, $websiteFooter, $aboutTitle, $aboutDetails, $aboutImg, $phone, $email, $location, $contactImage, $mapLocation]);
        header("Location: /admin/settings");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php require_once __DIR__ . "/includes/head.php" ?>
<!-- head -->

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once __DIR__ . "/includes/sidebar.php" ?>
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <?php require_once __DIR__ . "/includes/topbar.php" ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Settings</h1>

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Settings
                            </li>
                        </ol>
                    </div>
                    <?php if ($currentUser['role'] !== 'admin'): ?>
                        <div class="table-responsive text-center">
                            <h2>Only Admin can access Settings!</h2>
                        </div>
                    <?php else : ?>
                        <div class="row">

                            <!-- Website Settings -->
                            <div class="col-lg-12 mb-4">
                                <div class="card shadow p-0">
                                    <div class="card-header pt-3 d-flex justify-content-center pb-0">
                                        <h6 class="font-weight-bold mr-4 pointer btn" id="generalBtn">
                                            General Settings
                                        </h6>
                                        <h6 class="font-weight-bold mr-4 pointer btn" id="aboutBtn">
                                            About Page
                                        </h6>
                                        <h6 class="font-weight-bold mr-4 pointer btn" id="contactBtn">
                                            Contact Page
                                        </h6>
                                    </div>
                                    <hr class="mt-0 mb-4">


                                    <!-- General Settings  -->
                                    <div class="card-body" id="generalDiv">

                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label>Website Name</label>
                                                <input
                                                    type="text"
                                                    name="website_name"
                                                    class="form-control"
                                                    placeholder="Enter website name" value="<?= $settings['website_name'] ?>">
                                                <p class="text-danger"><?= isset($errors['website_name']) ? $errors['website_name'] : ''; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Website Footer</label>
                                                <input
                                                    type="text"
                                                    name="website_footer"
                                                    class="form-control"
                                                    placeholder="Enter website Footer" value="<?= $settings['website_footer'] ?>">
                                                <p class="text-danger"><?= isset($errors["website_footer"]) ? $errors["website_footer"] : ''; ?></p>
                                            </div>

                                            <button type="submit" name="general_settings" class="btn btn-primary">
                                                Save Settings
                                            </button>

                                        </form>

                                    </div>

                                    <!-- About Page Settings -->
                                    <div class="card-body" id="aboutDiv">

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>About Title</label>
                                                <input
                                                    type="text"
                                                    name="about_title"
                                                    class="form-control"
                                                    placeholder="Enter about title" value="<?= $settings['about_title'] ?>">
                                                <p class="text-danger"><?= isset($errors["about_title"]) ? $errors["about_title"] : ''; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="about_details">About Details</label>
                                                <textarea
                                                    type="text"
                                                    name="about_details"
                                                    class="form-control" style="height:200px" id="about_details"
                                                    placeholder="Enter About details"><?= $settings['about_details'] ?>
                                            </textarea>
                                                <p class="text-danger"><?= isset($errors["about_details"]) ? $errors["about_details"] : ''; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="about_image">About Image</label>
                                                <input type="file" class="form-control fileUpload" name="about_image" aria-describedby="about_image">


                                                <?php if (!empty($settings['about_image'])) : ?>
                                                    <img src="<?= BASE_URL . 'uploads/' . $settings['about_image'] ?>"
                                                        width="300"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['about_image']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                            </div>

                                            <button type="submit" name="about_settings" class="btn btn-primary">
                                                Save Settings
                                            </button>

                                        </form>

                                    </div>

                                    <!-- Contact Page Settings -->

                                    <div class="card-body" id="contactDiv">

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <textarea
                                                    type="tel"
                                                    name="phone"
                                                    class="form-control"
                                                    placeholder="Enter phone number"><?= $settings['phone'] ?></textarea>

                                                <p class="text-danger"><?= isset($errors["phone"]) ? $errors["phone"] : ''; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <textarea
                                                    type="email"
                                                    name="email"
                                                    class="form-control"
                                                    placeholder="Enter website email"><?= trim($settings['email']) ?></textarea>
                                                <p class="text-danger"><?= isset($errors["email"]) ? $errors["email"] : ''; ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input
                                                    type="text"
                                                    name="location"
                                                    class="form-control"
                                                    placeholder="Enter location" value="<?= $settings['location'] ?>">
                                                <p class="text-danger"><?= isset($errors["location"]) ? $errors["location"] : ''; ?></p>
                                            </div>

                                            <div class="form-group">
                                                <label for="contact_image">Contact Image</label>
                                                <input type="file" class="form-control fileUpload" name="contact_image" aria-describedby="contact_image">


                                                <?php if (!empty($settings['contact_image'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['contact_image']) ? BASE_URL . 'uploads/' . $settings['contact_image'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['contact_image']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Map Location</label>
                                                <textarea
                                                    type="text"
                                                    name="map_location"
                                                    class="form-control" style="height: 8rem;"
                                                    placeholder="Enter location link"><?= $settings['map_location']; ?></textarea>

                                            </div>

                                            <button type="submit" name="contact_settings" class="btn btn-primary">
                                                Save Settings
                                            </button>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!---Container Fluid-->
            </div>
            <?php require_once __DIR__ . "/includes/modal.php"  ?>
            <!-- Footer -->
            <?php require_once __DIR__ . "/includes/footer.php" ?>
            <!-- footer -->

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once __DIR__ . "/includes/script.php" ?>
    <script>
        let generalBtn = document.getElementById('generalBtn');
        let generalDiv = document.getElementById('generalDiv');

        let aboutBtn = document.getElementById('aboutBtn');
        let aboutDiv = document.getElementById('aboutDiv');

        let contactBtn = document.getElementById('contactBtn');
        let contactDiv = document.getElementById('contactDiv');

        generalBtn.classList.add('btn-primary', 'text-white');
        aboutBtn.classList.add('text-primary');
        contactBtn.classList.add('text-primary');
        aboutDiv.classList.add('d-none');
        contactDiv.classList.add('d-none');

        generalBtn.addEventListener('click', function() {

            generalDiv.classList.remove('d-none')
            aboutDiv.classList.add('d-none')
            contactDiv.classList.add('d-none')
            aboutBtn.classList.add('text-primary')
            aboutBtn.classList.remove('btn-primary', 'text-white')
            contactBtn.classList.add('text-primary')
            contactBtn.classList.remove('btn-primary', 'text-white')
            generalBtn.classList.remove('text-primary')
            generalBtn.classList.add('btn-primary', 'text-white')

        })

        aboutBtn.addEventListener('click', function() {

            aboutDiv.classList.remove('d-none')
            generalDiv.classList.add('d-none')
            contactDiv.classList.add('d-none')
            generalBtn.classList.add('text-primary')
            generalBtn.classList.remove('btn-primary', 'text-white')
            contactBtn.classList.add('text-primary')
            contactBtn.classList.remove('btn-primary', 'text-white')
            aboutBtn.classList.remove('text-primary')
            aboutBtn.classList.add('btn-primary', 'text-white')

        })

        contactBtn.addEventListener('click', function() {

            contactDiv.classList.remove('d-none')
            aboutDiv.classList.add('d-none')
            generalDiv.classList.add('d-none')
            generalBtn.classList.add('text-primary')
            generalBtn.classList.remove('btn-primary', 'text-white')
            aboutBtn.classList.add('text-primary')
            aboutBtn.classList.remove('btn-primary', 'text-white')
            contactBtn.classList.remove('text-primary')
            contactBtn.classList.add('btn-primary', 'text-white')

        })


        document.querySelectorAll('.fileUpload').forEach(function(input) {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const preview = e.target.closest('.form-group').querySelector('.previewImg');
                    if (preview) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            preview.src = event.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });
        });
    </script>
</body>

</html>