 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Pelaporan Setelah Tugas</h1>
      <ul>
        <li><a href="">Pegawai</a></li>
        <li>List Pelaporan</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <?php 
                $showTanggal = $this->db->select("*, DATE(tanggal_mulai) as mulai, DATE(tanggal_selesai) as selesai, TIME(tanggal_mulai) as jam_mulai, TIME(tanggal_selesai) as jam_selesai")->get_where("m_agenda",array('id'=>$_REQUEST['id']))->row_array();
            ?>
            <table style="width: 100%;" class="table table-striped">
                <tr>
                  <td width="50px">Tanggal </td>
                  <td> : <?php echo tgl_indo($showTanggal['mulai'],true); ?> s/d <?php echo tgl_indo($showTanggal['selesai'],true); ?></td>
                </tr>
                <tr>
                  <td>Jam </td>
                  <td> : <?php echo $showTanggal['jam_mulai']." - ".$showTanggal['jam_selesai']; ?></td>
                </tr>
                <tr>
                  <td>Tempat </td>
                  <td> : <?php echo $showTanggal['tempat']; ?></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
          </div>
        </div>
      </div>
    </div>
    <?php echo @$this->session->flashdata('alert')['alert'];
    if(isset($_SESSION['alert'])){
      unset($_SESSION['alert']);
    }?>
    <br>

    <table class="display table table-striped" id="datatable2" style="width:100%">
      <thead>
       <tr style="vertical-align: top;">
        <th width="1%">NIP</th>
        <th width="3%">Nama</th>
        <th>Deskripsi Laporan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      $q = $this->db->query("
        SELECT a.*, b.*, c.*, a.id as id_uniq, a.deskripsi_laporan FROM m_penugasan as a 
        LEFT JOIN m_pegawai as b ON a.id_pegawai = b.id
        LEFT JOIN m_agenda as c ON a.id_agenda = c.id
        WHERE a.id_agenda='".$_REQUEST['id']."'
        ")->result_array();
      foreach ($q as $key => $data) :

        ?>
        <tr>
          <td><?=$data['nip']?></td>
          <td><?=$data['nama']?></td>
          <td><?=$data['deskripsi_laporan']?></td>
          <td nowrap="">
              <a href="<?php echo base_url() ?>sppd/set_pelapoan?id_agenda=<?php echo $data['id_agenda']; ?>&id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-info"><i class="fa fa-folder-open"></i> Isi Laporan</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>