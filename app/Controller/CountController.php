<?php
App::uses('AppController', 'Controller');

class CountController extends AppController
{
	public $name = 'Counts';

	public $uses = array('Source', 'Site');

	public $components = array('Cookie', 'RequestHandler');

	function update($id)
	{
		if (is_numeric($id)) {
			$this->Cookie->name = '2chmatomeru';
			// $this->Cookie->time = '1 month';  // または '1 hour'
			// $this->Cookie->secure = false;
			$encrypt = false;
			$expires = '1 month';
			$key = 'histories';
			//var_dump($this->Cookie->read($key));
			if ($this->Cookie->check($key)) {
				$value = $this->Cookie->read($key);
				//var_dump($value);
				$max = 100;
				if (substr_count($value, 'd') >= $max - 1) {
					$index = strpos($value, 'd');
					$value = substr($value, $index + 1, strlen($value) - $index);
				}
				if (strpos($value, $id) === false) {
					$new_value = $value . 'd' . $id;
					//print($value);
					$this->Cookie->write($key, $new_value, $encrypt, $expires);
					//print($new_value);
				} else if (strpos($value, $id) >= 0) {
					$array = explode('d', $value);
					$index = array_search($id, $array);
					array_splice($array, $index, 1);
					array_push($array, strval($id));
					$string = implode('d', $array);
					$this->Cookie->write($key, $string, $encrypt, $expires);
				}
			} else {
				//Initialize Cookie and write first ID
				$this->Cookie->write($key, $id, $encrypt, $expires);
			}

			$url = $this->_countup($id);
		}
		//print($url);
		$this->autoRender = false;

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
/**		
		echo('<pre>');
		print_r($entry);
		echo('</pre>');
*/
		if (empty($entry)) {
			// echo (gettype($entry));
			// var_dump($entry);
			// echo 'true';
			exit();
		}
		if ($entry['Source']['user_ip'] != $_SERVER['REMOTE_ADDR']) {
			
			// count up source_total
			$this->Source->read(array('Source.id', 'Source.total', 'Source.user_ip' ), $id);
			$this->Source->set(array(
				'total' => $entry['Source']['total'] + 1,
				'user_ip' => $_SERVER['REMOTE_ADDR'],
			));
			$this->Source->save();
			
			//count up site_count
			$this->Site->read(array('Site.id', 'Site.count'), $entry['Site']['id']);
			$this->Site->set(array(
				'count' => $entry['Site']['count'] + 1,
			));
			$this->Site->save();
		}
		$this->Source->id = $id;
		return $this->Source->field('Source.link');
	}
}
