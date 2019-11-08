<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$query = mysql_query("SELECT * FROM sopir WHERE id_sopir = '$_GET[id_sopir]'");
$isi = mysql_fetch_array($query);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title"><span class="fa fa-wheelchair"></span> EDIT SOPIR</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" id="edit_id_sopir" value="<?php echo $isi[0]; ?>">
				<input type="text" placeholder="NAMA.." id="edit_nama" class="form-control" value="<?php echo $isi[1]; ?>"><br>
				<input type="text" placeholder="USIA.." id="edit_usia" class="form-control" value="<?php echo $isi[2]; ?>"><br>
				<input type="text" placeholder="ALAMAT.." id="edit_alamat" class="form-control" value="<?php echo $isi[3]; ?>"><br>
				<input type="text" placeholder="TELEPON.." id="edit_telp" class="form-control" value="<?php echo $isi[4]; ?>"><br>
				<select id="edit_status" class="form-control">
					<option value="1">TERSEWA</option>
					<option value="0">TIDAK TERSEWA</option>
				</select><br>
				<input type="text" placeholder="KETERANGAN.." id="edit_ket" class="form-control" value="<?php echo $isi[6]; ?>"><br>
				<div id="edit_hasil"></div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" id="update" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>UPDATE</button>
			<button type="button" id="resik" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> BERSIH</button>
		</div>
	</div>
</div>