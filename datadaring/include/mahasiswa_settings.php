<?php
require_once(getabspath("classes/cipherer.php"));




$tdatamahasiswa = array();
	$tdatamahasiswa[".truncateText"] = true;
	$tdatamahasiswa[".NumberOfChars"] = 80;
	$tdatamahasiswa[".ShortName"] = "mahasiswa";
	$tdatamahasiswa[".OwnerID"] = "";
	$tdatamahasiswa[".OriginalTable"] = "mahasiswa";

//	field labels
$fieldLabelsmahasiswa = array();
$fieldToolTipsmahasiswa = array();
$pageTitlesmahasiswa = array();
$placeHoldersmahasiswa = array();

if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsmahasiswa["English"] = array();
	$fieldToolTipsmahasiswa["English"] = array();
	$placeHoldersmahasiswa["English"] = array();
	$pageTitlesmahasiswa["English"] = array();
	$fieldLabelsmahasiswa["English"]["mhsNiu"] = "Mhs Niu";
	$fieldToolTipsmahasiswa["English"]["mhsNiu"] = "";
	$placeHoldersmahasiswa["English"]["mhsNiu"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNif"] = "Mhs Nif";
	$fieldToolTipsmahasiswa["English"]["mhsNif"] = "";
	$placeHoldersmahasiswa["English"]["mhsNif"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNama"] = "Mhs Nama";
	$fieldToolTipsmahasiswa["English"]["mhsNama"] = "";
	$placeHoldersmahasiswa["English"]["mhsNama"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAngkatan"] = "Mhs Angkatan";
	$fieldToolTipsmahasiswa["English"]["mhsAngkatan"] = "";
	$placeHoldersmahasiswa["English"]["mhsAngkatan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSemesterMasuk"] = "Mhs Semester Masuk";
	$fieldToolTipsmahasiswa["English"]["mhsSemesterMasuk"] = "";
	$placeHoldersmahasiswa["English"]["mhsSemesterMasuk"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPasswordRegistrasi"] = "Mhs Password Registrasi";
	$fieldToolTipsmahasiswa["English"]["mhsPasswordRegistrasi"] = "";
	$placeHoldersmahasiswa["English"]["mhsPasswordRegistrasi"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKurId"] = "Mhs Kur Id";
	$fieldToolTipsmahasiswa["English"]["mhsKurId"] = "";
	$placeHoldersmahasiswa["English"]["mhsKurId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsProdiKode"] = "Mhs Prodi Kode";
	$fieldToolTipsmahasiswa["English"]["mhsProdiKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsProdiKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsProdiKodeUniv"] = "Mhs Prodi Kode Univ";
	$fieldToolTipsmahasiswa["English"]["mhsProdiKodeUniv"] = "";
	$placeHoldersmahasiswa["English"]["mhsProdiKodeUniv"] = "";
	$fieldLabelsmahasiswa["English"]["mhsProdikonsentrasiId"] = "Mhs Prodikonsentrasi Id";
	$fieldToolTipsmahasiswa["English"]["mhsProdikonsentrasiId"] = "";
	$placeHoldersmahasiswa["English"]["mhsProdikonsentrasiId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsWktkulId"] = "Mhs Wktkul Id";
	$fieldToolTipsmahasiswa["English"]["mhsWktkulId"] = "";
	$placeHoldersmahasiswa["English"]["mhsWktkulId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNomorTes"] = "Mhs Nomor Tes";
	$fieldToolTipsmahasiswa["English"]["mhsNomorTes"] = "";
	$placeHoldersmahasiswa["English"]["mhsNomorTes"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalTerdaftar"] = "Mhs Tanggal Terdaftar";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalTerdaftar"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalTerdaftar"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStatusMasukPt"] = "Mhs Status Masuk Pt";
	$fieldToolTipsmahasiswa["English"]["mhsStatusMasukPt"] = "";
	$placeHoldersmahasiswa["English"]["mhsStatusMasukPt"] = "";
	$fieldLabelsmahasiswa["English"]["mhsIsAsing"] = "Mhs Is Asing";
	$fieldToolTipsmahasiswa["English"]["mhsIsAsing"] = "";
	$placeHoldersmahasiswa["English"]["mhsIsAsing"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJumlahSksPindahan"] = "Mhs Jumlah Sks Pindahan";
	$fieldToolTipsmahasiswa["English"]["mhsJumlahSksPindahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsJumlahSksPindahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKodePtPindahan"] = "Mhs Kode Pt Pindahan";
	$fieldToolTipsmahasiswa["English"]["mhsKodePtPindahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsKodePtPindahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKodeProdiDiktiPindahan"] = "Mhs Kode Prodi Dikti Pindahan";
	$fieldToolTipsmahasiswa["English"]["mhsKodeProdiDiktiPindahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsKodeProdiDiktiPindahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNamaPtPindahan"] = "Mhs Nama Pt Pindahan";
	$fieldToolTipsmahasiswa["English"]["mhsNamaPtPindahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsNamaPtPindahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJjarKodeDiktiPindahan"] = "Mhs Jjar Kode Dikti Pindahan";
	$fieldToolTipsmahasiswa["English"]["mhsJjarKodeDiktiPindahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsJjarKodeDiktiPindahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTahunMasukPtPindahan"] = "Mhs Tahun Masuk Pt Pindahan";
	$fieldToolTipsmahasiswa["English"]["mhsTahunMasukPtPindahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsTahunMasukPtPindahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNimLama"] = "Mhs Nim Lama";
	$fieldToolTipsmahasiswa["English"]["mhsNimLama"] = "";
	$placeHoldersmahasiswa["English"]["mhsNimLama"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJenisKelamin"] = "Mhs Jenis Kelamin";
	$fieldToolTipsmahasiswa["English"]["mhsJenisKelamin"] = "";
	$placeHoldersmahasiswa["English"]["mhsJenisKelamin"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKotaKodeLahir"] = "Mhs Kota Kode Lahir";
	$fieldToolTipsmahasiswa["English"]["mhsKotaKodeLahir"] = "";
	$placeHoldersmahasiswa["English"]["mhsKotaKodeLahir"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalLahir"] = "Mhs Tanggal Lahir";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalLahir"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalLahir"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAgmrId"] = "Mhs Agmr Id";
	$fieldToolTipsmahasiswa["English"]["mhsAgmrId"] = "";
	$placeHoldersmahasiswa["English"]["mhsAgmrId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSmtaKode"] = "Mhs Smta Kode";
	$fieldToolTipsmahasiswa["English"]["mhsSmtaKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsSmtaKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTdftSmta"] = "Mhs Tdft Smta";
	$fieldToolTipsmahasiswa["English"]["mhsTdftSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsTdftSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTahunTamatSmta"] = "Mhs Tahun Tamat Smta";
	$fieldToolTipsmahasiswa["English"]["mhsTahunTamatSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsTahunTamatSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTahunLulusSmta"] = "Mhs Tahun Lulus Smta";
	$fieldToolTipsmahasiswa["English"]["mhsTahunLulusSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsTahunLulusSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJursmtarKode"] = "Mhs Jursmtar Kode";
	$fieldToolTipsmahasiswa["English"]["mhsJursmtarKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsJursmtarKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAlamatSmta"] = "Mhs Alamat Smta";
	$fieldToolTipsmahasiswa["English"]["mhsAlamatSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsAlamatSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoIjasahSmta"] = "Mhs No Ijasah Smta";
	$fieldToolTipsmahasiswa["English"]["mhsNoIjasahSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoIjasahSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsIjasahSmta"] = "Mhs Ijasah Smta";
	$fieldToolTipsmahasiswa["English"]["mhsIjasahSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsIjasahSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalIjasahSmta"] = "Mhs Tanggal Ijasah Smta";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalIjasahSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalIjasahSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNilaiUjianAkhirSmta"] = "Mhs Nilai Ujian Akhir Smta";
	$fieldToolTipsmahasiswa["English"]["mhsNilaiUjianAkhirSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsNilaiUjianAkhirSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJumlahMpUjianAkhirSmta"] = "Mhs Jumlah Mp Ujian Akhir Smta";
	$fieldToolTipsmahasiswa["English"]["mhsJumlahMpUjianAkhirSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsJumlahMpUjianAkhirSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStnkrId"] = "Mhs Stnkr Id";
	$fieldToolTipsmahasiswa["English"]["mhsStnkrId"] = "";
	$placeHoldersmahasiswa["English"]["mhsStnkrId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJumlahSaudara"] = "Mhs Jumlah Saudara";
	$fieldToolTipsmahasiswa["English"]["mhsJumlahSaudara"] = "";
	$placeHoldersmahasiswa["English"]["mhsJumlahSaudara"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAlamatMhs"] = "Mhs Alamat Mhs";
	$fieldToolTipsmahasiswa["English"]["mhsAlamatMhs"] = "";
	$placeHoldersmahasiswa["English"]["mhsAlamatMhs"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAlamatTerakhir"] = "Mhs Alamat Terakhir";
	$fieldToolTipsmahasiswa["English"]["mhsAlamatTerakhir"] = "";
	$placeHoldersmahasiswa["English"]["mhsAlamatTerakhir"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAlamatDiKotaIni"] = "Mhs Alamat Di Kota Ini";
	$fieldToolTipsmahasiswa["English"]["mhsAlamatDiKotaIni"] = "";
	$placeHoldersmahasiswa["English"]["mhsAlamatDiKotaIni"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKotaKode"] = "Mhs Kota Kode";
	$fieldToolTipsmahasiswa["English"]["mhsKotaKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsKotaKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNgrKode"] = "Mhs Ngr Kode";
	$fieldToolTipsmahasiswa["English"]["mhsNgrKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsNgrKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKodePos"] = "Mhs Kode Pos";
	$fieldToolTipsmahasiswa["English"]["mhsKodePos"] = "";
	$placeHoldersmahasiswa["English"]["mhsKodePos"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStatrumahId"] = "Mhs Statrumah Id";
	$fieldToolTipsmahasiswa["English"]["mhsStatrumahId"] = "";
	$placeHoldersmahasiswa["English"]["mhsStatrumahId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSbdnrId"] = "Mhs Sbdnr Id";
	$fieldToolTipsmahasiswa["English"]["mhsSbdnrId"] = "";
	$placeHoldersmahasiswa["English"]["mhsSbdnrId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsHubbiayaId"] = "Mhs Hubbiaya Id";
	$fieldToolTipsmahasiswa["English"]["mhsHubbiayaId"] = "";
	$placeHoldersmahasiswa["English"]["mhsHubbiayaId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTempatKerja"] = "Mhs Tempat Kerja";
	$fieldToolTipsmahasiswa["English"]["mhsTempatKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsTempatKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAlamatTempatKerja"] = "Mhs Alamat Tempat Kerja";
	$fieldToolTipsmahasiswa["English"]["mhsAlamatTempatKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsAlamatTempatKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoTelpTempatKerja"] = "Mhs No Telp Tempat Kerja";
	$fieldToolTipsmahasiswa["English"]["mhsNoTelpTempatKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoTelpTempatKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsBeasiswa"] = "Mhs Beasiswa";
	$fieldToolTipsmahasiswa["English"]["mhsBeasiswa"] = "";
	$placeHoldersmahasiswa["English"]["mhsBeasiswa"] = "";
	$fieldLabelsmahasiswa["English"]["mhsWnrId"] = "Mhs Wnr Id";
	$fieldToolTipsmahasiswa["English"]["mhsWnrId"] = "";
	$placeHoldersmahasiswa["English"]["mhsWnrId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJlrrKode"] = "Mhs Jlrr Kode";
	$fieldToolTipsmahasiswa["English"]["mhsJlrrKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsJlrrKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoAskes"] = "Mhs No Askes";
	$fieldToolTipsmahasiswa["English"]["mhsNoAskes"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoAskes"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoTelp"] = "Mhs No Telp";
	$fieldToolTipsmahasiswa["English"]["mhsNoTelp"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoTelp"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoHp"] = "Mhs No Hp";
	$fieldToolTipsmahasiswa["English"]["mhsNoHp"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoHp"] = "";
	$fieldLabelsmahasiswa["English"]["mhsEmail"] = "Mhs Email";
	$fieldToolTipsmahasiswa["English"]["mhsEmail"] = "";
	$placeHoldersmahasiswa["English"]["mhsEmail"] = "";
	$fieldLabelsmahasiswa["English"]["mhsHomepage"] = "Mhs Homepage";
	$fieldToolTipsmahasiswa["English"]["mhsHomepage"] = "";
	$placeHoldersmahasiswa["English"]["mhsHomepage"] = "";
	$fieldLabelsmahasiswa["English"]["mhsFoto"] = "Mhs Foto";
	$fieldToolTipsmahasiswa["English"]["mhsFoto"] = "";
	$placeHoldersmahasiswa["English"]["mhsFoto"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStakmhsrKode"] = "Mhs Stakmhsr Kode";
	$fieldToolTipsmahasiswa["English"]["mhsStakmhsrKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsStakmhsrKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsDsnPegNipPembimbingAkademik"] = "Mhs Dsn Peg Nip Pembimbing Akademik";
	$fieldToolTipsmahasiswa["English"]["mhsDsnPegNipPembimbingAkademik"] = "";
	$placeHoldersmahasiswa["English"]["mhsDsnPegNipPembimbingAkademik"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksWajib"] = "Mhs Sks Wajib";
	$fieldToolTipsmahasiswa["English"]["mhsSksWajib"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksWajib"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksPilihan"] = "Mhs Sks Pilihan";
	$fieldToolTipsmahasiswa["English"]["mhsSksPilihan"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksPilihan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksA"] = "Mhs Sks A";
	$fieldToolTipsmahasiswa["English"]["mhsSksA"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksA"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksB"] = "Mhs Sks B";
	$fieldToolTipsmahasiswa["English"]["mhsSksB"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksB"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksC"] = "Mhs Sks C";
	$fieldToolTipsmahasiswa["English"]["mhsSksC"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksC"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksD"] = "Mhs Sks D";
	$fieldToolTipsmahasiswa["English"]["mhsSksD"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksD"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksE"] = "Mhs Sks E";
	$fieldToolTipsmahasiswa["English"]["mhsSksE"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksE"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSksTranskrip"] = "Mhs Sks Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsSksTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsSksTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsBobotTotalTranskrip"] = "Mhs Bobot Total Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsBobotTotalTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsBobotTotalTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsIpkTranskrip"] = "Mhs Ipk Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsIpkTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsIpkTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsLamaStudiSemester"] = "Mhs Lama Studi Semester";
	$fieldToolTipsmahasiswa["English"]["mhsLamaStudiSemester"] = "";
	$placeHoldersmahasiswa["English"]["mhsLamaStudiSemester"] = "";
	$fieldLabelsmahasiswa["English"]["mhsLamaStudiBulan"] = "Mhs Lama Studi Bulan";
	$fieldToolTipsmahasiswa["English"]["mhsLamaStudiBulan"] = "";
	$placeHoldersmahasiswa["English"]["mhsLamaStudiBulan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsIsTranskripAkhirDiarsipkan"] = "Mhs Is Transkrip Akhir Diarsipkan";
	$fieldToolTipsmahasiswa["English"]["mhsIsTranskripAkhirDiarsipkan"] = "";
	$placeHoldersmahasiswa["English"]["mhsIsTranskripAkhirDiarsipkan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalTranskrip"] = "Mhs Tanggal Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNomorTranskrip"] = "Mhs Nomor Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsNomorTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsNomorTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTempatLahirTranskrip"] = "Mhs Tempat Lahir Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsTempatLahirTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsTempatLahirTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalLahirTranskrip"] = "Mhs Tanggal Lahir Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalLahirTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalLahirTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsMetodeBuildTranskrip"] = "Mhs Metode Build Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsMetodeBuildTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsMetodeBuildTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsMetodePenyetaraanTranskrip"] = "Mhs Metode Penyetaraan Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsMetodePenyetaraanTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsMetodePenyetaraanTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTahunKurikulumPenyetaraanTranskrip"] = "Mhs Tahun Kurikulum Penyetaraan Transkrip";
	$fieldToolTipsmahasiswa["English"]["mhsTahunKurikulumPenyetaraanTranskrip"] = "";
	$placeHoldersmahasiswa["English"]["mhsTahunKurikulumPenyetaraanTranskrip"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalLulus"] = "Mhs Tanggal Lulus";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalLulus"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalLulus"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoSuratYudisium"] = "Mhs No Surat Yudisium";
	$fieldToolTipsmahasiswa["English"]["mhsNoSuratYudisium"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoSuratYudisium"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalSuratYudisium"] = "Mhs Tanggal Surat Yudisium";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalSuratYudisium"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalSuratYudisium"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSemIdLulus"] = "Mhs Sem Id Lulus";
	$fieldToolTipsmahasiswa["English"]["mhsSemIdLulus"] = "";
	$placeHoldersmahasiswa["English"]["mhsSemIdLulus"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalIjasah"] = "Mhs Tanggal Ijasah";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalIjasah"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalIjasah"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoIjasah"] = "Mhs No Ijasah";
	$fieldToolTipsmahasiswa["English"]["mhsNoIjasah"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoIjasah"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKodeIjasah"] = "Mhs Kode Ijasah";
	$fieldToolTipsmahasiswa["English"]["mhsKodeIjasah"] = "";
	$placeHoldersmahasiswa["English"]["mhsKodeIjasah"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPinIjasah"] = "Mhs Pin Ijasah";
	$fieldToolTipsmahasiswa["English"]["mhsPinIjasah"] = "";
	$placeHoldersmahasiswa["English"]["mhsPinIjasah"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPrlsrId"] = "Mhs Prlsr Id";
	$fieldToolTipsmahasiswa["English"]["mhsPrlsrId"] = "";
	$placeHoldersmahasiswa["English"]["mhsPrlsrId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPrlsrNama"] = "Mhs Prlsr Nama";
	$fieldToolTipsmahasiswa["English"]["mhsPrlsrNama"] = "";
	$placeHoldersmahasiswa["English"]["mhsPrlsrNama"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPrlsrNamaAsing"] = "Mhs Prlsr Nama Asing";
	$fieldToolTipsmahasiswa["English"]["mhsPrlsrNamaAsing"] = "";
	$placeHoldersmahasiswa["English"]["mhsPrlsrNamaAsing"] = "";
	$fieldLabelsmahasiswa["English"]["mhsWsdId"] = "Mhs Wsd Id";
	$fieldToolTipsmahasiswa["English"]["mhsWsdId"] = "";
	$placeHoldersmahasiswa["English"]["mhsWsdId"] = "";
	$fieldLabelsmahasiswa["English"]["mhsTanggalPengubahan"] = "Mhs Tanggal Pengubahan";
	$fieldToolTipsmahasiswa["English"]["mhsTanggalPengubahan"] = "";
	$placeHoldersmahasiswa["English"]["mhsTanggalPengubahan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsUnitPengubah"] = "Mhs Unit Pengubah";
	$fieldToolTipsmahasiswa["English"]["mhsUnitPengubah"] = "";
	$placeHoldersmahasiswa["English"]["mhsUnitPengubah"] = "";
	$fieldLabelsmahasiswa["English"]["mhsUserPengubah"] = "Mhs User Pengubah";
	$fieldToolTipsmahasiswa["English"]["mhsUserPengubah"] = "";
	$placeHoldersmahasiswa["English"]["mhsUserPengubah"] = "";
	$fieldLabelsmahasiswa["English"]["mhsProdiGelarKelulusan"] = "Mhs Prodi Gelar Kelulusan";
	$fieldToolTipsmahasiswa["English"]["mhsProdiGelarKelulusan"] = "";
	$placeHoldersmahasiswa["English"]["mhsProdiGelarKelulusan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSemIdMulai"] = "Mhs Sem Id Mulai";
	$fieldToolTipsmahasiswa["English"]["mhsSemIdMulai"] = "";
	$placeHoldersmahasiswa["English"]["mhsSemIdMulai"] = "";
	$fieldLabelsmahasiswa["English"]["mhsBiayaStudi"] = "Mhs Biaya Studi";
	$fieldToolTipsmahasiswa["English"]["mhsBiayaStudi"] = "";
	$placeHoldersmahasiswa["English"]["mhsBiayaStudi"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPekerjaan"] = "Mhs Pekerjaan";
	$fieldToolTipsmahasiswa["English"]["mhsPekerjaan"] = "";
	$placeHoldersmahasiswa["English"]["mhsPekerjaan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPTKerja"] = "Mhs PTKerja";
	$fieldToolTipsmahasiswa["English"]["mhsPTKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsPTKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPSKerja"] = "Mhs PSKerja";
	$fieldToolTipsmahasiswa["English"]["mhsPSKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsPSKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNIDNPromotor"] = "Mhs NIDNPromotor";
	$fieldToolTipsmahasiswa["English"]["mhsNIDNPromotor"] = "";
	$placeHoldersmahasiswa["English"]["mhsNIDNPromotor"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKoPromotor1"] = "Mhs Ko Promotor1";
	$fieldToolTipsmahasiswa["English"]["mhsKoPromotor1"] = "";
	$placeHoldersmahasiswa["English"]["mhsKoPromotor1"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKoPromotor2"] = "Mhs Ko Promotor2";
	$fieldToolTipsmahasiswa["English"]["mhsKoPromotor2"] = "";
	$placeHoldersmahasiswa["English"]["mhsKoPromotor2"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKoPromotor3"] = "Mhs Ko Promotor3";
	$fieldToolTipsmahasiswa["English"]["mhsKoPromotor3"] = "";
	$placeHoldersmahasiswa["English"]["mhsKoPromotor3"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKoPromotor4"] = "Mhs Ko Promotor4";
	$fieldToolTipsmahasiswa["English"]["mhsKoPromotor4"] = "";
	$placeHoldersmahasiswa["English"]["mhsKoPromotor4"] = "";
	$fieldLabelsmahasiswa["English"]["mhsProdiAsal"] = "Mhs Prodi Asal";
	$fieldToolTipsmahasiswa["English"]["mhsProdiAsal"] = "";
	$placeHoldersmahasiswa["English"]["mhsProdiAsal"] = "";
	$fieldLabelsmahasiswa["English"]["mhsDiktiShift"] = "Mhs Dikti Shift";
	$fieldToolTipsmahasiswa["English"]["mhsDiktiShift"] = "";
	$placeHoldersmahasiswa["English"]["mhsDiktiShift"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPembayaranIpp"] = "Mhs Pembayaran Ipp";
	$fieldToolTipsmahasiswa["English"]["mhsPembayaranIpp"] = "";
	$placeHoldersmahasiswa["English"]["mhsPembayaranIpp"] = "";
	$fieldLabelsmahasiswa["English"]["mshNoIpp"] = "Msh No Ipp";
	$fieldToolTipsmahasiswa["English"]["mshNoIpp"] = "";
	$placeHoldersmahasiswa["English"]["mshNoIpp"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPersyaratan"] = "Mhs Persyaratan";
	$fieldToolTipsmahasiswa["English"]["mhsPersyaratan"] = "";
	$placeHoldersmahasiswa["English"]["mhsPersyaratan"] = "";
	$fieldLabelsmahasiswa["English"]["mhsPengOrg"] = "Mhs Peng Org";
	$fieldToolTipsmahasiswa["English"]["mhsPengOrg"] = "";
	$placeHoldersmahasiswa["English"]["mhsPengOrg"] = "";
	$fieldLabelsmahasiswa["English"]["mhsOrg"] = "Mhs Org";
	$fieldToolTipsmahasiswa["English"]["mhsOrg"] = "";
	$placeHoldersmahasiswa["English"]["mhsOrg"] = "";
	$fieldLabelsmahasiswa["English"]["mhsDomisili"] = "Mhs Domisili";
	$fieldToolTipsmahasiswa["English"]["mhsDomisili"] = "";
	$placeHoldersmahasiswa["English"]["mhsDomisili"] = "";
	$fieldLabelsmahasiswa["English"]["mhsJenisSttb"] = "Mhs Jenis Sttb";
	$fieldToolTipsmahasiswa["English"]["mhsJenisSttb"] = "";
	$placeHoldersmahasiswa["English"]["mhsJenisSttb"] = "";
	$fieldLabelsmahasiswa["English"]["mhsIsKerja"] = "Mhs Is Kerja";
	$fieldToolTipsmahasiswa["English"]["mhsIsKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsIsKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsStatusSmta"] = "Mhs Status Smta";
	$fieldToolTipsmahasiswa["English"]["mhsStatusSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsStatusSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAkreditasi"] = "Mhs Akreditasi";
	$fieldToolTipsmahasiswa["English"]["mhsAkreditasi"] = "";
	$placeHoldersmahasiswa["English"]["mhsAkreditasi"] = "";
	$fieldLabelsmahasiswa["English"]["mhsKerja"] = "Mhs Kerja";
	$fieldToolTipsmahasiswa["English"]["mhsKerja"] = "";
	$placeHoldersmahasiswa["English"]["mhsKerja"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSaudaraLk"] = "Mhs Saudara Lk";
	$fieldToolTipsmahasiswa["English"]["mhsSaudaraLk"] = "";
	$placeHoldersmahasiswa["English"]["mhsSaudaraLk"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSaudaraPr"] = "Mhs Saudara Pr";
	$fieldToolTipsmahasiswa["English"]["mhsSaudaraPr"] = "";
	$placeHoldersmahasiswa["English"]["mhsSaudaraPr"] = "";
	$fieldLabelsmahasiswa["English"]["mhsHobi"] = "Mhs Hobi";
	$fieldToolTipsmahasiswa["English"]["mhsHobi"] = "";
	$placeHoldersmahasiswa["English"]["mhsHobi"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSmtaLain"] = "Mhs Smta Lain";
	$fieldToolTipsmahasiswa["English"]["mhsSmtaLain"] = "";
	$placeHoldersmahasiswa["English"]["mhsSmtaLain"] = "";
	$fieldLabelsmahasiswa["English"]["mhsAkreditasiSmta"] = "Mhs Akreditasi Smta";
	$fieldToolTipsmahasiswa["English"]["mhsAkreditasiSmta"] = "";
	$placeHoldersmahasiswa["English"]["mhsAkreditasiSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsBiayaKuliah"] = "Mhs Biaya Kuliah";
	$fieldToolTipsmahasiswa["English"]["mhsBiayaKuliah"] = "";
	$placeHoldersmahasiswa["English"]["mhsBiayaKuliah"] = "";
	$fieldLabelsmahasiswa["English"]["MhsIdJenisSmta"] = "Mhs Id Jenis Smta";
	$fieldToolTipsmahasiswa["English"]["MhsIdJenisSmta"] = "";
	$placeHoldersmahasiswa["English"]["MhsIdJenisSmta"] = "";
	$fieldLabelsmahasiswa["English"]["mhsSmtaPropinsiKode"] = "Mhs Smta Propinsi Kode";
	$fieldToolTipsmahasiswa["English"]["mhsSmtaPropinsiKode"] = "";
	$placeHoldersmahasiswa["English"]["mhsSmtaPropinsiKode"] = "";
	$fieldLabelsmahasiswa["English"]["mhsEmailOld"] = "Mhs Email Old";
	$fieldToolTipsmahasiswa["English"]["mhsEmailOld"] = "";
	$placeHoldersmahasiswa["English"]["mhsEmailOld"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoKtp"] = "Mhs No Ktp";
	$fieldToolTipsmahasiswa["English"]["mhsNoKtp"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoKtp"] = "";
	$fieldLabelsmahasiswa["English"]["mhsNoKk"] = "Mhs No Kk";
	$fieldToolTipsmahasiswa["English"]["mhsNoKk"] = "";
	$placeHoldersmahasiswa["English"]["mhsNoKk"] = "";
	if (count($fieldToolTipsmahasiswa["English"]))
		$tdatamahasiswa[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsmahasiswa[""] = array();
	$fieldToolTipsmahasiswa[""] = array();
	$placeHoldersmahasiswa[""] = array();
	$pageTitlesmahasiswa[""] = array();
	$fieldLabelsmahasiswa[""]["mhsNiu"] = "Mhs Niu";
	$fieldToolTipsmahasiswa[""]["mhsNiu"] = "";
	$placeHoldersmahasiswa[""]["mhsNiu"] = "";
	$fieldLabelsmahasiswa[""]["mhsNif"] = "Mhs Nif";
	$fieldToolTipsmahasiswa[""]["mhsNif"] = "";
	$placeHoldersmahasiswa[""]["mhsNif"] = "";
	$fieldLabelsmahasiswa[""]["mhsNama"] = "Mhs Nama";
	$fieldToolTipsmahasiswa[""]["mhsNama"] = "";
	$placeHoldersmahasiswa[""]["mhsNama"] = "";
	$fieldLabelsmahasiswa[""]["mhsAngkatan"] = "Mhs Angkatan";
	$fieldToolTipsmahasiswa[""]["mhsAngkatan"] = "";
	$placeHoldersmahasiswa[""]["mhsAngkatan"] = "";
	$fieldLabelsmahasiswa[""]["mhsSemesterMasuk"] = "Mhs Semester Masuk";
	$fieldToolTipsmahasiswa[""]["mhsSemesterMasuk"] = "";
	$placeHoldersmahasiswa[""]["mhsSemesterMasuk"] = "";
	$fieldLabelsmahasiswa[""]["mhsPasswordRegistrasi"] = "Mhs Password Registrasi";
	$fieldToolTipsmahasiswa[""]["mhsPasswordRegistrasi"] = "";
	$placeHoldersmahasiswa[""]["mhsPasswordRegistrasi"] = "";
	$fieldLabelsmahasiswa[""]["mhsKurId"] = "Mhs Kur Id";
	$fieldToolTipsmahasiswa[""]["mhsKurId"] = "";
	$placeHoldersmahasiswa[""]["mhsKurId"] = "";
	$fieldLabelsmahasiswa[""]["mhsProdiKode"] = "Mhs Prodi Kode";
	$fieldToolTipsmahasiswa[""]["mhsProdiKode"] = "";
	$placeHoldersmahasiswa[""]["mhsProdiKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsProdiKodeUniv"] = "Mhs Prodi Kode Univ";
	$fieldToolTipsmahasiswa[""]["mhsProdiKodeUniv"] = "";
	$placeHoldersmahasiswa[""]["mhsProdiKodeUniv"] = "";
	$fieldLabelsmahasiswa[""]["mhsProdikonsentrasiId"] = "Mhs Prodikonsentrasi Id";
	$fieldToolTipsmahasiswa[""]["mhsProdikonsentrasiId"] = "";
	$placeHoldersmahasiswa[""]["mhsProdikonsentrasiId"] = "";
	$fieldLabelsmahasiswa[""]["mhsWktkulId"] = "Mhs Wktkul Id";
	$fieldToolTipsmahasiswa[""]["mhsWktkulId"] = "";
	$placeHoldersmahasiswa[""]["mhsWktkulId"] = "";
	$fieldLabelsmahasiswa[""]["mhsNomorTes"] = "Mhs Nomor Tes";
	$fieldToolTipsmahasiswa[""]["mhsNomorTes"] = "";
	$placeHoldersmahasiswa[""]["mhsNomorTes"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalTerdaftar"] = "Mhs Tanggal Terdaftar";
	$fieldToolTipsmahasiswa[""]["mhsTanggalTerdaftar"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalTerdaftar"] = "";
	$fieldLabelsmahasiswa[""]["mhsStatusMasukPt"] = "Mhs Status Masuk Pt";
	$fieldToolTipsmahasiswa[""]["mhsStatusMasukPt"] = "";
	$placeHoldersmahasiswa[""]["mhsStatusMasukPt"] = "";
	$fieldLabelsmahasiswa[""]["mhsIsAsing"] = "Mhs Is Asing";
	$fieldToolTipsmahasiswa[""]["mhsIsAsing"] = "";
	$placeHoldersmahasiswa[""]["mhsIsAsing"] = "";
	$fieldLabelsmahasiswa[""]["mhsJumlahSksPindahan"] = "Mhs Jumlah Sks Pindahan";
	$fieldToolTipsmahasiswa[""]["mhsJumlahSksPindahan"] = "";
	$placeHoldersmahasiswa[""]["mhsJumlahSksPindahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsKodePtPindahan"] = "Mhs Kode Pt Pindahan";
	$fieldToolTipsmahasiswa[""]["mhsKodePtPindahan"] = "";
	$placeHoldersmahasiswa[""]["mhsKodePtPindahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsKodeProdiDiktiPindahan"] = "Mhs Kode Prodi Dikti Pindahan";
	$fieldToolTipsmahasiswa[""]["mhsKodeProdiDiktiPindahan"] = "";
	$placeHoldersmahasiswa[""]["mhsKodeProdiDiktiPindahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsNamaPtPindahan"] = "Mhs Nama Pt Pindahan";
	$fieldToolTipsmahasiswa[""]["mhsNamaPtPindahan"] = "";
	$placeHoldersmahasiswa[""]["mhsNamaPtPindahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsJjarKodeDiktiPindahan"] = "Mhs Jjar Kode Dikti Pindahan";
	$fieldToolTipsmahasiswa[""]["mhsJjarKodeDiktiPindahan"] = "";
	$placeHoldersmahasiswa[""]["mhsJjarKodeDiktiPindahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsTahunMasukPtPindahan"] = "Mhs Tahun Masuk Pt Pindahan";
	$fieldToolTipsmahasiswa[""]["mhsTahunMasukPtPindahan"] = "";
	$placeHoldersmahasiswa[""]["mhsTahunMasukPtPindahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsNimLama"] = "Mhs Nim Lama";
	$fieldToolTipsmahasiswa[""]["mhsNimLama"] = "";
	$placeHoldersmahasiswa[""]["mhsNimLama"] = "";
	$fieldLabelsmahasiswa[""]["mhsJenisKelamin"] = "Mhs Jenis Kelamin";
	$fieldToolTipsmahasiswa[""]["mhsJenisKelamin"] = "";
	$placeHoldersmahasiswa[""]["mhsJenisKelamin"] = "";
	$fieldLabelsmahasiswa[""]["mhsKotaKodeLahir"] = "Mhs Kota Kode Lahir";
	$fieldToolTipsmahasiswa[""]["mhsKotaKodeLahir"] = "";
	$placeHoldersmahasiswa[""]["mhsKotaKodeLahir"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalLahir"] = "Mhs Tanggal Lahir";
	$fieldToolTipsmahasiswa[""]["mhsTanggalLahir"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalLahir"] = "";
	$fieldLabelsmahasiswa[""]["mhsAgmrId"] = "Mhs Agmr Id";
	$fieldToolTipsmahasiswa[""]["mhsAgmrId"] = "";
	$placeHoldersmahasiswa[""]["mhsAgmrId"] = "";
	$fieldLabelsmahasiswa[""]["mhsSmtaKode"] = "Mhs Smta Kode";
	$fieldToolTipsmahasiswa[""]["mhsSmtaKode"] = "";
	$placeHoldersmahasiswa[""]["mhsSmtaKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsTdftSmta"] = "Mhs Tdft Smta";
	$fieldToolTipsmahasiswa[""]["mhsTdftSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsTdftSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsTahunTamatSmta"] = "Mhs Tahun Tamat Smta";
	$fieldToolTipsmahasiswa[""]["mhsTahunTamatSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsTahunTamatSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsTahunLulusSmta"] = "Mhs Tahun Lulus Smta";
	$fieldToolTipsmahasiswa[""]["mhsTahunLulusSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsTahunLulusSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsJursmtarKode"] = "Mhs Jursmtar Kode";
	$fieldToolTipsmahasiswa[""]["mhsJursmtarKode"] = "";
	$placeHoldersmahasiswa[""]["mhsJursmtarKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsAlamatSmta"] = "Mhs Alamat Smta";
	$fieldToolTipsmahasiswa[""]["mhsAlamatSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsAlamatSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoIjasahSmta"] = "Mhs No Ijasah Smta";
	$fieldToolTipsmahasiswa[""]["mhsNoIjasahSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsNoIjasahSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsIjasahSmta"] = "Mhs Ijasah Smta";
	$fieldToolTipsmahasiswa[""]["mhsIjasahSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsIjasahSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalIjasahSmta"] = "Mhs Tanggal Ijasah Smta";
	$fieldToolTipsmahasiswa[""]["mhsTanggalIjasahSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalIjasahSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsNilaiUjianAkhirSmta"] = "Mhs Nilai Ujian Akhir Smta";
	$fieldToolTipsmahasiswa[""]["mhsNilaiUjianAkhirSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsNilaiUjianAkhirSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsJumlahMpUjianAkhirSmta"] = "Mhs Jumlah Mp Ujian Akhir Smta";
	$fieldToolTipsmahasiswa[""]["mhsJumlahMpUjianAkhirSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsJumlahMpUjianAkhirSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsStnkrId"] = "Mhs Stnkr Id";
	$fieldToolTipsmahasiswa[""]["mhsStnkrId"] = "";
	$placeHoldersmahasiswa[""]["mhsStnkrId"] = "";
	$fieldLabelsmahasiswa[""]["mhsJumlahSaudara"] = "Mhs Jumlah Saudara";
	$fieldToolTipsmahasiswa[""]["mhsJumlahSaudara"] = "";
	$placeHoldersmahasiswa[""]["mhsJumlahSaudara"] = "";
	$fieldLabelsmahasiswa[""]["mhsAlamatMhs"] = "Mhs Alamat Mhs";
	$fieldToolTipsmahasiswa[""]["mhsAlamatMhs"] = "";
	$placeHoldersmahasiswa[""]["mhsAlamatMhs"] = "";
	$fieldLabelsmahasiswa[""]["mhsAlamatTerakhir"] = "Mhs Alamat Terakhir";
	$fieldToolTipsmahasiswa[""]["mhsAlamatTerakhir"] = "";
	$placeHoldersmahasiswa[""]["mhsAlamatTerakhir"] = "";
	$fieldLabelsmahasiswa[""]["mhsAlamatDiKotaIni"] = "Mhs Alamat Di Kota Ini";
	$fieldToolTipsmahasiswa[""]["mhsAlamatDiKotaIni"] = "";
	$placeHoldersmahasiswa[""]["mhsAlamatDiKotaIni"] = "";
	$fieldLabelsmahasiswa[""]["mhsKotaKode"] = "Mhs Kota Kode";
	$fieldToolTipsmahasiswa[""]["mhsKotaKode"] = "";
	$placeHoldersmahasiswa[""]["mhsKotaKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsNgrKode"] = "Mhs Ngr Kode";
	$fieldToolTipsmahasiswa[""]["mhsNgrKode"] = "";
	$placeHoldersmahasiswa[""]["mhsNgrKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsKodePos"] = "Mhs Kode Pos";
	$fieldToolTipsmahasiswa[""]["mhsKodePos"] = "";
	$placeHoldersmahasiswa[""]["mhsKodePos"] = "";
	$fieldLabelsmahasiswa[""]["mhsStatrumahId"] = "Mhs Statrumah Id";
	$fieldToolTipsmahasiswa[""]["mhsStatrumahId"] = "";
	$placeHoldersmahasiswa[""]["mhsStatrumahId"] = "";
	$fieldLabelsmahasiswa[""]["mhsSbdnrId"] = "Mhs Sbdnr Id";
	$fieldToolTipsmahasiswa[""]["mhsSbdnrId"] = "";
	$placeHoldersmahasiswa[""]["mhsSbdnrId"] = "";
	$fieldLabelsmahasiswa[""]["mhsHubbiayaId"] = "Mhs Hubbiaya Id";
	$fieldToolTipsmahasiswa[""]["mhsHubbiayaId"] = "";
	$placeHoldersmahasiswa[""]["mhsHubbiayaId"] = "";
	$fieldLabelsmahasiswa[""]["mhsTempatKerja"] = "Mhs Tempat Kerja";
	$fieldToolTipsmahasiswa[""]["mhsTempatKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsTempatKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsAlamatTempatKerja"] = "Mhs Alamat Tempat Kerja";
	$fieldToolTipsmahasiswa[""]["mhsAlamatTempatKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsAlamatTempatKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoTelpTempatKerja"] = "Mhs No Telp Tempat Kerja";
	$fieldToolTipsmahasiswa[""]["mhsNoTelpTempatKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsNoTelpTempatKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsBeasiswa"] = "Mhs Beasiswa";
	$fieldToolTipsmahasiswa[""]["mhsBeasiswa"] = "";
	$placeHoldersmahasiswa[""]["mhsBeasiswa"] = "";
	$fieldLabelsmahasiswa[""]["mhsWnrId"] = "Mhs Wnr Id";
	$fieldToolTipsmahasiswa[""]["mhsWnrId"] = "";
	$placeHoldersmahasiswa[""]["mhsWnrId"] = "";
	$fieldLabelsmahasiswa[""]["mhsJlrrKode"] = "Mhs Jlrr Kode";
	$fieldToolTipsmahasiswa[""]["mhsJlrrKode"] = "";
	$placeHoldersmahasiswa[""]["mhsJlrrKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoAskes"] = "Mhs No Askes";
	$fieldToolTipsmahasiswa[""]["mhsNoAskes"] = "";
	$placeHoldersmahasiswa[""]["mhsNoAskes"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoTelp"] = "Mhs No Telp";
	$fieldToolTipsmahasiswa[""]["mhsNoTelp"] = "";
	$placeHoldersmahasiswa[""]["mhsNoTelp"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoHp"] = "Mhs No Hp";
	$fieldToolTipsmahasiswa[""]["mhsNoHp"] = "";
	$placeHoldersmahasiswa[""]["mhsNoHp"] = "";
	$fieldLabelsmahasiswa[""]["mhsEmail"] = "Mhs Email";
	$fieldToolTipsmahasiswa[""]["mhsEmail"] = "";
	$placeHoldersmahasiswa[""]["mhsEmail"] = "";
	$fieldLabelsmahasiswa[""]["mhsHomepage"] = "Mhs Homepage";
	$fieldToolTipsmahasiswa[""]["mhsHomepage"] = "";
	$placeHoldersmahasiswa[""]["mhsHomepage"] = "";
	$fieldLabelsmahasiswa[""]["mhsFoto"] = "Mhs Foto";
	$fieldToolTipsmahasiswa[""]["mhsFoto"] = "";
	$placeHoldersmahasiswa[""]["mhsFoto"] = "";
	$fieldLabelsmahasiswa[""]["mhsStakmhsrKode"] = "Mhs Stakmhsr Kode";
	$fieldToolTipsmahasiswa[""]["mhsStakmhsrKode"] = "";
	$placeHoldersmahasiswa[""]["mhsStakmhsrKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsDsnPegNipPembimbingAkademik"] = "Mhs Dsn Peg Nip Pembimbing Akademik";
	$fieldToolTipsmahasiswa[""]["mhsDsnPegNipPembimbingAkademik"] = "";
	$placeHoldersmahasiswa[""]["mhsDsnPegNipPembimbingAkademik"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksWajib"] = "Mhs Sks Wajib";
	$fieldToolTipsmahasiswa[""]["mhsSksWajib"] = "";
	$placeHoldersmahasiswa[""]["mhsSksWajib"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksPilihan"] = "Mhs Sks Pilihan";
	$fieldToolTipsmahasiswa[""]["mhsSksPilihan"] = "";
	$placeHoldersmahasiswa[""]["mhsSksPilihan"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksA"] = "Mhs Sks A";
	$fieldToolTipsmahasiswa[""]["mhsSksA"] = "";
	$placeHoldersmahasiswa[""]["mhsSksA"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksB"] = "Mhs Sks B";
	$fieldToolTipsmahasiswa[""]["mhsSksB"] = "";
	$placeHoldersmahasiswa[""]["mhsSksB"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksC"] = "Mhs Sks C";
	$fieldToolTipsmahasiswa[""]["mhsSksC"] = "";
	$placeHoldersmahasiswa[""]["mhsSksC"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksD"] = "Mhs Sks D";
	$fieldToolTipsmahasiswa[""]["mhsSksD"] = "";
	$placeHoldersmahasiswa[""]["mhsSksD"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksE"] = "Mhs Sks E";
	$fieldToolTipsmahasiswa[""]["mhsSksE"] = "";
	$placeHoldersmahasiswa[""]["mhsSksE"] = "";
	$fieldLabelsmahasiswa[""]["mhsSksTranskrip"] = "Mhs Sks Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsSksTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsSksTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsBobotTotalTranskrip"] = "Mhs Bobot Total Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsBobotTotalTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsBobotTotalTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsIpkTranskrip"] = "Mhs Ipk Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsIpkTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsIpkTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsLamaStudiSemester"] = "Mhs Lama Studi Semester";
	$fieldToolTipsmahasiswa[""]["mhsLamaStudiSemester"] = "";
	$placeHoldersmahasiswa[""]["mhsLamaStudiSemester"] = "";
	$fieldLabelsmahasiswa[""]["mhsLamaStudiBulan"] = "Mhs Lama Studi Bulan";
	$fieldToolTipsmahasiswa[""]["mhsLamaStudiBulan"] = "";
	$placeHoldersmahasiswa[""]["mhsLamaStudiBulan"] = "";
	$fieldLabelsmahasiswa[""]["mhsIsTranskripAkhirDiarsipkan"] = "Mhs Is Transkrip Akhir Diarsipkan";
	$fieldToolTipsmahasiswa[""]["mhsIsTranskripAkhirDiarsipkan"] = "";
	$placeHoldersmahasiswa[""]["mhsIsTranskripAkhirDiarsipkan"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalTranskrip"] = "Mhs Tanggal Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsTanggalTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsNomorTranskrip"] = "Mhs Nomor Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsNomorTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsNomorTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsTempatLahirTranskrip"] = "Mhs Tempat Lahir Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsTempatLahirTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsTempatLahirTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalLahirTranskrip"] = "Mhs Tanggal Lahir Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsTanggalLahirTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalLahirTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsMetodeBuildTranskrip"] = "Mhs Metode Build Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsMetodeBuildTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsMetodeBuildTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsMetodePenyetaraanTranskrip"] = "Mhs Metode Penyetaraan Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsMetodePenyetaraanTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsMetodePenyetaraanTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsTahunKurikulumPenyetaraanTranskrip"] = "Mhs Tahun Kurikulum Penyetaraan Transkrip";
	$fieldToolTipsmahasiswa[""]["mhsTahunKurikulumPenyetaraanTranskrip"] = "";
	$placeHoldersmahasiswa[""]["mhsTahunKurikulumPenyetaraanTranskrip"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalLulus"] = "Mhs Tanggal Lulus";
	$fieldToolTipsmahasiswa[""]["mhsTanggalLulus"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalLulus"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoSuratYudisium"] = "Mhs No Surat Yudisium";
	$fieldToolTipsmahasiswa[""]["mhsNoSuratYudisium"] = "";
	$placeHoldersmahasiswa[""]["mhsNoSuratYudisium"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalSuratYudisium"] = "Mhs Tanggal Surat Yudisium";
	$fieldToolTipsmahasiswa[""]["mhsTanggalSuratYudisium"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalSuratYudisium"] = "";
	$fieldLabelsmahasiswa[""]["mhsSemIdLulus"] = "Mhs Sem Id Lulus";
	$fieldToolTipsmahasiswa[""]["mhsSemIdLulus"] = "";
	$placeHoldersmahasiswa[""]["mhsSemIdLulus"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalIjasah"] = "Mhs Tanggal Ijasah";
	$fieldToolTipsmahasiswa[""]["mhsTanggalIjasah"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalIjasah"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoIjasah"] = "Mhs No Ijasah";
	$fieldToolTipsmahasiswa[""]["mhsNoIjasah"] = "";
	$placeHoldersmahasiswa[""]["mhsNoIjasah"] = "";
	$fieldLabelsmahasiswa[""]["mhsKodeIjasah"] = "Mhs Kode Ijasah";
	$fieldToolTipsmahasiswa[""]["mhsKodeIjasah"] = "";
	$placeHoldersmahasiswa[""]["mhsKodeIjasah"] = "";
	$fieldLabelsmahasiswa[""]["mhsPinIjasah"] = "Mhs Pin Ijasah";
	$fieldToolTipsmahasiswa[""]["mhsPinIjasah"] = "";
	$placeHoldersmahasiswa[""]["mhsPinIjasah"] = "";
	$fieldLabelsmahasiswa[""]["mhsPrlsrId"] = "Mhs Prlsr Id";
	$fieldToolTipsmahasiswa[""]["mhsPrlsrId"] = "";
	$placeHoldersmahasiswa[""]["mhsPrlsrId"] = "";
	$fieldLabelsmahasiswa[""]["mhsPrlsrNama"] = "Mhs Prlsr Nama";
	$fieldToolTipsmahasiswa[""]["mhsPrlsrNama"] = "";
	$placeHoldersmahasiswa[""]["mhsPrlsrNama"] = "";
	$fieldLabelsmahasiswa[""]["mhsPrlsrNamaAsing"] = "Mhs Prlsr Nama Asing";
	$fieldToolTipsmahasiswa[""]["mhsPrlsrNamaAsing"] = "";
	$placeHoldersmahasiswa[""]["mhsPrlsrNamaAsing"] = "";
	$fieldLabelsmahasiswa[""]["mhsWsdId"] = "Mhs Wsd Id";
	$fieldToolTipsmahasiswa[""]["mhsWsdId"] = "";
	$placeHoldersmahasiswa[""]["mhsWsdId"] = "";
	$fieldLabelsmahasiswa[""]["mhsTanggalPengubahan"] = "Mhs Tanggal Pengubahan";
	$fieldToolTipsmahasiswa[""]["mhsTanggalPengubahan"] = "";
	$placeHoldersmahasiswa[""]["mhsTanggalPengubahan"] = "";
	$fieldLabelsmahasiswa[""]["mhsUnitPengubah"] = "Mhs Unit Pengubah";
	$fieldToolTipsmahasiswa[""]["mhsUnitPengubah"] = "";
	$placeHoldersmahasiswa[""]["mhsUnitPengubah"] = "";
	$fieldLabelsmahasiswa[""]["mhsUserPengubah"] = "Mhs User Pengubah";
	$fieldToolTipsmahasiswa[""]["mhsUserPengubah"] = "";
	$placeHoldersmahasiswa[""]["mhsUserPengubah"] = "";
	$fieldLabelsmahasiswa[""]["mhsProdiGelarKelulusan"] = "Mhs Prodi Gelar Kelulusan";
	$fieldToolTipsmahasiswa[""]["mhsProdiGelarKelulusan"] = "";
	$placeHoldersmahasiswa[""]["mhsProdiGelarKelulusan"] = "";
	$fieldLabelsmahasiswa[""]["mhsSemIdMulai"] = "Mhs Sem Id Mulai";
	$fieldToolTipsmahasiswa[""]["mhsSemIdMulai"] = "";
	$placeHoldersmahasiswa[""]["mhsSemIdMulai"] = "";
	$fieldLabelsmahasiswa[""]["mhsBiayaStudi"] = "Mhs Biaya Studi";
	$fieldToolTipsmahasiswa[""]["mhsBiayaStudi"] = "";
	$placeHoldersmahasiswa[""]["mhsBiayaStudi"] = "";
	$fieldLabelsmahasiswa[""]["mhsPekerjaan"] = "Mhs Pekerjaan";
	$fieldToolTipsmahasiswa[""]["mhsPekerjaan"] = "";
	$placeHoldersmahasiswa[""]["mhsPekerjaan"] = "";
	$fieldLabelsmahasiswa[""]["mhsPTKerja"] = "Mhs PTKerja";
	$fieldToolTipsmahasiswa[""]["mhsPTKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsPTKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsPSKerja"] = "Mhs PSKerja";
	$fieldToolTipsmahasiswa[""]["mhsPSKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsPSKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsNIDNPromotor"] = "Mhs NIDNPromotor";
	$fieldToolTipsmahasiswa[""]["mhsNIDNPromotor"] = "";
	$placeHoldersmahasiswa[""]["mhsNIDNPromotor"] = "";
	$fieldLabelsmahasiswa[""]["mhsKoPromotor1"] = "Mhs Ko Promotor1";
	$fieldToolTipsmahasiswa[""]["mhsKoPromotor1"] = "";
	$placeHoldersmahasiswa[""]["mhsKoPromotor1"] = "";
	$fieldLabelsmahasiswa[""]["mhsKoPromotor2"] = "Mhs Ko Promotor2";
	$fieldToolTipsmahasiswa[""]["mhsKoPromotor2"] = "";
	$placeHoldersmahasiswa[""]["mhsKoPromotor2"] = "";
	$fieldLabelsmahasiswa[""]["mhsKoPromotor3"] = "Mhs Ko Promotor3";
	$fieldToolTipsmahasiswa[""]["mhsKoPromotor3"] = "";
	$placeHoldersmahasiswa[""]["mhsKoPromotor3"] = "";
	$fieldLabelsmahasiswa[""]["mhsKoPromotor4"] = "Mhs Ko Promotor4";
	$fieldToolTipsmahasiswa[""]["mhsKoPromotor4"] = "";
	$placeHoldersmahasiswa[""]["mhsKoPromotor4"] = "";
	$fieldLabelsmahasiswa[""]["mhsProdiAsal"] = "Mhs Prodi Asal";
	$fieldToolTipsmahasiswa[""]["mhsProdiAsal"] = "";
	$placeHoldersmahasiswa[""]["mhsProdiAsal"] = "";
	$fieldLabelsmahasiswa[""]["mhsDiktiShift"] = "Mhs Dikti Shift";
	$fieldToolTipsmahasiswa[""]["mhsDiktiShift"] = "";
	$placeHoldersmahasiswa[""]["mhsDiktiShift"] = "";
	$fieldLabelsmahasiswa[""]["mhsPembayaranIpp"] = "Mhs Pembayaran Ipp";
	$fieldToolTipsmahasiswa[""]["mhsPembayaranIpp"] = "";
	$placeHoldersmahasiswa[""]["mhsPembayaranIpp"] = "";
	$fieldLabelsmahasiswa[""]["mshNoIpp"] = "Msh No Ipp";
	$fieldToolTipsmahasiswa[""]["mshNoIpp"] = "";
	$placeHoldersmahasiswa[""]["mshNoIpp"] = "";
	$fieldLabelsmahasiswa[""]["mhsPersyaratan"] = "Mhs Persyaratan";
	$fieldToolTipsmahasiswa[""]["mhsPersyaratan"] = "";
	$placeHoldersmahasiswa[""]["mhsPersyaratan"] = "";
	$fieldLabelsmahasiswa[""]["mhsPengOrg"] = "Mhs Peng Org";
	$fieldToolTipsmahasiswa[""]["mhsPengOrg"] = "";
	$placeHoldersmahasiswa[""]["mhsPengOrg"] = "";
	$fieldLabelsmahasiswa[""]["mhsOrg"] = "Mhs Org";
	$fieldToolTipsmahasiswa[""]["mhsOrg"] = "";
	$placeHoldersmahasiswa[""]["mhsOrg"] = "";
	$fieldLabelsmahasiswa[""]["mhsDomisili"] = "Mhs Domisili";
	$fieldToolTipsmahasiswa[""]["mhsDomisili"] = "";
	$placeHoldersmahasiswa[""]["mhsDomisili"] = "";
	$fieldLabelsmahasiswa[""]["mhsJenisSttb"] = "Mhs Jenis Sttb";
	$fieldToolTipsmahasiswa[""]["mhsJenisSttb"] = "";
	$placeHoldersmahasiswa[""]["mhsJenisSttb"] = "";
	$fieldLabelsmahasiswa[""]["mhsIsKerja"] = "Mhs Is Kerja";
	$fieldToolTipsmahasiswa[""]["mhsIsKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsIsKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsStatusSmta"] = "Mhs Status Smta";
	$fieldToolTipsmahasiswa[""]["mhsStatusSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsStatusSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsAkreditasi"] = "Mhs Akreditasi";
	$fieldToolTipsmahasiswa[""]["mhsAkreditasi"] = "";
	$placeHoldersmahasiswa[""]["mhsAkreditasi"] = "";
	$fieldLabelsmahasiswa[""]["mhsKerja"] = "Mhs Kerja";
	$fieldToolTipsmahasiswa[""]["mhsKerja"] = "";
	$placeHoldersmahasiswa[""]["mhsKerja"] = "";
	$fieldLabelsmahasiswa[""]["mhsSaudaraLk"] = "Mhs Saudara Lk";
	$fieldToolTipsmahasiswa[""]["mhsSaudaraLk"] = "";
	$placeHoldersmahasiswa[""]["mhsSaudaraLk"] = "";
	$fieldLabelsmahasiswa[""]["mhsSaudaraPr"] = "Mhs Saudara Pr";
	$fieldToolTipsmahasiswa[""]["mhsSaudaraPr"] = "";
	$placeHoldersmahasiswa[""]["mhsSaudaraPr"] = "";
	$fieldLabelsmahasiswa[""]["mhsHobi"] = "Mhs Hobi";
	$fieldToolTipsmahasiswa[""]["mhsHobi"] = "";
	$placeHoldersmahasiswa[""]["mhsHobi"] = "";
	$fieldLabelsmahasiswa[""]["mhsSmtaLain"] = "Mhs Smta Lain";
	$fieldToolTipsmahasiswa[""]["mhsSmtaLain"] = "";
	$placeHoldersmahasiswa[""]["mhsSmtaLain"] = "";
	$fieldLabelsmahasiswa[""]["mhsAkreditasiSmta"] = "Mhs Akreditasi Smta";
	$fieldToolTipsmahasiswa[""]["mhsAkreditasiSmta"] = "";
	$placeHoldersmahasiswa[""]["mhsAkreditasiSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsBiayaKuliah"] = "Mhs Biaya Kuliah";
	$fieldToolTipsmahasiswa[""]["mhsBiayaKuliah"] = "";
	$placeHoldersmahasiswa[""]["mhsBiayaKuliah"] = "";
	$fieldLabelsmahasiswa[""]["MhsIdJenisSmta"] = "Mhs Id Jenis Smta";
	$fieldToolTipsmahasiswa[""]["MhsIdJenisSmta"] = "";
	$placeHoldersmahasiswa[""]["MhsIdJenisSmta"] = "";
	$fieldLabelsmahasiswa[""]["mhsSmtaPropinsiKode"] = "Mhs Smta Propinsi Kode";
	$fieldToolTipsmahasiswa[""]["mhsSmtaPropinsiKode"] = "";
	$placeHoldersmahasiswa[""]["mhsSmtaPropinsiKode"] = "";
	$fieldLabelsmahasiswa[""]["mhsEmailOld"] = "Mhs Email Old";
	$fieldToolTipsmahasiswa[""]["mhsEmailOld"] = "";
	$placeHoldersmahasiswa[""]["mhsEmailOld"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoKtp"] = "Mhs No Ktp";
	$fieldToolTipsmahasiswa[""]["mhsNoKtp"] = "";
	$placeHoldersmahasiswa[""]["mhsNoKtp"] = "";
	$fieldLabelsmahasiswa[""]["mhsNoKk"] = "Mhs No Kk";
	$fieldToolTipsmahasiswa[""]["mhsNoKk"] = "";
	$placeHoldersmahasiswa[""]["mhsNoKk"] = "";
	if (count($fieldToolTipsmahasiswa[""]))
		$tdatamahasiswa[".isUseToolTips"] = true;
}


	$tdatamahasiswa[".NCSearch"] = true;



$tdatamahasiswa[".shortTableName"] = "mahasiswa";
$tdatamahasiswa[".nSecOptions"] = 0;
$tdatamahasiswa[".recsPerRowPrint"] = 1;
$tdatamahasiswa[".mainTableOwnerID"] = "";
$tdatamahasiswa[".moveNext"] = 1;
$tdatamahasiswa[".entityType"] = 0;

$tdatamahasiswa[".strOriginalTableName"] = "mahasiswa";

	



$tdatamahasiswa[".showAddInPopup"] = false;

$tdatamahasiswa[".showEditInPopup"] = false;

$tdatamahasiswa[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatamahasiswa[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatamahasiswa[".fieldsForRegister"] = array();

$tdatamahasiswa[".listAjax"] = false;

	$tdatamahasiswa[".audit"] = false;

	$tdatamahasiswa[".locking"] = false;

$tdatamahasiswa[".edit"] = true;
$tdatamahasiswa[".afterEditAction"] = 1;
$tdatamahasiswa[".closePopupAfterEdit"] = 1;
$tdatamahasiswa[".afterEditActionDetTable"] = "";

$tdatamahasiswa[".add"] = true;
$tdatamahasiswa[".afterAddAction"] = 1;
$tdatamahasiswa[".closePopupAfterAdd"] = 1;
$tdatamahasiswa[".afterAddActionDetTable"] = "";

$tdatamahasiswa[".list"] = true;



$tdatamahasiswa[".reorderRecordsByHeader"] = true;


$tdatamahasiswa[".exportFormatting"] = 2;
$tdatamahasiswa[".exportDelimiter"] = ",";
		
$tdatamahasiswa[".view"] = true;

$tdatamahasiswa[".import"] = true;

$tdatamahasiswa[".exportTo"] = true;

$tdatamahasiswa[".printFriendly"] = true;

$tdatamahasiswa[".delete"] = true;

$tdatamahasiswa[".showSimpleSearchOptions"] = false;

// Allow Show/Hide Fields in GRID
$tdatamahasiswa[".allowShowHideFields"] = false;
//

// Allow Fields Reordering in GRID
$tdatamahasiswa[".allowFieldsReordering"] = false;
//

// search Saving settings
$tdatamahasiswa[".searchSaving"] = false;
//

$tdatamahasiswa[".showSearchPanel"] = true;
		$tdatamahasiswa[".flexibleSearch"] = true;

$tdatamahasiswa[".isUseAjaxSuggest"] = true;

$tdatamahasiswa[".rowHighlite"] = true;





$tdatamahasiswa[".ajaxCodeSnippetAdded"] = false;

$tdatamahasiswa[".buttonsAdded"] = false;

$tdatamahasiswa[".addPageEvents"] = false;

// use timepicker for search panel
$tdatamahasiswa[".isUseTimeForSearch"] = false;



$tdatamahasiswa[".badgeColor"] = "6B8E23";


$tdatamahasiswa[".allSearchFields"] = array();
$tdatamahasiswa[".filterFields"] = array();
$tdatamahasiswa[".requiredSearchFields"] = array();

$tdatamahasiswa[".allSearchFields"][] = "mhsNiu";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNif";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNama";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAngkatan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSemesterMasuk";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPasswordRegistrasi";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKurId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsProdiKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsProdiKodeUniv";
	$tdatamahasiswa[".allSearchFields"][] = "mhsProdikonsentrasiId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsWktkulId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNomorTes";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalTerdaftar";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStatusMasukPt";
	$tdatamahasiswa[".allSearchFields"][] = "mhsIsAsing";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJumlahSksPindahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKodePtPindahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKodeProdiDiktiPindahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNamaPtPindahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJjarKodeDiktiPindahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTahunMasukPtPindahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNimLama";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJenisKelamin";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKotaKodeLahir";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalLahir";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAgmrId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSmtaKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTdftSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTahunTamatSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTahunLulusSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJursmtarKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAlamatSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoIjasahSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsIjasahSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalIjasahSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNilaiUjianAkhirSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJumlahMpUjianAkhirSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStnkrId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJumlahSaudara";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAlamatMhs";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAlamatTerakhir";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAlamatDiKotaIni";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKotaKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNgrKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKodePos";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStatrumahId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSbdnrId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsHubbiayaId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTempatKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAlamatTempatKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoTelpTempatKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsBeasiswa";
	$tdatamahasiswa[".allSearchFields"][] = "mhsWnrId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJlrrKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoAskes";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoTelp";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoHp";
	$tdatamahasiswa[".allSearchFields"][] = "mhsEmail";
	$tdatamahasiswa[".allSearchFields"][] = "mhsHomepage";
	$tdatamahasiswa[".allSearchFields"][] = "mhsFoto";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStakmhsrKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsDsnPegNipPembimbingAkademik";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksWajib";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksPilihan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksA";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksB";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksC";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksD";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksE";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSksTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsBobotTotalTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsIpkTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsLamaStudiSemester";
	$tdatamahasiswa[".allSearchFields"][] = "mhsLamaStudiBulan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsIsTranskripAkhirDiarsipkan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNomorTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTempatLahirTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalLahirTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsMetodeBuildTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsMetodePenyetaraanTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalLulus";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoSuratYudisium";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalSuratYudisium";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSemIdLulus";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalIjasah";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoIjasah";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKodeIjasah";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPinIjasah";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPrlsrId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPrlsrNama";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPrlsrNamaAsing";
	$tdatamahasiswa[".allSearchFields"][] = "mhsWsdId";
	$tdatamahasiswa[".allSearchFields"][] = "mhsTanggalPengubahan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsUnitPengubah";
	$tdatamahasiswa[".allSearchFields"][] = "mhsUserPengubah";
	$tdatamahasiswa[".allSearchFields"][] = "mhsProdiGelarKelulusan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSemIdMulai";
	$tdatamahasiswa[".allSearchFields"][] = "mhsBiayaStudi";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPekerjaan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPTKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPSKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNIDNPromotor";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKoPromotor1";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKoPromotor2";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKoPromotor3";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKoPromotor4";
	$tdatamahasiswa[".allSearchFields"][] = "mhsProdiAsal";
	$tdatamahasiswa[".allSearchFields"][] = "mhsDiktiShift";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPembayaranIpp";
	$tdatamahasiswa[".allSearchFields"][] = "mshNoIpp";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPersyaratan";
	$tdatamahasiswa[".allSearchFields"][] = "mhsPengOrg";
	$tdatamahasiswa[".allSearchFields"][] = "mhsOrg";
	$tdatamahasiswa[".allSearchFields"][] = "mhsDomisili";
	$tdatamahasiswa[".allSearchFields"][] = "mhsJenisSttb";
	$tdatamahasiswa[".allSearchFields"][] = "mhsIsKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsStatusSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAkreditasi";
	$tdatamahasiswa[".allSearchFields"][] = "mhsKerja";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSaudaraLk";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSaudaraPr";
	$tdatamahasiswa[".allSearchFields"][] = "mhsHobi";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSmtaLain";
	$tdatamahasiswa[".allSearchFields"][] = "mhsAkreditasiSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsBiayaKuliah";
	$tdatamahasiswa[".allSearchFields"][] = "MhsIdJenisSmta";
	$tdatamahasiswa[".allSearchFields"][] = "mhsSmtaPropinsiKode";
	$tdatamahasiswa[".allSearchFields"][] = "mhsEmailOld";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoKtp";
	$tdatamahasiswa[".allSearchFields"][] = "mhsNoKk";
	

$tdatamahasiswa[".googleLikeFields"] = array();
$tdatamahasiswa[".googleLikeFields"][] = "mhsNiu";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNif";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNama";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAngkatan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKurId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsProdiKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".googleLikeFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsWktkulId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNomorTes";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".googleLikeFields"][] = "mhsIsAsing";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNimLama";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAgmrId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStnkrId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKotaKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNgrKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKodePos";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".googleLikeFields"][] = "mhsWnrId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoAskes";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoTelp";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoHp";
$tdatamahasiswa[".googleLikeFields"][] = "mhsEmail";
$tdatamahasiswa[".googleLikeFields"][] = "mhsHomepage";
$tdatamahasiswa[".googleLikeFields"][] = "mhsFoto";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksWajib";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksA";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksB";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksC";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksD";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksE";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".googleLikeFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".googleLikeFields"][] = "mhsWsdId";
$tdatamahasiswa[".googleLikeFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".googleLikeFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".googleLikeFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".googleLikeFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPTKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPSKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".googleLikeFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".googleLikeFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".googleLikeFields"][] = "mshNoIpp";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".googleLikeFields"][] = "mhsPengOrg";
$tdatamahasiswa[".googleLikeFields"][] = "mhsOrg";
$tdatamahasiswa[".googleLikeFields"][] = "mhsDomisili";
$tdatamahasiswa[".googleLikeFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".googleLikeFields"][] = "mhsIsKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".googleLikeFields"][] = "mhsKerja";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".googleLikeFields"][] = "mhsHobi";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".googleLikeFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".googleLikeFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".googleLikeFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".googleLikeFields"][] = "mhsEmailOld";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoKtp";
$tdatamahasiswa[".googleLikeFields"][] = "mhsNoKk";


$tdatamahasiswa[".advSearchFields"] = array();
$tdatamahasiswa[".advSearchFields"][] = "mhsNiu";
$tdatamahasiswa[".advSearchFields"][] = "mhsNif";
$tdatamahasiswa[".advSearchFields"][] = "mhsNama";
$tdatamahasiswa[".advSearchFields"][] = "mhsAngkatan";
$tdatamahasiswa[".advSearchFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".advSearchFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".advSearchFields"][] = "mhsKurId";
$tdatamahasiswa[".advSearchFields"][] = "mhsProdiKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".advSearchFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".advSearchFields"][] = "mhsWktkulId";
$tdatamahasiswa[".advSearchFields"][] = "mhsNomorTes";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".advSearchFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".advSearchFields"][] = "mhsIsAsing";
$tdatamahasiswa[".advSearchFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsNimLama";
$tdatamahasiswa[".advSearchFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".advSearchFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".advSearchFields"][] = "mhsAgmrId";
$tdatamahasiswa[".advSearchFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsStnkrId";
$tdatamahasiswa[".advSearchFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".advSearchFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".advSearchFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".advSearchFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".advSearchFields"][] = "mhsKotaKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsNgrKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsKodePos";
$tdatamahasiswa[".advSearchFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".advSearchFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".advSearchFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".advSearchFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".advSearchFields"][] = "mhsWnrId";
$tdatamahasiswa[".advSearchFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoAskes";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoTelp";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoHp";
$tdatamahasiswa[".advSearchFields"][] = "mhsEmail";
$tdatamahasiswa[".advSearchFields"][] = "mhsHomepage";
$tdatamahasiswa[".advSearchFields"][] = "mhsFoto";
$tdatamahasiswa[".advSearchFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksWajib";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksA";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksB";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksC";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksD";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksE";
$tdatamahasiswa[".advSearchFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".advSearchFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".advSearchFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".advSearchFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".advSearchFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".advSearchFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".advSearchFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".advSearchFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".advSearchFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".advSearchFields"][] = "mhsWsdId";
$tdatamahasiswa[".advSearchFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".advSearchFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".advSearchFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".advSearchFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".advSearchFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".advSearchFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".advSearchFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".advSearchFields"][] = "mhsPTKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsPSKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".advSearchFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".advSearchFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".advSearchFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".advSearchFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".advSearchFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".advSearchFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".advSearchFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".advSearchFields"][] = "mshNoIpp";
$tdatamahasiswa[".advSearchFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".advSearchFields"][] = "mhsPengOrg";
$tdatamahasiswa[".advSearchFields"][] = "mhsOrg";
$tdatamahasiswa[".advSearchFields"][] = "mhsDomisili";
$tdatamahasiswa[".advSearchFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".advSearchFields"][] = "mhsIsKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".advSearchFields"][] = "mhsKerja";
$tdatamahasiswa[".advSearchFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".advSearchFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".advSearchFields"][] = "mhsHobi";
$tdatamahasiswa[".advSearchFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".advSearchFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".advSearchFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".advSearchFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".advSearchFields"][] = "mhsEmailOld";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoKtp";
$tdatamahasiswa[".advSearchFields"][] = "mhsNoKk";

$tdatamahasiswa[".tableType"] = "list";

$tdatamahasiswa[".printerPageOrientation"] = 0;
$tdatamahasiswa[".nPrinterPageScale"] = 100;

$tdatamahasiswa[".nPrinterSplitRecords"] = 40;

$tdatamahasiswa[".nPrinterPDFSplitRecords"] = 40;



$tdatamahasiswa[".geocodingEnabled"] = false;





$tdatamahasiswa[".listGridLayout"] = 3;





// view page pdf

// print page pdf


$tdatamahasiswa[".pageSize"] = 20;

$tdatamahasiswa[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatamahasiswa[".strOrderBy"] = $tstrOrderBy;

$tdatamahasiswa[".orderindexes"] = array();

$tdatamahasiswa[".sqlHead"] = "SELECT mhsNiu,  	mhsNif,  	mhsNama,  	mhsAngkatan,  	mhsSemesterMasuk,  	mhsPasswordRegistrasi,  	mhsKurId,  	mhsProdiKode,  	mhsProdiKodeUniv,  	mhsProdikonsentrasiId,  	mhsWktkulId,  	mhsNomorTes,  	mhsTanggalTerdaftar,  	mhsStatusMasukPt,  	mhsIsAsing,  	mhsJumlahSksPindahan,  	mhsKodePtPindahan,  	mhsKodeProdiDiktiPindahan,  	mhsNamaPtPindahan,  	mhsJjarKodeDiktiPindahan,  	mhsTahunMasukPtPindahan,  	mhsNimLama,  	mhsJenisKelamin,  	mhsKotaKodeLahir,  	mhsTanggalLahir,  	mhsAgmrId,  	mhsSmtaKode,  	mhsTdftSmta,  	mhsTahunTamatSmta,  	mhsTahunLulusSmta,  	mhsJursmtarKode,  	mhsAlamatSmta,  	mhsNoIjasahSmta,  	mhsIjasahSmta,  	mhsTanggalIjasahSmta,  	mhsNilaiUjianAkhirSmta,  	mhsJumlahMpUjianAkhirSmta,  	mhsStnkrId,  	mhsJumlahSaudara,  	mhsAlamatMhs,  	mhsAlamatTerakhir,  	mhsAlamatDiKotaIni,  	mhsKotaKode,  	mhsNgrKode,  	mhsKodePos,  	mhsStatrumahId,  	mhsSbdnrId,  	mhsHubbiayaId,  	mhsTempatKerja,  	mhsAlamatTempatKerja,  	mhsNoTelpTempatKerja,  	mhsBeasiswa,  	mhsWnrId,  	mhsJlrrKode,  	mhsNoAskes,  	mhsNoTelp,  	mhsNoHp,  	mhsEmail,  	mhsHomepage,  	mhsFoto,  	mhsStakmhsrKode,  	mhsDsnPegNipPembimbingAkademik,  	mhsSksWajib,  	mhsSksPilihan,  	mhsSksA,  	mhsSksB,  	mhsSksC,  	mhsSksD,  	mhsSksE,  	mhsSksTranskrip,  	mhsBobotTotalTranskrip,  	mhsIpkTranskrip,  	mhsLamaStudiSemester,  	mhsLamaStudiBulan,  	mhsIsTranskripAkhirDiarsipkan,  	mhsTanggalTranskrip,  	mhsNomorTranskrip,  	mhsTempatLahirTranskrip,  	mhsTanggalLahirTranskrip,  	mhsMetodeBuildTranskrip,  	mhsMetodePenyetaraanTranskrip,  	mhsTahunKurikulumPenyetaraanTranskrip,  	mhsTanggalLulus,  	mhsNoSuratYudisium,  	mhsTanggalSuratYudisium,  	mhsSemIdLulus,  	mhsTanggalIjasah,  	mhsNoIjasah,  	mhsKodeIjasah,  	mhsPinIjasah,  	mhsPrlsrId,  	mhsPrlsrNama,  	mhsPrlsrNamaAsing,  	mhsWsdId,  	mhsTanggalPengubahan,  	mhsUnitPengubah,  	mhsUserPengubah,  	mhsProdiGelarKelulusan,  	mhsSemIdMulai,  	mhsBiayaStudi,  	mhsPekerjaan,  	mhsPTKerja,  	mhsPSKerja,  	mhsNIDNPromotor,  	mhsKoPromotor1,  	mhsKoPromotor2,  	mhsKoPromotor3,  	mhsKoPromotor4,  	mhsProdiAsal,  	mhsDiktiShift,  	mhsPembayaranIpp,  	mshNoIpp,  	mhsPersyaratan,  	mhsPengOrg,  	mhsOrg,  	mhsDomisili,  	mhsJenisSttb,  	mhsIsKerja,  	mhsStatusSmta,  	mhsAkreditasi,  	mhsKerja,  	mhsSaudaraLk,  	mhsSaudaraPr,  	mhsHobi,  	mhsSmtaLain,  	mhsAkreditasiSmta,  	mhsBiayaKuliah,  	MhsIdJenisSmta,  	mhsSmtaPropinsiKode,  	mhsEmailOld,  	mhsNoKtp,  	mhsNoKk";
$tdatamahasiswa[".sqlFrom"] = "FROM mahasiswa";
$tdatamahasiswa[".sqlWhereExpr"] = "";
$tdatamahasiswa[".sqlTail"] = "";












//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatamahasiswa[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatamahasiswa[".arrGroupsPerPage"] = $arrGPP;

$tdatamahasiswa[".highlightSearchResults"] = true;

$tableKeysmahasiswa = array();
$tableKeysmahasiswa[] = "mhsNiu";
$tdatamahasiswa[".Keys"] = $tableKeysmahasiswa;

$tdatamahasiswa[".listFields"] = array();
$tdatamahasiswa[".listFields"][] = "mhsNiu";
$tdatamahasiswa[".listFields"][] = "mhsNif";
$tdatamahasiswa[".listFields"][] = "mhsNama";
$tdatamahasiswa[".listFields"][] = "mhsAngkatan";
$tdatamahasiswa[".listFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".listFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".listFields"][] = "mhsKurId";
$tdatamahasiswa[".listFields"][] = "mhsProdiKode";
$tdatamahasiswa[".listFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".listFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".listFields"][] = "mhsWktkulId";
$tdatamahasiswa[".listFields"][] = "mhsNomorTes";
$tdatamahasiswa[".listFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".listFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".listFields"][] = "mhsIsAsing";
$tdatamahasiswa[".listFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".listFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".listFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".listFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".listFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".listFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".listFields"][] = "mhsNimLama";
$tdatamahasiswa[".listFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".listFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".listFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".listFields"][] = "mhsAgmrId";
$tdatamahasiswa[".listFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".listFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".listFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".listFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".listFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".listFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".listFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".listFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".listFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".listFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".listFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".listFields"][] = "mhsStnkrId";
$tdatamahasiswa[".listFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".listFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".listFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".listFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".listFields"][] = "mhsKotaKode";
$tdatamahasiswa[".listFields"][] = "mhsNgrKode";
$tdatamahasiswa[".listFields"][] = "mhsKodePos";
$tdatamahasiswa[".listFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".listFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".listFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".listFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".listFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".listFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".listFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".listFields"][] = "mhsWnrId";
$tdatamahasiswa[".listFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".listFields"][] = "mhsNoAskes";
$tdatamahasiswa[".listFields"][] = "mhsNoTelp";
$tdatamahasiswa[".listFields"][] = "mhsNoHp";
$tdatamahasiswa[".listFields"][] = "mhsEmail";
$tdatamahasiswa[".listFields"][] = "mhsHomepage";
$tdatamahasiswa[".listFields"][] = "mhsFoto";
$tdatamahasiswa[".listFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".listFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".listFields"][] = "mhsSksWajib";
$tdatamahasiswa[".listFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".listFields"][] = "mhsSksA";
$tdatamahasiswa[".listFields"][] = "mhsSksB";
$tdatamahasiswa[".listFields"][] = "mhsSksC";
$tdatamahasiswa[".listFields"][] = "mhsSksD";
$tdatamahasiswa[".listFields"][] = "mhsSksE";
$tdatamahasiswa[".listFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".listFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".listFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".listFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".listFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".listFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".listFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".listFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".listFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".listFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".listFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".listFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".listFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".listFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".listFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".listFields"][] = "mhsWsdId";
$tdatamahasiswa[".listFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".listFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".listFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".listFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".listFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".listFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".listFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".listFields"][] = "mhsPTKerja";
$tdatamahasiswa[".listFields"][] = "mhsPSKerja";
$tdatamahasiswa[".listFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".listFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".listFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".listFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".listFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".listFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".listFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".listFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".listFields"][] = "mshNoIpp";
$tdatamahasiswa[".listFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".listFields"][] = "mhsPengOrg";
$tdatamahasiswa[".listFields"][] = "mhsOrg";
$tdatamahasiswa[".listFields"][] = "mhsDomisili";
$tdatamahasiswa[".listFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".listFields"][] = "mhsIsKerja";
$tdatamahasiswa[".listFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".listFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".listFields"][] = "mhsKerja";
$tdatamahasiswa[".listFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".listFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".listFields"][] = "mhsHobi";
$tdatamahasiswa[".listFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".listFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".listFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".listFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".listFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".listFields"][] = "mhsEmailOld";
$tdatamahasiswa[".listFields"][] = "mhsNoKtp";
$tdatamahasiswa[".listFields"][] = "mhsNoKk";

$tdatamahasiswa[".hideMobileList"] = array();


$tdatamahasiswa[".viewFields"] = array();
$tdatamahasiswa[".viewFields"][] = "mhsNiu";
$tdatamahasiswa[".viewFields"][] = "mhsNif";
$tdatamahasiswa[".viewFields"][] = "mhsNama";
$tdatamahasiswa[".viewFields"][] = "mhsAngkatan";
$tdatamahasiswa[".viewFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".viewFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".viewFields"][] = "mhsKurId";
$tdatamahasiswa[".viewFields"][] = "mhsProdiKode";
$tdatamahasiswa[".viewFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".viewFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".viewFields"][] = "mhsWktkulId";
$tdatamahasiswa[".viewFields"][] = "mhsNomorTes";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".viewFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".viewFields"][] = "mhsIsAsing";
$tdatamahasiswa[".viewFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".viewFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".viewFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".viewFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".viewFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".viewFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".viewFields"][] = "mhsNimLama";
$tdatamahasiswa[".viewFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".viewFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".viewFields"][] = "mhsAgmrId";
$tdatamahasiswa[".viewFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".viewFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".viewFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".viewFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".viewFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".viewFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".viewFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".viewFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".viewFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".viewFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".viewFields"][] = "mhsStnkrId";
$tdatamahasiswa[".viewFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".viewFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".viewFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".viewFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".viewFields"][] = "mhsKotaKode";
$tdatamahasiswa[".viewFields"][] = "mhsNgrKode";
$tdatamahasiswa[".viewFields"][] = "mhsKodePos";
$tdatamahasiswa[".viewFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".viewFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".viewFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".viewFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".viewFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".viewFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".viewFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".viewFields"][] = "mhsWnrId";
$tdatamahasiswa[".viewFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".viewFields"][] = "mhsNoAskes";
$tdatamahasiswa[".viewFields"][] = "mhsNoTelp";
$tdatamahasiswa[".viewFields"][] = "mhsNoHp";
$tdatamahasiswa[".viewFields"][] = "mhsEmail";
$tdatamahasiswa[".viewFields"][] = "mhsHomepage";
$tdatamahasiswa[".viewFields"][] = "mhsFoto";
$tdatamahasiswa[".viewFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".viewFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".viewFields"][] = "mhsSksWajib";
$tdatamahasiswa[".viewFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".viewFields"][] = "mhsSksA";
$tdatamahasiswa[".viewFields"][] = "mhsSksB";
$tdatamahasiswa[".viewFields"][] = "mhsSksC";
$tdatamahasiswa[".viewFields"][] = "mhsSksD";
$tdatamahasiswa[".viewFields"][] = "mhsSksE";
$tdatamahasiswa[".viewFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".viewFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".viewFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".viewFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".viewFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".viewFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".viewFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".viewFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".viewFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".viewFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".viewFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".viewFields"][] = "mhsWsdId";
$tdatamahasiswa[".viewFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".viewFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".viewFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".viewFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".viewFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".viewFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".viewFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".viewFields"][] = "mhsPTKerja";
$tdatamahasiswa[".viewFields"][] = "mhsPSKerja";
$tdatamahasiswa[".viewFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".viewFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".viewFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".viewFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".viewFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".viewFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".viewFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".viewFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".viewFields"][] = "mshNoIpp";
$tdatamahasiswa[".viewFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".viewFields"][] = "mhsPengOrg";
$tdatamahasiswa[".viewFields"][] = "mhsOrg";
$tdatamahasiswa[".viewFields"][] = "mhsDomisili";
$tdatamahasiswa[".viewFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".viewFields"][] = "mhsIsKerja";
$tdatamahasiswa[".viewFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".viewFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".viewFields"][] = "mhsKerja";
$tdatamahasiswa[".viewFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".viewFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".viewFields"][] = "mhsHobi";
$tdatamahasiswa[".viewFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".viewFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".viewFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".viewFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".viewFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".viewFields"][] = "mhsEmailOld";
$tdatamahasiswa[".viewFields"][] = "mhsNoKtp";
$tdatamahasiswa[".viewFields"][] = "mhsNoKk";

$tdatamahasiswa[".addFields"] = array();
$tdatamahasiswa[".addFields"][] = "mhsNiu";
$tdatamahasiswa[".addFields"][] = "mhsNif";
$tdatamahasiswa[".addFields"][] = "mhsNama";
$tdatamahasiswa[".addFields"][] = "mhsAngkatan";
$tdatamahasiswa[".addFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".addFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".addFields"][] = "mhsKurId";
$tdatamahasiswa[".addFields"][] = "mhsProdiKode";
$tdatamahasiswa[".addFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".addFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".addFields"][] = "mhsWktkulId";
$tdatamahasiswa[".addFields"][] = "mhsNomorTes";
$tdatamahasiswa[".addFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".addFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".addFields"][] = "mhsIsAsing";
$tdatamahasiswa[".addFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".addFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".addFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".addFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".addFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".addFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".addFields"][] = "mhsNimLama";
$tdatamahasiswa[".addFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".addFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".addFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".addFields"][] = "mhsAgmrId";
$tdatamahasiswa[".addFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".addFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".addFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".addFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".addFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".addFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".addFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".addFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".addFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".addFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".addFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".addFields"][] = "mhsStnkrId";
$tdatamahasiswa[".addFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".addFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".addFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".addFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".addFields"][] = "mhsKotaKode";
$tdatamahasiswa[".addFields"][] = "mhsNgrKode";
$tdatamahasiswa[".addFields"][] = "mhsKodePos";
$tdatamahasiswa[".addFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".addFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".addFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".addFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".addFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".addFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".addFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".addFields"][] = "mhsWnrId";
$tdatamahasiswa[".addFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".addFields"][] = "mhsNoAskes";
$tdatamahasiswa[".addFields"][] = "mhsNoTelp";
$tdatamahasiswa[".addFields"][] = "mhsNoHp";
$tdatamahasiswa[".addFields"][] = "mhsEmail";
$tdatamahasiswa[".addFields"][] = "mhsHomepage";
$tdatamahasiswa[".addFields"][] = "mhsFoto";
$tdatamahasiswa[".addFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".addFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".addFields"][] = "mhsSksWajib";
$tdatamahasiswa[".addFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".addFields"][] = "mhsSksA";
$tdatamahasiswa[".addFields"][] = "mhsSksB";
$tdatamahasiswa[".addFields"][] = "mhsSksC";
$tdatamahasiswa[".addFields"][] = "mhsSksD";
$tdatamahasiswa[".addFields"][] = "mhsSksE";
$tdatamahasiswa[".addFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".addFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".addFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".addFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".addFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".addFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".addFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".addFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".addFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".addFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".addFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".addFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".addFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".addFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".addFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".addFields"][] = "mhsWsdId";
$tdatamahasiswa[".addFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".addFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".addFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".addFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".addFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".addFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".addFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".addFields"][] = "mhsPTKerja";
$tdatamahasiswa[".addFields"][] = "mhsPSKerja";
$tdatamahasiswa[".addFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".addFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".addFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".addFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".addFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".addFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".addFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".addFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".addFields"][] = "mshNoIpp";
$tdatamahasiswa[".addFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".addFields"][] = "mhsPengOrg";
$tdatamahasiswa[".addFields"][] = "mhsOrg";
$tdatamahasiswa[".addFields"][] = "mhsDomisili";
$tdatamahasiswa[".addFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".addFields"][] = "mhsIsKerja";
$tdatamahasiswa[".addFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".addFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".addFields"][] = "mhsKerja";
$tdatamahasiswa[".addFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".addFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".addFields"][] = "mhsHobi";
$tdatamahasiswa[".addFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".addFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".addFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".addFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".addFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".addFields"][] = "mhsEmailOld";
$tdatamahasiswa[".addFields"][] = "mhsNoKtp";
$tdatamahasiswa[".addFields"][] = "mhsNoKk";

$tdatamahasiswa[".masterListFields"] = array();
$tdatamahasiswa[".masterListFields"][] = "mhsNiu";
$tdatamahasiswa[".masterListFields"][] = "mhsNif";
$tdatamahasiswa[".masterListFields"][] = "mhsNama";
$tdatamahasiswa[".masterListFields"][] = "mhsAngkatan";
$tdatamahasiswa[".masterListFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".masterListFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".masterListFields"][] = "mhsKurId";
$tdatamahasiswa[".masterListFields"][] = "mhsProdiKode";
$tdatamahasiswa[".masterListFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".masterListFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".masterListFields"][] = "mhsWktkulId";
$tdatamahasiswa[".masterListFields"][] = "mhsNomorTes";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".masterListFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".masterListFields"][] = "mhsIsAsing";
$tdatamahasiswa[".masterListFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".masterListFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".masterListFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".masterListFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".masterListFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".masterListFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".masterListFields"][] = "mhsNimLama";
$tdatamahasiswa[".masterListFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".masterListFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".masterListFields"][] = "mhsAgmrId";
$tdatamahasiswa[".masterListFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".masterListFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".masterListFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsStnkrId";
$tdatamahasiswa[".masterListFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".masterListFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".masterListFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".masterListFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".masterListFields"][] = "mhsKotaKode";
$tdatamahasiswa[".masterListFields"][] = "mhsNgrKode";
$tdatamahasiswa[".masterListFields"][] = "mhsKodePos";
$tdatamahasiswa[".masterListFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".masterListFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".masterListFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".masterListFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".masterListFields"][] = "mhsWnrId";
$tdatamahasiswa[".masterListFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".masterListFields"][] = "mhsNoAskes";
$tdatamahasiswa[".masterListFields"][] = "mhsNoTelp";
$tdatamahasiswa[".masterListFields"][] = "mhsNoHp";
$tdatamahasiswa[".masterListFields"][] = "mhsEmail";
$tdatamahasiswa[".masterListFields"][] = "mhsHomepage";
$tdatamahasiswa[".masterListFields"][] = "mhsFoto";
$tdatamahasiswa[".masterListFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".masterListFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".masterListFields"][] = "mhsSksWajib";
$tdatamahasiswa[".masterListFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".masterListFields"][] = "mhsSksA";
$tdatamahasiswa[".masterListFields"][] = "mhsSksB";
$tdatamahasiswa[".masterListFields"][] = "mhsSksC";
$tdatamahasiswa[".masterListFields"][] = "mhsSksD";
$tdatamahasiswa[".masterListFields"][] = "mhsSksE";
$tdatamahasiswa[".masterListFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".masterListFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".masterListFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".masterListFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".masterListFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".masterListFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".masterListFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".masterListFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".masterListFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".masterListFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".masterListFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".masterListFields"][] = "mhsWsdId";
$tdatamahasiswa[".masterListFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".masterListFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".masterListFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".masterListFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".masterListFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".masterListFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".masterListFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".masterListFields"][] = "mhsPTKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsPSKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".masterListFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".masterListFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".masterListFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".masterListFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".masterListFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".masterListFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".masterListFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".masterListFields"][] = "mshNoIpp";
$tdatamahasiswa[".masterListFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".masterListFields"][] = "mhsPengOrg";
$tdatamahasiswa[".masterListFields"][] = "mhsOrg";
$tdatamahasiswa[".masterListFields"][] = "mhsDomisili";
$tdatamahasiswa[".masterListFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".masterListFields"][] = "mhsIsKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".masterListFields"][] = "mhsKerja";
$tdatamahasiswa[".masterListFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".masterListFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".masterListFields"][] = "mhsHobi";
$tdatamahasiswa[".masterListFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".masterListFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".masterListFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".masterListFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".masterListFields"][] = "mhsEmailOld";
$tdatamahasiswa[".masterListFields"][] = "mhsNoKtp";
$tdatamahasiswa[".masterListFields"][] = "mhsNoKk";

$tdatamahasiswa[".inlineAddFields"] = array();

$tdatamahasiswa[".editFields"] = array();
$tdatamahasiswa[".editFields"][] = "mhsNiu";
$tdatamahasiswa[".editFields"][] = "mhsNif";
$tdatamahasiswa[".editFields"][] = "mhsNama";
$tdatamahasiswa[".editFields"][] = "mhsAngkatan";
$tdatamahasiswa[".editFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".editFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".editFields"][] = "mhsKurId";
$tdatamahasiswa[".editFields"][] = "mhsProdiKode";
$tdatamahasiswa[".editFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".editFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".editFields"][] = "mhsWktkulId";
$tdatamahasiswa[".editFields"][] = "mhsNomorTes";
$tdatamahasiswa[".editFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".editFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".editFields"][] = "mhsIsAsing";
$tdatamahasiswa[".editFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".editFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".editFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".editFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".editFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".editFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".editFields"][] = "mhsNimLama";
$tdatamahasiswa[".editFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".editFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".editFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".editFields"][] = "mhsAgmrId";
$tdatamahasiswa[".editFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".editFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".editFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".editFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".editFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".editFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".editFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".editFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".editFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".editFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".editFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".editFields"][] = "mhsStnkrId";
$tdatamahasiswa[".editFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".editFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".editFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".editFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".editFields"][] = "mhsKotaKode";
$tdatamahasiswa[".editFields"][] = "mhsNgrKode";
$tdatamahasiswa[".editFields"][] = "mhsKodePos";
$tdatamahasiswa[".editFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".editFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".editFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".editFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".editFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".editFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".editFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".editFields"][] = "mhsWnrId";
$tdatamahasiswa[".editFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".editFields"][] = "mhsNoAskes";
$tdatamahasiswa[".editFields"][] = "mhsNoTelp";
$tdatamahasiswa[".editFields"][] = "mhsNoHp";
$tdatamahasiswa[".editFields"][] = "mhsEmail";
$tdatamahasiswa[".editFields"][] = "mhsHomepage";
$tdatamahasiswa[".editFields"][] = "mhsFoto";
$tdatamahasiswa[".editFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".editFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".editFields"][] = "mhsSksWajib";
$tdatamahasiswa[".editFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".editFields"][] = "mhsSksA";
$tdatamahasiswa[".editFields"][] = "mhsSksB";
$tdatamahasiswa[".editFields"][] = "mhsSksC";
$tdatamahasiswa[".editFields"][] = "mhsSksD";
$tdatamahasiswa[".editFields"][] = "mhsSksE";
$tdatamahasiswa[".editFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".editFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".editFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".editFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".editFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".editFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".editFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".editFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".editFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".editFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".editFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".editFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".editFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".editFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".editFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".editFields"][] = "mhsWsdId";
$tdatamahasiswa[".editFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".editFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".editFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".editFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".editFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".editFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".editFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".editFields"][] = "mhsPTKerja";
$tdatamahasiswa[".editFields"][] = "mhsPSKerja";
$tdatamahasiswa[".editFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".editFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".editFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".editFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".editFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".editFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".editFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".editFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".editFields"][] = "mshNoIpp";
$tdatamahasiswa[".editFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".editFields"][] = "mhsPengOrg";
$tdatamahasiswa[".editFields"][] = "mhsOrg";
$tdatamahasiswa[".editFields"][] = "mhsDomisili";
$tdatamahasiswa[".editFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".editFields"][] = "mhsIsKerja";
$tdatamahasiswa[".editFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".editFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".editFields"][] = "mhsKerja";
$tdatamahasiswa[".editFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".editFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".editFields"][] = "mhsHobi";
$tdatamahasiswa[".editFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".editFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".editFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".editFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".editFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".editFields"][] = "mhsEmailOld";
$tdatamahasiswa[".editFields"][] = "mhsNoKtp";
$tdatamahasiswa[".editFields"][] = "mhsNoKk";

$tdatamahasiswa[".inlineEditFields"] = array();

$tdatamahasiswa[".updateSelectedFields"] = array();
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNiu";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNif";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNama";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAngkatan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKurId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsProdiKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsWktkulId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNomorTes";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsIsAsing";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNimLama";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAgmrId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsStnkrId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKotaKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNgrKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKodePos";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsWnrId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoAskes";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoTelp";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoHp";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsEmail";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsHomepage";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsFoto";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksWajib";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksA";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksB";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksC";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksD";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksE";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsWsdId";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPTKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPSKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".updateSelectedFields"][] = "mshNoIpp";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsPengOrg";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsOrg";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsDomisili";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsIsKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsKerja";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsHobi";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".updateSelectedFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsEmailOld";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoKtp";
$tdatamahasiswa[".updateSelectedFields"][] = "mhsNoKk";


$tdatamahasiswa[".exportFields"] = array();
$tdatamahasiswa[".exportFields"][] = "mhsNiu";
$tdatamahasiswa[".exportFields"][] = "mhsNif";
$tdatamahasiswa[".exportFields"][] = "mhsNama";
$tdatamahasiswa[".exportFields"][] = "mhsAngkatan";
$tdatamahasiswa[".exportFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".exportFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".exportFields"][] = "mhsKurId";
$tdatamahasiswa[".exportFields"][] = "mhsProdiKode";
$tdatamahasiswa[".exportFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".exportFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".exportFields"][] = "mhsWktkulId";
$tdatamahasiswa[".exportFields"][] = "mhsNomorTes";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".exportFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".exportFields"][] = "mhsIsAsing";
$tdatamahasiswa[".exportFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".exportFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".exportFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".exportFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".exportFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".exportFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".exportFields"][] = "mhsNimLama";
$tdatamahasiswa[".exportFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".exportFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".exportFields"][] = "mhsAgmrId";
$tdatamahasiswa[".exportFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".exportFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".exportFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".exportFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".exportFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".exportFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".exportFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".exportFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".exportFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".exportFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".exportFields"][] = "mhsStnkrId";
$tdatamahasiswa[".exportFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".exportFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".exportFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".exportFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".exportFields"][] = "mhsKotaKode";
$tdatamahasiswa[".exportFields"][] = "mhsNgrKode";
$tdatamahasiswa[".exportFields"][] = "mhsKodePos";
$tdatamahasiswa[".exportFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".exportFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".exportFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".exportFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".exportFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".exportFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".exportFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".exportFields"][] = "mhsWnrId";
$tdatamahasiswa[".exportFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".exportFields"][] = "mhsNoAskes";
$tdatamahasiswa[".exportFields"][] = "mhsNoTelp";
$tdatamahasiswa[".exportFields"][] = "mhsNoHp";
$tdatamahasiswa[".exportFields"][] = "mhsEmail";
$tdatamahasiswa[".exportFields"][] = "mhsHomepage";
$tdatamahasiswa[".exportFields"][] = "mhsFoto";
$tdatamahasiswa[".exportFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".exportFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".exportFields"][] = "mhsSksWajib";
$tdatamahasiswa[".exportFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".exportFields"][] = "mhsSksA";
$tdatamahasiswa[".exportFields"][] = "mhsSksB";
$tdatamahasiswa[".exportFields"][] = "mhsSksC";
$tdatamahasiswa[".exportFields"][] = "mhsSksD";
$tdatamahasiswa[".exportFields"][] = "mhsSksE";
$tdatamahasiswa[".exportFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".exportFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".exportFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".exportFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".exportFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".exportFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".exportFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".exportFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".exportFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".exportFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".exportFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".exportFields"][] = "mhsWsdId";
$tdatamahasiswa[".exportFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".exportFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".exportFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".exportFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".exportFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".exportFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".exportFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".exportFields"][] = "mhsPTKerja";
$tdatamahasiswa[".exportFields"][] = "mhsPSKerja";
$tdatamahasiswa[".exportFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".exportFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".exportFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".exportFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".exportFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".exportFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".exportFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".exportFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".exportFields"][] = "mshNoIpp";
$tdatamahasiswa[".exportFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".exportFields"][] = "mhsPengOrg";
$tdatamahasiswa[".exportFields"][] = "mhsOrg";
$tdatamahasiswa[".exportFields"][] = "mhsDomisili";
$tdatamahasiswa[".exportFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".exportFields"][] = "mhsIsKerja";
$tdatamahasiswa[".exportFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".exportFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".exportFields"][] = "mhsKerja";
$tdatamahasiswa[".exportFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".exportFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".exportFields"][] = "mhsHobi";
$tdatamahasiswa[".exportFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".exportFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".exportFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".exportFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".exportFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".exportFields"][] = "mhsEmailOld";
$tdatamahasiswa[".exportFields"][] = "mhsNoKtp";
$tdatamahasiswa[".exportFields"][] = "mhsNoKk";

$tdatamahasiswa[".importFields"] = array();
$tdatamahasiswa[".importFields"][] = "mhsNiu";
$tdatamahasiswa[".importFields"][] = "mhsNif";
$tdatamahasiswa[".importFields"][] = "mhsNama";
$tdatamahasiswa[".importFields"][] = "mhsAngkatan";
$tdatamahasiswa[".importFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".importFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".importFields"][] = "mhsKurId";
$tdatamahasiswa[".importFields"][] = "mhsProdiKode";
$tdatamahasiswa[".importFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".importFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".importFields"][] = "mhsWktkulId";
$tdatamahasiswa[".importFields"][] = "mhsNomorTes";
$tdatamahasiswa[".importFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".importFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".importFields"][] = "mhsIsAsing";
$tdatamahasiswa[".importFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".importFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".importFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".importFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".importFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".importFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".importFields"][] = "mhsNimLama";
$tdatamahasiswa[".importFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".importFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".importFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".importFields"][] = "mhsAgmrId";
$tdatamahasiswa[".importFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".importFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".importFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".importFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".importFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".importFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".importFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".importFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".importFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".importFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".importFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".importFields"][] = "mhsStnkrId";
$tdatamahasiswa[".importFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".importFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".importFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".importFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".importFields"][] = "mhsKotaKode";
$tdatamahasiswa[".importFields"][] = "mhsNgrKode";
$tdatamahasiswa[".importFields"][] = "mhsKodePos";
$tdatamahasiswa[".importFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".importFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".importFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".importFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".importFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".importFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".importFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".importFields"][] = "mhsWnrId";
$tdatamahasiswa[".importFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".importFields"][] = "mhsNoAskes";
$tdatamahasiswa[".importFields"][] = "mhsNoTelp";
$tdatamahasiswa[".importFields"][] = "mhsNoHp";
$tdatamahasiswa[".importFields"][] = "mhsEmail";
$tdatamahasiswa[".importFields"][] = "mhsHomepage";
$tdatamahasiswa[".importFields"][] = "mhsFoto";
$tdatamahasiswa[".importFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".importFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".importFields"][] = "mhsSksWajib";
$tdatamahasiswa[".importFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".importFields"][] = "mhsSksA";
$tdatamahasiswa[".importFields"][] = "mhsSksB";
$tdatamahasiswa[".importFields"][] = "mhsSksC";
$tdatamahasiswa[".importFields"][] = "mhsSksD";
$tdatamahasiswa[".importFields"][] = "mhsSksE";
$tdatamahasiswa[".importFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".importFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".importFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".importFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".importFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".importFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".importFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".importFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".importFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".importFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".importFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".importFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".importFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".importFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".importFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".importFields"][] = "mhsWsdId";
$tdatamahasiswa[".importFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".importFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".importFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".importFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".importFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".importFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".importFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".importFields"][] = "mhsPTKerja";
$tdatamahasiswa[".importFields"][] = "mhsPSKerja";
$tdatamahasiswa[".importFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".importFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".importFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".importFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".importFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".importFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".importFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".importFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".importFields"][] = "mshNoIpp";
$tdatamahasiswa[".importFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".importFields"][] = "mhsPengOrg";
$tdatamahasiswa[".importFields"][] = "mhsOrg";
$tdatamahasiswa[".importFields"][] = "mhsDomisili";
$tdatamahasiswa[".importFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".importFields"][] = "mhsIsKerja";
$tdatamahasiswa[".importFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".importFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".importFields"][] = "mhsKerja";
$tdatamahasiswa[".importFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".importFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".importFields"][] = "mhsHobi";
$tdatamahasiswa[".importFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".importFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".importFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".importFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".importFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".importFields"][] = "mhsEmailOld";
$tdatamahasiswa[".importFields"][] = "mhsNoKtp";
$tdatamahasiswa[".importFields"][] = "mhsNoKk";

$tdatamahasiswa[".printFields"] = array();
$tdatamahasiswa[".printFields"][] = "mhsNiu";
$tdatamahasiswa[".printFields"][] = "mhsNif";
$tdatamahasiswa[".printFields"][] = "mhsNama";
$tdatamahasiswa[".printFields"][] = "mhsAngkatan";
$tdatamahasiswa[".printFields"][] = "mhsSemesterMasuk";
$tdatamahasiswa[".printFields"][] = "mhsPasswordRegistrasi";
$tdatamahasiswa[".printFields"][] = "mhsKurId";
$tdatamahasiswa[".printFields"][] = "mhsProdiKode";
$tdatamahasiswa[".printFields"][] = "mhsProdiKodeUniv";
$tdatamahasiswa[".printFields"][] = "mhsProdikonsentrasiId";
$tdatamahasiswa[".printFields"][] = "mhsWktkulId";
$tdatamahasiswa[".printFields"][] = "mhsNomorTes";
$tdatamahasiswa[".printFields"][] = "mhsTanggalTerdaftar";
$tdatamahasiswa[".printFields"][] = "mhsStatusMasukPt";
$tdatamahasiswa[".printFields"][] = "mhsIsAsing";
$tdatamahasiswa[".printFields"][] = "mhsJumlahSksPindahan";
$tdatamahasiswa[".printFields"][] = "mhsKodePtPindahan";
$tdatamahasiswa[".printFields"][] = "mhsKodeProdiDiktiPindahan";
$tdatamahasiswa[".printFields"][] = "mhsNamaPtPindahan";
$tdatamahasiswa[".printFields"][] = "mhsJjarKodeDiktiPindahan";
$tdatamahasiswa[".printFields"][] = "mhsTahunMasukPtPindahan";
$tdatamahasiswa[".printFields"][] = "mhsNimLama";
$tdatamahasiswa[".printFields"][] = "mhsJenisKelamin";
$tdatamahasiswa[".printFields"][] = "mhsKotaKodeLahir";
$tdatamahasiswa[".printFields"][] = "mhsTanggalLahir";
$tdatamahasiswa[".printFields"][] = "mhsAgmrId";
$tdatamahasiswa[".printFields"][] = "mhsSmtaKode";
$tdatamahasiswa[".printFields"][] = "mhsTdftSmta";
$tdatamahasiswa[".printFields"][] = "mhsTahunTamatSmta";
$tdatamahasiswa[".printFields"][] = "mhsTahunLulusSmta";
$tdatamahasiswa[".printFields"][] = "mhsJursmtarKode";
$tdatamahasiswa[".printFields"][] = "mhsAlamatSmta";
$tdatamahasiswa[".printFields"][] = "mhsNoIjasahSmta";
$tdatamahasiswa[".printFields"][] = "mhsIjasahSmta";
$tdatamahasiswa[".printFields"][] = "mhsTanggalIjasahSmta";
$tdatamahasiswa[".printFields"][] = "mhsNilaiUjianAkhirSmta";
$tdatamahasiswa[".printFields"][] = "mhsJumlahMpUjianAkhirSmta";
$tdatamahasiswa[".printFields"][] = "mhsStnkrId";
$tdatamahasiswa[".printFields"][] = "mhsJumlahSaudara";
$tdatamahasiswa[".printFields"][] = "mhsAlamatMhs";
$tdatamahasiswa[".printFields"][] = "mhsAlamatTerakhir";
$tdatamahasiswa[".printFields"][] = "mhsAlamatDiKotaIni";
$tdatamahasiswa[".printFields"][] = "mhsKotaKode";
$tdatamahasiswa[".printFields"][] = "mhsNgrKode";
$tdatamahasiswa[".printFields"][] = "mhsKodePos";
$tdatamahasiswa[".printFields"][] = "mhsStatrumahId";
$tdatamahasiswa[".printFields"][] = "mhsSbdnrId";
$tdatamahasiswa[".printFields"][] = "mhsHubbiayaId";
$tdatamahasiswa[".printFields"][] = "mhsTempatKerja";
$tdatamahasiswa[".printFields"][] = "mhsAlamatTempatKerja";
$tdatamahasiswa[".printFields"][] = "mhsNoTelpTempatKerja";
$tdatamahasiswa[".printFields"][] = "mhsBeasiswa";
$tdatamahasiswa[".printFields"][] = "mhsWnrId";
$tdatamahasiswa[".printFields"][] = "mhsJlrrKode";
$tdatamahasiswa[".printFields"][] = "mhsNoAskes";
$tdatamahasiswa[".printFields"][] = "mhsNoTelp";
$tdatamahasiswa[".printFields"][] = "mhsNoHp";
$tdatamahasiswa[".printFields"][] = "mhsEmail";
$tdatamahasiswa[".printFields"][] = "mhsHomepage";
$tdatamahasiswa[".printFields"][] = "mhsFoto";
$tdatamahasiswa[".printFields"][] = "mhsStakmhsrKode";
$tdatamahasiswa[".printFields"][] = "mhsDsnPegNipPembimbingAkademik";
$tdatamahasiswa[".printFields"][] = "mhsSksWajib";
$tdatamahasiswa[".printFields"][] = "mhsSksPilihan";
$tdatamahasiswa[".printFields"][] = "mhsSksA";
$tdatamahasiswa[".printFields"][] = "mhsSksB";
$tdatamahasiswa[".printFields"][] = "mhsSksC";
$tdatamahasiswa[".printFields"][] = "mhsSksD";
$tdatamahasiswa[".printFields"][] = "mhsSksE";
$tdatamahasiswa[".printFields"][] = "mhsSksTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsBobotTotalTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsIpkTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsLamaStudiSemester";
$tdatamahasiswa[".printFields"][] = "mhsLamaStudiBulan";
$tdatamahasiswa[".printFields"][] = "mhsIsTranskripAkhirDiarsipkan";
$tdatamahasiswa[".printFields"][] = "mhsTanggalTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsNomorTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsTempatLahirTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsTanggalLahirTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsMetodeBuildTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsMetodePenyetaraanTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$tdatamahasiswa[".printFields"][] = "mhsTanggalLulus";
$tdatamahasiswa[".printFields"][] = "mhsNoSuratYudisium";
$tdatamahasiswa[".printFields"][] = "mhsTanggalSuratYudisium";
$tdatamahasiswa[".printFields"][] = "mhsSemIdLulus";
$tdatamahasiswa[".printFields"][] = "mhsTanggalIjasah";
$tdatamahasiswa[".printFields"][] = "mhsNoIjasah";
$tdatamahasiswa[".printFields"][] = "mhsKodeIjasah";
$tdatamahasiswa[".printFields"][] = "mhsPinIjasah";
$tdatamahasiswa[".printFields"][] = "mhsPrlsrId";
$tdatamahasiswa[".printFields"][] = "mhsPrlsrNama";
$tdatamahasiswa[".printFields"][] = "mhsPrlsrNamaAsing";
$tdatamahasiswa[".printFields"][] = "mhsWsdId";
$tdatamahasiswa[".printFields"][] = "mhsTanggalPengubahan";
$tdatamahasiswa[".printFields"][] = "mhsUnitPengubah";
$tdatamahasiswa[".printFields"][] = "mhsUserPengubah";
$tdatamahasiswa[".printFields"][] = "mhsProdiGelarKelulusan";
$tdatamahasiswa[".printFields"][] = "mhsSemIdMulai";
$tdatamahasiswa[".printFields"][] = "mhsBiayaStudi";
$tdatamahasiswa[".printFields"][] = "mhsPekerjaan";
$tdatamahasiswa[".printFields"][] = "mhsPTKerja";
$tdatamahasiswa[".printFields"][] = "mhsPSKerja";
$tdatamahasiswa[".printFields"][] = "mhsNIDNPromotor";
$tdatamahasiswa[".printFields"][] = "mhsKoPromotor1";
$tdatamahasiswa[".printFields"][] = "mhsKoPromotor2";
$tdatamahasiswa[".printFields"][] = "mhsKoPromotor3";
$tdatamahasiswa[".printFields"][] = "mhsKoPromotor4";
$tdatamahasiswa[".printFields"][] = "mhsProdiAsal";
$tdatamahasiswa[".printFields"][] = "mhsDiktiShift";
$tdatamahasiswa[".printFields"][] = "mhsPembayaranIpp";
$tdatamahasiswa[".printFields"][] = "mshNoIpp";
$tdatamahasiswa[".printFields"][] = "mhsPersyaratan";
$tdatamahasiswa[".printFields"][] = "mhsPengOrg";
$tdatamahasiswa[".printFields"][] = "mhsOrg";
$tdatamahasiswa[".printFields"][] = "mhsDomisili";
$tdatamahasiswa[".printFields"][] = "mhsJenisSttb";
$tdatamahasiswa[".printFields"][] = "mhsIsKerja";
$tdatamahasiswa[".printFields"][] = "mhsStatusSmta";
$tdatamahasiswa[".printFields"][] = "mhsAkreditasi";
$tdatamahasiswa[".printFields"][] = "mhsKerja";
$tdatamahasiswa[".printFields"][] = "mhsSaudaraLk";
$tdatamahasiswa[".printFields"][] = "mhsSaudaraPr";
$tdatamahasiswa[".printFields"][] = "mhsHobi";
$tdatamahasiswa[".printFields"][] = "mhsSmtaLain";
$tdatamahasiswa[".printFields"][] = "mhsAkreditasiSmta";
$tdatamahasiswa[".printFields"][] = "mhsBiayaKuliah";
$tdatamahasiswa[".printFields"][] = "MhsIdJenisSmta";
$tdatamahasiswa[".printFields"][] = "mhsSmtaPropinsiKode";
$tdatamahasiswa[".printFields"][] = "mhsEmailOld";
$tdatamahasiswa[".printFields"][] = "mhsNoKtp";
$tdatamahasiswa[".printFields"][] = "mhsNoKk";


//	mhsNiu
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "mhsNiu";
	$fdata["GoodName"] = "mhsNiu";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNiu");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNiu";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNiu";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNiu"] = $fdata;
//	mhsNif
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "mhsNif";
	$fdata["GoodName"] = "mhsNif";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNif");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNif";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNif";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNif"] = $fdata;
//	mhsNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "mhsNama";
	$fdata["GoodName"] = "mhsNama";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNama";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNama"] = $fdata;
//	mhsAngkatan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "mhsAngkatan";
	$fdata["GoodName"] = "mhsAngkatan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAngkatan");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAngkatan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAngkatan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAngkatan"] = $fdata;
//	mhsSemesterMasuk
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "mhsSemesterMasuk";
	$fdata["GoodName"] = "mhsSemesterMasuk";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSemesterMasuk");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSemesterMasuk";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSemesterMasuk";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSemesterMasuk"] = $fdata;
//	mhsPasswordRegistrasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "mhsPasswordRegistrasi";
	$fdata["GoodName"] = "mhsPasswordRegistrasi";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPasswordRegistrasi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPasswordRegistrasi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPasswordRegistrasi";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPasswordRegistrasi"] = $fdata;
//	mhsKurId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "mhsKurId";
	$fdata["GoodName"] = "mhsKurId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKurId");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKurId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKurId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_kurikulum";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "kurId";
	$edata["LinkFieldType"] = 20;
	$edata["DisplayField"] = "kurId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKurId"] = $fdata;
//	mhsProdiKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "mhsProdiKode";
	$fdata["GoodName"] = "mhsProdiKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsProdiKode");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsProdiKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsProdiKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "program_studi";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "prodiKode";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "prodiKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsProdiKode"] = $fdata;
//	mhsProdiKodeUniv
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "mhsProdiKodeUniv";
	$fdata["GoodName"] = "mhsProdiKodeUniv";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsProdiKodeUniv");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsProdiKodeUniv";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsProdiKodeUniv";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsProdiKodeUniv"] = $fdata;
//	mhsProdikonsentrasiId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "mhsProdikonsentrasiId";
	$fdata["GoodName"] = "mhsProdikonsentrasiId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsProdikonsentrasiId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsProdikonsentrasiId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsProdikonsentrasiId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "program_studi_konsentrasi";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "prodikonsentrasiId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "prodikonsentrasiId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsProdikonsentrasiId"] = $fdata;
//	mhsWktkulId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "mhsWktkulId";
	$fdata["GoodName"] = "mhsWktkulId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsWktkulId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsWktkulId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsWktkulId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_waktu_kuliah_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "wktkulId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "wktkulId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsWktkulId"] = $fdata;
//	mhsNomorTes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "mhsNomorTes";
	$fdata["GoodName"] = "mhsNomorTes";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNomorTes");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNomorTes";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNomorTes";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNomorTes"] = $fdata;
//	mhsTanggalTerdaftar
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "mhsTanggalTerdaftar";
	$fdata["GoodName"] = "mhsTanggalTerdaftar";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalTerdaftar");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalTerdaftar";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalTerdaftar";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalTerdaftar"] = $fdata;
//	mhsStatusMasukPt
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 14;
	$fdata["strName"] = "mhsStatusMasukPt";
	$fdata["GoodName"] = "mhsStatusMasukPt";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStatusMasukPt");
	$fdata["FieldType"] = 129;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStatusMasukPt";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsStatusMasukPt";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
		$edata["LookupType"] = 0;
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "B";
	$edata["LookupValues"][] = "P";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsStatusMasukPt"] = $fdata;
//	mhsIsAsing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 15;
	$fdata["strName"] = "mhsIsAsing";
	$fdata["GoodName"] = "mhsIsAsing";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsIsAsing");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsIsAsing";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsIsAsing";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsIsAsing"] = $fdata;
//	mhsJumlahSksPindahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 16;
	$fdata["strName"] = "mhsJumlahSksPindahan";
	$fdata["GoodName"] = "mhsJumlahSksPindahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJumlahSksPindahan");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJumlahSksPindahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJumlahSksPindahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJumlahSksPindahan"] = $fdata;
//	mhsKodePtPindahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 17;
	$fdata["strName"] = "mhsKodePtPindahan";
	$fdata["GoodName"] = "mhsKodePtPindahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKodePtPindahan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKodePtPindahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKodePtPindahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKodePtPindahan"] = $fdata;
//	mhsKodeProdiDiktiPindahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 18;
	$fdata["strName"] = "mhsKodeProdiDiktiPindahan";
	$fdata["GoodName"] = "mhsKodeProdiDiktiPindahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKodeProdiDiktiPindahan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKodeProdiDiktiPindahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKodeProdiDiktiPindahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKodeProdiDiktiPindahan"] = $fdata;
//	mhsNamaPtPindahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 19;
	$fdata["strName"] = "mhsNamaPtPindahan";
	$fdata["GoodName"] = "mhsNamaPtPindahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNamaPtPindahan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNamaPtPindahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNamaPtPindahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNamaPtPindahan"] = $fdata;
//	mhsJjarKodeDiktiPindahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 20;
	$fdata["strName"] = "mhsJjarKodeDiktiPindahan";
	$fdata["GoodName"] = "mhsJjarKodeDiktiPindahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJjarKodeDiktiPindahan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJjarKodeDiktiPindahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJjarKodeDiktiPindahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=1";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJjarKodeDiktiPindahan"] = $fdata;
//	mhsTahunMasukPtPindahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 21;
	$fdata["strName"] = "mhsTahunMasukPtPindahan";
	$fdata["GoodName"] = "mhsTahunMasukPtPindahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTahunMasukPtPindahan");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTahunMasukPtPindahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTahunMasukPtPindahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTahunMasukPtPindahan"] = $fdata;
//	mhsNimLama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 22;
	$fdata["strName"] = "mhsNimLama";
	$fdata["GoodName"] = "mhsNimLama";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNimLama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNimLama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNimLama";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNimLama"] = $fdata;
//	mhsJenisKelamin
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 23;
	$fdata["strName"] = "mhsJenisKelamin";
	$fdata["GoodName"] = "mhsJenisKelamin";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJenisKelamin");
	$fdata["FieldType"] = 129;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJenisKelamin";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJenisKelamin";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
		$edata["LookupType"] = 0;
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "L";
	$edata["LookupValues"][] = "P";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJenisKelamin"] = $fdata;
//	mhsKotaKodeLahir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 24;
	$fdata["strName"] = "mhsKotaKodeLahir";
	$fdata["GoodName"] = "mhsKotaKodeLahir";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKotaKodeLahir");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKotaKodeLahir";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKotaKodeLahir";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "kota_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "kotaKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "kotaKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKotaKodeLahir"] = $fdata;
//	mhsTanggalLahir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 25;
	$fdata["strName"] = "mhsTanggalLahir";
	$fdata["GoodName"] = "mhsTanggalLahir";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalLahir");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalLahir";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalLahir";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalLahir"] = $fdata;
//	mhsAgmrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 26;
	$fdata["strName"] = "mhsAgmrId";
	$fdata["GoodName"] = "mhsAgmrId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAgmrId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAgmrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAgmrId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "agama_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "agmrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "agmrId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAgmrId"] = $fdata;
//	mhsSmtaKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 27;
	$fdata["strName"] = "mhsSmtaKode";
	$fdata["GoodName"] = "mhsSmtaKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSmtaKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSmtaKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSmtaKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_smta";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "smtaKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "smtaKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSmtaKode"] = $fdata;
//	mhsTdftSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 28;
	$fdata["strName"] = "mhsTdftSmta";
	$fdata["GoodName"] = "mhsTdftSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTdftSmta");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTdftSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTdftSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTdftSmta"] = $fdata;
//	mhsTahunTamatSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 29;
	$fdata["strName"] = "mhsTahunTamatSmta";
	$fdata["GoodName"] = "mhsTahunTamatSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTahunTamatSmta");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTahunTamatSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTahunTamatSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTahunTamatSmta"] = $fdata;
//	mhsTahunLulusSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 30;
	$fdata["strName"] = "mhsTahunLulusSmta";
	$fdata["GoodName"] = "mhsTahunLulusSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTahunLulusSmta");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTahunLulusSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTahunLulusSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTahunLulusSmta"] = $fdata;
//	mhsJursmtarKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 31;
	$fdata["strName"] = "mhsJursmtarKode";
	$fdata["GoodName"] = "mhsJursmtarKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJursmtarKode");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJursmtarKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJursmtarKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_jurusan_smta_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "jursmtarKode";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "jursmtarKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJursmtarKode"] = $fdata;
//	mhsAlamatSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 32;
	$fdata["strName"] = "mhsAlamatSmta";
	$fdata["GoodName"] = "mhsAlamatSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAlamatSmta");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAlamatSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAlamatSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAlamatSmta"] = $fdata;
//	mhsNoIjasahSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 33;
	$fdata["strName"] = "mhsNoIjasahSmta";
	$fdata["GoodName"] = "mhsNoIjasahSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoIjasahSmta");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoIjasahSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoIjasahSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoIjasahSmta"] = $fdata;
//	mhsIjasahSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 34;
	$fdata["strName"] = "mhsIjasahSmta";
	$fdata["GoodName"] = "mhsIjasahSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsIjasahSmta");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsIjasahSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsIjasahSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=7";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsIjasahSmta"] = $fdata;
//	mhsTanggalIjasahSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 35;
	$fdata["strName"] = "mhsTanggalIjasahSmta";
	$fdata["GoodName"] = "mhsTanggalIjasahSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalIjasahSmta");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalIjasahSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalIjasahSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalIjasahSmta"] = $fdata;
//	mhsNilaiUjianAkhirSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 36;
	$fdata["strName"] = "mhsNilaiUjianAkhirSmta";
	$fdata["GoodName"] = "mhsNilaiUjianAkhirSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNilaiUjianAkhirSmta");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNilaiUjianAkhirSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNilaiUjianAkhirSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=5";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNilaiUjianAkhirSmta"] = $fdata;
//	mhsJumlahMpUjianAkhirSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 37;
	$fdata["strName"] = "mhsJumlahMpUjianAkhirSmta";
	$fdata["GoodName"] = "mhsJumlahMpUjianAkhirSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJumlahMpUjianAkhirSmta");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJumlahMpUjianAkhirSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJumlahMpUjianAkhirSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJumlahMpUjianAkhirSmta"] = $fdata;
//	mhsStnkrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 38;
	$fdata["strName"] = "mhsStnkrId";
	$fdata["GoodName"] = "mhsStnkrId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStnkrId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStnkrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsStnkrId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "status_nikah_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "stnkrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "stnkrId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsStnkrId"] = $fdata;
//	mhsJumlahSaudara
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 39;
	$fdata["strName"] = "mhsJumlahSaudara";
	$fdata["GoodName"] = "mhsJumlahSaudara";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJumlahSaudara");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJumlahSaudara";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJumlahSaudara";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJumlahSaudara"] = $fdata;
//	mhsAlamatMhs
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 40;
	$fdata["strName"] = "mhsAlamatMhs";
	$fdata["GoodName"] = "mhsAlamatMhs";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAlamatMhs");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAlamatMhs";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAlamatMhs";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAlamatMhs"] = $fdata;
//	mhsAlamatTerakhir
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 41;
	$fdata["strName"] = "mhsAlamatTerakhir";
	$fdata["GoodName"] = "mhsAlamatTerakhir";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAlamatTerakhir");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAlamatTerakhir";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAlamatTerakhir";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAlamatTerakhir"] = $fdata;
//	mhsAlamatDiKotaIni
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 42;
	$fdata["strName"] = "mhsAlamatDiKotaIni";
	$fdata["GoodName"] = "mhsAlamatDiKotaIni";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAlamatDiKotaIni");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAlamatDiKotaIni";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAlamatDiKotaIni";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAlamatDiKotaIni"] = $fdata;
//	mhsKotaKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 43;
	$fdata["strName"] = "mhsKotaKode";
	$fdata["GoodName"] = "mhsKotaKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKotaKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKotaKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKotaKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "kota_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "kotaKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "kotaKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKotaKode"] = $fdata;
//	mhsNgrKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 44;
	$fdata["strName"] = "mhsNgrKode";
	$fdata["GoodName"] = "mhsNgrKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNgrKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNgrKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNgrKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "negara_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "negKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "negKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNgrKode"] = $fdata;
//	mhsKodePos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 45;
	$fdata["strName"] = "mhsKodePos";
	$fdata["GoodName"] = "mhsKodePos";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKodePos");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKodePos";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKodePos";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=5";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKodePos"] = $fdata;
//	mhsStatrumahId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 46;
	$fdata["strName"] = "mhsStatrumahId";
	$fdata["GoodName"] = "mhsStatrumahId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStatrumahId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStatrumahId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsStatrumahId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_status_rumah_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "statrumahId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "statrumahId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsStatrumahId"] = $fdata;
//	mhsSbdnrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 47;
	$fdata["strName"] = "mhsSbdnrId";
	$fdata["GoodName"] = "mhsSbdnrId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSbdnrId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSbdnrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSbdnrId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_sumber_dana_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "sbdnrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "sbdnrId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSbdnrId"] = $fdata;
//	mhsHubbiayaId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 48;
	$fdata["strName"] = "mhsHubbiayaId";
	$fdata["GoodName"] = "mhsHubbiayaId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsHubbiayaId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsHubbiayaId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsHubbiayaId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_hubungan_biaya_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "hubbiayaId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "hubbiayaId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsHubbiayaId"] = $fdata;
//	mhsTempatKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 49;
	$fdata["strName"] = "mhsTempatKerja";
	$fdata["GoodName"] = "mhsTempatKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTempatKerja");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTempatKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTempatKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTempatKerja"] = $fdata;
//	mhsAlamatTempatKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 50;
	$fdata["strName"] = "mhsAlamatTempatKerja";
	$fdata["GoodName"] = "mhsAlamatTempatKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAlamatTempatKerja");
	$fdata["FieldType"] = 201;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAlamatTempatKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAlamatTempatKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text area");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 100;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAlamatTempatKerja"] = $fdata;
//	mhsNoTelpTempatKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 51;
	$fdata["strName"] = "mhsNoTelpTempatKerja";
	$fdata["GoodName"] = "mhsNoTelpTempatKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoTelpTempatKerja");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoTelpTempatKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoTelpTempatKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoTelpTempatKerja"] = $fdata;
//	mhsBeasiswa
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 52;
	$fdata["strName"] = "mhsBeasiswa";
	$fdata["GoodName"] = "mhsBeasiswa";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsBeasiswa");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsBeasiswa";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsBeasiswa";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsBeasiswa"] = $fdata;
//	mhsWnrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 53;
	$fdata["strName"] = "mhsWnrId";
	$fdata["GoodName"] = "mhsWnrId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsWnrId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsWnrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsWnrId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "warga_negara_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "wnrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "wnrId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsWnrId"] = $fdata;
//	mhsJlrrKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 54;
	$fdata["strName"] = "mhsJlrrKode";
	$fdata["GoodName"] = "mhsJlrrKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJlrrKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJlrrKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJlrrKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_jalur_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "jllrKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "jllrKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJlrrKode"] = $fdata;
//	mhsNoAskes
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 55;
	$fdata["strName"] = "mhsNoAskes";
	$fdata["GoodName"] = "mhsNoAskes";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoAskes");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoAskes";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoAskes";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoAskes"] = $fdata;
//	mhsNoTelp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 56;
	$fdata["strName"] = "mhsNoTelp";
	$fdata["GoodName"] = "mhsNoTelp";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoTelp");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoTelp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoTelp";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoTelp"] = $fdata;
//	mhsNoHp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 57;
	$fdata["strName"] = "mhsNoHp";
	$fdata["GoodName"] = "mhsNoHp";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoHp");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoHp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoHp";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoHp"] = $fdata;
//	mhsEmail
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 58;
	$fdata["strName"] = "mhsEmail";
	$fdata["GoodName"] = "mhsEmail";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsEmail");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsEmail";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsEmail";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsEmail"] = $fdata;
//	mhsHomepage
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 59;
	$fdata["strName"] = "mhsHomepage";
	$fdata["GoodName"] = "mhsHomepage";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsHomepage");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsHomepage";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsHomepage";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsHomepage"] = $fdata;
//	mhsFoto
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 60;
	$fdata["strName"] = "mhsFoto";
	$fdata["GoodName"] = "mhsFoto";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsFoto");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsFoto";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsFoto";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsFoto"] = $fdata;
//	mhsStakmhsrKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 61;
	$fdata["strName"] = "mhsStakmhsrKode";
	$fdata["GoodName"] = "mhsStakmhsrKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStakmhsrKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStakmhsrKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsStakmhsrKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "status_aktif_mahasiswa_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "stakmhsrKode";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "stakmhsrKode";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsStakmhsrKode"] = $fdata;
//	mhsDsnPegNipPembimbingAkademik
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 62;
	$fdata["strName"] = "mhsDsnPegNipPembimbingAkademik";
	$fdata["GoodName"] = "mhsDsnPegNipPembimbingAkademik";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsDsnPegNipPembimbingAkademik");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsDsnPegNipPembimbingAkademik";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsDsnPegNipPembimbingAkademik";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "dosen";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "dsnPegNip";
	$edata["LinkFieldType"] = 200;
	$edata["DisplayField"] = "dsnPegNip";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsDsnPegNipPembimbingAkademik"] = $fdata;
//	mhsSksWajib
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 63;
	$fdata["strName"] = "mhsSksWajib";
	$fdata["GoodName"] = "mhsSksWajib";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksWajib");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksWajib";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksWajib";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksWajib"] = $fdata;
//	mhsSksPilihan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 64;
	$fdata["strName"] = "mhsSksPilihan";
	$fdata["GoodName"] = "mhsSksPilihan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksPilihan");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksPilihan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksPilihan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksPilihan"] = $fdata;
//	mhsSksA
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 65;
	$fdata["strName"] = "mhsSksA";
	$fdata["GoodName"] = "mhsSksA";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksA");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksA";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksA";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksA"] = $fdata;
//	mhsSksB
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 66;
	$fdata["strName"] = "mhsSksB";
	$fdata["GoodName"] = "mhsSksB";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksB");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksB";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksB";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksB"] = $fdata;
//	mhsSksC
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 67;
	$fdata["strName"] = "mhsSksC";
	$fdata["GoodName"] = "mhsSksC";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksC");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksC";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksC";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksC"] = $fdata;
//	mhsSksD
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 68;
	$fdata["strName"] = "mhsSksD";
	$fdata["GoodName"] = "mhsSksD";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksD");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksD";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksD";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksD"] = $fdata;
//	mhsSksE
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 69;
	$fdata["strName"] = "mhsSksE";
	$fdata["GoodName"] = "mhsSksE";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksE");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksE";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksE";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksE"] = $fdata;
//	mhsSksTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 70;
	$fdata["strName"] = "mhsSksTranskrip";
	$fdata["GoodName"] = "mhsSksTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSksTranskrip");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSksTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSksTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSksTranskrip"] = $fdata;
//	mhsBobotTotalTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 71;
	$fdata["strName"] = "mhsBobotTotalTranskrip";
	$fdata["GoodName"] = "mhsBobotTotalTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsBobotTotalTranskrip");
	$fdata["FieldType"] = 14;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsBobotTotalTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsBobotTotalTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Number");

	
	
	
	
	
	
		$vdata["DecimalDigits"] = 2;

	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsBobotTotalTranskrip"] = $fdata;
//	mhsIpkTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 72;
	$fdata["strName"] = "mhsIpkTranskrip";
	$fdata["GoodName"] = "mhsIpkTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsIpkTranskrip");
	$fdata["FieldType"] = 14;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsIpkTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsIpkTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Number");

	
	
	
	
	
	
		$vdata["DecimalDigits"] = 2;

	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsIpkTranskrip"] = $fdata;
//	mhsLamaStudiSemester
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 73;
	$fdata["strName"] = "mhsLamaStudiSemester";
	$fdata["GoodName"] = "mhsLamaStudiSemester";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsLamaStudiSemester");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsLamaStudiSemester";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsLamaStudiSemester";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsLamaStudiSemester"] = $fdata;
//	mhsLamaStudiBulan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 74;
	$fdata["strName"] = "mhsLamaStudiBulan";
	$fdata["GoodName"] = "mhsLamaStudiBulan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsLamaStudiBulan");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsLamaStudiBulan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsLamaStudiBulan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsLamaStudiBulan"] = $fdata;
//	mhsIsTranskripAkhirDiarsipkan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 75;
	$fdata["strName"] = "mhsIsTranskripAkhirDiarsipkan";
	$fdata["GoodName"] = "mhsIsTranskripAkhirDiarsipkan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsIsTranskripAkhirDiarsipkan");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsIsTranskripAkhirDiarsipkan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsIsTranskripAkhirDiarsipkan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsIsTranskripAkhirDiarsipkan"] = $fdata;
//	mhsTanggalTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 76;
	$fdata["strName"] = "mhsTanggalTranskrip";
	$fdata["GoodName"] = "mhsTanggalTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalTranskrip");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalTranskrip"] = $fdata;
//	mhsNomorTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 77;
	$fdata["strName"] = "mhsNomorTranskrip";
	$fdata["GoodName"] = "mhsNomorTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNomorTranskrip");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNomorTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNomorTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNomorTranskrip"] = $fdata;
//	mhsTempatLahirTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 78;
	$fdata["strName"] = "mhsTempatLahirTranskrip";
	$fdata["GoodName"] = "mhsTempatLahirTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTempatLahirTranskrip");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTempatLahirTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTempatLahirTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTempatLahirTranskrip"] = $fdata;
//	mhsTanggalLahirTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 79;
	$fdata["strName"] = "mhsTanggalLahirTranskrip";
	$fdata["GoodName"] = "mhsTanggalLahirTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalLahirTranskrip");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalLahirTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalLahirTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalLahirTranskrip"] = $fdata;
//	mhsMetodeBuildTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 80;
	$fdata["strName"] = "mhsMetodeBuildTranskrip";
	$fdata["GoodName"] = "mhsMetodeBuildTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsMetodeBuildTranskrip");
	$fdata["FieldType"] = 201;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsMetodeBuildTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsMetodeBuildTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text area");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
				$edata["nRows"] = 100;
			$edata["nCols"] = 200;

	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsMetodeBuildTranskrip"] = $fdata;
//	mhsMetodePenyetaraanTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 81;
	$fdata["strName"] = "mhsMetodePenyetaraanTranskrip";
	$fdata["GoodName"] = "mhsMetodePenyetaraanTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsMetodePenyetaraanTranskrip");
	$fdata["FieldType"] = 129;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsMetodePenyetaraanTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsMetodePenyetaraanTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
		$edata["LookupType"] = 0;
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
	
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "kurikulum_tertentu";
	$edata["LookupValues"][] = "kurikulum_mahasiswa";
	$edata["LookupValues"][] = "tidak_ada_penyetaraan";

	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsMetodePenyetaraanTranskrip"] = $fdata;
//	mhsTahunKurikulumPenyetaraanTranskrip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 82;
	$fdata["strName"] = "mhsTahunKurikulumPenyetaraanTranskrip";
	$fdata["GoodName"] = "mhsTahunKurikulumPenyetaraanTranskrip";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTahunKurikulumPenyetaraanTranskrip");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTahunKurikulumPenyetaraanTranskrip";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTahunKurikulumPenyetaraanTranskrip";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsTahunKurikulumPenyetaraanTranskrip"] = $fdata;
//	mhsTanggalLulus
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 83;
	$fdata["strName"] = "mhsTanggalLulus";
	$fdata["GoodName"] = "mhsTanggalLulus";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalLulus");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalLulus";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalLulus";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalLulus"] = $fdata;
//	mhsNoSuratYudisium
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 84;
	$fdata["strName"] = "mhsNoSuratYudisium";
	$fdata["GoodName"] = "mhsNoSuratYudisium";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoSuratYudisium");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoSuratYudisium";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoSuratYudisium";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoSuratYudisium"] = $fdata;
//	mhsTanggalSuratYudisium
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 85;
	$fdata["strName"] = "mhsTanggalSuratYudisium";
	$fdata["GoodName"] = "mhsTanggalSuratYudisium";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalSuratYudisium");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalSuratYudisium";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalSuratYudisium";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalSuratYudisium"] = $fdata;
//	mhsSemIdLulus
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 86;
	$fdata["strName"] = "mhsSemIdLulus";
	$fdata["GoodName"] = "mhsSemIdLulus";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSemIdLulus");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSemIdLulus";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSemIdLulus";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSemIdLulus"] = $fdata;
//	mhsTanggalIjasah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 87;
	$fdata["strName"] = "mhsTanggalIjasah";
	$fdata["GoodName"] = "mhsTanggalIjasah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalIjasah");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalIjasah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalIjasah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalIjasah"] = $fdata;
//	mhsNoIjasah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 88;
	$fdata["strName"] = "mhsNoIjasah";
	$fdata["GoodName"] = "mhsNoIjasah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoIjasah");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoIjasah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoIjasah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoIjasah"] = $fdata;
//	mhsKodeIjasah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 89;
	$fdata["strName"] = "mhsKodeIjasah";
	$fdata["GoodName"] = "mhsKodeIjasah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKodeIjasah");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKodeIjasah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKodeIjasah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKodeIjasah"] = $fdata;
//	mhsPinIjasah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 90;
	$fdata["strName"] = "mhsPinIjasah";
	$fdata["GoodName"] = "mhsPinIjasah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPinIjasah");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPinIjasah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPinIjasah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPinIjasah"] = $fdata;
//	mhsPrlsrId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 91;
	$fdata["strName"] = "mhsPrlsrId";
	$fdata["GoodName"] = "mhsPrlsrId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPrlsrId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPrlsrId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPrlsrId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_predikat_lulus_ref";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "prlsrId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "prlsrId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPrlsrId"] = $fdata;
//	mhsPrlsrNama
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 92;
	$fdata["strName"] = "mhsPrlsrNama";
	$fdata["GoodName"] = "mhsPrlsrNama";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPrlsrNama");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPrlsrNama";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPrlsrNama";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPrlsrNama"] = $fdata;
//	mhsPrlsrNamaAsing
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 93;
	$fdata["strName"] = "mhsPrlsrNamaAsing";
	$fdata["GoodName"] = "mhsPrlsrNamaAsing";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPrlsrNamaAsing");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPrlsrNamaAsing";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPrlsrNamaAsing";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPrlsrNamaAsing"] = $fdata;
//	mhsWsdId
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 94;
	$fdata["strName"] = "mhsWsdId";
	$fdata["GoodName"] = "mhsWsdId";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsWsdId");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsWsdId";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsWsdId";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "s_wisuda";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "wsdId";
	$edata["LinkFieldType"] = 2;
	$edata["DisplayField"] = "wsdId";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsWsdId"] = $fdata;
//	mhsTanggalPengubahan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 95;
	$fdata["strName"] = "mhsTanggalPengubahan";
	$fdata["GoodName"] = "mhsTanggalPengubahan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsTanggalPengubahan");
	$fdata["FieldType"] = 135;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsTanggalPengubahan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsTanggalPengubahan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

		$edata["ShowTime"] = true;

	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsTanggalPengubahan"] = $fdata;
//	mhsUnitPengubah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 96;
	$fdata["strName"] = "mhsUnitPengubah";
	$fdata["GoodName"] = "mhsUnitPengubah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsUnitPengubah");
	$fdata["FieldType"] = 20;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsUnitPengubah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsUnitPengubah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsUnitPengubah"] = $fdata;
//	mhsUserPengubah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 97;
	$fdata["strName"] = "mhsUserPengubah";
	$fdata["GoodName"] = "mhsUserPengubah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsUserPengubah");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsUserPengubah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsUserPengubah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsUserPengubah"] = $fdata;
//	mhsProdiGelarKelulusan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 98;
	$fdata["strName"] = "mhsProdiGelarKelulusan";
	$fdata["GoodName"] = "mhsProdiGelarKelulusan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsProdiGelarKelulusan");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsProdiGelarKelulusan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsProdiGelarKelulusan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=6";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsProdiGelarKelulusan"] = $fdata;
//	mhsSemIdMulai
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 99;
	$fdata["strName"] = "mhsSemIdMulai";
	$fdata["GoodName"] = "mhsSemIdMulai";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSemIdMulai");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSemIdMulai";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSemIdMulai";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSemIdMulai"] = $fdata;
//	mhsBiayaStudi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 100;
	$fdata["strName"] = "mhsBiayaStudi";
	$fdata["GoodName"] = "mhsBiayaStudi";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsBiayaStudi");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsBiayaStudi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsBiayaStudi";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsBiayaStudi"] = $fdata;
//	mhsPekerjaan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 101;
	$fdata["strName"] = "mhsPekerjaan";
	$fdata["GoodName"] = "mhsPekerjaan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPekerjaan");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPekerjaan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPekerjaan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPekerjaan"] = $fdata;
//	mhsPTKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 102;
	$fdata["strName"] = "mhsPTKerja";
	$fdata["GoodName"] = "mhsPTKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPTKerja");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPTKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPTKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPTKerja"] = $fdata;
//	mhsPSKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 103;
	$fdata["strName"] = "mhsPSKerja";
	$fdata["GoodName"] = "mhsPSKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPSKerja");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPSKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPSKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPSKerja"] = $fdata;
//	mhsNIDNPromotor
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 104;
	$fdata["strName"] = "mhsNIDNPromotor";
	$fdata["GoodName"] = "mhsNIDNPromotor";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNIDNPromotor");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNIDNPromotor";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNIDNPromotor";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNIDNPromotor"] = $fdata;
//	mhsKoPromotor1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 105;
	$fdata["strName"] = "mhsKoPromotor1";
	$fdata["GoodName"] = "mhsKoPromotor1";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKoPromotor1");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKoPromotor1";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKoPromotor1";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKoPromotor1"] = $fdata;
//	mhsKoPromotor2
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 106;
	$fdata["strName"] = "mhsKoPromotor2";
	$fdata["GoodName"] = "mhsKoPromotor2";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKoPromotor2");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKoPromotor2";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKoPromotor2";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKoPromotor2"] = $fdata;
//	mhsKoPromotor3
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 107;
	$fdata["strName"] = "mhsKoPromotor3";
	$fdata["GoodName"] = "mhsKoPromotor3";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKoPromotor3");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKoPromotor3";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKoPromotor3";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKoPromotor3"] = $fdata;
//	mhsKoPromotor4
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 108;
	$fdata["strName"] = "mhsKoPromotor4";
	$fdata["GoodName"] = "mhsKoPromotor4";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKoPromotor4");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKoPromotor4";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKoPromotor4";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKoPromotor4"] = $fdata;
//	mhsProdiAsal
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 109;
	$fdata["strName"] = "mhsProdiAsal";
	$fdata["GoodName"] = "mhsProdiAsal";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsProdiAsal");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsProdiAsal";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsProdiAsal";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsProdiAsal"] = $fdata;
//	mhsDiktiShift
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 110;
	$fdata["strName"] = "mhsDiktiShift";
	$fdata["GoodName"] = "mhsDiktiShift";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsDiktiShift");
	$fdata["FieldType"] = 2;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsDiktiShift";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsDiktiShift";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsDiktiShift"] = $fdata;
//	mhsPembayaranIpp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 111;
	$fdata["strName"] = "mhsPembayaranIpp";
	$fdata["GoodName"] = "mhsPembayaranIpp";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPembayaranIpp");
	$fdata["FieldType"] = 7;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPembayaranIpp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPembayaranIpp";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "Short Date");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Date");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
		$edata["DateEditType"] = 13;
	$edata["InitialYearFactor"] = 100;
	$edata["LastYearFactor"] = 10;

	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between", EMPTY_SEARCH, NOT_EMPTY );
// the end of search options settings




	$tdatamahasiswa["mhsPembayaranIpp"] = $fdata;
//	mshNoIpp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 112;
	$fdata["strName"] = "mshNoIpp";
	$fdata["GoodName"] = "mshNoIpp";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mshNoIpp");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mshNoIpp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mshNoIpp";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mshNoIpp"] = $fdata;
//	mhsPersyaratan
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 113;
	$fdata["strName"] = "mhsPersyaratan";
	$fdata["GoodName"] = "mhsPersyaratan";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPersyaratan");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPersyaratan";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPersyaratan";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPersyaratan"] = $fdata;
//	mhsPengOrg
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 114;
	$fdata["strName"] = "mhsPengOrg";
	$fdata["GoodName"] = "mhsPengOrg";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsPengOrg");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsPengOrg";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsPengOrg";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsPengOrg"] = $fdata;
//	mhsOrg
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 115;
	$fdata["strName"] = "mhsOrg";
	$fdata["GoodName"] = "mhsOrg";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsOrg");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsOrg";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsOrg";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsOrg"] = $fdata;
//	mhsDomisili
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 116;
	$fdata["strName"] = "mhsDomisili";
	$fdata["GoodName"] = "mhsDomisili";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsDomisili");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsDomisili";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsDomisili";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsDomisili"] = $fdata;
//	mhsJenisSttb
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 117;
	$fdata["strName"] = "mhsJenisSttb";
	$fdata["GoodName"] = "mhsJenisSttb";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsJenisSttb");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsJenisSttb";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsJenisSttb";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsJenisSttb"] = $fdata;
//	mhsIsKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 118;
	$fdata["strName"] = "mhsIsKerja";
	$fdata["GoodName"] = "mhsIsKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsIsKerja");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsIsKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsIsKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsIsKerja"] = $fdata;
