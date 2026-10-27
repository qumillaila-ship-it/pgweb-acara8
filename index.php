<?php
// 1. Pengaturan Koneksi ke Database
$servername = "localhost";
$username   = "root";
$password   = ""; // Kosongkan jika menggunakan XAMPP standar (tanpa password)
$dbname     = "data_kec"; // Sesuaikan jika nama databasemu berbeda

// 2. Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Cek Koneksi (Apakah berhasil terhubung?)
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// 4. Perintah SQL untuk mengambil seluruh data dari tabel penduduk
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";
// 5. Tampilkan data ke halaman web
if ($result->num_rows > 0) {
    // Membuat tabel HTML
    echo "<table border='1px' cellpadding='8' cellspacing='0'>
            <tr>
                <th>id</th>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas</th>
                <th>Jumlah Penduduk</th>
            </tr>";

    // Menampilkan baris demi baris dari data yang ada di database
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                 <td>" . $row["id"] . "</td>
                <td>" . $row["kecamatan"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td>" . $row["luas"] . "</td>
                <td align='right'>" . $row["jumlah_penduduk"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// 6. Menutup koneksi database
$conn->close();
?>