<?php
   // Load Process base Class   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';
   
   // Load Module display Class  
   require_once $cfg->GetValue('app_module') . 'user/display/process_user.class.php';
   require_once $cfg->GetValue('app_module') . 'user/business/user.class.php';
   
   require_once $cfg->GetValue('app_service') . 'client/base_client.service.class.php';
   require_once $cfg->GetValue('app_module') . 'user/communication/user_client.service.class.php';
   require_once 'function.php';
   
   $ThisPageAccessRight = "ADMINISTRASI | ADMINUNIT | MAHASISWA | DOSEN | ORTU";
   $security = new Security($cfg);
   $sia = $security->mUserIdentity->GetProperty("ServerServiceAddress");
//echo("<pre>");print_r($_POST);echo("</pre>");exit;
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)){
      $doact = "";
      if(isset($_POST["doact"]))
         $doact = $_POST["doact"];
      else if (isset($_GET["doact"]))
         $doact = $cfg->Dec($_GET["doact"]);
      
      if ($doact!=="") {
         $app = new ProcessUser($cfg,$sia);
         switch($doact){
            case "edit":
               if (isset($_POST["simpan"])){
				  unset($_POST["simpan"]);
				  unset($_POST["doact"]);
				  include_once $cfg->GetValue("app_module") . "user/communication/user_sireg.service.class.php";
				  // $update = $app->EditBiodataMahasiswa($security->mUserIdentity->GetProperty("User"),$security->mUserIdentity->GetProperty("SiregServiceAddress"));
				  if(in_array(null,$_POST['mhs']) || in_array('', array_map('trim',$_POST['mhs']))) {
					$err = $app->ValidateFormValue($_POST);
					header('location: '. $cfg->GetURL('user', 'biodata', 'edit') . "&err=". $cfg->Enc('tidak boleh ada data yang kosong'));
					die;
				  }
				  $update = $app->EditBiodataMahasiswaHP($security->mUserIdentity->GetProperty("User"),$security->mUserIdentity->GetProperty("SiregServiceAddress")); #add ccp 1-9-2020
                  if($update>0) header('location: '. $cfg->GetURL('user', 'biodata', 'view'));
				  else  header('location: '. $cfg->GetURL('user', 'biodata', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
               } else {
                  header('location: '. $cfg->GetURL('user', 'biodata', 'view'));
               }
			  die;
			  
			#add ccp 24-8-2021
			 case "edit_mhs":
			   if (isset($_POST["simpan"])){
				  unset($_POST["simpan"]);
				  unset($_POST["doact"]);
				
				  if(in_array(null,$_POST['mhs']) || in_array('', array_map('trim',$_POST['mhs']))) {
					$err = $app->ValidateFormValue($_POST);
					header('location: '. $cfg->GetURL('user', 'mahasiswa', 'edit') . "&err=". $cfg->Enc('tidak boleh ada data yang kosong'));
					die;
				  }
				  $serviceAkd = new UserClientService($security->mUserIdentity->GetProperty("ServerServiceAddress"), false, $security->mUserIdentity->GetProperty("User"));
				  
				  $arrMhs = $_POST['mhs']['mhs_no_telp'].'|'.$_POST['mhs']['mhs_no_ktp'].'|'.$_POST['mhs']['mhs_no_kk'].'|'.$_POST['mhs']['mhs_mhsortuNamaIbu'].'|'.$_POST['mhs']['mhs_email'].'|'.$_POST['mhs']['mhs_alamat'];
				  
				  $update_mhs = $serviceAkd->DoUpdateBiodataMhs($security->mUserIdentity->GetProperty("User"),$arrMhs);
		
				  if($update_mhs=='oke') header('location: '. $cfg->GetURL('user', 'profile2', 'view'));
				  else  header('location: '. $cfg->GetURL('user', 'mahasiswa', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
			   } else {
				  header('location: '. $cfg->GetURL('user', 'profile2', 'view'));
			   }
			  die;
			
			#add ccp 5-9-2020
			case "edit_dosen":
				if (isset($_POST["simpan"])){
				  unset($_POST["simpan"]);
				  unset($_POST["doact"]);
				  if(in_array(null,$_POST['mhs']) || in_array('', array_map('trim',$_POST['mhs']))) {
					$err = $app->ValidateFormValue($_POST);
					header('location: '. $cfg->GetURL('user', 'dosen', 'edit') . "&err=". $cfg->Enc('tidak boleh ada data yang kosong'));
					die;
				  }
				  $noreg = $_POST['mhs']['dsn_noreg'];
				  $pegNoHP = $_POST['mhs']['dsn_pegNoHP'];
				  $pegNomorKtp = $_POST['mhs']['dsn_pegNomorKtp'];
				  $pegNamaIbu = $_POST['mhs']['dsn_pegNamaIbu'];
				  $pegAlamatRumah = $_POST['mhs']['dsn_pegAlamatRumah'];
				  $dsnNidn = $_POST['mhs']['dsn_dsnNidn'];
				  $pegKotaKodeLahir = $_POST['mhs']['kota_lahir'];
				  $pegPropKodeLahir = $_POST['mhs']['dsn_propinsi_lahir'];
				  $pegEmail = $_POST['mhs']['dsn_pegEmail'];
				  $tglLahir = $_POST['mhs']['mhs_lahir_tahun'].'-'.$_POST['mhs']['mhs_lahir_bulan'].'-'.$_POST['mhs']['mhs_lahir_tanggal'];
				  
				  $update = $app->EditBiodataDosen($sia,$security->mUserIdentity->GetProperty("UserReferenceId"),$noreg,$pegNoHP,$pegNomorKtp,$pegNamaIbu,$pegAlamatRumah,$dsnNidn,$pegKotaKodeLahir,$tglLahir,$pegEmail);
				   // echo"<pre>";print_r ($update); die;
                  if($update == 'oke') header('location: '. $cfg->GetURL('user', 'profile', 'view'));
				  else  header('location: '. $cfg->GetURL('user', 'dosen', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
				} else {
					header('location: '. $cfg->GetURL('user', 'profile', 'view'));
				}
				die;
				
            case "edit_orang_tua":
               if (isset($_POST["simpan"])){
				  unset($_POST["simpan"]);
				  unset($_POST["doact"]);
				  include_once $cfg->GetValue("app_module") . "user/communication/user_sireg.service.class.php";
				  $update = $app->EditBiodataOrangTua($security->mUserIdentity->GetProperty("User"),$security->mUserIdentity->GetProperty("SiregServiceAddress"));
                  if($update>0) header('location: '. $cfg->GetURL('user', 'orang_tua', 'view'));
				  else  header('location: '. $cfg->GetURL('user', 'orang_tua', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
               } else {
                  header('location: '. $cfg->GetURL('user', 'orang_tua', 'view'));
               }
			  die;
               
            case "edit_smta":
               if (isset($_POST["simpan"])){
				  unset($_POST["simpan"]);
				  unset($_POST["doact"]);
				  include_once $cfg->GetValue("app_module") . "user/communication/user_sireg.service.class.php";
				  $update = $app->EditBiodataSmta($security->mUserIdentity->GetProperty("User"),$security->mUserIdentity->GetProperty("SiregServiceAddress"));
                  if($update>0) header('location: '. $cfg->GetURL('user', 'sma', 'view'));
				  else  header('location: '. $cfg->GetURL('user', 'sma', 'edit') . "&err=". $cfg->Enc('Gagal mengubah data'));
               } else {
                  header('location: '. $cfg->GetURL('user', 'sma', 'view'));
               }
			  die;
               
            case "add":
               if (isset($_POST["btnTambah"])){
                  $err = $app->ValidateFormValue($_POST);
                  if($err===false) {
                     $security->mUserIdentity->SetProperty("LastFormData",$_POST);
                     $security->RefreshSessionInfo();
                     header("Location: ". $cfg->GetURL('user', 'user', 'add') . "&err=". $cfg->Enc($app->GetProperty("ProcessErrorMsg")));        
                  } else{
                     if($app->AddUserItem($_POST["txtNamaUser"], $_POST["lstHakAkses"], $_POST["txtNamaLengkap"], 
                                          $_POST["lstUnitId"], $_POST["prodiId"], $_POST["txtReferensi"])) {
                        //this is important, don't forget to set LastFormData property to null after add process done
                        $security->mUserIdentity->SetProperty("LastFormData", null);
                        $security->RefreshSessionInfo();
            
                        header("Location: ". $cfg->GetURL('user', 'succeed', 'add') . 
                              "&new=" . $cfg->Enc($_POST["txtNamaUser"]) . "&ps=" . $cfg->Enc($app->GetProperty("NewPassword")));
                     } else {
                        header("Location: ". $cfg->GetURL('user', 'user', 'add') . "&err=". $cfg->Enc($app->GetProperty("ProcessErrorMsg")));        
                     }
                  }
               } else {
                  $security->mUserIdentity->SetProperty("LastFormData", null);
                  $security->RefreshSessionInfo();
                  header("Location: ". $cfg->GetURL('user', 'user', 'view'));
               }
               break;
               
            case "update":
               if (isset($_POST["btnUpdate"])){
                  $err = $app->ValidateFormValue($_POST);
                  if($err===false) {
                     $security->mUserIdentity->SetProperty("LastFormData",$_POST);
                     $security->RefreshSessionInfo();
                     header("Location: ". $cfg->GetURL('user', 'user', 'update') . "&id=". $cfg->Enc($_POST["id"]) . 
                     "&key=". $cfg->Enc($_POST["key"]) ."&err=". $cfg->Enc($app->GetProperty("ProcessErrorMsg")));        
                  } else{
                     $urlAdditional ="";
                     if($app->UpdateUserItem($_POST["txtNamaUser"], $_POST["lstHakAkses"], $_POST["txtNamaLengkap"], 
                                          $_POST["lstUnitId"], $_POST["prodiId"], $_POST["txtReferensi"], $_POST["id"])) {
                        $urlAdditional .="&cari=". $cfg->Enc($_POST["key"]) . "&err=". $cfg->Enc("Proses pengubahan data user ".$_POST["id"]." berhasil.");
                        
                     } else {
                        $urlAdditional .="&err=". $cfg->Enc($app->GetProperty("ProcessErrorMsg"));                  
                     }
                     $security->mUserIdentity->SetProperty("LastFormData", null);
                     $security->RefreshSessionInfo();
                     header("Location: ". $cfg->GetURL('user', 'user', 'view') . $urlAdditional);
                  }
               } else {
                  $security->mUserIdentity->SetProperty("LastFormData", null);
                  $security->RefreshSessionInfo();
                  header("Location: ". $cfg->GetURL('user', 'user', 'view'));
               }
               break;
               
            case "delete":
               $urlAdditional ="";
               $id = $cfg->Dec($_GET["id"]);
               if (!$app->DeleteUserItem($id)) {
                  $urlAdditional .="&err=". $cfg->Enc($app->GetProperty("ProcessErrorMsg"));
               } else {
                  $urlAdditional .="&err=" . $cfg->Enc("Proses penghapusan data user ".$id." berhasil.");
               }
               $urlAdditional .="&cari=". $cfg->Enc($cfg->Dec($_GET["key"])) . "&flag=". $cfg->Enc('1');
               header("Location: ". $cfg->GetURL('user', 'user', 'view') . $urlAdditional);
               break;
               
            case "agreement":
               switch ($_POST["step"]) {
                  case "intro":
                     header("Location: ". $cfg->GetURL('user', 'agreement_disclaimer', 'view'). "&isIntro=". $cfg->Enc('1'));
                     break;
                     
                  case "disclaimer":
                     if (isset($_POST["btnTidakSetuju"])) {
                        header("Location: ". $cfg->GetURL('login', 'logout', 'proses'));
                     } else {
                        header("Location: ". $cfg->GetURL('user', 'agreement_chgpassword', 'view'). "&isDisc=". $cfg->Enc('1'));
                     }
                     break;
                     
                  case "chgpasswd":
                     $encVar1 = $cfg->Enc('1');
                     if(!empty($_POST["passwd1"]) && !empty($_POST["passwd2"])) {
                        if ($_POST["passwd1"] != $_POST["passwd2"]){
                           $encErrMsg = $cfg->Enc(' Password baru dan Tulis Ulang Password baru tidak sama');
                           header("Location: ".$cfg->GetURL('user', 'agreement_chgpassword', 'view')."&isDisc=".$encVar1."&err=".$encErrMsg);
                        } else {
                           $result = $app->UpdateUserPassword($security->mUserIdentity->GetProperty("User"), $_POST["passwd2"], $_POST["oldPasswd"]);
                           if(false === $result && $app->GetProperty("ProcessErrorType") == 'fatal') {
                              // kesalahan fatal mungkin session ekspired tidak terdeteksi redirect to login
                              header("Location: ".$cfg->GetURL('login', 'logout', 'proses'));
                           } elseif(false === $result && $app->GetProperty("ProcessErrorType") == 'nonfatal') {
                              $encErrMsg = $cfg->Enc($app->GetProperty("ProcessErrorMsg"));
                              header("Location: ".$cfg->GetURL('user', 'agreement_chgpassword', 'view')."&isDisc=".$encVar1."&err=".$encErrMsg);
                           } else {
                              $result = $app->UpdateUserAgreement($security->mUserIdentity->GetProperty("User"), 1);
                              if(false === $result && $app->GetProperty("ProcessErrorType") == 'fatal') {
                                 // kesalahan fatal mungkin process update agreement status gagal
                                 header("Location: ".$cfg->GetURL('login', 'logout', 'proses'));
                              } else {
                                 header("Location: ".$cfg->GetURL('user','agreement_greet','view')."&success=".$encVar1);
                              }                           
                           }
                        }
                     } else {
                        $encErrMsg = $cfg->Enc('Entry password tidak boleh kosong');
                        header("Location: ".$cfg->GetURL('user', 'agreement_chgpassword', 'view')."&isDisc=".$encVar1."&err=".$encErrMsg);
                     }                  
                     break;
               }
               break;
               
            case "password":
               if(!empty($_POST["passwd1"]) && !empty($_POST["passwd2"])) {
                  if ($_POST["passwd1"] != $_POST["passwd2"]){
                     $encErrMsg = $cfg->Enc(' Password baru dan Tulis Ulang Password baru tidak sama');
                     $errType =  $cfg->Enc('warning');
                     header("Location: ".$cfg->GetURL('user', 'user', 'chgpassword')."&errMsg=".$encErrMsg."&errType=".$errType);
                  }
                  else {
                     $result = $app->UpdateUserPassword($security->mUserIdentity->GetProperty("User"), $_POST["passwd2"], $_POST["oldPasswd"]);
                     if(false === $result && $app->GetProperty("ProcessErrorType") == 'fatal') {
                        // kesalahan fatal mungkin session ekspired tidak terdeteksi redirect to login
                        header("Location: ".$cfg->GetURL('login', 'logout', 'proses'));
                     }
                     elseif(false === $result && $app->GetProperty("ProcessErrorType") == 'nonfatal') {
                        $encErrMsg = $cfg->Enc($app->GetProperty("ProcessErrorMsg"));
                        $errType =  $cfg->Enc('warning');
                        header("Location: ".$cfg->GetURL('user', 'user', 'chgpassword')."&errMsg=".$encErrMsg."&errType=".$errType);
                     }
                     else {
                        $encErrMsg = $cfg->Enc('Berhasil Mengubah Password');
                        $errType =  $cfg->Enc('info');
                        header("Location: ".$cfg->GetURL('user','user','chgpassword')."&errMsg=".$encErrMsg."&errType=".$errType);
                     }                           
                  }
               }
               else {
                  $encErrMsg = $cfg->Enc('Semua entry harus diisi');
                  $errType =  $cfg->Enc('warning');
                  header("Location: ".$cfg->GetURL('user', 'user', 'chgpassword')."&errMsg=".$encErrMsg."&errType=".$errType);
               }                  
               break;
           
            case "rstpwd":
               // ubah password user
               //print_r($cfg->Dec($_POST['id']));exit;
               $result = $app->ResetPasswordUser($cfg->Dec($_POST['id']));
               if (false === $result) {
                  $errMsg = $cfg->Enc('Gagal Mengubah Password');
                  $errType = $cfg->Enc('warning');
                  $newPwd = NULL;
               }
               else {
                  //$newPwd = $cfg->Enc($result);
                  $errMsg = $cfg->Enc('Berhasil Mengubah Password');
                  $errType = $cfg->Enc('info');
                  $newPwd = $cfg->Enc($result);
               }
               header("Location: " . $cfg->GetURL('user','user','rstpassword') . '&key='. $_POST['key'] . '&id='. $_POST['id'] . '&errMsg='. $errMsg . '&errType='. $errType . '&newPwd='. $newPwd);
               break;
               
            default :
               if(isset($_POST["btnTambah"])) {
                  header("Location: ". $cfg->GetURL('user', 'user', 'add')) ;
               } else {
                  header("Location: ". $cfg->GetURL('user', 'user', 'view') . "&cari=" . $cfg->Enc($_POST["cari"]));
               }
               break;
         
            
         }
      } else {
         header("Location: ". $cfg->GetURL('user', 'agreement_intro', 'view'));
      }
   }else{
      $security->DenyPageAccess();
   }
   
   // ------ start function ------ //
   
   function AgreementProcess() {
   }
   
   function AddProcess() {
   }
   
   function UpdateProcess() {
   }
   
   function DeleteProcess() {
   }
   // ------ end function ------ //   
?>