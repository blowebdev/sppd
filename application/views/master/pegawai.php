 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Pegawai</h1>
      <ul>
        <li><a href="">SPPD</a></li>
        <li>List pegawai yang ada di sistem</li>
      </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
     <div class="col-lg-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <a href="<?php echo base_url() ?>master/act_pegawai" class="btn btn-primary"><i class="fa fa-users"></i> Tambah Pegawai</a>
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
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['nip']?></td>
        <td><?=$data['nama']?></td>
        <td><?=$data['jk']?></td>
        <td><?=$data['golongan']?></td>
        <td><?=$data['pangkat']?></td>
        <td><?=$data['jabatan']?></td>
        <td nowrap="">
          <form action="<?php echo base_url() ?>master/delete_pegawai" method="POST">
            <a href="<?php echo base_url() ?>master/act_pegawai?id=<?php echo $data['id']; ?>" class="btn btn-primary" style="color: white;"><i class="fa fa-edit"></i> Edit</a>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <button class="btn btn-danger" name="hapus" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>