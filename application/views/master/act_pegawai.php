 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Tambah Pegawai</h1>
      <ul>
        <li><a href="">SPPD</a></li>
        <li>Tambah pegawai yang ada di sistem</li>
      </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
          <a href="<?php echo base_url() ?>master/pegawai" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </div>
</div>
<br>
<?php 
$rows = $this->db->get_where("m_pegawai",array('id'=>@$_REQUEST['id']))->row_array();
$nip        = @$rows['nip'];
$nama       = @$rows['nama'];
$tempat     = @$rows['tempat_lahir'];
$tgl_lahir  = @$rows['tanggal_lahir'];
$golongan     = @$rows['golongan'];
$pangkat = @$rows['pangkat'];
$jabatan    = @$rows['jabatan'];
$username   = @$rows['username'];
$password   = @$rows['password'];
$alamat   = @$rows['alamat'];
$status     = @$rows['struktural'];
$hp     = @$rows['no_hp'];
$file       = @$rows['file'];
echo @$this->session->flashdata('alert')['alert'];
if(isset($_SESSION['alert'])){
    unset($_SESSION['alert']);
}
?>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
       <form class="form-horizontal" action="<?php echo base_url() ?>master/save_pegawai" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-10">
            <?php if(!empty($_REQUEST['id'])) :  ?>
            <input type="hidden" name="id" value="<?php echo $rows['id']; ?>" class="form-control" required>
          <?php endif; ?>
            <input type="text" name="nip" value="<?php echo $nip; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <div class="row">
              <div class="col-sm-5"> <label for="inputtext3" class="col-sm-12 control-label">Tempat</label><input type="text" name="tempat_lahir" value="<?php echo $tempat; ?>" class="form-control" required></div>
              <div class="col-sm-5"> <label for="inputtext3" class="col-sm-12 control-label">Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $tgl_lahir; ?>" required></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select class="form-control" name="jk">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="L" <?php echo (@$rows['jk']=='L') ? "selected": ""; ?>>Laki-Laki</option>
              <option value="P" <?php echo (@$rows['jk']=='P') ? "selected": ""; ?>>Perempuan</option>
            </select>
          </div>
        </div>
         <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">HP</label>
          <div class="col-sm-10">
            <input type="text" name="no_hp" value="<?php echo $hp; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Golongan</label>
          <div class="col-sm-10">
            <input type="text" name="golongan" value="<?php echo $golongan; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" required></input>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Pangkat</label>
          <div class="col-sm-10">
            <input type="text" name="pangkat" value="<?php echo $pangkat; ?>" class="form-control" required>  
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Jabatan</label>
          <div class="col-sm-10">
            <input type="text" name="jabatan" value="<?php echo $jabatan; ?>" class="form-control" required>  
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>  
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" required>  
            <input type="hidden" name="password_lama" class="form-control" required>  
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
