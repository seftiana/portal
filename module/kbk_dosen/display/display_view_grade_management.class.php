<?php

/**
 * DisplayViewGradeManagement
 * DisplayViewGradeManagement class
 * 
 * @package dosen 
 * @author Maya Alipin
 * @copyright Copyright (c) 2006 GamaTechno
 * @version 1.0 
 * @date 2006-04-7
 * @revision 
 *
 */

class DisplayViewGradeManagement extends DisplayBaseFull
{
    /**
     * var mErrorMessage string error message
     */
    var $mErrorMessage;
    
    var $mPesanMessage;

    /**
     * var mDosenServiceObj object DosenClientService
     */
    var $mDosenServiceObj;
    var $proposedClassObj;
    /**
     * var mServiceServerAddress string alamat server service
     */
    var $mServiceServerAddress;

    /**
     * var mKelasId integer kelas id
     */
    var $mKelasId;

    /**
     * var mSemesterIdToView integer kelas id
     */
    var $mSemesterIdToView;
    var $mPerNif;
    var $mHalaman;
    var $mAfterProc;
    /**
     * DisplayViewGradeManagement::DisplayViewGradeManagement
     * Constructor
     *
     * @param configObject object Configuration
     * @param security object Security
     * @param errMsg string error message
     */
    function DisplayViewGradeManagement(&$configObject, &$security, $errMsg, $semester,
        $kelas, $serverAddress, $halaman, $perNif, $afterProc, $pesanMsg='')
    {
        DisplayBaseFull::DisplayBaseFull($configObject, $security);
        $this->mErrorMessage = $errMsg;
        $this->mPesanMessage = $pesanMsg;
        $this->mKelasId = $kelas;
        $this->mServiceServerAddress = $serverAddress;
        $this->mHalaman = $halaman;
        $this->mPerNif = $perNif;
        $this->mDosenServiceObj = new DosenClientService($this->mServiceServerAddress, false,
            $this->mrUserSession->GetProperty("UserReferenceId"), $this->mrUserSession->
            GetProperty("UserProdiId"));
            
        $this->proposedClassObj = new ProposedClassesClientService($this->mServiceServerAddress, false, $this->mrUserSession->GetProperty("UserReferenceId"),$this->mrUserSession->GetProperty("UserProdiId"));
        $this->proposedClassObj->SetProperty("ClassId", $this->mKelasId);
        
        $this->mSemesterIdToView = $semester;
        $this->SetErrorAndEmptyBox();
        $this->SetTemplateBasedir($configObject->GetValue('app_module') .
            'kbk_dosen/templates');
        if ($halaman == 'detail')
        {
            $this->SetTemplateFile('view_detail_students.html');

        } else
        {
            $this->SetTemplateFile('view_grade_management.html');
            $this->mAfterProc = $afterProc;
        }

    }


    /**
     * DisplayViewGradeManagement::GetStudentsGrade
     * Method ini digunakan untuk mengambil data nilai mahasiswa berdasarkan kelas tertentu
     *
     * @param
     * @return array Data nilai mahasiswa
     */
    function GetStudentsGrade()
    {

        $dataNilai = $this->mDosenServiceObj->GetNilaiMahasiswaForKelas($this->mKelasId);
        if (false === $dataNilai)
        {
            return false;
        } else
        {
            return $dataNilai;
        }
    }

    function GetNilaiBobot()
    {

        $bobot = $this->mDosenServiceObj->GetNilaiBobotPerKelas($this->mKelasId); //print_r($bobot);
        if (false === $bobot)
        {
            return false;
        } else
        {
            return $bobot;
        }
    }

