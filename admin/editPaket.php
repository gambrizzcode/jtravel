<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$query = mysql_query("SELECT * FROM paket WHERE id_paket = '$_GET[id_paket]'");
$isi = mysql_fetch_array($query);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title"><span class="fa fa-gift"></span> EDIT PAKET</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
								<input type="hidden" id="edit_id_paket" value="<?php echo $isi[0]; ?>">
									<label>WISATA : </label>
									<select id="edit_paket_wisata" class="form-control">
										<option value="">--- PILIH WISATA ---</option>
									<?php
									$paket_wisata = mysql_query("SELECT * FROM wisata WHERE status = '1'");
									while ($pw = mysql_fetch_array($paket_wisata)) {
									$selected = '';
									if ($pw[0] == $isi[1]) {
										$selected = 'selected="selected"';
									}
									?>
										<option value="<?php echo $pw[0]; ?>" <?php echo $selected; ?>><?php echo $pw[1]; ?></option>
									<?php } ?>
									</select>
									<label>MOBIL : </label>
									<select id="edit_paket_mobil" class="form-control">
										<option value="">--- PILIH MOBIL ---</option>
									<?php
									$paket_mobil = mysql_query("SELECT * FROM mobil WHERE status = '0'");
									while ($pm = mysql_fetch_array($paket_mobil)) {
									$selected = '';
									if ($pm[0] == $isi[2]) {
										$selected = 'selected="selected"';
									}
									?>
										<option value="<?php echo $pm[0]; ?>" <?php echo $selected; ?>><?php echo $pm[1]; ?> <?php echo $pm[3]; ?></option>
									<?php
									}
									?>
									</select>
									<label>SOPIR : </label>
									<select id="edit_paket_sopir" class="form-control">
										<option value="">--- PILIH SOPIR ---</option>
									<?php
									$paket_sopir = mysql_query("SELECT * FROM sopir WHERE status = '0'");
									while ($ps = mysql_fetch_array($paket_sopir)) {
									$selected = '';
									if ($ps[0] == $isi[3]) {
										$selected = 'selected="selected"';
									}
									?>
										<option value="<?php echo $ps[0]; ?>" <?php echo $selected; ?>><?php echo $ps[1]; ?></option>
									<?php
									}
									?>
									</select>
									<input type="hidden" id="edit_paket_hasil">
								</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-flat pull-right" id="edit_paket">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-gift"></i> UPDATE PAKET&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
	</div>
</div>