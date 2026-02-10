<?php

   $sql['select_service_finansi'] =
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
   
?>