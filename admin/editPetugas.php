<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

$query = mysql_query("SELECT * FROM petugas WHERE kode_ptg = '$_GET[kode_ptg]'");
$isi = mysql_fetch_array($query);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> EDIT PETUGAS</h3>
		</div>
		<div class="modal-body">
			<div class="form-group">
			<form id="uploadForm" action="updatePetugas.php" enctype="multipart/form-data" method="post">
				<input type="hidden" id="edit_kode" value="<?php echo $isi[0]; ?>">
				<input type="text" placeholder="USERNAME.." id="edit_username" class="form-control" value="<?php echo $isi[1]; ?>"><br>
				<label id="edit_cek" class="glyphicon glyphicon-alert"></label><br><br>
				<input type="text" placeholder="NAMA.." id="edit_nama" class="form-control" value="<?php echo $isi[2]; ?>"><br>
				<input type="password" placeholder="CREATE PASSWORD.." id="edit_pass" class="form-control"><br>
				<label id="edit_panjang" class="glyphicon glyphicon-alert"></label><br><br>
				<input type="password" placeholder="CONFIRM PASSWORD.." id="edit_confirm" class="form-control"><br>
				<label id="edit_panjang2" class="glyphicon glyphicon-alert"></label><br><br>
				<label>TAMBAHKAN FOTO</label>
				<input type="file" id="edit_foto" name="gambar"><br>
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