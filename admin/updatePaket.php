<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->updatePaket($_GET['id_paket'],$_GET['id_wisata'],$_GET['id_mobil'],$_GET['id_sopir']);
?>