<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

move_uploaded_file($_FILES['gambar']['tmp_name'], "../images/".$_FILES['gambar']['name']);
if ($_GET['kode']) {
	$krj->simpanPetugas($_GET['kode'],$_GET['user'],$_GET['nama'],md5($_GET['pass']),$_GET['foto']);
}
header("location:adminPetugas.php");
?>