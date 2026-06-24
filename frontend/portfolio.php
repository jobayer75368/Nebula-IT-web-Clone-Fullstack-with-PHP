<?php


require_once __DIR__ . '/../backend/includes/db_connection.php';


// Portfolio 

$allPtflStmt = $pdo->prepare("SELECT * FROM portfolios");
$allPtflStmt->execute();
$allPortfolios = $allPtflStmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<!-- head  -->
<?php require_once __DIR__ . '/includes/head.php' ?>


<body id="top">
    <!-- Sidebar  -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>
    <!-- Header  -->
    <?php require_once __DIR__ . '/includes/header.php' ?>

    <?php require_once __DIR__ . '/includes/page_hero.php' ?>
    <section class="portfolio_section py-8 my-20">
        <div class="container mx-auto px-5 lg:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <?php if (!empty($allPortfolios)): ?>
                    <?php foreach ($allPortfolios as $singlePortfolio): ?>

                        <div class="mt-5 text-[justify]" data-aos="zoom-in" data-aos-duration="700">
                            <div class="preview_card p-4">
                                <div class="grid_site">
                                    <iframe src="<?= !empty($singlePortfolio['website_link']) ? $singlePortfolio['website_link'] : ''; ?>"></iframe>
                                </div>
                                <div class="grid_text flex flex-col justify-center items-center">
                                    <h4 class="font-semibold"><?= !empty($singlePortfolio['website_name']) ? $singlePortfolio['website_name'] : ''; ?> (<?= !empty($singlePortfolio['type']) ? $singlePortfolio['type'] : ''; ?>)</h4>
                                    <a class="secondary_link" href="<?= !empty($singlePortfolio['website_link']) ? $singlePortfolio['website_link'] : ''; ?>" target="_blank">Visit Website</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>


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