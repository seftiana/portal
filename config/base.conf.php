<?php
   /*========================================
     *       Application Configuration       *
     *========================================*/
   
   // konfigurasi untuk menampilkan error warning saat pengembangan :: nilai = TRUE atau FALSE
   $cfg['enable_developer_warning'] = FALSE; //jangan diganti dan hanya perlu diganti ketika sedang men-development aplikasi ini
   
   // konfigurasi untuk memfungsikan enkripsi URL :: nilai = TRUE atau FALSE
   $cfg['enable_url_obfuscator'] = FALSE; //jangan diganti
   
   // konfigurasi key yang digunakan untuk proses enkripsi (berfungsi hanya jika fungsi enksripsi URL TRUE)  :: nilai = string
   $cfg['url_obfuscator_key'] = 'Portal';  //jangan diganti
   
   // konfigurasi document root dimana aplikasi terinstall (with trailing slash)
   $cfg['docroot'] = 'C:/xampp/htdocs/192.168.0.21/portal/';  //jangan diganti
   // konfigurasi id aplikasi :: nilai sesuai dengan tabel t_unit academica
   $cfg['app_id'] = '1021001';  //jangan diganti
   
   // konfigurasi versi aplikasi :: nilai sekarang 4.0.0
   $cfg['app_version'] = '4.0.0'; //jangan diganti
   
   // konfigurasi nama aplikasi :: nilai = string
   $cfg['app_name'] = 'Portal Akademik'; //jangan diganti
   
   // konfigurasi customer aplikasi :: nilai = string (biasanya nama universitas)
   $cfg['app_client'] = 'Perbanas Institute ';  //isikan identitas perguruan tinggi
   $cfg['app_client_location'] = 'Jakarta'; //alamat sia
   
   // konfigurasi folder aplikasi (default tidak perlu diubah)
   //jangan diganti
   $cfg['app_lib'] = $cfg['docroot'] .'main/lib/';
   $cfg['app_data'] = $cfg['docroot'] .'main/data/';
   $cfg['app_proc'] = $cfg['docroot'] .'main/proc/';
   $cfg['app_service'] = $cfg['docroot'] .'main/communication/';
   $cfg['app_links'] = $cfg['docroot'] .'main/links/';
   $cfg['app_sql'] = $cfg['docroot'] .'main/sql/';
   $cfg['app_module'] = $cfg['docroot'] .'module/';   
   $cfg['basedir'] = 'main/';
   // konfigurasi untuk mengatur letak image di dalam sistem sia
   //$cfg['base_image']='http://'.$_SERVER['HTTP_HOST'].'/192.168.0.21/gtadmisi/file/photo/';
   $cfg['base_image']='http://admisi.perbanas.id/file/photo/';
   $cfg['extension']='jpg';
   //
   //mengatur letak upload file virtual class, struktur direktory dalam file zip
   $cfg['file_upload_root'] = '';
   
   // konfigurasi URL aplikasi :: nilai = URL dimana aplikasi dapat diakses (with trailing slash)
   //$cfg['baseaddress'] = 'http://103.206.245.198/dev/gtportal/';  //isikan url aplikasi
  // $cfg['baseaddress'] = 'http://'.$_SERVER['HTTP_HOST'].'/testing/gtportal/';  //isikan url aplikasi

//$link = "http" .((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "s" : "") . "://";
//$server = isset($_SERVER['HTTP_HOST']) ?$_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
//$cfg['baseaddress'] = 'https://portal.perbanas.id/';  //isikan url aplikasi
//$cfg['baseaddress'] = 'http://testing.perbanas.id/';  //isikan url aplikasi
//$cfg['baseaddress'] = 'http://www.dwiatmodjo.com/star2/'; //isikan url aplikasi
$cfg['baseaddress'] = 'http://'.$_SERVER['HTTP_HOST'].'/192.168.0.21/portal/';  //isikan url aplikasi

   /*========================================
     *       Database Configuration          *
     *========================================*/
/* 
$cfg['db_type'] = 'mysqlt'; //jangan diganti
$cfg['db_host'] = 'localhost'; //isikan host:port database
$cfg['db_user'] = 'root';  //isikan user database
$cfg['db_pass'] = '12345@';  //isikan password user database
$cfg['db_name'] = 'testing_gtportal'; //isikan nama database
*/


$cfg['db_type'] = 'mysqli'; //jangan diganti
$cfg['db_host'] = 'localhost'; //isikan host:port database
$cfg['db_user'] = 'root';  //isikan user database
$cfg['db_pass'] = '';  //isikan password user database
$cfg['db_name'] = 'gtportal_dev'; //isikan nama database
/*
$cfg['db_type'] = 'mysqli'; //jangan diganti
$cfg['db_host'] = '207.148.116.37'; //isikan host:port database
$cfg['db_user'] = 'vpsperbanas_gt';  //isikan user database
$cfg['db_pass'] = 'Perbana5@@2022';  //isikan password user database
$cfg['db_name'] = 'vpsperbanas_gtportal'; //isikan nama database
*/
   // tipe perguruan tinggi
   // 1 = memiliki fakultas (eg: universitas dan institut)
   // 2 = tanpa fakultas (eg: sekolah tinggi dan akademi)
   $cfg['university_type'] = 1;
   
   $cfg['enable_kuisioner']=true; // nilai nya harus sama dengan enable_kuisioner di gtakademik
   $cfg['enable_block']=true; // add ccp 6-
   $cfg['enable_survei']=false; // add ccp 20-01-2023
   $cfg['pemilu']=1; #add ccp 16-juli-2020 1=tampil
   $cfg['enabled_module']['kbk']['mahasiswa'] = array('matakuliah_ditawarkan', 'rencana_studi','jadwal_kbk', 'hasil_studi','nilai_kbk','hasil_studi_kbk', 'transkrip_nilai', 'informasi_akademik'/*, 'pengajuan'*/, 'beasiswa','presensi');
   $cfg['enabled_module']['kbk']['dosen'] = array('matakuliah_ditawarkan', 'matakuliah_diampu', 'matakuliah_diampu_kbk'/*, 'waktu_mengajar'*/, 'bimbingan_akademik','pengelolaan_nilai','kuisioner_dosen','history_absen_dosen','history_nilai_dosen','history_nilai_obe');
    $cfg['smtp']['auth']     = true;
    $cfg['smtp']['port']     = 587;
    $cfg['smtp']['secure']   = 'tls';
    $cfg['smtp']['host']     = 'smtp.gmail.com';
    $cfg['smtp']['username'] = 'marketing.support@perbanas.id';
    $cfg['smtp']['password'] = 'Perbanasjay4';
    //$cfg['smtp']['sender']   = 'testing-marketing.support@perbanas.id';
    //$cfg['smtp']['reply']    = 'testing-marketing.support@perbanas.id';
    $cfg['smtp']['sender']   = 'portal.akademik@perbanas.id';
    $cfg['smtp']['reply']    = 'no-reply@perbanas.id';
	?>