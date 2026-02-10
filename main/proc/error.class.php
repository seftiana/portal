<?php
	class Error {
		var $mrConfig;
		var $mDbConnection;
		var $mTemplate;
		var $mErrorMessages;
		
		function Error($configObject){
			$this->mErrorMessages['msg'] = array();
			$this->mrConfig = &$configObject;
			$this->mTemplate = new patTemplate();
			$this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'main/templates/');
		}
		function DisplayError($message, $redirectTo){
			$this->mTemplate->readTemplatesFromFile('error-prompt.html');
			$this->mTemplate->AddVar("error_prompt", "ERR_POP", "<script>alert('". $message ."')</script>");
			$this->mTemplate->AddVar("error_prompt", "ERR_GOTO", "<meta http-equiv='refresh' content='0;URL=". $redirectTo ."'>");
			$this->mTemplate->displayParsedTemplate();
		}
		/*
		function PushMessage($message){
			array_push($this->mErrorMessages['msg'], $message);
		}
		function DisplayErrorToForm(){
			$this->mTemplate->setBasedir($this->mrConfig->GetValue('docroot') . 'main/templates/');
			$this->mTemplate->readTemplatesFromFile('error-to-form.html');
			//Tampilkan Message nya
			if (is_array($this->mErrorMessages['msg'])) {
				foreach($this->mErrorMessages['msg'] as $msg){
					$this->mTemplate->addVar('error_item', 'ERR_MSG', $msg);
					$this->mTemplate->parseTemplate('error_item', "a");
				}
			}
			$this->mTemplate->displayParsedTemplate();
		}
		*/
	}
?>