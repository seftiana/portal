<?php
$menu_items = 
array(	
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$submenu_items['[ Logout ]'] = 
array(
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_dosen.pdf'));

if($configObject->GetValue('enable_kuisioner'))$submenu_items['[ Logout ]'][] = array('name' => 'Hasil Kuisioner', 'href' => $configObject->GetURL('kuisioner', 'hasil_kuisioner', 'view'));

$submenu_items['[ Logout ]'][] = array('name' => 'Informasi Akademik', 'href' => $configObject->GetURL('announcement','academic_announcement','view'));
$submenu_items['[ Logout ]'][] = array('name' => 'Ubah Password', 'href' => $configObject->GetURL('user', 'user', 'chgpassword'));

$bottom_menu_items['[ Logout ]'] = 
array(
  array('name' => 'Pesan', 'href' => $configObject->GetURL('message', 'message', 'view'))
  //array('name' => 'Forum Diskusi', 'href' => $configObject->GetURL('forum', 'kategori', 'view'))
  );
?>