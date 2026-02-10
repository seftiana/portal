<?php

/**
 * function untuk pengecekan field apakah sudah diisi atau belum
 */
function checkRequired($ele, $msg="") {
  global $warning;
  
  if (empty($ele) || $ele == 'null') {
    if (trim($warning) != "") 
      $warning .= "<br />";
    $warning .= "&bull; " . $msg;
    return false;
  } else
    return $ele;
}  

/**
 * function untuk formating ip
 */
function IpFormat(& $field) {
  $field = number_format($field, 2);
}  

/**
 * function untuk menamilkan warning messages
 */
function displayWarning($msg) {
   global $page;

   if (trim($msg) != '') {
      $page->tmpl->addVar('display_warning', 'WARNING_MSG', $msg);
   }
}

/**
 * function untuk menamilkan warning messages
 */
/*function displayTandaTangan($dokumen, $dokumenType) {
   global $page, $sql, $qw;

   $resTtd = $qw->sqlExecute($sql['display_tanda_tangan'], array($dokumen, $dokumenType));
   foreach ($resTtd as $ttd) {
      $page->tmpl->addVars('tanda_tangan', $ttd);
      $page->tmpl->parseTemplate('tanda_tangan', "a");
   }
}*/

/**
 * @desc fungsi untuk menamilkan form select
 */
function showSelect($tmpl, $resData, $sel = '') {
   global $page;

   if ('' == trim($sel)) {
      $selected = 'selected="selected"';
   } else {
      $selected = '';
   }
   $page->tmpl->clearTemplate($tmpl);
   $page->tmpl->addVars($tmpl, array('IS_SELECT' => $selected));
   $page->tmpl->parseTemplate($tmpl, 'a');
   
   foreach ($resData as $data) {
      if ($sel == $data['VALUE']) {
         $data['IS_SELECT'] = 'selected="selected"';
      } else {
         $data['IS_SELECT'] = '';
      }
      $data['VALUE'] = EncryptLink($data['VALUE']);
      $page->tmpl->addVars($tmpl, $data);
      $page->tmpl->parseTemplate($tmpl, 'a');
   }
}

/**
 * function untuk menambahkan petik pada string
 */
if(!defined('SINGLE_QUOTED')){
	define('SINGLE_QUOTED', 0);
	define('DOUBLE_QUOTED', 1);
	define('NONE', 3);
}

function quotedStr($str, $quoted = SINGLE_QUOTED) {

   if ($quoted == SINGLE_QUOTED) {
      return "'" . trim($str) . "'";
   } else if ($quoted == DOUBLE_QUOTED) {
      return '"' . trim($str) . '"';
   }
}

/**
 * function untuk mengecek nilai NULL
 */

function checkNull($str, $quoted = SINGLE_QUOTED) {
    
   if (trim($str) == "")
      return "NULL";
   else {
      if ($quoted == SINGLE_QUOTED)
         return quotedStr($str, SINGLE_QUOTED);
      else if ($quoted == DOUBLE_QUOTED)
         return quotedStr($str, DOUBLE_QUOTED);
      else if ($quoted == NONE)
         return $str;
   }
}


/**
 * function untuk conversi nama bulan ke dalam format indonesia
 * format tanggal: Location, dd mmmm yyyy ato dd mmmm yyyy
 * format input $tgl: "Y-m-d"
 */
function displayTanggal($tgl="now" , $showLocation="true", $location="default"){	
	global $config_obj;
	global $page;

	if ($tgl == "now"){
	  $tgl = date("Y-m-d");
	}
	$arrayBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei',
						'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
						'Nopember', 'Desember');
	$arrayTgl = explode('-', $tgl);
	if(!isset($arrayTgl[0]))$arrayTgl[0] = 0;
	if(!isset($arrayTgl[1]))$arrayTgl[1] = 0;
	if(!isset($arrayTgl[2]))$arrayTgl[2] = 0;
	$setTanggal = isset($arrayTgl[2])?$arrayTgl[2]:0;
	if ($showLocation=='true'){
		/*
		 * bug $cfg['location'] di salah satu modul bs tampil, 
		 * tp di modul yg laen g bs:(
		 * bug fixed :)
		*/
		if ($location == "default"){
		   $tanggal = $config_obj->GetValue('location') . ', ' . $setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];
		}else 
		   $tanggal = $location.', '.$setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];
	}else{
		$tanggal = $setTanggal . ' '  . $arrayBulan[(int)$arrayTgl[1]] . ' ' . $arrayTgl[0];	
	}	
	//echo $tanggal;
	return $tanggal;
}

