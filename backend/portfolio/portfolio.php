<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";

try {
    $sql = "SELECT * FROM portfolios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching Portfolios: " . $e->getMessage());
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
                        <h1 class="h3 mb-0 text-gray-800">Portfolios</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item">Portfolios </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/portfolio/create">Portfolio Create</a></li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Portfolio List</h6>
                                    <a class="text-white bg-primary py-2 px-1 rounded" href="/admin/portfolio/create">
                                        <i class="fa-regular fa-square-plus fa-xl"></i>
                                    </a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">

                                        <thead class="thead-light">
                                            <tr>
                                                <th>SL</th>
                                                <th>Website Name</th>
                                                <th>Website link</th>
                                                <th>Type</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($portfolios)): ?>
                                                <?php foreach ($portfolios as $portfolio): ?>
                                                    <tr>
                                                        <td><?= $portfolio['id'] ?></td>
                                                        <td><?= $portfolio['website_name'] ?></td>
                                                        <td><?= $portfolio['website_link'] ?></td>
                                                        <td><?= $portfolio['type'] ?></td>
                                                        <td>
                                                            <?= date("d M Y", strtotime($portfolio['created_at'])) ?>
                                                        </td>
                                                        <td>
                                                            <?= !empty($portfolio['updated_at']) ? date("d M Y", strtotime($portfolio['updated_at'])) : ''; ?>
                                                        </td>
                                                        <td class="flex">
                                                            <a href="/admin/portfolio/edit?id=<?php echo $portfolio['id']; ?>" class="btn btn-primary p-1 mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            <a href="/admin/portfolio/delete?id=<?php echo $portfolio['id'] ?>"
                                                                onclick="return confirm('Are you sure you want to delete this portfolio?')" class="btn btn-danger p-1"><i class="fa-solid fa-trash text-white"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5" class="text-center">No portfolios found!</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="card-footer"></div>
                            </div>

                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- moda  -->
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
</body>

</html>