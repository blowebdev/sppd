 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Surat Masuk</h1>
      <ul>
        <li><a href="">SPPD</a></li>
        <li>List Surat Masuk yang akan datang</li>
      </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
     <div class="col-lg-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <a href="<?php echo base_url() ?>master/act_surat_masuk" class="btn btn-info"><i class="fa fa-users"></i> Tambah Surat</a>
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
      <th width="3%">Nama Surat</th>
      <th>Tempat</th>
      <th>Tanggal Surat</th>
      <th>Perihal</th>
      <th>Deskripsi Surat</th>
      <th>File Surat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    $q = $this->db->get("m_surat_masuk")->result_array();
    foreach ($q as $key => $data) :
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['nama_surat']?></td>
        <td><?=$data['tempat']?></td>
        <td><?=$data['tgl_surat']?></td>
        <td><?=$data['perihal']?></td>
        <td><?=$data['deskripsi_surat']?></td>
        <td>
          <a class="btn btn-info" href="<?php echo base_url() ?>file_surat/<?php echo @$data['file_surat']; ?>"><i class="fa fa-cloud-download"></i></a>
        </td>
        <td nowrap="">
          <form action="<?php echo base_url() ?>master/delete_surat_masuk" method="POST">
            <a href="<?php echo base_url() ?>master/act_surat_masuk?id=<?php echo $data['id']; ?>" class="btn btn-info" style="color: white;"><i class="fa fa-edit"></i> Edit</a>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <button class="btn btn-danger" name="hapus" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>