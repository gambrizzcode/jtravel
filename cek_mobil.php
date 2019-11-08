<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
$data = mysql_query("SELECT * FROM mobil WHERE penumpangmax >= '$_GET[penumpang]' AND bagasimax >= '$_GET[barang]'");
?>
<option value="">--- Pilih Mobil ---</option>
<?php
while ($isi_mobil = mysql_fetch_array($data)) {
?>
<option value="<?php echo $isi_mobil[0]; ?>"><?php echo $isi_mobil[1]; ?> <?php echo $isi_mobil[3]; ?></option>
<?php
}
?>