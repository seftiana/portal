<?php

$sql['get_active_student_assignment'] = "
SELECT 
	t5.tgsId as id,
	t5.tgsJudul as judul,
	t5.tgsDeskripsi as deskripsi,
	t4.mtkl_nm as mk_nama,
	t5.tgsDosenId as dosen_id,
	t6.ds_nm as dosen_nama,
	t5.tgsWaktuAwal as awal,
	t5.tgsWaktuAkhir as akhir,
	t5.tgsNamaFile as nama_file,
	t5.tgsMkId as mk_id
FROM 
	T_KST t1
	INNER JOIN T_JADWAL t2 ON t1.IDJadwal = t2.IDJadwal
	INNER JOIN T_MAHASISWA t3 ON t1.IDMahasiswa = t3.IDMahasiswa
	INNER JOIN T_MATAKULIAH t4 ON t1.IDMatakuliah = t4.IDMatakuliah
	INNER JOIN E_TUGAS t5 ON t1.IDMatakuliah = t5.tgsMkId
	INNER JOIN T_DOSEN t6 ON t5.tgsDosenId = t6.IDDosen
WHERE 
	t2.TahunAjaran = '%s' AND
	t2.SemGG = '%s' AND
	t2.SemJenis = '%s' AND
	t3.mhs_NIM = '%s'
	%s
	";
	
$sql['insert_into_student_assignment'] = "
INSERT INTO
	E_TUGAS_HASIL
	(tgshId, tgshTgsId, tgshMhsNim, tgshWaktuKirim, tgshNamaFile, tgshDeskripsi)
	VALUES
	(%d, %d, '%s', '%s', '%s', '%s')
";	


$sql['get_semester_where_dosen'] = "
	SELECT DISTINCT 
		t1.TahunAjaran AS THN, 

		t4.IDSemester AS IDSMT,
		t1.SemJenis AS JENIS,
		t4.Semester AS SEMESTER, 
		t5.Perkuliahan AS KULIAH
	FROM T_JADWAL t1 
	INNER JOIN T_JADWALDOSEN t2 ON t1.IDJadwal = t2.IDJadwal 
	INNER JOIN T_DOSEN t6 ON t2.IDDosen = t6.IDDosen 
	INNER JOIN T_KST t3 ON t1.IDJadwal = t3.IDJadwal 
	INNER JOIN T_SEMESTER t4 ON t1.SemGG = t4.IDSemester 
	INNER JOIN T_PERKULIAHAN t5 ON t1.SemJenis = t5.IDPerkuliahan 
	WHERE t6.ds_kd = '%s'
";

$sql['get_matakuliah_where_semester_dosen'] = "
	SELECT DISTINCT 
		t5.IDMatakuliah AS ID, 
		t5.mtkl_kd as KODE, 
		t5.mtkl_nm AS NAMA, 
		t5.mtkl_sks 
	FROM T_JADWALDOSEN t1 
	INNER JOIN T_DOSEN t2 ON t1.IDDosen = t2.IDDosen 
	INNER JOIN T_JADWAL t3 ON t1.IDJadwal = t3.IDJadwal 
	INNER JOIN T_KST t4 ON t3.IDJadwal = t4.IDJadwal 
	INNER JOIN T_MATAKULIAH t5 ON t4.IDMatakuliah = t5.IDMatakuliah
	WHERE 
		t2.ds_kd = '%s' 
		AND t3.SemGG = '%s' 
		AND t3.SemJenis = '%s'
		AND t3.TahunAjaran = '%s' 
";

$sql['get_semester_aktif'] = "
  SELECT 
    semester as ID,
    perkuliahan as PERKULIAHAN,
    tahunAjaran AS TAHUN
  FROM T_SETUP_KEAKTIFAN
";


$sql['get_tugas_where_mata_kuliah'] = "
SELECT 
	t5.tgsId as ID,
	t5.tgsJudul as JUDUL,
	t5.tgsNamaFile as NAMA_FILE,
	t5.tgsWaktuAwal as MULAI,
	t5.tgsWaktuAkhir as SELESAI,	
	t4.mtkl_nm as mk_nama,
	t5.tgsDosenId as dosen_id,
	t6.ds_nm as dosen_nama
