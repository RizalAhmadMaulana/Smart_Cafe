<?php 
include 'koneksi.php';

session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
      }
if (isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];
    $query = "DELETE FROM tborder WHERE id_order=$id_order";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header('Location: order_administrator.php?hapus=sukses');
    } else {
        echo "<script>alert('Data gagal dihapus')</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="gambar/Logo.png" />
    <title>List Order</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="order_administrator.php">Administrator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Order
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Order </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item active" href="order_administrator.php">Data Order</a></li>
                  <li><a class="dropdown-item" href="export_order_administrator.php">Export Order</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Masakan </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="masakan_administrator.php">Data Masakan</a></li>
                  <li><a class="dropdown-item" href="export_masakan_administrator.php">Export Masakan</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Transaksi </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="transaksi_administrator.php">Data Transaksi</a></li>
                  <li><a class="dropdown-item" href="export_transaksi_administrator.php">Export Transaksi</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="laporan_administrator.php">Laporan Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <br /><br /><br /><br />
    <h1 style="text-align: center; font-weight: bold;" class="animate__animated animate__fadeInDown">Data Order</h1><br><br><br>
    <div class="card text-bg-dark mb-3" style="max-width: 1430px; margin-left: 50px; margin-right: 50px;">
      <div class="card-header">Tabel List Order</div>
      <div class="card-body">
      <a href='create_order_administrator.php' class="btn btn-secondary"> Daftar Order</a><br><br>
        <table id="datatablesSimple" class="table table-bordered" >
          <thead style="color: white;">
            <tr>
              <th>Id Order</th>
              <th>Nomor Meja</th>
              <th>Tanggal</th>
              <th>Id_user</th>
              <th>Keterangan</th>
              <th>Status Order</th>
              <th colspan="2">Aksi</th>
            </tr>
          </thead>
          <tbody style="color: white;">
            <tr>
            <?php
              $query = mysqli_query($koneksi, "SELECT * FROM tborder");
                while ($data = mysqli_fetch_array($query)) {
              ?>
            </tr>
            <tr>
              <td><?php echo $data['id_order']; ?></td>
              <td><?php echo $data['no_meja']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['id_user']; ?></td>
              <td><?php echo $data['keterangan']; ?></td>
              <td><?php echo $data['status_order']; ?></td>
              <td><a href='order_administrator.php?id_order="<?= $data['id_order'] ?>"' class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin untuk mengubah?')">Hapus</a></td>
              <td><a href='edit_order_administrator.php?id_order="<?= $data['id_order'] ?>"' class="btn btn-warning btn-sm">Edit</a></td>
            </tr>
              <?php
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="sekrip.js"></script>
  </body>
</html>