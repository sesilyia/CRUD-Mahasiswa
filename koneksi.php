<?php 

$conn = mysqli_connect("localhost", "root", "", "informatika");

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//tambah data
function tambahData($data) {
    global $conn;

    $nama = htmlspecialchars($data["namaData"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO mahasiswa (nama, asal) VALUES ('$nama', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

//ubah data
function ubahData($ubah) {
    global $conn;

    $id = $ubah["id"];
    $nama = htmlspecialchars($ubah["nama"]);
    $asal = htmlspecialchars($ubah["asal"]);

    $query = "UPDATE mahasiswa SET nama = '$nama', asal = '$asal' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


//hapus data
function hapusData($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);

}
?>