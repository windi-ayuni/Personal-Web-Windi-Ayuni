<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8">
<title>Kelola About</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green 100 min-h-screen">
    <!-- Header -->
    <header class="bg-green 900 text-white text-center py-6 shadow">
        <h1 class="text-3xl font-bold">Kelola Halaman About</h1>
    </header>
    <div class="flex max-w-7xl mx-auto mt-8 px-4">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-white rounded shadow p-4">

            <h2 class="text-xl font-semibold text-green-700 mb-4 text-
center">MENU</h2>

            <ul class="space-y-2 text-gray-700">

                <li><a href="beranda_admin.php" class="block hover:text-green-
600">Beranda</a></li>

                <li><a href="data_artikel.php" class="block hover:text-green-
600">Kelola Artikel</a></li>

                <li><a href="data_gallery.php" class="block hover:text-green-
600">Kelola Gallery</a></li>

                <li><a href="about.php" class="block font-semibold text-green-
800">About</a></li>

                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="block text-red-600 hover:underline font-
medium">Logout</a>

                </li>
            </ul>
        </aside>
        <!-- Main Content -->
        <main class="w-3/4 bg-white rounded shadow p-6 ml-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-green-800">Tentang Saya</h2>
                <a href="add_about.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700

transition">+ Tambah Data</a>
            </div>
            <div class="space-y-4">
                <?php
                $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<div class='p-4 bg-gray-50 border rounded shadow'>";

                    echo "<p class='mb-3'>" . htmlspecialchars($data['about']) .

                        "</p>";

                    echo "<div class='flex space-x-4 text-sm'>";
                    echo "<a href='edit_about.php?id_about={$data['id_about']}'
class='text-blue-600 hover:underline'>Edit</a>";

                    echo "<a href='delete_about.php?id_about={$data['id_about']}'
onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600
hover:underline'>Hapus</a>";
                    echo "</div></div>";
                }
                ?>
            </div>
        </main>
    </div>
    <!-- Footer -->
    <footer class="bg-green-800 text-white text-center py-4 mt-10">
        &copy; <?php echo date('Y'); ?> | Created by Windi Ayuni
    </footer>
</body>

</html>