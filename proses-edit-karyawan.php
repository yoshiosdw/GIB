<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_karyawan'];
$nama_pondok = $_GET['nama_pondok'];
$santri_ikhwan = $_GET['santri_ikhwan'];
$santri_akhwat = $_GET['santri_akhwat'];
$alamat = $_GET['alamat'];
$kontak = $_GET['kontak'];
$nama_penanggung_jawab = $_GET['nama_penanggung_jawab'];

//query update
$query = mysqli_query($koneksi,"UPDATE karyawan SET nama_pondok='$nama_pondok' , santri_ikhwan='$santri_ikhwan', santri_akhwat='$santri_akhwat', alamat='$alamat', kontak='$kontak', nama_penanggung_jawab='$nama_penanggung_jawab' WHERE id_karyawan='$id' ");

if ($query) {
 # credirect ke page index
 header("location:karyawan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>