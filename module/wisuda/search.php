<?php 
// Konfigurasi Database 
include"conn.php";
  
// Get Search Term
$searchTerm = strtoupper($_GET['term']); 
  
// Menampilkan Database
$sql = "
SELECT temp.nama
FROM(
SELECT 
CONCAT(IF(pegGelarDepan<>'',CONCAT(pegGelarDepan,' '),''),TRIM(pegNama),IF(pegGelarBelakang<>'',CONCAT(' ',pegGelarBelakang),'')) AS nama
FROM dosen
JOIN pegawai ON dsnPegNip = pegNip)
AS temp
WHERE temp.nama LIKE '%".$searchTerm."%'
"; 
$query = mysql_query($sql);
// Generate Array dengan data username
$usernameData = array(); 
// if($query->num_rows > 0){ 
    while($row = mysql_fetch_assoc($query)){ 
        $data['id'] = $row['nama']; 
        $data['value'] = $row['nama']; 
        array_push($usernameData, $data); 
    } 
// } 
  
// Mengembalikan hasil sebagai array Json
echo json_encode($usernameData); 
?>