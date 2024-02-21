<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require 'sidebar.php'; ?>   
     <!-- Main Content -->
      <div id="content">

<?php require 'navbar.php'; ?> 

<div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pendapatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
    <form action="tambah-pendapatan.php" method="get">
        <div class="modal-body">
          Nama : 
         <input type="text" class="form-control" name="nama" required>
         No. Telp : 
         <input type="text" class="form-control" name="no_telp" required>
         Nominal : 
         <input type="text" class="form-control" name="nominal" required>
         Sumber : 
         <input type="text" class="form-control" name="sumber" required>
                    Keterangan : 
                    <select class="form-control" name="id_keterangan">
                        <?php
                        $query_keterangan = mysqli_query($koneksi, "SELECT * FROM keterangan");
                        while ($row_keterangan = mysqli_fetch_assoc($query_keterangan)) {
                            echo '<option value="'.$row_keterangan['id_keterangan'].'">'.$row_keterangan['jenis'].'</option>';
                        }
                        ?>
                    </select>
         Tanggal : 
         <input type="date" class="form-control" name="tanggal" required>
         
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
    <button type="submit" class="btn btn-success" >Tambah</button>
    </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>
  </div>

            <!-- Begin Page Content -->
        <div class="container-fluid">
   <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
    </div>
    <div class="card-body">
        <?php
        $query_sumber = mysqli_query($koneksi, "SELECT * FROM keterangan");
        while ($row_sumber = mysqli_fetch_assoc($query_sumber)) {
            $id_keterangan = $row_sumber['id_keterangan'];
            $nama_sumber = $row_sumber['jenis'];
            $query_jumlah = mysqli_query($koneksi, "SELECT SUM(nominal) AS total_jumlah FROM pemasukan WHERE id_keterangan = '$id_keterangan'");
            // Periksa apakah query berhasil dieksekusi
            if ($query_jumlah) {
                $total_jumlah_row = mysqli_fetch_assoc($query_jumlah);
                // Pastikan total_jumlah tidak null sebelum mengaksesnya
                $total_jumlah = isset($total_jumlah_row['total_jumlah']) ? $total_jumlah_row['total_jumlah'] : 0;
            } else {
                $total_jumlah = 0;
            }
            $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS total_transaksi FROM pemasukan WHERE id_keterangan = '$id_keterangan'");
            // Periksa apakah query berhasil dieksekusi
            if ($query_count) {
                $total_transaksi_row = mysqli_fetch_assoc($query_count);
                // Pastikan total_transaksi tidak null sebelum mengaksesnya
                $total_transaksi = isset($total_transaksi_row['total_transaksi']) ? $total_transaksi_row['total_transaksi'] : 0;
            } else {
                $total_transaksi = 0;
            }
            $progress_width = $total_transaksi * 10;
            echo '
                <h4 class="small font-weight-bold">'.$nama_sumber.'<span class="float-right">Rp. '.number_format($total_jumlah, 2, ',', '.').'</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:'.$progress_width.'%" aria-valuenow="'.$progress_width.'" aria-valuemin="0" aria-valuemax="100">'.$total_transaksi.' Kali</div>
                </div>';
        }
        ?>
    </div>
</div>

        </div>
        
        
        <div class="col-lg-6">
                      <!-- Collapsable Card Example -->
              
              </div>
                    
          </div>
          
          
          
                   <!-- DataTales Example -->
                   <div class="row">
  <div class="col">
             <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Pemasukan</i></button><br>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <!-- Fitur pencarian -->
                    <div class="search-container">
                        <input type="text" id="myInput" placeholder="Search...">
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                    <!-- Tombol navigasi halaman -->
                    <div>
                        <button type="button" class="btn btn-primary">Previous</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <!-- Isi tabel -->
                    </table>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Pemasukan</th>
                      <th>Nama</th>
                      <th>No Telp</th>
                      <th>Nominal</th>
                      <th>Sumber</th>
                      <th>Keterangan</th>
                      <th>Tanggal</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM pemasukan");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data['id_pemasukan']?></td>
                      <td><?=$data['nama']?></td>
                      <td><?=$data['no_telp']?></td>
                      <td><?=$data['nominal']?></td>
                      <td><?=$data['sumber']?></td>
                      <td>
                      <?php
                      $id_keterangan = $data['id_keterangan']; // Menetapkan nilai $id_keterangan dari $data['id_keterangan']
                      $query_sumber = mysqli_query($koneksi, "SELECT jenis FROM keterangan WHERE id_keterangan = '$id_keterangan'");
                      $sumber_nama = mysqli_fetch_assoc($query_sumber)['jenis'];
                      echo $sumber_nama;
                      ?>
                      </td>
                      <td><?= date('Y-m-d', strtotime($data['tanggal'])) ?></td>
                      
                      <td>
                        <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_pemasukan']; ?>"></a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_pemasukan']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Pemasukan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-pemasukan.php" method="get">

<?php
$id = $data['id_pemasukan']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">

<div class="form-group">
<label>Id</label>
<input type="text" name="id_pemasukan" class="form-control" value="<?php echo $row['id_pemasukan']; ?>" disabled>      
</div>

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>      
</div>

<div class="form-group">
<label>No Telp</label>
<input type="text" name="no_telp" class="form-control" value="<?php echo $row['no_telp']; ?>" required>      
</div>

<div class="form-group">
<label>Nominal</label>
<input type="text" name="nominal" class="form-control" value="<?php echo $row['nominal']; ?>" required>      
</div>

<div class="form-group">
<label>Sumber</label>
<input type="text" name="sumber" class="form-control" value="<?php echo $row['sumber']; ?>" required>      
</div>

<div class="form-group">
<label>Keterangan</label>

<?php
if ($row['id_keterangan'] == 1){
  $querynama1 = mysqli_query($koneksi, "SELECT jenis FROM keterangan where id_keterangan=1");
  $querynama1 = mysqli_fetch_array($querynama1);
} else if ($row['id_keterangan'] == 2){
  $querynama2 = mysqli_query($koneksi, "SELECT jenis FROM keterangan where id_keterangan=2");
  $querynama2 = mysqli_fetch_array($querynama2);
} else if ($row['id_keterangan'] == 3){
  $querynama3 = mysqli_query($koneksi, "SELECT jenis FROM keterangan where id_keterangan=3");
  $querynama3 = mysqli_fetch_array($querynama3);
}
?>

<select class="form-control" name='id_keterangan'>
<?php 
$queri = mysqli_query($koneksi, "SELECT * FROM keterangan");
  $no = 1;
  $noo = 1;
while($querynama = mysqli_fetch_array($queri)){

echo '<option value="'.$no++.'">'.$noo++.'.'.$querynama["jenis"].'</option>';
}
?>
</select>     


<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" required>      
</div>





</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<a href="hapus-pemasukan.php?id_pemasukan=<?=$row['id_pemasukan'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



 <!-- Modal -->
  



<?php               
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