//	mhsStatusSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 119;
	$fdata["strName"] = "mhsStatusSmta";
	$fdata["GoodName"] = "mhsStatusSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsStatusSmta");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsStatusSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsStatusSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsStatusSmta"] = $fdata;
//	mhsAkreditasi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 120;
	$fdata["strName"] = "mhsAkreditasi";
	$fdata["GoodName"] = "mhsAkreditasi";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAkreditasi");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAkreditasi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAkreditasi";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAkreditasi"] = $fdata;
//	mhsKerja
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 121;
	$fdata["strName"] = "mhsKerja";
	$fdata["GoodName"] = "mhsKerja";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsKerja");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsKerja";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsKerja";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsKerja"] = $fdata;
//	mhsSaudaraLk
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 122;
	$fdata["strName"] = "mhsSaudaraLk";
	$fdata["GoodName"] = "mhsSaudaraLk";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSaudaraLk");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSaudaraLk";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSaudaraLk";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSaudaraLk"] = $fdata;
//	mhsSaudaraPr
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 123;
	$fdata["strName"] = "mhsSaudaraPr";
	$fdata["GoodName"] = "mhsSaudaraPr";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSaudaraPr");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSaudaraPr";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSaudaraPr";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSaudaraPr"] = $fdata;
//	mhsHobi
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 124;
	$fdata["strName"] = "mhsHobi";
	$fdata["GoodName"] = "mhsHobi";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsHobi");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsHobi";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsHobi";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsHobi"] = $fdata;
