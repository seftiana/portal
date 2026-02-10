<?php

   $sql['authenticate'] = 
   "SELECT tusrNama AS user, 
           tusrPassword AS password,
           tusrThakrId AS role, 
           tusrRefIndex AS referensi_id,
           untServiceAddress AS alamat_server,
           tusrAvatar AS foto,
           tusrIsAgree AS is_agree,
           tusrUntId AS unit_id,
           tusrProfil AS nama_lengkap,
           prodiKode AS kode_prodi, 
   		  prodiNamaResmi AS nama_prodi
    FROM t_user 
    INNER JOIN t_unit ON untId = tusruntId
    LEFT JOIN program_studi ON tusrProdiKode = prodiKode
    WHERE tusrNama = '%s'";

   $sql['update_last_access_where_user'] =
      "UPDATE `t_user`
       SET `tusrLastAccess` = '%s'
       WHERE `tusrNama` = '%s'";
     
   $sql['update_online_status_where_user'] =
      "UPDATE `t_user`
       SET `tusrIsOnline` = '%s'
       WHERE `tusrNama` = '%s'";
     
   $sql['select_user_where_user_name'] = 
      "SELECT COUNT(tusrNama) AS JUMLAH
       FROM `t_user` 
       INNER JOIN `t_unit` ON `untId` = `tusruntId`
       WHERE `tusrNama` = '%s'";
       
   $sql['do_register_user_session_id'] = "
      INSERT INTO `t_user_login` 
      (`tusrlgnSesId`, `tusrlgnTusrNama`)
      VALUES ('%s', '%s')
      ";
      
   $sql['do_unregister_user_session_id'] = "
      DELETE FROM `t_user_login` 
      WHERE `tusrlgnSesId`='%s'
      ";
      
   $sql['is_user_session_registered'] = "
      SELECT tusrlgnTusrNama FROM t_user_login
      WHERE tusrlgnSesId='%s'";
	  

$sql['select_service_sireg']="
SELECT 
 untServiceAddress AS URL
FROM
   t_unit
WHERE untId = '1031001'
LIMIT 0,1
"; 
$sql['select_service_finansi']="
SELECT 
 untServiceAddress AS URL
FROM
   t_unit
WHERE untId = '1041001'
LIMIT 0,1
"; 
?>