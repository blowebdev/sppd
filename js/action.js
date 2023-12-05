	notif();
notif2();
function view_kegiatan(id,kode_kegiatan,unit_id) {
	$("#view_monev_kegiatan"+id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'show_kegiatan/'+id+'/'+kode_kegiatan+"/"+unit_id,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			notif();
			notif2();
			$('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
			$("[data-toggle=popover]").popover();
			$("#view_monev_kegiatan"+id).html(data);
		}
	});
}


function view_sub_kegiatan(sub_id,kode_kegiatan,unit_id) {
	$("#show_indikator_sub_kegiatan"+sub_id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'show_indikator_sub_kegiatan/'+sub_id+'/'+kode_kegiatan+"/"+unit_id,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			notif();
			notif2();
			$("#subkegiatan"+sub_id).collapse('show');
			$('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
			$("[data-toggle=popover]").popover();
			$("#show_indikator_sub_kegiatan"+sub_id).html(data);
		}
	});
}




function view_halaman_monev(sub_id,kode_kegiatan,unit_id) {
	$("#view_halaman_monev"+sub_id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'view_halaman_monev/'+sub_id+'/'+kode_kegiatan+"/"+unit_id,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			notif();
			notif2();
			$("#indikator_subkegiatan"+sub_id).collapse('show');
			$('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
			$("[data-toggle=popover]").popover();
			$("#view_halaman_monev"+sub_id).html(data);
		}
	});
}
function view_tombol_verifikasi(id,kode_kegiatan,bulan,unit_id,level) {
	// notif();
	// alert('asjksa');
	$("#tombol_verifikasi"+bulan+id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'view_tombol_verifikasi/'+id+'/'+kode_kegiatan+'/'+bulan+'/'+unit_id+'?level='+level,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			$("[data-toggle=popover]").popover();
			$("#tombol_verifikasi"+bulan+id).html(data);
		}
	});
}

function load_warna(id,kode_kegiatan,bulan){
	notif();
	$.ajax({
		url: 'color/'+id,
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// console.log(data);
			$("#coloring"+id).removeAttr("style");
			$("#coloring"+id).attr("style","height: 100%; background-color:"+data+"");
		}
	});
	
}


function notif() {
	$('#notifikasi').html('<span class="spinner-glow spinner-glow-primary mr-5"></span>');
	$.ajax({
		url: 'notifikasi/false',
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// console.log(data);
			$('#notifikasi').html(data);
			$('#notifikasi_notif').html(data);
		}
	});
	
}



function notif2() {
	$('#notifikasi2').html('<span class="spinner-glow spinner-glow-primary mr-5"></span>');
	$.ajax({
		url: 'notifikasi/true',
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// console.log(data);
			$('#notifikasi2').html(data);
			// $('#notifikasi_notif').html(data);
		}
	});
	
}



function view_aspek_mutu(kode_kegiatan,id) {
	$('#pehitungan'+id).html('<span class="spinner-glow spinner-glow-primary mr-5"></span>');
	$.ajax({
		url: 'pages/monev_kegiatan/aspek_mutu.php?kode_kegiatan='+kode_kegiatan,
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// console.log(data);
			$('#pehitungan'+id).html(data);
			// $('#notifikasi_notif').html(data);
		}
	});
}



function kunci(kunci){
	$.ajax({
		url: 'pages/monev_kegiatan/buka_bunci_monev.php?kunci='+kunci,
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// alert('berhasil');
			// console.log(data);
			// $('#notifikasi_notif').html(data);
		}
	});
}

 function show_realisasi_data (level, id_indikator, bulan,unit_id) {
 	$('#loading_realisasi').html('<span class="spinner-bubble spinner-bubble-danger m-5"></span>');
 	$('#tombol_metu').attr('onclick', 'show_realisasi_nilai("'+level+'","'+id_indikator+'","'+bulan+'","'+unit_id+'" 	);');

 	$.ajax({
		url: 'show_realisasi_data?level='+level+'&id_indikator='+id_indikator+'&bulan='+bulan+'&unit_id='+unit_id,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			$('#loading_realisasi').html(data);
		}
	});
 }

 function show_realisasi_nilai(level, id_indikator, bulan,unit_id){
 	var nilai = $("#get_realisasi_"+level+id_indikator+bulan+unit_id).val();
 	var variabel = "#set_nilai_"+level+id_indikator+bulan+unit_id;
 	$(variabel).html(nilai);
 	console.log(variabel+'----'+nilai);
 }

 function show_realisasi_tsp (level, id_indikator, tw,unit_id) {
 	$('#loading_realisasi').html('<span class="spinner-bubble spinner-bubble-danger m-5"></span>');
 	$.ajax({
		url: 'show_realisasi_data_tsp?level='+level+'&id_indikator='+id_indikator+'&tw='+tw+'&unit_id='+unit_id,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			$('#loading_realisasi').html(data);
		}
	});
 }


function showHalamanPanel(id_indikator){
	$('#show_halaman_monev_indikator_non_budgeter'+id_indikator).html('<span class="spinner-glow spinner-glow-primary mr-5"></span>');
	$.ajax({
		url: 'show_halaman_monev_indikator_non_budgeter/'+id_indikator,
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// console.log(data);
			$('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
			$("[data-toggle=popover]").popover();
			 $('#show_halaman_monev_indikator_non_budgeter'+id_indikator).html(data);
		}
	});
}

function view_tombol_verifikasi_indikator_nonbudgeter(id,bulan) {
	$("#tombol_verifikasi"+bulan+id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'view_tombol_verifikasi_indikator_nonbudgeter/'+id+'/'+bulan,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			$("[data-toggle=popover]").popover();
			$("#tombol_verifikasi"+bulan+id).html(data);
		}
	});
}

function show_detail_verifikasi(id, bulan) {
	notif();
	notif2();
	$("#show_detail_verifikasi"+bulan+id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'show_detail_verifikasi/'+id+'/'+bulan,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			$("[data-toggle=popover]").popover();
			$("#show_detail_verifikasi"+bulan+id).html(data);
		}
	});
}


function load_warna_indikator_non_budgeter(id){
	notif();
	$.ajax({
		url: 'load_warna_indikator_non_budgeter/'+id,
		type: 'POST',
		dataType: 'html',
		success : function(data) {
			// console.log(data);
			$("#coloring"+id).removeAttr("style");
			$("#coloring"+id).attr("style","height: 100%; background-color:"+data+"");
		}
	});
	
}

function show_log_verifikasi(level, id_indikator, bulan,unit_id) {
	$('#loading_log_data').html('<span class="spinner-bubble spinner-bubble-danger m-5"></span>');
 	$.ajax({
		url: 'show_log_data?level='+level+'&id_indikator='+id_indikator+'&bulan='+bulan+'&unit_id='+unit_id,
		type: 'POST',
		dataType: 'html',
		success : function(data){
			$('#loading_log_data').html(data);
		}
	});
}

function hitung_rumus_indikator(level,id_indikator,unit_id,rumus,bulan) {
	$('#show_realisasi_'+level+id_indikator).html('<span class="spinner-bubble spinner-bubble-danger m-5"></span>');

 	$.ajax({
		url: 'rumus_perhitungan?level='+level+'&id_indikator='+id_indikator+'&bulan='+bulan+'&unit_id='+unit_id,
		type: 'POST',
		dataType: 'html',
		data : {rumus:rumus},
		success : function(data){
			$('#show_realisasi_'+level+id_indikator).html(data);
		}
	});
}