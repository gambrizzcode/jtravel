<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$query = mysql_query("SELECT * FROM wisata WHERE id_wisata = '$_GET[id_wisata]'");
$isi = mysql_fetch_array($query);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title"><span class="fa fa-globe"></span> EDIT DESTINASI WISATA</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<form id="uploadForm" action="updateWisata.php" enctype="multipart/form-data" method="post">
				<input type="hidden" id="edit_id_wisata" value="<?php echo $isi[0]; ?>">
				<input type="text" placeholder="NAMA.." id="edit_nama" class="form-control" value="<?php echo $isi[1]; ?>"><br>
				<input type="text" placeholder="ALAMAT.." id="edit_alamat" class="form-control" value="<?php echo $isi[2]; ?>"><br>
				<select id="edit_jenis" class="form-control">
					<option value="alami">ALAMI</option>
					<option value="buatan">BUATAN</option>
				</select><br>
				<input type="text" placeholder="JARAK.." id="edit_jarak" class="form-control" value="<?php echo $isi[4]; ?>"><br>
				<input type="text" placeholder="TIKET.." id="edit_tiket" class="form-control" value="<?php echo $isi[5]; ?>"><br>
				<input type="text" placeholder="TELP.." id="edit_telp" class="form-control" value="<?php echo $isi[6]; ?>"><br>
				<input type="file" placeholder="GAMBAR.." id="edit_gambar" name="gambar" value="<?php echo $isi[7]; ?>"><br>
				<select id="edit_status" class="form-control">
					<option value="1">BUKA</option>
					<option value="0">TUTUP</option>
				</select><br>
				<input type="text" placeholder="KETERANGAN.." id="edit_ket" class="form-control" value="<?php echo $isi[9]; ?>"><br>
				<div id="edit_hasil"></div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" id="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>UPDATE</button>
			<button type="button" id="resik" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> BERSIH</button>
		</form>
		</div>
	</div>
</div>