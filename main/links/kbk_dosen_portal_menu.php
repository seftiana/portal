<?php
$menu_items = 
array(	
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$default = array(
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('kbk_home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_dosen.pdf'),
  array('name' => 'Profil', 'href' => $configObject->GetURL('kbk_user', 'profile', 'view'))
);

$menu_khusus = 
array(
  'matakuliah_ditawarkan' => array('name' => 'Informasi Matakuliah Ditawarkan', 'href' => $configObject->GetURL('kbk_proposed_classes','proposed_classes_semester','view')),
  'matakuliah_diampu' => array('name' => 'Matakuliah Diampu', 'href' => $configObject->GetURL('kbk_dosen','course_supported','view')),
  'matakuliah_diampu_kbk' => array('name' => 'Matakuliah Diampu KBK', 'href' => $configObject->GetURL('kbk_dosen','matakuliah_diampu','view')),
  'waktu_mengajar' => array('name' => 'Kesediaan Waktu Mengajar', 'href' => $configObject->GetURL('dosen','kesediaan_waktu_mengajar','view')),
  'bimbingan_akademik' => array('name' => 'Bimbingan Akademik', 'href' => $configObject->GetURL('kbk_dosen','mentored_students','view')),
  'pengelolaan_nilai' => array('name' => 'Pengelolaan Nilai', 'href' => $configObject->GetURL('kbk_dosen','course_supported','view') . '&from=' . $configObject->Enc('nilai'))
);
$submenu_items['[ Logout ]'] = &$menu_khusus;

/* setting show hide menu */
$menu_setting = $configObject->GetValue('enabled_module');
$menu_setting = $menu_setting['kbk']['dosen'];
$tmp_arr = $submenu_items['[ Logout ]'];
$submenu_items['[ Logout ]'] = array();
foreach ($menu_setting as $key) {
   $status = array_key_exists($key, $tmp_arr);
   $submenu_items['[ Logout ]'][] = $tmp_arr[$key];
}
/*----------------------------------------------------------------------------*/

$submenu_items['[ Logout ]'] = array_merge($default, $menu_khusus);

$submenu_items['[ Logout ]'] = array_merge($submenu_items['[ Logout ]'],array(  
  array('name' => 'Informasi Akademik', 'href' => $configObject->GetURL('announcement','academic_announcement','view')),  
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
  array('name' => 'Materi Kuliah', 'href' => $configObject->GetURL('e_materi', 'materi', 'view')."&post=start"),
  array('name' => 'Pengumuman', 'href' => $configObject->GetURL('e_pengumuman', 'pengumuman', 'view')."&post=start"),
  array('name' => 'Tugas Kuliah', 'href' => $configObject->GetURL('e_tugas', 'tugas_dosen', 'view')."&post=start"),
  array('name' => 'Diskusi Online', 'href' => $configObject->GetURL('e_forum', 'forum', 'view')."&post=start"),
  array('name' => 'Agenda Kelas', 'href' => $configObject->GetURL('e_agenda', 'kelas', 'view')."&post=start"),
  array('name' => 'Agenda Pribadi', 'href' => $configObject->GetURL('e_agenda', 'pribadi', 'view')."&post=start"),
  array('name' => 'File Sharing', 'href' => $configObject->GetURL('e_sharing', 'sharing', 'view')."&post=start"),
  array('name' => 'Referensi', 'href' => $configObject->GetURL('e_materi', 'referensi', 'view').'&post=start'),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__E-Learning_dosen_mahasiswa.pdf')
  //array('name' => 'Forum Kuliah', 'href' => $configObject->GetURL('e_forum', 'forum', 'view'))
);  */
?>