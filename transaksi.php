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
	$('#id_pelanggan').focus();//textbox id_pelanggan fokus
	$('#id_pelanggan').focusout(function() {//ketika textbox ditinggalkan
		var id_pelanggan = $(this).val();//membuat variabel id_pelaggan yang berisi nilai dari textbox id_pelaggan
		$.ajax({
			url: 'cek_pelanggan.php',//kirim data ke <-
			type: 'GET',//dengan type <-
			data: "id_pelanggan="+id_pelanggan,//mengirim variabel id_pelanggan
			success:function(data){//jika ajax berhasil
        //cek apakah id_pelanggan tsb ada
				$('#hasil_id_pelanggan').html(data);//tampung hasilnya di <-
				$('#id_pelanggan').css('box-shadow', '0 0 3px green');//kotak id_pelanggan menjadi hijau
			}
		});
	});
	$('#penumpang').focusout(function() {//ketika textbox penumpang ditinggalkan
		var jml = $(this).val();//membuat variabel jml
		if(jml == ""){//jika jumlah penumpang tidak ada nilainya
			$(this).attr('placeholder', 'Kolom Ini Harus Diisi !!');
			$(this).focus();//textbox penumpang fokus
			$(this).css('box-shadow', '0 0 3px red');//kotaknya menjadi merah
		}
		else{//jika ada isinya
			$(this).css('box-shadow', '0 0 3px green');//kotaknya menjadi hijau
		}
	});
	$('#barang').focusout(function() {//ketika textbox barang ditinggalkan
		var penumpang = $('#penumpang').val();//mengambil value dari textbox penumpang
		var barang = $(this).val();//mengambil value dari textbox barang
		$.ajax({
			url: 'cek_mobil.php',//kirim data ke <-
			type: 'GET',//dengan type <-
			data: "penumpang="+penumpang+"&barang="+barang,//kirim variabel penumpang dan barang
      //untuk cek mobil apa saja yang memiliki kapasitas penumpang max dan bagasi max yang kurang dari variabel di atas
			success:function(data){//jika ajax berhasil
				$('#id_mobil').html(data);//hasilnya combo id_mobil berubah menjadi hasil dari ajax ini
				$('#barang').css('box-shadow', '0 0 3px green');//kotak barang mejadi hijau
			}
		});
	});
	$('#id_wisata').click(function() {//ketika combo id_wisata diklik
		var id_wisata = $(this).val();//membuat variabel id_wisata dari combo ini
		$.ajax({
			url: 'cek_tiket.php',//kirim data ke <-
			type: 'GET',//dengan type <-
			data: "id_wisata="+id_wisata,//kirim variabel id_wisata
      //untuk cek harga tiket dari pilihan wisata yang telah diklik
			success:function(data){//jika ajax berhasil
				$('#tiket').html(data);//hasilnya ditampilkan di box tiket
			}
		});
	});
	$('#id_mobil').click(function() {//ketika combo mobil diklik
		var id_mobil = $(this).val();//membuat variabel id_mobil dengan mengambil value dari combo id_mobil
		var id_wisata = $('#id_wisata').val();//membuat variabel id_wisata degan mengambil value dari combo id_wisata
    var id_sopir = "";//membuat variabel id_sopi dengan value kosong
		$.ajax({
			url: 'cek_harga_mobil.php',//kirim data ke <-
			type: 'GET',//dengan type
			data: "id_wisata="+id_wisata+"&id_mobil="+id_mobil,//kirim variabel id_wisata dan id_mobil
      //untuk cek harga sewa mobil yang tarif per km nya sudah dikalikan dengan jarak wisata yang telah dipilih
			success:function(data){//jika ajax berhasil
				$('#mobil').html(data);//hasilnya ditampilkan di box mobil
			}
		});
    $.ajax({
          url: 'cek_total.php',//kirim data ke <-
          type: 'GET',//dengan type
          data: "id_wisata="+id_wisata+"&id_mobil="+id_mobil+"&id_sopir="+id_sopir,//kirim variabel id_wisata, id_mobil dan id_sopir
          //id_sopir dikosongi karena bisa saja pelanggan hanya memilih wisata dan mobil tanpa menyewa sopir
          //untuk cek total biaya sewa sebelum transaksi, tapi tanpa sopir
          success:function(data){//jika ajax berhasil
            $('#total').html(data);//hasilnya ditampilkan di box total
        }
      });
	});
	$('#id_sopir').click(function() {//jika combo sopir diklik
		$('#sopir').html("Rp. 100.000");//mengisi box sopir dengan nilai Rp. 100.000
		var id_wisata = $('#id_wisata').val();//membuat variabel id_wisata dengan value combo dari id_wisata
    	var id_mobil = $('#id_mobil').val();//membuat variabel id_mobil dengan value combo dari id_mobil
      var id_sopir = $(this).val();//membuat variabel id_sopir dengan value combo dari id_sopir
    	$.ajax({
      		url: 'cek_total.php',//kirim data ke <-
      		type: 'GET',//dengan type <-
      		data: "id_wisata="+id_wisata+"&id_mobil="+id_mobil+"&id_sopir="+id_sopir,//kirim variabel id_wisata dan id_mobil
          //untuk cek harga sewa sebelum transaksi, tapi dengan sopir
      		success:function(data){//jika ajax berhasil
       			$('#total').html(data);//hasilnya ditampilkan di box total
     		}
    	});
	});
  var ada = $('#id_pelanggan').val();//variabel berisi value textbox pelanggan
  if (ada == "") {//jika kosong
    $('#tombol_gawe_pesan').hide();//tombol gawe pesan hilang
  }
  else{//jika tidak
   $('#tombol_gawe_pesan').show(); //tombol gawe pesan tampil
  }
	$('#bersih').click(function() {//ketika tombol bersih diklik
		var id_pelanggan = $('#id_pelanggan').val("");//textbox id_pelanggan kosong
		var penumpang = $('#penumpang').val("");//textbox penumpang kosong
		var barang = $('#barang').val("");//textbox barang kosong
		var id_wisata = $('#id_wisata').val("");//combo id_wisata kosong
		var id_mobil = $('#id_mobil').val("");//combo id_mobil kosong
		var id_sopir = $('#id_sopir').val("");//combo id_sopir kosong
		var tiket = $('#tiket').text("TIKET");//box tiket bertuliskan 'tiket'
		var mobil = $('#mobil').text("MOBIL");//box mobil bertuliskan 'mobil'
		var sopir = $('#sopir').text("SOPIR");//combo sopir bertuliskan 'sopir'
		var total = $('#total').text("TOTAL");//combo total bertuliskan 'total'
	});
	$('#tombol_pesan').click(function() {
    var id_transaksi = $('#id_transaksi').val();//membuat variabel id_transaksi dengan mengambil value dari input type hidden yang ber id id_transaksi
		var id_pelanggan = $('#id_pelanggan').val();//membuat variabel id_pelanggan dengan mengambil value dari textbox id_pelanggan
    var id_wisata = $('#id_wisata').val();//membuat variabel id_wisata dengan mengambil value dari combo id_wisata
    var id_mobil = $('#id_mobil').val();//membuat variabel id_mobil dengan mengambil value dari combo id_mobil
    var id_sopir = $('#id_sopir').val();//membuat variabel id_sopir dengan mengambil value dari combo id_sopir
    var penumpang = $('#penumpang').val();//membuat variabel jumlah penumpang dengan mengambil value dari textbox penumpang
    var barang = $('#barang').val();//membuat variabel jumlah barang dengan mengambil value dari textbox barang
    var tanggal = $('#tanggal').val();//mengambil tanggal hari ini dari input type hidden yang ber id tanggal
    var total = $('#harga_total').val();//membuat variabel total dengan mengambil value dari input type text hidden yang telah dikirim oleh ajax sebelumnya yaitu ajax ketika id_mobil diklik atau ketika id_sopir diklik
    $.ajax({
      //ajax ini digunakan ketika pelanggan sudah yakin dengan pilihannya dan benar" ingin melakukan transaksi
      url: 'bayar.php',//kirim data ke <-
      type: 'GET',//dengan type <-
      data: "id_transaksi="+id_transaksi+"&id_pelanggan="+id_pelanggan+"&id_wisata="+id_wisata+"&id_mobil="+id_mobil+"&id_sopir="+id_sopir+"&penumpang="+penumpang+"&barang="+barang+"&tanggal="+tanggal+"&total="+total,
      //mengirim data itu wes pokok.e dengan value iku pisan
      success:function(data){//jika ajax berhasil
        $('#hasil_bener').html(data);//hasilnya ditampung di input type hidden ber id hasil_bener
        //kemudian jika data - data di atas dikirim maka akan disimpan ke database
        window.location="struk.php?id_transaksi="+id_transaksi+"&id_pelanggan="+id_pelanggan+"&id_wisata="+id_wisata+"&id_mobil="+id_mobil+"&id_sopir="+id_sopir+"&penumpang="+penumpang+"&barang="+barang+"&tanggal="+tanggal+"&total="+total;//ke halaman struk dengan variabel tersebut
        //lalu pelanggan akan diarahkan ke halaman struk.php dimana pelanggan akan melihat bukti transaksi yang telah mereka lakukan
      }
    });
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
                <!-- <input type="hidden" id="ada_pelanggan" value="<?php echo $tampilkan[1]; ?>"> -->
                <?php
                $query = mysql_query("SELECT * FROM transaksi WHERE id_pelanggan = '$tampilkan[0]' AND ket = 'TENGGANG'");
                $baris = mysql_num_rows($query);
                $kueri = mysql_query("SELECT * FROM paket");
                $row = mysql_num_rows($kueri);
                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$tampilkan[1]."<span class='label label-warning'>".$baris."</span></a>";
              }else{
                echo "<a href='pelanggan.php'><b>LOGIN | DAFTAR</b></a>";
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
          <li>
            <a href="pelanggan.php" style="font-weight:bold">
              <i class="fa fa-users"></i>
              <span>PELANGGAN</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li class="active">
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
            <div class="col-lg-6">
              <div class="box box-primary">
                <div class="box-header">
                  <h3><i class="fa fa-usd"></i> Transaksi Pemesanan JTravel</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <input type="hidden" id="id_transaksi" value="<?php $krj->kode_transaksi(); ?>">
                    <input type="hidden" id="tanggal" value="<?php echo date('Y-m-d'); ?>">
                    <div class="input-group">
                    <span class="input-group-addon" id="hasil_id_pelanggan"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" id="id_pelanggan" value="<?php if ($tampilkan[0] != "") {
                        echo $tampilkan[0];
                      } ?>" placeholder="Masukkan ID Pelanggan Anda..">
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"> <i class="fa fa-users"></i></span>
                      <input type="text" class="form-control" id="penumpang" placeholder="Jumlah Penumpang..">
                      <span class="input-group-addon"><b>Orang</b></span>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                      <input type="text" class="form-control" id="barang" placeholder="Barang Bawaan..">
                      <span class="input-group-addon"><b>KG</b></span>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                      <select id="id_wisata" class="form-control">
                      <option value="">--- Pilih Tempat Wisata ---</option>
                      <?php
                      $data_wisata = mysql_query("SELECT * FROM wisata");
                      while ($isi_wisata = mysql_fetch_array($data_wisata)) { ?>
                      <option value="<?php echo $isi_wisata[0]; ?>"><?php echo $isi_wisata[1]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-car"></i></span>
                      <select id="id_mobil" class="form-control">
                      <option value="">--- Pilih Mobil ---</option>
                      <?php
                      $data_mobil = mysql_query("SELECT * FROM mobil");
                      while ($isi_mobil = mysql_fetch_array($data_mobil)) { ?>
                      <option value="<?php echo $isi_mobil[0]; ?>"><?php echo $isi_mobil[1]; ?> <?php echo $isi_mobil[3]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </div><br>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-wheelchair"></i></span>
                      <select id="id_sopir" class="form-control">
                      <option value="">--- Pilih Sopir ---</option>
                      <?php
                      $data_sopir = mysql_query("SELECT * FROM sopir");
                      while ($isi_sopir = mysql_fetch_array($data_sopir)) { ?>
                      <option value="<?php echo $isi_sopir[0]; ?>"><?php echo $isi_sopir[1]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <button type="button" id="tombol_gawe_pesan" class="btn btn-primary btn-block btn-lg btn-flat" data-toggle="modal" data-target="#modalPesan"><i class="fa fa-cart-plus"></i> PESAN</button>
                      <div class="modal fade" id="modalPesan" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <center><h3 class="modal-title">YAKIN PESAN <i class="fa fa-question"></i></h3></center>
                            </div>
                            <div class="modal-body" align="center">
                              <button type="button" id="tombol_pesan" class="btn btn-flat btn-danger btn-lg"><span class="fa fa-shopping-cart"></span> PESAN</button>
                              <button type="button" class="btn btn-flat btn-warning btn-lg" data-dismiss="modal"><span class="fa fa-close"></span> BATAL</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" id="hasil_bener">
                    </div>
                    <div class="form-group pull-right">
                      <button type="butotn" id="bersih" class="btn btn-warning btn-flat"><i class="fa fa-trash"></i> BERSIH</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p></p><br>
                  <h3 id="tiket">TIKET</h3>
                  <p></p><br>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <p></p><br>
                  <h3 id="mobil">MOBIL</h3>
                  <p></p><br>
                </div>
                <div class="icon">
                  <i class="fa fa-car"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <p></p><br>
                  <h3 id="sopir">SOPIR</h3>
                  <p></p><br>
                </div>
                <div class="icon">
                  <i class="fa fa-wheelchair"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <p></p><br>
                  <h3 id="total">TOTAL</h3>
                  <p></p><br>
                </div>
                <div class="icon">
                  <i class="fa fa-money"></i>
                </div>
              </div>
            </div>  
          </div>
    	</section>
    </div>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>JTravel Agent Service</b> V 1.0.0
	</div>
	Copyright 2016,
	<strong>SMK PGRI 05 Jember</strong>
</footer>
</div>
</body>
</html>