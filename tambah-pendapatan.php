<?php
//include('dbconnected.php');
include('koneksi.php');

$nama = $_GET['nama'];
$no_telp = $_GET['no_telp'];
$nominal = $_GET['nominal'];
$sumber = $_GET['sumber'];
$id_keterangan = $_GET['id_keterangan'];
$tanggal = $_GET['tanggal'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`nama`, `no_telp`, `nominal`, `sumber`, `id_keterangan`, `tanggal`) VALUES ('$nama', '$no_telp', '$nominal', '$sumber', '$id_keterangan', '$tanggal')");

if ($query) {
 # credirect ke page index
 header("location:pendapatan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>