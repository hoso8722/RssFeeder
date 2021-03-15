<?php
App::uses('AppController', 'Controller');

class CountController extends AppController
{

	var $name = 'Counts';

	var $uses = array('Source', 'Site');

	var $components = array('RequestHandler');

	function update($id)
	{
		if (is_numeric($id)) {
			$url = $this->_countup($id);
		}
		//print($url);
		//$this->autoRender = false;
		return $this->redirect($url);
	}

	// function up($id)
	// {
	// 	if (is_numeric($id)) {
	// 		$this->_countup($id);
	// 	}
	// 	$this->autoRender = false;
	// }

	function _countup($id)
	{
		$entry = $this->Source->findById($id);
		//var_dump($entry);
		if ($entry['Source']['user_ip'] != $_SERVER['REMOTE_ADDR']) {

			$this->Source->read(array('Source.id', 'Source.total', 'Source.user_ip'), $id);
			$this->Source->set(array(
				'total' => $entry['Source']['total'] + 1,
				'user_ip' => $_SERVER['REMOTE_ADDR'],
			));
			$this->Source->save();
		}
		$this->Source->id = $id;
		return $this->Source->field('Source.link');
	}
}