function displayTanggalShort($tgl="now" , $showLocation="true", $location="default"){	
	global $config_obj;
	global $page;

	if ($tgl == "now"){
	  $tgl = date("Y-m-d");
	}
	$arrayBulan = array("01" => "01", "02" => "02", "03" => "03", "04" => "04", "05" => "05",
						"06" => "06", "07" => "07", "08" => "08", "09" => "09", "10" => "10",
						"11" => "11", "12" => "12");
	$arrayTgl = explode("-", $tgl);
	$setTanggal = $arrayTgl[2] + 0;
	if ($showLocation=="true"){
		/*
		 * bug $cfg['location'] di salah satu modul bs tampil, 
		 * tp di modul yg laen g bs:(
		 * bug fixed :)
		*/
		if ($location == "default"){
		   $tanggal = $config_obj->GetValue('location') . ', ' . $setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
		}else 
		   $tanggal = $location.', '.$setTanggal . ' '  . $arrayBulan[$arrayTgl[1]] . ' ' . $arrayTgl[0];
	}else{
		$tanggal = $setTanggal . '/'  . $arrayBulan[$arrayTgl[1]] . '/' . $arrayTgl[0];	
	}	
	//echo $tanggal;
	return $tanggal;
}

						
function displayTanggalEng($tgl="now" , $showLocation="true", $location="default"){	
	global $config_obj;
	global $page;

	if ($tgl == "now"){
	  $tgl = date("Y-m-d");
	}
	$arrayBulan = array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May",
						"06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October",
						"11" => "November", "12" => "December");
	$arrayTgl = explode("-", $tgl);
	$setTanggal = $arrayTgl[2] + 0;
	//print_r($arrayTgl);
	if ($showLocation=="true"){
		if ($location == "default"){
		   $tanggal = $config_obj->GetValue('location') . ', ' . $arrayBulan[$arrayTgl[1]] . ' '  . $setTanggal . ', ' . $arrayTgl[0];
		}else 
		   $tanggal = $location.', '. $arrayBulan[$arrayTgl[1]] . ' '  . $setTanggal . ', ' . $arrayTgl[0];
	}else{
		$tanggal = $arrayBulan[$arrayTgl[1]] . ' '  . $setTanggal . ', ' . $arrayTgl[0];	
	}	
	return $tanggal;
}

/**
 * @return bool
 * @param string $in
 * @param string $out
 * @param string $param = "1"
 * @desc compressing the file with the zlib-extension
*/

function gzip ($in, $out, $param="1") {
   if (!file_exists ($in) || !is_readable ($in))
      return false;
   if ((!file_exists ($out) && !is_writable (dirname ($out)) || (file_exists($out) && !is_writable($out)) ))
      return false;

   $in_file = fopen ($in, "rb");
   if (!$out_file = gzopen ($out, "wb".$param)) {
      return false;
   }

   while (!feof ($in_file)) {
      $buffer = fgets ($in_file, 4096);
      gzwrite ($out_file, $buffer, 4096);
   }

   fclose ($in_file);
   gzclose ($out_file);

   return true;
}

/**
 * @return bool
 * @param string $in
 * @param string $out
 * @desc uncompressing the file with the zlib-extension
*/

function ungzip ($in, $out) {
   //echo $files;
   if (!file_exists ($in) || !is_readable ($in)) {
      //echo 'asdasd';exit;
      return false;
   }
   if ((!file_exists ($out) && !is_writable (dirname ($out)) || (file_exists($out) && !is_writable($out)) )) {
      //echo 'klkl';exit;
      return false;
   }
   //echo 'klkl';exit;*/
   //echo $in." - ".$out;
   $in_file = gzopen ($in, "rb");
   $out_file = fopen ($out, "wb");

   while (!gzeof ($in_file)) {
      $buffer = gzread ($in_file, 4096);
      fwrite ($out_file, $buffer, 4096);
   }

   gzclose ($in_file);
   fclose ($out_file);
   //echo 'sorry';exit;
   return true;
}

