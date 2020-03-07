<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] = 'LP';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Auth';
$route['lp'] = 'LP';
$route['cekpermission'] = 'Auth/cekpermission';
$route['logout'] = 'Logout/logout';

// users
$route['user-data'] = 'Users';
$route['user-data/add'] = 'Users/add_user';
$route['user-data/edit/(:any)'] = 'Users/edit_user/$id';
$route['user-data/edit-username/(:any)'] = 'Users/edit_username/$id';
$route['user-data/edit-password/(:any)'] = 'Users/edit_password/$id';
$route['user-data/delete/(:any)'] = 'Users/delete_user/$id';
$route['user-data/update'] = 'Users/update_user';
$route['user-data/submit'] = 'Users/submit_user';

// kriteria
$route['data-kriteria'] = 'Kriteria';
$route['data-kriteria/add'] = 'Kriteria/add_kriteria';
$route['data-kriteria/edit/(:any)'] = 'Kriteria/edit_kriteria/$id';
$route['data-kriteria/delete/(:any)'] = 'Kriteria/delete_kriteria/$1';
$route['data-kriteria/update'] = 'Kriteria/update_kriteria';
$route['data-kriteria/submit'] = 'Kriteria/submit_kriteria';

// nilai kepentingan
$route['nilai-kepentingan'] = 'Kepentingan';
$route['nilai-kepentingan/edit/(:any)'] = 'Kepentingan/edit_kepentingan/$id';
$route['nilai-kepentingan/update'] = 'Kepentingan/update_kepentingan/';

// alternatif
$route['data-alternatif'] = 'Alternatif';
$route['data-alternatif/add'] = 'Alternatif/add_alternatif';
$route['data-alternatif/edit/(:any)'] = 'Alternatif/edit_alternatif/$id';
$route['data-alternatif/delete/(:any)'] = 'Alternatif/delete_alternatif/$1';
$route['data-alternatif/update'] = 'Alternatif/update_alternatif';
$route['data-alternatif/submit'] = 'Alternatif/submit_alternatif';

// analisa kriteria
$route['analisa-kriteria/update'] = 'Analisa_Kriteria/update_FU';
$route['analisa-kriteria'] = 'Analisa_Kriteria';

// interdependensi
$route['dependence-kriteria'] = 'Interdependensi';

// penilaian alternatif
$route['penilaian-alternatif'] = 'Penilaian_Alternatif';
$route['penilaian-alternatif/nilai/(:any)'] = 'Penilaian_Alternatif/nilai_alternatif/$1';
$route['penilaian-alternatif/delete-nilai/(:any)'] = 'Penilaian_Alternatif/delete_penilaian_alternatif/$1';
$route['penilaian-alternatif/edit-nilai/(:any)'] = 'Penilaian_Alternatif/edit_penilaian_alternatif/$1';

// indikator
$route['data-indikator'] = 'Indikator';
$route['data-indikator/add'] = 'Indikator/add_indikator';
$route['data-indikator/submit-indikator'] = 'Indikator/submit_indikator';
$route['data-indikator/edit/(:any)'] = 'Indikator/edit_indikator/$id';
$route['data-indikator/update-indikator'] = 'Indikator/update_indikator';
$route['data-indikator/input-nilai/(:any)'] = 'Indikator/input_nilai_indikator/$id';

// Jurnal
$route['data-jurnal'] = 'Jurnal';
$route['data-jurnaltinggi'] = 'Jurnal/jurnal_tinggi';
$route['data-jurnaldoaj'] = 'Jurnal/jurnal_doaj';
$route['data-jurnalbelumterakreditasi'] = 'Jurnal/jurnal_belumakre';
$route['data-jurnal/add'] = 'Jurnal/add_jurnal';
$route['data-jurnal/submit-jurnal'] = 'Jurnal/submit_jurnal';
$route['data-jurnal/edit/(:any)'] = 'Jurnal/edit_jurnal/$id';
$route['data-jurnal/update-jurnal'] = 'Jurnal/update_jurnal';

// Jurnal Pengelola
$route['data-jurnalpengelola/(:any)'] = 'Pengelola/$id';
$route['data-jurnalpengelola/edit/(:any)'] = 'Pengelola/edit_jurnal/$id';
$route['data-jurnalpengelola/add-pengindeks/(:any)'] = 'Pengelola/add_jurnal_pengindeks/$id';
$route['data-jurnalpengelola/update-jurnalpengelola'] = 'Pengelola/update_jurnal_pengelola';
$route['data-jurnalpengelola/submit-pengindeks'] = 'Pengelola/submit_jurnal_pengindeks';

