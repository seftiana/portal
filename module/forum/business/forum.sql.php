<?php
   $sql['get_all_kategori_item'] = 
   " SELECT fkatId AS id,
            fkatJudul AS judul,
            fkatDeskripsi AS deskripsi
     FROM forum_kategori";
   
   $sql['get_kategori_item_detail'] =
   " SELECT fkatId AS id,
            fkatJudul AS judul,
            fkatDeskripsi AS deskripsi
     FROM forum_kategori
     WHERE fkatId = '%s'";
   
   $sql['get_sum_topik_for_kategori'] =
   " SELECT COUNT(ftopikId) AS jml_topik
     FROM forum_topik
     WHERE ftopikFkatId = '%s'";
   
   $sql['get_sum_topik_for_kategori_except_banned'] =
   " SELECT COUNT(ftopikId) AS jml_topik
     FROM forum_topik
     INNER JOIN forum_hakakses ON ftopikId = fhakFtopikId     
     INNER JOIN t_user ON ftopikUserIdModerator = tusrNama
     WHERE ftopikFkatId = '%s' AND fhakHakAksesId = '%s' AND fhakAkses='Y'";
   
	$sql['get_count_thread_in_topik'] = "
		SELECT 
			COUNT(fthreadId) AS total
		FROM forum_thread
		WHERE fthreadFtopikId = '%s'";
	
   $sql['do_add_kategori_item'] = 
   " INSERT 
     INTO forum_kategori (fkatJudul, fkatDeskripsi)
     VALUES ('%s', '%s')";
   
   $sql['do_update_kategori_item'] =
   " UPDATE forum_kategori
     SET fkatJudul = '%s',
         fkatDeskripsi = '%s'
     WHERE fkatId = '%s'";
   
   $sql['do_delete_kategori_item'] =
   " DELETE
     FROM forum_kategori
     WHERE fkatId = '%s'";
   
   $sql['get_all_topik_item'] =
   " SELECT ftopikId AS topid,
            ftopikJudul AS judul,
            ftopikDeskripsi AS deskripsi,
            ftopikLastPost AS tanggal,
            ftopikUserIdModerator AS moderatorid,
            ftopikFkatId AS kategoriid,   	            
            tusrProfil AS namamoderator
     FROM forum_topik     
     INNER JOIN t_user ON ftopikUserIdModerator = tusrNama
     WHERE ftopikFkatId = '%s'
	  ORDER BY ftopikLastPost desc";
   
   $sql['get_all_topik_item_except_banned'] =
   " SELECT ftopikId AS topid,
            ftopikJudul AS judul,
            ftopikDeskripsi AS deskripsi,
            ftopikLastPost AS tanggal,
            ftopikUserIdModerator AS moderatorid,
            ftopikFkatId AS kategoriid,   	
            fhakAkses AS hakakses,
            tusrProfil AS namamoderator
     FROM forum_topik
     INNER JOIN forum_hakakses ON ftopikId = fhakFtopikId
     INNER JOIN t_user ON ftopikUserIdModerator = tusrNama
     WHERE ftopikFkatId = '%s' AND fhakHakAksesId = '%s' AND fhakAkses='Y'
	  ORDER BY ftopikLastPost desc";
   
   $sql['get_topik_item_detail'] =
   " SELECT ftopikId AS id,
            ftopikJudul AS judul,
            ftopikDeskripsi AS deskripsi,
            ftopikLastPost AS tanggal,
            ftopikUserIdModerator AS moderatorid,
            ftopikFkatId AS kategoriid
     FROM forum_topik
     WHERE ftopikId = '%s'";
   
   $sql['get_maximum_topik_id'] =
   " SELECT MAX(ftopikId) AS maxid
     FROM forum_topik";
   
   $sql['get_hakakses_topik'] =
   " SELECT fhakId AS hakaksesid,
            fhakFtopikId AS topikid,
            fhakHakAksesId AS topikuserrole,
            fhakAkses AS hakakses
     FROM forum_hakakses
     WHERE fhakFtopikId = '%s'";
   
   $sql['do_update_last_post_topik_item'] =
   " UPDATE forum_topik
     SET ftopikLastPost = NOW()
     WHERE ftopikId = '%s'";
   
   $sql['do_add_topik_item'] =
   " INSERT 
     INTO forum_topik (ftopikJudul,
                       ftopikDeskripsi,
                       ftopikUserIdModerator,
                       ftopikFkatId )
     VALUES ('%s','%s','%s','%s')";
   
   $sql['do_update_topik_item'] =
   " UPDATE forum_topik
     SET ftopikJudul = '%s',
         ftopikDeskripsi = '%s',            
         ftopikUserIdModerator = '%s'
     WHERE ftopikId = '%s'";
   
   $sql['do_delete_topik_item'] =
   " DELETE
     FROM forum_topik
     WHERE ftopikId = '%s'";
   
   $sql['do_add_hakakses_topik'] =
   " INSERT 
     INTO forum_hakakses (fhakFtopikId, fhakHakAksesId, fhakAkses)
     VALUES ('%s', '%s', '%s')";
   
   $sql['do_delete_hakakses_topik'] =
   " DELETE 
     FROM forum_hakakses
     WHERE fhakFtopikId = '%s'";
   
   $sql['get_all_thread_item'] =
   " SELECT fthreadId AS id,
            fthreadFtopikId AS topikid,
            fthreadJudul AS judul,
            threadLastPost AS tanggal,
            threadJmlPost AS jmlpost,
            tusrProfil AS namalastposter,
            ftopikFkatId AS kategoriid
     FROM forum_thread
     LEFT JOIN forum_topik ON fthreadFtopikId = ftopikId  
     LEFT JOIN t_user ON tusrNama = fthreadFmoderatorId
     WHERE fthreadFtopikId = '%s' 
	  ORDER BY threadLastPost desc";
  
  $sql['get_all_thread_item_offset_limit'] =
   " SELECT fthreadId AS id,
            fthreadFtopikId AS topikid,
            fthreadJudul AS judul,
            threadLastPost AS tanggal,
            threadJmlPost AS jmlpost,
            tusrProfil AS namalastposter,
            ftopikFkatId AS kategoriid
     FROM forum_thread
     LEFT JOIN forum_topik ON fthreadFtopikId = ftopikId  
     LEFT JOIN t_user ON tusrNama = fthreadFmoderatorId
     WHERE fthreadFtopikId = '%s'
	  ORDER BY threadLastPost desc
	  LIMIT %d,%d";
   
   $sql['get_thread_item_detail'] =
   " SELECT fthreadId AS id,
            fthreadFtopikId AS topikid,
            fthreadJudul AS judul,
            threadLastPost AS tanggal,
            threadJmlPost AS jmlpost,
            ftopikFkatId AS kategoriid
     FROM forum_thread
     LEFT JOIN forum_topik ON fthreadFtopikId = ftopikId     
     WHERE fthreadId = '%s'";
	
   $sql['get_maximum_thread_id'] =
   " SELECT MAX(fthreadId)
     FROM forum_thread";
   
   $sql['do_add_thread_item'] =
   " INSERT
     INTO forum_thread (fthreadJudul, fthreadFtopikId)
     VALUES ('%s', '%s')";
   
   $sql['do_update_thread_item'] =
   " UPDATE forum_thread
     SET fthreadJudul = '%s'
     WHERE fthreadId = '%s'";
  
   $sql['do_delete_thread_item'] =
   " DELETE
     FROM forum_thread
     WHERE fthreadId = '%s'";
   
   $sql['do_update_last_post_thread_item'] =
   " UPDATE forum_thread
     SET threadLastPost = NOW()
     WHERE fthreadId = '%s'";
   
   $sql['do_update_user_post_thread_item'] =
   " UPDATE forum_thread
     SET fthreadFmoderatorId = '%s'
     WHERE fthreadId = '%s'";
   
   $sql['do_update_sum_of_post_thread_item'] = 
   " UPDATE forum_thread
     SET threadJmlPost = %s
     WHERE fthreadId = '%s'";
   
   $sql['get_all_post_item'] =
   " SELECT fpostId AS id,
            fpostJudul AS judul,
            fpostIsi AS content,
            fpostTime AS tanggal,
            fpostFthreadId AS threadid,
            fpostUserId AS username,
            tusrProfil AS userprofil,
            tusrThakrId AS roleid,
            thakrNama AS userrole
     FROM forum_post
     LEFT JOIN t_user ON tusrNama =fpostUserId
     LEFT JOIN t_hak_akses_ref ON  tusrThakrId = thakrId
     WHERE fpostFthreadId = '%s' order by fpostId desc";
   
	$sql['get_all_post_item_offset_limit'] =
   " SELECT fpostId AS id,
            fpostJudul AS judul,
            fpostIsi AS content,
            fpostTime AS tanggal,
            fpostFthreadId AS threadid,
            fpostUserId AS username,
            tusrProfil AS userprofil,
            tusrThakrId AS roleid,
            thakrNama AS userrole
     FROM forum_post
     LEFT JOIN t_user ON tusrNama =fpostUserId
     LEFT JOIN t_hak_akses_ref ON  tusrThakrId = thakrId
     WHERE fpostFthreadId = '%s' order by fpostId desc
	  LIMIT %d,%d";
	
	$sql['get_count_post_item'] = "
		SELECT COUNT(fpostId) as total
		FROM forum_post
			LEFT JOIN t_user ON tusrNama =fpostUserId
			LEFT JOIN t_hak_akses_ref ON  tusrThakrId = thakrId
		WHERE fpostFthreadId = '%s'";
	
   $sql['get_post_item_detail'] =
   " SELECT fpostId AS id,
            fpostJudul AS judul,
            fpostIsi AS content,
            fpostTime AS tanggal,
            fpostFthreadId AS threadid,
            fpostUserId AS username,
            tusrProfil AS userprofil,
            tusrThakrId AS roleid,
            thakrNama AS userrole
     FROM forum_post
     LEFT JOIN t_user ON tusrNama =fpostUserId
     LEFT JOIN t_hak_akses_ref ON  tusrThakrId = thakrId
     WHERE fpostId = '%s'";
   
   $sql['do_add_post_item'] =
   " INSERT
     INTO forum_post (fpostJudul, fpostIsi, fpostTime, fpostFthreadId, fpostUserId)
     VALUES ('%s', '%s', NOW(), '%s', '%s')";
   
   $sql['do_delete_post_item'] =
   " DELETE
     FROM forum_post
     WHERE fpostId = '%s'";
     
   $sql['get_latest_post'] =
   "SELECT fpostId as PostId, fpostJudul as PostTitle, fpostTime as PostTime,
                fpostFthreadId as ThreadId, fthreadJudul as ThreadTitle, ftopikJudul as TopikTitle,
      tusrProfil as Poster, ftopikId as TopikId, ftopikFkatId as KatId,
                threadJmlPost as JumlahPost, threadLastPost as LastPost
    FROM( SELECT fpostId, fpostJudul, fpostTime, fpostFthreadId, fthreadJudul, ftopikJudul, tusrProfil,
                      ftopikId, ftopikFkatId, threadJmlPost, threadLastPost
          FROM forum_post
               LEFT JOIN forum_thread ON fpostFthreadId = fthreadId
               LEFT JOIN forum_topik ON fthreadFtopikId = ftopikId
          LEFT JOIN t_user ON tusrNama = fpostUserId
               ORDER BY fPostTime DESC
             ) AS ORDERED
         GROUP BY ORDERED.fpostFthreadId
         ORDER BY ORDERED.fpostTime DESC
    LIMIT 0, %d";
?>