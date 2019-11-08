<?php
include '../index.class.php';
$sambung = new sambung();

mysql_query("DELETE FROM sopir WHERE id_sopir = '$_REQUEST[id_sopir]'");
header("location:adminSopir.php");
?>