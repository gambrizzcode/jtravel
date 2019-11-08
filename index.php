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

          <li><a href="index.php"><i class="fa fa-home"></i></a></li>
          
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
          <li class="treeview active">
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
      <h3>Jember Travel Agent Service</h3>
      <h4>Travel Destinasi Wisata Wilayah Kabupaten Jember</h4>
    </section>
    <section class="content">
    <div class="row">
      <div class="col-md-8">
      <ul class="timeline">
    <li class="time-label">
        <span class="bg-red">
            ALUR PEMESANAN.. <span class="fa fa-clock-o"></span>
        </span>
    </li>
    <li>
        <i class="fa fa-users bg-purple"></i>
        <div class="timeline-item">
          <span class="time"></span>
          <h3 class="timeline-header"><a href="pelanggan.php">Registrasi.. <i class="fa fa-arrow-right"></i></a></h3>
          <div class="timeline-body">
              ...
              Registrasi terlebih dahulu untuk melakukan pemesanan..
          </div>
        </div>
    </li>
    <li>
        <i class="fa fa-globe bg-aqua"></i>
        <div class="timeline-item">
            <span class="time"></span>
            <h3 class="timeline-header"><a href="wisata.php">Tentukan Destinasi Wisata.. <i class="fa fa-arrow-right"></i></a></h3>
            <div class="timeline-body">
                ...
                Lihat - lihat dulu destinasi wisata Jember yang akan anda kunjungi..
            </div>
        </div>
    </li>
    <li>
        <i class="fa fa-car bg-yellow"></i>
        <div class="timeline-item">
          <span class="time"></span>
          <h3 class="timeline-header"><a href="mobil.php">Tentukan Mobil.. <i class="fa fa-arrow-right"></i></a></h3>
          <div class="timeline-body">
              ...
              Lihat - lihat mobil yang sesuai dengan pilihan anda..
          </div>
        </div>
    </li>
    <li>
        <i class="fa fa-wheelchair bg-green"></i>
        <div class="timeline-item">
          <span class="time"></span>
          <h3 class="timeline-header"><a href="sopir.php">Pakai Sopir ??.. <i class="fa fa-arrow-right"></i></a></h3>
          <div class="timeline-body">
              ...
              Lihat - lihat sopir jika anda membutuhkan atau mungkin akan anda setir sendiri..
          </div>
        </div>
    </li>
    <li>
        <i class="fa fa-money bg-blue"></i>
        <div class="timeline-item">
          <span class="time"></span>
          <h3 class="timeline-header"><a href="transaksi.php">Transaksi.. <i class="fa fa-arrow-right"></i></a></h3>
          <div class="timeline-body">
              ...
              Lakukan transaksi lalu simpan bukti pembayarannya (e-Nota) di Ponsel anda..
          </div>
        </div>
    </li>
    <li>
        <i class="fa fa-street-view bg-red"></i>
        <div class="timeline-item">
          <span class="time"></span>
          <h3 class="timeline-header"><a href="#">Datang Ke Tempat Kami..</a></h3>
          <div class="timeline-body">
              ...
              Datang ke tempat kami dan lakukan pembayaran dengan menunjukkan bukti transaksi..
          </div>
        </div>
    </li>
    <li>
        <i class="fa fa-send bg-blue"></i>
        <div class="timeline-item">
          <span class="time"></span>
          <h3 class="timeline-header"><a href="#">Berangkat..</a></h3>
          <div class="timeline-body">
              ...
              Enjoy..
          </div>
        </div>
    </li>
    <li>
      <i class="fa fa-child bg-blue"></i>
    </li>
</ul>
      </div>
      <br>
      <div class="col-md-4">
        <a href="wisata.php">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>DESTINASI..</h3>
            <p>Sekedar Lihat - lihat Destinasi Wisata Wilayah Jember</p>
          </div>
          <div class="icon"><i class="fa fa-eye"></i></div>
        </div>
        </a>
        <a href="paket.php">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>PAKET..</h3>
            <p>Biar Tidak Pusing.. Langsung Menuju Ke Paket Perjalanan Aja..</p>
          </div>
          <div class="icon"><i class="fa fa-gift"></i></div>
        </div>
        </a>
        <a href="mobil.php">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>MOBIL..</h3>
            <p>Lihat - Lihat Koleksi Mobil Di Garasi JTravel..</p>
          </div>
          <div class="icon">
            <i class="fa fa-car"></i>
          </div>
        </div>
        </a>
        <a href="pelanggan.php">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>REGISTRASI..</h3>
            <p>Belum Terdaftar Sebagai Pelanggan ??.. Registrasi Dulu Dong..</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
        </div>
        </a>
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