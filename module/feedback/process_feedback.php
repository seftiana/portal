<?php
   
   require_once $cfg->GetValue('app_proc') . 'process_base.class.php';   
      
   require_once $cfg->GetValue('app_data') . 'database_connected.class.php';  
   
   require_once $cfg->GetValue('app_module') . 'feedback/display/process_feedback.class.php';
   require_once $cfg->GetValue('app_module') . "feedback/business/feedback.class.php";
   
   
   $ThisPageAccessRight = "MAHASISWA | DOSEN | ADMINISTRASI";
   $security = new Security($cfg);
   
   if (false !== $security->CheckAccessRight($ThisPageAccessRight)) {
      if (isset ($_GET['doact'])) {
         $action = $cfg->Dec($_GET['doact']);   
      } else {
         $action = $_POST['doact'];
      }
      
      switch ($action) {
         case "add": 
            if ($_POST['feedback']=='') {
                header("Location: " . $cfg->GetURL('feedback','feedback','add').'&err='. $cfg->Enc('empty'));
            } else {
               $processFeedbackObj = new ProcessFeedback($cfg, $security);
               $err = "";
               if (false === $processFeedbackObj->AddFeedback($security->mUserIdentity->GetProperty("User"), $_POST['feedback'])) {
                  // kirim error message
                  $err = '&err='. $cfg->Enc($processFeedbackObj->GetProperty('ErrorMessage'));
               } 
               header("Location: " . $cfg->GetURL('feedback','result','add').$err );
            }
            exit;
            break;
            
         case "delete":
            $processFeedbackObj = new ProcessFeedback($cfg, $security);
            if (false === $processFeedbackObj->DeleteFeedback($cfg->Dec($_GET['fid']))) {
               // kirim error message
               $err= "&err=" . $cfg->Enc('delete|'.$processFeedbackObj->GetProperty('ErrorMessage'));
            } else {
               $err= "&err=" . $cfg->Enc('delete|');
            } 
            if (isset($_GET['key'])){
               header("Location: " . $cfg->GetURL('feedback','feedback','view'). '&key='.$_GET['key'] . $err);
            } else {
               header("Location: " . $cfg->GetURL('feedback','feedback','view'). '&type='.$cfg->Enc('new') . $err);
            }
            exit;
            break;
            
         case "edit":
            $err = "";
            $id = $cfg->Dec($_POST['feedback']);
            if (isset($_POST['btnEdit'])) {
               $processFeedbackObj = new ProcessFeedback($cfg, $security);
               $result = $processFeedbackObj->InsertComment($_POST['priority'],$_POST['komentar'], $id); 
               if ($result === false) {
                  $err= "&err=" . $cfg->Enc('edit|'.$processFeedbackObj->GetProperty('ErrorMessage'));
               } else {
                  $err= "&err=" . $cfg->Enc('edit|');                  
               }
            } 
            header("Location: " . $cfg->GetURL('feedback','feedback','view'). '&key='.$_POST['key'] . $err);
            exit;
            break;
            
         case "view":
            if (isset($_POST['btnCari'])) {
               header("Location: " . $cfg->GetURL('feedback','feedback','view'). '&key='.$cfg->Enc($_POST['cari']));
            } else {
               $location = $cfg->GetURL('feedback','feedback','view'). '&type='.$_POST['type'];
               if (isset ($_POST['chk'])) {
                  $processFeedbackObj = new ProcessFeedback($cfg, $security);
                  if (isset($_POST['btnHapus'])) {
                     $arrId = array();
                     foreach($_POST['chk'] as $key=>$value) {
                        $arrId[$key] = $cfg->Dec($value);
                     }
                     $err = 'delete|';
                     if (false == $processFeedbackObj->DeleteArrayFeedback($arrId)) {
                        $err.= $processFeedbackObj->GetProperty('ErrorMessage');
                     }
                  } else {
                     $arrId = array();
                     $arrPrior = array();
                     foreach($_POST['chk'] as $key=>$value) {
                        $arrId[$key] = $cfg->Dec($value);
                     }
                     $err = 'prior|';
                     if (false == $processFeedbackObj->ChangePriorityForArrayFeedback($arrId, $_POST['prior'])) {
                        $err.= $processFeedbackObj->GetProperty('ErrorMessage');
                     }
                  }
                  $location .= '&err='.$cfg->Enc($err);
               } else {
                  $err = 'check|';
                  if (isset($_POST['btnHapus'])) {
                     $err .= 'hapus';
                  } else {
                     $err .= 'ubah prioritas';
                  }
                  $location .= '&err=' . $cfg->Enc($err);
                  if (isset($_POST['cari'])){
                     $location .= '&key='.$cfg->Enc($_POST['cari']);
                  }
               }
               header("Location: " . $location);
            }
            exit;
            break;
            
         case "detail":
            $processFeedbackObj = new ProcessFeedback($cfg, $security);
            $type= $cfg->Dec($_POST['type']);
            $id = $cfg->Dec($_POST['feedback']);
            if (isset($_POST['btnPrioritas'])) {
               $result = $processFeedbackObj->ChangePriority($_POST['priority'], $id); 
               if ($result === false) {
                  $err= "&err=" . $cfg->Enc($processFeedbackObj->GetProperty('ErrorMessage'));
               } else {
                  $err= "";                  
               }
               header("Location: " . $cfg->GetURL('feedback', 'feedback_detail', 'view'). '&type='.$_POST['type'] .
                   '&fid=' . $_POST['feedback'] . $err);
            } elseif (isset($_POST['btnHapus'])) {
                  $err = 'delete|';
                  if (false === $processFeedbackObj->DeleteFeedback($cfg->Dec($_POST['feedback']))) {
                     $err.= $processFeedbackObj->GetProperty('ErrorMessage');
                  } 
                  header("Location: " . $cfg->GetURL('feedback','feedback','view'). '&key='.$_POST['key']. '&type='.$_POST['type'] . '&err=' . $cfg->Enc($err));
            } else {
               if ($type == "new" || $type == "[new]") {
                  $processFeedbackObj->ChangePriority(3, $id, true); 
               }
               if (isset($_POST['btnEdit'])) {
                  header("Location: " . $cfg->GetURL('feedback', 'feedback', 'update') . '&fid=' . $_POST['feedback'] . '&key='.$_POST['key']);
               } elseif (isset($_POST['btnKembali'])) {
                  header("Location: " . $cfg->GetURL('feedback','feedback','view'). '&key='.$_POST['key']. '&type='.$_POST['type']);
               }
            }
            exit;
            break;
               
      }
   } else {
      $security->DenyPageAccess();
   }
?>