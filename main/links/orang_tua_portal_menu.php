<?php
$menu_items =
array(
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$default = array(
  // array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('home', 'home', 'view')),
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('kbk_home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_mahasiswa.pdf')
);
/*
if($isEditBiodata) $default = array_merge($default, array(
  array('name' => 'Biodata', 'href' => $configObject->GetURL('user', 'biodata', 'view')),
  array('name' => 'Data Orang Tua', 'href' => $configObject->GetURL('user', 'orang_tua', 'view')),
  array('name' => 'Data SMA', 'href' => $configObject->GetURL('user', 'sma', 'view'))
));
else
$default = array_merge($default, array(
  array('name' => 'Profil', 'href' => $configObject->GetURL('user', 'profile', 'view'))
));
*/
$default = array_merge($default, array(
  // array('name' => 'Informasi Matakuliah Ditawarkan', 'href' => $configObject->GetURL('proposed_classes','proposed_classes_semester','view')),
  // array('name' => 'Kartu Rencana Studi', 'href' => $configObject->GetURL('academic_plan','academic_plan','view')),
  // array('name' => 'Cetak Kartu Ujian', 'href' => $configObject->GetURL('academic_plan', 'cetak_kartu_ujian', 'view')),
  array('name' => 'Jadwal Kuliah', 'href' => $configObject->GetURL('academic_plan','academic_jadwal','view')),
  array('name' => 'Rekap Absen', 'href' => $configObject->GetURL('academic_plan','academic_presensi','view')), #add ccp 26-8-2019
  array('name' => 'Kartu Hasil Studi', 'href' => $configObject->GetURL('academic_report', 'academic_report_ortu', 'view')),
  //array('name' => 'Kartu Kemajuan Mahasiswa', 'href' => $configObject->GetURL('academic_report', 'academic_progress', 'view')),
  array('name' => 'Transkrip Nilai', 'href' => $configObject->GetURL('academic_report','academic_transcript','view')),
  array('name' => 'Riwayat Nilai', 'href' => $configObject->GetURL('academic_report','grade_history_mhs','view')),
  array('name' => 'Informasi Kewajiban Pembayaran', 'href' => $configObject->GetURL('payment','bill_information','view'))
  #array('name' => 'Status Pembayaran', 'href' => $configObject->GetURL('payment','payment_history','view')),
));
$submenu_items['[ Logout ]'] = &$default;


// if($configObject->GetValue('enable_kuisioner'))$submenu_items['[ Logout ]'][] = array('name' => 'Hasil Kuisioner', 'href' => $configObject->GetURL('kuisioner', 'hasil_kuisioner', 'view'));

$submenu_items['[ Logout ]'] = array_merge($submenu_items['[ Logout ]'],array(
  //array('name' => 'Beasiswa', 'href' => $configObject->GetURL('schoolarship','schoolarship','view')),
 // array('name' => 'Perpustakaan', 'href' => $configObject->GetURL('perpustakaan','perpustakaan_home','view')),
  //array('name' => 'Pendaftaran Yudisium', 'href' => $configObject->GetURL('yudicium','yudicium_registration','view')),
  // array('name' => 'Informasi Akademik', 'href' => $configObject->GetURL('announcement','academic_announcement','view')),
  // array('name' => 'Pengajuan Cuti', 'href' => $configObject->GetURL('pengajuan_cuti','pengajuan_cuti','view')),
  // array('name' => 'Pengajuan Outline', 'href' => $configObject->GetURL('tugas_akhir', 'tugas_akhir', 'view')),
  // array('name' => 'Pendaftaran Ujian Tugas Akhir', 'href' => $configObject->GetURL('tugas_akhir', 'tugas_akhir', 'view')),
  // array('name' => 'Workshop', 'href' => $configObject->GetURL('announcement','workshop_announcement','view')),
  array('name' => 'Ubah Password', 'href' => $configObject->GetURL('user', 'user', 'chgpassword'))
));

$bottom_menu_items['[ Logout ]'] =
array(
  // array('name' => 'Pesan', 'href' => $configObject->GetURL('message', 'message', 'view')),
  // array('name' => 'Forum Diskusi', 'href' => $configObject->GetURL('forum', 'kategori', 'view'))
  );

$elearning_menu_items['[ Logout ]'] =
array(
  // array('name' => 'Materi Kuliah', 'href' => $configObject->GetURL('e_materi', 'materi', 'view')),
  // array('name' => 'Pengumuman', 'href' => $configObject->GetURL('e_pengumuman', 'pengumuman', 'view')."&act=new"),
  // array('name' => 'Tugas Kuliah', 'href' => $configObject->GetURL('e_tugas', 'tugas_mahasiswa', 'view')),
  // array('name' => 'Diskusi Online', 'href' => $configObject->GetURL('e_forum', 'forum', 'view')),
  // array('name' => 'Agenda Kelas', 'href' => $configObject->GetURL('e_agenda', 'kelas', 'view')),
  // array('name' => 'Agenda Pribadi', 'href' => $configObject->GetURL('e_agenda', 'pribadi', 'view')),
  // array('name' => 'File Sharing', 'href' => $configObject->GetURL('e_sharing', 'sharing', 'view')),
  // array('name' => 'Referensi', 'href' => $configObject->GetURL('e_materi', 'referensi', 'view').'&pos=start'),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__E-Learning_dosen_mahasiswa.pdf')
);
?>