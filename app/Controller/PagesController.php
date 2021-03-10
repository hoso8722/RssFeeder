<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{


	public $autoLayout = true;
	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Pages';
	var $uses = array('Source', 'Site');


	//	var $cacheAction = array('archives/' => '300');

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 */
	public function display()
	{
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

		$this->Site->unbindModel(array('hasMany' => array('Source')));
		$sites = $this->Site->find('all');
		$this->set('sites', $sites);

		//Get referer set count
		$pattern = '{^https?://([^:/]+)}';
		preg_match($pattern, $this->referer(), $matches);
		$this->set('referer', $matches);

		if ($matches) {
			foreach ($sites as $site) {
				if (strstr($site['Site']['sourceurl'], $matches[0])) {
					$FieldToInc = '`sites`.`count`';
					$this->Site->query("UPDATE `sites` SET " . $FieldToInc . " = " . $FieldToInc . " + 1 WHERE id=" . $site['Site']['id']);
					break;
				}
			}
		}

		$lastNum = $this->initCookie(1);
		$trandNum = $this->initCookie(2);
		if (!$lastNum) $lastNum = 100;
		if (!$trandNum) $trandNum = 100;
		//Get LastUpDateData
		$datas = $this->Source->find('all', array('order' => array('Source.created' => 'DESC'), 'limit' => $lastNum));
		$this->set('datas', $datas);

		$max = $this->getMax($datas);
		$this->set('h_data', $max);

		//Get 24HRankingData
		$toArr = getdate();
		$frArr = getdate($toArr[0] - 3600 * 24);
		$fromDay = date('Y-m-d H:i:s', mktime($frArr['hours'], $frArr['minutes'], $frArr['seconds'], $frArr['mon'], $frArr['mday'], $frArr['year']));
		$toDay = date('Y-m-d H:i:s', mktime($toArr['hours'], $toArr['minutes'], $toArr['seconds'], $toArr['mon'], $toArr['mday'], $toArr['year']));
		$conditions = array('`Source`.`created` BETWEEN ? AND ?' => array($fromDay, $toDay));

		$r_datas = $this->Source->find('all', array('conditions' => $conditions, 'order' => array('Source.total' => 'desc'), 'limit' => $trandNum));
		$this->set('r_datas', $r_datas);

		$r_max = $this->getMax($r_datas);
		$this->set('hr_data', $r_max);


		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}
