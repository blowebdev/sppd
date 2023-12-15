 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Pencairan</h1>
      <ul>
        <li><a href="">Pegawai</a></li>
        <li>List Pencairan</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
     <div class="col-lg-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <a href="<?php echo base_url() ?>sppd/act_pencairan" class="btn btn-danger"><i class="fa fa-users"></i> Tambah Pencairan</a>
        </div>
      </div>
    </div>
  </div>
  <br>
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
      <th>Jarak</th>
      <th>Koefisien</th>
      <th>Dana Dicairkan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    $q = $this->db->get_where("m_agenda")->result_array();
    foreach ($q as $key => $data) :
      $rows = $this->db->get_where("m_pencairan",array('id_agenda'=>@$data['id']))->row_array();
    ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['agenda']?></td>
        <td><?=$data['tempat']?></td>
        <td><?=$data['tanggal_mulai']?></td>
        <td><?=$data['tanggal_selesai']?></td>
        <td><?=@$rows['jarak']?></td>
        <td>Rp. 4000/ 1 KM</td>
        <td><?=number_format(@$rows['dana'])?></td>
        <td nowrap="">
           <button type="button" class="btn bg-transparent _r_btn border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="_dot _r_block-dot bg-dark"></span>
                <span class="_dot _r_block-dot bg-dark"></span>
                <span class="_dot _r_block-dot bg-dark"></span>
            </button>
            <div class="dropdown-menu" x-placement="bottom-start">
                <a class="dropdown-item" href="<?php echo base_url() ?>sppd/act_pencairan?id_agenda=<?php echo $data['id']; ?>"><i class="nav-icon i-Pen-2 text-success font-weight-bold mr-2"></i>Edit Contact</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>sppd/cetak_kwitansi?id_agenda=<?php echo $data['id']; ?>"><i class="nav-icon fa fa-dollar text-danger font-weight-bold mr-2"></i>Cetak Kwitansi</a>                      
            </div>
        </td>
      </tr> 
    <?php endforeach; ?>
  </tbody>
</table>