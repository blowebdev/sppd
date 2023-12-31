 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Tambah Agenda SPPD</h1>
      <ul>
        <li><a href="">SPPD</a></li>
        <li>Tambah Agenda SPPD yang ada di sistem</li>
      </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
          <a href="<?php echo base_url() ?>master/surat_masuk" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</div>
<br>
<?php 
$rows = $this->db->get_where("m_surat_masuk",array('id'=>@$_REQUEST['id']))->row_array();
echo @$this->session->flashdata('alert')['alert'];
if(isset($_SESSION['alert'])){
    unset($_SESSION['alert']);
}
?>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
       <form class="form-horizontal" action="<?php echo base_url() ?>master/save_surat_masuk" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Surat</label>
          <div class="col-sm-10">
            <?php if(!empty($_REQUEST['id'])) :  ?>
            <input type="hidden" name="id" value="<?php echo @$rows['id']; ?>" class="form-control" required>
          <?php endif; ?>
            <input type="text" name="nama_surat" value="<?php echo @$rows['nama_surat']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Nomor Surat</label>
          <div class="col-sm-10">
            <input type="text" name="nomor_surat" value="<?php echo @$rows['no_surat']; ?>" class="form-control" required>
          </div>
        </div>
         <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Tanggal Surat</label>
          <div class="col-sm-10">
            <input type="date" name="tanggal_surat" value="<?php echo @$rows['tgl_surat']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Perihal Surat</label>
          <div class="col-sm-10">
            <input type="text" name="perihal" value="<?php echo @$rows['perihal']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Upload File Surat</label>
          <div class="col-sm-10">
            <?php if(!empty($_REQUEST['id'])) : ?>
            <input type="file" name="file" class="form-control">
            <input type="hidden" value="<?php echo @$rows['file_surat']; ?>" name="file_lama" class="form-control">
            <a href="<?php echo base_url() ?>file_surat/<?php echo @$rows['file_surat']; ?>"><?php echo @$rows['file_surat']; ?></a>
            <?php else : ?>
            <input type="file" name="file" class="form-control" required>
            <?php endif;  ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Tempat</label>
          <div class="col-sm-10">
            <input type="text" name="tempat" value="<?php echo @$rows['tempat']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Deskripsi Singkat</label>
          <div class="col-sm-10">
          	<textarea class="form-control" class="form-control" rows="10" name="deskripsi"><?php echo @$rows['deskripsi_surat']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <br>
            <button type="submit" <?php if(@$_REQUEST['hp']=='edit'){?> name="update_fill" <?php }else{?> name="simpan" <?php } ?> class="btn btn-primary">Tambah</button>
            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<br>
<br>
