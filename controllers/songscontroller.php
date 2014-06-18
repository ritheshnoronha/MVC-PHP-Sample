<?php

class SongsController extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
	}
	
	public function index()
	{
		try {
			
			$songs = $this->_model->getSongs();
			$this->_view->set('songs', $songs);
			$this->_view->set('title', 'New songs from database');
			
			return $this->_view->output();
			
		} catch (Exception $e) {
			echo '<h1>Application error:</h1>' . $e->getMessage();
		}
	}
	
	public function details($songId)
	{
		try {
			
			$songs = $this->_model->getSongsById((int)$songId);
			
			if ($songs)
			{
				$this->_view->set('title', $songs['artist']);
				$this->_view->set('songBody', $songs['track']);
				$this->_view->set('link', $songs['link']);
			}
			else 
			{
				$this->_view->set('title', 'Invalid song ID');
				$this->_view->set('noSong', true);
			}
			
			return $this->_view->output();
			 
		} catch (Exception $e) {
			echo '<h1>Application error:</h1>' . $e->getMessage();
		}
	}
	
}