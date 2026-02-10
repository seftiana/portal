<?php
$menu_items = 
array(	
  array('name' => '[ Logout ]', 'href' => $configObject->GetURL('login', 'logout', 'proses')));

$submenu_items['[ Logout ]'] = 
array(
  array('name' => 'Halaman Depan', 'href' => $configObject->GetURL('home', 'home', 'view')),
  array('name' => 'Panduan', 'href' => $configObject->GetValue('baseaddress') . 'manual/Panduan__Penggunaan__Portal__Akademik_admin.pdf')
  );
  
if($configObject->GetValue('enable_kuisioner'))$submenu_items['[ Logout ]'][] = array('name' => 'Hasil Kuisioner', 'href' => $configObject->GetURL('kuisioner', 'hasil_kuisioner', 'view'));

$submenu_items['[ Logout ]'] = array_merge($submenu_items['[ Logout ]'],array(
  array('name' => 'Pengumuman', 'href' => $configObject->GetURL('announcement', 'announcement', 'view')),  
  array('name' => 'Manajemen User', 'href' => $configObject->GetURL('user', 'user', 'view')),
  #array('name' => 'Manajemen Feedback', 'href' => $configObject->GetURL('feedback', 'feedback', 'view')),
  array('name' => 'Manajemen FAQ', 'href' => $configObject->GetURL('faq', 'faq_kategori', 'view')),
  array('name' => 'Ubah Password', 'href' => $configObject->GetURL('user','user','chgpassword'))
  ));

$bottom_menu_items['[ Logout ]'] = 
array(
  array('name' => 'Pesan', 'href' => $configObject->GetURL('message', 'message', 'view')),
  array('name' => 'Forum Diskusi', 'href' => $configObject->GetURL('forum', 'kategori', 'view')),
  array('name' => 'File Sharing', 'href' => $configObject->GetURL('e_sharing', 'sharing', 'view'))
  );
?>