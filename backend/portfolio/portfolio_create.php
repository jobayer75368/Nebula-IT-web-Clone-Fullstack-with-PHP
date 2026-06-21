<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";


$website_name = $website_link = $type = "";
$errors = [];

function sanitize(string $data)
{
    $data = trim(htmlspecialchars($data));
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $website_name = sanitize($_POST['website_name']);
    $website_link = sanitize($_POST['website_link']);
    $type = sanitize($_POST['type']);

    if (empty($_POST['website_name'])) {
        $errors['website_name'] = "Website Name is required";
    }
    if (empty($_POST['website_link'])) {
        $errors['website_link'] = "Website Link is required";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO portfolios (website_name,website_link,type)
                    VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$website_name, $website_link, $type]);
        header("Location: /admin/portfolio");
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
                        <h1 class="h3 mb-0 text-gray-800">Create Portfolio</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item">
                                <a href="/admin/Portfolios">Portfolios</a>
                            </li>
                            <li class="breadcrumb-item">
                                Portfolio Create
                            </li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="table-responsive p-3">
                                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">

                                        <div class="form-group mb-3">
                                            <label for="title">Website Name</label>
                                            <input type="text" class="form-control" id="website_name" name="website_name" aria-describedby="website_name" placeholder="Enter Website Name" value="<?php echo $website_name ?>">

                                            <p class="text-danger"><?php echo isset($errors['website_name']) ? $errors['website_name'] : ""; ?></p>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="website_link">Website Link</label>
                                            <input type="url" class="form-control" id="website_link" name="website_link" aria-describedby="website_link" placeholder="Enter Website Link" value="<?php echo $website_link ?>">

                                            <p class="text-danger"><?php echo isset($errors['website_link']) ? $errors['website_link'] : ""; ?></p>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="type">Website Type</label>
                                            <input type="text" class="form-control" id="type" name="type" aria-describedby="type" placeholder="Enter Website Type" value="<?php echo $type ?>">

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
    <?php require_once __DIR__ . "/../includes/script.php" ?>
</body>

</html>