<?php
/*
Author : Nikolius
Email : n1colius.lau@gmail.com
Date : 10/15/2012 3:53:53 PM
*/
class ProsesGenTempExcel extends ProcessBase {
      var $mDosenServiceObj;
      var $mServiceServerAddress;      
      var $mUserIdentity;
      var $mSemId;
      var $mKlsId;

      var $mWorksheet;
   
   function ProsesGenTempExcel($configObject, $security, $serviceAddress,$semId,$klsId){
      ProcessBase::ProcessBase($configObject);
      $this->mServiceServerAddress = $serviceAddress;
      $this->mUserIdentity = $security->mUserIdentity;      

      $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false, 
      $this->mUserIdentity->GetProperty("UserReferenceId"), $this->mUserIdentity->GetProperty("UserProdiId"));

      $this->mSemId = $semId;
      $this->mKlsId = $klsId;
   }

   function getProdiSemester($klsId){
      $result = $this->mDosenServiceObj->getProdiSemester($klsId);
      return $result;         
   }

   function getInfoKelasMk($klsId){
      $result = $this->mDosenServiceObj->getInfoKelasMk($klsId);
      return $result;
   }

   function getDataMhsKelasNilai($klsId){
      $result = $this->mDosenServiceObj->getDataMhsKelasNilai($klsId);
      return $result;      
   }

   function getKodeNilai($prodiKode){      
      $result = $this->mDosenServiceObj->getKodeNilai($prodiKode);
      return $result;        
   }

   function genTempExcel(){
      $arrLabel = $this->getDataLabel();      

      //get data (begin)
      $resProdiSemester = $this->getProdiSemester($this->mKlsId);      
      $resInfoKelasMk = $this->getInfoKelasMk($this->mKlsId);      
      $resMhs = $this->getDataMhsKelasNilai($this->mKlsId);      
      $resKodeNilai = $this->getKodeNilai($resProdiSemester[0]['PRODI_KODE']);
      //get data (end)

      //require library
      $this->mLibDir = $this->mrConfig->GetValue('app_lib').'writeExcel/';
      require_once($this->mLibDir.'Worksheet.php');
      require_once($this->mLibDir.'Workbook.php');

      $file_name = 'template_input_nilai_kelas_'.$resInfoKelasMk[0]['MK_KELAS'].'.xls';

      $this->HeaderingExcel($file_name);
      
      $workbook = new Workbook('-');      
      $this->worksheet =& $workbook->add_worksheet();

      $borderAll = & $workbook->add_format();
      $borderAll->set_border(1);

      $headerDet =& $workbook->add_format();
      $headerDet->set_bold(1);
      $headerDet->set_size(10);
      $headerDet->set_align('left');

      $det =& $workbook->add_format();
      $det->set_size(9);
      $det->set_align('left');

      $headerTab =& $workbook->add_format();
      $headerTab->set_bold(1);
      $headerTab->set_size(10);
      $headerTab->set_align('center');
      $headerTab->set_align('vcenter');
      $headerTab->set_border(1);

      $tabDetCenter =& $workbook->add_format();
      $tabDetCenter->set_size(9);
      $tabDetCenter->set_align('center');
      $tabDetCenter->set_align('vcenter');
      $tabDetCenter->set_border(1);

      $tabDetLeft =& $workbook->add_format();
      $tabDetLeft->set_size(9);
      $tabDetLeft->set_align('left');
      $tabDetLeft->set_border(1);

      $tabDetLeftItalic =& $workbook->add_format();
      $tabDetLeftItalic->set_size(9);
      $tabDetLeftItalic->set_align('left');
      $tabDetLeftItalic->set_italic(1);

      $this->worksheet->set_column(0, 0, 25);
      $this->worksheet->set_column(1, 1, 5);
      $this->worksheet->set_column(2, 2, 40);
      $this->worksheet->set_column(3, 3, 12);
      $this->worksheet->set_column(6, 6, 15);
      
      $this->worksheet->write_string(1, 0, 'Program Studi', $headerDet);
      $this->worksheet->write_string(1, 1, ':', $headerDet);
      $this->worksheet->write_string(1, 2, $resProdiSemester[0]['PRODI_NAMA'], $det);

      $this->worksheet->write_string(2, 0, 'Semester', $headerDet);
      $this->worksheet->write_string(2, 1, ':', $headerDet);
      $this->worksheet->write_string(2, 2, $resProdiSemester[0]['SEMESTER_NAMA'], $det);

      $this->worksheet->write_string(4, 0, 'Kode Matakuliah', $headerDet);
      $this->worksheet->write_string(4, 1, ':', $headerDet);
      $this->worksheet->write_string(4, 2, $resInfoKelasMk[0]['MK_KODE'], $det);

      $this->worksheet->write_string(5, 0, 'Nama Matakuliah', $headerDet);
      $this->worksheet->write_string(5, 1, ':', $headerDet);
      $this->worksheet->write_string(5, 2, $resInfoKelasMk[0]['MK_NAMA'], $det);

      $this->worksheet->write_string(6, 0, 'Kelas Matakuliah', $headerDet);
      $this->worksheet->write_string(6, 1, ':', $headerDet);
      $this->worksheet->write_string(6, 2, $resInfoKelasMk[0]['MK_KELAS'], $det);

      $this->worksheet->write_string(7, 0, 'Dosen Matakuliah', $headerDet);
      $this->worksheet->write_string(7, 1, ':', $headerDet);
      $this->worksheet->write_string(7, 2, $resInfoKelasMk[0]['DOSEN'], $det);

      //tabel mahasiswa (begin)

      //header
      $this->worksheet->write_string(9, 0, 'NIM', $headerTab);
      $this->worksheet->write_string(9, 1, 'MAHASISWA', $headerTab);
      $this->gambarBorder(9,1,9,2,$borderAll);
      $this->worksheet->merge_cells(9,1,9,2);
      $this->worksheet->write_string(9, 3, $arrLabel['komponen_nilai_satu'], $headerTab);
      $this->worksheet->write_string(9, 4, $arrLabel['komponen_nilai_dua'], $headerTab);
      $this->worksheet->write_string(9, 5, $arrLabel['komponen_nilai_tiga'], $headerTab);
      $this->worksheet->write_string(9, 6, $arrLabel['komponen_nilai_empat'], $headerTab);
      $this->worksheet->write_string(9, 7, $arrLabel['komponen_nilai_uts'], $headerTab);
      $this->worksheet->write_string(9, 8, $arrLabel['komponen_nilai_uas'], $headerTab);
      $this->worksheet->write_string(9, 9, 'NILAI', $headerTab);

      $rowStart = 10;
      if(count($resMhs) > 0){
         for($i=0;$i<count($resMhs);$i++){
            $this->worksheet->write_string($rowStart,0,$resMhs[$i]['MHS_NIU'],$tabDetCenter);
            $this->worksheet->write_string($rowStart,1,$resMhs[$i]['MHS_NAMA'],$tabDetLeft);      
            $this->gambarBorder($rowStart,1,$rowStart,2,$borderAll);
            $this->worksheet->merge_cells($rowStart,1,$rowStart,2);

            $this->worksheet->write_string($rowStart,3,$resMhs[$i]['KOMP_SATU'],$tabDetCenter);
            $this->worksheet->write_string($rowStart,4,$resMhs[$i]['KOMP_DUA'],$tabDetCenter);
            $this->worksheet->write_string($rowStart,5,$resMhs[$i]['KOMP_TIGA'],$tabDetCenter);
            $this->worksheet->write_string($rowStart,6,$resMhs[$i]['KOMP_EMPAT'],$tabDetCenter);
            $this->worksheet->write_string($rowStart,7,$resMhs[$i]['KOMP_UTS'],$tabDetCenter);
            $this->worksheet->write_string($rowStart,8,$resMhs[$i]['KOMP_UAS'],$tabDetCenter);      
            $this->worksheet->write_string($rowStart,9,$resMhs[$i]['NIL_KODE'],$tabDetCenter);            
            
            $rowStart++;
         }
      }else{
         $this->worksheet->write_string($rowStart,0,'Tidak ada data mahasiswa',$tabDetCenter);
         $this->gambarBorder($rowStart,0,$rowStart,3,$borderAll);
         $this->worksheet->merge_cells($rowStart,0,$rowStart,3);
      }
      //tabel mahasiswa (end)

      $rowStart+=3;

      //tabel kode nilai (begin)

      //header
      $this->worksheet->write_string($rowStart, 0, 'KODE NILAI', $headerTab);
      $rowStart++;

      if(count($resKodeNilai) > 0){
         for($i=0;$i<count($resKodeNilai);$i++){
            $this->worksheet->write_string($rowStart,0,$resKodeNilai[$i]['KODE_NILAI'],$tabDetCenter);     
            $rowStart++;      
         }
      }else{
         $this->worksheet->write_string($rowStart,0,'Tidak ada data kode nilai',$tabDetCenter);       
      }
      //tabel kode nilai (end)

      //keterangan note
      $rowStart++;
      $this->worksheet->write_string($rowStart,0,'*Note : Nilai Komponen harus dimasukkan berupa angka bulat.',$tabDetLeftItalic);
      $this->worksheet->merge_cells($rowStart,0,$rowStart,4);

      $workbook->close();
   }

   function gambarBorder($barisMulai,$kolomMulai,$barisSelesai,$kolomSelesai,$styleBorder){
      for($x=$barisMulai;$x<=$barisSelesai;$x++){
         for($y=$kolomMulai;$y<=$kolomSelesai;$y++){
            if($x==$barisMulai AND $y==$kolomMulai) continue;
            $this->worksheet->write_string($x,$y,'',$styleBorder);
         }
      }
   }
}
?>