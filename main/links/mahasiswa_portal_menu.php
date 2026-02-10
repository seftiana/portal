<?php
$kode_fakultas = substr($security->mUserIdentity->GetProperty("UserProdiId"),0,5);
if($kode_fakultas == '57201' || $kode_fakultas == '55201' || $kode_fakultas == '56201' || $kode_fakultas == '57202' ){
	$menu_sipso =  array('name' => 'SIPSO FTI', 'href' => 'https://sipso.perbanas.id/Auth/login/', 'target'=>'_BLANK');
}else if($kode_fakultas == '62401' || $kode_fakultas == '61406' || $kode_fakultas == '62201' || $kode_fakultas == '61201' || $kode_fakultas == '60202'){
	$menu_sipso =  array('name' => 'SIPSO FEB', 'href' => 'https://sipsofeb.perbanas.id/Auth/login/', 'target'=>'_BLANK');
}else{
	$menu_sipso =  array('name' => 'SIPSO PASCA', 'href' => 'https://tesis.perbanas.id/Auth/login/', 'target'=>'_BLANK');
}

$menu_wisuda='';
if(date('Y-m-d') >='2025-03-13' and date('Y-m-d')<='2025-06-17' ){
	$menu_wisuda = array('name' => 'Daftar Wisuda', 'href' => $configObject->GetURL('wisuda','daftar','view'));
}else{
	$menu_wisuda = array('name' => 'Daftar Wisuda', 'href' => $configObject->GetURL('wisuda','tutup','view'));
}

