<?php
include '../index.class.php';
$sambung = new sambung();

mysql_query("DELETE FROM petugas WHERE kode_ptg = '$_REQUEST[kode_ptg]'");
header("location:adminPetugas.php");
?>