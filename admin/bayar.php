<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->bayar_transaksi($_GET['id_transaksi'],$_GET['kode_ptg']);
$krj->statusPelanggan($_GET['id_pelanggan'],'');
?>