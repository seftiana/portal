<?php

   $sql['select_announcement_where_type_limit_offset'] = "
      SELECT `pmId` AS `id`,
             `pmProdiKode` AS `kode_prodi`, 
             `pmTanggal` AS `date`, 
             `pmTppmrId` AS `type`, 
             `pmJudul` AS `title`, 
             `pmIsi` AS `content`, 
             `pmImagePath` AS `image_path` 
      FROM `t_pengumuman`
      WHERE `pmTppmrId` = '%s' 
      ORDER BY `pmTanggal` DESC
      LIMIT %d, %d";
      
   $sql['select_announcement_where_type'] = "
      SELECT `pmId` AS `id`,
             `pmProdiKode` AS `kode_prodi`, 
             `pmTanggal` AS `date`, 
             `pmTppmrId` AS `type`, 
             `pmJudul` AS `title`, 
             `pmIsi` AS `content`, 
             `pmImagePath` AS `image_path` 
      FROM `t_pengumuman`, `t_tujuan_pengumuman_link`
      WHERE `pmTppmrId` = '%s' AND pmId=tjpmlPmId
      ORDER BY `pmTanggal` DESC";

   $sql['get_count_announcement_where_type'] = "
      SELECT COUNT(`pmId`) AS `count`
      FROM `t_pengumuman`
      WHERE `pmTppmrId` = '%s'";

   $sql['get_data_announcementbased_on_type_for_user_and_faculty'] =
   " SELECT `pmId` AS `id`,
            `pmProdiKode` AS `kode_prodi`, 
            `pmTanggal` AS `date`, 
            `pmTppmrId` AS `type`, 
            `pmJudul` AS `title`, 
            `pmIsi` AS `content`, 
            `fpmlFakId` AS `fak_id`,
            `pmImagePath` AS `image_path`,
            `pmImageAlt` AS `image_alt`  
     FROM `t_pengumuman` 
     JOIN `t_tujuan_pengumuman_link` ON pmId = tjpmlPmId
     JOIN `t_fakultas_pengumuman_link` ON pmId = fpmlPmId
     WHERE `pmTppmrId` = '%s' AND 
           `tjpmThakrId` = '%s' AND 
            fpmlFakId = '%s' AND 
            pmId = tjpmlPmId AND 
            pmId = fpmlPmId
     ORDER BY `pmTanggal` DESC 
     LIMIT %d, %d";
   
   $sql['get_count_data_announcementbased_on_type_for_user_and_faculty'] =
   " SELECT COUNT(pmId)
     FROM `t_pengumuman` 
     JOIN `t_tujuan_pengumuman_link` ON pmId = tjpmlPmId
     JOIN `t_fakultas_pengumuman_link` ON pmId = fpmlPmId
     WHERE `pmTppmrId` = '%s' AND 
           `tjpmThakrId` = '%s' AND 
            fpmlFakId = '%s' AND 
            pmId = tjpmlPmId AND 
            pmId = fpmlPmId
     ORDER BY `pmTanggal` DESC";
   
   $sql['get_all_data_information'] =
   " SELECT DISTINCT `pmId` AS `id`,
                      `pmProdiKode` AS `kode_prodi`, 
                      `pmTanggal` AS `date`, 
                      `pmTppmrId` AS `type`, 
                      `pmJudul` AS `title`, 
                      `pmIsi` AS `content`, 
                      `pmImagePath` AS `image_path`,
                      `tppmrNama` AS `type_nama`                      
      FROM `t_pengumuman`
      LEFT JOIN `t_tipe_pengumuman_ref` ON tppmrId = pmTppmrId
      ORDER BY `pmTanggal` DESC
	  LIMIT %d, %d";
   
   $sql['get_announcement_data_detail'] =
   " SELECT DISTINCT `pmId` AS `id`,
                      `pmProdiKode` AS `kode_prodi`, 
                      `pmTanggal` AS `date`, 
                      `pmTppmrId` AS `type`, 
                      `pmJudul` AS `title`, 
                      `pmIsi` AS `content`, 
                      `pmImagePath` AS `image_path`,
                      `pmImageAlt` AS `image_alt`,
                      `tppmrNama` AS `type_nama`                      
      FROM `t_pengumuman`
      LEFT JOIN `t_tipe_pengumuman_ref` ON tppmrId = pmTppmrId
      WHERE pmId = '%s'";
   
   $sql['get_count_all_data_information'] =
   " SELECT DISTINCT COUNT(pmId) AS `count`
      FROM `t_pengumuman`";
      
   $sql['get_all_information_where_faculty'] = 
   " SELECT `pmId` AS `id`,                
            `pmTanggal` AS `date`, 
            `pmTppmrId` AS `type`, 
            `pmJudul` AS `title`, 
            `pmIsi` AS `content`, 
            `pmImagePath` AS `image_path`,
            `tppmrNama` AS `type_nama`            
     FROM `t_pengumuman`
     LEFT JOIN t_fakultas_pengumuman_link ON fpmlPmId = pmId
     LEFT JOIN `t_tipe_pengumuman_ref` ON tppmrId = pmTppmrId
     WHERE fpmlFakId = '%s'
     ORDER BY `pmTanggal` DESC
	 LIMIT %d, %d";
   
   $sql['get_count_all_information_where_faculty'] = 
   " SELECT COUNT(pmId) AS `count`
     FROM `t_pengumuman`
     LEFT JOIN t_fakultas_pengumuman_link ON fpmlPmId = pmId
     WHERE fpmlFakId = '%s'";
   
   $sql['get_all_type_information'] =
   " SELECT tppmrId AS id,
            tppmrNama AS nama
     FROM `t_tipe_pengumuman_ref` ";
   
   $sql['get_maximum_announcement_id'] = 
   " SELECT MAX(pmId) AS maxid
     FROM t_pengumuman";
   
   $sql['get_all_announcement_for_faculty'] =
   " SELECT fpmlPmId AS announceid,
            fpmlFakId AS fakid
     FROM t_fakultas_pengumuman_link
     WHERE fpmlPmId = '%s'";
   
   $sql['get_all_announcement_for_accessright'] =
   " SELECT tjpmlPmId AS announceid,
            tjpmThakrId AS hakid
     FROM t_tujuan_pengumuman_link
     WHERE tjpmlPmId = '%s'";
   
   $sql['do_add_announcement_data_item'] = 
   " INSERT INTO t_pengumuman ( pmTppmrId, pmTanggal, pmJudul, pmIsi, pmImagePath, pmImageAlt)
     VALUES ('%s', curdate(), '%s', '%s', '%s', '%s')";     
   
   $sql['do_add_announcement_faculty_item'] =
   " INSERT INTO t_fakultas_pengumuman_link (fpmlPmId, fpmlFakId)
     VALUES ('%s', '%s')";
   
   $sql['do_add_announcement_destination_item'] =
   " INSERT INTO t_tujuan_pengumuman_link (tjpmlPmId, tjpmThakrId)
     VALUES ('%s', '%s')";   
   
   $sql['do_update_announcement_data_item'] = 
   " UPDATE t_pengumuman 
     SET pmTppmrId = '%s',
         pmTanggal = '%s', 
         pmJudul = '%s', 
         pmIsi = '%s', 
         pmImagePath = '%s', 
         pmImageAlt = '%s'
     WHERE pmId = '%s'";
     
   $sql['do_delete_announcement_data_item'] =
   " DELETE 
     FROM t_pengumuman
     WHERE pmId = '%s'";
   
   $sql['do_delete_announcement_faculty_item'] =
   " DELETE
     FROM t_fakultas_pengumuman_link
     WHERE fpmlPmId = '%s'";
   
   $sql['do_delete_announcement_destination_item'] =
   " DELETE 
     FROM t_tujuan_pengumuman_link
     WHERE tjpmlPmId = '%s'";
     
   $sql['select_nama_tipe']="
   SELECT
         tppmrNama AS nama
   FROM `t_tipe_pengumuman_ref`
   WHERE
         tppmrId ='%s'
   ";
?>