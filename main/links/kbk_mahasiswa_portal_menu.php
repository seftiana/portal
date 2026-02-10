<?php
$menu_items = 
array(	
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$default = array(
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('kbk_home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_mahasiswa.pdf')
);

if($isEditBiodata) $default = array_merge($default, array(
  array('name' => 'Profil', 'href' => $configObject->GetURL('user', 'profile', 'view')),
//  array('name' => 'Biodata', 'href' => $configObject->GetURL('user', 'biodata', 'view')),
//  array('name' => 'Data Orang Tua', 'href' => $configObject->GetURL('user', 'orang_tua', 'view')),
//  array('name' => 'Data SMA', 'href' => $configObject->GetURL('user', 'sma', 'view'))
));
else
$default = array_merge($default, array(
  array('name' => 'Profil', 'href' => $configObject->GetURL('kbk_user', 'profile', 'view'))
));

$menu_khusus = array(
  'matakuliah_ditawarkan' => array('name' => 'Informasi Matakuliah Ditawarkan', 'href' => $configObject->GetURL('kbk_proposed_classes','proposed_classes_semester','view')),
  'rencana_studi' => array('name' => 'Kartu Rencana Studi', 'href' => $configObject->GetURL('kbk_academic_plan','academic_plan','view')),
	'jadwal_kbk' => array('name' => 'Jadwal', 'href' => $configObject->GetURL('kbk_jadwal', 'jadwal', 'view')),
  'hasil_studi' => array('name' => 'Kartu Hasil Studi', 'href' => $configObject->GetURL('kbk_academic_report', 'academic_report', 'view')),
	'nilai_kbk' => array('name' => 'Nilai', 'href' => $configObject->GetURL('kbk_nilai', 'nilai', 'view')),
	'hasil_studi_kbk' => array('name' => 'Kartu Hasil Studi (Blok)', 'href' => $configObject->GetURL('kbk_hasil_studi','hasil_studi','view')),
  //array('name' => 'Kartu Kemajuan Mahasiswa', 'href' => $configObject->GetURL('academic_report', 'academic_progress', 'view')),
  'transkrip_nilai' => array('name' => 'Transkrip Nilai', 'href' => $configObject->GetURL('kbk_academic_report','academic_transcript','view')),
  'informasi_akademik' => array('name' => 'Informasi Akademik', 'href' => $configObject->GetURL('announcement','academic_announcement','view')),
  'pengajuan' => array('name' => 'Pengajuan', 'href' => $configObject->GetURL('pengajuan','pengajuan','view')),
  'beasiswa' => array('name' => 'Beasiswa', 'href' => $configObject->GetURL('beasiswa','beasiswa','view'))
);
$submenu_items['[ Logout ]'] = &$menu_khusus;

/* setting show hide menu */
$menu_setting = $configObject->GetValue('enabled_module');
$menu_setting = $menu_setting['kbk']['mahasiswa'];
$tmp_arr = $submenu_items['[ Logout ]'];
$submenu_items['[ Logout ]'] = array();
foreach ($menu_setting as $key) {
   $status = array_key_exists($key, $tmp_arr);
   $submenu_items['[ Logout ]'][] = $tmp_arr[$key];
}
/*----------------------------------------------------------------------------*/

$submenu_items['[ Logout ]'] = array_merge($default, $menu_khusus);

$submenu_items['[ Logout ]'] = array_merge($submenu_items['[ Logout ]'],array(
  array('name' => 'Workshop', 'href' => $configObject->GetURL('announcement','workshop_announcement','view')),
  array('name' => 'Ubah Password', 'href' => $configObject->GetURL('kbk_user', 'user', 'chgpassword'))
));

$bottom_menu_items['[ Logout ]'] = 
array(
  array('name' => 'Pesan', 'href' => $configObject->GetURL('message', 'message', 'view')),
  array('name' => 'Forum Diskusi', 'href' => $configObject->GetURL('forum', 'kategori', 'view'))
  );
/*  
$elearning_menu_items['[ Logout ]'] = 
array(
  array('name' => 'Materi Kuliah', 'href' => $configObject->GetURL('e_materi', 'materi', 'view')),  
  array('name' => 'Pengumuman', 'href' => $configObject->GetURL('e_pengumuman', 'pengumuman', 'view')."&act=new"),
  array('name' => 'Tugas Kuliah', 'href' => $configObject->GetURL('e_tugas', 'tugas_mahasiswa', 'view')),
  array('name' => 'Diskusi Online', 'href' => $configObject->GetURL('e_forum', 'forum', 'view')),
  array('name' => 'Agenda Kelas', 'href' => $configObject->GetURL('e_agenda', 'kelas', 'view')),
  array('name' => 'Agenda Pribadi', 'href' => $configObject->GetURL('e_agenda', 'pribadi', 'view')),
  array('name' => 'File Sharing', 'href' => $configObject->GetURL('e_sharing', 'sharing', 'view')),
  array('name' => 'Referensi', 'href' => $configObject->GetURL('e_materi', 'referensi', 'view').'&pos=start'),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__E-Learning_dosen_mahasiswa.pdf')
);*/  
?>