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
<style type="text/css">
      *{
        margin: 0;
        padding: 0;
      }
      img{
        width: 100%;
      }
    </style>

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
          <li class="active">
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
    <section class="content-header">
      <h3><i class="fa fa-globe"></i> Destinasi Wisata Kab. Jember Versi JTravel</h3>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php
        $no = 1;
        $data = mysql_query("SELECT * FROM wisata");
        while ($isi = mysql_fetch_array($data)) {
        ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $no++; ?>"></li>
        <?php } ?>
      </ol>

      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="images/alunalun.png" alt="Paseban">
          <div class="carousel-caption">
            <h3>Alun - Alun Kota Jember</h3>
            <p>Jember Kota</p>
          </div>
        </div>
        <?php
        $doto = mysql_query("SELECT * FROM wisata");
        while ($oso = mysql_fetch_array($doto)) {
        ?>
        <div class="item">
          <img src="images/<?php echo $oso[7]; ?>">
          <div class="carousel-caption">
            <h3><?php echo $oso[1]; ?></h3>
            <p><?php echo $oso[2]; ?></p>
          </div>
        </div>
        <?php } ?>
      </div>

      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
      </div>
      <div class="row">
        <div class="col-md-8">
            <div class="box-group" id="accordion">
            <?php
            $no = 1;
            $data = mysql_query("SELECT * FROM wisata");
            while ($isi = mysql_fetch_array($data)) {
            ?>
                <div class="panel box box-info panel-info">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" style="text-decoration: none" href=<?php echo '#'.$isi[0]; ?>>
                        <?php echo $isi[1]; ?>
                      </a>
                    </h4>
                  </div>
                  <div id=<?php echo $isi[0]; ?> class="panel-collapse collapse">
                    <div class="box-body">
                    <p>
                      Alamat : <?php echo $isi[2]; ?><br>
                      Jenis : <?php echo $isi[3]; ?><br>
                      Jarak Dari Kantor JTravel : <?php echo $isi[4]; ?> KM<br>
                      Harga Tiket (Bukan Promo) : Rp. <?php echo number_format($isi[5],0,",","."); ?><br>
                      Telepon : <?php echo $isi[6]; ?><br>
                      Status : <?php if ($isi[8] == 0) {
                        echo "<span class='label label-danger'>TUTUP</span>";}else{echo "<span class='label label-success'>BUKA</span>";} ?><br><br>
                      <img class="img-rounded" style="width:100%" src="images/<?php echo $isi[7]; ?>"><br>
                    </p>
                    </div>
                  </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="box box-success">
        		<div class="box-header with-border">
        			<h3 class="box-title"><i class="fa fa-thumbs-up"></i> Rekomendasi</h3>
        		</div>
        		<div class="box-body">
        			<h3>Kawasan Puncak Rembangan</h3>
        			<p>Salah Satu Destinasi Wisata Terbaik Di Jember</p>
        			<h3>Pantai Papuma</h3>
        			<p>Satu - satunya Pantai Selatan Yang Memiliki Pasir Putih</p>
        			<h3>Taman Botani</h3>
        			<p>Hiburan, Kesegaran, dan Ilmu Pengetahuan Semua Ada Di Sini</p>
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
  </div>
</body>
</html>