FROM 
	T_KST t1
	INNER JOIN T_JADWAL t2 ON t1.IDJadwal = t2.IDJadwal
	INNER JOIN T_MATAKULIAH t4 ON t1.IDMatakuliah = t4.IDMatakuliah
	INNER JOIN E_TUGAS t5 ON t1.IDMatakuliah = t5.tgsMkId	
	INNER JOIN T_DOSEN t6 ON t5.tgsDosenId = t6.ds_kd 
WHERE 	
	t2.SemGG = '%s' AND
	t2.SemJenis = '%s' AND
	t2.TahunAjaran = '%s' AND
	t5.tgsMkId = '%s'
	";

$sql['count_tugas_where_mata_kuliah'] = "
SELECT COUNT(t5.tgsId) AS JML
FROM 
	T_KST t1
	INNER JOIN T_JADWAL t2 ON t1.IDJadwal = t2.IDJadwal
	INNER JOIN T_MATAKULIAH t4 ON t1.IDMatakuliah = t4.IDMatakuliah
	INNER JOIN E_TUGAS t5 ON t1.IDMatakuliah = t5.tgsMkId	
	INNER JOIN T_DOSEN t6 ON t5.tgsDosenId = t6.ds_kd 
WHERE 	
	t2.SemGG = '%s' AND
	t2.SemJenis = '%s' AND
	t2.TahunAjaran = '%s' AND
	t5.tgsMkId = '%s'
";

$sql['get_peserta_mata_kuliah'] = "
	SELECT
	    t3.IDMahasiswa AS ID,
	    t3.mhs_NIM AS NIM,
	    t3.mhs_nm AS NAMA,
	    t5.namaProgdi AS PRODI
	FROM
	T_KST t1
	INNER JOIN T_JADWAL t2 ON t1.IDJadwal = t2.IDJadwal
	INNER JOIN T_MAHASISWA t3 ON t1.IDMahasiswa = t3.IDMahasiswa
	INNER JOIN T_MATAKULIAH t4 ON t1.IDMatakuliah = t4.IDMatakuliah
	INNER JOIN T_PROGDI t5 ON t3.IDProgdi = t5.IDProgdi
	WHERE		
		t4.IDMatakuliah = '%s' AND		
		t2.SemGG = '%s' AND
		t2.SemJenis = '%s' AND
		t2.TahunAjaran = '%s'
";

$sql['get_peserta_terdaftar'] = "
	SELECT 
		tgshMhsNim as NIM,
		mhs_nm as NAMA,
		p.NamaProgdi as PRODI
	FROM E_TUGAS_HASIL
	LEFT JOIN T_MAHASISWA m ON mhs_NIM = tgshMhsNim
	LEFT JOIN T_PROGDI p ON m.IDProgdi = p.IDProgdi
	WHERE tgshTgsId = '%s'
";

$sql['get_tugas_where_id'] = "
	SELECT
		tgsId AS ID,
		tgsJudul AS JUDUL,
		tgsDeskripsi AS DESKRIPSI,
		tgsNamaFile AS NAMA_FILE,
		tgsDosenId AS DOSEN,
		tgsWaktuAwal AS MULAI,
		day(tgsWaktuAwal) AS TGL_MULAI,
		month(tgsWaktuAwal)AS BLN_MULAI,
		year(tgsWaktuAwal) AS THN_MULAI,	
		day(tgsWaktuAkhir) AS TGL_SELESAI,
		month(tgsWaktuAkhir)AS BLN_SELESAI,
		year(tgsWaktuAkhir) AS THN_SELESAI,	
		SemGG AS SEMGG,
		Semester AS SEMESTER,
		SemJenis AS JENIS,
		Perkuliahan AS PERKULIAHAN,
		TahunAjaran AS TAHUN
	from E_TUGAS
	LEFT JOIN T_JADWAL ON tgsJadwalId = IDJadwal
	LEFT JOIN T_SEMESTER ON IDSemester = SemGG
	LEFT JOIN T_PERKULIAHAN ON IDPerkuliahan = SemJenis
	WHERE tgsId='%s'
";



/**********PROCESS QUERY*********************/

$sql['insert_assignment'] = "
	INSERT INTO E_TUGAS (
		tgsId,
		tgsMkId,
		tgsJadwalId,
		tgsJudul,
		tgsDeskripsi,
		tgsWaktuAwal,
		tgsWaktuAkhir,
		tgsModified,
		tgsDosenId,
		tgsNamaFile
	)values (
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		CURRENT_TIMESTAMP(),
		'%s',
		'%s',
	)


