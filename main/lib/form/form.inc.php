<?php

/**
 * Form Solution is a PHP class to simplify user interface programming
 * in PHP.
 *
 * <p>Requires PHP 4 or later.</p>
 *
 * <p>Please make a donation to support our open source development.
 * Update notifications are sent to people who make donations that exceed
 * the small registration threshold.  See the link below.</p>
 *
 * <p>For more information on using this program, read the manual on line
 * via the link below.</p>
 *
 * <p>Form Solution is a trademark of The Analysis and Solutions Company.</p>
 *
 * <pre>
 * ======================================================================
 * SIMPLE PUBLIC LICENSE                        VERSION 1.1   2003-01-21
 *
 * Copyright (c) The Analysis and Solutions Company
 * http://www.analysisandsolutions.com/
 *
 * 1.  Permission to use, copy, modify, and distribute this software and
 * its documentation, with or without modification, for any purpose and
 * without fee or royalty is hereby granted, provided that you include
 * the following on ALL copies of the software and documentation or
 * portions thereof, including modifications, that you make:
 *
 *     a.  The full text of this license in a location viewable to users
 *     of the redistributed or derivative work.
 *
 *     b.  Notice of any changes or modifications to the files,
 *     including the date changes were made.
 *
 * 2.  The name, servicemarks and trademarks of the copyright holders
 * may NOT be used in advertising or publicity pertaining to the
 * software without specific, written prior permission.
 *
 * 3.  Title to copyright in this software and any associated
 * documentation will at all times remain with copyright holders.
 *
 * 4.  THIS SOFTWARE AND DOCUMENTATION IS PROVIDED "AS IS," AND
 * COPYRIGHT HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY
 * OR FITNESS FOR ANY PARTICULAR PURPOSE OR THAT THE USE OF THE SOFTWARE
 * OR DOCUMENTATION WILL NOT INFRINGE ANY THIRD PARTY PATENTS,
 * COPYRIGHTS, TRADEMARKS OR OTHER RIGHTS.
 *
 * 5.  COPYRIGHT HOLDERS WILL NOT BE LIABLE FOR ANY DAMAGES, INCLUDING
 * BUT NOT LIMITED TO, DIRECT, INDIRECT, SPECIAL OR CONSEQUENTIAL,
 * ARISING OUT OF ANY USE OF THE SOFTWARE OR DOCUMENTATION.
 * ======================================================================
 * </pre>
 *
 * @package    FormSolution
 * @author     Daniel Convissor <danielc@AnalysisAndSolutions.com>
 * @copyright  The Analysis and Solutions Company, 2001-2003
 * @version    $Name: rel-5-5 $ $Id: form.inc,v 5.18 2005/01/11 17:14:57 danielc Exp $
 * @link       http://www.FormSolution.info/
 * @link       http://www.FormSolution.info/form-man.htm
 * @link       http://www.AnalysisAndSolutions.com/donate/
 */


