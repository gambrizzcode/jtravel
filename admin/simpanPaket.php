<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->simpanPaket($_GET['id_paket'],$_GET['paket_wisata'],$_GET['paket_mobil'],$_GET['paket_sopir']);
?>