// Fakultas
$route['data-fakultas'] = 'Fakultas';
$route['data-fakultas/add'] = 'Fakultas/add_fakultas';
$route['data-fakultas/submit-fakultas'] = 'Fakultas/submit_fakultas';
$route['data-fakultas/edit/(:any)'] = 'Fakultas/edit_fakultas/$id';
$route['data-fakultas/update-fakultas'] = 'Fakultas/update_fakultas';

// Departemen
$route['data-departemen'] = 'Departemen';
$route['data-departemen/add'] = 'Departemen/add_departemen';
$route['data-departemen/submit-departemen'] = 'Departemen/submit_departemen';
$route['data-departemen/edit/(:any)'] = 'Departemen/edit_departemen/$id';
$route['data-departemen/update-departemen'] = 'Departemen/update_departemen';

// Lab
$route['data-lab'] = 'Lab';
$route['data-lab/add'] = 'Lab/add_lab';
$route['data-lab/submit-lab'] = 'Lab/submit_lab';
$route['data-lab/edit/(:any)'] = 'Lab/edit_lab/$id';
$route['data-lab/update-lab'] = 'Lab/update_lab';

// Lembaga
$route['data-lembaga'] = 'Lembaga';
$route['data-lembaga/add'] = 'Lembaga/add_lembaga';
$route['data-lembaga/submit-lembaga'] = 'Lembaga/submit_lembaga';
$route['data-lembaga/edit/(:any)'] = 'Lembaga/edit_lembaga/$id';
$route['data-lembaga/update-lembaga'] = 'Lembaga/update_lembaga';

// Pengindeks
$route['data-pengindeks'] = 'Pengindeks';
$route['data-pengindeks/add'] = 'Pengindeks/add_pengindeks';
$route['data-pengindeks/submit-pengindeks'] = 'Pengindeks/submit_pengindeks';
$route['data-pengindeks/edit/(:any)'] = 'Pengindeks/edit_pengindeks/$id';
$route['data-pengindeks/update-pengindeks'] = 'Pengindeks/update_pengindeks';

// Jurnal Pengindeks
$route['data-jp'] = 'JP';
$route['data-jp/add/(:any)'] = 'JP/add_jp/$id';
$route['data-jp/add-jp/(:any)'] = 'JP/add_jp_pengindeks/$id';
$route['data-jp/submit-jp'] = 'JP/submit_jp';
$route['data-jp/submit-jp-pengelola'] = 'JP/submit_jp_pengelola';
$route['data-jp/submit-jp-pengindeks'] = 'JP/submit_jp_pengindeks';
// $route['data-jp/edit/(:any)'] = 'JP/edit_jp/$id';
$route['data-jp/update-pengindeks'] = 'JP/update_jp';

// Jurnal SK
$route['data-js'] = 'JS';
$route['data-js/add/(:any)'] = 'JS/add_js/$id';
$route['data-js/add-js/(:any)'] = 'JS/add_js_sk/$id';
$route['data-js/submit-js'] = 'JS/submit_js';
$route['data-js/submit-js-sk'] = 'JS/submit_js_sk';
$route['data-js/edit/(:any)'] = 'JS/edit_js/$id';
$route['data-js/update-js'] = 'JS/update_js';

// Portal
$route['data-portal'] = 'Portal';
$route['data-portal/add'] = 'Portal/add_portal';
$route['data-portal/submit-portal'] = 'Portal/submit_portal';
$route['data-portal/edit/(:any)'] = 'Portal/edit_portal/$id';
$route['data-portal/update-portal'] = 'Portal/update_portal';

// Report Admin
$route['dataadmin-reportakreditasi'] = 'Report/akreditasi_admin';
$route['dataadmin-reportenglish'] = 'Report/english_admin';
$route['dataadmin-reportpengindeks'] = 'Report/pengindeks_admin';
$route['dataadmin-reportrekomendasi'] = 'Report/rekomendasi_admin';
$route['dataadmin-reporttidakaktif'] = 'Report/tidakaktif_admin';

// Report Evaluator
$route['dataevaluator-reportakreditasi'] = 'Report/akreditasi_evaluator';
$route['dataevaluator-reportenglish'] = 'Report/english_evaluator';
$route['dataevaluator-reportpengindeks'] = 'Report/pengindeks_evaluator';
$route['dataevaluator-reportrekomendasi'] = 'Report/rekomendasi_evaluator';
$route['dataevaluator-reporttidakaktif'] = 'Report/tidakaktif_evaluator';


// Report Pengelola
$route['datapengelola-reportakreditasi'] = 'Report/akreditasi_pengelola';
$route['datapengelola-reportenglish'] = 'Report/english_pengelola';
$route['datapengelola-reportpengindeks'] = 'Report/pengindeks_pengelola';
$route['datapengelola-reportrekomendasi'] = 'Report/rekomendasi_pengelola';
$route['datapengelola-reporttidakaktif'] = 'Report/tidakaktif_pengelola';
$route['datapengelola-jurnal'] = 'Report/jurnal';


