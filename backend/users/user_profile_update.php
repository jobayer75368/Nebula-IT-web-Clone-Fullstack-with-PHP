<?php
require_once __DIR__ . "/../session.php";
require_once __DIR__ . "/../includes/db_connection.php";
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../restrict.php";

$id = $_SESSION['user_id'] ?? null;

$statement = $pdo->prepare("SELECT * FROM users WHERE id=?");
$statement->execute([$id]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    die("User not found");
}

$password = $user['password'];

//update
$name = $email = $oldPassword = $newPassword = $confirmPassword = "";
$errors = [];
function sanitize(string $data)
{
    $data = trim(htmlspecialchars($data));
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $oldPassword = sanitize($_POST['old_password']);
    $newPassword = sanitize($_POST['new_password']);
    $confirmPassword = sanitize($_POST['confirm_password']);

    if (empty($_POST['name'])) {
        $errors['name'] = "Name is required";
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    }

    if (empty($_POST['old_password'])) {
        $errors['old_password'] = "Old Password is required";
    } elseif (!password_verify($oldPassword, $password)) {
        $errors['old_password'] = "Wrong Password!";
    }

    if (empty($_POST['new_password'])) {
        $errors['new_password'] = "Input your New Password!";
    }

    if (empty($confirmPassword)) {
        $errors["confirm_password"] = "Confirm Your New Password!";
    } elseif ($newPassword !== $confirmPassword) {
        $errors["confirm_password"] = "Passwords do not match!";
    }

    if (empty($errors)) {

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name=?, email=?,password=?  WHERE id=?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $hashedPassword, $id]);
        header("Location: /admin/user/profile");
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/user/profile">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Profile Edit</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">

                            <div class="card">

                                <div class="table-responsive p-3">
                                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter Name" value="<?php echo $user['name'] ?>">

                                            <p class="text-danger"><?php echo isset($errors['name']) ? $errors['name'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter Slug" value="<?php echo $user['email'] ?>">

                                            <p class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="old_password" name="old_password" autocomplete="new-password" aria-describedby="old_password" placeholder="Enter Old Password">
                                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="old_password" tabindex="-1">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <p class="text-danger"><?php echo isset($errors['old_password']) ? $errors['old_password'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="new_password" name="new_password" aria-describedby="new_password" placeholder="Enter New Password" value="">
                                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password" tabindex="-1">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <p class="text-danger"><?php echo isset($errors['new_password']) ? $errors['new_password'] : ""; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" aria-describedby="confirm_password" placeholder="Confirm New Password" value="">
                                                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="confirm_password" tabindex="-1">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <p class="text-danger"><?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : ""; ?></p>
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
</body>

</html>