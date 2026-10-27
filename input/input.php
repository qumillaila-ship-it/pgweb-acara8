<?php
$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_kec";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO penduduk (id, kecamatan, longitude, latitude, luas, jumlah_penduduk)
        VALUES ('$id', '$kecamatan', '$longitude', '$latitude', $luas, $jumlah_penduduk)";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php"); // Kembali ke halaman utama setelah sukses
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>