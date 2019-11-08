<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

if ($_GET['id_mobil']) {
	$krj->updateMobil($_GET['id_mobil'],$_GET['merk'],$_GET['type'],$_GET['nama'],$_GET['biayaperkm'],$_GET['penumpangmax'],$_GET['bagasimax'],$_GET['gambar'],$_GET['status'],$_GET['ket']);
}
move_uploaded_file($_FILES['gambar']['tmp_name'], "../images/".$_FILES['gambar']['name']);
header("location:adminMobil.php");
?>