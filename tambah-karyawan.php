<?php
include('koneksi.php');

$nama_pondok = $_GET['nama_pondok'];
$santri_ikhwan = $_GET['santri_ikhwan'];
$santri_akhwat = $_GET['santri_akhwat'];
$alamat = $_GET['alamat'];
$kontak = $_GET['kontak'];
$nama_penanggung_jawab = $_GET['nama_penanggung_jawab'];

// Query insert
$query = "INSERT INTO `karyawan` (`nama_pondok`, `santri_ikhwan`, `santri_akhwat`, `alamat`, `kontak`, `nama_penanggung_jawab`) VALUES ('$nama_pondok', '$santri_ikhwan', '$santri_akhwat', '$alamat', '$kontak', '$nama_penanggung_jawab')";

$result = mysqli_query($koneksi, $query);

// Handling error
if ($result) {
    // Redirect ke halaman index
    header("location:karyawan.php"); 
} else {
    // Tampilkan pesan error dan hentikan eksekusi script
    die("ERROR, data gagal ditambahkan: " . mysqli_error($koneksi));
}
?>
