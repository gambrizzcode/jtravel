<?php
include 'index.class.php';
$sambung = new sambung();
$data = mysql_query("SELECT * FROM wisata WHERE id_wisata = '$_GET[id_wisata]'");
$isi = mysql_fetch_array($data);
$doto = mysql_query("SELECT * FROM mobil WHERE id_mobil = '$_GET[id_mobil]'");
$oso = mysql_fetch_array($doto);
echo "<input type='hidden' id='harga_mobil' value='".$isi[4]*$oso[4]."'>";
echo "Rp. ".number_format($isi[4]*$oso[4],0,",",".");
?>