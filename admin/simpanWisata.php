<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

if ($_GET['id_wisata'] != "") {
	$krj->simpanWisata($_GET['id_wisata'],$_GET['nama'],$_GET['alamat'],$_GET['jenis'],$_GET['jarak'],$_GET['tiket'],$_GET['telp'],$_GET['gambar'],$_GET['status'],$_GET['ket']);
}
move_uploaded_file($_FILES['gambar']['tmp_name'], "../images/".$_FILES['gambar']['name']);
header("location:adminWisata.php");
?>