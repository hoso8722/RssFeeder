<?php
App::uses('AppController', 'Controller');
/**
 * Dailys Controller
 *
 * @property Daily $Daily
 */

class DailysController extends AppController
{
	/**
	 * Controller name
	 *
	 * @var string
	 */
	var $uses = array('Source', 'Site');


	//	var $cacheAction = array('archives/' => '300');

	public function index($year, $month, $day)
	{
		if (checkdate($month, $day, $year)) {
			$today_start = date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year));
			$today_end = date('Y-m-d H:i:s', mktime(23, 59, 59, $month, $day, $year));
			$this->set(
				'thisday',
				$year . '年' . $month . '月' . $day . '日'
			);
			pr($today_end);
			$params = array(
				'conditions' => array(
					'Source.created BETWEEN ? AND ?' => array($today_start, $today_end)
				),
				'order' => array(
					'Source.created' => 'desc'
				)
			);
			$datas = $this->Source->find('all', $params);
			pr($this->Source->getDataSource()->getLog());
			$this->set('datas', $datas);
			$max = $this->getMax($datas);
			$this->set('h_data', $max);
			return;
		}
	}

	public function rank($year, $month, $day)
	{
		if (checkdate($month, $day, $year)) {
			$day_start = date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year));
			$day_end   = date('Y-m-d H:i:s', mktime(23, 59, 59, $month, $day, $year));

			$this->set('thisday', date('Y年n月j日', mktime(0, 0, 0, $month, $day, $year)));

			$this->set('yesterday', date('Y/n/j', mktime(0, 0, 0, $month, $day, $year) - 3600 * 24));

			$this->set('tommorow', date('Y/n/j', mktime(0, 0, 0, $month, $day, $year) + 3600 * 24));

			$params = array(
				'conditions' => array(
					'Source.created BETWEEN ? AND ?' => array($day_start, $day_end)
				),
				'order' => array(
					'Source.total' => 'desc'
				),
				'limit' => 300
			);
			$datas = $this->Source->find('all', $params);
			pr($this->Source->getDataSource()->getLog());
			// 'all', array(
			// 	'conditions' => array(
			// 		'date(`Source.created`)' => $current_day), 'order' => array('Source.total' => 'desc'), 'limit' => 300));

			$this->set('datas', $datas);

			$max = $this->getMax($datas);
			$this->set('h_data', $max);

			return;
		}
	}

	public function people()
	{

		$this->set('yesterday', date('Y/n/j', time() - 3600 * 24));

		$toArr = getdate();
		$frArr = getdate($toArr[0] - 3600 * 24);
		$fromDay = date('Y-m-d H:i:s', mktime($frArr['hours'], $frArr['minutes'], $frArr['seconds'], $frArr['mon'], $frArr['mday'], $frArr['year']));
		$toDay = date('Y-m-d H:i:s', mktime($toArr['hours'], $toArr['minutes'], $toArr['seconds'], $toArr['mon'], $toArr['mday'], $toArr['year']));
		$conditions = array('`Source`.`created` BETWEEN ? AND ?' => array($fromDay, $toDay));

		$datas = $this->Source->find('all', array('conditions' => $conditions, 'order' => array('Source.total' => 'desc'), 'limit' => 300));
		$this->set('datas', $datas);

		$max = $this->getMax($datas);
		$this->set('h_data', $max);
		return;
	}
}