//	mhsSmtaLain
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 125;
	$fdata["strName"] = "mhsSmtaLain";
	$fdata["GoodName"] = "mhsSmtaLain";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSmtaLain");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSmtaLain";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSmtaLain";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSmtaLain"] = $fdata;
//	mhsAkreditasiSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 126;
	$fdata["strName"] = "mhsAkreditasiSmta";
	$fdata["GoodName"] = "mhsAkreditasiSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsAkreditasiSmta");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsAkreditasiSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsAkreditasiSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsAkreditasiSmta"] = $fdata;
//	mhsBiayaKuliah
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 127;
	$fdata["strName"] = "mhsBiayaKuliah";
	$fdata["GoodName"] = "mhsBiayaKuliah";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsBiayaKuliah");
	$fdata["FieldType"] = 16;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsBiayaKuliah";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsBiayaKuliah";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
		
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsBiayaKuliah"] = $fdata;
//	MhsIdJenisSmta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 128;
	$fdata["strName"] = "MhsIdJenisSmta";
	$fdata["GoodName"] = "MhsIdJenisSmta";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","MhsIdJenisSmta");
	$fdata["FieldType"] = 3;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "MhsIdJenisSmta";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "MhsIdJenisSmta";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Lookup wizard");

	
	
		
	
// Begin Lookup settings
				$edata["LookupType"] = 1;
	$edata["LookupTable"] = "jenis_smta";
	$edata["LookupConnId"] = "gtakademik_dev_at_localhost";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;

	
		
	$edata["LinkField"] = "idJenisSmta";
	$edata["LinkFieldType"] = 3;
	$edata["DisplayField"] = "idJenisSmta";
	
	

	
	$edata["LookupOrderBy"] = "";

	
	
	
		$edata["SimpleAdd"] = true;


	
	
		$edata["SelectSize"] = 1;

