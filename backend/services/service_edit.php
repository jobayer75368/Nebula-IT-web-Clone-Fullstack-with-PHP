<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";

$id = $_GET['id'] ?? null;

$statement = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$statement->execute([$id]);
$service = $statement->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    die("Service not found");
}

// Keep old image by default
$featured_image = $service['featured_image'];

$title = $service_icon = $featured_description = $slug = $detail_title = $short_description = $long_description = $status = "";
$errors = [];

function sanitize(string $data)
{
    return trim($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitize($_POST['title']);
    $service_icon = $_POST['service_icon'];
    $featured_description = sanitize($_POST['featured_description']);
    $detail_title = sanitize($_POST['detail_title']);

    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];
    $status = sanitize($_POST['status']);

    if (empty($_POST['title'])) {

        $errors['title'] = "Service Title is required";
    }
    if (empty($_POST['service_icon'])) {

        $errors['service_icon'] = "Service Icon is required";
    }

    if (!empty($_POST['slug'])) {
        $slug = sanitize($_POST['slug']);
        $slug = strtolower(str_replace(' ', '-', $slug));
    } else {
        $errors['slug'] = "Slug is required";
    }
    if (empty($_POST['detail_title'])) {

        $errors['detail_title'] = "Detail Title is required";
    }

    if (empty($_POST['status'])) {
        $errors['status'] = "Status is required";
    }

    // Handle image upload
    if (!empty($_FILES['featured_image']['name'])) {

        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($_FILES['featured_image']['type'], $allowedTypes)) {

            $errors['featured_image'] = "Only JPEG, PNG and WebP allowed";
        } else {

            $uploadsDir = __DIR__ . "/../../uploads/services";

            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }

            $fileName = time() . "-" . basename($_FILES['featured_image']['name']);
            $targetPath = $uploadsDir . "/" . $fileName;

            if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetPath)) {

                // Delete old image after successful upload
                if (!empty($service['featured_image'])) {

                    $oldImagePath = __DIR__ . "/../../uploads/" . $service['featured_image'];

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $featured_image = "services/" . $fileName;
            } else {

                $errors['featured_image'] = "Image upload failed";
            }
        }
    }

    if (empty($errors)) {

        $sql = "UPDATE services
                SET title = ?,
                service_icon=?,
                featured_description=?,
                    slug = ?,
                    detail_title=?,
                    short_description = ?,
                    long_description = ?,
                    featured_image = ?,
                    status = ?
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $title,
            $service_icon,
            $featured_description,
            $slug,
            $detail_title,
            $short_description,
            $long_description,
            $featured_image,
            $status,
            $id
        ]);

        header("Location: /admin/services");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php require_once __DIR__ . "/../includes/head.php" ?>
<!-- head -->

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once __DIR__ . "/../includes/sidebar.php" ?>
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <?php require_once __DIR__ . "/../includes/topbar.php" ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/services">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Edit Service</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <div class="card">

                                <div class="table-responsive p-3">
                                    <form action="" method="Post" autocomplete="off" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="title">Service Title</label>
                                            <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter Title" value="<?= htmlspecialchars($service['title']) ?>">

                                            <p class="text-danger"><?php echo isset($errors['title']) ? $errors['title'] : ""; ?></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="service_icon">Service Icon</label>
                                            <input type="text" class="form-control" id="service_icon" name="service_icon" aria-describedby="service_icon" placeholder="Enter Icon" value="<?= htmlspecialchars($service['service_icon']) ?>">

                                            <p class="text-danger"><?php echo isset($errors['service_icon']) ? $errors['service_icon'] : ""; ?></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="featured_description">Featured Description</label>
                                            <textarea class="form-control" id="featured_description" name="featured_description" aria-describedby="featured_description" placeholder="Enter Featured Description"><?= $service['featured_description'] ?></textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" aria-describedby="slug" placeholder="Enter Slug" value="<?php echo $service['slug'] ?>">

                                            <p class="text-danger"><?php echo isset($errors['slug']) ? $errors['slug'] : ""; ?></p>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="detail_title">Detail Title</label>
                                            <input type="text" class="form-control" id="detail_title" name="detail_title" aria-describedby="detail_title" placeholder="Enter Detail Title" value="<?= $service['detail_title'] ?>">

                                            <p class="text-danger"><?php echo isset($errors['detail_title']) ? $errors['detail_title'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="short_description">Short Description</label>
                                            <textarea class="summernote" id="short_description" name="short_description" aria-describedby="short_description"><?php echo $service['short_description'] ?>
                                                </textarea>

                                            <p class="text-danger"><?php echo isset($errors['short_description']) ? $errors['short_description'] : ""; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="summernote">Long Description</label>
                                            <textarea id="summernote" class="summernote" name="long_description" aria-describedby="long_description"><?php echo $service['long_description']; ?>
                                            </textarea>

                                            <p class="text-danger"><?php echo isset($errors['long_description']) ? $errors['long_description'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured_image">Featured Image</label>
                                            <input type="file" class="form-control" id="featured_image" name="featured_image" aria-describedby="featured_image" placeholder="Enter Featured image" value="<?php echo $service['featured_image'] ?>">

                                            <!-- Image preview  -->
                                            <img id="image-preview" src="<?= BASE_URL . 'uploads/' . $service['featured_image'] ?>" height="100" class="rounded border">


                                            <p class="text-danger"><?php echo isset($errors['featured_image']) ? $errors['featured_image'] : ""; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>

                                            <select class="form-control" name="status" id="status">

                                                <option value="active" <?php echo $service['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                                                <option value="inactive" <?php echo $service['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>

                                            </select>
                                        </div>

                                        <div class="mt-3">
                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer"></div>
                            </div>

                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- modal  -->
            <?php require_once __DIR__ . "/../includes/modal.php"  ?>
            <!-- Footer -->
            <?php require_once __DIR__ . "/../includes/footer.php" ?>
            <!-- footer -->

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once __DIR__ . "/../includes/script.php" ?>
    <script>
        previewImage('featured_image', 'image-preview');
    </script>
</body>

</html>