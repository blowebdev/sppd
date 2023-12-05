
     <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-3.3.1.min.js"></script>
       <script src="<?php echo base_url(); ?>js/dknotus-tour.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>js/action.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts/sidebar.large.script.min.js"></script>
    <script src="<?php echo base_url(); ?>chart/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts/tooltip.script.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
    <script type="text/javascript">
        function klik(id) {
            var notification = alertify.notify('Berhasil copy indikator', 'success', 5, function(){  console.log('dismissed'); });
            var clipboard = new ClipboardJS('.clipboard'+id);
        }

        function klik_sub(id) {
            var notification = alertify.notify('Berhasil copy subkegiatan', 'success', 5, function(){  console.log('dismissed'); });
            var clipboard = new ClipboardJS('.clipboardsubkegiatan'+id);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#pd').select2();
            $('#pd2').select2();
            $('[data-toggle="tooltip"]').tooltip();
            $("[data-toggle=popover]").popover();
            // $('textarea').cleditor();
        });

        $(document).ready(function() {
            $('#datatable').DataTable({
                "pageLength": 50
            });

            $('#datatable2').DataTable({
                "pageLength": 50
            });

            $('#tujuan_pd').DataTable({
                "pageLength": 50
            });
        } );

    </script>

    <script type="text/javascript">
           // Tour.run([
           //      {
           //        element: $('#tour3897')
           //      }
           //    ]);
            // Tour.close();
    </script>
      <?php if(isset($_REQUEST['load'])) :  ?>
        <script type="text/javascript">

            introJs().setOptions({
              steps: [{
                 title: 'Perhatian!',
                element: document.querySelector('#data-parent<?php echo $_REQUEST['id_indikator']; ?>'),
                intro: "Silahkan isi realisasi monev bulan yang aktif saat ini dan pastikan status verifikasi adalah selesai. Jika ada pertanyaan silahkan anda klik tombol bantuan/WA di kanan bawah layar komputer anda."
              }],
              showButtons: false
            }).start();


            $("#kegiatan<?php echo $_REQUEST['id_indikator']; ?>").collapse('show');

            // Tour.run([
            //     {
            //       element: $('#data-parent<?php echo $_REQUEST['id_indikator']; ?>')
            //     }
            //   ]);
            view_halaman_monev('<?php echo $_REQUEST['id_indikator']; ?>', '<?php echo $_REQUEST['kode_kegiatan']; ?>','<?php echo $_REQUEST['unit_id']; ?>');
            // Tour.close();
        </script>

    <?php endif; ?>

</body>
</html>