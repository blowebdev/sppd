 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Penugasan</h1>
      <ul>
        <li><a href="">Pegawai</a></li>
        <li>List Penugasan</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
  <?php echo @$this->session->flashdata('alert')['alert'];
  if(isset($_SESSION['alert'])){
    unset($_SESSION['alert']);
  }?>
  <br>
  <table class="display table table-striped" id="datatable" style="width:100%">
    <thead>
     <tr style="vertical-align: top;">
      <th>No</th>
      <th width="3%">Agenda</th>
      <th>Tempat</th>
      <th>Tanggal Mulai</th>
      <th>Tanggal Selesai</th>
      <th>Pegawai Yang Ditugaskan</th>
      <th>File Surat</th>
      <th>Status</th>
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
    $q = $this->db->get_where("m_agenda")->result_array();
    }
    foreach ($q as $key => $data) :
      $totPenugasan = $this->db->get_where("m_penugasan",array('id_agenda'=>$data['id']))->num_rows();
      $rows = $this->db->get_where("m_surat_masuk",array('id'=>@$data['id_surat']))->row_array();
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['agenda']?></td>
        <td><?=$data['tempat']?></td>
        <td><?=$data['tanggal_mulai']?></td>
        <td><?=$data['tanggal_selesai']?></td>
        <td><?php echo $totPenugasan; ?> Pegawai</td>
        <td>
          <a class="btn btn-info" href="<?php echo base_url() ?>file_surat/<?php echo @$rows['file_surat']; ?>"><i class="fa fa-cloud-download"></i></a>
        </td>
        <td><?=(@$data['status']=='proses') ? "<label class='text-warning'>PROSES</label>": "<label class='text-success'>SELESAI</label>";?></td>
        <td nowrap="">
          <?php  if(in_array($_SESSION['level'],array('1'))) : ?>
            <a href="<?php echo base_url() ?>sppd/set_penugasan?id=<?php echo $data['id'] ?>" class="btn btn-info"><i class="fa fa-users"></i> Set Penugasan</a>
          <?php endif; ?>

          <?php if($totPenugasan>=1) :  ?>
              <a href="<?php echo base_url() ?>sppd/pelaporan?id=<?php echo $data['id'] ?>" class="btn btn-success"><i class="fa fa-folder-open"></i> Pelaporan</a>
             <?php  if(in_array($_SESSION['level'],array('2'))) : ?>
             <a href="<?php echo base_url() ?>sppd/cetak_sppd?id=<?php echo $data['id'] ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak SPPD</a>
             <?php endif; ?>
          <?php endif; ?>
        </td>
      </tr> 
    <?php endforeach; ?>
  </tbody>
</table>