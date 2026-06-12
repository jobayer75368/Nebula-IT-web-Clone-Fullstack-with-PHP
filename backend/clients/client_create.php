<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";


$name = $image = "";
$errors = [];
function sanitize(string $data)
{
    $data = htmlspecialchars(trim($data));
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    if (empty($_POST['name'])) {

        $errors['name'] = "Client Name is required";
    }


    if (empty($errors)) {
        if (!empty($_FILES['image']['name'])) {


            $uploadsDir = __DIR__ . "/../../uploads/clients";
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }

            $fileName = time() . "-" . $_FILES['image']['name'];
            $targetPath = $uploadsDir . "/" . $fileName;

            if (!in_array($_FILES['image']['type'], $allowedTypes)) {
                $errors['image'] = "Only JPEG, PNG, WebP allowed";
            } else if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $db_Path = "clients/" . $fileName;
                $image = $db_Path;


                $sql = "INSERT INTO clients (name, image)
                    VALUES (:name, :image)";
                $statement = $pdo->prepare($sql);
                $result = $statement->execute([
                    ':name' => $name,
                    ':image' => $image
                ]);
                header("Location: /admin/clients");
                exit;
            }
        }
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
                        <h1 class="h3 mb-0 text-gray-800">Create Client</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item">
                                <a href="/admin/clients">Client List</a>
                            </li>
                            <li class="breadcrumb-item">
                                Client Create
                            </li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="table-responsive p-3">
                                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="name">Client Name</label>
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="title" placeholder="Enter name" value="<?php echo $name ?>">

                                            <p class="text-danger"><?php echo isset($errors['name']) ? $errors['name'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Client Image</label>
                                            <input type="file" class="form-control" id="image" name="image" aria-describedby="image" placeholder="Enter Client Image" value="<?php echo $image ?>">
                                            <!-- Image Preview -->
                                            <div id="preview-wrapper" style="display:none;">
                                                <img id="image-preview" src="#" height="100" class="rounded border">
                                            </div>

                                            <p class="text-danger"><?php echo isset($errors['image']) ? $errors['image'] : ""; ?></p>
                                        </div>
                                        <div class="mt-3">
                                            <input class="btn btn-primary" type="submit" value="submit">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Container Fluid-->
                <!-- modal  -->
                <?php require_once __DIR__ . "/../includes/modal.php"  ?>
            </div>
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
        previewImage('image', 'image-preview', 'preview-wrapper');
    </script>
</body>

</html>