// End Lookup Settings


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
	
	
		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
							
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Equals";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["MhsIdJenisSmta"] = $fdata;
//	mhsSmtaPropinsiKode
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 129;
	$fdata["strName"] = "mhsSmtaPropinsiKode";
	$fdata["GoodName"] = "mhsSmtaPropinsiKode";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsSmtaPropinsiKode");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsSmtaPropinsiKode";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsSmtaPropinsiKode";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsSmtaPropinsiKode"] = $fdata;
//	mhsEmailOld
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 130;
	$fdata["strName"] = "mhsEmailOld";
	$fdata["GoodName"] = "mhsEmailOld";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsEmailOld");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsEmailOld";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsEmailOld";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=255";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsEmailOld"] = $fdata;
//	mhsNoKtp
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 131;
	$fdata["strName"] = "mhsNoKtp";
	$fdata["GoodName"] = "mhsNoKtp";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoKtp");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoKtp";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoKtp";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoKtp"] = $fdata;
//	mhsNoKk
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 132;
	$fdata["strName"] = "mhsNoKk";
	$fdata["GoodName"] = "mhsNoKk";
	$fdata["ownerTable"] = "mahasiswa";
	$fdata["Label"] = GetFieldLabel("mahasiswa","mhsNoKk");
	$fdata["FieldType"] = 200;

	
	
	
			
		$fdata["bListPage"] = true;

		$fdata["bAddPage"] = true;

	
		$fdata["bEditPage"] = true;

	
		$fdata["bUpdateSelected"] = true;


		$fdata["bViewPage"] = true;

		$fdata["bAdvancedSearch"] = true;

		$fdata["bPrinterPage"] = true;

		$fdata["bExportPage"] = true;

		$fdata["strField"] = "mhsNoKk";

		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mhsNoKk";

	
	
				$fdata["FieldPermissions"] = true;

				$fdata["UploadFolder"] = "files";

