<?php
App::uses('AppController', 'Controller');

class CountController extends AppController {

	var $name = 'Counts';

	var $uses = array('Source','Site');

	var $components = array( 'RequestHandler' );


	function up($id) 
	{
		if(is_numeric($id)) {
			$this->_count($id);
		}
		$this->autoRender = false;
	}

	function _count($id) 
	{
		$entry = $this->Source->findById($id);
		if($entry['Source']['user_ip'] != $_SERVER['REMOTE_ADDR']) 
		{
			
			$this->Source->read(array('Source.id','Source.total','Source.user_ip'),$id);
			$this->Source->set(array(
				'total' => $entry['Source']['total']+1,
				'user_ip' => $_SERVER['REMOTE_ADDR'],
			));
			$this->Source->save();
			return;
		}
	}
}