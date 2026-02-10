<?php
   $sql['get_all_hak_akses'] =
      "SELECT 
         `thakrId` as id, 
         `thakrNama` as name
      FROM `t_hak_akses_ref`
      WHERE `thakrId` <> 0 
      ORDER BY `thakrNama`";
   
   $sql['get_hak_akses_by_id'] =
      "SELECT 
         `thakrId` as id, 
         `thakrNama` as name
      FROM `t_hak_akses_ref`
      WHERE `thakrId`='%s'";
      
   $sql['get_hak_akses_by_array_id'] =
      "SELECT 
         `thakrId` as id, 
         `thakrNama` as name
      FROM `t_hak_akses_ref`
      WHERE `thakrId`IN(%s)";
      
   $sql['get_all_unit'] =
      "SELECT 
         `untId` as id, 
         `untNama` as name
      FROM `t_unit`
      ORDER BY `untNama`";
      
   $sql['get_unit_by_id'] =
      "SELECT 
         `untId` as id, 
         `untNama` as name
      FROM `t_unit`
      WHERE `untId`='%s'";
      
   $sql['get_prodi_by_id'] =
      "SELECT 
         `prodiKode` as id, 
         `prodiNamaResmi` as name, 
         `prodiKodeUniv` as code
      FROM `program_studi`
      WHERE prodiKode='%s'";
   
      
   $sql['get_prodi_with_limit'] =
      "SELECT `prodiKode` as Id, `prodiNamaResmi` as Name, `prodiKodeUniv` as Code
      FROM `program_studi`
      LIMIT %d, %d";
      
   $sql['get_count_prodi'] =
      "SELECT COUNT(`prodiKode`) AS totalProdi
      FROM `program_studi`";
      
   $sql['get_prodi_by_nama_with_limit'] =
      "SELECT `prodiKode` as Id, `prodiNamaResmi` as Name, `prodiKodeUniv` as Code
      FROM `program_studi` 
      WHERE `prodiNamaResmi` LIKE '%%%s%%'
      LIMIT %d, %d";
      
   $sql['get_count_prodi_by_nama'] =
      "SELECT COUNT(`prodiKode`) AS totalProdi
      FROM `program_studi`
      WHERE `prodiNamaResmi` LIKE '%%%s%%'";
        
   $sql['get_count_niu'] =
      " SELECT COUNT(`mhsNiu`) AS totalNiu
        FROM `mahasiswa`
        WHERE `mhsNiu` LIKE '%%s%' ";
   
   $sql['get_all_mahasiswa_by_niu'] =
      " SELECT mhsNiu AS NIU,
               mhsNama AS Nama,
               fakNamaResmi AS Fakultas
        FROM `mahasiswa`JOIN `program_studi` ON mhsProdiKode = prodiKode
        JOIN `fakultas` ON prodiFakKode = fakKode 
        WHERE mhsNiu LIKE '%%s%'";
        
   $sql['get_fakultas_by_prodi'] = "
      SELECT fakKode AS id,
         fakNamaResmi AS Nama
      FROM fakultas JOIN program_studi ON fakKode=prodiFakKode
      WHERE prodiKode='%s'
   ";
        
   $sql['get_all_fakultas'] =
   " SELECT fakKode AS id,
            fakNamaResmi AS Nama
     FROM fakultas ";
   
   $sql['get_fakultas_by_user'] =
   " SELECT fakKode AS id,
            fakNamaResmi AS Nama
     FROM fakultas
     INNER JOIN program_studi ON prodiFakKode = fakKode
     INNER JOIN t_user ON tusrProdiKode = prodiKode
     WHERE tusrNama = '%s'";
     
   $sql['get_all_unit_data'] = "
      SELECT 
         `untId` AS `unit_id`,
         `untServiceAddress` AS `service_address`,
         `untNama` AS `nama`
      FROM t_unit";
      
   $sql['get_all_unit_data_with_code'] = "
      SELECT 
         `untId` AS `unit_id`,
         `untServiceAddress` AS `service_address`,
         `untNama` AS `nama`
      FROM t_unit
      WHERE untId like '%s%%'";
      
   $sql['get_list_feedback_priority'] = "
      SELECT
         fbprId AS id,
         fbprNama AS prioritas
      FROM 
         t_feedback_priority";
         
   $sql['get_service_address_by_user_id'] = "
      SELECT  
         untServiceAddress servAddr
      FROM t_unit
      WHERE untId = 
         (
         SELECT 
            tusrUntId 
         FROM t_user
         WHERE tusrNama = '%s'
         )";
    
?>
