<?php
   
   $sql['get_all_inbox_message_item'] =
   " SELECT a.pesanID AS Id,
            a.pesanJudul AS Judul,
            a.tusrProfil AS Pengirim,
            b.tusrProfil AS Penerima,
            a.pesanWaktuKirim AS Tanggal,
            a.pesanWaktuBaca AS Baca
     FROM (SELECT pesanID,
                  pesanJudul,
                  pesanWaktuKirim,
                  pesanWaktuBaca,
                  pesanIsi,
                  pesanIsDihapusPenerima,
                  tusrProfil
           FROM `t_pesan` LEFT JOIN `t_user` ON pesanTusrNamaPengirim=tusrNama) AS a,
          (SELECT pesanID,
                  pesanTusrNamaPenerima,
                  tusrProfil 
           FROM `t_pesan` LEFT JOIN `t_user` ON pesanTusrNamaPenerima=tusrNama) AS b 
     WHERE b.pesanTusrNamaPenerima = '%s' 
           AND a.pesanID = b.pesanID
           AND a.pesanIsDihapusPenerima IS NULL
     ORDER BY a.pesanWaktuKirim DESC 
     LIMIT %d, %d ";
   
   $sql['get_all_sent_message_item'] =
   " SELECT a.pesanID AS Id,
            a.pesanJudul AS Judul,
            a.tusrProfil AS Pengirim,
            b.tusrProfil AS Penerima,
            a.pesanWaktuKirim AS Tanggal,
            a.pesanWaktuBaca AS Baca
     FROM (SELECT pesanID,
                  pesanJudul,
                  pesanTusrNamaPengirim,
                  pesanWaktuKirim,
                  pesanWaktuBaca,
                  pesanIsi,
                  pesanIsDihapusPengirim,
                  tusrProfil
           FROM `t_pesan` LEFT JOIN `t_user` ON pesanTusrNamaPengirim=tusrNama) AS a,
          (SELECT pesanID,
                  tusrProfil 
           FROM `t_pesan` LEFT JOIN `t_user` ON pesanTusrNamaPenerima=tusrNama) AS b 
     WHERE a.pesanTusrNamaPengirim = '%s' 
           AND a.pesanID = b.pesanID
           AND a.pesanIsDihapusPengirim IS NULL
     ORDER BY a.pesanWaktuKirim DESC
     LIMIT %d, %d ";
   
   $sql['get_all_trash_message_item'] =
   " SELECT a.pesanID AS Id,
            a.pesanJudul AS Judul,
            a.tusrProfil  AS Pengirim,
            b.tusrProfil AS Penerima,
            a.pesanWaktuDihapus AS Tanggal,
            (IF (a.pesanTusrNamaPengirim = b.pesanTusrNamaPenerima , 
               IF (a.pesanIsDihapusPengirim = '1' AND b.pesanIsDihapusPenerima = '1',
                     'all',
                     IF(a.pesanIsDihapusPengirim = '1', 
                        'sent', 
                        'inbox')), 
               IF (a.pesanTusrNamaPengirim = '%s',
                     'sent',
                     'inbox'))) AS Jenis
     FROM (SELECT pesanID,
                  pesanJudul, 
                  pesanTusrNamaPengirim,
                  pesanWaktuDihapus,
                  pesanIsDihapusPengirim,
                  tusrProfil
           FROM `t_pesan` LEFT JOIN `t_user` ON pesanTusrNamaPengirim=tusrNama) AS a,
          (SELECT pesanID,
                  pesanTusrNamaPenerima,
                  pesanIsDihapusPenerima,
                  tusrProfil 
           FROM `t_pesan` LEFT JOIN `t_user` ON pesanTusrNamaPenerima=tusrNama) AS b 
     WHERE a.pesanId = b.pesanId 
           AND ((a.pesanTusrNamaPengirim = '%s' AND a.pesanIsDihapusPengirim ='1')
                OR ( b.pesanTusrNamaPenerima = '%s' and b.pesanIsDihapusPenerima = '1'))
     ORDER BY a.pesanWaktuDihapus DESC
     LIMIT %d, %d ";
   
   $sql['get_count_inbox_message_item'] =
   " SELECT COUNT(pesanID)
     FROM `t_pesan`
     WHERE pesanTusrNamaPenerima = '%s'
           AND pesanisDihapusPenerima IS NULL ";
           
   $sql['get_count_new_inbox_message_item'] =
   " SELECT COUNT(pesanID)
     FROM `t_pesan`
     WHERE pesanTusrNamaPenerima = '%s'
           AND pesanisDihapusPenerima IS NULL
           AND pesanWaktuBaca IS NULL ";
   
   $sql['get_count_sent_message_item'] =
   " SELECT COUNT(pesanID)
     FROM `t_pesan`
     WHERE pesanTusrNamaPengirim = '%s'
           AND pesanIsDihapusPengirim IS NULL ";
   
   $sql['get_count_trash_message_item'] =
   " SELECT COUNT(pesanID)
     FROM `t_pesan`
     WHERE (pesanTusrNamaPengirim = '%s' AND pesanIsDihapusPengirim = '1' ) OR
           (pesanTusrNamaPenerima = '%s' AND  pesanIsDihapusPenerima = '1')";
            
   $sql['add_message_item'] =
   " INSERT INTO `t_pesan` ( pesanTusrNamaPengirim,
                             pesanTusrNamaPenerima,
                             pesanJudul,
                             pesanIsi,
                             pesanWaktuKirim )
     VALUES ('%s','%s','%s','%s',(SELECT current_timestamp)) ";
     
   $sql['delete_inbox_message'] =
   " UPDATE `t_pesan`
     SET pesanWaktuDihapus = (SELECT current_timestamp),
         pesanIsDihapusPenerima = '1'
     WHERE pesanID = '%s' ";
     
   $sql['delete_sent_message'] =
   " UPDATE `t_pesan`
     SET pesanWaktuDihapus = (SELECT current_timestamp),
         pesanIsDihapusPengirim = '1'
     WHERE pesanID = '%s' ";
     
   $sql['delete_trash_inbox_message'] =
   " UPDATE `t_pesan`
     SET pesanWaktuDihapus = (SELECT current_timestamp),
         pesanIsDihapusPenerima = '2'
     WHERE pesanID = '%s'";
     
   $sql['delete_trash_sent_message'] =
   " UPDATE `t_pesan`
     SET pesanWaktuDihapus = (SELECT current_timestamp),
         pesanIsDihapusPengirim = '2'
     WHERE pesanID = '%s'";
   
   $sql['delete_trash_all_message'] =
   " UPDATE `t_pesan`
     SET pesanWaktuDihapus = (SELECT current_timestamp),
         pesanIsDihapusPengirim = '2',
         pesanIsDihapusPenerima = '2'
     WHERE pesanID = '%s'";
           
   $sql['delete_old_message'] =
   " DELETE
     FROM `t_pesan`
     WHERE pesanIsDihapusPengirim = '2'
           AND pesanIsDihapusPenerima = '2'
           AND DATEDIFF(current_timestamp, pesanWaktuDihapus) > '30'";
     
   $sql['get_detail_message_item'] =
   " SELECT a.pesanID AS Id,
            a.tusrProfil AS Pengirim,
            a.pesanTusrNamaPengirim AS IdPengirim,
            b.tusrProfil AS Penerima,
            b.pesanTusrNamaPenerima AS IdPenerima,
            a.pesanJudul AS Judul,
            a.pesanIsi as Isi,
            a.pesanWaktuKirim AS WaktuKirim,
            a.pesanWaktuDihapus AS WaktuHapus
     FROM (SELECT pesanId,
                  pesanJudul,
                  pesanTusrNamaPengirim,
                  pesanIsi,
                  pesanWaktuKirim,
                  pesanWaktuDihapus,
                  tusrProfil
           FROM t_pesan LEFT JOIN t_user ON pesanTusrNamaPengirim=tusrNama) AS a,
          (SELECT pesanId,
                  pesanTusrNamaPenerima,
                  tusrProfil
           FROM t_pesan LEFT JOIN t_user ON pesanTusrNamaPenerima = tusrNama) AS b
     WHERE a.pesanId = b.pesanID AND a.pesanId = '%s' ";
     
   $sql['update_message_read_time'] =
   " UPDATE `t_pesan`
     SET pesanWaktuBaca = (SELECT current_timestamp)
     WHERE pesanID = '%s' ";

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