";


$sql['get_next_id'] = "
	SELECT max(tgshId)+1
	FROM E_TUGAS_HASIL
";

$sql['is_student_have_send_assignment'] = "
SELECT 
	t2.tgshDeskripsi as deskripsi, t2.tgshNamaFile as nama_file, t2.tgshId as id, t2.tgshWaktuKirim as tgl_kirim, t2.tgshModified as tgl_update
FROM 
	T_MAHASISWA t1
	INNER JOIN T_KST t4 ON t1.IDMahasiswa = t4.IDMahasiswa
	INNER JOIN T_JADWAL t5 ON t4.IDJadwal = t5.IDJadwal
	INNER JOIN T_MATAKULIAH t6 ON t4.IDMatakuliah = t6.IDMatakuliah
	LEFT JOIN E_TUGAS_HASIL t2 ON t1.mhs_NIM = tgshMhsNim
	LEFT JOIN E_TUGAS t3 ON tgshTgsId = t3.tgsId
WHERE 
	t5.TahunAjaran = '%s' AND
	t5.SemGG = '%s' AND
	t5.SemJenis = '%s' AND
	t4.IDMatakuliah = '%s' AND
	t2.tgshMhsNim = '%s' AND
	t2.tgshTgsId = '%s'
";

$sql['update_student_assignment'] = "
UPDATE
	E_TUGAS_HASIL
SET	
	tgshModified = '%s', tgshNamaFile = '%s', tgshDeskripsi = '%s'
WHERE
	tgshId = %d AND tgshMhsNim = '%s'
";	

$sql['get_max_id'] = "
	SELECT MAX(tgsId) AS ID
	FROM E_TUGAS
";

$sql['insert_into_assignment'] = "
	INSERT INTO E_TUGAS	(
		tgsId,
		tgsMkId,
		tgsJadwalId,
		tgsJudul,
		tgsDeskripsi,
		tgsWaktuAwal,
		tgsWaktuAkhir,
		tgsModified,
		tgsDosenId,
		tgsNamaFile
	)VALUES ('%s','%s','%s','%s','%s','%s','%s',getdate(),'%s','%s')
";

$sql['get_max_hasil_id'] = "
	SELECT max(tgshId) AS ID
	FROM E_TUGAS_HASIL
";

$sql['get_jadwal_id'] = "
	SELECT 
		IDJadwal as ID
	FROM T_JADWAL
	WHERE 
		SemGG = '%s' AND
		SemJenis = '%s' AND
		TahunAjaran = '%s' 
";

$sql['insert_into_student_assignment'] = "
	INSERT INTO E_TUGAS_HASIL (
		tgshId,
		tgshTgsId,
		tgshMhsNim
	)VALUES ('%s','%s','%s')
";

$sql['insert_into_student_assignment_with_file'] = "
	INSERT INTO E_TUGAS_HASIL (
		tgshId,
		tgshTgsId,
		tgshMhsNim,
		tgshNamaFile
	)VALUES ('%s','%s','%s','%s')
";

$sql['update_assignment_all'] = "
	UPDATE E_TUGAS
	SET
		tgsMkId = '%s',		
		tgsJudul = '%s',
		tgsDeskripsi = '%s',
		tgsWaktuAwal = '%s',
		tgsWaktuAkhir = '%s',
		tgsModified = GETDATE(),
		tgsDosenId = '%s',
		tgsNamaFile = '%s'
	WHERE tgsId = '%s'
";

$sql['update_assignment'] = "
	UPDATE E_TUGAS
	SET
		tgsMkId = '%s',		
		tgsJudul = '%s',
		tgsDeskripsi = '%s',
		tgsWaktuAwal = '%s',
		tgsWaktuAkhir = '%s',
		tgsModified = GETDATE(),
		tgsDosenId = '%s'
	WHERE tgsId = '%s'
";

$sql['delete_assignment'] = "
	DELETE FROM E_TUGAS
	WHERE tgsId = '%s'
";

$sql['delete_student_assignment'] = "
	DELETE FROM E_TUGAS_HASIL
	WHERE tgshTgsId = '%s'
";


?>