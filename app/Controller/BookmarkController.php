<?php
App::uses('AppController', 'Controller');
/**
 * Bookmark Controller
 *
 * @property Blog $Blog
 */
class BookmarkController extends AppController
{

	var $uses = array('Source', 'Site');

	public function index()
	{
		if (!empty($_COOKIE['set'])) {
			$cookie = $_COOKIE['set'];
			if (empty($cookie['bookmark'])) {
				$this->set('datas', array());
				$this->set('hr_data', null);
				return;
			}
			$arr = explode('.', $cookie['bookmark']);
			for ($i = 0, $len = count($arr); $i < $len; $i++) {
				if (!is_numeric($arr[$i])) {
					$this->set('datas', array());
					$this->set('hr_data', null);
					return;
				}
			}
			$params = array(
				'conditions' => array('Source.id' => $arr),
				'order' => 'FIELD(Source.id, ' . implode(',', $arr) . ')',
				'limit' => 1000
			);
			$datas = $this->Source->find('all', $params);
			$this->set('datas', $datas);

			$max = $this->getMax($datas);
			$this->set('hr_data', $max);
		}
	}
}
