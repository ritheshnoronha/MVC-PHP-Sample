<?php

class SongsModel extends Model
{
	public function getSongs()
	{
		$sql = "SELECT
					a.id,
					a.artist,
					a.track,
                    a.link
				FROM 
					song a
				ORDER BY a.artist DESC";
		
		$this->_setSql($sql);
		$songs = $this->getAll();
		
		if (empty($songs))
		{
			return false;
		}
		
		return $songs;
	}
	
	public function getSongsById($id)
	{
		$sql = "SELECT
					a.artist,
					a.track,
                    a.link
				FROM 
					song a
				WHERE 
					a.id = ?";
		
		$this->_setSql($sql);
		$songDetails = $this->getRow(array($id));
		
		if (empty($songDetails))
		{
			return false;
		}
		
		return $songDetails;
	}
}