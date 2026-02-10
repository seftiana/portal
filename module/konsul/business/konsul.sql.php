<?php
   
   $sql['get_all_inbox_message_item'] =
   " SELECT a.konsulId AS Id,
            a.konsulJudul AS Judul,
            a.tusrProfil AS Pengirim,
            b.tusrProfil AS Penerima,
            a.konsulWaktuKirim AS Tanggal,
            a.konsulWaktuBaca AS Baca
     FROM (SELECT konsulId,
                  konsulJudul,
                  konsulWaktuKirim,
                  konsulWaktuBaca,
                  konsulIsi,
                  konsulIsDihapusPenerima,
                  tusrProfil
           FROM `t_konsultasi` LEFT JOIN `t_user` ON konsulTusrNamaPengirim=tusrNama) AS a,
          (SELECT konsulId,
                  konsulTusrNamaPenerima,
                  tusrProfil 
           FROM `t_konsultasi` LEFT JOIN `t_user` ON konsulTusrNamaPenerima=tusrNama) AS b 
     WHERE b.konsulTusrNamaPenerima = '%s' 
           AND a.konsulId = b.konsulId
           AND a.konsulIsDihapusPenerima IS NULL
     ORDER BY a.konsulWaktuKirim DESC 
     LIMIT %d, %d ";
   
   $sql['get_all_sent_message_item'] =
   " SELECT a.konsulId AS Id,
            a.konsulJudul AS Judul,
            a.tusrProfil AS Pengirim,
            b.tusrProfil AS Penerima,
            a.konsulWaktuKirim AS Tanggal,
            a.konsulWaktuBaca AS Baca
     FROM (SELECT konsulId,
                  konsulJudul,
                  konsulTusrNamaPengirim,
                  konsulWaktuKirim,
                  konsulWaktuBaca,
                  konsulIsi,
                  konsulIsDihapusPengirim,
                  tusrProfil
           FROM `t_konsultasi` LEFT JOIN `t_user` ON konsulTusrNamaPengirim=tusrNama) AS a,
          (SELECT konsulId,
                  tusrProfil 
           FROM `t_konsultasi` LEFT JOIN `t_user` ON konsulTusrNamaPenerima=tusrNama) AS b 
     WHERE a.konsulTusrNamaPengirim = '%s' 
           AND a.konsulId = b.konsulId
           AND a.konsulIsDihapusPengirim IS NULL
     ORDER BY a.konsulWaktuKirim DESC
     LIMIT %d, %d ";
   
   $sql['get_all_trash_message_item'] =
   " SELECT a.konsulId AS Id,
            a.konsulJudul AS Judul,
            a.tusrProfil  AS Pengirim,
            b.tusrProfil AS Penerima,
            a.konsulWaktuDihapus AS Tanggal,
            (IF (a.konsulTusrNamaPengirim = b.konsulTusrNamaPenerima , 
               IF (a.konsulIsDihapusPengirim = '1' AND b.konsulIsDihapusPenerima = '1',
                     'all',
                     IF(a.konsulIsDihapusPengirim = '1', 
                        'sent', 
                        'inbox')), 
               IF (a.konsulTusrNamaPengirim = '%s',
                     'sent',
                     'inbox'))) AS Jenis
     FROM (SELECT konsulId,
                  konsulJudul, 
                  konsulTusrNamaPengirim,
                  konsulWaktuDihapus,
                  konsulIsDihapusPengirim,
                  tusrProfil
           FROM `t_konsultasi` LEFT JOIN `t_user` ON konsulTusrNamaPengirim=tusrNama) AS a,
          (SELECT konsulId,
                  konsulTusrNamaPenerima,
                  konsulIsDihapusPenerima,
                  tusrProfil 
           FROM `t_konsultasi` LEFT JOIN `t_user` ON konsulTusrNamaPenerima=tusrNama) AS b 
     WHERE a.konsulId = b.konsulId 
           AND ((a.konsulTusrNamaPengirim = '%s' AND a.konsulIsDihapusPengirim ='1')
                OR ( b.konsulTusrNamaPenerima = '%s' and b.konsulIsDihapusPenerima = '1'))
     ORDER BY a.konsulWaktuDihapus DESC
     LIMIT %d, %d ";
   
   $sql['get_count_inbox_message_item'] =
   " SELECT COUNT(konsulId)
     FROM `t_konsultasi`
     WHERE konsulTusrNamaPenerima = '%s'
           AND konsulIsDihapusPenerima IS NULL ";
           
   $sql['get_count_new_inbox_message_item'] =
   " SELECT COUNT(konsulId)
     FROM `t_konsultasi`
     WHERE konsulTusrNamaPenerima = '%s'
           AND konsulIsDihapusPenerima IS NULL
           AND konsulWaktuBaca IS NULL ";
   
   $sql['get_count_sent_message_item'] =
   " SELECT COUNT(konsulId)
     FROM `t_konsultasi`
     WHERE konsulTusrNamaPengirim = '%s'
           AND konsulIsDihapusPengirim IS NULL ";
   
   $sql['get_count_trash_message_item'] =
   " SELECT COUNT(konsulId)
     FROM `t_konsultasi`
     WHERE (konsulTusrNamaPengirim = '%s' AND konsulIsDihapusPengirim = '1' ) OR
           (konsulTusrNamaPenerima = '%s' AND  konsulIsDihapusPenerima = '1')";
            
   $sql['add_message_item'] =
   " INSERT INTO `t_konsultasi` ( konsulTusrNamaPengirim,
                             konsulTusrNamaPenerima,
                             konsulJudul,
                             konsulIsi,
                             konsulWaktuKirim )
     VALUES ('%s','%s','%s','%s',(SELECT current_timestamp)) ";
     
   $sql['delete_inbox_message'] =
   " UPDATE `t_konsultasi`
     SET konsulWaktuDihapus = (SELECT current_timestamp),
         konsulIsDihapusPenerima = '1'
     WHERE konsulId = '%s' ";
     
   $sql['delete_sent_message'] =
   " UPDATE `t_konsultasi`
     SET konsulWaktuDihapus = (SELECT current_timestamp),
         konsulIsDihapusPengirim = '1'
     WHERE konsulId = '%s' ";
     
   $sql['delete_trash_inbox_message'] =
   " UPDATE `t_konsultasi`
     SET konsulWaktuDihapus = (SELECT current_timestamp),
         konsulIsDihapusPenerima = '2'
     WHERE konsulId = '%s'";
     
   $sql['delete_trash_sent_message'] =
   " UPDATE `t_konsultasi`
     SET konsulWaktuDihapus = (SELECT current_timestamp),
         konsulIsDihapusPengirim = '2'
     WHERE konsulId = '%s'";
   
   $sql['delete_trash_all_message'] =
   " UPDATE `t_konsultasi`
     SET konsulWaktuDihapus = (SELECT current_timestamp),
         konsulIsDihapusPengirim = '2',
         konsulIsDihapusPenerima = '2'
     WHERE konsulId = '%s'";
           
   $sql['delete_old_message'] =
   " DELETE
     FROM `t_konsultasi`
     WHERE konsulIsDihapusPengirim = '2'
           AND konsulIsDihapusPenerima = '2'
           AND DATEDIFF(current_timestamp, konsulWaktuDihapus) > '30'";
     
   $sql['get_detail_message_item'] =
   " SELECT a.konsulId AS Id,
            a.tusrProfil AS Pengirim,
            a.konsulTusrNamaPengirim AS IdPengirim,
            b.tusrProfil AS Penerima,
            b.konsulTusrNamaPenerima AS IdPenerima,
            a.konsulJudul AS Judul,
            a.konsulIsi as Isi,
            a.konsulWaktuKirim AS WaktuKirim,
            a.konsulWaktuDihapus AS WaktuHapus
     FROM (SELECT konsulId,
                  konsulJudul,
                  konsulTusrNamaPengirim,
                  konsulIsi,
                  konsulWaktuKirim,
                  konsulWaktuDihapus,
                  tusrProfil
           FROM t_konsultasi LEFT JOIN t_user ON konsulTusrNamaPengirim=tusrNama) AS a,
          (SELECT konsulId,
                  konsulTusrNamaPenerima,
                  tusrProfil
           FROM t_konsultasi LEFT JOIN t_user ON konsulTusrNamaPenerima = tusrNama) AS b
     WHERE a.konsulId = b.konsulId AND a.konsulId = '%s' ";
     
   $sql['update_message_read_time'] =
   " UPDATE `t_konsultasi`
     SET konsulWaktuBaca = (SELECT current_timestamp)
     WHERE konsulId = '%s' ";

   $sql['is_address_book_exist'] =
   "SELECT transAddrBookTeman
    FROM trans_address_book
    WHERE transAddrBookPemilik = '%s' AND transAddrBookTeman = '%s'";

   $sql['add_to_address_book'] =
   " INSERT INTO `trans_address_book` (transAddrBookPemilik,
                                      transAddrBookTeman )
     VALUES ('%s','%s') ";
   
   $sql['get_count_address_book'] =
   "SELECT COUNT(`transAddrBookPemilik`) AS totalAddrBook
   FROM `trans_address_book` JOIN `t_user` ON transAddrBookTeman = tusrNama
                               LEFT JOIN `program_studi` ON tusrProdiKode = prodiKode
                               LEFT JOIN `fakultas` ON prodiFakKode = fakKode
   WHERE transAddrBookPemilik = '%s'
      AND transAddrBookTeman LIKE '%%%s%%'
      AND tusrProfil LIKE '%%%s%%'
      AND prodiKode IN (%s)";
   
   $sql['get_all_address_book_items_by'] =
   "SELECT 
      transAddrBookTeman AS NIU,
      tusrProfil AS Nama,
      fakNamaResmi AS Fakultas,
      prodiNamaResmi AS PRODI
   FROM `trans_address_book` JOIN `t_user` ON transAddrBookTeman = tusrNama
      LEFT JOIN `program_studi` ON tusrProdiKode = prodiKode
      LEFT JOIN `fakultas` ON prodiFakKode = fakKode
   WHERE transAddrBookPemilik = '%s'
      AND transAddrBookTeman LIKE '%%%s%%'
      AND tusrProfil LIKE '%%%s%%'
      AND prodiKode IN (%s)
  LIMIT %d, %d ";
	     
   $sql['delete_address_book'] =
   " DELETE FROM `trans_address_book`
     WHERE transAddrBookPemilik = '%s' AND transAddrBookTeman = '%s' ";
     
