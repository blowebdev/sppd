<div class="side-content-wrap">
    <div class="sidebar-left open  rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <?php 
            $uri = $this->uri->segment(2);
        ?>
        <ul class="navigation-left">
         <li class="nav-item <?php echo (empty($uri)) ? "active" : ""; ?>"><a class="nav-item-hold" href="<?php echo base_url(); ?>"><i class="nav-icon fa fa-home"></i><span class="nav-text">Dashboard</span></a>
            <div class="triangle"></div>
        </li>
        <?php  if(in_array($_SESSION['level'],array('2'))) : ?>
        <div class="triangle"></div>
        <li class="nav-item <?php echo (in_array($uri,array('pegawai','act_pegawai'))) ? "active" : ""; ?>"><a class="nav-item-hold" href="<?php echo base_url(); ?>master/pegawai"><i class="nav-icon fa fa-users"></i><span class="nav-text">Pegawai</span></a>
            <div class="triangle"></div>
        </li>
        <div class="triangle"></div>
           <li class="nav-item <?php echo (in_array($uri,array('agenda','act_agenda')))? "active" : ""; ?>"><a class="nav-item-hold" href="<?php echo base_url(); ?>agenda/agenda"><i class="nav-icon fa fa-calendar"></i><span class="nav-text">Agenda</span></a>
            <div class="triangle"></div>
        </li>
        <?php endif; ?>
        <div class="triangle"></div>
           <li class="nav-item <?php echo (in_array($uri,array('penugasan','pelaporan','set_pelapoan','set_penugasan'))) ? "active" : ""; ?>"><a class="nav-item-hold" href="<?php echo base_url(); ?>sppd/penugasan"><i class="nav-icon fa fa-clipboard"></i><span class="nav-text">SPPD</span></a>
            <div class="triangle"></div>
        </li>
        <div class="triangle"></div>
           <li class="nav-item <?php echo (in_array($uri,array('pencairan'))) ? "active" : ""; ?>"><a class="nav-item-hold" href="<?php echo base_url(); ?>sppd/pencairan"><i class="nav-icon fa fa-dollar"></i><span class="nav-text">Pencairan</span></a>
            <div class="triangle"></div>
        </li>
        <div class="triangle"></div>
        <div class="triangle"></div>
           <li class="nav-item <?php echo (in_array($uri,array('report'))) ? "active" : ""; ?>"><a class="nav-item-hold" href="<?php echo base_url(); ?>sppd/report"><i class="nav-icon fa fa-bar-chart"></i><span class="nav-text">Report</span></a>
            <div class="triangle"></div>
        </li>
        <div class="triangle"></div>
    
    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url() ?>logout"><i class="nav-icon fa fa-sign-out" aria-hidden="true"></i><span class="nav-text">Logout</span></a>
        <div class="triangle"></div>
    </li>
</ul>
</div>
<div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
    <ul class="childNav" data-parent="monev">
        <li class="nav-item">
            <a href="<?php echo base_url() ?>master/pegawai"><i class="nav-icon i-Open-Book"></i><span class="item-name">Pegawai</span></a>
        </li>
    </ul>
     <ul class="childNav" data-parent="surat">
        <li class="nav-item">
            <a href="<?php echo base_url() ?>master/surat"><i class="nav-icon i-Open-Book"></i><span class="item-name">Masuk</span></a>
            <a href="<?php echo base_url() ?>master/sppd"><i class="nav-icon i-Open-Book"></i><span class="item-name">SPPD</span></a>
        </li>
    </ul>
</div>
    <div class="sidebar-overlay"></div>
</div>