<?php

session_start();

include('koneksi.php');

 define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.$log."\n".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}

$id = (int) $_GET['id_pemasukan'];
$nama = abs((int) $_GET['nama']);
$no_telp = abs((int) $_GET['no_telp']);
$nominal = abs((int) $_GET['nominal']);
$sumber =abs((int) $_GET['sumber']);
$id_keterangan =abs((int) $_GET['id_keterangan']);
$tanggal = abs((int) $_GET['tanggal']);

//query update
$query = mysqli_query($koneksi,"UPDATE pemasukan SET nama='$nama' , no_telp='$no_telp', nominal='$nominal', sumber='$sumber', id_keterangan='$id_keterangan', tanggal='$tanggal' WHERE id_pemasukan='$id' ");

$namaadmin = $_SESSION['nama'];
if ($query) {
write_log("Nama Admin : ".$namaadmin." => Edit Pemasukan => ".$id." => Sukses Edit");
 # credirect ke page index
 header("location:pendapatan.php"); 
}
else{
write_log("Nama Admin : ".$namaadmin." => Edit Pemasukan => ".$id." => Gagal Edit");
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>