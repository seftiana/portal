<?php
$sql['do_add_feedback'] = "
   INSERT INTO t_feedback
      (fbTusrNama, fbTanggalPost, fbIsi, fbFbprId)
   VALUES 
      ('%s', NOW(),'%s','0')";
      
$sql['do_delete_feedback'] = "
   DELETE 
   FROM t_feedback
   WHERE fbId='%s'";
   
$sql['do_delete_array_feedback'] = "
   DELETE 
   FROM t_feedback
   WHERE fbId IN(%s)";

$sql['do_update_feedback'] = "
   UPDATE t_feedback 
   SET
      fbFbprId='%s', 
      fbKomentar='%s',
      fbTanggalKomentar=NOW()
   WHERE fbId='%s'";
    
$sqlGetFeedback = "
   SELECT 
      fbId AS id, 
      fbTusrNama AS nama_user, 
      tusrProfil AS nama_lengkap,
      fbTanggalPost AS tanggal_post, 
      fbIsi AS isi, 
      fbKomentar AS komentar, 
      fbTanggalKomentar AS tanggal_komentar, 
      fbprNama AS prioritas,
      fbprId AS prioritas_id
   FROM
      t_feedback
      INNER JOIN t_user ON fbTusrNama=tusrNama
      INNER JOIN t_feedback_priority ON fbprId=fbFbprId";

$sql['get_all_feedback'] = 
   $sqlGetFeedback . "
   ORDER BY fbFbprId, fbTanggalPost DESC
   LIMIT %d, %d";
   
$sql['search_feedback_by_isi'] = 
   $sqlGetFeedback . "
   WHERE fbIsi like '%%%s%%' 
   ORDER BY fbFbprId, fbTanggalPost DESC
   LIMIT %d, %d";
   
$sql['get_new_feedback'] = 
   $sqlGetFeedback . "
   WHERE fbFbprId = '0'
   LIMIT %d, %d";
   
$sql['get_feedback_by_id'] = 
   $sqlGetFeedback . "
   WHERE fbId='%s'
   ";
   
$sql['get_total_new_feedback'] = "
   SELECT 
      COUNT(fbId)
   FROM t_feedback
   WHERE fbFbprId = '0'";
   
$sql['get_total_feedback'] = "
   SELECT 
      COUNT(fbId)
   FROM t_feedback";
   
$sql['get_total_search_feedback'] = "
   SELECT 
      COUNT(fbId)
   FROM t_feedback
   WHERE fbIsi like '%%%s%%'";
   
$sql['do_change_priority'] = "
   UPDATE 
      t_feedback
   SET fbFbprId='%s'
   WHERE
      fbId='%s'";
      
$sql['do_change_priority_array_feedback'] = "
   UPDATE 
      t_feedback
   SET fbFbprId='%s'
   WHERE
      fbId IN (%s)";
      
$sql['do_change_priority_new_feedback'] = "
   UPDATE 
      t_feedback
   SET fbFbprId='%s'
   WHERE
      fbId='%s' AND fbFbprId='0'";
?>