// Report Pimpinan
$route['datapimpinan-reportakreditasi'] = 'Report/akreditasi_pimpinan';
$route['datapimpinan-reportenglish'] = 'Report/english_pimpinan';
$route['datapimpinan-reportpengindeks'] = 'Report/pengindeks_pimpinan';
$route['datapimpinan-reportrekomendasi'] = 'Report/rekomendasi_pimpinan';
$route['datapimpinan-reporttidakaktif'] = 'Report/tidakaktif_pimpinan';


// SK
$route['data-sk'] = 'SK';
$route['data-sk/add'] = 'SK/add_sk';
$route['data-sk/submit-sk'] = 'SK/submit_sk';
$route['data-sk/edit/(:any)'] = 'SK/edit_sk/$id';
$route['data-sk/update-sk'] = 'SK/update_sk';


// header (admin)
$route['user-data/edit-user/(:any)'] = 'Users/edit_user_session/$id';
$route['upload-foto-admin'] = 'Upload_Foto_Admin';

// header (evaluator)
$route['evaluator-data/edit/(:any)'] = 'Users_Evaluator/edit_user/$id';
$route['upload-foto-evaluator'] = 'Upload_Foto_Evaluator';
$route['evaluator-data/edit-username/(:any)'] = 'Users_Evaluator/edit_username/$id';
$route['evaluator-data/edit-password/(:any)'] = 'Users_Evaluator/edit_password/$id';

// header (pengelola)
$route['pengelola-data/edit/(:any)'] = 'Users_Pengelola/edit_user/$id';
$route['upload-foto-pengelola'] = 'Upload_Foto_Pengelola';
$route['pengelola-data/edit-username/(:any)'] = 'Users_Pengelola/edit_username/$id';
$route['pengelola-data/edit-password/(:any)'] = 'Users_Pengelola/edit_password/$id';

// header (pimpinan)
$route['pimpinan-data/edit/(:any)'] = 'Users_Pimpinan/edit_user/$id';
$route['upload-foto-pimpinan'] = 'Upload_Foto_Pimpinan';
$route['pimpinan-data/edit-username/(:any)'] = 'Users_Pimpinan/edit_username/$id';
$route['pimpinan-data/edit-password/(:any)'] = 'Users_Pimpinan/edit_password/$id';

// log penilaian (admin)
$route['log-penilaian-a'] = 'Log_Penilaian_Admin';

// log penilaian (evaluator)
$route['log-penilaian-e'] = 'Log_Penilaian_Evaluator';

// log penilaian (pengelola)
$route['log-penilaian-p'] = 'Log_Penilaian_Pengelola';

// log penilaian (pimpinan)
$route['log-penilaian-pi'] = 'Log_Penilaian_Pimpinan';

// nilai murni (admin)
$route['nilai-murni-a'] = 'Nilai_Murni_Admin';

// nilai murni (evaluator)
$route['nilai-murni-e'] = 'Nilai_Murni_Evaluator';

// nilai murni (pengelola)
$route['nilai-murni-p'] = 'Nilai_Murni_Pengelola';

// nilai murni (pimpinan)
$route['nilai-murni-pi'] = 'Nilai_Murni_Pimpinan';

// log peringkat (admin)
$route['peringkat-alternatif-a'] = 'Peringkat_Alternatif_Admin';

// log peringkat (evaluator)
$route['peringkat-alternatif-e'] = 'Peringkat_Alternatif_Evaluator';

// log peringkat (pengelola)
$route['peringkat-alternatif-e'] = 'Peringkat_Alternatif_Pengelola';

// log peringkat (pimpinan)
$route['peringkat-alternatif-pi'] = 'Peringkat_Alternatif_Pimpinan';

// home (admin)
$route['home-admin'] = 'Admin';

// home (evaluator)
$route['home-evaluator'] = 'Evaluator';

// home (pengelola)
$route['home-pengelola'] = 'Pengelola';

// home (pimpinan)
$route['home-pimpinan'] = 'Pimpinan';

// hasil penilaian (admin)
$route['hasil-penilaian-a'] = 'Hasil_Penilaian';

// hasil penilaian (evaluator)
$route['hasil-penilaian-e'] = 'Hasil_Penilaian_Evaluator';

// hasil penilaian (pengelola)
$route['hasil-penilaian-p'] = 'Hasil_Penilaian_Pengelola';

// hasil penilaian (Pimpinan)
$route['hasil-penilaian-pi'] = 'Hasil_Penilaian_Pimpinan';
