<?php
$sql['get_unit'] = "
SELECT 
	untId AS ID,
	untServiceAddress AS ALAMAT,
	untNama AS NAMA
FROM t_unit
";

$sql['get_prodi'] = "
	SELECT
		prodiKode AS ID,
		prodiNamaResmi AS NAMA
	FROM program_studi
";
?>
