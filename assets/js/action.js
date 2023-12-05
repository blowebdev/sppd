function view_kegiatan(id,kode_kegiatan) {
	$("#view_monev_kegiatan"+id).html('<span class="spinner-glow spinner-glow-warning mr-5"></span>');
	$.ajax({
		url: 'pages/monev_kegiatan/monev_kegiatan.php?id='+id+'&kode_kegiatan='+kode_kegiatan,
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