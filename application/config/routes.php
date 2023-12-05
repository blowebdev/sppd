<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['home/(:any)'] = 'home/home/$1';
$route['login'] = 'home/login';
$route['masuk'] = 'home/masuk';
$route['save_verifikasi'] = 'home/save_verifikasi';
$route['notifikasi/(:any)'] = 'home/notifikasi/(:any)';
$route['show_kegiatan/(:any)/(:any)/(:any)'] = 'home/show_kegiatan/$1/$1/$1';
$route['show_indikator_sub_kegiatan/(:any)/(:any)/(:any)'] = 'home/show_indikator_sub_kegiatan/$1/$1/$1';
$route['monev2'] = 'home/monev2';
$route['report_keterisian'] = 'home/report_keterisian';
$route['master_data_testbed'] = 'home/master_data2';
$route['indikator_kota'] = 'home/indikator_kota';
$route['indikator_pd'] = 'home/indikator_pd2';
$route['indikator_pd_testbed'] = 'home/indikator_pd2';
$route['show_keterisian_perbulan/(:any)'] = 'home/show_keterisian_perbulan/$1';
$route['show_keterisian_triwulan/(:any)'] = 'home/show_keterisian_triwulan/$1';
$route['color/(:any)'] = 'home/color/$1';
$route['redirect/(:any)'] = 'home/redirect/$1';

$route['view_halaman_monev/(:any)/(:any)/(:any)'] = 'home/view_halaman_monev/$1/$1/$1';

$route['cek_status_pembacaan_edata/(:any)/(:any)/(:any)'] = 'home/cek_status_pembacaan_edata/$1/$1/$1';
$route['view_tombol_verifikasi/(:any)/(:any)/(:any)/(:any)'] = 'home/view_tombol_verifikasi/$1/$1/$1/$1';
$route['monev'] = 'home/monev';
$route['dashboard_testbed'] = 'home/dashboard_testbed';
$route['logout'] = 'home/logout';


$route['get_persentase_bulan/(:any)'] = 'home/get_persentase_bulan/(:any)';
$route['get_persentase_bulan_json/(:any)'] = 'home/get_persentase_bulan_json/(:any)';

$route['hitung_rumus_kota/(:any)/(:any)'] = 'home/hitung_rumus_kota/$1/$1';
$route['hitung_rumus_pd/(:any)/(:any)/(:any)'] = 'home/hitung_rumus_pd/$1/$1/$1';
$route['hitung_rumus_sasaran_pd/(:any)/(:any)'] = 'home/hitung_rumus_sasaran_pd/$1/$1';
$route['show_modal_tab_indikator_pd/(:any)/(:any)/(:any)'] = 'home/show_modal_tab_indikator_pd/$1/$1/$i';
$route['show_modal_tab_indikator_kota/(:any)/(:any)'] = 'home/show_modal_tab_indikator_kota/$1/$1';


// Indikator non budgeter
$route['tagging_indikator'] = 'home/tagging_indikator';
$route['indikator_non_budgeter'] = 'home/indikator_non_budgeter';
$route['show_halaman_monev_indikator_non_budgeter/(:any)'] = 'home/show_halaman_monev_indikator_non_budgeter/$1';
$route['upload_realisasi_indikator_non_budgeter/(:any)/(:any)'] = 'home/upload_realisasi_indikator_non_budgeter/$1/$i';
$route['do_upload'] = 'home/do_upload';
$route['update_rumus'] = 'home/update_rumus';
$route['simpan_file_pendung'] = 'home/simpan_file_pendung';
$route['show_data_realisasi.html/(:any)/(:any)'] = 'home/show_data_realisasi/$1/$i';
$route['view_tombol_verifikasi_indikator_nonbudgeter/(:any)/(:any)'] = 'home/view_tombol_verifikasi_indikator_nonbudgeter/$1/$1';
$route['save_verifikasi_indikator_non_budgeter'] = 'home/save_verifikasi_indikator_non_budgeter';
$route['show_detail_verifikasi/(:any)/(:any)'] = 'home/show_detail_verifikasi/$1/$1';
$route['load_warna_indikator_non_budgeter/(:any)'] = 'home/load_warna_indikator_non_budgeter/$1';

$route['realisasi_non_budgeter/(:any)/(:any)'] = 'api/realisasi_non_budgeter/$1/$2';
$route['realisasi_non_budgeter/(:any)'] = 'api/realisasi_non_budgeter/$1';


$route['realisasi_tspk/(:any)/(:any)'] = 'api/realisasi_tspk/$1/$i';
$route['total_verifikasi_penyelia/(:any)/(:any)/(:any)'] = 'api/total_verifikasi_penyelia/$1/$i/$i';
$route['act_verifikasi_penyelia'] = 'api/act_verifikasi_penyelia';

// Drop Rumus
$route['drop_rumus/(:any)/(:any)/(:any).html'] = 'home/drop_rumus/$1/$1/$1';
$route['drop_rumus_pd/(:any)/(:any)/(:any)/(:any).html'] = 'home/drop_rumus_pd/$1/$1/$1/$1';
$route['show_formulasi'] = 'show_formulasi/show_detail_formulasi';
$route['do_upload_sasaran_pd'] = 'home/do_upload_sasaran_pd';
$route['show_modal_tab_indikator_sasaran_pd/(:any)/(:any)/view.html'] = 'home/show_modal_tab_indikator_sasaran_pd/$1/$1';

// Hapus rawdata sasaran
$route['hapus_rawdata_sasaran_pd/(:any)/(:any).html'] = 'home/hapus_rawdata_sasaran_pd/$1/$1';
$route['show_indikator_kegiatan/(:any)/(:any).html'] = 'home/show_indikator_kegiatan/$1/$1';


$route['indikator_program_act_p'] = 'api/indikator_program_act_p';
$route['indikator_tujuan_act_p'] = 'api/indikator_tujuan_act_p';
$route['indikator_kegiatan_act_p'] = 'api/indikator_kegiatan_act_p';
$route['indikator_sasaran_act_p'] = 'api/indikator_sasaran_act_p';

$route['indikator_program_act_p2'] = 'api/indikator_program_act_p2';
// PA

$route['pa_home'] = 'home/pa_home';


// Perkin

$route['perkin'] = 'home/perkin';

// monev 2022
$route['show_monev'] = 'home/show_monev';
$route['setting_rumus_sub'] = 'home/setting_rumus_sub';
$route['setting_rumus_sub_new'] = 'home/setting_rumus_sub_new';
$route['show_realisasi_data'] = 'home/show_realisasi_data';
$route['show_realisasi_data_tsp'] = 'home/show_realisasi_data_tsp';
$route['master_data'] = 'home/master_data';
$route['save_verifikasi_master_data'] = 'home/save_verifikasi_master_data';
$route['show_log_data'] = 'home/show_log_data';
$route['indikator_pd'] = 'home/indikator_pd';
$route['home'] = 'home/home';
$route['realisasi_kegiatan'] = 'cron/realisasi_kegiatan';
$route['realisasi_subkegiatan'] = 'cron/realisasi_subkegiatan';
$route['update_realisasi_rawdata'] = 'cron/update_realisasi_rawdata';
$route['realisasi_tsp'] = 'cron/realisasi_tsp';
$route['rumus_perhitungan'] = 'home/rumus_perhitungan';
$route['show_rumus_formulasi'] = 'home/show_rumus_formulasi';



$route['404_override'] = 'hello';
$route['translate_uri_dashes'] = FALSE;
