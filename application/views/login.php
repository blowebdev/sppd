
<!doctype html>
<html lang="en">
<head>
 <!-- metas -->
 <meta charset="utf-8">
 <!-- Meta -->
 <meta name="google-site-verification" content="beN0gzc-OSu4PpoiP3tLVtHf3iFjq1ZRahl462Roev4" />

 <meta name="description" content="Emonev merupakan sistem informasi yang di bangun untuk memonitoring capaian kinerja perangkat daerah di lingkup kota surabaya, aplikasi ini ter integrasi dengan edata surabaya untuk menampilkan secara rinci data pendukung capaian kinerja perangkat daerah" itemprop="description">
 <meta name="keywords" content="e-monev surabaya, emonev surabaya, emonev pemerintah kota surabaya, e monev surabaya, Pemerintah Kota Surabaya, e Monev, e-monev, Monitoring Dan Evaluasi,Badan Perancanaan Pembangunan Pemerintah Kota Surabaya, Bappeko Surabaya" itemprop="keywords">
 <meta name="author" content="Sub Bidang Evaluasi | Evalitbang">
 <meta name="copyright" content="Badan Perancaan Pembangunan Kota Surabaya" itemprop="dateline" />
 <meta name="thumbnailUrl" content="" itemprop="thumbnailUrl" />
 <meta content="https://bappeko.surabaya.go.id/monev2018" itemprop="url" />

 <!-- Properti Facebook -->
 <meta property="og:title" content="e-Monev Pemerintah Kota Surabaya"/>
 <meta property="og:site_name" content="Sub Bidang Evaluasi | Bidang Evalitbang Bappeko Surabaya"/>
 <meta property="og:image" content="" />
 <meta property="og:url" content="https://bappeko.surabaya.go.id/monev2018" />
 <meta property="og:image:type" content="image/jpeg" />
 <meta property="og:image:width" content="500" />
 <meta property="og:image:height" content="300" />
 <meta property="og:description" content="Emonev merupakan sistem informasi yang di bangun untuk memonitoring capaian kinerja perangkat daerah di lingkup kota surabaya, aplikasi ini ter integrasi dengan edata surabaya untuk menampilkan secara rinci data pendukung capaian kinerja perangkat daerah"/>
 <title>Sistem Infomasi SPPD | SMPN 1 Mojowarno</title>
 <link rel="icon" href="../monev2018/logosby.png">
 <link rel="icon" href="<?php echo base_url(); ?>assets/img/core-img/favicon.ico">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/style.css">
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>

  <!-- Preloader -->
  <div id="preloader">
    <div class="apland-load"></div>
  </div>

  <!-- Register Area -->
  <div class="register-area d-flex">
    <div class="register-content-wrapper d-flex align-items-center">
      <div class="register-content">
        <!-- Logo -->
        <a href="#" class="logo">
         <table>
          <tbody><tr>
            <td style="font-family: 'arial'; font-weight: bold; font-size: 40px; " valign="">SPPD <br>(Sistem Informasi Perintah Perjalanan Dinas)</td>
          </tr>
        </tbody>
      </table>
    </a>

    <h5></h5>
    <p>Silahkan login untuk memulai bekerja</p>
<!-- Register Form -->
<div class="register-form">
  <form action="<?php echo base_url() ?>auth/act_login" method="post">
    <div class="form-group">
      <i class="icofont-ui-user"></i>
      <input type="text" class="form-control" value="<?php echo @$_REQUEST['username']; ?>" placeholder="Username" name="username">
    </div>
    <div class="form-group">
      <i class="icofont-lock"></i>
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
    
    <button type="submit" class="btn apland-btn w-100" name="login"><i class="icofont-sign-in"></i> Log in</button>
  </form>
</div>

<!-- Sign in via others -->
<div class="signin-via-others">
  <p>Petunjuk Teknis Sistem</p>
  <a href="#" class="btn apland-btn btn-4 w-100 mt-15"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Juknis </a>
  <a href="#" class="btn apland-btn btn-4 w-100 mt-15"><i class="fa fa-reply-all" aria-hidden="true"></i>  Portal</a>
</div>

<!-- Footer Copwrite Area -->
<div class="footer_bottom">
  <p>@ <?php echo date('Y'); ?> | SMPN 1 Mojowarno.</p>
</div>
</div>
</div>

<!-- Register Side Content -->
<style type="text/css">
  .bg-img{
    width: 10px !important;
  }
</style>
<div class="register-side-content bg-img" style="background-image: url(<?php echo base_url(); ?>assets/login/img/bg-img/banner2.svg);"></div>
</div>


<script src="<?php echo base_url(); ?>assets/login/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/owl.carousel.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/login/js/waypoints.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/login/js/jquery.easing.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/login/js/default/classy-nav.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/default/sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/default/mail.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/default/scrollup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/default/one-page-nav.js"></script>    
<script src="<?php echo base_url(); ?>assets/login/js/jarallax.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jarallax-video.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.magnific-popup.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/login/js/wow.min.js"></script>
<!-- Active js -->
<script src="<?php echo base_url(); ?>assets/login/js/default/active.js"></script>
</body>
</html>