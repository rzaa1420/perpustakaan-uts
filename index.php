<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
define('MY_APP', true); // Ini berfungsi untuk proteksi, ada di halaman page.
// Jadi dashboard.php tidak bisa diakses langsung dari url: localhost/pages/dashboard.php dia harus melewati index
// Jadi localhost/index.php?hal=dashboard

// Get hal
$page = isset($_GET['hal']) ? $_GET['hal'] : 'dashboard';
// title untuk di header. ucwords untuk merubah misal ucwords("halaman login") menjadi halaman login
// str_replace digunakan untuk mereplace, misalkan str_replace("-", " ", "halaman-login") hasilnya akan menjadi halaman login
$title = ucwords(str_replace('-', ' ', $page));
?>

<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>

    <body class="sb-nav-fixed">
        <?php include "includes/nav.php" ?>

        <div id="layoutSidenav">
            <?php include "includes/sidebar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <?php 
                    $file = "pages/" . $page . ".php";
                    if(file_exists($file)) {
                        include $file;
                    } else {
                        echo "<h1 class='text-center mt-5'>Halaman tidak ditemukan!</h1>";
                    }
                    ?>
                </main>
                <?php include "includes/footer.php" ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
