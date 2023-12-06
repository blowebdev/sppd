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
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    $q = $this->db->get_where("m_agenda")->result_array();
    foreach ($q as $key => $data) :
      $totPenugasan = $this->db->get_where("m_penugasan",array('id_agenda'=>$data['id']))->num_rows();
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['agenda']?></td>
        <td><?=$data['tempat']?></td>
        <td><?=$data['tanggal_mulai']?></td>
        <td><?=$data['tanggal_selesai']?></td>
        <td><?php echo $totPenugasan; ?> Pegawai</td>
        <td><?=(@$data['status']=='proses') ? "<label class='text-warning'>PROSES</label>": "<label class='text-success'>SELESAI</label>";?></td>
        <td nowrap="">
          <?php  if(in_array($_SESSION['level'],array('1'))) : ?>
            <a href="<?php echo base_url() ?>sppd/set_penugasan?id=<?php echo $data['id'] ?>" class="btn btn-info"><i class="fa fa-users"></i> Set Penugasan</a>
          <?php endif; ?>
          <?php if($totPenugasan>=1) :  ?>
             <?php  if(in_array($_SESSION['level'],array('1'))) : ?>
              <a href="<?php echo base_url() ?>sppd/pelaporan?id=<?php echo $data['id'] ?>" class="btn btn-warning"><i class="fa fa-file-text" aria-hidden="true"></i> Pelaporan</a>
              <?php endif; ?>
             <?php  if(in_array($_SESSION['level'],array('2'))) : ?>
             <a href="<?php echo base_url() ?>sppd/cetak_sppd?id=<?php echo $data['id'] ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak SPPD</a>
             <?php endif; ?>
          <?php endif; ?>
        </td>
      </tr> 
    <?php endforeach; ?>
  </tbody>
</table>