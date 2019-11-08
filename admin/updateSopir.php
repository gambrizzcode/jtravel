<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->updateSopir($_GET['id_sopir'],$_GET['nama'],$_GET['usia'],$_GET['alamat'],$_GET['telp'],$_GET['status'],$_GET['ket']);
?>