    function DetailNilai()
    {

        $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->
            mSemesterIdToView);
        $dataKelas = $this->GetInfoKelas();
        foreach ($dataKelas['detil'] as $value)
        {
            $value['semester_info'] = $semesterInfo[0]['nama'] . ' ' . $semesterInfo[0]['tahun'];
            $this->mTemplate->addVars('content', $value, "");
        }
        $dataNilai = $this->GetStudentsGrade();
        for ($i = 0; $i < count($dataNilai); $i++)
        {
            if ($dataNilai[$i]['nif'] == $this->mPerNif)
            {
                $this->mTemplate->addVars('data_diri', $dataNilai[$i], "");
            }
        }
        $nilaiDpna = $this->GetNilaiDpna($this->mPerNif);
        if (!empty($nilaiDpna))
        {
            foreach ($nilaiDpna as $data)
            {
                if ($dataNilai[0]['nilai'] == $data['krsdpnaRelatif'])
                {
                    $data['nilai_kode'] = $data['krsdpnaRelatif'];
                } else
                {
                    $data['nilai_kode'] = $dataNilai[0]['nilai'];
                }
                $this->mTemplate->addVars('dpna', $data, "");
                $this->mTemplate->parseTemplate('dpna', 'a');
            }
        } else
        {
            $this->AddVar("dpna", "KRSDPNSHARIANASAL", 0);
            $this->AddVar("dpna", "KRSDPNAMANDIRIASAL", 0);
            $this->AddVar("dpna", "KRSDPNATERSTRUKTURASAL", 0);
            $this->AddVar("dpna", "KRSDPNSUTSASAL", 0);
            $this->AddVar("dpna", "KRSDPNAUASASAL", 0);
            $this->AddVar("dpna", "KRSDPNAHARIANBOBOT", 0);
            $this->AddVar("dpna", "KRSDPNAMANDIRIBOBOT", 0);
            $this->AddVar("dpna", "KRSDPNATERSTRUKTURBOBOT", 0);
            $this->AddVar("dpna", "KRSDPNAUTSBOBOT", 0);
            $this->AddVar("dpna", "KRSDPNAUASBOBOT", 0);
            $this->AddVar("dpna", "KRSDPNSABSOLUT", 0);
            $this->AddVar("dpna", "NILAI_KODE", $dataNilai[0]['nilai']);
            $this->mTemplate->parseTemplate('nilai_dpna', 'a');
        }
    }

    function GetNilaiDpna($nif)
    {
        $dpna = $this->mDosenServiceObj->GetKrsDpnaNiu($this->mKelasId, $nif);
        if (false === $dpna)
        {
            return false;
        } else
        {
            return $dpna;
        }
    }

    function GetCaraPenilaian()
    {
        $cp = $this->mDosenServiceObj->GetCaraPenilaian();
        if (false === $cp)
        {
            return false;
        } else
        {
            return $cp;
        }
    }

    function DoInitializeService()
    {

        if ($this->mDosenServiceObj->IsError())
        {
            $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
            return false;
        } else
        {
            $this->mDosenServiceObj->SetProperty("UserRole", $this->mrUserSession->
                GetProperty("Role"));
            if (false === $this->mDosenServiceObj->DoSiaSetting())
            {
                $arrService = $this->mrUserSession->GetProperty("ServerServiceAvailable");
                if ($this->mDosenServiceObj->IsError() && $this->mDosenServiceObj->GetProperty("FaultMessages") ==
                    "")
                {
                    $arrService["SIA"] = false;
                } else
                {
                    $arrService["SIA"] = true;
                }
                $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
                $this->mrUserSession->SetProperty("ServerServiceAvailable", $arrService);
                $this->mrSecurity->RefreshSessionInfo();
                return false;
            } else
            {
                return true;
            }
        }
    }

    function GetInfoKelas()
    {        
        $dataKelas = $this->proposedClassObj->GetAllInfoDetailForClass();
        return $dataKelas;
    }
    
    function getResKlsJmlhTerlaksana($klsId){                    
         $result = $this->proposedClassObj->getResKlsJmlhTerlaksana($klsId);
         return $result;
    }
    
    function getDataKehadiran($klsId,$mhsNiu){         
         $result = $this->proposedClassObj->getDataKehadiran($klsId,$mhsNiu);
         return $result;      
    }
    
    function getTugasTmbhan($mhsNiu,$krsdtId,$klsId){
         $result = $this->mDosenServiceObj->getTugasTmbhan($mhsNiu,$krsdtId,$klsId);
         return $result;
    }

    function Display()
    {                                  
        // cek apakah service sia is available
        $init = $this->DoInitializeService();
        DisplayBaseFull::Display("[ Logout ]");
        
        //cek apakah ada pesan error
        if($this->mErrorMessage != ''){
            $this->ShowErrorBox($this->mErrorMessage);     
        }
        
        //cek apakah ada pesan info
        if($this->mPesanMessage != ''){
            $this->showInfoBox($this->mPesanMessage);            
        }

        if ($this->mHalaman == 'detail')
        {

            $det = $this->DetailNilai();
        }
        if ($init === false)
        {
            $this->ShowErrorBox();
        } else
        {
            $this->AddVar('content','BASE_ADDRESS',$this->mrConfig->mValue['baseaddress']);
            
            $dataKelas = $this->GetInfoKelas(); //print_r($dataKelas['detil']);
            $kodeProdi = $dataKelas['detil'][0]['kode_prodi'];

            if ($dataKelas != false)
            {
                if (isset($dataKelas["detil"][0]["nama"]))
                    $this->AddVar("content", "MATAKULIAH", $dataKelas["detil"][0]["nama"]);
                if (isset($dataKelas["detil"][0]["nama_mata_kuliah"]))
                    $this->AddVar("content", "KELAS", $dataKelas["detil"][0]["nama_mata_kuliah"]);
            }

            $semesterInfo = $this->mDosenServiceObj->GetNamaSemesterForSemesterId($this->
                mSemesterIdToView);
            $semesterInfo = $semesterInfo[0]["nama"] . " " . $semesterInfo[0]["tahun"] . "/" . ($semesterInfo[0]["tahun"] +
                1);
            $this->AddVar("content", "SEMESTER", $semesterInfo);

            //$dataNilaiBobot = $this->GetNilaiBobot();

            /*if (!empty($dataNilaiBobot[0]['BOBOT_HARIAN'])) {
            /*foreach($dataNilaiBobot as $value){
            $this->AddVars("nilai_bobot", $value, "");
            $this->parseTemplate("nilai_bobot");
            }
            $this->ParseData("nilai_bobot",$dataNilaiBobot,"");
            }else{
            
            $this->AddVar("nilai_bobot", "BOBOT_HARIAN",0);
            $this->AddVar("nilai_bobot", "BOBOT_MANDIRI",0);
            $this->AddVar("nilai_bobot", "BOBOT_TERSTRUKTUR",0);
            $this->AddVar("nilai_bobot", "BOBOT_UTS",0);
            $this->AddVar("nilai_bobot", "BOBOT_UAS",0);
            $this->AddVar("nilai_bobot", "KELAS_ID",0);
            $this->mTemplate->parseTemplate("nilai_bobot","a");
            }*/
            $dataNilai = $this->GetStudentsGrade(); //print_r($dataNilai);exit;            
            if (false !== $dataNilai)
            {
                $url_detail = $this->mrConfig->GetURL('kbk_dosen', 'grade_management', 'view') .
                    "&pBl=" . $this->mrConfig->enc("detail") . "&pGo=" . $this->mrConfig->enc("detail") .
                    "&kelas=" . $this->mKelasId . "&smt=" . $this->mSemesterIdToView; //print_r($this->mSemesterIdToView);
                //tampilkan data matakuliah ditawarkan
                $this->AddVar("nilai", "NILAI_AVAILABLE", "YES");
                $hakAkses = $this->mDosenServiceObj->GetHakAksesDosenForInputNilai($this->
                    mKelasId);
                $readOnly = "NO";
                if (false === $hakAkses || $hakAkses[0]["BOLEHINPUT"] != 1)
                {
                    $this->ShowErrorBox("Tidak dapat memasukkan nilai, anda tidak mempunyai hak input nilai");
                    $readOnly = "YES";

                }
                //print_r($this->mDosenServiceObj);
                $semesterProdiId = $this->mDosenServiceObj->GetSemesterProdiIdForSemesterId($this->
                    mSemesterIdToView, $this->mrUserSession->GetProperty("UserProdiId"));
                $cekPeriode = $this->mDosenServiceObj->GetSemesterInformation($semesterProdiId);
                
                if (($cekPeriode[0]["current_periode_input_nilai"] == "BUKANPERIODEINPUTNILAI") &&
                    $readOnly == "NO")
                {
                    $this->ShowErrorBox("Tidak dapat memasukkan nilai, bukan periode input nilai");
                    $readOnly = "YES";

                }
                /*
                if (($this->mDosenServiceObj->GetProperty("CurrentPeriodeInputNilai") == "BUKANPERIODEINPUTNILAI") && $readOnly == "NO") {
                $this->ShowErrorBox("Tidak dapat memasukkan nilai, bukan periode input nilai");
                $readOnly = "YES";
                
                } 
                */

                /*
                //pengecekan jika sudah ada data nilai, maka nilai tidak dapat diedit lagi
                foreach ($dataNilai as $data)
                {
                    if (!empty($data['nilai']))
                    {
                        if ($this->mAfterProc != '1')
                            $this->ShowErrorBox("Penyimpanan nilai berhasil. Data nilai tidak dapat diubah lagi.");
                        $readOnly = "YES";
                        break;
                    }
                }*/                
                  
                if ($readOnly == "NO")
                {

                    // lakukan load pilihan nilai
                    $pilihanNilai = $this->mDosenServiceObj->GetAllPilihanNilaiPerProdi(1, $kodeProdi);
                    $jumlahPilihanNilai = count($pilihanNilai);
                                        
                    $this->AddVar("nilai_bobot_visible", "READONLY", "NO");                                        
                    
                    $this->AddVar("nilai_bobot", "KLS", $this->mrConfig->Enc($this->mKelasId));
                    $this->AddVar("nilai_bobot", "KODE_PRODI", $this->mrConfig->Enc($kodeProdi));
                    $this->AddVar("nilai_bobot", "SIA", $this->mrConfig->Enc($this->mServiceServerAddress));
                    $this->AddVar("nilai_bobot", "SMT", $this->mrConfig->Enc($this->mSemesterIdToView));
                    $this->AddVar("content", "URL_PROCESS_KOMPONEN", $this->mrConfig->GetURL("kbk_dosen", "dosen_komponen","process"));                                    
                    
                    /*if (!empty($dataNilaiBobot[0]['BOBOT_HARIAN']))
                    {                        
                        $dataNilaiBobot[0]['BOBOT_TOTAL'] = $dataNilaiBobot[0]['BOBOT_HARIAN'] + $dataNilaiBobot[0]['BOBOT_MANDIRI'] +
                            $dataNilaiBobot[0]['BOBOT_TERSTRUKTUR'] + $dataNilaiBobot[0]['BOBOT_TAMBAHAN'] +
                            $dataNilaiBobot[0]['BOBOT_UTS'] + $dataNilaiBobot[0]['BOBOT_UAS'];
                        $this->ParseData("nilai_bobot", $dataNilaiBobot, "");
                    } else
                    {                        
                        $this->AddVar("nilai_bobot", "BOBOT_HARIAN", 0);
                        $this->AddVar("nilai_bobot", "BOBOT_MANDIRI", 0);
                        $this->AddVar("nilai_bobot", "BOBOT_TERSTRUKTUR", 0);
                        $this->AddVar("nilai_bobot", "BOBOT_TAMBAHAN", 0);
                        $this->AddVar("nilai_bobot", "BOBOT_UTS", 0);
                        $this->AddVar("nilai_bobot", "BOBOT_UAS", 0);
                        $this->AddVar("nilai_bobot", "KELAS_ID", 0);
                        $this->AddVar("nilai_bobot", "BOBOT_TOTAL", 0);
                        $this->mTemplate->parseTemplate("nilai_bobot", "a");
                    }*/
                    
                    if ($pilihanNilai === false)
                    {
                        $this->ShowErrorBox("Tidak dapat mengambil data pilihan nilai. \n");
                        $this->AddVar("nilai_access", "READONLY", "YES");
                    } else
                    {
                        $this->AddVar("nilai_access", "READONLY", "NO");
                        $i = 0;
                        foreach ($dataNilai as $key => $value)
                        {
                            $nilaiExist = false;
                            $value["URUT"] = $key;
                            $value["number"] = ++$key;
                            
                            $krsdtId = $value["idkrsdetil"];  
                            $value["idkrsdetil"] = $this->mrConfig->Enc($value["idkrsdetil"]);
                            //$nilaiDpna = $this->GetNilaiDpna($value["nif"]); // kolom komponen nilai lainnya
                            $nilaiDpna = null;
                            
                            //$dataTugasTmbhan = $this->getTugasTmbhan($value['nif'],$krsdtId,$this->mKelasId); // kolom komponen nilai TUGAS+
                            $dataTugasTmbhan = null;
                            $urlAdd = '&kelas='.$this->mrConfig->enc($this->mKelasId).'&sia='.$this->mrConfig->enc($this->mServiceServerAddress).'&mhs='.$this->mrConfig->enc($value['nif']).'&krsdt='.$this->mrConfig->enc($krsdtId).'&smt='.$this->mrConfig->enc($this->mSemesterIdToView);
                            $urlTugasTmbhan = $this->mrConfig->GetURL("kbk_dosen", "tugas_tmbhan","view").$urlAdd;
                            
                            $this->mTemplate->clearTemplate('nilai_dpna');
                            $this->AddVar("nilai_access_item_no", "KRSDT_ID", $value['idkrsdetil']);
                            
                            //$klsJmlhTerlaksana = $this->getResKlsJmlhTerlaksana($this->mKelasId); // kolom komponen nilai PRESENSI
                            //$dataKehadiran = $this->getDataKehadiran($this->mKelasId,$value['nif']); // kolom komponen nilai PRESENSI
                            $klsJmlhTerlaksana = null;
                            $dataKehadiran = null;
                            
                              if(($dataKehadiran['JML_HADIR'] > 0) && ($klsJmlhTerlaksana > 0)) {
                                 $persenHadir = round($dataKehadiran['JML_HADIR'] / $klsJmlhTerlaksana * 100, 2);
                              } else {
                                 $persenHadir = "0";
                              }
                            
                            /*
                            if (!empty($nilaiDpna))
                            {
                                //override 
                                $nilaiDpna[0]['krsdpnsHarianAsal'] = $persenHadir;
                                $nilaiDpna[0]['jmlhTgsTmbhan'] = $dataTugasTmbhan;
                                $nilaiDpna[0]['URLTUGASTMBHAN'] = $urlTugasTmbhan;
                                 
                                foreach ($nilaiDpna as $data)
                                {
                                    $this->mTemplate->addVars("nilai_dpna", $data, "");
                                    $this->mTemplate->parseTemplate('nilai_dpna', 'a');
                                }
                            } else
                            {
                                //$this->AddVar("nilai_dpna", "KRSDT_ID",0);
                                $this->AddVar("nilai_dpna", "URLTUGASTMBHAN", $urlTugasTmbhan);
                                $this->AddVar("nilai_dpna", "JMLHTGSTMBHAN", $dataTugasTmbhan);
                                $this->AddVar("nilai_dpna", "KRSDPNSHARIANASAL", $persenHadir);
                                $this->AddVar("nilai_dpna", "KRSDPNAMANDIRIASAL", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNATERSTRUKTURASAL", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNATAMBAHANASAL", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNSUTSASAL", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNAUASASAL", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNAHARIANBOBOT", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNAMANDIRIBOBOT", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNATERSTRUKTURBOBOT", 0);
                                $this->AddVar("nilai_dpna", "BOBOT_TAMBAHAN", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNAUTSBOBOT", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNAUASBOBOT", 0);
                                $this->AddVar("nilai_dpna", "KRSDPNSABSOLUT", 0);
                                $this->mTemplate->parseTemplate('nilai_dpna', 'a');
                            }*/
                            foreach ($pilihanNilai as $keyNilai => $valueNilai)
                            {
                                if ($valueNilai["nilai"] == $value["nilai"])
                                {
                                    $pilihanNilai[$keyNilai]["selected"] = "selected";
                                    $nilaiExist = true;
                                } else
                                {
                                    $pilihanNilai[$keyNilai]["selected"] = "";
                                }
                            }

                            if ($nilaiExist === false)
                            {
                                //$pilihanNilai[6]["selected"] = "selected";
                                $pilihanNilai[$jumlahPilihanNilai - 1]['selected'] = "selected";
                            }
                            $value['URL_DETAIL'] = $url_detail . '&nif=' . $value["nif"];
                            $this->AppendVarWithInnerTemplate('nilai_access_item_no', $value, 'NILAI_',
                                'pilihan_nilai', $pilihanNilai, 'PNL_', false, $value['number']);

                        }//die('z');
                        $this->SetAttribute("btn_ubah", "visibility", "visible");
                    }
                    $cpId = $nilaiDpna[0]['krsdpnsCpId'];
                    $cp = $this->GetCaraPenilaian();
                    foreach ($cp as $j => $caraNilai)
                    {
                        if ($cpId == $caraNilai["ID"])
                            $caraNilai["IS_SELECT"] = "selected=\"true\"";
                        else
                            $caraNilai["IS_SELECT"] = "";

                        $this->mTemplate->addVars("cara_penilaian", $caraNilai);
                        $this->mTemplate->parseTemplate("cara_penilaian", "a");
                    }
                    if ($this->mErrorMessage != "")
                    {
                        $this->ShowErrorBox($this->mErrorMessage);
                    }
                } else
                {                     
                    $this->AddVar("nilai_bobot_visible", "READONLY", "YES");                    
                    foreach ($dataNilai as $key => $value)
                    {
                        $number = $key + 1;
                        $value['number'] = $number;
                        if ($number % 2 == 0)
                        {
                            $this->mTemplate->addVar('nilai_access_item_yes', "ODDEVEN", "EVEN");
                        } else
                        {
                            $this->mTemplate->addVar('nilai_access_item_yes', "ODDEVEN", "ODD");
                        }
                        
                        //$nilaiDpna = $this->GetNilaiDpna($value["nif"]);
                        $nilaiDpna = null;
                        //$dataTugasTmbhan = $this->getTugasTmbhan($value['nif'],$value['idkrsdetil'],$this->mKelasId);
                        $dataTugasTmbhan = null;
                        
                        $this->mTemplate->clearTemplate('nilai_dpna_noedit');
                        /*if (!empty($nilaiDpna))
                        {
                            //tambahkan nilai tugas+
                            $nilaiDpna[0]['jmlhTgsTmbhan'] = $dataTugasTmbhan;
                            
                            foreach ($nilaiDpna as $data)
                            {
                                $this->mTemplate->addVars("nilai_dpna_noedit", $data, "");
                                $this->mTemplate->parseTemplate('nilai_dpna_noedit', 'a');
                            }
                        } else
                        {
                            $this->AddVar("nilai_dpna_noedit", "JMLHTGSTMBHAN", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNSHARIANASAL", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNAMANDIRIASAL", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNATERSTRUKTURASAL", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNATAMBAHANASAL", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNSUTSASAL", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNAUASASAL", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNAHARIANBOBOT", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNAMANDIRIBOBOT", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNATERSTRUKTURBOBOT", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNATAMBAHANBOBOT", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNAUTSBOBOT", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNAUASBOBOT", 0);
                            $this->AddVar("nilai_dpna_noedit", "KRSDPNSABSOLUT", 0);
                            $this->mTemplate->parseTemplate('nilai_dpna_noedit', 'a');
                        }*/
                        $value['URL_DETAIL'] = $url_detail . '&nif=' . $value["nif"];
                        $this->mTemplate->addVars('nilai_access_item_yes_ok', $value, "NILAI_");
                        $this->mTemplate->parseTemplate('nilai_access_item_yes_ok', 'a');
                    }
                    $cpId = $nilaiDpna[0]['krsdpnsCpId'];
                    $cp = $this->GetCaraPenilaian();
                    foreach ($cp as $j => $caraNilai)
                    {
                        if ($cpId == $caraNilai["ID"])
                            $caraNilai["IS_SELECT"] = "selected=\"true\"";
                        else
                            $caraNilai["IS_SELECT"] = "";

                        $this->mTemplate->addVars("cara_penilaian", $caraNilai);
                        $this->mTemplate->parseTemplate("cara_penilaian", "a");
                    }
                    $this->AddVar("nilai_access", "READONLY", "YES");

                    //$this->ParseData('nilai_access_item_yes', $dataNilai, "NILAI_",1);
                }


            } else
            {
                $this->mErrorMessage .= $this->mDosenServiceObj->GetProperty("ErrorMessages");
                $this->AddVar("nilai", "NILAI_AVAILABLE", "NO");
                $this->AddVar("empty_type", "TYPE", "INFO");
                $this->AddVar("empty_box", "WARNING_MESSAGE", $this->ComposeErrorMessage("Pengambilan data nilai tidak berhasil. \nTidak ada mahasiswa yang mengambil kelas ini. \n",
                    $this->mErrorMessage));
            }
        }
        $this->AddVar("content", "URL_PROCESS", $this->mrConfig->GetURL("kbk_dosen", "dosen",
            "process"));

        $this->AddVar("content", "KLS", $this->mrConfig->Enc($this->mKelasId));
        $this->AddVar("content", "KODE_PRODI", $this->mrConfig->Enc($kodeProdi));
        $this->AddVar("content", "SIA", $this->mrConfig->Enc($this->
            mServiceServerAddress));
        $this->AddVar("content", "SMT", $this->mrConfig->Enc($this->mSemesterIdToView));
        $this->DisplayTemplate();
    }

    function ShowErrorBox($strError = "Pengambilan data MatakuliahDitawarkan tidak berhasil. \n")
    {        
        $this->SetAttribute('error_box', 'visibility', 'visible');
        //$this->AddVar('error_type','TYPE','INFO');
        $this->AddVar("error_box", "ERROR_MESSAGE", $this->ComposeErrorMessage($strError,$this->mErrorMessage));
    }
   
    function showInfoBox($strInfo){
      $this->SetAttribute('error_box', 'visibility', 'visible');
      $this->AddVar('error_type','TYPE','INFO');
      $this->AddVar("error_box", "ERROR_MESSAGE", $strInfo);        
    }  
}

?>