function download($url,$fileName) {
   // INIT CURL
   $ch = curl_init();

   //no printing data 
   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

   // SET FILE TO DOWNLOAD
   curl_setopt($ch, CURLOPT_URL, $url.$fileName); //$fileName = url + full path
//echo $url.$fileName;
   // EXECUTE 2nd REQUEST (FILE DOWNLOAD)
   $content = curl_exec ($ch);

   // CLOSE CURL
   curl_close ($ch);

   //save to file
   $f = fopen("tmp/".$fileName,"w");
   fputs($f,$content);
   fclose($f);
}

function Upload($source) {
   $lastName = $source[name];
   $basedir="";

   if (!file_exists($basedir."gzip/")) {
      mkdir($basedir."gzip/",0777);
   }

   if (file_exists($basedir."gzip/".$lastName)) {
      unlink($basedir."gzip/".$lastName);
   }
   if (move_uploaded_file($source[tmp_name],$basedir."gzip/".$lastName)) {
      gzip($basedir."gzip/".$lastName,$basedir."gzip/".$lastName.".tgz",5);
      return true;
   } else
      return false;
}


function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }
        return $temp;
}

function tkoma($x) {
	$x = stristr($x, '.');
	
	$angka = array("nol", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan");
	
	$temp	= "";
	$pjg	= strlen($x);
	$pos	= 1;
	
	while($pos < $pjg){
		$char	= substr($x, $pos,1);
		$pos++;
		$temp	.= " ".$angka[$char];
	}
	return $temp;
}

function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $poin = trim(tkoma($x));
		$hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
			if($poin){
				$hasil = strtoupper($hasil).' KOMA '.strtoupper($poin);
			}else{
				$hasil = strtoupper($hasil);
			}
            break;
        case 2:
            if($poin){
				$hasil = strtolower($hasil).' koma '.strtolower($poin);
			}else{
				$hasil = strtolower($hasil);
			}
            break;
        case 3:
            if($poin){
				$hasil = ucwords($hasil).' Koma '.ucwords($poin);
			}else{
				$hasil = ucwords($hasil);
			}
            break;
        default:
            if($poin){
				$hasil = ucfirst($hasil).' koma '.$poin;
			}else{
				$hasil = ucfirst($hasil);
			}
            break;
    }
    return $hasil;
}

function kekataEng($x) {
    $x = abs($x);
    $angka = array("", "one", "two", "three", "four", "five",
    "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen");
    $temp = "";
    if ($x <14) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " teen";
    } else if ($x <100) {
        $temp = kekata($x/10)." ty". kekata($x % 10);
    } else if ($x <200) {
        $temp = " hundred" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " hundred" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " thousand" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " thousand" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " million" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " billion" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trillion" . kekata(fmod($x,1000000000000));
    }
        return $temp;
}

function tkomaEng($x) {
	$x = stristr($x, '.');
	
	 $angka = array("zero", "one", "two", "three", "four", "five",
    "six", "seven", "eight", "nine");
	
	$temp	= "";
	$pjg	= strlen($x);
	$pos	= 1;
	
	while($pos < $pjg){
		$char	= substr($x, $pos,1);
		$pos++;
		$temp	.= " ".$angka[$char];
	}
	return $temp;
}

function terbilangEng($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekataEng($x));
    } else {
        $poin = trim(tkomaEng($x));
		$hasil = trim(kekataEng($x));
    }
    switch ($style) {
        case 1:
			if($poin){
				$hasil = strtoupper($hasil).' POINT '.strtoupper($poin);
			}else{
				$hasil = strtoupper($hasil);
			}
            break;
        case 2:
            if($poin){
				$hasil = strtolower($hasil).' point '.strtolower($poin);
			}else{
				$hasil = strtolower($hasil);
			}
            break;
        case 3:
            if($poin){
				$hasil = ucwords($hasil).' Point '.ucwords($poin);
			}else{
				$hasil = ucwords($hasil);
			}
            break;
        default:
            if($poin){
				$hasil = ucfirst($hasil).' point '.$poin;
			}else{
				$hasil = ucfirst($hasil);
			}
            break;
    }
    return $hasil;
}

?>