//  Begin View Formats
	$fdata["ViewFormats"] = array();

	$vdata = array("ViewFormat" => "");

	
	
	
	
	
	
	
	
	
	
	
	
		$vdata["NeedEncode"] = true;

		
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats
	$fdata["EditFormats"] = array();

	$edata = array("EditFormat" => "Text field");

	
	
		
	


	
	
	
			$edata["acceptFileTypes"] = ".+$";

		$edata["maxNumberOfFiles"] = 1;

	
	
	
	
			$edata["HTML5InuptType"] = "text";

		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";

		$edata["controlWidth"] = 200;

//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
	
	
	//	End validation

	
			
	
	
	
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats


	$fdata["isSeparate"] = false;




// the field's search options settings
		$fdata["defaultSearchOption"] = "Contains";

			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Starts with", "More than", "Less than", "Between", "Empty", NOT_EMPTY);
// the end of search options settings




	$tdatamahasiswa["mhsNoKk"] = $fdata;


$tables_data["mahasiswa"]=&$tdatamahasiswa;
$field_labels["mahasiswa"] = &$fieldLabelsmahasiswa;
$fieldToolTips["mahasiswa"] = &$fieldToolTipsmahasiswa;
$placeHolders["mahasiswa"] = &$placeHoldersmahasiswa;
$page_titles["mahasiswa"] = &$pageTitlesmahasiswa;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["mahasiswa"] = array();

