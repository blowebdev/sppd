 <div class="sidenav-open d-flex flex-column">
    <div class="main-content">
       <div class="breadcrumb">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="">Dashboard</a></li>
            <li>Statistik Dashboard</li>
        </ul>
    </div>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Add-User"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Agenda</p>
                    <p class="text-primary text-24 line-height-1 mb-2">
                        <?php 
                            $totAgenda = $this->db->get("m_agenda")->num_rows();
                            echo $totAgenda;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Financial"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Pegawai</p>
                    <p class="text-primary text-24 line-height-1 mb-2">
                        <?php 
                            $totPegawai = $this->db->get("m_pegawai")->num_rows();
                            echo $totPegawai;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Checkout-Basket"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Laporan</p>
                    <p class="text-primary text-24 line-height-1 mb-2">
                        <?php 
                            $totLaporanPegawai = $this->db->get("m_penugasan")->num_rows();
                            echo $totLaporanPegawai;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Money-2"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0">Selesai</p>
                    <p class="text-primary text-24 line-height-1 mb-2">
                        <?php 
                            $totLaporanPegawai = $this->db->get_where("m_agenda",array('status'=>'selesai'))->num_rows();
                            echo $totLaporanPegawai;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>

<div class="row mt--2">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-body pb-0">
                <div class="elementor-widget-container">

                    <div class="card-body">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

