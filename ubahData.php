<?php 
session_start();

require 'koneksi.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["ubahData"])) {
    if (ubahData($_POST) > 0) {
        echo "<script>
            alert('Data mahasiswa berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data mahasiswa gagal diubah!');
            document.location.href = 'index.php';
        </script>";
    }
}

$id = $_GET["id"];
$ubah = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <main class="h-full py-10">
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl text-center font-bold text-gray-900 dark:text-white">UBAH DATA</h2>
                <form action="#" method="post">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <input type="hidden" name="id" value="<?= $ubah["id"]; ?>">
                        <div class="sm:col-span-2">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $ubah["nama"]; ?>" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="asal" name="asal" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><?= $ubah["asal"]; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" name="ubahData" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Ubah Data
                    </button>
                    <a href="index.php" class="inline-flex items-center ml-3 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
                        Batal
                    </a>
                </form>
            </div>
        </section>
    </main>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>