$sql['select_prodi']="
SELECT
   prodiKode AS KODE,
   CONCAT(prodiJjarKode, ' ', prodiNamaResmi) AS PRODI
FROM
   program_studi
ORDER BY prodiJjarKode, prodiNamaResmi
";

$sql['select_group_prodi']="
SELECT 
 GROUP_CONCAT(prodiKode) AS KODE
FROM
   program_studi
";

#add ccp 28-02-2023
$sql['get_count_aduan'] =
   "SELECT COUNT(aduanId)
     FROM pengaduan
     WHERE aduanNoreg = '%s'
           AND aduanStatus='%s'"
;

$sql['get_all_inbox_aduan_item'] =
   " SELECT aduanId AS Id,
            aduanKategori AS Kategori,
            aduanNama AS Pengadu,
            aduanObjectNama AS Diadu,
            aduanTgl AS Tanggal,
            aduanNomor AS Nomor,
            aduanStatus AS Status,
            aduanMateri AS Materi
     FROM pengaduan
     WHERE aduanNoreg = '%s' 
	 AND aduanStatus='%s'
     ORDER BY aduanTgl DESC 
     LIMIT %d, %d ";

$sql['get_count_aduan'] =
   "select max(aduanId) as maxid from pengaduan limit 1"
;

?>
