<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
ini_set("display_errors","off");
if ($_SESSION['id_pelanggan'] != "") {
  $pilihUsername = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_SESSION[id_pelanggan]'");
  $tampilkan = mysql_fetch_array($pilihUsername);
}
else{
  ini_set("display_errors","off");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>JTravel Agent Service</title>
	<link rel="icon" href="images/favJT.png">
	<link rel="stylesheet" type="text/css" href="hover/hover.css">
	<link rel="stylesheet" type="text/css" href="mybootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="AdminLTE/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="AdminLTE/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="AdminLTE/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="mybootstrap/js/bootstrap.js"></script>
	<script src="jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="slimScroll/jquery.slimscroll.min.js"></script>
	<script src="AdminLTE/js/app.min.js"></script>
</head>
<script>
$(document).ready(function() {
	var tampung_pelanggan = $('#tampung_pelanggan').val();
	if (tampung_pelanggan != "") {
		$('#kotak_sudah').show();
		$('#kotak_login').hide();
		$('#kotak_register').hide();
	}
	else{
		$('#kotak_sudah').hide();
		$('#kotak_login').show();
		$('#kotak_register').hide();
	}
	$('#tampil_kode').click(function() {
		$(this).hide(500);
		$('#register').show(500);
	});
	$('#register').hide();
	$('#kotak_login').show();
	$('#kotak_register').hide();
	$('#ke_register').click(function() {
		$('#kotak_register').show(1000);
		$('#kotak_login').hide(1000);
		$('#email').focus();
	});
	$('#ke_login').click(function(event) {
		$('#kotak_login').show(1000);
		$('#kotak_register').hide(1000);
		$('#username').focus();
	});
	$('#login_email').focus();
	$('#nama').focusout(function() {
		if($(this).val().length >= 3){
			$(this).css('box-shadow', '0 0 2px green');
			$('#ikon_nama').removeClass('fa-pencil');
			$('#ikon_nama').addClass('fa-check text-success');
			$('#ikon_nama').removeClass('fa-close text-danger');
		}
		else{
			$(this).css('box-shadow', '0 0 2px red');
			$(this).focus();
			$('#ikon_nama').removeClass('fa-pencil');
			$('#ikon_nama').removeClass('fa-check text-success');
			$('#ikon_nama').addClass('fa-close text-danger');
		}
	});
	$('#password').focusout(function() {
		if ($(this).val().length >= 8) {
			$(this).css('box-shadow', '0 0 2px green');
			$('#ikon_password').removeClass('fa-lock');
			$('#ikon_password').addClass('fa-check text-success');
			$('#ikon_password').removeClass('fa-close text-danger');
		}
		else{
			$(this).css('box-shadow', '0 0 2px red');
			$(this).focus();
			$(this).attr('placeholder', 'Minimal 8 Karakter..');
			$('#ikon_password').removeClass('fa-pencil');
			$('#ikon_password').removeClass('fa-check text-success');
			$('#ikon_password').addClass('fa-close text-danger');
		}
	});
	$('#confirm').focusout(function() {
		if ($(this).val() == $('#password').val()) {
			$(this).css('box-shadow', '0 0 2px green');
			$('#ikon_confirm').removeClass('fa-edit');
			$('#ikon_confirm').addClass('fa-check text-success');
			$('#ikon_confirm').removeClass('fa-close text-danger');
		}
		else{
			$(this).css('box-shadow', '0 0 2px red');
			$(this).focus();
			$(this).attr('placeholder', 'Harus Sama Dengan Yang Di Atas..');
			$('#ikon_confirm').removeClass('fa-edit');
			$('#ikon_confirm').removeClass('fa-check text-success');
			$('#ikon_confirm').addClass('fa-close text-danger');
		}
	});
	$('#alamat').focusout(function() {
		if ($(this).val().length >= 6) {
			$(this).css('box-shadow', '0 0 2px green');
			$('#ikon_alamat').removeClass('fa-home');
			$('#ikon_alamat').addClass('fa-check text-success');
			$('#ikon_alamat').removeClass('fa-close text-danger');
		}
		else{
			$(this).css('box-shadow', '0 0 2px red');
			$(this).focus();
			$(this).attr('placeholder', 'Minimal 6 Karakter..');
			$('#ikon_password').removeClass('fa-home');
			$('#ikon_password').removeClass('fa-check text-success');
			$('#ikon_password').addClass('fa-close text-danger');
		}
	});
	$('#telp').focus(function() {
		$(this).css('box-shadow', '0 0 2px green');
		$('#ikon_telp').removeClass('fa-phone');
		$('#ikon_telp').addClass('fa-check text-success');
		$('#ikon_telp').removeClass('fa-close text-danger');
	});
	$('#email').focusout(function() {
		var x = $(this).val();
		var atpos = x.indexOf('@');
		var dotpos = x.indexOf('.');
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
			$(this).css('box-shadow', '0 0 2px red');
			$(this).focus();
			$('#ikon_email').removeClass('fa-pencil');
			$('#ikon_email').removeClass('fa-check text-success');
			$('#ikon_email').addClass('fa-close text-danger');
		}
		else{
			$(this).css('box-shadow', '0 0 2px green');
			$('#ikon_email').removeClass('fa-envelope');
			$('#ikon_email').addClass('fa-check text-success');
			$('#ikon_email').removeClass('fa-close text-danger');
		}
	});
	$('#ket').focusout(function() {
		$(this).css('box-shadow', '0 0 2px green');
		$('#ikon_ket').removeClass('fa-file');
		$('#ikon_ket').addClass('fa-check text-success');
		$('#ikon_ket').removeClass('fa-close text-danger');
	});
	$('#reset').click(function() {
		$('#nama').val("");
		$('#password').val("");
		$('#confirm').val("");
		$('#alamat').val("");
		$('#telp').val("");
		$('#email').val("");
		$('#ket').val("");
	});
	$('#register').click(function() {
		var id_pelanggan = $('#id_pelanggan').val();
		var nama = $('#nama').val();
		var pass = $('#password').val();
		var confirm = $('#confirm').val();
		var alamat = $('#alamat').val();
		var telp = $('#telp').val();
		var email = $('#email').val();
		var ket = $('#ket').val();
		if (id_pelanggan == "" || nama == "" || pass == "" || confirm == "" || alamat == "" || telp == "" || email == "") {
			$('#tampil').html("HARAP ISI KOLOM DENGAN BENAR !!");
		}
		else{
			$.ajax({
				url: 'admin/simpanPelanggan.php',
				type: 'GET',
				data: "id_pelanggan="+id_pelanggan+"&nama="+nama+"&pass="+pass+"&alamat="+alamat+"&telp="+telp+"&email="+email+"&ket="+ket,
				success:function(data){
					$('#hasil').html(data);
					$('#tampil').html("Anda Telah Terdaftar Sebagai Pelanggan Kami. Terima Kasih.");
					$('#nama').val("");
					$('#password').val("");
					$('#confirm').val("");
					$('#alamat').val("");
					$('#telp').val("");
					$('#email').val("");
					$('#ket').val("");
					$('#kotak_login').show(1000);
					$('#kotak_register').hide(1000);
				}
			});
		}
	});
	$('#tombol_login').click(function() {
		var email = $('#login_email').val();
		var password = $('#login_password').val();
		$.ajax({
			url: 'login.php',
			type: 'GET',
			data: "email="+email+"&password="+password,
			success:function(data){
				$('#login_hasil').html(data);
				window.location="index.php";
			}
		});
	});
	$('#tombol_login').keypress(function() {
		if (data.which==13) {
			var email = $('#login_email').val();
			var password = $('#login_password').val();
			$.ajax({
				url: 'login.php',
				type: 'GET',
				data: "email="+email+"&password="+password,
				success:function(data){
					$('#login_hasil').html(data);
					window.location="index.php";
				}
			});
		}
	});
	$('#login_password').keypress(function() {
		if (data.which==13) {
			var email = $('#login_email').val();
			var password = $('#login_password').val();
			$.ajax({
				url: 'login.php',
				type: 'GET',
				data: "email="+email+"&password="+password,
				success:function(data){
					$('#login_hasil').html(data);
					window.location="index.php";
				}
			});
		}
	});
});
</script>
<body class="skin-purple fixed sidebar-mini wysihtml5-supported">
<div class="wrapper">
	<header class="main-header">
	<a href="index.php" class="logo">
	  <span class="logo-mini">
		<b>JT</b>A
	  </span>
	  <span class="logo-lg">
		<b>JTravel</b> Agent
	  </span>
	</a>

	<nav class="navbar navbar-static-top">
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle Navigation</span>
	  </a>
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav pull-right">
			<li class="user-menu"><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li class="dropdown notifications-menu">
              <?php if ($tampilkan[1]) {
                ?>
                <input type="hidden" id="tampung_pelanggan" value="<?php echo $tampilkan[0]; ?>">
                <?php
                $query = mysql_query("SELECT * FROM transaksi WHERE id_pelanggan = '$tampilkan[0]' AND ket = 'TENGGANG'");
                $baris = mysql_num_rows($query);
                $kueri = mysql_query("SELECT * FROM paket");
                $row = mysql_num_rows($kueri);
                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$tampilkan[1]."<span class='label label-warning'>".$baris."</span></a>";
              }else{
                echo "<a href='pelanggan.php'><b>LOGIN | DAFTAR</b></a>";
                ?>
                <input type="hidden" id="tampung_pelanggan" value="">
                <?php
                }
                ?>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu" style="height: auto;width: 100%;">
                  <li>
                    <a href="#"><i class="fa fa-money text-green"></i> TRANSAKSI DALAM MASA TENGGANG <span class="label label-warning"><?php echo $baris; ?></span>
                    </a>
                    <a href="paket.php"><i class="fa fa-gift text-green"></i>PAKET TERBARU HARI INI <span class="label label-warning"><?php echo $row; ?></span></a>
                    <a href="logout.php"><i class="fa fa-power-off text-red"></i> LOGOUT</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
		</ul>
	  </div>
	</nav>
	</header>

	<aside class="main-sidebar">
	  <section class="sidebar" style="height:auto">
		<ul class="sidebar-menu">
		  <li class="treeview">
			<a href="index.php" style="font-weight:bold;">
			  <i class="fa fa-home"></i>
			  <span>BERANDA</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li>
			<a href="wisata.php" style="font-weight:bold;">
			  <i class="fa fa-globe"></i>
			  <span>WISATA</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li>
			<a href="paket.php" style="font-weight:bold">
			  <i class="fa fa-gift"></i>
			  <span>PAKET</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li>
			<a href="mobil.php" style="font-weight:bold">
			  <i class="fa fa-car"></i>
			  <span>MOBIL</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li>
			<a href="sopir.php" style="font-weight:bold">
			  <i class="fa fa-wheelchair"></i>
			  <span>SOPIR</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li class="active">
			<a href="pelanggan.php" style="font-weight:bold">
			  <i class="fa fa-users"></i>
			  <span>PELANGGAN</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li>
			<a href="transaksi.php" style="font-weight:bold">
			  <i class="fa fa-money"></i>
			  <span>TRANSAKSI</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		  <li>
			<a href="aboutus.php" style="font-weight:bold">
			  <i class="fa fa-exclamation"></i>
			  <span>ABOUT US</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-double-right pull-right"></i>
			  </span>
			</a>
		  </li>
		</ul>
	  </section>
	</aside>

	<div class="content-wrapper">
		<section class="content">
		<div class="row">
		 	<div class="login-box" id="kotak_register">
			 	<div class="login-logo">
			 		<b>JT</b>ravel<br>
			 		Customer Registration
			 	</div>
			 	<div class="login-box-body">
			 		<div class="form-group has-feedback">
					  <input type="hidden" id="id_pelanggan" value="<?php $krj->kodePelanggan(); ?>"><br>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="EMAIL.." id="email" class="form-control">
					  	<span class="fa fa-envelope form-control-feedback" id="ikon_email"></span>
					  </div>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="NAMA.." id="nama" class="form-control">
					  	<span class="fa fa-pencil form-control-feedback" id="ikon_nama"></span>
					  </div>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="BUAT PASSWORD.." id="password" class="form-control">
					  	<span class="fa fa-lock form-control-feedback" id="ikon_password"></span>
					  </div>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="KONFIRMASI PASSWORD.." id="confirm" class="form-control">
					  	<span class="fa fa-edit form-control-feedback" id="ikon_confirm"></span>
					  </div>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="ALAMAT.." id="alamat" class="form-control">
					  	<span class="fa fa-home form-control-feedback" id="ikon_alamat"></span>
					  </div>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="TELEPON.." id="telp" class="form-control">
					  	<span class="fa fa-phone form-control-feedback" id="ikon_telp"></span>
					  </div>
					  <div class="form-group has-feedback">
					  	<input type="text" placeholder="KETERANGAN.." id="ket" class="form-control">
					  	<span class="fa fa-file form-control-feedback" id="ikon_ket"></span>
					  </div>
					  <button type="button" id="tampil_kode" value="" class="btn btn-flat btn-block btn-info"><i class="fa fa-users"></i> Kode Pelanggan Anda : <b><?php $krj->kodePelanggan(); ?></b>, Mengerti ?</button>
					  <button type="button" id="register" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-floppy-save"></span> DAFTAR</button>
					  <input type="hidden" id="hasil">
				  </div>
				  <center>
				  <p>Sudah Punya Akun ?</p>
				  <button type="button" id="ke_login" class="btn btn-link btn-xs">--- LOGIN ---</button></center>
			 	</div>
			 	<div class="login-box-footer">
			 		<h4 id="tampil"></h4>
			 	</div>
		 	</div>
		 	<div class="login-box" id="kotak_sudah">
		 		<div class="login-logo">
		 			<H3>ANDA TELAH LOGIN..</H3>
		 			<H4><i class="fa fa-thumbs-up"></i></H4>
		 		</div>
		 	</div>
		      <div class="login-box" id="kotak_login">
		      	<div class="login-logo">
		      		<b>JT</b>ravel<br>
		      		Customer Login
		      	</div>
		      	<div class="login-box-body">
		      		<div class="form-group has-feedback">
		      			<div class="form-group has-feedback">
			        		<input type="text" class="form-control" placeholder="E-Mail.." id="login_email">
					        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
				      	</div>
			    	  	<div class="form-group has-feedback">
			        		<input type="password" class="form-control" placeholder="Password.." id="login_password">
			        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			    		</div>
			    		<button type="button" id="tombol_login" class="btn btn-success btn-block btn-flat"><i class="glyphicon glyphicon-log-in"></i> Log In</button>
			    		<div id="login_hasil"></div>
			      	</div>
			      	<center>
			      	<p>Belum Punya Akun ?</p>
			      	<button type="button" id="ke_register" class="btn btn-link btn-xs">--- DAFTAR ---</button></center>
		      	</div>
		      </div>
		  </div>
		</section>
	</div>
</div>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>JTravel Agent Service</b> V 1.0.0
	</div>
	Copyright 2016,
	<strong>SMK PGRI 05 Jember</strong>
</footer>
</body>
</html>