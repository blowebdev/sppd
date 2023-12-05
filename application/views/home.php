<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Pemkot Surabaya">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    

    <title></title>
    <link rel="icon" href="../monev2018/logosby.png">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>js/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100&family=Poppins:wght@300&display=swap" rel="stylesheet">


    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/non_responsive.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/smart.wizard/smart_wizard_theme_arrows.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>editor/jquery.cleditor.css" />
    <script type="text/javascript" src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modal.css" />

    <link href="<?php echo base_url(); ?>assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/plugins/apexcharts.min.css" rel="stylesheet" />
    <style type="text/css">
        .badge2 {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #777;
            border-radius: 10px;
        }
        .introjs-tooltip .introjs-top-left-aligned{
            display: none;
        }

        /*.main-content-wrap {
            background: #CCEEF2 !important;
        }*/
    </style>
    <style type="text/css">
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#00bfa5;
            color:#FFF;
            border-radius:50px;
            text-align:center;
        }

        .my-float{
            font-size:24px;
            margin-top:18px;
        }
        .badge-custom {
            color: #fff !important;
            margin-top: 5px;
            cursor: pointer;
            font-weight: bold !important;
            font-size: 10px !important;
            padding-bottom: 17px !important;
            padding-top: 9px !important;
            padding-left: 5px !important;
            padding-right: 5px !important;
        }

    </style>

<style type="text/css">
 .select2-container .select2-selection--single {
    height: 39px !important;
    font-size: 20px !important; 
    padding-top: 4px !important;
}
</style>
</head>
<!-- <body class="text-left" onload="notif();"> -->
<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header" style="background-color:#2980b9 !important;">
            <div class="logo">
                <table width="100%" style="border: none;">
                    <tbody>
                        <tr>
                            <td style="font-family: 'arial'; font-weight: bold; border:none; padding-left: 10px; font-weight: bolder; font-size: 40px; color:white; " valign="top" title="SPPD">SPPD</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p style="color: white;"> 
            <div class="menu-toggle">
                <div style="background-color: white"></div>
                <div style="background-color: white"></div>
                <div style="background-color: white"></div>
            </div>
            </p>
            <div class="d-flex align-items-center">
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- <div class="dropdown" style="cursor: pointer;" onclick="notifikasi();notifikasi2();"> -->
                <div class="dropdown" style="cursor: pointer;">
                    <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <span class="badge badge-danger" style="font-size: 12px;" id="notifikasi2"></span> -->
                        <i class="i-Mail-Send text-muted header-icon" style="font-size: 35px; color:white !important;"></i>
                    </div>
                    <!-- Notification dropdown -->
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true" id="notifikasi">
                    </div>
                </div>
                <!-- Notificaiton End -->
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img width="100%" src="<?php echo base_url() ?>assets/images/icon.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i><b><?php echo $this->session->userdata('username')['nama']; ?></b>
                            </div>
                            <a class="dropdown-item" href="logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'master/menu.php';?>
        <!-- =============== Left side End ================-->
        <div class="container">
            <div style="padding-top : 100px">
                <?php include "".$halaman.".php";?>
                
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url(); ?>js/dknotus-tour.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>js/action.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts/script.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts/sidebar.large.script.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.smartWizard.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts/smart.wizard.script.min.js"></script>
        <script src="<?php echo base_url(); ?>chart/canvasjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts/tooltip.script.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="<?php echo base_url(); ?>js/dataTables.fixedColumns.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modal.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/plugins/apexcharts.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/plugins/apexcharts.dataseries.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/scripts/apexBarChart.script.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#pd').select2();
                $('#pd2').select2();
                $('#tw').select2();
                $('#jabatan').select2();
                $('[data-toggle="tooltip"]').tooltip();
                $("[data-toggle=popover]").popover();
           });
           $(document).ready(function() {
                $('#datatable2').DataTable({
                    "pageLength": 10
                });

                $('#datatable').DataTable({
                    "pageLength": 10
                });

                $('#datatable3').DataTable({
                    "pageLength": 10
                });

                $('#tujuan_pd').DataTable({
                    "pageLength": 10
                });

                $('#perkin').DataTable({
                    "pageLength": 5,
                    "bSortable": false,
                    "aoColumnDefs": [
                    { "bSortable": false, "aTargets": [ 0, 1, 2, 3, 4, 5, 6 ] }
                    ]
                });
            } );

        </script>

        <script type="text/javascript">
           // Tour.run([
           //      {
           //        element: $('#tour3897')
           //      }
           //    ]);
           //  Tour.close();
        </script>
        

</body>
</html>