/**
 * Eases user interface programming in PHP.
 *
 * <p>Sanitizes user input.  Generates XHTML compliant date, time and
 * elements. You can offer a complete email contact form to thwart
 * spammers by adding one line of code. Cleans user input, validates and
 * formats date/time and credit card number inputs.</p>
 *
 * @package    FormSolution
 * @author     Daniel Convissor <danielc@AnalysisAndSolutions.com>
 * @copyright  The Analysis and Solutions Company, 2001-2003
 * @version    $Name: rel-5-5 $
 * @link       http://www.FormSolution.info/
 */

   class FormSolution {
   
      /**
            * maximum number of characters that each user submitted field can hold.
            * @var  integer
            */
      var $Max_FS_RESERVED = '';
   
      /**
            * array with type names as keys and ereg regular expressions as values.
            * @var  array
            */
      var $Patterns_FS_RESERVED = array();
   
   
      /**
            * This constructor establishes which characters are acceptable and
            * removes all characters which are not.
            *
            * @param string|array $Keep_FS_RESERVED  There are several predefined
            *                           Keep types. In addition, you can also whip
            *                           up your own special ereg pattern for the
            *                           $Keep argument by creating an array where
            *                           the name of the pattern is the key and the
            *                           pattern is the value. Then pass that array
            *                           to the this argument. If the array you
            *                           pass has more than one element, only the
            *                           first one is used. Additional patterns can
            *                           be added later.
            * @param integer      $Max_FS_RESERVED   the maximum number of
            *                           characters a string is allowed to contain
            * @link  http://www.FormSolution.info/form-man.htm#constructor
            */
      function FormSolution($Keep_FS_RESERVED = 'Default',
                             $Max_FS_RESERVED = 200) {
   
         unset($GLOBALS['_REQUEST']);
   
         $this->Max_FS_RESERVED = $Max_FS_RESERVED;
   
         if (is_array($Keep_FS_RESERVED)) {
            list($Key, $Val) = each($Keep_FS_RESERVED);
            $this->Patterns_FS_RESERVED[$Key] = $Val;
            $Keep_FS_RESERVED = $Key;
         }
   
         $this->Patterns_FS_RESERVED['Num']           = '[^0-9]';
         $this->Patterns_FS_RESERVED['Decimal']       = '[^0-9.-]';
         $this->Patterns_FS_RESERVED['IP']            = '[^0-9.]';
         $this->Patterns_FS_RESERVED['Alpha']         = '[^A-Za-z]';
         $this->Patterns_FS_RESERVED['AlphaNum']      = '[^A-Za-z0-9]';
         $this->Patterns_FS_RESERVED['AlphaNumSpace'] = '[^A-Za-z0-9 ]';
         $this->Patterns_FS_RESERVED['AlphaNumAll']   = '[^A-Za-z0-9[:space:]]';
         $this->Patterns_FS_RESERVED['AlphaForeign']  = '[^A-Za-zÀ-ÖØ-öø-ÿ]';
         $this->Patterns_FS_RESERVED['URI']           = '[^!#-9:;=?-Z_a-z~]';
         $this->Patterns_FS_RESERVED['Email']         = '[^-!#$%&\'*+/=?^_`{|}~A-Za-z0-9.@]';
   
         $this->Patterns_FS_RESERVED['EmailMatch']           = '^[-!#$%&\'*+/=?^_`{|}~a-z0-9]+'
                                                               . '(.[-!#$%&\'*+/=?^_`{|}~a-z0-9]+)*'
                                                               . '@([a-z0-9-]+\.)+([a-z]{2,6})$';
         $this->Patterns_FS_RESERVED['EmailForm']            = '[^!#-9:;=?-Z_a-z~"[:space:]]';
         $this->Patterns_FS_RESERVED['AlphaForeignNum']      = '[^A-Za-zÀ-ÖØ-öø-ÿ0-9]';
         $this->Patterns_FS_RESERVED['AlphaForeignNumSpace'] = '[^A-Za-zÀ-ÖØ-öø-ÿ0-9 ]';
         $this->Patterns_FS_RESERVED['AlphaForeignNumAll']   = '[^A-Za-zÀ-ÖØ-öø-ÿ0-9[:space:]]';
         $this->Patterns_FS_RESERVED['Default']              = '[^A-Za-zÀ-ÖØ-öø-ÿ0-9 +./:=@_~-]';
   
   
         if (!empty($_GET)) {
            $Source =& $_GET;
            unset($GLOBALS['HTTP_GET_VARS']);
         } elseif (!empty($GLOBALS['HTTP_GET_VARS'])) {
            $Source =& $GLOBALS['HTTP_GET_VARS'];
         } else {
            $Source = array();
         }
   
         foreach ($Source as $Name => $Val) {
            if (is_array($Val)) {
               foreach ($Val as $Key1 => $Val1) {
                  if (is_array($Val1)) {
                     foreach ($Val1 as $Key2 => $Val2) {
                        // debug tool -> //  echo "<br />GET: Two Dimensional Array (Name: $Name. &nbsp; key1: $Key1 &nbsp; key2: $Key2) = " . $this->StripBadCharacters($Val2, $Keep_FS_RESERVED, $Max_FS_RESERVED);
                        $Temp[$Key1][$Key2] = $this->StripBadCharacters($Val2, $Keep_FS_RESERVED,
                                                                        $Max_FS_RESERVED);
                     }# End of FOREACH value 1
   
                  } else {
                     // debug tool -> //  echo "<br />GET: One Dimensional Array (Name: $Name. &nbsp; key: $Key1) = ". $this->StripBadCharacters($Val1, $Keep_FS_RESERVED, $Max_FS_RESERVED);
                     $Temp[$Key1] = $this->StripBadCharacters($Val1, $Keep_FS_RESERVED, $Max_FS_RESERVED);
   
                  }# End of IF value 1 is_array.
   
               }# End of FOREACH val.
   
               $this->$Name = $Temp;
               unset($Temp);
   
            } else {
               $this->$Name = $this->StripBadCharacters($Val, $Keep_FS_RESERVED, $Max_FS_RESERVED);
               // debug tool -> //  echo "<br />GET: $Name = " . $this->$Name;
            }# End of IF val is_array.
   
            switch ($Name) {
               case 'Keep_FS_RESERVED':
               case 'Max_FS_RESERVED':
               case 'Patterns_FS_RESERVED':
                  /* ================HACKED=========================
                                    echo '<h2 align="center">You submitted a variable ';
                                    echo "called &quot;$Name&quot;.<br />That's a ";
                                    echo "reserved name.</h2>\n";
                                    ==================================================*/
                  $msg = '<h2 align="center">You submitted a variable ';
                  $msg .= "called &quot;$Name&quot;.<br />That's a ";
                  $msg .= "reserved name.</h2>\n";
                  die($msg);
                  exit();                                    
                  break;
   
               default:
                  unset($GLOBALS[$Name]);
            }
   
   
         }# End of FOREACH get vars.
   
         unset($GLOBALS['_GET']);
         unset($GLOBALS['HTTP_GET_VARS']);
   
   
         if (!empty($_POST)) {
            $Source =& $_POST;
            unset($GLOBALS['HTTP_POST_VARS']);
         } elseif (!empty($GLOBALS['HTTP_POST_VARS'])) {
            $Source =& $GLOBALS['HTTP_POST_VARS'];
         } else {
            $Source = array();
         }
   
         foreach ($Source as $Name => $Val) {
            if (is_array($Val)) {
               foreach ($Val as $Key1 => $Val1) {
                  if (is_array($Val1)) {
                     foreach ($Val1 as $Key2 => $Val2) {
                        // debug tool -> //  echo "<br />Post Two Dimensional Array (Name: $Name. &nbsp; key1: $Key1 &nbsp; key2: $Key2) = " . $this->StripBadCharacters($Val2, $Keep_FS_RESERVED, $Max_FS_RESERVED);
                        $Temp[$Key1][$Key2] = $this->StripBadCharacters($Val2, $Keep_FS_RESERVED,
                                                                        $Max_FS_RESERVED);
                     }# End of WHILE value 1
   
                  } else {
                     // debug tool -> //  echo "<br />Post One Dimensional Array (Name: $Name. &nbsp; key: $Key1) = ". $this->StripBadCharacters($Val1, $Keep_FS_RESERVED, $Max_FS_RESERVED);
                     $Temp[$Key1] = $this->StripBadCharacters($Val1, $Keep_FS_RESERVED, $Max_FS_RESERVED);
   
                  }# End of IF value 1 is_array.
   
               }# End of FOREACH val.
   
               $this->$Name = $Temp;
               unset($Temp);
   
            } else {
               // debug tool -> //  echo "<br />Post: $Name = " . $this->$Name;
               $this->$Name = $this->StripBadCharacters($Val, $Keep_FS_RESERVED, $Max_FS_RESERVED);
   
            }# End of IF val is_array.
   
            switch ($Name) {
               case 'Keep_FS_RESERVED':
               case 'Max_FS_RESERVED':
               case 'Patterns_FS_RESERVED':
                  echo '<h2 align="center">You submitted a variable ';
                  echo "called &quot;$Name&quot;.<br />That's a ";
                  echo "reserved name.</h2>\n";
                  exit();
                  break;
   
               default:
                  unset($GLOBALS[$Name]);
            }
   
         }# End of FOREACH post vars.
   
         unset($GLOBALS['_POST']);
         unset($GLOBALS['HTTP_POST_VARS']);
      }
   
      /**
            * @link  http://www.FormSolution.info/form-man.htm#StripBadCharacters
            */
      function StripBadCharacters($Input, $Keep = 'Default', $Max = 200) {
         if (is_array($Input)) {
            return '';
         }
   
         if (empty($this->Patterns_FS_RESERVED[$Keep])) {
            $Keep = 'Default';
            if (empty($this->Patterns_FS_RESERVED[$Keep])) {
               $this->Patterns_FS_RESERVED[$Keep] = '[^A-Za-zÀ-ÖØ-öø-ÿ0-9 +./:=@_~-]';
            }
         }
   
         return substr(ereg_replace($this->Patterns_FS_RESERVED[$Keep],'', $Input),0, $Max);
      }
   
      /**
            * @link  http://www.FormSolution.info/form-man.htm#DateTimeOptionList
            */
      function DateTimeOptionList($Period, $Default = 'C', $Name = '',
                                  $Zero = 'N', $Size = 0, $Multiple = 'N',
                                  $Begin = '', $Years = 5, $Class = '',
                                  $ID = '') {
   
         $SpFormat = '%02d';
         $FirstItem = '';
   
         switch ($Period) {
            case 'year':
               if (!ereg('^[0-9]{4}$', $Begin)) {
                  $Begin = date('Y') - 2;
               }
               if (!ereg('^[0-9]{1,3}$', $Years)) {
                  $Years = 5;
               }
               $End = $Begin + $Years - 1;
               if ($End > 9999) {
                  $End = 9999;
               }
               $DtFormat = 'Y';
               $SpFormat = '%04d';
               break;
            case 'month':
               $Begin = 1;
               $End = 12;
               $DtFormat = 'm';
               break;
            case 'day':
               $Begin = 1;
               $End = 31;
               $DtFormat = 'd';
               break;
            case 'hour':
               $Begin = 0;
               $End = 23;
               $DtFormat = 'H';
               break;
            case 'minute':
               $Begin = 0;
               $End = 59;
               $DtFormat = 'i';
               break;
            default:    # 'second' and all else
               $Period = 'second';
               $Begin = 0;
               $End = 59;
               $DtFormat = 's';
         }
   
         if ($Name == '' or !is_string($Name)) {
            $Name = $Period;
         }
   
   
         if (is_array($Default)) {
            $Temp = $Default;
            $Default = array();
            $Expr = '^(()|[0-9]{' . strlen($End) . '})$';
            foreach ($Temp as $Val) {
               if (ereg($Expr, $Val)) {
                  $Default[] = $Val;
               }
            }
            unset($Temp);
            asort($Default);
         } else {
            if ($Default == 'C') {
               $Default = date($DtFormat);
   
            } else {
               if (!is_string($Default)) {
                  $Default = '';
               }
               switch ($Period) {
                  case 'month':
                  case 'day':
                  case 'year':
                     $Expr = '^[0-9]{' . strlen($End) . '}$';
                     if (ereg('^0{1,4}$', $Default)) {
                        switch ($Zero) {
                           case 'B':
                           case 'Y':
                              $Default = sprintf($SpFormat, 0);
                              break;
                           case 'E':
                              $Default = '';
                              break;
                           default:
                              #  'N' and errors
                              $Default = date($DtFormat);
                        }
                     } elseif (ereg($Expr, $Default)) {
                        $Default = sprintf($SpFormat, $Default);
                     } else {
                        switch ($Zero) {
                           case 'B':
                           case 'E':
                              $Default = '';
                              break;
                           default:
                              #  'Y', 'N' and errors
                              $Default = date($DtFormat);
                        }
                     }
                     break;
   
                     default:
                        #  'hour', 'minute', 'second' and errors
                        if (!ereg('^[0-9]{2}$', $Default)) {
                           switch ($Zero) {
                              case 'E':
                              case 'B':
                                 $Default = '';
                                 break;
   
                              default:
                                 #  'Y', 'N' and errors
                                 $Default = date($DtFormat);
                           }
                        }
   
               } #  End of switch period.
   
            } #  End of if !string or C
   
            if ($Period == 'year'  AND  $Default != '' AND  $Default != '0000') {

               if ($Default < $Begin) {
                  $Begin = $Default - 2;
                  $Years = $End - $Begin;
               } elseif ($Default > $End) {
                  $End = $Default + 2;
                  $Years = $End - $Begin;
               }
            }

            $Default = array($Default);
   
         } #  End of if is_array.
   
   
         switch ($Zero) {
            case 'E':
               $FirstItem .= ' <option value=""';
               if (current($Default) == '') {
                  $FirstItem .= ' selected="selected"';
                  next($Default);
               }
               $FirstItem .= "></option>\n";
               break;
   
            case 'B':
               $FirstItem .= ' <option value=""';
               if (current($Default) == '') {
                  $FirstItem .= ' selected="selected"';
                  next($Default);
               }
               $FirstItem .= "></option>\n";
   
            case 'Y':
               if ($Period == 'year') {
                  $FirstItem .= ' <option value="0000"';
                  if (current($Default) == '0000') {
                     $FirstItem .= ' selected="selected"';
                     next($Default);
                  }
                  $FirstItem .= ">0000</option>\n";
               } else {
                  $Begin = 0;
               }
   
         }
   
         if ($Multiple == 'Y') {
            $BrackTxt = '[]';
            $MultTxt = ' multiple';
         } else {
            $Default = array( current($Default) );
            $BrackTxt = '';
            $MultTxt = '';
         }
   
         if ($Size != '') {
            $SizTxt = " size=\"$Size\"";
         } else {
            $SizTxt = '';
         }
   
         if ($Class != '') {
            $Class = " class=\"$Class\"";
         }
   
         if ($ID != '') {
            $ID = " id=\"$ID\"";
         }
         
         /* =============HACKED================================================
                  echo "\n\n<select$SizTxt$MultTxt$Class$ID ";
                  echo "name=\"{$Name}{$BrackTxt}\">\n$FirstItem";
   
                 for ( $Counter = $Begin; $Counter <= $End; $Counter++) {
                     $TempC = sprintf($SpFormat, $Counter);
                     echo " <option value=\"$TempC\"";
                     if ($TempC == current($Default)) {
                         echo ' selected="selected"';
                         next($Default);
                     }
                     echo ">$Counter</option>\n";
                 }
            
                 echo "</select>\n\n";
                 ========================================================================= */
         $result = "\n\n<select$SizTxt$MultTxt$Class$ID ";
         $result .= "name=\"{$Name}{$BrackTxt}\">\n$FirstItem";
   
         for ( $Counter = $Begin; $Counter <= $End; $Counter++) {
            $TempC = sprintf($SpFormat, $Counter);
            $result .= " <option value=\"$TempC\"";
            if ($TempC == current($Default)) {
               $result .= ' selected="selected"';
               next($Default);
            }
            $result .= ">$Counter</option>\n";
         }
   
         $result .= "</select>\n\n";
         return $result;
      }
   
      /**
            * @link  http://www.FormSolution.info/form-man.htm#DateValidateAndFormat
            */
      function DateValidateAndFormat($Year, $Month, $Day, $ObjVarTo = 'Date',
                                      $Format = 'Y-m-d', $Zero = 'N') {
   
         if ($Zero=='Y' AND $Year==0 AND $Month==0 AND $Day==0) {
            # This is not a problem.  No date entered.
            $this->$ObjVarTo = ereg_replace('[0-9]', '0', date($Format, 0) );
            return 1;
   
         } else {
            if (!checkdate($Month, $Day, $Year)  OR  $Year < '1970') {
               $this->$ObjVarTo = '';
               return 0;
            } else {
               # Date was entered and is valid, so format it.
               $this->$ObjVarTo = date( $Format, mktime(1, 1, 1, $Month, $Day, $Year) );
                   return 1;
            }
         }
      }
   
      /**
            * @link  http://www.FormSolution.info/form-man.htm#TimeValidateAndFormat
            */
      function TimeValidateAndFormat($Hour, $Minute, $Second,
                                      $ObjVarTo = 'Time', $Format = 'H:i:s') {
   
         $Hour = ereg_replace('[^0-9]', '', $Hour);
         if ($Hour > 23 OR $Hour < 0) {
            $this->$ObjVarTo = '';
            return 0;
         }
   
         $Minute = ereg_replace('[^0-9]', '', $Minute);
         if ($Minute > 59 OR $Minute < 0) {
            $this->$ObjVarTo = '';
            return 0;
         }
   
         $Second = ereg_replace('[^0-9]', '', $Second);
         if ($Second > 59 OR $Second < 0) {
            $this->$ObjVarTo = '';
            return 0;
         }
   
         $this->$ObjVarTo = date( $Format, mktime($Hour, $Minute, $Second, 1, 1, 2000) );
   
         return 1;
      }
   
      /**
            * @link  http://www.FormSolution.info/form-man.htm#CopyObjectContentsIntoForm
            */
      function CopyObjectContentsIntoForm($From) {
   
         global $$From;
   
         if (!is_object($$From)) {
            echo "\n<br /><code>$From</code> is not an object.\n";
            return 0;
        }
   
         reset($$From);
         foreach ($$From as $Name => $Val) {
            $this->$Name = $Val;
         }
      }
   
      /**
            * @link  http://www.FormSolution.info/form-man.htm#EmailForm
            */
      function EmailForm($To, $Opt = '') {
   
         $Vars = array('Submit', 'Name', 'Email', 'Subject', 'Message');
         foreach ($Vars as $Var) {
            if (!isset($this->$Var)) {
               $this->$Var = '';
            } else {
               $this->$Var = eregi_replace('&quot;', '"', $this->$Var);
               $this->$Var = eregi_replace('&amp;', '&', $this->$Var);
            }
         }
   
         if (is_array($Opt)) {
            foreach ($Opt as $Key => $Val) {
               $Opt[$Key] = htmlspecialchars($Val);
            }
         } else {
            $Opt = array();
         }
   
         $Classp = '';
         if (isset($Opt['classp'])) {
            $Classp .= " class=\"" . $Opt['classp'] . "\"";
         }
         if (isset($Opt['idp'])) {
            $Classp .= " id=\"" . $Opt['idp'] . "\"";
         }
   
         if (!empty($this->Submit)) {
   
            if (!eregi($this->Patterns_FS_RESERVED['EmailMatch'],
               $this->Email)) {
               $Prob[] = 'The Email address does not conform to RFC 2822';
            }
            if (strlen($this->Email) > 255) {
               $Prob[] = 'The Email address was too long';
            }
   
            if (eregi("[^a-z .'-]", $this->Name)) {
               $Prob[] = 'The Name Field can only have letters, spaces, '
                         . 'periods, hyphens and \' in it';
               $this->Name = eregi_replace("[^a-z .'-]", '', $this->Name);
            }
            if ($this->Name == '') {
               $Prob[] = 'The Name Field is blank';
            }
            if (strlen($this->Name) > 255) {
               $Prob[] = 'The Name Field was too long';
            }
   
            if (eregi("[^a-z0-9 .,'-]", $this->Subject)) {
               $Prob[] = 'The Subject Field can only have letters, numbers, '
                         . 'spaces, periods, commas, hyphens and \' in it';
               $this->Subject = eregi_replace(
                                 "[^a-z0-9 .,'-]", '', $this->Subject);
            }
            if ($this->Subject == '') {
               $Prob[] = 'The Subject Field is blank';
            }
            if (strlen($this->Subject) > 255) {
               $Prob[] = 'The Subject Field was too long';
            }
   
            if (ereg('[<>]', $this->Message)) {
               $Prob[] = 'The Message Field had &lt; and/or &gt; symbols in it';
               $this->Message = ereg_replace('[<>]', '', $this->Message);
            }
            if ($this->Message == '') {
               $Prob[] = 'The Message Field is blank';
            }
            if (strlen($this->Message) >= $this->Max_FS_RESERVED) {
               $Prob[] = 'The Message Field was too long. We truncated it';
            }
   
            if (phpversion() > '4.0.1') {
               $this->Message = wordwrap($this->Message, 70, "\n");
            }
            $this->Message = trim($this->Message);
   
            if (isset($Prob)) {
               echo "<h2$Classp align=\"center\">There are some problems ";
               echo 'with the message you tried to send.<br />Please fix ';
               echo "them and try again.</h2><ul$Classp>";
               foreach ($Prob as $Val) {
                  echo "<li$Classp>$Val.</li>\n";
               }
               echo '</ul>';
   
            } elseif ($this->Submit == 'Send') {
               if (@mail($To, $this->Subject, $this->Message,
                     "From: $this->Name <$this->Email>\nReply-To: "
                     . "$this->Name <$this->Email>\nX-Loop: $To")) {
                  echo "<h2$Classp align=\"center\">Your message was sent.";
                  echo '<br />Thank you.</h2>';
               } else {
                  echo "<h2$Classp align=\"center\">Sorry. The server had ";
                  echo 'a problem sending your message.<br />';
                  echo 'Please try again later.</h2>';
                  $Prob = '';
               }
            }
         }
   
   
         reset($Vars);
         foreach ($Vars as $Var) {
            $this->$Var = htmlspecialchars($this->$Var);
         }
   
         #  ------  PREVIEW  ------
         if ($this->Submit == 'Preview'
                   OR  ($this->Submit == 'Send' AND !isset($Prob))) {
   
            echo "<table$Classp";
   
            if (isset($Opt['borderp'])) {
               echo ' border="' . $Opt['borderp'] . '"';
            } else {
               echo ' border="1"';
            }
   
            if (isset($Opt['cellpaddingp'])) {
               echo ' cellpadding="' . $Opt['cellpaddingp'] . '"';
            }
   
            if (isset($Opt['cellspacingp'])) {
               echo ' cellspacing="' . $Opt['cellspacingp'] . '"';
            }
   
            if (isset($Opt['alignp'])) {
               echo ' align="' . $Opt['alignp'] . '"';
            }
   
            if (isset($Opt['widthp'])) {
               echo ' width="' . $Opt['widthp'] . '"';
            }
   
            if (isset($Opt['summaryp'])) {
               echo ' summary="' . $Opt['summaryp'] . '"';
            }
   
            echo ">\n";
   
            if (isset($Opt['captionp'])) {
               echo '  <caption';
               if (isset($Opt['captionalignp'])) {
                  echo ' align="' . $Opt['captionalignp'] . '"';
               }
               echo "$Classp>" . $Opt['captionp'] . "</caption>\n";
            }
   
            echo "  <tr$Classp><td$Classp>Your&nbsp;Name:</td>";
            echo "<td$Classp>$this->Name</td></tr>\n";
            echo "  <tr$Classp><td$Classp>Your&nbsp;Email&nbsp;Address:</td>";
            echo "<td$Classp>$this->Email</td></tr>\n";
            echo "  <tr$Classp><td$Classp>Subject:</td>";
            echo "<td$Classp>$this->Subject</td></tr>\n";
            echo "  <tr$Classp><td$Classp valign=\"top\">Message:</td>";
            echo "<td$Classp><pre$Classp>$this->Message</pre></td></tr>\n";
            echo "  <tr$Classp><td$Classp>Time&nbsp;Sent:</td>";
            echo "<td$Classp>";
            echo date('Y-m-d g:i a') . ' ' . strftime('%Z');
            echo "</td></tr>\n";
            echo " </table>\n";
   
         }#  End of if Preview
   
   
         #  ------  FORM  ------
         if ($this->Submit != 'Send' OR isset($Prob)) {
   
            if (!isset($Opt['size'])) {
               $Opt['size'] = '40';
            }
   
            if (!isset($Opt['max'])) {
               $Opt['max'] = '40';
            }
   
            if (!isset($Opt['rows'])) {
               $Opt['rows'] = '8';
            }
   
            echo '<form method="post"';
   
            $Classf = '';
            if (isset($Opt['classf'])) {
               $Classf .= " class=\"" . $Opt['classf'] . "\"";
            }
            if (isset($Opt['idf'])) {
               $Classf .= " id=\"" . $Opt['idf'] . "\"";
            }
   
            echo "$Classf>\n <table$Classf";
   
            if (isset($Opt['borderf'])) {
               echo ' border="' . $Opt['borderf'] . '"';
            } else {
               echo ' border="0"';
            }
   
            if (isset($Opt['cellpaddingf'])) {
               echo ' cellpadding="' . $Opt['cellpaddingf'] . '"';
            }
   
            if (isset($Opt['cellspacingf'])) {
               echo ' cellspacing="' . $Opt['cellspacingf'] . '"';
            }
   
            if (isset($Opt['alignf'])) {
               echo ' align="' . $Opt['alignf'] . '"';
            }
   
            if (isset($Opt['widthf'])) {
               echo ' width="' . $Opt['widthf'] . '"';
            }
   
            if (isset($Opt['summaryf'])) {
               echo ' summary="' . $Opt['summaryf'] . '"';
            }
   
            echo ">\n";
   
            if (isset($Opt['captionf'])) {
               echo '  <caption';
               if (isset($Opt['captionalignf'])) {
                  echo ' align="' . $Opt['captionalignf'] . '"';
               }
               echo "$Classf>" . $Opt['captionf'] . "</caption>\n";
            }
   
            echo "  <tr$Classf><td$Classf><u>Y</u>our&nbsp;Name:</td>";
            echo "<td$Classf><input$Classf type=\"text\" accesskey=\"y\" ";
            echo 'size="' . $Opt['size'] . '" maxlength="' . $Opt['max'];
            echo "\" name=\"Name\" value=\"$this->Name\" /></td></tr>\n";
            echo "  <tr$Classf><td$Classf>Your&nbsp;Email&nbsp;Address:</td>";
            echo "<td$Classf><input$Classf type=\"text\" size=\"";
            echo $Opt['size'] . '" maxlength="100" name="Email"';
            echo "value=\"$this->Email\" /></td></tr>\n";
            echo "  <tr$Classf><td$Classf>Subject:</td>";
            echo "<td$Classf><input$Classf type=\"text\" size=\"";
            echo $Opt['size'] . '" maxlength="' . $Opt['max'];
            echo "\" name=\"Subject\" value=\"$this->Subject\" /></td></tr>\n";
            echo "  <tr$Classf><td$Classf valign=\"top\">Message:";
            echo "<br$Classf /><small$Classf>($this->Max_FS_RESERVED";
            echo '&nbsp;chars.&nbsp;max.)</small></td>';
            echo "<td$Classf><textarea$Classf name=\"Message\" cols=\"";
            echo $Opt['size'] . '" rows="' . $Opt['rows'];
            echo "\" maxlength=\"$this->Max_FS_RESERVED\">$this->Message";
            echo "</textarea></td></tr>\n";
            echo "  <tr$Classf><td$Classf>&nbsp;</td><td$Classf>\n";
            echo "    <input$Classf type=\"submit\" name=\"Submit\"";
            echo "value=\"Send\" />\n";
            echo "    <input$Classf type=\"submit\" name=\"Submit\"";
            echo "value=\"Preview\" />\n";
            echo "  </td></tr>\n";
            echo " </table>\n";
            echo "</form>\n\n";
   
         }#  End of if form
      }
   }
?>