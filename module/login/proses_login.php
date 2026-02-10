<?php
	
   // Load Application Process Class
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   // Load Process Module Class
   require_once $cfg->GetValue('app_module') . 'login/display/proses_login.class.php';
   // Load Application Business Class
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   require_once $cfg->GetValue('app_data') . 'Cryptlink.class.php';
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';	
   // Load Business Module Class   
   require_once $cfg->GetValue('app_module') . 'login/business/gatekeeper.class.php';   
   require_once $cfg->GetValue('app_module') . 'user/communication/user_client.service.class.php';	

   
	if ((!empty($_POST["username"])) and (!empty($_POST["password"])))
	{		
      
		$Process = new ProsesLogin($cfg);

		if (false !== $Process->LoginCheck($_POST["username"], $_POST["password"]))
		{
         $_SESSION['time'] = time() + 1800;   
         $userIdentity = $_SESSION["user_identity_portal"];
         /*
            disini dilakukan pemisahan halaman admin dan halaman user 
            kemudian jika ternyata merupakan user dosen atau mahasiswa dan isAgree=0
            pindah dulu ke halaman agreement
         */
	/*add ccp 22-10-2018 */
		$sia = $userIdentity->GetProperty("ServerServiceAddress");
		$prodiId = $userIdentity->GetProperty("UserProdiId");
		$userId = $userIdentity->GetProperty("UserReferenceId");
		$objUserService = new UserClientService($sia,false, $userId);
		//$dateInputNilai = $objUserService->GetInputNilaiAkademik($prodiId);
		$dateInputNilai = $objUserService->GetPeriodeKuisioner($prodiId); //add ccp 12-02-2019
		$now = date('Y-m-d');
		if($now >= $dateInputNilai[0]['INPUT_NILAI_MULAI'] && $now<=$dateInputNilai[0]['INPUT_NILAI_SELESAI']){
			$waktu='UTS';
		}elseif($now >= $dateInputNilai[0]['INPUT_NILAI2_MULAI'] && $now<=$dateInputNilai[0]['INPUT_NILAI2_SELESAI']){
			$waktu='UAS';
		}else{
			$waktu='0';
		}
		#untuk pemilu
		$wk = date('Y-m-d'); 
		$tglpilihmulai = "2025-12-01";
		$tglpilihselesai = "2025-12-05";
		if ($wk >= $tglpilihmulai && $wk <= $tglpilihselesai){
			
			$angkatan = substr($_POST["username"],0,2);
			$prodi = substr($_POST["username"],3,2);
			$ch = strlen($_POST["username"]);
			$isi = $objUserService->GetPemilu($_POST["username"]); #add ccp pemilu 16-juli-2020
			//if($ch=='10' and $prodi=='10' AND $isi[0]['NIM_PEMILU']=='0' AND $userIdentity->GetProperty("Role")==1 AND ($angkatan>='16' and $angkatan<='20') ){
			//if($ch=='10' AND $isi[0]['NIM_PEMILU']=='0' AND $isi[0]['STATUS_MHS']=='A' AND $userIdentity->GetProperty("Role")==1 ){
				
			if($ch=='10' AND $isi[0]['NIM_PEMILU']=='0' and $prodi=='10' AND $angkatan>='22' AND $userIdentity->GetProperty("Role")==1 ){
				header("Location: ". $cfg->GetURL('kuisioner', 'informasi_pemilu', 'view')); #untuk pengumuman depan
				exit();
			}
		}
		#end pemilu

	/*end ccp 22-10-2018 */
         if ($userIdentity->GetProperty("Role") == 1 || $userIdentity->GetProperty("Role") == 2 ){
            if ($userIdentity->GetProperty("UserIsAgree") == 1 ){
			   // Cek kuisioner
			   if($cfg->GetValue('enable_kuisioner') && $waktu!='0'){ //update ccp 23-10-2018
               header("Location: ". $cfg->GetURL('kuisioner', 'kuisioner', 'view'));
				exit();
			   }
               #//echo "masuk ke home"; exit;
               	header("Location: ". $cfg->GetURL('home', 'home', 'view')); //hidden ccp 11-04-2019
		#add ccp 11-04-2019
		#//$isi = $objUserService->GetPemilu($userId); #add ccp pemilu 16-juli-2020
		#//if($userIdentity->GetProperty("Role") == 1 AND $isi[0]['NIM_PEMILU']=='0' AND $cfg->GetValue('pemilu')==1 AND ($isi[0]['STATUS_MHS']=='A' OR $isi[0]['STATUS_MHS']=='C' OR $isi[0]['STATUS_MHS']=='N')){ #add ccp pemilu 16-juli-2020
		if($userIdentity->GetProperty("Role") == 1){ #untuk pengumuman depan
			header("Location: ". $cfg->GetURL('kuisioner', 'informasi', 'view')); #untuk pengumuman depan
		}else{ #untuk pengumuman depan
			header("Location: ". $cfg->GetURL('home', 'home', 'view'));
		} #untuk pengumuman depan
		//end
            }else{
               //echo "masuk ke agreement : ".$cfg->GetURL('user', 'agreement_intro', 'view');
               header("Location: ". $cfg->GetURL('user', 'user', 'process'));
            }
            exit();
         }
         elseif ($userIdentity->GetProperty("Role") == 8 || $userIdentity->GetProperty("Role") == 9 || $userIdentity->GetProperty("Role") == 10){
            if ($userIdentity->GetProperty("UserIsAgree") == 1 ){
			   // Cek kuisioner
			   /*if($cfg->GetValue('enable_kuisioner')){
               header("Location: ". $cfg->GetURL('kuisioner', 'kuisioner', 'view'));
				exit();
			   }*/
               //echo "masuk ke home"; exit;
               header("Location: ". $cfg->GetURL('kbk_home', 'home', 'view'));
            }else{
               //echo "masuk ke agreement : ".$cfg->GetURL('user', 'agreement_intro', 'view');
               header("Location: ". $cfg->GetURL('kbk_user', 'user', 'process'));
            }
            exit();
         }
         else{
			   if($cfg->GetValue('enable_kuisioner')&&$userIdentity->GetProperty("Role") != 3){
               header("Location: ". $cfg->GetURL('kuisioner', 'kuisioner', 'view'));
				exit();
			   }
            header("Location: ". $cfg->GetURL('home', 'home', 'view'));
            exit();
         }
		}
		else
		{	
		  $Process->SetProperty("ProsesLoginErrorMessage", "User Name dan Password tidak valid"); 
         header("Location: ". $cfg->GetURL('login', 'gagal_login', 'view').'&errMsg='.$cfg->enc($Process->GetProperty("ProsesLoginErrorMessage")));
			exit();
		}
	}
	else
	{
      $Process = new ProsesLogin($cfg);
      $Process->SetProperty("ProsesLoginErrorMessage", "User Name dan Password tidak boleh kosong");   
      header("Location: ". $cfg->GetURL('login', 'gagal_login', 'view').'&errMsg='.$cfg->enc($Process->GetProperty("ProsesLoginErrorMessage")));
	}
?>