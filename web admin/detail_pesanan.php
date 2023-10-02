<?php 
include '../koneksi.php';
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Cafe | Cabang Semarang</title>
  <!--Logo Title-->
  <link rel="icon" type="image/x-icon" href="../gambar/skanilan.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../gambar/skanilan.png" alt="Logo Smart Cafe" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin_home.php" class="brand-link">
      <img src="../gambar/skanilan.png" alt="Logo Smart Cafe" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 18px;">Smart Cafe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../gambar/person.png" width="23px" height="23px" alt="User Image">
        </div>
        <div class="info">
          <span>
            <?php echo $_SESSION['login_user']; ?>
          </span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="admin_home.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tambah_menu.php"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="daftar_menu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Menu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pesanan.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <img src="../gambar/SignOut.png" width="23px" height="23px">&nbsp;&nbsp;&nbsp;
              <p>
                Sign Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pesanan Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="color: #C8C8C8;">
              <li><i class="nav-icon fas fa-tachometer-alt"></i></li>&nbsp;&nbsp;
              <li><a href="dashboard.php" style="color: #C8C8C8;">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"  style="color: #E2E2E2; font-family: Thinking Of Betty; font-size: 15px">Tabel&nbsp;&nbsp;Detail&nbsp;&nbsp;Pesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                        <tr class="align-middle" style="text-align: center; color: white;">
                            <th>No.</th>
                            <th>ID Pemesanan</th>
                            <th>Nama Pesanan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                        </tr>
                  </thead>
                  <tbody>
                    <?php $nomor=1; ?>
                    <?php $totalpesanan = 0; ?>
                    <?php 
                        $ambil = $koneksi->query("SELECT * FROM pesanan JOIN menu ON pesanan.id_menu=menu.id_menu 
                            WHERE pesanan.id_pemesanan='$_GET[id]'");
                    ?>
                    <?php while ($pecah=$ambil->fetch_assoc()) { ?>
                    <?php $subharga1=$pecah['harga']*$pecah['qty']; ?>
                    <tr>
                        <th scope="row"><?php echo $nomor; ?></th>
                        <td><?php echo $pecah['id_pesanan']; ?></td>
                        <td><?php echo $pecah['nama']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                        <td><?php echo $pecah['qty']; ?></td>
                        <td>
                        Rp. <?php echo number_format($pecah['harga']*$pecah['qty']); ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalpesanan+=$subharga1; ?>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Total Bayar</th>
                            <th>Rp. <?php echo number_format($totalpesanan) ?></th>
                        </tr>
                    </tfoot>
                </table><br>

                <form method="POST" action="pesanan.php">
                    <a href="pesanan.php" class="btn btn-success btn-sm">Kembali</a>
                    <button class="btn btn-primary btn-sm" name="bayar">Konfirmasi Pembayaran</button>
                </form>  
                  <?php 
                    if(isset($_POST["bayar"]))
                    {
                      echo "<script>alert('Pesanan Telah Dibayar !');</script>";
                      echo "<script>location= 'pesanan.php'</script>";
                    }
                  ?>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022</strong> <strong style="color: blue;">Rizal Ahmad Maulana</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../template/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../template/plugins/raphael/raphael.min.js"></script>
<script src="../template/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../template/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../template/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../template/dist/js/pages/dashboard2.js"></script>
</body>
</html>