<?php

   class DisplayBase 
   {
      var $mrConfig;
      var $mrLinks;      
      var $mTemplate;
      
      function DisplayBase(&$configObject) {         
         $this->mrConfig = &$configObject;               
         $this->mTemplate = new patTemplate();         
         $this->SetTemplateBasedir($this->mrConfig->GetValue('docroot') . 'main/templates/');
      }
      
      function SetDocumentCommon() {
         $this->SetTemplateFile('document-common.html');         
      }
	  function SetDocumentCommonEmpty() {
         $this->SetTemplateFile('document-common-empty.html');         
      }
      
      function SetErrorAndEmptyBox() {
         $this->SetTemplateFile('empty_box.html');    
         $this->SetTemplateFile('error_box.html');   
      }
      
      function SetNavigationTemplate() {
         $this->SetTemplateFile('navigation_page.html'); 
      }
      
      
      function SetProperty($propName, $value) {
         $method_name = "Set" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $this->$method_name($value);
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $this->$property_name = $value;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }
      }

      function GetProperty($propName) {
         $method_name = "Get" . $propName;
         $property_name = "m" . $propName;
         if (method_exists($this, $method_name)) {
            $value = $this->$method_name();
         } else {
            $object_vars = get_object_vars($this);
            if (array_key_exists($property_name, $object_vars)) {
               $value = $this->$property_name;
            } else {
               exit($propName . " has not been declared yet!");
            }
         }   
         return $value;
      }
      
      function SetTemplateBasedir($basedir)
      {
         $this->mTemplate->setBasedir($basedir);
      }

      function SetTemplateFile($tmpl)
      {
         $this->mTemplate->readTemplatesFromFile($tmpl);
      }

      function SetLinks(&$links)
      {
         $this->mrLinks = &$links;
      }
      
      function ParseData($template_name,$data,$prefix,$start_numbering = false){
         if ($start_numbering !== false) {
            $number = $start_numbering;
         }

         foreach($data as $data_item){
            if (false !== $start_numbering) {
               if ($number % 2 == 0 ) {
                  $this->mTemplate->addVar($template_name, "ODDEVEN", "EVEN");
               } else {
                  $this->mTemplate->addVar($template_name, "ODDEVEN", "ODD");
               }
               $data_item["number"] = $number++;
               
            }
            //echo "<pre>"; print_r($data_item); echo "</pre>";
            $this->mTemplate->addVars($template_name, $data_item, $prefix);
            $this->mTemplate->parseTemplate($template_name, "a");
         }
      }

      function filterQuote($string){
         $find = array("@\"@smU",					// penggunaan quote
                           "@([\r\n])[\s]+@",	// carriage return
                           "@&quot;http@smU",	// quote yang diikuti http (supaya gak error di FCK)
                           "@&quot;>@smU");		// quote yang terletak diakhir URL (supaya gak error di FCK)
         $replace = array("&quot;","","http",">");
         $string = preg_replace($find,$replace,$string);
         return $string;
      }
      
      /**
             * DisplayBase::ShowPageNavigation()
             * penggunaannya harus disertai dengan templatenya, template nya sbb :
             * <!--Page Navigation-->
             *  <div id="qst-pageNav">
             *     <div class="pageNavigation-container">
             *     Halaman: 
             *     <!-- patTemplate:tmpl name="navigation_page" type="condition" conditionvar="ARROW_STATUS" -->
             *  
             *           <!-- patTemplate:sub condition="double" -->
             *                 <a href="{NAV_URL1}{NAV_PAGE1}">{NAV_LABEL1}</a>
             *                 <!-- patTemplate:tmpl name="navigation_page_condition" type="condition" conditionvar="IS_AKTIF" -->
             *                    <!-- patTemplate:sub condition="aktif" -->
             *                       <span class="pageNavigation-active">{NAV_LABEL}</span >
             *                    <!-- /patTemplate:sub -->
             *                    <!-- patTemplate:sub condition="inaktif" -->
             *                       <a href="{NAV_URL}{NAV_PAGE}">{NAV_LABEL}</a>
             *                    <!-- /patTemplate:sub -->
             *                 <!-- /patTemplate:tmpl -->
             *                 <a href="{NAV_URL2}{NAV_PAGE2}">{NAV_LABEL2}</a>
             *           <!-- /patTemplate:sub -->
             *
             *           <!-- patTemplate:sub condition="right" -->
             *                 <!-- patTemplate:tmpl name="navigation_page_condition" type="condition" conditionvar="IS_AKTIF" -->
             *                    <!-- patTemplate:sub condition="aktif" -->
             *                       <span class="pageNavigation-active">{NAV_LABEL}</span >
             *                    <!-- /patTemplate:sub -->
             *                    <!-- patTemplate:sub condition="inaktif" -->
             *                       <a href="{NAV_URL}{NAV_PAGE}">{NAV_LABEL}</a>
             *                    <!-- /patTemplate:sub -->
             *                 <!-- /patTemplate:tmpl -->
             *                 <a href="{NAV_URL2}{NAV_PAGE2}">{NAV_LABEL2}</a>
             *           <!-- /patTemplate:sub -->
             *                 
             *           <!-- patTemplate:sub condition="left" -->
             *                 <a href="{NAV_URL1}{NAV_PAGE1}">{NAV_LABEL1}</a>
             *                 <!-- patTemplate:tmpl name="navigation_page_condition" type="condition" conditionvar="IS_AKTIF" -->
             *                    <!-- patTemplate:sub condition="aktif" -->
             *                       <span class="pageNavigation-active">{NAV_LABEL}</span >
             *                    <!-- /patTemplate:sub -->
             *                    <!-- patTemplate:sub condition="inaktif" -->
             *                       <a href="{NAV_URL}{NAV_PAGE}">{NAV_LABEL}</a>
             *                    <!-- /patTemplate:sub -->  
             *                 <!-- /patTemplate:tmpl -->
             *           <!-- /patTemplate:sub -->
             *                 
             *           <!-- patTemplate:sub condition="none" -->
             *                 <!-- patTemplate:tmpl name="navigation_page_condition" type="condition" conditionvar="IS_AKTIF" -->
             *                    <!-- patTemplate:sub condition="aktif" -->
             *                       <span class="pageNavigation-active">{NAV_LABEL}</span >
             *                    <!-- /patTemplate:sub -->
             *                    <!-- patTemplate:sub condition="inaktif" -->
             *                       <a href="{NAV_URL}{NAV_PAGE}">{NAV_LABEL}</a>
             *                    <!-- /patTemplate:sub -->
             *                 <!-- /patTemplate:tmpl -->
             *           <!-- /patTemplate:sub -->
             *                 
             *     <!-- /patTemplate:tmpl -->
             *     </div>
             * </div><!--Page Navigation-->
             * @param $url
             * @param $page
             * @param $recordcount
             * @param integer $rowcount
             * @param integer $page_per_part
             * @return 
            **/ 
      function ShowPageNavigation($url,$page,$recordcount,$rowcount=10,$page_per_part=8){   
            
         
         if (preg_match("#\?[a-z]#i", $url)) { 
            $new_url = $url."&page="; 
         } 
         else if (preg_match("#\?#i", $url)) { 
            $new_url = $url."page="; 
         } 
         else { 
            $new_url = $url."?page="; 
         }
         
         $num_rec = $recordcount;
         $num_rec_per_page = $rowcount; 
         //jml halaman
         
         $num_page = ceil($num_rec/$num_rec_per_page);
         //jumlah part
         $num_page_per_part = $page_per_part;
         //jumlah halaman tiap part
         $num_part = ceil($num_page/$num_page_per_part);
         //page ini pada part berapa?
         $part = ceil(($page)/$num_page_per_part);
         //part ini dimulai dari halaman berapa?
         $start_page_this_part = ($part * $num_page_per_part)-($num_page_per_part-1);			
         //num page_this part
         if ($part == $num_part) {
            $num_page_this_part = $num_page%$num_page_per_part;  
            $last_page_this_part = $start_page_this_part + $num_page_this_part-1;
         }
         else {
            $last_page_this_part = $start_page_this_part + $num_page_per_part-1;
         }
         
         for ($i=$start_page_this_part; $i<=$last_page_this_part; $i++){
            // dont forget to encrypt the page            
            $nav[$i]['page'] = $this->mrConfig->Enc($i);            
            $nav[$i]['label'] = $i;
            $nav[$i]['url'] = $new_url;
            //	$nav[$i]['num_rec']=$rowcount;
         }
         
         // display navigatornya==================================================
         if ($part == 1) {
            if ($num_page > $num_page_per_part) {
               $this->mTemplate->addVar("navigation", "ARROW_STATUS","right");
               $this->mTemplate->AddVar("navigation", "NAV_URL2", $new_url);
               //	$this->mTemplate->AddVar("navigation_page", "NAV_NUM_REC", $rowcount);               
               $this->mTemplate->AddVar("navigation", "NAV_PAGE2", $this->mrConfig->Enc($i));
               $this->mTemplate->AddVar("navigation", "NAV_LABEL2", "&raquo;");
            } 
            else {
               $this->mTemplate->addVar("navigation", "ARROW_STATUS","none");
            }	
         }
         elseif ($part == $num_part) {
            $this->mTemplate->addVar("navigation", "ARROW_STATUS","left");
            $this->mTemplate->AddVar("navigation", "NAV_URL1", $new_url);
            //	$this->mTemplate->AddVar("navigation_page", "NAV_NUM_REC", $rowcount);
            $this->mTemplate->AddVar("navigation", "NAV_PAGE1", $this->mrConfig->Enc($start_page_this_part-$num_page_per_part));
            $this->mTemplate->AddVar("navigation", "NAV_LABEL1", "&laquo;");
         }
         else {
            $this->mTemplate->addVar("navigation", "ARROW_STATUS","double");
            $this->mTemplate->AddVar("navigation", "NAV_URL2", $new_url);
            //	$this->mTemplate->AddVar("navigation_page", "NAV_NUM_REC", $rowcount);            
            $this->mTemplate->AddVar("navigation", "NAV_PAGE2", $this->mrConfig->Enc($i));
            $this->mTemplate->AddVar("navigation", "NAV_LABEL2", "&raquo;");
            
            $this->mTemplate->AddVar("navigation", "NAV_URL1", $new_url);
            //	$this->mTemplate->AddVar("navigation_page", "NAV_NUM_REC", $rowcount);
            $this->mTemplate->AddVar("navigation", "NAV_PAGE1", $this->mrConfig->Enc($start_page_this_part-$num_page_per_part));
            $this->mTemplate->AddVar("navigation", "NAV_LABEL1", "&laquo;");
         }
         if (!empty($nav) && !empty($num_page)) {
            foreach ($nav as $row=>$value)
            {
               if ($value['page']==$page) {
                  $this->mTemplate->addVar("navigation_condition", "IS_AKTIF","aktif");
               } 
               else {
                  $this->mTemplate->addVar("navigation_condition", "IS_AKTIF", "inaktif");
               }
               $this->mTemplate->addVars("navigation_condition", $value, "nav_");
               $this->mTemplate->parseTemplate("navigation_condition", "a");
            }
         }
      }
      
      function IndonesianDate($date) {
         $lengthDate = strlen(trim($date));
         $month = substr($date,5,2)+'toint';
         switch($month) {
            case  1: $month ='Januari';  break; 
            case  2: $month ='Februari'; break; 
            case  3: $month ='Maret';   break; 
            case  4: $month ='April';   break; 
            case  5: $month ='Mei';     break; 
            case  6: $month ='Juni';    break; 
            case  7: $month ='Juli';    break; 
            case  8: $month ='Agustus';  break; 
            case  9: $month ='September';break; 
            case 10: $month ='Oktober';  break; 
            case 11: $month ='November'; break; 
            case 12: $month ='Desember'; break; 
         } // switch 
         if ($lengthDate > 10) {
            return $this->mDisplayDate = substr($date,8,2).' '.$month.' '.substr($date,0,4).' '.substr($date,-8);        
         } 
         else {      
            return $this->mDisplayDate = substr($date,8,2).' '.$month.' '.substr($date,0,4);
         }      
      }
      
      function ComposeErrorMessage($errorUser="", $errorSystem="")  {
         $developerWarning = $this->mrConfig->GetValue('enable_developer_warning');
         if ($developerWarning === true) {
            return $errorUser . "\n" . $errorSystem;
         } else {
            return $errorUser;
         }
      }
      
      function AddVar($template_name, $template_var, $var_value) {
         $this->mTemplate->AddVar($template_name, $template_var, $var_value);
      }
      
      function SetAttribute($template_name, $attribute_var, $var_value) {
         $this->mTemplate->SetAttribute($template_name, $attribute_var, $var_value);
      }
      
      function DisplayTemplate() {
         $this->mTemplate->displayParsedTemplate();
      }
      
      function ClearTemplate ($template_name) {
         $this->mTemplate->clearTemplate($template_name);
      }
      
      function AppendVarWithInnerTemplate($template_name, $data, $prefix, $inner_template_name, $inner_data, $inner_prefix, $numbering=false, $doEvenOdd = false ) {
         $this->ParseData($inner_template_name, $inner_data, $inner_prefix, $numbering);
         if (false !== $doEvenOdd) {
            if ($doEvenOdd % 2 == 0 ) {
               $this->mTemplate->addVar($template_name, "ODDEVEN", "EVEN");
            } else {
               $this->mTemplate->addVar($template_name, "ODDEVEN", "ODD");
            }
         }
         $this->mTemplate->addVars($template_name, $data, $prefix);
         $this->mTemplate->parseTemplate($template_name, "a");
         $this->ClearTemplate($inner_template_name);
      }
      
      function Display()
      {
         $this->mTemplate->AddVar("document", "APPLICATION_NAME", $this->mrConfig->GetValue('app_name'));
	$this->mTemplate->AddVar("document", "APPLICATION_CLIENT", $this->mrConfig->GetValue('app_client'));         
	$this->mTemplate->addGlobalVar("CONFIG_BASEDIR", $this->mrConfig->GetValue('basedir'));
         $this->mTemplate->addGlobalVar("CONFIG_BASEADDRESS", $this->mrConfig->GetValue('baseaddress'));
         
         $this->parseLabel();
		}
		
		# fungsi untuk parsing label yang bisa disimpan di file konfigurasi
   	function parseLabel() {
   	   $msg = 'Non-existent configuration!';
   	   $config_dir = 'config/';
         
         $config_obj = new Configuration();
         $config_obj->SetConfigDir($config_dir);
         
         if (file_exists($config_dir.'language.config.php')) {
            $config_obj->Load('language.config.php');
         } else {
            die($msg);
         }
         
         $arr_cfg = $config_obj->mValue;
         
         foreach ($arr_cfg as $k => $value) {
            $this->mTemplate->addGlobalVar('LABEL_'.$k,$value);
         }
   	}
		
		function DoUpdateServiceStatus(&$serviceObj, $serviceResult, $serviceName) {
			$arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
			if (false === $serviceResult){            
				if ($serviceObj->IsError() && $serviceObj->GetProperty("FaultMessages")==""){
					$arrService[$serviceName] = false;
				} else {
					$arrService[$serviceName] = true;
				}
			} else {
				$arrService[$serviceName] = true;
			}
			$this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
			$this->mrSecurity->RefreshSessionInfo();     
		}
   }
?>
