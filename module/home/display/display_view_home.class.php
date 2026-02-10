<?php

   class DisplayViewHome extends DisplayBaseFull
   {
                     
      function DisplayViewHome(&$configObject, &$security,  $userId, $userRole, $siaServer)
      {
         DisplayBaseFull::DisplayBaseFull($configObject, $security);
         
         $this->mDataInformation = new Announcement($configObject);
         $this->mDataForum = new Forum($configObject);
         $this->mDataMsg = new Message($configObject);
		 
		 $this->mUserService = new UserClientService($siaServer, false, $userId);
         $this->SetTemplateBasedir($configObject->GetValue('app_module') . 'home/templates/');
         $this->SetTemplateFile('view_home.html');
         
         /* manual yang dulu
         define("INFORMASI_AKADEMIK", 1);                         
         define("WORKSHOP", 2);
         */
         define("LATESTOF", 5);
      }
      
      function Display()
      {
         DisplayBaseFull::Display('[ Logout ]');
         $serviceStatus = $this->mrUserSession->GetProperty("ServerServiceAvailable");
         $infoSemester = $this->mUserService->GetSemesterAktifInfo();
		 #add ccp 15-6-2023
		 $dataProfil = $this->mUserService->GetDataSisaStudi($this->mrUserSession->mUser); 
		 if($dataProfil[0]['mhsStatusMasukPt']=='B'){
			if($dataProfil[0]['prodiJjarkode']=='S1'){
				$sisa_tahun = $dataProfil[0]['mhsAngkatan']+7;
			}else if($dataProfil[0]['prodiJjarkode']=='D3'){
				$sisa_tahun = $dataProfil[0]['mhsAngkatan']+4;
			}else if($dataProfil[0]['prodiJjarkode']=='S2'){
				$sisa_tahun = $dataProfil[0]['mhsAngkatan']+3;
			}else{
				$sisa_tahun = $dataProfil[0]['mhsAngkatan']+3;
			}
		 }else{
			$sisa_tahun = $dataProfil[0]['mhsAngkatan']+2;
		 }
		 if($dataProfil[0]['mhsSemesterMasuk']=='1'){
			$nama_semester = 'Gasal';
		 }else{
			$nama_semester = 'Genap';
		 }
		 $this->AddVar("content", "SISA_STUDI", $nama_semester.' '.$sisa_tahun);
		#end
         if ($this->mrUserSession->mRole == 3) {
            $this->AddVar('view_mailbox', 'TYPE_MAILBOX', 'WITH_FEEDBACK');
         } 
         
         if ($this->mrUserSession->mRole != 3) {
            $referenceObj = new Reference($this->mrConfig);
            $fakultas = $referenceObj->GetFakultasByProdi($this->mrUserSession->mUserProdiId);
            $this->mDataInformation->SetProperty('AnnouncementFakultasId', $fakultas[0]['id']);
          }
         $this->mDataInformation->SetProperty('AnnouncementRoleId', $this->mrUserSession->mRole);
         
         // ambil data untuk jenis pengumuman
         // tambahan agung p m
         $allTypeAnnouncement = $this->mDataInformation->GetAllTypeInformation();
         // untuk setiap tipe pengumuman lakukan
         if(!empty($allTypeAnnouncement)) {
             foreach($allTypeAnnouncement as $announce) {
                  $this->addVar('category','IS_EMPTY',"0");
                  $url = $this->mrConfig->GetURL('announcement', 'type_announcement', 'view') . "&id=" . $this->mrConfig->Enc($announce['id']);
                  $this->addVar('category','URL',$url);
                  $this->addVar("category","KATEGORI",$announce['nama']); 
                  
                  // tampilkan role user session
                  switch ($this->mrUserSession->mRole) {
                      case 1 :
                                                       // ambil setiap pengumuman
                              $this->mDataInformation->SetProperty('AnnouncementTypeId',$announce['id']);
                              $dataPengumuman[$announce['id']] = $this->mDataInformation->GetDataAnnouncementBasedOnTypeForUserAndFaculty(0, LATESTOF);
                              break;
                      case 2 :
                                                       // ambil setiap pengumuman
                              $this->mDataInformation->SetProperty('AnnouncementTypeId',$announce['id']);
                              $dataPengumuman[$announce['id']] = $this->mDataInformation->GetDataAnnouncementBasedOnTypeForUserAndFaculty(0, LATESTOF);
                              break;
                      case 6 :
                              // ambil setiap pengumuman
                              $this->mDataInformation->SetProperty('AnnouncementTypeId',$announce['id']);
                              $dataPengumuman[$announce['id']] = $this->mDataInformation->GetDataAnnouncementBasedOnTypeForUserAndFaculty(0, LATESTOF);
                              break;
                      case 3 :
                              // ambil setiap pengumuman
                              $dataPengumuman[$announce['id']] = $this->mDataInformation->GetInformationByType($announce['id'], LATESTOF, 0);
                              break;
                  }
                  
                  // tampilkan data yang didapat
                  $this->mTemplate->clearTemplate('list_data');
                  $this->mTemplate->clearTemplate('data_category');
                  //echo "<pre>";print_r($dataPengumuman[$announce['id']]);echo "</pre>";
                  if (!empty( $dataPengumuman[$announce['id']])) {
                     foreach ( $dataPengumuman[$announce['id']] as $row=> $value) {
                         $this->addVar('data_category','IS_EMPTY','NO');
                         $url = $this->mrConfig->GetURL('announcement', 'announcement', 'detail') . "&id=" . $this->mrConfig->Enc($value['id']); 
                         $this->addVar('list_data','PENGUMUMAN_URL',$url);
                         $this->addVar('list_data','PENGUMUMAN_TITLE',$value['title']);
                         $this->addVar('list_data','PENGUMUMAN_DATE',$this->IndonesianDate($value['date']));                     
                         $this->mTemplate->parseTemplate('list_data','a');
                        }
                         $this->mTemplate->parseTemplate('data_category','a');
                     } else {
                         $this->addVar('data_category','IS_EMPTY','YES');
                     }
                  
                  $this->mTemplate->parseTemplate("category",'a');  
             }
         } else {
             $this->addVar('category','IS_EMPTY',"1");
         }
         /*
         $dataPengumumanWorkshop = array();
         $dataPengumumanAkademik = array();
         
         switch ($this->mrUserSession->mRole) {
            case 1:
            case 2:
            case 6:
            //$this->mAnnouncementTypeId, $this->mAnnouncementRoleId, $this->mAnnouncementFakultasId
               $this->mDataInformation->SetProperty('AnnouncementTypeId', INFORMASI_AKADEMIK);
               $dataPengumumanAkademik = $this->mDataInformation->GetDataAnnouncementBasedOnTypeForUserAndFaculty(0, LATESTOF);
               $this->mDataInformation->SetProperty('AnnouncementTypeId', WORKSHOP);
               $dataPengumumanWorkshop = $this->mDataInformation->GetDataAnnouncementBasedOnTypeForUserAndFaculty(0, LATESTOF);
               break;
               
            case 3:
               $dataPengumumanAkademik = $this->mDataInformation->GetInformationByType(INFORMASI_AKADEMIK, LATESTOF, 0);
               $dataPengumumanWorkshop = $this->mDataInformation->GetInformationByType(WORKSHOP, LATESTOF, 0);
               break;
         }
         
         //$dataPengumumanAkademik = $this->mDataInformation->GetIsotypeInformationAsArray(INFORMASI_AKADEMIK, LATESTOF, 0, $this->mrUserSession->mRole);
         if($dataPengumumanAkademik === false)
         {
            $this->addVar("informasi_akademik", "IS_EMPTY", "YES");
         }
         else
         {
            $this->addVar("informasi_akademik", "IS_EMPTY", "NO");
            //formatting tanggal
            foreach($dataPengumumanAkademik as $row=>$value)
            {
               $arrdata[$row]["URL"] = $this->mrConfig->GetURL('announcement', 'announcement', 'detail') . 
                                                      "&id=" . $this->mrConfig->Enc($value['id']);
               $arrdata[$row]["TITLE"] = $value['title'];
               $arrdata[$row]["DATE"] =  $this->IndonesianDate($value['date']);
            }
            $this->ParseData("informasi_akademik_list", $arrdata, "ACADEMICINF_");
         }
         
         $arrdata = null;
         if($dataPengumumanWorkshop === false)
         {
            $this->addVar("informasi_workshop", "IS_EMPTY", "YES");
         }
         else
         {
            $this->addVar("informasi_workshop", "IS_EMPTY", "NO");
            foreach($dataPengumumanWorkshop as $row=>$value)
            {
               $arrdata[$row]["URL"] = $this->mrConfig->GetURL('announcement', 'announcement', 'detail') . 
                                                      "&id=" . $this->mrConfig->Enc($value['id']);
               $arrdata[$row]["TITLE"] = $value['title'];
               $arrdata[$row]["DATE"] =  $this->IndonesianDate($value['date']);
            }
            $this->ParseData("informasi_workshop_list", $arrdata, "WORKSHOPINF_");
         }
         */
         
         $dataForum = $this->mDataForum->GetLatestPOST(LATESTOF);
         //echo "<pre>";print_r($dataForum);echo "</pre>";exit;
         if($dataForum === false)
         {
            $this->addVar("forum_diskusi", "IS_EMPTY", "YES");
         }else{
              $this->addVar("forum_diskusi", "IS_EMPTY", "NO");
            foreach($dataForum as $row=>$value){
               $arrdata[$row]["url"] = $this->mrConfig->GetURL('forum', 'post', 'view') . 
                     "&katid=".$this->mrConfig->Enc($value["KatId"]) .
                     "&topid=".$this->mrConfig->Enc($value["TopikId"]) .
                     "&thrdid=".$this->mrConfig->Enc($value["ThreadId"]);
               $arrdata[$row]["topic"] = $value['TopikTitle'];
               $arrdata[$row]["thread"] = $value['ThreadTitle'];
               $arrdata[$row]["jmlpost"] = $value['JumlahPost'];
               
               $arr_temp = explode(" ", $value['LastPost']);
               $arrdata[$row]["lastupdate"] = $this->IndonesianDate($arr_temp[0]);               
            }
            $this->ParseData("forum_diskusi_list", $arrdata, "DISCUSSION_");
         }
         
         $this->mDataMsg->SetProperty("MessageReceiver", $this->mrUserSession->mUser);
         $newMsg = $this->mDataMsg->GetCountNewInboxMessageItem();
         if(false === $newMsg) {
            $newMsg = '0';
         }
         
         $feedbackObj = new Feedback($this->mrConfig);
         $newFeedback = $feedbackObj->GetTotalNewFeedback();
         if ($newFeedback === false)
            $newFeedback = 0;
         
         $this->addVar("view_mailbox", "TOTAL_NEWFEEDBACK", $newFeedback);
         $this->addVar("view_mailbox", "TOTAL_NEWMSG", $newMsg);
         $this->addVar("view_mailbox", "URL_FEEDBACK", $this->mrConfig->GetURL('feedback','feedback','view') . "&type=" . $this->mrConfig->Enc('new') );
         $this->addVar("view_mailbox", "URL_INBOX", $this->mrConfig->GetURL('message','message','view') . 
               '&msgType='.$this->mrConfig->Enc('inbox'));
         $this->AddVar("view_mailbox", "URL_OUTBOX", $this->mrConfig->GetURL('message','message','view') . 
               '&msgType='.$this->mrConfig->Enc('sent'));
		 
		 if($this->mrUserSession->mRole == 2){
		 $this->SetAttribute("view_notifikasi","visibility","visible");
		 $this->addVar("view_notifikasi", "BATAS_REVISI_KRS", $this->displayTanggal($infoSemester[0]['KRS_REVISI_SELESAI']));
		 $this->addVar("view_notifikasi", "BATAS_INPUT_NILAI1", $this->displayTanggal($infoSemester[0]['INPUT_NILAI_SELESAI']));
		 $this->addVar("view_notifikasi", "BATAS_INPUT_NILAI2", $this->displayTanggal($infoSemester[0]['INPUT_NILAI2_SELESAI']));
		 }
               
         $this->AddVar("content", "URL_INFOAKADEMIK", $this->mrConfig->GetURL('announcement','academic_announcement','view') );
         $this->AddVar("content", "URL_INFOWORKSHOP", $this->mrConfig->GetURL('announcement','workshop_announcement','view')) ;
         $this->AddVar("content", "USERFULLNAME", $this->mrUserSession->mUserFullName);
         $this->AddVar("content", "APPLICATIONNAME", $this->mrConfig->GetValue('app_name'));
         $this->AddVar("content", "APPLICATIONCLIENT", $_SESSION['identitas']['pt_nama']);
         $this->DisplayTemplate();
      }
	  
	  function displayTanggal($tgl="now", $showLocation="true", $location="default") {
        global $config_obj;
        global $page;

        if ($tgl == "now") {
            $tgl = date("Y-m-d");
        }
        $arrayBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei",
            "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober",
            "11" => "November", "12" => "Desember");
        $arrayTgl = explode("-", $tgl);
        $setTanggal = $arrayTgl[2] + 0;

        /*
          if ($showLocation=="true"){
          if ($location == "default"){
          $tanggal = $config_obj->GetValue('location') . ', ' . $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
          }else
          $tanggal = $location.', '.$setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
          }else{
          $tanggal = $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
          }
         */
        $tanggal = $setTanggal . ' ' . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
        //echo $tanggal;
        return $tanggal;
      }
   }
?>
