<?php
$sql['insert_fakultas'] = "
INSERT INTO
   fakultas
SET
   fakKode = '%s',
   fakKodeUniv ='%s',
   fakNamaResmi ='%s',
   fakNamaSingkat ='%s',
   fakNamaAsing ='%s',
   fakAlamat ='%s',
   fakTelp ='%s',
   fakFax ='%s',
   fakEmail ='%s',
   fakKontakPerson ='%s'
";

$sql['update_fakultas'] = "
UPDATE
   fakultas
SET
   fakKodeUniv ='%s',
   fakNamaResmi ='%s',
   fakNamaSingkat ='%s',
   fakNamaAsing ='%s',
   fakAlamat ='%s',
   fakTelp ='%s',
   fakFax ='%s',
   fakEmail ='%s',
   fakKontakPerson ='%s'
WHERE
   fakKode = '%s'   
";

$sql['delete_fakultas'] = "
DELETE
FROM
   fakultas
WHERE
   fakKode = '%s'
";

$sql['insert_jurusan'] = "
INSERT INTO `jurusan`
SET
   jurKode = '%s',
   jurKodeuniv = '%s',                                                           
   jurFakKode = '%s',                                                                
   jurNamaResmi = '%s',                                                     
   jurNamaSingkat ='%s',                                                             
   jurNamaAsing = '%s',                                                          
   jurAlamat = '%s',                                                                       
   jurTelp = '%s',                                                                         
   jurFax = '%s',                                                                     
   jurEmail = '%s',                                                               
   jurKontakPerson = '%s'                                                        
";

$sql['update_jurusan'] = "
UPDATE `jurusan`
SET
   jurKodeuniv = '%s',                                                           
   jurFakKode = '%s',                                                                
   jurNamaResmi = '%s',                                                     
   jurNamaSingkat ='%s',                                                             
   jurNamaAsing = '%s',                                                          
   jurAlamat = '%s',                                                                       
   jurTelp = '%s',                                                                         
   jurFax = '%s',                                                                     
   jurEmail = '%s',                                                               
   jurKontakPerson = '%s'                                                       
WHERE
   `jurkode` = '%s'
";

$sql['delete_jurusan'] = "
DELETE
   FROM `jurusan`
WHERE
   `jurKode` = '%s'
";

$sql['insert_prodi'] = "
INSERT INTO program_studi SET 
	prodiJjarKode = '%s', 
	prodiNamaResmi = '%s', 
	prodiNamaAsing = '%s', 
	prodiNamaSingkat = '%s', 
	prodiKodeUm = '%s',
	prodiKodeUniv = '%s',
	prodiLabelNim = '%s', 
	prodiFakKode = '%s', 
	prodiJurKode = '%s', 
	prodiModelrId = '%s', 
	prodiKode = '%s'
";

$sql['update_prodi'] = "
UPDATE program_studi 
SET 
	prodiJjarKode = '%s', 
	prodiNamaResmi = '%s', 
	prodiNamaAsing = '%s', 
	prodiNamaSingkat = '%s', 
	prodiKodeUm = '%s',
	prodiKodeUniv = '%s',
	prodiLabelNim = '%s', 
	prodiFakKode = '%s', 
	prodiJurKode = '%s', 
	prodiModelrId = '%s' 
WHERE prodiKode = '%s'
";

$sql['delete_prodi'] = "
DELETE FROM program_studi
WHERE prodiKode ='%s'
";	
?>