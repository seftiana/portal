<?php
/**
 * materi
 * 
 * @package 
 * @author Fitria Maulina
 * @copyright Copyright (c) 2006 Gamatechno
 * @version 0.1
 * @access Public
 **/
class MateriItem extends DatabaseConnected
{
	var $mId;
	var $mJudul;
	var $mkId;
	var $jdwlId;
	var $mDesc;
	var $mFile;
	var $mDsnId;
	var $mIsPublic;
	var $mIsAktif;
	var $mTujuan;
	var $mTanggal;
	var $arrMhsId;
	
	
	
	/**
     * MateriItem::MateriItem()
     * 
	 * Konstruktor Materi
	 * 
     * @param object $databaseConnection ADOdb object used to access the database
     * @param object $configObject objek Configuration
     * @return 
     **/
	function MateriItem(&$databaseConnection, &$configObject)
    {
        DatabaseConnected::DatabaseConnected($configObject, "module/e_materi/business/materi.sql.php");
    }
    
    function GetNewId()
    {
    	$sql = sprintf($this->mSqlQueries['get_new_id']);

    	if ($rs = $this->mrDbConnection->Execute($sql))
    	{
    		$array = $rs->GetArray();
    		$this->mId = $array[0]['ID'];
    	}
    	else
    	{
    		return false;
    	}
    }
    
    function GetNewJadwalId($param)
    {
    	$arr = explode(',',$param);
    	$sql = sprintf($this->mSqlQueries['get_jadwal_id'],$arr[0],$arr[1],$arr[2]);

    	if ($rs = $this->mrDbConnection->Execute($sql))
    	{
    		$array = $rs->GetArray();
    		$this->jdwlId = $array[0]['ID'];
    	}
    	else
    	{
    		return false;
    	}	
    }
    
    function GetNewMateriMahasiswaId()
    {
    	$sql = sprintf($this->mSqlQueries['get_new_materi_mahasiswa_id']);

    	if ($rs = $this->mrDbConnection->Execute($sql))
    	{
    		$array = $rs->GetArray();    		
    		return $array[0]['ID'];
    	}
    	else
    	{
    		return false;
    	}
    }
    
    function ExecuteInsertQuery()
    {
    	
        $sql = sprintf($this->mSqlQueries['insert_into_materi'], 
        		$this->mId,
        		$this->mJudul,
        		$this->mkId,
        		$this->jdwlId,
        		$this->mDesc,
        		$this->mFile,
        		$this->mIsAktif,
        		$this->mDsnId,
        		$this->mTujuan,
        		$this->mTanggal
        );
      
        $rsIns = $this->mrDbConnection->Execute($sql) ;
        if (!empty($this->arrMhsId) && ($this->mTujuan == 0)) {
        	foreach ($this->arrMhsId as $mhsId)
        	{
        		$mtrMhsId = $this->GetNewMateriMahasiswaId();
        		$rsInsItem = $this->ExecuteInsertMateriMahasiswaQuery($mtrMhsId,$mhsId);
        	}
        }
        if (($rsIns && $rsInsItem) !== false)
        	return true;
        else 
        	return false;
     
    }
    
    function ExecuteDeleteQuery()
    {
    	$this->ExecuteDeleteMateriMahasiswaQuery();
        $sql = sprintf($this->mSqlQueries['delete_from_materi'], 
        		$this->mId
        );
        if (false !== $this->mrDbConnection->Execute($sql)) 
        	return true;
        else 
        	return false;
     
    }
    
    function ExecuteActivationQuery()
    {
       $sql = sprintf($this->mSqlQueries['materi_activation'], 
        		$this->mIsAktif,
        		$this->mId
        );
        if (false !== $this->mrDbConnection->Execute($sql)) 
        	return true;
        else 
        	return false;
    }
    
	function ExecuteUpdateQuery()
	{
		$sql = sprintf($this->mSqlQueries['update_materi'], 
				$this->mJudul,
				$this->mkId,
				$this->mDesc,
				$this->mFile,
        		$this->mIsAktif,
        		$this->mTujuan,
        		$this->mId
        );
        
        $sql2 = sprintf($this->mSqlQueries['update_materi_no_file'],
				$this->mJudul,
				$this->mkId,
				$this->mDesc,
        		$this->mIsAktif,
        		$this->mTujuan,
        		$this->mId
        );
        if ($this->mFile == "") $rsUpd = $this->mrDbConnection->Execute($sql2);
        else $rsUpd = $this->mrDbConnection->Execute($sql);
        
        $rsDel = $this->ExecuteDeleteMateriMahasiswaQuery();
       
        if (!empty($this->arrMhsId) && ($this->mTujuan == 0)) {
        	foreach ($this->arrMhsId as $mhsId)
        	{
        		$mtrMhsId = $this->GetNewMateriMahasiswaId();        	
        		$rsIns = $this->ExecuteInsertMateriMahasiswaQuery($mtrMhsId,$mhsId);
        	}
        }
        if (false !== ($rsUpd && $rsDel && $rsIns) )
        	return true;
        else 
        	return false;
	}
	
	
    
    function ExecuteDeleteMateriMahasiswaQuery()
    {
    	$sql = sprintf($this->mSqlQueries['delete_materi_mahasiswa'], 
        		$this->mId
        );
        if (false !== $this->mrDbConnection->Execute($sql)) 
        	return true;
        else 
        	return false;
    }
    
    function ExecuteInsertMateriMahasiswaQuery($mtrMhsId,$mhsId)
    {
    	$sql = sprintf($this->mSqlQueries['insert_materi_mahasiswa'], 
    			$mtrMhsId,
        		$this->mId,
        		$mhsId
        );
        if (false !== $this->mrDbConnection->Execute($sql)) 
        	return true;
        else 
        	return false;	
    }

    function GetId()
    {
    	return $this->mId;	
    }
    
	
    function SetId($param)
    {
    	$this->mId = $param;	
    } 
    function SetJudul($param)
    {
    	$this->mJudul = $param ;	
    }
     
    function SetMataKuliahId($param)
    {    
		$this->mkId = $param ;
	} 
    function SetJadwalId($param)
    {
		$this->jdwlId = $param ;
	} 
    function SetDeskripsi($param)
    {
		$this->mDesc = $param ;
	} 
    function SetFile($param)
    {
		$this->mFile = $param ;
	} 
    function SetDosenId($param)
    {
		$this->mDsnId = $param ;
	} 
    function SetIsPublik($param)
    {
		$this->mIsPublic = $param ;
    }
    function SetIsAktif($param)
    {
    	$this->mIsAktif = $param;	
    }
    function SetTujuan($param)
    {
    	$this->mTujuan = $param;
    }
    
    function SetTanggal($param)
    {
    	$this->mTanggal = $param;
    }
    function SetArrayMahasiswa($param)
    {
    	$this->arrMhsId = $param;	
    }
    	
	 
	 
	

} 

?>
