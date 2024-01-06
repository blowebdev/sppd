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
              <tr>
                <td>Status </td>
                <td>
                  <?php if(@$showTanggal['status']=='tolak') : ?>
                    <label class='text-danger'>DITOLAK</label>
                    <?php else : ?>
                      <?=(@$showTanggal['status']=='proses') ? "<label class='text-warning'>PROSES</label>": "<label class='text-success'>SELESAI</label>";?>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td>Verifikasi </td>
                  <td nowrap="">
                    <?php if(in_array($_SESSION['level'],array('1'))) : ?>
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verifikasiAgenda"><i class="fa fa-folder-open"></i> Verifikasi</button>
                      <?php else : ?>
                        Hak Akses Admin
                      <?php endif; ?>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>

          <div id="verifikasiAgenda" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Verifikasi Laporan</h4>
                </div>
                <div class="modal-body">
                  <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                    <label>Verifikasi</label>
                    <select class="form-control" name="status" required="">
                      <option value="setuju" <?=($showTanggal['status']=='setuju') ? "selected" : "";?>>Setuju</option>
                      <option value="tolak"  <?=($showTanggal['status']=='tolak') ? "selected" : "";?>>Tolak</option>
                    </select>
                    <label>Catatan</label>
                    <textarea class="form-control" name="catatan" rows="10" cols="10" style="width: 50vh !important; height: 20vh;"><?=$showTanggal['catatan'];?></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpan_verifikasi_agenda" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
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
        if($_SESSION['level']==4){
         $q = $this->db->query("
          SELECT a.*, b.*, c.*, a.id as id_uniq, a.deskripsi_laporan FROM m_penugasan as a 
          LEFT JOIN m_pegawai as b ON a.id_pegawai = b.id
          LEFT JOIN m_agenda as c ON a.id_agenda = c.id
          WHERE b.id='".$_SESSION['data']['id']."' 
          ")->result_array();;
       }else{
        $q = $this->db->query("
          SELECT a.*, b.*, c.*, a.id as id_uniq, a.deskripsi_laporan FROM m_penugasan as a 
          LEFT JOIN m_pegawai as b ON a.id_pegawai = b.id
          LEFT JOIN m_agenda as c ON a.id_agenda = c.id
          WHERE a.id_agenda='".$_REQUEST['id']."'
          ")->result_array();
      }
      foreach ($q as $key => $data) :

        ?>
        <tr>
          <td><?=$data['nip']?></td>
          <td><?=$data['nama']?></td>
          <td><?=$data['deskripsi_laporan']?></td>  
          <td nowrap="">
           <?php  if(in_array($_SESSION['level'],array('4'))) : ?>
            <a href="<?php echo base_url() ?>sppd/set_pelapoan?id_agenda=<?php echo $data['id_agenda']; ?>&id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-info"><i class="fa fa-folder-open"></i> Isi Laporan</a>
            <?php elseif(in_array($_SESSION['level'],array('1'))) : ?>
             <!--  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verifikasi<?php echo $data['id_uniq']; ?>"><i class="fa fa-folder-open"></i> Verifikasi</button> -->
             <i>Hak Akses Pegawai</i>
             <?php else : ?>
              <i>Hak Akses Pegawai</i>
            <?php endif; ?>
          </td>
        </tr>

        <div id="verifikasi<?php echo $data['id_uniq']; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Verifikasi laporan atas nama [<b><?=$data['nama']; ?></b>]</h4>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <input type="hidden" name="id_uniq" value="<?php echo $data['id_uniq']; ?>">
                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                  <label>Verifikasi</label>
                  <select class="form-control" name="status" required="">
                    <option value="setuju" <?=($data['status_laporan']=='setuju') ? "selected" : "";?>>Setuju</option>
                    <option value="tolak"  <?=($data['status_laporan']=='tolak') ? "selected" : "";?>>Tolak</option>
                  </select>
                  <label>Catatan</label>
                  <textarea class="form-control" name="catatan" rows="10" cols="10" style="width: 47vh !important; height: 20vh;"><?=$data['status_laporan'];?></textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" name="simpan_verifikasi" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>

          </div>
        </div>

      <?php endforeach; ?>
    </tbody>
  </table>
