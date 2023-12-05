 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Setting Penugasan</h1>
      <ul>
        <li>List Pegawai Penugasan</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
  <?php echo @$this->session->flashdata('alert')['alert'];
  if(isset($_SESSION['alert'])){
    unset($_SESSION['alert']);
  }?>
 <div class="accordion" id="accordionLeftIcon">
    <div class="card ul-card__v-space">
    <div class="card-header header-elements-inline">
      <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
        <a data-toggle="collapse" class="collapsed" href="#accordion-item-icon-left-2">Tambah Pegawai</a>
      </h6>
    </div>
    <div id="accordion-item-icon-left-2" class="collapse" data-parent="#accordionLeftIcon">
      <div class="card-body" style="width: 100%;">
        
         <table class="display table table-striped" id="datatable" style="width:100%">
              <thead>
               <tr style="vertical-align: top;">
                <th>NIP</th>
                <th width="3%">Nama</th>
                <th>JK</th>
                <th>Golongan</th>
                <th>Pangkat</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              $q = $this->db->get("m_pegawai")->result_array();
              foreach ($q as $key => $data) :
                 $rest_check = $this->db->get_where("m_penugasan",array('id_agenda'=>$_REQUEST['id'], 'id_pegawai'=>$data['id']))->num_rows();
                  if($rest_check<=0){
                ?>
                <tr>
                  <td><?=$data['nip']?></td>
                  <td><?=$data['nama']?></td>
                  <td><?=$data['jk']?></td>
                  <td><?=$data['golongan']?></td>
                  <td><?=$data['pangkat']?></td>
                  <td><?=$data['jabatan']?></td>
                  <td nowrap="">
                    <form action="<?php echo base_url() ?>sppd/save_set_penugasan" method="POST">
                      <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="id_agenda">
                      <input type="hidden" value="<?php echo $data['id']; ?>" name="id_pegawai">
                      <button class="btn btn-primary" name="hapus" onclick="return confirm('Apakah anda yakin ingin menugaskan pegawai ini ?')"><i class="fa fa-check"></i> Tugaskan</button>
                    </form>
                  </td>
                </tr>
                <?php } ?>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <div class="card ul-card__v-space">
    <div class="card-header header-elements-inline">
      <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
        <a data-toggle="collapse" class="" href="#accordion-item-icon-left-1">List Pegawai Yang Di Tugaskan</a>
      </h6>
    </div>
    <div id="accordion-item-icon-left-1" class="collapse show" data-parent="#accordionLeftIcon">
      <div class="card-body">
        <table class="display table table-striped" id="datatable2" style="width:100%">
              <thead>
               <tr style="vertical-align: top;">
                <th>NIP</th>
                <th width="3%">Nama</th>
                <th>JK</th>
                <th>Golongan</th>
                <th>Pangkat</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=1;
              $q = $this->db->query("
                SELECT * FROM m_penugasan as a 
                LEFT JOIN m_pegawai as b ON a.id_pegawai = b.id
                WHERE a.id_agenda='".$_REQUEST['id']."'
              ")->result_array();
              foreach ($q as $key => $data) :
                 
              ?>
                <tr>
                  <td><?=$data['nip']?></td>
                  <td><?=$data['nama']?></td>
                  <td><?=$data['jk']?></td>
                  <td><?=$data['golongan']?></td>
                  <td><?=$data['pangkat']?></td>
                  <td><?=$data['jabatan']?></td>
                  <td nowrap="">
                    <form action="<?php echo base_url() ?>sppd/delete_set_penugasan" method="POST">
                      <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="id_agenda">
                      <input type="hidden" value="<?php echo $data['id']; ?>" name="id_pegawai">
                      <button class="btn btn-danger" name="hapus" onclick="return confirm('Apakah anda yakin ingin menugaskan pegawai ini ?')"><i class="fa fa-trash"></i> Batalkan</button>
                    </form>
                  </td>
                </tr>
              
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

</div>