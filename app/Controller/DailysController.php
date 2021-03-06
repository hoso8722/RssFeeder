<?php
App::uses('AppController', 'Controller');
/**
 * Dailys Controller
 *
 * @property Daily $Daily
 */

class DailysController extends AppController {
	/**
	 * Controller name
	 *
	 * @var string
	 */
	var $uses = array('Source','Site');


	//	var $cacheAction = array('archives/' => '300');

	public function index( $year,$month, $day) {
		if(checkdate($month,$day,$year)) {
			$thisday = date('Y-m-d',mktime(0,0,0,$month,$day,$year));
			$this->set('thisday',date('Y年n月j日',mktime(0,0,0,$month,$day,$year)));
			$datas = $this->Source->find('all',array('conditions' => array('date(`Source.created`)' => $thisday),'order' => array('`Source`.`created`' => 'desc')));
			$this->set('datas',$datas);
			$max = $this->getMax($datas);
			$this->set('h_data',$max);
			return;
		}
	}

	public function rank( $year,$month, $day) {
		if(checkdate($month,$day,$year)) {
			$thisday = date('Y-m-d',mktime(0,0,0,$month,$day,$year));
			$this->set('thisday',date('Y年n月j日',mktime(0,0,0,$month,$day,$year)));
			
			$this->set('yesterday',date('Y/n/j',mktime(0,0,0,$month,$day,$year)- 3600*24));
			
			$this->set('tommorow',date('Y/n/j',mktime(0,0,0,$month,$day,$year) +3600*24));
			
			$datas = $this->Source->find('all',array('conditions' => array('date(`Source.created`)' => $thisday),'order' => array('Source.total' => 'desc'),'limit'=>300));
			$this->set('datas',$datas);

			$max = $this->getMax($datas);
			$this->set('h_data',$max);
			
			return;
		}
	}

	public function people(){
		
		$this->set('yesterday',date('Y/n/j',time()- 3600*24));
		
		$toArr = getdate();
		$frArr = getdate($toArr[0] - 3600 * 24);
		$fromDay = date('Y-m-d H:i:s',mktime($frArr['hours'],$frArr['minutes'],$frArr['seconds'],$frArr['mon'],$frArr['mday'],$frArr['year']));
		$toDay = date('Y-m-d H:i:s',mktime($toArr['hours'],$toArr['minutes'],$toArr['seconds'],$toArr['mon'],$toArr['mday'],$toArr['year']));
		$conditions = array('`Source`.`created` BETWEEN ? AND ?' => array($fromDay,$toDay));

		$datas = $this->Source->find('all',array('conditions' => $conditions,'order' => array('Source.total' => 'desc'),'limit' => 300 ));
		$this->set('datas',$datas);

		$max = $this->getMax($datas);
		$this->set('h_data',$max);
		return;
	}

}