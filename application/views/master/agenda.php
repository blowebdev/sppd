 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Agenda</h1>
      <ul>
        <li><a href="">SPPD</a></li>
        <li>List agenda yang akan datang</li>
      </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
     <div class="col-lg-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <a href="<?php echo base_url() ?>agenda/act_agenda" class="btn btn-danger"><i class="fa fa-users"></i> Tambah Agenda</a>
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
      <th>Deskripsi Singkat</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    $q = $this->db->get("m_agenda")->result_array();
    foreach ($q as $key => $data) :
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['agenda']?></td>
        <td><?=$data['tempat']?></td>
        <td><?=$data['tanggal_mulai']?></td>
        <td><?=$data['tanggal_selesai']?></td>
        <td><?=$data['deskripsi']?></td>
        <td><?=(@$data['status']=='proses') ? "<label class='text-warning'>PROSES</label>": "<label class='text-success'>SELESAI</label>";?></td>
        <td nowrap="">
          <form action="<?php echo base_url() ?>agenda/delete_agenda" method="POST">
            <a href="<?php echo base_url() ?>agenda/act_agenda?id=<?php echo $data['id']; ?>" class="btn btn-warning" style="color: white;"><i class="fa fa-edit"></i> Edit</a>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <button class="btn btn-danger" name="hapus" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>