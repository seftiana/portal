<?php
$menu_items = 
array(	
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$submenu_items['[ Logout ]'] = 
array(
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_dosen.pdf'),
  array('name' => 'Profil', 'href' => $configObject->GetURL('user', 'profile', 'view')),
  array('name' => 'Informasi Matakuliah Ditawarkan', 'href' => $configObject->GetURL('proposed_classes','proposed_classes_semester','view')),
  array('name' => 'Matakuliah Diampu', 'href' => $configObject->GetURL('dosen','course_supported','view')),
  array('name' => 'Hasil Kuisioner', 'href' => $configObject->GetURL('kuisioner_dosen','kuisioner_dosen','view')),
  array('name' => 'Bimbingan Akademik', 'href' => $configObject->GetURL('dosen','mentored_students','view')),
  array('name' => 'Pengelolaan Nilai', 'href' => $configObject->GetURL('dosen','course_supported','view') . '&from=' . $configObject->Enc('nilai')),
  array('name' => 'History Absen Mengajar', 'href' => $configObject->GetURL('history_absen_dosen','history_absen','view')),
  array('name' => 'History Input Nilai', 'href' => $configObject->GetURL('history_nilai_dosen','history_nilai','view')),
  array('name' => 'Input Nilai OBE', 'href' => $configObject->GetURL('history_nilai_obe','history_nilai','view')),
  array('name' => 'Logbook mbkm', 'href' => $configObject->GetURL('mbkm', 'mbkm', 'view')),
  array('name' => 'Download Mobile App', 'href' => $configObject->GetURL('announcement','mobile','view')),
  array('name' => 'Pengisian SKPI', 'href' => 'https://sipso.perbanas.id/skpi/login.php', 'target'=>'_BLANK'),
  array('name' => 'SIPSO FTI', 'href' => 'https://sipso.perbanas.id/Auth/login/', 'target'=>'_BLANK'),
  array('name' => 'SIPSO FEB', 'href' => 'https://sipsofeb.perbanas.id/Auth/login/', 'target'=>'_BLANK'),
  array('name' => 'SIPSO PASCA', 'href' => 'https://tesis.perbanas.id/Auth/login/', 'target'=>'_BLANK'),
  //array('name' => 'Logbook mbkm', 'href' => $configObject->GetURL('mbkm', 'mbkm', 'view')),

  array('name' => 'Konsultasi PA', 'href' => $configObject->GetURL('konsul','konsul','view'))
);

//if($configObject->GetValue('enable_kuisioner'))$submenu_items['[ Logout ]'][] = array('name' => 'Hasil Kuisioner', 'href' => $configObject->GetURL('kuisioner', 'hasil_kuisioner', 'view'));

$submenu_items['[ Logout ]'] = array_merge($submenu_items['[ Logout ]'],array(  
  array('name' => 'Informasi Akademik', 'href' => $configObject->GetURL('announcement','academic_announcement','view')),  
  array('name' => 'Workshop', 'href' => $configObject->GetURL('announcement','workshop_announcement','view')),  
  array('name' => 'Ubah Password', 'href' => $configObject->GetURL('user', 'user', 'chgpassword'))
  ));

$bottom_menu_items['[ Logout ]'] = 
array(
  array('name' => 'Aduan Integritas Akademik', 'href' => $configObject->GetURL('message', 'aduan', 'view')), //add ccp 28/2/2023
  array('name' => 'Pesan', 'href' => $configObject->GetURL('message', 'message', 'view')),
  array('name' => 'Forum Diskusi', 'href' => $configObject->GetURL('forum', 'kategori', 'view'))
  );
  
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
);  
?>
