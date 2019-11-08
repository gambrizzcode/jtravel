<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->updatePelanggan($_GET['id_pelanggan'],$_GET['nama'],md5($_GET['pass']),$_GET['alamat'],$_GET['telp'],$_GET['email'],$_GET['ket']);
?>