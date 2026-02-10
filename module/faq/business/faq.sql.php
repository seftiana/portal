<?php

$sql['get_kategori_faq_by_id'] = "
   SELECT 
      fktgrId AS id,
      fktgrNama AS nama,
      fktgrKeterangan AS keterangan 
   FROM 
      t_faq_kategori
   WHERE
      fktgrId='%d'";

$sql['get_kategori_faq'] = "
   SELECT
      fktgrId AS id,
      fktgrNama AS nama,
      fktgrKeterangan AS keterangan 
   FROM
      t_faq_kategori";

$sql['get_kategori_faq_offset_limit'] = "
   SELECT
      fktgrId AS id,
      fktgrNama AS nama,
      fktgrKeterangan AS keterangan 
   FROM
      t_faq_kategori
   LIMIT %d
   OFFSET %d";

$sql['get_kategori_faq_lengkap'] = "
   SELECT
      fktgrId as id,
      fktgrNama as nama,
      fktgrKeterangan as keterangan,
      count(faqId) as total_faq
   FROM
      t_faq_kategori LEFT JOIN t_faq ON fktgrId = faqFktgrId
   GROUP
      BY fktgrId";

$sql['get_total_data'] = "
   SELECT 
      count(faqId) as total
   FROM
      t_faq";

$sql['get_total_data_kategori'] = "
   SELECT 
      count(fktgrId) as total
   FROM
      t_faq_kategori";

$sql['get_total_data_by_kategori'] = "
   SELECT
      COUNT(faqId) AS total
   FROM
      t_faq
   WHERE
      faqFktgrId = '%s'";

$sqlGetFaqData = "
   SELECT
      faqId as id,
      faqPertanyaan as pertanyaan,
      faqJawaban as jawaban,
      faqFktgrId as kategori_id,
      faqIsPublic as is_public";

$sql['get_faq_data'] =
   $sqlGetFaqData . "
   FROM
      t_faq";

$sql['get_faq_data_offset_limit'] =
   $sqlGetFaqData . "
   FROM
      t_faq
   LIMIT %d
   OFFSET %d";

$sql['get_faq_data_by_kategori'] =
   $sqlGetFaqData . "
   FROM
      t_faq
   WHERE
      faqFktgrId = '%d'";

$sql['get_faq_data_by_kategori_offset_limit'] =
   $sqlGetFaqData . "
   FROM
      t_faq
   WHERE
      faqFktgrId = '%s'
   LIMIT '%s'
   OFFSET '%s'";

$sql['get_faq_data_by_kategori_userrole'] =
   $sqlGetFaqData . "
   FROM
      t_faq
      LEFT JOIN t_faq_tujuan ON faqId=ftjFaqId
   WHERE
      faqFktgrId = '%s'
      AND (ftjThakrId IN ('%s') OR faqIsPublic=1)";

$sql['get_faq_data_by_kategori_userrole_offset_limit'] =
   $sqlGetFaqData . "
   FROM
      t_faq
      LEFT JOIN t_faq_tujuan ON faqId=ftjFaqId
   WHERE
      faqFktgrId = '%s'
      AND (ftjThakrId IN ('%s') OR faqIsPublic=1)
   LIMIT %d
   OFFSET %d";

$sql['get_faq_data_by_id'] = 
   $sqlGetFaqData . "
   FROM
      t_faq
   WHERE
      faqId='%s'";

$sql['get_faq_data_lengkap_by_id'] = "
	SELECT
		faqId as id,
      faqPertanyaan as pertanyaan,
      faqJawaban as jawaban,
      faqFktgrId as kategori_id,
      fktgrNama AS kategori_nama,
      fktgrKeterangan AS kategori_keterangan,
      faqIsPublic as is_public,
		GROUP_CONCAT(ftjThakrId SEPARATOR '|') AS hak_id
   FROM
      t_faq
		LEFT JOIN t_faq_kategori ON faqFktgrId=fktgrId
		LEFT JOIN t_faq_tujuan ON faqId=ftjFaqId
   WHERE
      faqId='%s'
	GROUP BY faqId";
		
	$sql['get_faq_data_by_userrole'] = "
   SELECT 
      faqId as id,
      faqPertanyaan as pertanyaan,
      faqJawaban as jawaban,
      faqFktgrId as kategori_id,
      fktgrNama AS kategori_nama,
      fktgrKeterangan AS kategori_keterangan,
      faqIsPublic as is_public
   FROM
      t_faq
		LEFT JOIN t_faq_kategori ON faqFktgrId=fktgrId
		LEFT JOIN t_faq_tujuan ON faqId=ftjFaqId
   WHERE 
      ftjThakrId IN (%s) OR faqIsPublic=1";

$sql['get_faq_data_by_userrole_offset_limit'] = "
   SELECT 
      faqId as id,
      faqPertanyaan as pertanyaan,
      faqJawaban as jawaban
      faqFktgrId as kategori_id,
      fktgrNama AS kategori_nama,
      fktgrKeterangan AS kategori_keterangan, 
      faqIsPublic as is_public
   FROM
      t_faq
		LEFT JOIN t_faq_kategori ON faqFktgrId=fktgrId
		LEFT JOIN t_faq_tujuan ON faqId=ftjFaqId
   WHERE 
      ftjThakrId IN (%s) OR faqIsPublic=1
   LIMIT %d
   OFFSET %d ";

$sql['do_add_faq'] = "
   INSERT INTO t_faq
      (faqPertanyaan, faqJawaban, faqFktgrId, faqIsPublic)
   VALUES
      ('%s', '%s', '%s', '%s')";

$sql['do_update_faq'] = "
   UPDATE t_faq
   SET 
      faqPertanyaan='%s',
      faqJawaban='%s',
      faqFktgrId='%s',
      faqIsPublic='%s'
   WHERE
      faqId='%s'";

$sql['do_delete_faq'] = "
   DELETE FROM
      t_faq
   WHERE
      faqId='%s'";

$sql['do_add_faq_kategori'] = "
   INSERT INTO t_faq_kategori (fktgrNama, fktgrKeterangan)
   VALUES ('%s','%s')";

$sql['do_update_faq_kategori'] = "
   UPDATE
      t_faq_kategori
   SET
      fktgrNama = '%s', fktgrKeterangan = '%s'
   WHERE fktgrId = '%s'";

$sql['do_delete_faq_kategori'] = "
   DELETE FROM
      t_faq_kategori
   WHERE
      fktgrId = '%s'";

$sql['do_add_faq_tujuan'] = "
   INSERT INTO t_faq_tujuan (ftjFaqId, ftjThakrId)
   VALUES ((SELECT MAX(faqId) FROM t_faq),'%s')";

$sql['do_update_faq_tujuan'] = "
   INSERT INTO t_faq_tujuan(ftjFaqId, ftjThakrId)
   VALUES('%s','%s')";

$sql['do_delete_faq_tujuan'] = "
   DELETE FROM
      t_faq_tujuan
   WHERE
      ftjFaqId = '%s'";

?>