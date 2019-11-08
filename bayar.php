<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

if ($_GET['id_transaksi']) {
	$krj->bayar($_GET['id_transaksi'],$_GET['id_pelanggan'],$_GET['id_wisata'],$_GET['id_mobil'],$_GET['id_sopir'],$_GET['penumpang'],$_GET['barang'],$_GET['tanggal'],$_GET['total'],'TENGGANG','');
	$krj->statusPelanggan($_GET['id_pelanggan'],'TENGGANG');
	$krj->statusMobil($_GET['id_mobil']);
	$krj->statusSopir($_GET['id_sopir']);
	$id_paket = $_GET['id_paket'];
	mysql_query("DELETE FROM paket WHERE id_paket = '$id_paket'");
}
?>