<?php 
include('../koneksi.php');

$id_menu = $_POST['id_menu'];
$kode_menu = $_POST['kode_menu'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$file = $_FILES['gambar']['name'];
$tmp_name = $_FILES['gambar']['tmp_name'];
$kategori = $_POST['kategori'];
$status = $_POST['status'];

move_uploaded_file($tmp_name, "../upload/".$file);
$edit = mysqli_query($koneksi, "UPDATE menu SET kode_menu='$kode_menu', nama='$nama', harga='$harga', gambar='$file', kategori='$kategori', status='$status' WHERE id_menu='$id_menu' ");

if($edit)
	header('location: daftar_menu.php');
else
	echo "Edit Menu Gagal";
 ?>