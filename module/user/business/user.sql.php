<?php

   $sql['load_user_by_id'] =
      "SELECT 
         `tusrNama` AS nama, 
         `tusrPassword` AS passwd, 
         `tusrThakrId` AS hak_id, 
         `thakrNama` AS hak_nama, 
         `thakrKode` AS hak_kode, 
         `tusrProfil` AS profil, 
         `tusrUntId` AS unit_id, 
         `tusrProdiKode` AS prodi_kode, 
         `prodiNamaResmi` AS prodi_nama, 
         `prodiFakKode` AS fak_kode,
         `tusrRefIndex` AS referensi 
      FROM t_user LEFT JOIN program_studi ON tusrProdiKode = prodiKode
         INNER JOIN t_hak_akses_ref ON tusrThakrId=thakrId
      WHERE `tusrNama`='%s'";
   
   $sql['do_add_user_item'] =
      "INSERT INTO `t_user` 
      (`tusrNama`, `tusrPassword`, `tusrThakrId`, `tusrProfil`, `tusrUntId`, `tusrProdiKode`, `tusrRefIndex`) 
      VALUES ('%s', md5('%s'), '%s', '%s', '%s', '%s', '%s')";
      
   $sql['do_add_user_item_no_prodi'] =
      "INSERT INTO `t_user` 
      (`tusrNama`, `tusrPassword`, `tusrThakrId`, `tusrProfil`, `tusrUntId`, `tusrRefIndex`) 
      VALUES ('%s', md5('%s'), '%s', '%s', '%s', '%s')";
      
   $sql['do_update_user_item'] =
      "UPDATE `t_user`
      SET 
         `tusrNama` = '%s', 
         `tusrThakrId` = '%s', 
         `tusrProfil` = '%s', 
         `tusrUntId` = '%s',
         `tusrProdiKode` = '%s', 
         `tusrRefIndex` = '%s'
      WHERE `tusrNama` = '%s'";
      
   $sql['do_delete_user_item'] = 
      " DELETE FROM `t_user` WHERE `tusrNama` = '%s' ";
      
   $sql['delete_user_where_usrId'] = "
      DELETE FROM `t_user` WHERE `tusrNama` IN ('%s') ";
   
   
   $sql["do_update_user_password"]= 
      " UPDATE `t_user`
      SET tusrPassword=md5('%s')
      WHERE tusrNama='%s'";
   
   $sql['do_update_user_agreement'] = 
      " UPDATE `t_user` 
      SET 
         `tusrIsAgree` = '%s',
         `tusrAgreementDate` = NOW() 
      WHERE `tusrNama` = '%s'";
      
   $sql['get_search_user_item'] =
      "SELECT `tusrNama` as Name, `tusrProfil` as Profil, `prodiNamaResmi` as ProdiName 
      FROM `t_user`
      LEFT JOIN program_studi ON `tusrProdiKode` = `prodiKode`
      WHERE `tusrNama` LIKE '%%%s%%'
      LIMIT %d, %d";
   
   $sql['count_search_user_item'] =
      "SELECT COUNT(`tusrNama`) As total  
      FROM `t_user`
      LEFT JOIN program_studi ON `tusrProdiKode` = `prodiKode`
      WHERE `tusrNama` LIKE '%%%s%%'";

   $sql['get_search_user_by'] = 
   " SELECT tusrNama AS NIU,
            tusrProfil AS Nama,
            fakNamaResmi AS Fakultas,
            prodiNamaResmi AS Prodi
     FROM `t_user` LEFT JOIN program_studi ON tusrProdiKode = prodiKode
                   LEFT JOIN `fakultas` ON prodiFakKode = fakKode
     %s
     LIMIT %d, %d ";
     
     // tak tambah dulu ini karena terjadi error pada tambahan sintaks yang 
     // ada error saat ada huruf '
   $sql['get_search_user_by_new'] = 
   " SELECT tusrNama AS NIU,
            tusrProfil AS Nama,
            fakNamaResmi AS Fakultas,
            prodiNamaResmi AS Prodi
     FROM `t_user` LEFT JOIN program_studi ON tusrProdiKode = prodiKode
                   LEFT JOIN `fakultas` ON prodiFakKode = fakKode
     WHERE
         `tusrNama` LIKE '%%%s%%'
         AND `tusrProfil` LIKE '%%%s%%'
         AND `prodiKode` IN (%s)
     LIMIT %d, %d ";
                
    
   $sql['get_count_user_by_niu'] =
   " SELECT COUNT('tusrNama') AS totalUser
     FROM `t_user` LEFT JOIN program_studi ON tusrProdiKode = prodiKode
                   LEFT JOIN `fakultas` ON prodiFakKode = fakKode
     %s "; 
     
     // tak ganti untuk query diatas ini
   $sql['get_count_user_by_niu_new'] =
   " SELECT COUNT('tusrNama') AS totalUser
     FROM `t_user` LEFT JOIN program_studi ON tusrProdiKode = prodiKode
                   LEFT JOIN `fakultas` ON prodiFakKode = fakKode
     WHERE
         `tusrNama` LIKE '%%%s%%'
         AND `tusrProfil` LIKE '%%%s%%'
         AND `prodiKode` IN (%s)
     "; 
         
   
   $sql['get_user_by_array_niu'] = "
      SELECT 
         `tusrNama` AS nama_user
      FROM t_user 
      WHERE `tusrNama` IN ('%s')";
 
 $sql['select_prodi']="
SELECT
   prodiKode AS KODE,
   prodiNamaResmi AS PRODI
FROM
   program_studi
ORDER BY prodiNamaResmi
";

$sql['select_group_prodi']="
SELECT 
 GROUP_CONCAT(prodiKode) AS KODE
FROM
   program_studi
"; 
	
?>