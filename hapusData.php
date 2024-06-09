<?php 

require 'koneksi.php';

$id = $_GET["id"];

if (hapusData($id) > 0) {
    echo "<script>
            alert('Data Mahasiswa berhasil dihapus!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa gagal dihapus!');
            document.location.href = index.php';
        </script>";
}

?>