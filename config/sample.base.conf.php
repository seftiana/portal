<?php
   /*========================================
     *       Application Configuration       *
     *========================================*/
   
   // konfigurasi untuk menampilkan error warning saat pengembangan :: nilai = TRUE atau FALSE
   $cfg['enable_developer_warning'] = FALSE; //jangan diganti dan hanya perlu diganti ketika sedang men-development aplikasi ini
   
   // konfigurasi untuk memfungsikan enkripsi URL :: nilai = TRUE atau FALSE
   $cfg['enable_url_obfuscator'] = TRUE; //jangan diganti
   
   // konfigurasi key yang digunakan untuk proses enkripsi (berfungsi hanya jika fungsi enksripsi URL TRUE)  :: nilai = string
   $cfg['url_obfuscator_key'] = 'Portal';  //jangan diganti
   
   // konfigurasi document root dimana aplikasi terinstall (with trailing slash)
   $cfg['docroot'] = $_SERVER['DOCUMENT_ROOT'] .'/portal/'; //isikan path aplikasi ini di webserver
   // konfigurasi id aplikasi :: nilai sesuai dengan tabel t_unit academica
   $cfg['app_id'] = '1021001';  //jangan diganti
   
   // konfigurasi versi aplikasi :: nilai sekarang 4.0.0
   $cfg['app_version'] = '4.0.0'; //jangan diganti
   
   // konfigurasi nama aplikasi :: nilai = string
   $cfg['app_name'] = 'Portal Akademik'; //jangan diganti
   
   // konfigurasi customer aplikasi :: nilai = string (biasanya nama universitas)
   $cfg['app_client'] = 'Universitas ... ';  //isikan identitas perguruan tinggi
   $cfg['app_client_location'] = 'lokasi'; //alamat sia
   
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
   $cfg['base_image']='http://localhost/gtRegistrasi/file/photo/';
   $cfg['extension']='jpg';
   //
   //mengatur letak upload file virtual class, struktur direktory dalam file zip
   $cfg['file_upload_root'] = 'D:/file_upload/akakom/gtAkademikPortal/';
   
   // konfigurasi URL aplikasi :: nilai = URL dimana aplikasi dapat diakses (with trailing slash)
   $cfg['baseaddress'] = 'http://localhost/portal/';  //isikan url aplikasi
   
   /*========================================
     *       Database Configuration          *
     *========================================*/
       
   $cfg['db_type'] = 'mysqlt'; //jangan diganti
   $cfg['db_host'] = 'localhost'; //isikan host:port database
   $cfg['db_user'] = 'user'; //isikan user database
   $cfg['db_pass'] = 'pass'; //isikan password database
   $cfg['db_name'] = 'db_sia'; //isikan nama database
   
   // tipe perguruan tinggi
   // 1 = memiliki fakultas (eg: universitas dan institut)
   // 2 = tanpa fakultas (eg: sekolah tinggi dan akademi)
   $cfg['university_type'] = 1;
   
   $cfg['enable_kuisioner']=false; // nilai nya harus sama dengan enable_kuisioner di gtakademik
   
   $cfg['enabled_module']['kbk']['mahasiswa'] = array('matakuliah_ditawarkan', 'rencana_studi','jadwal_kbk', 'hasil_studi','nilai_kbk','hasil_studi_kbk', 'transkrip_nilai', 'informasi_akademik'/*, 'pengajuan'*/, 'beasiswa');
   $cfg['enabled_module']['kbk']['dosen'] = array('matakuliah_ditawarkan', 'matakuliah_diampu', 'matakuliah_diampu_kbk'/*, 'waktu_mengajar'*/, 'bimbingan_akademik','pengelolaan_nilai');
   
   //set SMTP
   $cfg['smtp']['auth']      = true;
   $cfg['smtp']['port']      = 587;
   $cfg['smtp']['secure']    = 'tls';
   $cfg['smtp']['host']      = 'smtp.gmail.com';
   $cfg['smtp']['username']  = 'user@gmail.com';
   $cfg['smtp']['password']  = 'userPASS';
   $cfg['smtp']['sender']    = 'noreply@client.ac.id';
   $cfg['smtp']['reply']     = 'noreply@client.ac.id';

?>
