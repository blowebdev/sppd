 <div class="d-flex flex-column">
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Tambah pencairan</h1>
      <ul>
        <li><a href="">SPPD</a></li>
        <li>Tambah pencairan yang ada di sistem</li>
      </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <a href="<?php echo base_url() ?>sppd/pencairan" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <?php 
    $rows = $this->db->get_where("m_pencairan",array('id_agenda'=>@$_REQUEST['id_agenda']))->row_array();
    $berangkat_dari  = @$rows['berangkat'];
    $lokasi_tujuan  = @$rows['lokasi'];
    $dana  = @$rows['dana'];
    $jarak  = @$rows['jarak'];
    $latlong1 = explode(',', @$rows['lat_long1']);
    $latlong2 = explode(',', @$rows['lat_long2']);
    echo @$this->session->flashdata('alert')['alert'];
    if(isset($_SESSION['alert'])){
      unset($_SESSION['alert']);
    }
    ?>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="card">
          <div class="card-body">
           <form class="form-horizontal" action="<?php echo base_url() ?>sppd/save_pencairan" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputtext3" class="col-sm-2 control-label">Pilih agenda</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_agenda" required>
                  <option value="">Pilih Agenda</option>
                  <?php 
                  $q = $this->db->get_where("m_agenda")->result_array();
                  foreach ($q as $key => $data) :
                    ?>
                    <option value="<?php echo $data['id']; ?>" <?php echo ($data['id']==@$_REQUEST['id_agenda']) ? "selected": ""; ?>><?php echo $data['agenda'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Berangkat Dari</label>
              <div class="col-sm-10">
                <input type="text" id="searchTextField" name="berangkat_dari" value="<?php echo @$berangkat_dari; ?>" class="form-control" required>
                <input type="hidden" name="lat" value="<?php echo @$latlong1[0]; ?>" id="lat">
                <input type="hidden" name="long" value="<?php echo @$latlong1[1]; ?>" id="long">
              </div>
            </div>
            <div class="form-group">
              <label for="inputtext3" class="col-sm-2 control-label">Lokasi Tujuan</label>
              <div class="col-sm-10">
                <input type="text" id="searchTextField2" placeholder="Masukan Tujuan" name="lokasi_tujuan" onkeyup="showLatLong()" value="<?php echo @$lokasi_tujuan; ?>" class="form-control" required>
                 <input type="hidden" name="lat2" value="<?php echo @$latlong2[0]; ?>" id="lat2">
                  <input type="hidden" name="long2" value="<?php echo @$latlong2[1]; ?>" id="long2">
              </div>
            </div>
            <?php if(!empty($lokasi_tujuan)) :  ?>
              <div class="col-sm-10">
               <div class="alert alert-danger">
                 <div class="form-group">
                  <label for="inputtext3" class="col-sm-2 control-label">Jarak (Km)</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $jarak; ?>" class="form-control" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputtext3" class="col-sm-2 control-label">Rekomendasi Dana (Rp.)</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo number_format(@$dana); ?>" class="form-control" required>
                  </div>
                </div>
              </div>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <br>
                 <a href="<?php echo base_url() ?>sppd/pencairan" class="btn btn-danger">Kembali</a>
                <button type="submit" <?php if(@$_REQUEST['hp']=='edit'){?> name="update_fill" <?php }else{?> name="simpan" <?php } ?> class="btn btn-primary">Tampilkan Rekomendasi Dana</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
<script
src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&callback=initMap&libraries=places&v=weekly"
defer
></script>

 <script>

      function initMap() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
              google.maps.event.addListener(autocomplete, 'place_changed', function () {
                  var place = autocomplete.getPlace();
                  var lat = place.geometry.location.lat();
                  var long = place.geometry.location.lng();
                  var panjang = place.address_components.length;
                  var index =place.address_components;
                  document.getElementById('lat').value = place.geometry.location.lat();
                  document.getElementById('long').value = place.geometry.location.lng();
              });
        }

        function showLatLong(){
           var input = document.getElementById('searchTextField2');
            var autocomplete = new google.maps.places.Autocomplete(input);
              google.maps.event.addListener(autocomplete, 'place_changed', function () {
                  var place = autocomplete.getPlace();
                  var lat = place.geometry.location.lat();
                  var long = place.geometry.location.lng();
                  var panjang = place.address_components.length;
                  var index =place.address_components;
                  document.getElementById('lat2').value = place.geometry.location.lat();
                  document.getElementById('long2').value = place.geometry.location.lng();
                  showDestination();
              });
        }

        function showDestination() {
            var lat1 = $("#lat").val();
            var long1 = $("#long").val(); 

            var lat2 = $("#lat2").val();
            var long2 = $("#long2").val();

            $.ajax({
                url: 'http://maps.googleapis.com/maps/api/directions/json?origin='+lat1+','+long2+'&destination='+lat2+','+long2+'&key=AIzaSyBTgPmRwGjuwyazUzzZl6CosQTw1qpUDtY&mode=motorcycle',
                type: 'get',
                success: function (data) {
                  console.log(data);
                }
              });
        }
    </script>