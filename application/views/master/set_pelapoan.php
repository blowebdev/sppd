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
            <a href="<?php echo base_url() ?>sppd/pelaporan?id=<?php echo $_REQUEST['id_agenda']; ?>" class="btn btn-danger">Kembali</a>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <?php 
                $showTanggal = $this->db->select("*, DATE(tanggal_mulai) as mulai, DATE(tanggal_selesai) as selesai, TIME(tanggal_mulai) as jam_mulai, TIME(tanggal_selesai) as jam_selesai")->get_where("m_agenda",array('id'=>$_REQUEST['id_agenda']))->row_array();
                $showPegawai = $this->db->get_where("m_pegawai",array('id'=>$_REQUEST['id_pegawai']))->row_array();
                $detailIsian = $this->db->get_where("m_penugasan",array('id_agenda'=>$_REQUEST['id_agenda'], 'id_pegawai'=>$_REQUEST['id_pegawai']))->row_array();
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
                <tr>
                  <td>NIP </td>
                  <td> : <?php echo $showPegawai['nip']; ?></td>
                </tr>
                <tr>
                  <td>Pegawai </td>
                  <td> : <?php echo $showPegawai['nama']; ?></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
          </div>
        </div>
      </div>
    </div>
    <br>
      <?php echo @$this->session->flashdata('alert')['alert'];
  if(isset($_SESSION['alert'])){
    unset($_SESSION['alert']);
  }?>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="<?php echo base_url() ?>sppd/save_deskripsi_pelapoan" method="post">
              <label class="text-muted">Deskripsi Disini</label>
              <input type="hidden" name="id_agenda" value="<?php echo $_REQUEST['id_agenda'] ?>">
              <input type="hidden" name="id_pegawai" value="<?php echo $_REQUEST['id_pegawai'] ?>">
              <textarea style="width: 100%;" name="deskripsi" rows="20" required>
               <?php echo (!empty($detailIsian['deskripsi_laporan'])) ? $detailIsian['deskripsi_laporan'] : "Deskripsi Hasil Pertemuan :" ?>
              </textarea>
              <br>
              <a href="<?php echo base_url() ?>sppd/pelaporan?id=<?php echo $_REQUEST['id_agenda']; ?>" class="btn btn-danger">Kembali</a>
              <button class="btn btn-info">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>