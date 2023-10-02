<?php 
include '../koneksi.php';
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: ../login.php");
}

if(empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"]))
{
  echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
  echo "<script>location= 'daftar_menu.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Smart Cafe | Rekap Menu</title>
    <!--Logo Title-->
    <link rel="icon" type="image/x-icon" href="../gambar/skanilan.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/adminlte.min.css" />
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="../gambar/skanilan.png" alt="Logo Smart Cafe" height="100" width="100" />
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
        <a href="user_home.php" class="brand-link">
          <img src="../gambar/skanilan.png" alt="Logo Smart Cafe" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
          <span class="brand-text font-weight-light" style="font-size: 18px">Smart Cafe</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../gambar/person.png" width="23px" height="23px" alt="User Image" />
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
            <a href="user_home.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="daftar_menu.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Menu
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="pesanan_pembeli.php" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pesanan Anda
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
                <h1 class="m-0">Rekap Menu</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="color: #c8c8c8">
                  <li><i class="nav-icon fas fa-tachometer-alt"></i></li>
                  &nbsp;&nbsp;
                  <li><a href="user_home.php" style="color: #c8c8c8">Dashboard /</a></li>
                  <li class="breadcrumb-item"><a href="tambah_menu.php" style="color: #e2e2e2">&nbsp;&nbsp;Tambah Menu</a></li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"  style="color: #E2E2E2; font-family: Thinking Of Betty; font-size: 15px">Tabel&nbsp;&nbsp;Pesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-hover">
                  <thead>
                        <tr class="align-middle" style="text-align: center;">
                            <th>No</th>
                            <th>Nama Pesanan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>SubHarga</th>
                            <th colspan="2">Opsi</th>
                        </tr>
                  </thead>
                  <tbody>
                    <?php $nomor=1; ?>
                    <?php $totalpesanan = 0; ?>
                    <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>
                        <?php 
                        include('../koneksi.php');
                        $ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu='$id_menu'");
                        $pecah = $ambil -> fetch_assoc();
                        $subharga = $pecah["harga"]*$jumlah;
                        ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                        <td>
                        <a href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                        <?php $nomor++; ?>
                        <?php $totalpesanan+=$subharga; ?>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total Belanja</th>
                            <th colspan="2">Rp. <?php echo number_format($totalpesanan) ?></th>
                        </tr>
                    </tfoot>
                </table><br>
                <form method="POST" action="">
                    <a href="daftar_menu.php" class="btn btn-primary btn-sm">Lihat Barang</a>
                    <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
                </form>

                <?php 
                if(isset($_POST['konfirm'])) {
                    $waktu=date("Y-m-d");

                    // Menyimpan data ke tabel pemesanan
                    $insert = mysqli_query($koneksi, "INSERT INTO transaksi (waktu, total_pesanan) VALUES ('$waktu', '$totalpesanan')");

                    // Mendapatkan ID barusan
                    $id_terbaru = $koneksi->insert_id;

                    // Menyimpan data ke tabel pemesanan produk
                    foreach ($_SESSION["pesanan"] as $id_menu => $jumlah)
                    {
                        $insert = mysqli_query($koneksi, "INSERT INTO pesanan (id_pemesanan, id_menu, qty) 
                        VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
                    }          

                    // Mengosongkan pesanan
                    unset($_SESSION["pesanan"]);

                    // Dialihkan ke halaman nota
                    echo "<script>alert('Pemesanan Sukses!');</script>";
                    echo "<script>location= 'daftar_menu.php'</script>";
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
      <footer class="main-footer"><strong>Copyright &copy; 2022</strong> <strong style="color: blue">Rizal Ahmad Maulana</strong> All rights reserved.</footer>
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
