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

$websiteName = $websiteLogo = $footerLogo = $heroTitle = $heroDetails = $heroImage = $heroCover = $who_we_are = $image_1 = $our_goal = $image_2 = $origin_story = $image_3 = $image_4 = $phone = $email = $location = $contactImage = $mapLocation = "";
$errors = [];
function sanitize(string $data)
{
    $data = trim(htmlspecialchars($data));
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // General Settings 
    $websiteName = $settings['website_name'] ?? '';
    $websiteLogo = $settings['website_logo'] ?? '';
    $footerLogo = $settings['footer_logo'] ?? '';
    // hero     
    $heroTitle = $settings['hero_title'] ?? '';
    $heroDetails = $settings['hero_details'] ?? '';
    $heroImage = $settings['hero_image'] ?? '';
    $heroCover = $settings['hero_cover'] ?? '';

    // about page 
    $who_we_are = $settings['who_we_are'] ?? '';
    $image_1 = $settings['image_1'] ?? '';

    $our_goal = $settings['our_goal'] ?? '';
    $image_2 = $settings['image_2'] ?? '';

    $origin_story = $settings['origin_story'] ?? '';
    $image_3 = $settings['image_3'] ?? '';
    $image_4 = $settings['image_4'] ?? '';

    // contacts 

    $phone = $settings['phone'] ?? '';
    $email = $settings['email'] ?? '';
    $location = $settings['location'] ?? '';
    $contactImage = $settings['contact_image'] ?? '';
    $mapLocation = $settings['map_location'] ?? '';


    // general settings 

    if (isset($_POST['general_settings'])) {
        $websiteName = sanitize($_POST["website_name"] ?? '');
        $heroTitle = $_POST["hero_title"] ?? '';
        $heroDetails = $_POST["hero_details"] ?? '';


        if (empty($websiteName)) {
            $errors['website_name'] = "Website Name is Required";
        }
        if (empty($heroTitle)) {
            $errors['hero_title'] = "Hero Title is Required";
        }

        if (!empty($_FILES['website_logo']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['website_logo']['type'], $allowedTypes)) {

                $errors['website_logo'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['website_logo']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['website_logo']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['website_logo'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['website_logo'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $websiteLogo = "settings/" . $fileName;
                } else {

                    $errors['website_logo'] = "Image upload failed";
                }
            }
        }
        if (!empty($_FILES['footer_logo']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['footer_logo']['type'], $allowedTypes)) {

                $errors['footer_logo'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['footer_logo']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['footer_logo']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['footer_logo'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['footer_logo'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $footerLogo = "settings/" . $fileName;
                } else {

                    $errors['footer_logo'] = "Image upload failed";
                }
            }
        }
        if (!empty($_FILES['hero_image']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['hero_image']['type'], $allowedTypes)) {

                $errors['hero_image'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['hero_image']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['hero_image']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['hero_image'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['hero_image'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $heroImage = "settings/" . $fileName;
                } else {

                    $errors['hero_image'] = "Image upload failed";
                }
            }
        }
        if (!empty($_FILES['hero_cover']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['hero_cover']['type'], $allowedTypes)) {

                $errors['hero_cover'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['hero_cover']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['hero_cover']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['hero_cover'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['hero_cover'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $heroCover = "settings/" . $fileName;
                } else {

                    $errors['hero_cover'] = "Image upload failed";
                }
            }
        }
    }


    // about settings 

    if (isset($_POST['about_settings'])) {
        $who_we_are = $_POST["who_we_are"] ?? '';
        $our_goal = $_POST["our_goal"] ?? '';
        $origin_story = $_POST["origin_story"] ?? '';

        if (empty($who_we_are)) {
            $errors['who_we_are'] = "Introduction is Required";
        }
        if (!empty($_FILES['image_1']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['image_1']['type'], $allowedTypes)) {

                $errors['image_1'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['image_1']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['image_1']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['image_1'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['image_1'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $image_1 = "settings/" . $fileName;
                } else {

                    $errors['image_1'] = "Image upload failed";
                }
            }
        }
        if (!empty($_FILES['image_2']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['image_2']['type'], $allowedTypes)) {

                $errors['image_2'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['image_2']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['image_2']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['image_2'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['image_2'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $image_2 = "settings/" . $fileName;
                } else {

                    $errors['image_2'] = "Image upload failed";
                }
            }
        }
        if (!empty($_FILES['image_3']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['image_3']['type'], $allowedTypes)) {

                $errors['image_3'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['image_3']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['image_3']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['image_3'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['image_3'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $image_3 = "settings/" . $fileName;
                } else {

                    $errors['image_3'] = "Image upload failed";
                }
            }
        }
        if (!empty($_FILES['image_4']['name'])) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($_FILES['image_4']['type'], $allowedTypes)) {

                $errors['image_4'] = "Only JPEG, PNG and WebP allowed";
            } else {

                $uploadsDir = __DIR__ . '/../uploads/settings';

                if (!is_dir($uploadsDir)) {
                    mkdir($uploadsDir, 0755, true);
                }

                $fileName = time() . "-" . basename($_FILES['image_4']['name']);
                $targetPath = $uploadsDir . "/" . $fileName;

                if (move_uploaded_file($_FILES['image_4']['tmp_name'], $targetPath)) {

                    // Delete old image after successful upload
                    if (!empty($settings['image_4'])) {

                        $oldImagePath = __DIR__ . "/../uploads/" . $settings['image_4'];

                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $image_4 = "settings/" . $fileName;
                } else {

                    $errors['image_4'] = "Image upload failed";
                }
            }
        }
    }

    // Contact settings 
    if (isset($_POST['contact_settings'])) {

        $phone = htmlspecialchars($_POST["phone"] ?? '');
        $email = htmlspecialchars($_POST["email"] ?? '');
        $location = sanitize($_POST["location"] ?? '');
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
    }


    if (empty($errors)) {
        $sql = "UPDATE settings SET website_name =?,website_logo=?, footer_logo=?,hero_title =?,hero_details=?,hero_image=?,hero_cover=?, who_we_are =?,image_1=?, our_goal =?,image_2=?,origin_story=?,image_3=?,image_4=? ,phone = ?, email =?, location=?,contact_image=?,map_location=? WHERE id=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$websiteName, $websiteLogo, $footerLogo, $heroTitle, $heroDetails, $heroImage, $heroCover, $who_we_are, $image_1, $our_goal, $image_2, $origin_story, $image_3, $image_4, $phone, $email, $location, $contactImage, $mapLocation]);
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

                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <!-- website name  -->

                                            <div class="form-group">
                                                <label>Website Name</label>
                                                <input
                                                    type="text"
                                                    name="website_name"
                                                    class="form-control"
                                                    placeholder="Enter website name" value="<?= $settings['website_name'] ?>">
                                                <p class="text-danger"><?= isset($errors['website_name']) ? $errors['website_name'] : ''; ?></p>
                                            </div>


                                            <!-- website Logo  -->

                                            <div class="form-group">
                                                <label for="website_logo">Website Logo</label>
                                                <input type="file" class="form-control fileUpload" name="website_logo" aria-describedby="website_logo" id="website_logo">


                                                <?php if (!empty($settings['website_logo'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['website_logo']) ? BASE_URL . 'uploads/' . $settings['website_logo'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['website_logo']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['website_logo']) ? $errors['website_logo'] : ''; ?></p>
                                            </div>


                                            <!-- Footer Logo  -->

                                            <div class="form-group">
                                                <label for="footer_logo">Footer Logo</label>
                                                <input type="file" class="form-control fileUpload" name="footer_logo" aria-describedby="footer_logo" id="footer_logo">


                                                <?php if (!empty($settings['footer_logo'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['footer_logo']) ? BASE_URL . 'uploads/' . $settings['footer_logo'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['footer_logo']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['footer_logo']) ? $errors['footer_logo'] : ''; ?></p>
                                            </div>

                                            <!-- Hero Title  -->

                                            <div class="form-group">
                                                <label>Hero Title</label>
                                                <textarea name="hero_title"
                                                    class="form-control summernote"
                                                    placeholder="Enter website name" id="hero_title"><?= $settings['hero_title'] ?></textarea>
                                                <p class="text-danger"><?= isset($errors['hero_title']) ? $errors['hero_title'] : ''; ?></p>
                                            </div>
                                            <!-- Hero Details  -->

                                            <div class="form-group">
                                                <label for="hero_details">Hero Details</label>
                                                <textarea name="hero_details" class="form-control summernote" id="hero_details"><?= $settings['hero_details'] ?></textarea>

                                            </div>
                                            <!-- hero Image  -->

                                            <div class="form-group">
                                                <label for="hero_image">Hero Image</label>
                                                <input type="file" class="form-control fileUpload" name="hero_image" aria-describedby="hero_image" id="hero_image">


                                                <?php if (!empty($settings['hero_image'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['hero_image']) ? BASE_URL . 'uploads/' . $settings['hero_image'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['hero_image']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['hero_image']) ? $errors['hero_image'] : ''; ?></p>
                                            </div>
                                            <!-- hero Cover  -->

                                            <div class="form-group">
                                                <label for="hero_cover">Hero Cover</label>
                                                <input type="file" class="form-control fileUpload" name="hero_cover" aria-describedby="hero_cover" id="hero_cover">


                                                <?php if (!empty($settings['hero_cover'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['hero_cover']) ? BASE_URL . 'uploads/' . $settings['hero_cover'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['hero_cover']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['hero_cover']) ? $errors['hero_cover'] : ''; ?></p>
                                            </div>


                                            <button type="submit" name="general_settings" class="btn btn-primary">
                                                Save Settings
                                            </button>

                                        </form>

                                    </div>

                                    <!-- About Page Settings -->
                                    <div class="card-body" id="aboutDiv">

                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <!-- Who We Are  -->

                                            <div class="form-group">
                                                <label>Who We Are</label>
                                                <textarea name="who_we_are"
                                                    class="form-control summernote"
                                                    placeholder="Enter Introduciton" id="who_we_are"><?= $settings['who_we_are'] ?></textarea>
                                                <p class="text-danger"><?= isset($errors['who_we_are']) ? $errors['who_we_are'] : ''; ?></p>
                                            </div>

                                            <!-- Image 1  -->

                                            <div class="form-group">
                                                <label for="image_1">Image 1</label>
                                                <input type="file" class="form-control fileUpload" name="image_1" aria-describedby="image_1" id="image_1">


                                                <?php if (!empty($settings['image_1'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['image_1']) ? BASE_URL . 'uploads/' . $settings['image_1'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['image_1']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['image_1']) ? $errors['image_1'] : ''; ?></p>
                                            </div>

                                            <!-- Our Goal  -->

                                            <div class="form-group">
                                                <label>Our Goal</label>
                                                <textarea name="our_goal"
                                                    class="form-control summernote"
                                                    placeholder="Enter Goal" id="our_goal"><?= $settings['our_goal'] ?></textarea>
                                                <p class="text-danger"><?= isset($errors['our_goal']) ? $errors['our_goal'] : ''; ?></p>
                                            </div>

                                            <!-- Image 2  -->

                                            <div class="form-group">
                                                <label for="image_2">Image 2</label>
                                                <input type="file" class="form-control fileUpload" name="image_2" aria-describedby="image_2" id="image_2">


                                                <?php if (!empty($settings['image_2'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['image_2']) ? BASE_URL . 'uploads/' . $settings['image_2'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['image_2']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['image_2']) ? $errors['image_2'] : ''; ?></p>
                                            </div>

                                            <!-- Origin Story  -->

                                            <div class="form-group">
                                                <label>Origin Story</label>
                                                <textarea name="origin_story"
                                                    class="form-control summernote"
                                                    placeholder="Enter Origin Story" id="origin_story"><?= $settings['origin_story'] ?></textarea>
                                                <p class="text-danger"><?= isset($errors['origin_story']) ? $errors['origin_story'] : ''; ?></p>
                                            </div>

                                            <!-- Image 3  -->

                                            <div class="form-group">
                                                <label for="image_3">Image 3</label>
                                                <input type="file" class="form-control fileUpload" name="image_3" aria-describedby="image_3" id="image_3">


                                                <?php if (!empty($settings['image_3'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['image_3']) ? BASE_URL . 'uploads/' . $settings['image_3'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['image_3']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['image_3']) ? $errors['image_3'] : ''; ?></p>
                                            </div>

                                            <!-- Image 4  -->

                                            <div class="form-group">
                                                <label for="image_4">Image 4</label>
                                                <input type="file" class="form-control fileUpload" name="image_4" aria-describedby="image_4" id="image_4">


                                                <?php if (!empty($settings['image_4'])) : ?>
                                                    <img

                                                        src="<?= !empty($settings['image_4']) ? BASE_URL . 'uploads/' . $settings['image_4'] : ''; ?>"
                                                        width="200"
                                                        class="mb-2 d-block previewImg" style="display:<?= !empty($settings['image_4']) ? 'block' : 'none' ?>">
                                                <?php endif; ?>
                                                <p class="text-danger"><?= isset($errors['image_4']) ? $errors['image_4'] : ''; ?></p>
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
                                                <p class="text-danger"><?= isset($errors['contact_image']) ? $errors['contact_image'] : ''; ?></p>
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