$menu_items =
array(
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$default = array(
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_mahasiswa.pdf'),
  //array('name' => 'Panduan E-Learning Angktan 2019', 'href' => $configObject->GetValue('baseaddress') . 'manual/panduan_aktivasi_elearning_2019.pdf'),
  //array('name' => 'Panduan Lupa Password Email dan E-Learning', 'href' => $configObject->GetValue('baseaddress') . 'manual/panduan_lupa_password_email_dan_elearning_2019.pdf')
);

if($isEditBiodata) $default = array_merge($default, array(
  array('name' => 'Update Nomor HP', 'href' => $configObject->GetURL('user', 'biodata', 'view')),
  //array('name' => 'Biodata', 'href' => $configObject->GetURL('user', 'biodata', 'view')),
  //array('name' => 'Data Orang Tua', 'href' => $configObject->GetURL('user', 'orang_tua', 'view')),
  //array('name' => 'Data SMA', 'href' => $configObject->GetURL('user', 'sma', 'view'))
));
else
$default = array_merge($default, array(
  //array('name' => 'Profil', 'href' => $configObject->GetURL('user', 'profile', 'view')),
  array('name' => 'Profil', 'href' => $configObject->GetURL('user', 'profile2', 'view')), #add ccp 24-8-2021
));

$default = array_merge($default, array(
  //   array('name' => 'Update Biodata', 'href' => $configObject->GetValue('baseaddress') . 'editbio/mahasiswa_edit.php?editid1='.md5($security->mUserIdentity->GetProperty("UserReferenceId"))),
  //array('name' => 'Update Biodata', 'href' => $configObject->GetURL('user', 'biodata', 'view')),
  array('name' => 'Informasi Matakuliah Ditawarkan', 'href' => $configObject->GetURL('proposed_classes','proposed_classes_semester','view')),
  array('name' => 'Kartu Rencana Studi', 'href' => $configObject->GetURL('academic_plan','academic_plan','view')),
  array('name' => 'KMK Remedial', 'href' => $configObject->GetURL('academic_plan','academic_plan_remedial','view')), // add ccp 23-8-2018
  array('name' => 'Cetak Kartu Ujian', 'href' => $configObject->GetURL('academic_plan', 'cetak_kartu_ujian', 'view')),
  array('name' => 'Jadwal Kuliah', 'href' => $configObject->GetURL('academic_plan','academic_jadwal','view')),
  array('name' => 'Rekap Absen', 'href' => $configObject->GetURL('academic_plan','academic_presensi','view')), #add ccp 26-8-2019
  array('name' => 'Presensi QR Code', 'href' => $configObject->GetURL('presensi', 'jadwal_presensi', 'view')),
  array('name' => 'Kartu Hasil Studi', 'href' => $configObject->GetURL('academic_report', 'academic_report', 'view')),
  //array('name' => 'Kartu Kemajuan Mahasiswa', 'href' => $configObject->GetURL('academic_report', 'academic_progress', 'view')),
  array('name' => 'Transkrip Nilai', 'href' => $configObject->GetURL('academic_report','academic_transcript','view')),
  //array('name' => 'Riwayat Nilai', 'href' => $configObject->GetURL('academic_report','grade_history_mhs','view')),
  array('name' => 'Informasi Kewajiban Pembayaran', 'href' => $configObject->GetURL('payment','bill_information','view')),
  #array('name' => 'Status Pembayaran', 'href' => $configObject->GetURL('payment','payment_history','view')),
  array('name' => 'Account Email Perbanas', 'href' => $configObject->GetURL('account','account_email','view')), #add ccp 26-8-2019
  array('name' => 'Download Mobile App', 'href' => $configObject->GetURL('announcement','mobile','view')),
  array('name' => 'Pengisian SKPI', 'href' => 'https://sipso.perbanas.id/skpi/login.php', 'target'=>'_BLANK'),
  $menu_sipso,
  array('name' => 'Layanan Perpustakaan', 'href' => 'https://digilib.perbanas.id/', 'target'=>'_BLANK'),
  array('name' => 'Loogbook mbkm', 'href' => $configObject->GetURL('mbkm','mbkm','view')),
  array('name' => 'Konsultasi PA', 'href' => $configObject->GetURL('konsul','konsul','view')),
  $menu_wisuda,
));
$submenu_items['[ Logout ]'] = &$default;


// if($configObject->GetValue('enable_kuisioner'))$submenu_items['[ Logout ]'][] = array('name' => 'Hasil Kuisioner', 'href' => $configObject->GetURL('kuisioner', 'hasil_kuisioner', 'view')); #hidden by ccp 22-02-2019

$submenu_items['[ Logout ]'] = array_merge($submenu_items['[ Logout ]'],array(
  //array('name' => 'Beasiswa', 'href' => $configObject->GetURL('schoolarship','schoolarship','view')),
  // array('name' => 'Perpustakaan', 'href' => $configObject->GetURL('perpustakaan','perpustakaan_home','view')),
  //array('name' => 'Pendaftaran Yudisium', 'href' => $configObject->GetURL('yudicium','yudicium_registration','view')),
  array('name' => 'Informasi Akademik', 'href' => $configObject->GetURL('announcement','academic_announcement','view')),
  array('name' => 'Pengajuan Cuti', 'href' => $configObject->GetURL('pengajuan_cuti','pengajuan_cuti','view')),
  array('name' => 'Pengajuan Penundaan Pembayaran', 'href' => $configObject->GetURL('pengajuan_tunda_pembayaran','pengajuan_tunda_pembayaran','view')),
  // array('name' => 'Pengajuan Outline', 'href' => $configObject->GetURL('tugas_akhir', 'tugas_akhir', 'view')),
  // array('name' => 'Pendaftaran Ujian Tugas Akhir', 'href' => $configObject->GetURL('tugas_akhir', 'tugas_akhir', 'view')),
  //array('name' => 'Workshop', 'href' => $configObject->GetURL('announcement','workshop_announcement','view')),
  array('name' => 'Ubah Password', 'href' => $configObject->GetURL('user', 'user', 'chgpassword'))
));

$bottom_menu_items['[ Logout ]'] =
array(
  array('name' => 'Aduan', 'href' => $configObject->GetURL('message', 'aduan', 'view')), //add ccp 28/2/2023
  array('name' => 'Pesan', 'href' => $configObject->GetURL('message', 'message', 'view')),
  array('name' => 'Forum Diskusi', 'href' => $configObject->GetURL('forum', 'kategori', 'view')),
  // array('name' => 'Kotak Saran', 'href' => $configObject->GetURL('forum', 'thread', 'view')."&katid=1&topid=1"),
  array('name' => 'Kotak Saran', 'href' => $configObject->GetURL('forum', 'saran', 'view')."&katid=1&topid=1")
  );

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
);
?>