// tables which are master tables for current table (detail)
$masterTablesData["mahasiswa"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_mahasiswa()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "mhsNiu,  	mhsNif,  	mhsNama,  	mhsAngkatan,  	mhsSemesterMasuk,  	mhsPasswordRegistrasi,  	mhsKurId,  	mhsProdiKode,  	mhsProdiKodeUniv,  	mhsProdikonsentrasiId,  	mhsWktkulId,  	mhsNomorTes,  	mhsTanggalTerdaftar,  	mhsStatusMasukPt,  	mhsIsAsing,  	mhsJumlahSksPindahan,  	mhsKodePtPindahan,  	mhsKodeProdiDiktiPindahan,  	mhsNamaPtPindahan,  	mhsJjarKodeDiktiPindahan,  	mhsTahunMasukPtPindahan,  	mhsNimLama,  	mhsJenisKelamin,  	mhsKotaKodeLahir,  	mhsTanggalLahir,  	mhsAgmrId,  	mhsSmtaKode,  	mhsTdftSmta,  	mhsTahunTamatSmta,  	mhsTahunLulusSmta,  	mhsJursmtarKode,  	mhsAlamatSmta,  	mhsNoIjasahSmta,  	mhsIjasahSmta,  	mhsTanggalIjasahSmta,  	mhsNilaiUjianAkhirSmta,  	mhsJumlahMpUjianAkhirSmta,  	mhsStnkrId,  	mhsJumlahSaudara,  	mhsAlamatMhs,  	mhsAlamatTerakhir,  	mhsAlamatDiKotaIni,  	mhsKotaKode,  	mhsNgrKode,  	mhsKodePos,  	mhsStatrumahId,  	mhsSbdnrId,  	mhsHubbiayaId,  	mhsTempatKerja,  	mhsAlamatTempatKerja,  	mhsNoTelpTempatKerja,  	mhsBeasiswa,  	mhsWnrId,  	mhsJlrrKode,  	mhsNoAskes,  	mhsNoTelp,  	mhsNoHp,  	mhsEmail,  	mhsHomepage,  	mhsFoto,  	mhsStakmhsrKode,  	mhsDsnPegNipPembimbingAkademik,  	mhsSksWajib,  	mhsSksPilihan,  	mhsSksA,  	mhsSksB,  	mhsSksC,  	mhsSksD,  	mhsSksE,  	mhsSksTranskrip,  	mhsBobotTotalTranskrip,  	mhsIpkTranskrip,  	mhsLamaStudiSemester,  	mhsLamaStudiBulan,  	mhsIsTranskripAkhirDiarsipkan,  	mhsTanggalTranskrip,  	mhsNomorTranskrip,  	mhsTempatLahirTranskrip,  	mhsTanggalLahirTranskrip,  	mhsMetodeBuildTranskrip,  	mhsMetodePenyetaraanTranskrip,  	mhsTahunKurikulumPenyetaraanTranskrip,  	mhsTanggalLulus,  	mhsNoSuratYudisium,  	mhsTanggalSuratYudisium,  	mhsSemIdLulus,  	mhsTanggalIjasah,  	mhsNoIjasah,  	mhsKodeIjasah,  	mhsPinIjasah,  	mhsPrlsrId,  	mhsPrlsrNama,  	mhsPrlsrNamaAsing,  	mhsWsdId,  	mhsTanggalPengubahan,  	mhsUnitPengubah,  	mhsUserPengubah,  	mhsProdiGelarKelulusan,  	mhsSemIdMulai,  	mhsBiayaStudi,  	mhsPekerjaan,  	mhsPTKerja,  	mhsPSKerja,  	mhsNIDNPromotor,  	mhsKoPromotor1,  	mhsKoPromotor2,  	mhsKoPromotor3,  	mhsKoPromotor4,  	mhsProdiAsal,  	mhsDiktiShift,  	mhsPembayaranIpp,  	mshNoIpp,  	mhsPersyaratan,  	mhsPengOrg,  	mhsOrg,  	mhsDomisili,  	mhsJenisSttb,  	mhsIsKerja,  	mhsStatusSmta,  	mhsAkreditasi,  	mhsKerja,  	mhsSaudaraLk,  	mhsSaudaraPr,  	mhsHobi,  	mhsSmtaLain,  	mhsAkreditasiSmta,  	mhsBiayaKuliah,  	MhsIdJenisSmta,  	mhsSmtaPropinsiKode,  	mhsEmailOld,  	mhsNoKtp,  	mhsNoKk";
$proto0["m_strFrom"] = "FROM mahasiswa";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
	
		;
			$proto0["cipherer"] = null;
$proto2=array();
$proto2["m_sql"] = "";
$proto2["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto2["m_column"]=$obj;
$proto2["m_contained"] = array();
$proto2["m_strCase"] = "";
$proto2["m_havingmode"] = false;
$proto2["m_inBrackets"] = false;
$proto2["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto2);

$proto0["m_where"] = $obj;
$proto4=array();
$proto4["m_sql"] = "";
$proto4["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto4["m_column"]=$obj;
$proto4["m_contained"] = array();
$proto4["m_strCase"] = "";
$proto4["m_havingmode"] = false;
$proto4["m_inBrackets"] = false;
$proto4["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto4);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto6=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNiu",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto6["m_sql"] = "mhsNiu";
$proto6["m_srcTableName"] = "mahasiswa";
$proto6["m_expr"]=$obj;
$proto6["m_alias"] = "";
$obj = new SQLFieldListItem($proto6);

$proto0["m_fieldlist"][]=$obj;
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNif",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto8["m_sql"] = "mhsNif";
$proto8["m_srcTableName"] = "mahasiswa";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNama",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto10["m_sql"] = "mhsNama";
$proto10["m_srcTableName"] = "mahasiswa";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAngkatan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto12["m_sql"] = "mhsAngkatan";
$proto12["m_srcTableName"] = "mahasiswa";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto0["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSemesterMasuk",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto14["m_sql"] = "mhsSemesterMasuk";
$proto14["m_srcTableName"] = "mahasiswa";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto0["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPasswordRegistrasi",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto16["m_sql"] = "mhsPasswordRegistrasi";
$proto16["m_srcTableName"] = "mahasiswa";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto0["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKurId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto18["m_sql"] = "mhsKurId";
$proto18["m_srcTableName"] = "mahasiswa";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto0["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsProdiKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto20["m_sql"] = "mhsProdiKode";
$proto20["m_srcTableName"] = "mahasiswa";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto0["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsProdiKodeUniv",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto22["m_sql"] = "mhsProdiKodeUniv";
$proto22["m_srcTableName"] = "mahasiswa";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto0["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsProdikonsentrasiId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto24["m_sql"] = "mhsProdikonsentrasiId";
$proto24["m_srcTableName"] = "mahasiswa";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto0["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsWktkulId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto26["m_sql"] = "mhsWktkulId";
$proto26["m_srcTableName"] = "mahasiswa";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto0["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNomorTes",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto28["m_sql"] = "mhsNomorTes";
$proto28["m_srcTableName"] = "mahasiswa";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto0["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalTerdaftar",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto30["m_sql"] = "mhsTanggalTerdaftar";
$proto30["m_srcTableName"] = "mahasiswa";
$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto0["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStatusMasukPt",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto32["m_sql"] = "mhsStatusMasukPt";
$proto32["m_srcTableName"] = "mahasiswa";
$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "";
$obj = new SQLFieldListItem($proto32);

$proto0["m_fieldlist"][]=$obj;
						$proto34=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsIsAsing",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto34["m_sql"] = "mhsIsAsing";
$proto34["m_srcTableName"] = "mahasiswa";
$proto34["m_expr"]=$obj;
$proto34["m_alias"] = "";
$obj = new SQLFieldListItem($proto34);

$proto0["m_fieldlist"][]=$obj;
						$proto36=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJumlahSksPindahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto36["m_sql"] = "mhsJumlahSksPindahan";
$proto36["m_srcTableName"] = "mahasiswa";
$proto36["m_expr"]=$obj;
$proto36["m_alias"] = "";
$obj = new SQLFieldListItem($proto36);

$proto0["m_fieldlist"][]=$obj;
						$proto38=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKodePtPindahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto38["m_sql"] = "mhsKodePtPindahan";
$proto38["m_srcTableName"] = "mahasiswa";
$proto38["m_expr"]=$obj;
$proto38["m_alias"] = "";
$obj = new SQLFieldListItem($proto38);

$proto0["m_fieldlist"][]=$obj;
						$proto40=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKodeProdiDiktiPindahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto40["m_sql"] = "mhsKodeProdiDiktiPindahan";
$proto40["m_srcTableName"] = "mahasiswa";
$proto40["m_expr"]=$obj;
$proto40["m_alias"] = "";
$obj = new SQLFieldListItem($proto40);

$proto0["m_fieldlist"][]=$obj;
						$proto42=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNamaPtPindahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto42["m_sql"] = "mhsNamaPtPindahan";
$proto42["m_srcTableName"] = "mahasiswa";
$proto42["m_expr"]=$obj;
$proto42["m_alias"] = "";
$obj = new SQLFieldListItem($proto42);

$proto0["m_fieldlist"][]=$obj;
						$proto44=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJjarKodeDiktiPindahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto44["m_sql"] = "mhsJjarKodeDiktiPindahan";
$proto44["m_srcTableName"] = "mahasiswa";
$proto44["m_expr"]=$obj;
$proto44["m_alias"] = "";
$obj = new SQLFieldListItem($proto44);

$proto0["m_fieldlist"][]=$obj;
						$proto46=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTahunMasukPtPindahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto46["m_sql"] = "mhsTahunMasukPtPindahan";
$proto46["m_srcTableName"] = "mahasiswa";
$proto46["m_expr"]=$obj;
$proto46["m_alias"] = "";
$obj = new SQLFieldListItem($proto46);

$proto0["m_fieldlist"][]=$obj;
						$proto48=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNimLama",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto48["m_sql"] = "mhsNimLama";
$proto48["m_srcTableName"] = "mahasiswa";
$proto48["m_expr"]=$obj;
$proto48["m_alias"] = "";
$obj = new SQLFieldListItem($proto48);

$proto0["m_fieldlist"][]=$obj;
						$proto50=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJenisKelamin",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto50["m_sql"] = "mhsJenisKelamin";
$proto50["m_srcTableName"] = "mahasiswa";
$proto50["m_expr"]=$obj;
$proto50["m_alias"] = "";
$obj = new SQLFieldListItem($proto50);

$proto0["m_fieldlist"][]=$obj;
						$proto52=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKotaKodeLahir",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto52["m_sql"] = "mhsKotaKodeLahir";
$proto52["m_srcTableName"] = "mahasiswa";
$proto52["m_expr"]=$obj;
$proto52["m_alias"] = "";
$obj = new SQLFieldListItem($proto52);

$proto0["m_fieldlist"][]=$obj;
						$proto54=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalLahir",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto54["m_sql"] = "mhsTanggalLahir";
$proto54["m_srcTableName"] = "mahasiswa";
$proto54["m_expr"]=$obj;
$proto54["m_alias"] = "";
$obj = new SQLFieldListItem($proto54);

$proto0["m_fieldlist"][]=$obj;
						$proto56=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAgmrId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto56["m_sql"] = "mhsAgmrId";
$proto56["m_srcTableName"] = "mahasiswa";
$proto56["m_expr"]=$obj;
$proto56["m_alias"] = "";
$obj = new SQLFieldListItem($proto56);

$proto0["m_fieldlist"][]=$obj;
						$proto58=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSmtaKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto58["m_sql"] = "mhsSmtaKode";
$proto58["m_srcTableName"] = "mahasiswa";
$proto58["m_expr"]=$obj;
$proto58["m_alias"] = "";
$obj = new SQLFieldListItem($proto58);

$proto0["m_fieldlist"][]=$obj;
						$proto60=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTdftSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto60["m_sql"] = "mhsTdftSmta";
$proto60["m_srcTableName"] = "mahasiswa";
$proto60["m_expr"]=$obj;
$proto60["m_alias"] = "";
$obj = new SQLFieldListItem($proto60);

$proto0["m_fieldlist"][]=$obj;
						$proto62=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTahunTamatSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto62["m_sql"] = "mhsTahunTamatSmta";
$proto62["m_srcTableName"] = "mahasiswa";
$proto62["m_expr"]=$obj;
$proto62["m_alias"] = "";
$obj = new SQLFieldListItem($proto62);

$proto0["m_fieldlist"][]=$obj;
						$proto64=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTahunLulusSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto64["m_sql"] = "mhsTahunLulusSmta";
$proto64["m_srcTableName"] = "mahasiswa";
$proto64["m_expr"]=$obj;
$proto64["m_alias"] = "";
$obj = new SQLFieldListItem($proto64);

$proto0["m_fieldlist"][]=$obj;
						$proto66=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJursmtarKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto66["m_sql"] = "mhsJursmtarKode";
$proto66["m_srcTableName"] = "mahasiswa";
$proto66["m_expr"]=$obj;
$proto66["m_alias"] = "";
$obj = new SQLFieldListItem($proto66);

$proto0["m_fieldlist"][]=$obj;
						$proto68=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAlamatSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto68["m_sql"] = "mhsAlamatSmta";
$proto68["m_srcTableName"] = "mahasiswa";
$proto68["m_expr"]=$obj;
$proto68["m_alias"] = "";
$obj = new SQLFieldListItem($proto68);

$proto0["m_fieldlist"][]=$obj;
						$proto70=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoIjasahSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto70["m_sql"] = "mhsNoIjasahSmta";
$proto70["m_srcTableName"] = "mahasiswa";
$proto70["m_expr"]=$obj;
$proto70["m_alias"] = "";
$obj = new SQLFieldListItem($proto70);

$proto0["m_fieldlist"][]=$obj;
						$proto72=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsIjasahSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto72["m_sql"] = "mhsIjasahSmta";
$proto72["m_srcTableName"] = "mahasiswa";
$proto72["m_expr"]=$obj;
$proto72["m_alias"] = "";
$obj = new SQLFieldListItem($proto72);

$proto0["m_fieldlist"][]=$obj;
						$proto74=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalIjasahSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto74["m_sql"] = "mhsTanggalIjasahSmta";
$proto74["m_srcTableName"] = "mahasiswa";
$proto74["m_expr"]=$obj;
$proto74["m_alias"] = "";
$obj = new SQLFieldListItem($proto74);

$proto0["m_fieldlist"][]=$obj;
						$proto76=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNilaiUjianAkhirSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto76["m_sql"] = "mhsNilaiUjianAkhirSmta";
$proto76["m_srcTableName"] = "mahasiswa";
$proto76["m_expr"]=$obj;
$proto76["m_alias"] = "";
$obj = new SQLFieldListItem($proto76);

$proto0["m_fieldlist"][]=$obj;
						$proto78=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJumlahMpUjianAkhirSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto78["m_sql"] = "mhsJumlahMpUjianAkhirSmta";
$proto78["m_srcTableName"] = "mahasiswa";
$proto78["m_expr"]=$obj;
$proto78["m_alias"] = "";
$obj = new SQLFieldListItem($proto78);

$proto0["m_fieldlist"][]=$obj;
						$proto80=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStnkrId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto80["m_sql"] = "mhsStnkrId";
$proto80["m_srcTableName"] = "mahasiswa";
$proto80["m_expr"]=$obj;
$proto80["m_alias"] = "";
$obj = new SQLFieldListItem($proto80);

$proto0["m_fieldlist"][]=$obj;
						$proto82=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJumlahSaudara",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto82["m_sql"] = "mhsJumlahSaudara";
$proto82["m_srcTableName"] = "mahasiswa";
$proto82["m_expr"]=$obj;
$proto82["m_alias"] = "";
$obj = new SQLFieldListItem($proto82);

$proto0["m_fieldlist"][]=$obj;
						$proto84=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAlamatMhs",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto84["m_sql"] = "mhsAlamatMhs";
$proto84["m_srcTableName"] = "mahasiswa";
$proto84["m_expr"]=$obj;
$proto84["m_alias"] = "";
$obj = new SQLFieldListItem($proto84);

$proto0["m_fieldlist"][]=$obj;
						$proto86=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAlamatTerakhir",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto86["m_sql"] = "mhsAlamatTerakhir";
$proto86["m_srcTableName"] = "mahasiswa";
$proto86["m_expr"]=$obj;
$proto86["m_alias"] = "";
$obj = new SQLFieldListItem($proto86);

$proto0["m_fieldlist"][]=$obj;
						$proto88=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAlamatDiKotaIni",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto88["m_sql"] = "mhsAlamatDiKotaIni";
$proto88["m_srcTableName"] = "mahasiswa";
$proto88["m_expr"]=$obj;
$proto88["m_alias"] = "";
$obj = new SQLFieldListItem($proto88);

$proto0["m_fieldlist"][]=$obj;
						$proto90=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKotaKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto90["m_sql"] = "mhsKotaKode";
$proto90["m_srcTableName"] = "mahasiswa";
$proto90["m_expr"]=$obj;
$proto90["m_alias"] = "";
$obj = new SQLFieldListItem($proto90);

$proto0["m_fieldlist"][]=$obj;
						$proto92=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNgrKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto92["m_sql"] = "mhsNgrKode";
$proto92["m_srcTableName"] = "mahasiswa";
$proto92["m_expr"]=$obj;
$proto92["m_alias"] = "";
$obj = new SQLFieldListItem($proto92);

$proto0["m_fieldlist"][]=$obj;
						$proto94=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKodePos",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto94["m_sql"] = "mhsKodePos";
$proto94["m_srcTableName"] = "mahasiswa";
$proto94["m_expr"]=$obj;
$proto94["m_alias"] = "";
$obj = new SQLFieldListItem($proto94);

$proto0["m_fieldlist"][]=$obj;
						$proto96=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStatrumahId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto96["m_sql"] = "mhsStatrumahId";
$proto96["m_srcTableName"] = "mahasiswa";
$proto96["m_expr"]=$obj;
$proto96["m_alias"] = "";
$obj = new SQLFieldListItem($proto96);

$proto0["m_fieldlist"][]=$obj;
						$proto98=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSbdnrId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto98["m_sql"] = "mhsSbdnrId";
$proto98["m_srcTableName"] = "mahasiswa";
$proto98["m_expr"]=$obj;
$proto98["m_alias"] = "";
$obj = new SQLFieldListItem($proto98);

$proto0["m_fieldlist"][]=$obj;
						$proto100=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsHubbiayaId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto100["m_sql"] = "mhsHubbiayaId";
$proto100["m_srcTableName"] = "mahasiswa";
$proto100["m_expr"]=$obj;
$proto100["m_alias"] = "";
$obj = new SQLFieldListItem($proto100);

$proto0["m_fieldlist"][]=$obj;
						$proto102=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTempatKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto102["m_sql"] = "mhsTempatKerja";
$proto102["m_srcTableName"] = "mahasiswa";
$proto102["m_expr"]=$obj;
$proto102["m_alias"] = "";
$obj = new SQLFieldListItem($proto102);

$proto0["m_fieldlist"][]=$obj;
						$proto104=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAlamatTempatKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto104["m_sql"] = "mhsAlamatTempatKerja";
$proto104["m_srcTableName"] = "mahasiswa";
$proto104["m_expr"]=$obj;
$proto104["m_alias"] = "";
$obj = new SQLFieldListItem($proto104);

$proto0["m_fieldlist"][]=$obj;
						$proto106=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoTelpTempatKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto106["m_sql"] = "mhsNoTelpTempatKerja";
$proto106["m_srcTableName"] = "mahasiswa";
$proto106["m_expr"]=$obj;
$proto106["m_alias"] = "";
$obj = new SQLFieldListItem($proto106);

$proto0["m_fieldlist"][]=$obj;
						$proto108=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsBeasiswa",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto108["m_sql"] = "mhsBeasiswa";
$proto108["m_srcTableName"] = "mahasiswa";
$proto108["m_expr"]=$obj;
$proto108["m_alias"] = "";
$obj = new SQLFieldListItem($proto108);

$proto0["m_fieldlist"][]=$obj;
						$proto110=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsWnrId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto110["m_sql"] = "mhsWnrId";
$proto110["m_srcTableName"] = "mahasiswa";
$proto110["m_expr"]=$obj;
$proto110["m_alias"] = "";
$obj = new SQLFieldListItem($proto110);

$proto0["m_fieldlist"][]=$obj;
						$proto112=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJlrrKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto112["m_sql"] = "mhsJlrrKode";
$proto112["m_srcTableName"] = "mahasiswa";
$proto112["m_expr"]=$obj;
$proto112["m_alias"] = "";
$obj = new SQLFieldListItem($proto112);

$proto0["m_fieldlist"][]=$obj;
						$proto114=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoAskes",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto114["m_sql"] = "mhsNoAskes";
$proto114["m_srcTableName"] = "mahasiswa";
$proto114["m_expr"]=$obj;
$proto114["m_alias"] = "";
$obj = new SQLFieldListItem($proto114);

$proto0["m_fieldlist"][]=$obj;
						$proto116=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoTelp",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto116["m_sql"] = "mhsNoTelp";
$proto116["m_srcTableName"] = "mahasiswa";
$proto116["m_expr"]=$obj;
$proto116["m_alias"] = "";
$obj = new SQLFieldListItem($proto116);

$proto0["m_fieldlist"][]=$obj;
						$proto118=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoHp",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto118["m_sql"] = "mhsNoHp";
$proto118["m_srcTableName"] = "mahasiswa";
$proto118["m_expr"]=$obj;
$proto118["m_alias"] = "";
$obj = new SQLFieldListItem($proto118);

$proto0["m_fieldlist"][]=$obj;
						$proto120=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsEmail",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto120["m_sql"] = "mhsEmail";
$proto120["m_srcTableName"] = "mahasiswa";
$proto120["m_expr"]=$obj;
$proto120["m_alias"] = "";
$obj = new SQLFieldListItem($proto120);

$proto0["m_fieldlist"][]=$obj;
						$proto122=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsHomepage",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto122["m_sql"] = "mhsHomepage";
$proto122["m_srcTableName"] = "mahasiswa";
$proto122["m_expr"]=$obj;
$proto122["m_alias"] = "";
$obj = new SQLFieldListItem($proto122);

$proto0["m_fieldlist"][]=$obj;
						$proto124=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsFoto",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto124["m_sql"] = "mhsFoto";
$proto124["m_srcTableName"] = "mahasiswa";
$proto124["m_expr"]=$obj;
$proto124["m_alias"] = "";
$obj = new SQLFieldListItem($proto124);

$proto0["m_fieldlist"][]=$obj;
						$proto126=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStakmhsrKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto126["m_sql"] = "mhsStakmhsrKode";
$proto126["m_srcTableName"] = "mahasiswa";
$proto126["m_expr"]=$obj;
$proto126["m_alias"] = "";
$obj = new SQLFieldListItem($proto126);

$proto0["m_fieldlist"][]=$obj;
						$proto128=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsDsnPegNipPembimbingAkademik",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto128["m_sql"] = "mhsDsnPegNipPembimbingAkademik";
$proto128["m_srcTableName"] = "mahasiswa";
$proto128["m_expr"]=$obj;
$proto128["m_alias"] = "";
$obj = new SQLFieldListItem($proto128);

$proto0["m_fieldlist"][]=$obj;
						$proto130=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksWajib",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto130["m_sql"] = "mhsSksWajib";
$proto130["m_srcTableName"] = "mahasiswa";
$proto130["m_expr"]=$obj;
$proto130["m_alias"] = "";
$obj = new SQLFieldListItem($proto130);

$proto0["m_fieldlist"][]=$obj;
						$proto132=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksPilihan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto132["m_sql"] = "mhsSksPilihan";
$proto132["m_srcTableName"] = "mahasiswa";
$proto132["m_expr"]=$obj;
$proto132["m_alias"] = "";
$obj = new SQLFieldListItem($proto132);

$proto0["m_fieldlist"][]=$obj;
						$proto134=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksA",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto134["m_sql"] = "mhsSksA";
$proto134["m_srcTableName"] = "mahasiswa";
$proto134["m_expr"]=$obj;
$proto134["m_alias"] = "";
$obj = new SQLFieldListItem($proto134);

$proto0["m_fieldlist"][]=$obj;
						$proto136=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksB",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto136["m_sql"] = "mhsSksB";
$proto136["m_srcTableName"] = "mahasiswa";
$proto136["m_expr"]=$obj;
$proto136["m_alias"] = "";
$obj = new SQLFieldListItem($proto136);

$proto0["m_fieldlist"][]=$obj;
						$proto138=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksC",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto138["m_sql"] = "mhsSksC";
$proto138["m_srcTableName"] = "mahasiswa";
$proto138["m_expr"]=$obj;
$proto138["m_alias"] = "";
$obj = new SQLFieldListItem($proto138);

$proto0["m_fieldlist"][]=$obj;
						$proto140=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksD",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto140["m_sql"] = "mhsSksD";
$proto140["m_srcTableName"] = "mahasiswa";
$proto140["m_expr"]=$obj;
$proto140["m_alias"] = "";
$obj = new SQLFieldListItem($proto140);

$proto0["m_fieldlist"][]=$obj;
						$proto142=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksE",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto142["m_sql"] = "mhsSksE";
$proto142["m_srcTableName"] = "mahasiswa";
$proto142["m_expr"]=$obj;
$proto142["m_alias"] = "";
$obj = new SQLFieldListItem($proto142);

$proto0["m_fieldlist"][]=$obj;
						$proto144=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSksTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto144["m_sql"] = "mhsSksTranskrip";
$proto144["m_srcTableName"] = "mahasiswa";
$proto144["m_expr"]=$obj;
$proto144["m_alias"] = "";
$obj = new SQLFieldListItem($proto144);

$proto0["m_fieldlist"][]=$obj;
						$proto146=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsBobotTotalTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto146["m_sql"] = "mhsBobotTotalTranskrip";
$proto146["m_srcTableName"] = "mahasiswa";
$proto146["m_expr"]=$obj;
$proto146["m_alias"] = "";
$obj = new SQLFieldListItem($proto146);

$proto0["m_fieldlist"][]=$obj;
						$proto148=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsIpkTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto148["m_sql"] = "mhsIpkTranskrip";
$proto148["m_srcTableName"] = "mahasiswa";
$proto148["m_expr"]=$obj;
$proto148["m_alias"] = "";
$obj = new SQLFieldListItem($proto148);

$proto0["m_fieldlist"][]=$obj;
						$proto150=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsLamaStudiSemester",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto150["m_sql"] = "mhsLamaStudiSemester";
$proto150["m_srcTableName"] = "mahasiswa";
$proto150["m_expr"]=$obj;
$proto150["m_alias"] = "";
$obj = new SQLFieldListItem($proto150);

$proto0["m_fieldlist"][]=$obj;
						$proto152=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsLamaStudiBulan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto152["m_sql"] = "mhsLamaStudiBulan";
$proto152["m_srcTableName"] = "mahasiswa";
$proto152["m_expr"]=$obj;
$proto152["m_alias"] = "";
$obj = new SQLFieldListItem($proto152);

$proto0["m_fieldlist"][]=$obj;
						$proto154=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsIsTranskripAkhirDiarsipkan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto154["m_sql"] = "mhsIsTranskripAkhirDiarsipkan";
$proto154["m_srcTableName"] = "mahasiswa";
$proto154["m_expr"]=$obj;
$proto154["m_alias"] = "";
$obj = new SQLFieldListItem($proto154);

$proto0["m_fieldlist"][]=$obj;
						$proto156=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto156["m_sql"] = "mhsTanggalTranskrip";
$proto156["m_srcTableName"] = "mahasiswa";
$proto156["m_expr"]=$obj;
$proto156["m_alias"] = "";
$obj = new SQLFieldListItem($proto156);

$proto0["m_fieldlist"][]=$obj;
						$proto158=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNomorTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto158["m_sql"] = "mhsNomorTranskrip";
$proto158["m_srcTableName"] = "mahasiswa";
$proto158["m_expr"]=$obj;
$proto158["m_alias"] = "";
$obj = new SQLFieldListItem($proto158);

$proto0["m_fieldlist"][]=$obj;
						$proto160=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTempatLahirTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto160["m_sql"] = "mhsTempatLahirTranskrip";
$proto160["m_srcTableName"] = "mahasiswa";
$proto160["m_expr"]=$obj;
$proto160["m_alias"] = "";
$obj = new SQLFieldListItem($proto160);

$proto0["m_fieldlist"][]=$obj;
						$proto162=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalLahirTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto162["m_sql"] = "mhsTanggalLahirTranskrip";
$proto162["m_srcTableName"] = "mahasiswa";
$proto162["m_expr"]=$obj;
$proto162["m_alias"] = "";
$obj = new SQLFieldListItem($proto162);

$proto0["m_fieldlist"][]=$obj;
						$proto164=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsMetodeBuildTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto164["m_sql"] = "mhsMetodeBuildTranskrip";
$proto164["m_srcTableName"] = "mahasiswa";
$proto164["m_expr"]=$obj;
$proto164["m_alias"] = "";
$obj = new SQLFieldListItem($proto164);

$proto0["m_fieldlist"][]=$obj;
						$proto166=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsMetodePenyetaraanTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto166["m_sql"] = "mhsMetodePenyetaraanTranskrip";
$proto166["m_srcTableName"] = "mahasiswa";
$proto166["m_expr"]=$obj;
$proto166["m_alias"] = "";
$obj = new SQLFieldListItem($proto166);

$proto0["m_fieldlist"][]=$obj;
						$proto168=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTahunKurikulumPenyetaraanTranskrip",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto168["m_sql"] = "mhsTahunKurikulumPenyetaraanTranskrip";
$proto168["m_srcTableName"] = "mahasiswa";
$proto168["m_expr"]=$obj;
$proto168["m_alias"] = "";
$obj = new SQLFieldListItem($proto168);

$proto0["m_fieldlist"][]=$obj;
						$proto170=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalLulus",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto170["m_sql"] = "mhsTanggalLulus";
$proto170["m_srcTableName"] = "mahasiswa";
$proto170["m_expr"]=$obj;
$proto170["m_alias"] = "";
$obj = new SQLFieldListItem($proto170);

$proto0["m_fieldlist"][]=$obj;
						$proto172=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoSuratYudisium",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto172["m_sql"] = "mhsNoSuratYudisium";
$proto172["m_srcTableName"] = "mahasiswa";
$proto172["m_expr"]=$obj;
$proto172["m_alias"] = "";
$obj = new SQLFieldListItem($proto172);

$proto0["m_fieldlist"][]=$obj;
						$proto174=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalSuratYudisium",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto174["m_sql"] = "mhsTanggalSuratYudisium";
$proto174["m_srcTableName"] = "mahasiswa";
$proto174["m_expr"]=$obj;
$proto174["m_alias"] = "";
$obj = new SQLFieldListItem($proto174);

$proto0["m_fieldlist"][]=$obj;
						$proto176=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSemIdLulus",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto176["m_sql"] = "mhsSemIdLulus";
$proto176["m_srcTableName"] = "mahasiswa";
$proto176["m_expr"]=$obj;
$proto176["m_alias"] = "";
$obj = new SQLFieldListItem($proto176);

$proto0["m_fieldlist"][]=$obj;
						$proto178=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalIjasah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto178["m_sql"] = "mhsTanggalIjasah";
$proto178["m_srcTableName"] = "mahasiswa";
$proto178["m_expr"]=$obj;
$proto178["m_alias"] = "";
$obj = new SQLFieldListItem($proto178);

$proto0["m_fieldlist"][]=$obj;
						$proto180=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoIjasah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto180["m_sql"] = "mhsNoIjasah";
$proto180["m_srcTableName"] = "mahasiswa";
$proto180["m_expr"]=$obj;
$proto180["m_alias"] = "";
$obj = new SQLFieldListItem($proto180);

$proto0["m_fieldlist"][]=$obj;
						$proto182=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKodeIjasah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto182["m_sql"] = "mhsKodeIjasah";
$proto182["m_srcTableName"] = "mahasiswa";
$proto182["m_expr"]=$obj;
$proto182["m_alias"] = "";
$obj = new SQLFieldListItem($proto182);

$proto0["m_fieldlist"][]=$obj;
						$proto184=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPinIjasah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto184["m_sql"] = "mhsPinIjasah";
$proto184["m_srcTableName"] = "mahasiswa";
$proto184["m_expr"]=$obj;
$proto184["m_alias"] = "";
$obj = new SQLFieldListItem($proto184);

$proto0["m_fieldlist"][]=$obj;
						$proto186=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPrlsrId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto186["m_sql"] = "mhsPrlsrId";
$proto186["m_srcTableName"] = "mahasiswa";
$proto186["m_expr"]=$obj;
$proto186["m_alias"] = "";
$obj = new SQLFieldListItem($proto186);

$proto0["m_fieldlist"][]=$obj;
						$proto188=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPrlsrNama",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto188["m_sql"] = "mhsPrlsrNama";
$proto188["m_srcTableName"] = "mahasiswa";
$proto188["m_expr"]=$obj;
$proto188["m_alias"] = "";
$obj = new SQLFieldListItem($proto188);

$proto0["m_fieldlist"][]=$obj;
						$proto190=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPrlsrNamaAsing",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto190["m_sql"] = "mhsPrlsrNamaAsing";
$proto190["m_srcTableName"] = "mahasiswa";
$proto190["m_expr"]=$obj;
$proto190["m_alias"] = "";
$obj = new SQLFieldListItem($proto190);

$proto0["m_fieldlist"][]=$obj;
						$proto192=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsWsdId",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto192["m_sql"] = "mhsWsdId";
$proto192["m_srcTableName"] = "mahasiswa";
$proto192["m_expr"]=$obj;
$proto192["m_alias"] = "";
$obj = new SQLFieldListItem($proto192);

$proto0["m_fieldlist"][]=$obj;
						$proto194=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsTanggalPengubahan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto194["m_sql"] = "mhsTanggalPengubahan";
$proto194["m_srcTableName"] = "mahasiswa";
$proto194["m_expr"]=$obj;
$proto194["m_alias"] = "";
$obj = new SQLFieldListItem($proto194);

$proto0["m_fieldlist"][]=$obj;
						$proto196=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsUnitPengubah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto196["m_sql"] = "mhsUnitPengubah";
$proto196["m_srcTableName"] = "mahasiswa";
$proto196["m_expr"]=$obj;
$proto196["m_alias"] = "";
$obj = new SQLFieldListItem($proto196);

$proto0["m_fieldlist"][]=$obj;
						$proto198=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsUserPengubah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto198["m_sql"] = "mhsUserPengubah";
$proto198["m_srcTableName"] = "mahasiswa";
$proto198["m_expr"]=$obj;
$proto198["m_alias"] = "";
$obj = new SQLFieldListItem($proto198);

$proto0["m_fieldlist"][]=$obj;
						$proto200=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsProdiGelarKelulusan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto200["m_sql"] = "mhsProdiGelarKelulusan";
$proto200["m_srcTableName"] = "mahasiswa";
$proto200["m_expr"]=$obj;
$proto200["m_alias"] = "";
$obj = new SQLFieldListItem($proto200);

$proto0["m_fieldlist"][]=$obj;
						$proto202=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSemIdMulai",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto202["m_sql"] = "mhsSemIdMulai";
$proto202["m_srcTableName"] = "mahasiswa";
$proto202["m_expr"]=$obj;
$proto202["m_alias"] = "";
$obj = new SQLFieldListItem($proto202);

$proto0["m_fieldlist"][]=$obj;
						$proto204=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsBiayaStudi",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto204["m_sql"] = "mhsBiayaStudi";
$proto204["m_srcTableName"] = "mahasiswa";
$proto204["m_expr"]=$obj;
$proto204["m_alias"] = "";
$obj = new SQLFieldListItem($proto204);

$proto0["m_fieldlist"][]=$obj;
						$proto206=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPekerjaan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto206["m_sql"] = "mhsPekerjaan";
$proto206["m_srcTableName"] = "mahasiswa";
$proto206["m_expr"]=$obj;
$proto206["m_alias"] = "";
$obj = new SQLFieldListItem($proto206);

$proto0["m_fieldlist"][]=$obj;
						$proto208=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPTKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto208["m_sql"] = "mhsPTKerja";
$proto208["m_srcTableName"] = "mahasiswa";
$proto208["m_expr"]=$obj;
$proto208["m_alias"] = "";
$obj = new SQLFieldListItem($proto208);

$proto0["m_fieldlist"][]=$obj;
						$proto210=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPSKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto210["m_sql"] = "mhsPSKerja";
$proto210["m_srcTableName"] = "mahasiswa";
$proto210["m_expr"]=$obj;
$proto210["m_alias"] = "";
$obj = new SQLFieldListItem($proto210);

$proto0["m_fieldlist"][]=$obj;
						$proto212=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNIDNPromotor",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto212["m_sql"] = "mhsNIDNPromotor";
$proto212["m_srcTableName"] = "mahasiswa";
$proto212["m_expr"]=$obj;
$proto212["m_alias"] = "";
$obj = new SQLFieldListItem($proto212);

$proto0["m_fieldlist"][]=$obj;
						$proto214=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKoPromotor1",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto214["m_sql"] = "mhsKoPromotor1";
$proto214["m_srcTableName"] = "mahasiswa";
$proto214["m_expr"]=$obj;
$proto214["m_alias"] = "";
$obj = new SQLFieldListItem($proto214);

$proto0["m_fieldlist"][]=$obj;
						$proto216=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKoPromotor2",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto216["m_sql"] = "mhsKoPromotor2";
$proto216["m_srcTableName"] = "mahasiswa";
$proto216["m_expr"]=$obj;
$proto216["m_alias"] = "";
$obj = new SQLFieldListItem($proto216);

$proto0["m_fieldlist"][]=$obj;
						$proto218=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKoPromotor3",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto218["m_sql"] = "mhsKoPromotor3";
$proto218["m_srcTableName"] = "mahasiswa";
$proto218["m_expr"]=$obj;
$proto218["m_alias"] = "";
$obj = new SQLFieldListItem($proto218);

$proto0["m_fieldlist"][]=$obj;
						$proto220=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKoPromotor4",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto220["m_sql"] = "mhsKoPromotor4";
$proto220["m_srcTableName"] = "mahasiswa";
$proto220["m_expr"]=$obj;
$proto220["m_alias"] = "";
$obj = new SQLFieldListItem($proto220);

$proto0["m_fieldlist"][]=$obj;
						$proto222=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsProdiAsal",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto222["m_sql"] = "mhsProdiAsal";
$proto222["m_srcTableName"] = "mahasiswa";
$proto222["m_expr"]=$obj;
$proto222["m_alias"] = "";
$obj = new SQLFieldListItem($proto222);

$proto0["m_fieldlist"][]=$obj;
						$proto224=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsDiktiShift",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto224["m_sql"] = "mhsDiktiShift";
$proto224["m_srcTableName"] = "mahasiswa";
$proto224["m_expr"]=$obj;
$proto224["m_alias"] = "";
$obj = new SQLFieldListItem($proto224);

$proto0["m_fieldlist"][]=$obj;
						$proto226=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPembayaranIpp",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto226["m_sql"] = "mhsPembayaranIpp";
$proto226["m_srcTableName"] = "mahasiswa";
$proto226["m_expr"]=$obj;
$proto226["m_alias"] = "";
$obj = new SQLFieldListItem($proto226);

$proto0["m_fieldlist"][]=$obj;
						$proto228=array();
			$obj = new SQLField(array(
	"m_strName" => "mshNoIpp",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto228["m_sql"] = "mshNoIpp";
$proto228["m_srcTableName"] = "mahasiswa";
$proto228["m_expr"]=$obj;
$proto228["m_alias"] = "";
$obj = new SQLFieldListItem($proto228);

$proto0["m_fieldlist"][]=$obj;
						$proto230=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPersyaratan",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto230["m_sql"] = "mhsPersyaratan";
$proto230["m_srcTableName"] = "mahasiswa";
$proto230["m_expr"]=$obj;
$proto230["m_alias"] = "";
$obj = new SQLFieldListItem($proto230);

$proto0["m_fieldlist"][]=$obj;
						$proto232=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsPengOrg",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto232["m_sql"] = "mhsPengOrg";
$proto232["m_srcTableName"] = "mahasiswa";
$proto232["m_expr"]=$obj;
$proto232["m_alias"] = "";
$obj = new SQLFieldListItem($proto232);

$proto0["m_fieldlist"][]=$obj;
						$proto234=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsOrg",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto234["m_sql"] = "mhsOrg";
$proto234["m_srcTableName"] = "mahasiswa";
$proto234["m_expr"]=$obj;
$proto234["m_alias"] = "";
$obj = new SQLFieldListItem($proto234);

$proto0["m_fieldlist"][]=$obj;
						$proto236=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsDomisili",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto236["m_sql"] = "mhsDomisili";
$proto236["m_srcTableName"] = "mahasiswa";
$proto236["m_expr"]=$obj;
$proto236["m_alias"] = "";
$obj = new SQLFieldListItem($proto236);

$proto0["m_fieldlist"][]=$obj;
						$proto238=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsJenisSttb",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto238["m_sql"] = "mhsJenisSttb";
$proto238["m_srcTableName"] = "mahasiswa";
$proto238["m_expr"]=$obj;
$proto238["m_alias"] = "";
$obj = new SQLFieldListItem($proto238);

$proto0["m_fieldlist"][]=$obj;
						$proto240=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsIsKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto240["m_sql"] = "mhsIsKerja";
$proto240["m_srcTableName"] = "mahasiswa";
$proto240["m_expr"]=$obj;
$proto240["m_alias"] = "";
$obj = new SQLFieldListItem($proto240);

$proto0["m_fieldlist"][]=$obj;
						$proto242=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsStatusSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto242["m_sql"] = "mhsStatusSmta";
$proto242["m_srcTableName"] = "mahasiswa";
$proto242["m_expr"]=$obj;
$proto242["m_alias"] = "";
$obj = new SQLFieldListItem($proto242);

$proto0["m_fieldlist"][]=$obj;
						$proto244=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAkreditasi",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto244["m_sql"] = "mhsAkreditasi";
$proto244["m_srcTableName"] = "mahasiswa";
$proto244["m_expr"]=$obj;
$proto244["m_alias"] = "";
$obj = new SQLFieldListItem($proto244);

$proto0["m_fieldlist"][]=$obj;
						$proto246=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsKerja",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto246["m_sql"] = "mhsKerja";
$proto246["m_srcTableName"] = "mahasiswa";
$proto246["m_expr"]=$obj;
$proto246["m_alias"] = "";
$obj = new SQLFieldListItem($proto246);

$proto0["m_fieldlist"][]=$obj;
						$proto248=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSaudaraLk",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto248["m_sql"] = "mhsSaudaraLk";
$proto248["m_srcTableName"] = "mahasiswa";
$proto248["m_expr"]=$obj;
$proto248["m_alias"] = "";
$obj = new SQLFieldListItem($proto248);

$proto0["m_fieldlist"][]=$obj;
						$proto250=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSaudaraPr",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto250["m_sql"] = "mhsSaudaraPr";
$proto250["m_srcTableName"] = "mahasiswa";
$proto250["m_expr"]=$obj;
$proto250["m_alias"] = "";
$obj = new SQLFieldListItem($proto250);

$proto0["m_fieldlist"][]=$obj;
						$proto252=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsHobi",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto252["m_sql"] = "mhsHobi";
$proto252["m_srcTableName"] = "mahasiswa";
$proto252["m_expr"]=$obj;
$proto252["m_alias"] = "";
$obj = new SQLFieldListItem($proto252);

$proto0["m_fieldlist"][]=$obj;
						$proto254=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSmtaLain",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto254["m_sql"] = "mhsSmtaLain";
$proto254["m_srcTableName"] = "mahasiswa";
$proto254["m_expr"]=$obj;
$proto254["m_alias"] = "";
$obj = new SQLFieldListItem($proto254);

$proto0["m_fieldlist"][]=$obj;
						$proto256=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsAkreditasiSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto256["m_sql"] = "mhsAkreditasiSmta";
$proto256["m_srcTableName"] = "mahasiswa";
$proto256["m_expr"]=$obj;
$proto256["m_alias"] = "";
$obj = new SQLFieldListItem($proto256);

$proto0["m_fieldlist"][]=$obj;
						$proto258=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsBiayaKuliah",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto258["m_sql"] = "mhsBiayaKuliah";
$proto258["m_srcTableName"] = "mahasiswa";
$proto258["m_expr"]=$obj;
$proto258["m_alias"] = "";
$obj = new SQLFieldListItem($proto258);

$proto0["m_fieldlist"][]=$obj;
						$proto260=array();
			$obj = new SQLField(array(
	"m_strName" => "MhsIdJenisSmta",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto260["m_sql"] = "MhsIdJenisSmta";
$proto260["m_srcTableName"] = "mahasiswa";
$proto260["m_expr"]=$obj;
$proto260["m_alias"] = "";
$obj = new SQLFieldListItem($proto260);

$proto0["m_fieldlist"][]=$obj;
						$proto262=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsSmtaPropinsiKode",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto262["m_sql"] = "mhsSmtaPropinsiKode";
$proto262["m_srcTableName"] = "mahasiswa";
$proto262["m_expr"]=$obj;
$proto262["m_alias"] = "";
$obj = new SQLFieldListItem($proto262);

$proto0["m_fieldlist"][]=$obj;
						$proto264=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsEmailOld",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto264["m_sql"] = "mhsEmailOld";
$proto264["m_srcTableName"] = "mahasiswa";
$proto264["m_expr"]=$obj;
$proto264["m_alias"] = "";
$obj = new SQLFieldListItem($proto264);

$proto0["m_fieldlist"][]=$obj;
						$proto266=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoKtp",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto266["m_sql"] = "mhsNoKtp";
$proto266["m_srcTableName"] = "mahasiswa";
$proto266["m_expr"]=$obj;
$proto266["m_alias"] = "";
$obj = new SQLFieldListItem($proto266);

$proto0["m_fieldlist"][]=$obj;
						$proto268=array();
			$obj = new SQLField(array(
	"m_strName" => "mhsNoKk",
	"m_strTable" => "mahasiswa",
	"m_srcTableName" => "mahasiswa"
));

$proto268["m_sql"] = "mhsNoKk";
$proto268["m_srcTableName"] = "mahasiswa";
$proto268["m_expr"]=$obj;
$proto268["m_alias"] = "";
$obj = new SQLFieldListItem($proto268);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto270=array();
$proto270["m_link"] = "SQLL_MAIN";
			$proto271=array();
$proto271["m_strName"] = "mahasiswa";
$proto271["m_srcTableName"] = "mahasiswa";
$proto271["m_columns"] = array();
$proto271["m_columns"][] = "mhsNiu";
$proto271["m_columns"][] = "mhsNif";
$proto271["m_columns"][] = "mhsNama";
$proto271["m_columns"][] = "mhsAngkatan";
$proto271["m_columns"][] = "mhsSemesterMasuk";
$proto271["m_columns"][] = "mhsPasswordRegistrasi";
$proto271["m_columns"][] = "mhsKurId";
$proto271["m_columns"][] = "mhsProdiKode";
$proto271["m_columns"][] = "mhsProdiKodeUniv";
$proto271["m_columns"][] = "mhsProdikonsentrasiId";
$proto271["m_columns"][] = "mhsWktkulId";
$proto271["m_columns"][] = "mhsNomorTes";
$proto271["m_columns"][] = "mhsTanggalTerdaftar";
$proto271["m_columns"][] = "mhsStatusMasukPt";
$proto271["m_columns"][] = "mhsIsAsing";
$proto271["m_columns"][] = "mhsJumlahSksPindahan";
$proto271["m_columns"][] = "mhsKodePtPindahan";
$proto271["m_columns"][] = "mhsKodeProdiDiktiPindahan";
$proto271["m_columns"][] = "mhsNamaPtPindahan";
$proto271["m_columns"][] = "mhsJjarKodeDiktiPindahan";
$proto271["m_columns"][] = "mhsTahunMasukPtPindahan";
$proto271["m_columns"][] = "mhsNimLama";
$proto271["m_columns"][] = "mhsJenisKelamin";
$proto271["m_columns"][] = "mhsKotaKodeLahir";
$proto271["m_columns"][] = "mhsTanggalLahir";
$proto271["m_columns"][] = "mhsAgmrId";
$proto271["m_columns"][] = "mhsSmtaKode";
$proto271["m_columns"][] = "mhsTdftSmta";
$proto271["m_columns"][] = "mhsTahunTamatSmta";
$proto271["m_columns"][] = "mhsTahunLulusSmta";
$proto271["m_columns"][] = "mhsJursmtarKode";
$proto271["m_columns"][] = "mhsAlamatSmta";
$proto271["m_columns"][] = "mhsNoIjasahSmta";
$proto271["m_columns"][] = "mhsIjasahSmta";
$proto271["m_columns"][] = "mhsTanggalIjasahSmta";
$proto271["m_columns"][] = "mhsNilaiUjianAkhirSmta";
$proto271["m_columns"][] = "mhsJumlahMpUjianAkhirSmta";
$proto271["m_columns"][] = "mhsStnkrId";
$proto271["m_columns"][] = "mhsJumlahSaudara";
$proto271["m_columns"][] = "mhsAlamatMhs";
$proto271["m_columns"][] = "mhsAlamatTerakhir";
$proto271["m_columns"][] = "mhsAlamatDiKotaIni";
$proto271["m_columns"][] = "mhsKotaKode";
$proto271["m_columns"][] = "mhsNgrKode";
$proto271["m_columns"][] = "mhsKodePos";
$proto271["m_columns"][] = "mhsStatrumahId";
$proto271["m_columns"][] = "mhsSbdnrId";
$proto271["m_columns"][] = "mhsHubbiayaId";
$proto271["m_columns"][] = "mhsTempatKerja";
$proto271["m_columns"][] = "mhsAlamatTempatKerja";
$proto271["m_columns"][] = "mhsNoTelpTempatKerja";
$proto271["m_columns"][] = "mhsBeasiswa";
$proto271["m_columns"][] = "mhsWnrId";
$proto271["m_columns"][] = "mhsJlrrKode";
$proto271["m_columns"][] = "mhsNoAskes";
$proto271["m_columns"][] = "mhsNoTelp";
$proto271["m_columns"][] = "mhsNoHp";
$proto271["m_columns"][] = "mhsEmail";
$proto271["m_columns"][] = "mhsHomepage";
$proto271["m_columns"][] = "mhsFoto";
$proto271["m_columns"][] = "mhsStakmhsrKode";
$proto271["m_columns"][] = "mhsDsnPegNipPembimbingAkademik";
$proto271["m_columns"][] = "mhsSksWajib";
$proto271["m_columns"][] = "mhsSksPilihan";
$proto271["m_columns"][] = "mhsSksA";
$proto271["m_columns"][] = "mhsSksB";
$proto271["m_columns"][] = "mhsSksC";
$proto271["m_columns"][] = "mhsSksD";
$proto271["m_columns"][] = "mhsSksE";
$proto271["m_columns"][] = "mhsSksTranskrip";
$proto271["m_columns"][] = "mhsBobotTotalTranskrip";
$proto271["m_columns"][] = "mhsIpkTranskrip";
$proto271["m_columns"][] = "mhsLamaStudiSemester";
$proto271["m_columns"][] = "mhsLamaStudiBulan";
$proto271["m_columns"][] = "mhsIsTranskripAkhirDiarsipkan";
$proto271["m_columns"][] = "mhsTanggalTranskrip";
$proto271["m_columns"][] = "mhsNomorTranskrip";
$proto271["m_columns"][] = "mhsTempatLahirTranskrip";
$proto271["m_columns"][] = "mhsTanggalLahirTranskrip";
$proto271["m_columns"][] = "mhsMetodeBuildTranskrip";
$proto271["m_columns"][] = "mhsMetodePenyetaraanTranskrip";
$proto271["m_columns"][] = "mhsTahunKurikulumPenyetaraanTranskrip";
$proto271["m_columns"][] = "mhsTanggalLulus";
$proto271["m_columns"][] = "mhsNoSuratYudisium";
$proto271["m_columns"][] = "mhsTanggalSuratYudisium";
$proto271["m_columns"][] = "mhsSemIdLulus";
$proto271["m_columns"][] = "mhsTanggalIjasah";
$proto271["m_columns"][] = "mhsNoIjasah";
$proto271["m_columns"][] = "mhsKodeIjasah";
$proto271["m_columns"][] = "mhsPinIjasah";
$proto271["m_columns"][] = "mhsPrlsrId";
$proto271["m_columns"][] = "mhsPrlsrNama";
$proto271["m_columns"][] = "mhsPrlsrNamaAsing";
$proto271["m_columns"][] = "mhsWsdId";
$proto271["m_columns"][] = "mhsTanggalPengubahan";
$proto271["m_columns"][] = "mhsUnitPengubah";
$proto271["m_columns"][] = "mhsUserPengubah";
$proto271["m_columns"][] = "mhsProdiGelarKelulusan";
$proto271["m_columns"][] = "mhsSemIdMulai";
$proto271["m_columns"][] = "mhsBiayaStudi";
$proto271["m_columns"][] = "mhsPekerjaan";
$proto271["m_columns"][] = "mhsPTKerja";
$proto271["m_columns"][] = "mhsPSKerja";
$proto271["m_columns"][] = "mhsNIDNPromotor";
$proto271["m_columns"][] = "mhsKoPromotor1";
$proto271["m_columns"][] = "mhsKoPromotor2";
$proto271["m_columns"][] = "mhsKoPromotor3";
$proto271["m_columns"][] = "mhsKoPromotor4";
$proto271["m_columns"][] = "mhsProdiAsal";
$proto271["m_columns"][] = "mhsDiktiShift";
$proto271["m_columns"][] = "mhsPembayaranIpp";
$proto271["m_columns"][] = "mshNoIpp";
$proto271["m_columns"][] = "mhsPersyaratan";
$proto271["m_columns"][] = "mhsPengOrg";
$proto271["m_columns"][] = "mhsOrg";
$proto271["m_columns"][] = "mhsDomisili";
$proto271["m_columns"][] = "mhsJenisSttb";
$proto271["m_columns"][] = "mhsIsKerja";
$proto271["m_columns"][] = "mhsStatusSmta";
$proto271["m_columns"][] = "mhsAkreditasi";
$proto271["m_columns"][] = "mhsKerja";
$proto271["m_columns"][] = "mhsSaudaraLk";
$proto271["m_columns"][] = "mhsSaudaraPr";
$proto271["m_columns"][] = "mhsHobi";
$proto271["m_columns"][] = "mhsSmtaLain";
$proto271["m_columns"][] = "mhsAkreditasiSmta";
$proto271["m_columns"][] = "mhsBiayaKuliah";
$proto271["m_columns"][] = "MhsIdJenisSmta";
$proto271["m_columns"][] = "mhsSmtaPropinsiKode";
$proto271["m_columns"][] = "mhsEmailOld";
$proto271["m_columns"][] = "mhsNoKtp";
$proto271["m_columns"][] = "mhsNoKk";
$obj = new SQLTable($proto271);

$proto270["m_table"] = $obj;
$proto270["m_sql"] = "mahasiswa";
$proto270["m_alias"] = "";
$proto270["m_srcTableName"] = "mahasiswa";
$proto272=array();
$proto272["m_sql"] = "";
$proto272["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto272["m_column"]=$obj;
$proto272["m_contained"] = array();
$proto272["m_strCase"] = "";
$proto272["m_havingmode"] = false;
$proto272["m_inBrackets"] = false;
$proto272["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto272);

$proto270["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto270);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="mahasiswa";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_mahasiswa = createSqlQuery_mahasiswa();


	
		;

																																																																																																																																				

$tdatamahasiswa[".sqlquery"] = $queryData_mahasiswa;

$tableEvents["mahasiswa"] = new eventsBase;
$tdatamahasiswa[".hasEvents"] = false;

?>