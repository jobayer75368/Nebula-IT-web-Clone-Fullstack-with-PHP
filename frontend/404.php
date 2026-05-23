<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/includes/head.php' ?>

<body id="top">

    <!-- sidebar -->
    <?php require_once __DIR__ . '/includes/sidebar.php' ?>
    <!-- header  -->

    <?php require_once __DIR__ . '/includes/header.php' ?>

    <!-- 404 Page Content -->
    <div class="min-h-[100vh] flex items-center justify-center py-12 px-4">
        <div class="text-center max-w-2xl animate-fadeIn">
            <!-- 404 Icon & Number -->
            <div class="mb-8 flex items-center flex-col">
                <i class="fa-solid fa-triangle-exclamation text-6xl md:text-7xl text-red-500 block mb-10"></i>
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900">404</h1>
            </div>

            <!-- Message -->
            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 my-3">
                Page Not Found
            </h2>

            <p class="text-lg text-gray-600 my-6 leading-relaxed">
                Looks like this page took a wrong turn. It might have been moved, deleted, or never existed.
            </p>

            <!-- Navigation Options -->
            <div class="flex flex-wrap gap-4 justify-center mt-8">
                <!-- Home Button -->
                <a href="/" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold transition-all duration-300 hover:bg-blue-700 active:scale-95">
                    <i class="fa-solid fa-house"></i>
                    Go Home
                </a>

                <!-- Back Button -->
                <button onclick="window.history.back();" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-blue-600 border-2 border-blue-600 rounded-lg font-semibold transition-all duration-300 hover:bg-blue-50 active:scale-95">
                    <i class="fa-solid fa-arrow-left"></i>
                    Go Back
                </button>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease-in;
        }
    </style>

    <!-- Footer  -->
    <?php require_once __DIR__ . '/includes/footer.php' ?>
    <a href="#top"><i class="fa-solid fa-angle-up"></i></a>

    <!-- Javascript  -->
    <?php require_once __DIR__ . '/includes/javascript.php' ?>

</body>

</html>