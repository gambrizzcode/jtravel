<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$id_mobil = $_GET['id_mobil'];
$query = mysql_query("SELECT * FROM mobil WHERE id_mobil = '$id_mobil'");
$isi = mysql_fetch_array($query);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title"><span class="fa fa-car"></span> EDIT MOBIL</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
			<form id="uploadForm" action="updateMobil.php" enctype="multipart/form-data" method="post">
				<input type="hidden" id="edit_id_mobil" value="<?php echo $isi[0]; ?>">
				<input type="text" placeholder="MERK.." id="edit_merk" class="form-control" value="<?php echo $isi[1]; ?>"><br>
				<input type="text" placeholder="TYPE.." id="edit_type" class="form-control" value="<?php echo $isi[2]; ?>"><br>
				<input type="text" placeholder="NAMA.." id="edit_nama" class="form-control" value="<?php echo $isi[3]; ?>"><br>
				<input type="text" placeholder="BIAYA PER KM.." id="edit_biayaperkm" class="form-control" value="<?php echo $isi[4]; ?>"><br>
				<input type="text" placeholder="PENUMPANG MAXIMUM.. (orang)" id="edit_penumpangmax" class="form-control" value="<?php echo $isi[5]; ?>"><br>
				<input type="text" placeholder="BAGASI MAXIMUM.. (kg)" id="edit_bagasimax" class="form-control" value="<?php echo $isi[6]; ?>"><br>
				<input type="file" placeholder="GAMBAR.." id="edit_gambar" name="gambar" value="<?php echo $isi[7]; ?>"><br>
				<select id="edit_status" class="form-control">
					<option value="1">TERSEWA</option>
					<option value="0">TIDAK TERSEWA</option>
				</select><br>
				<input type="text" placeholder="KETERANGAN.." id="edit_ket" class="form-control" value="<?php echo $isi[9]; ?>"><br>
				<input type="hidden" id="edit_hasil">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" id="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>UPDATE</button>
			<button type="button" id="resik" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> BERSIH</button>
			</form>
		</div>
	</div>
</div>