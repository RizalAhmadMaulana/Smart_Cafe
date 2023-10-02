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
  <title>Smart Cafe | Tambah Menu</title>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tambah_menu.php"class="nav-link active">
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
            <h1 class="m-0">Tambah Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="color: #C8C8C8;">
              <li><i class="nav-icon fas fa-tachometer-alt"></i></li>&nbsp;&nbsp;
              <li><a href="admin_home.php" style="color: #C8C8C8;">Dashboard /</a></li>
              <li class="breadcrumb-item"><a href="daftar_menu.php" style="color: #E2E2E2;">&nbsp;&nbsp;Daftar Menu</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH MENU</h3>
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col" style="margin-left: 50px; margin-right:100px;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header"></div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Menu :</label>
                    <input type="text" class="form-control" name="kode_menu" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Menu :</label>
                    <input type="text" class="form-control" name="nama" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga :</label>
                    <input type="text" class="form-control" name="harga" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="gambar">Gambar :</label>
                    <input type="file" class="form-control-file border" id="gambar" name="file" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori :</label>
                    <select name="kategori" class="form-control" required required autocomplete="off">
                            <option selected value="">--Pilih Kategori--</option>
                            <option>Minuman</option>
                            <option>Makanan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="#">Status :</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Tersedia" name="status" checked>Tersedia 
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Tidak Tersedia" name="status">Tidak Tersedia
                        </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
                  <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                </div>
              </form>
              <?php 
                if(isset($_POST['submit'])){
                    $kode_menu = $_POST['kode_menu'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $file = $_FILES['file']['name'];
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $kategori = $_POST['kategori'];
                    $status = $_POST['status'];
                    

                    move_uploaded_file($tmp_name, "../upload/".$file);
                    $insert = mysqli_query($koneksi, "INSERT INTO menu (kode_menu, nama, harga, gambar, kategori, status) VALUES ('$kode_menu', '$nama', '$harga', '$file', '$kategori', '$status')");

                    if($insert){
                    echo "<script>alert('Data berhasil ditambahkan')</script>";
                    header("Refresh:0; url= daftar_menu.php");
                    }
                    else {
                      echo "<script>alert('Data gagal ditambahkan')</script>";
                      header("Refresh:0; url= tambah_menu.php?status=gagal");
                    }
                }
               ?>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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