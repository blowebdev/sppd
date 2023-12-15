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
          <a href="<?php echo base_url() ?>agenda/agenda" class="btn btn-danger">Kembali</a>
      </div>
    </div>
  </div>
</div>
<br>
<?php 
$rows = $this->db->get_where("m_agenda",array('id'=>@$_REQUEST['id']))->row_array();
echo @$this->session->flashdata('alert')['alert'];
if(isset($_SESSION['alert'])){
    unset($_SESSION['alert']);
}
?>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
       <form class="form-horizontal" action="<?php echo base_url() ?>agenda/save_agenda" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Agenda</label>
          <div class="col-sm-10">
            <?php if(!empty($_REQUEST['id'])) :  ?>
            <input type="hidden" name="id" value="<?php echo @$rows['id']; ?>" class="form-control" required>
          <?php endif; ?>
            <input type="text" name="agenda" value="<?php echo @$rows['agenda']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Pilih Surat Masuk</label>
          <div class="col-sm-10">
            <select class="form-control" name="id_surat" id="id_surat" onchange="get_surat();">
              <option value="">Pilih Surat Masuk</option>
              <?php 
                $surat = $this->db->get_where("m_surat_masuk")->result_array();
                foreach ($surat as $key => $data):
              ?>
                <option value="<?php echo $data['id'] ?>" <?php echo ($data['id']==@$rows['id_surat']) ? "selected": ""; ?>><?php echo $data['nama_surat'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <script type="text/javascript">
          function get_surat() {
            var id_surat = $("#id_surat").val();
            $.ajax({
                url: '<?php echo base_url() ?>/master/surat_list?id='+id_surat,
                type: 'post',
                dataType: "json",
                success: function (data) {
                  if (!data) {
                    $("#nomor_surat").val("");
                    $("#tanggal_surat").val("");
                    $("#perihal").val("");
                    $("#tempat").val("");
                    $("#file_surat").html('<input type="" class="form-control" readonly name="">');
                  }else{
                    $("#nomor_surat").val(data['no_surat']);
                    $("#tanggal_surat").val(data['tgl_surat']);
                    $("#perihal").val(data['perihal']);
                    $("#tempat").val(data['tempat']);
                    $("#file_surat").html("<a href='<?php echo base_url() ?>file_surat/"+data['file_surat']+"'>"+data['file_surat']+"</a>");
                  }
                }
              });
          }
        </script>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Nomor Surat</label>
          <div class="col-sm-10">
            <input type="text" name="nomor_surat" id="nomor_surat" readonly value="<?php echo @$rows['nomor_surat']; ?>" class="form-control" required>
          </div>
        </div>
         <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Tanggal Surat</label>
          <div class="col-sm-10">
            <input type="date" name="tanggal_surat" id="tanggal_surat" readonly value="<?php echo @$rows['tanggal_surat']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Perihal Surat</label>
          <div class="col-sm-10">
            <input type="text" name="perihal" id="perihal" readonly value="<?php echo @$rows['perihal']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">File Surat</label>
          <div class="col-sm-10" id="file_surat">
              <?php if(!empty($_REQUEST['id'])) :  ?>
              <a href='<?php echo base_url() ?>file_surat/<?php echo $data['file_surat']; ?>'><?php echo $data['file_surat']; ?></a>
              <?php else : ?>
              <input type="" class="form-control" readonly name="">
            <?php endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Tempat</label>
          <div class="col-sm-10">
            <input type="text" name="tempat" value="<?php echo @$rows['tempat']; ?>" id="tempat" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <div class="row">
              <div class="col-sm-5"> <label for="inputtext3" class="col-sm-12 control-label">Tanggal Mulai </label><input type="datetime-local" name="tanggal_mulai" value="<?php echo @$rows['tanggal_mulai']; ?>" class="form-control" required></div>
              <div class="col-sm-5"> <label for="inputtext3" class="col-sm-12 control-label">Tanggal Selesai</label><input type="datetime-local" name="tanggal_selesai" class="form-control" value="<?php echo @$rows['tanggal_selesai']; ?>" required></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputtext3" class="col-sm-2 control-label">Deskripsi Singkat</label>
          <div class="col-sm-10">
          	<textarea class="form-control" class="form-control" rows="10" name="deskripsi"><?php echo @$rows['deskripsi']; ?></textarea>
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
