<?php
App::uses('AppController', 'Controller');
/**
 * Ranges Controller
 *
 * @property Range $Range
 */
class RangesController extends AppController {

	var $uses = array('Source','Site');

	function index($fromY,$fromM,$fromD,$toY,$toM,$toD){

		if(checkdate($fromM,$fromD,$fromY) && checkdate($toM,$toD,$toY)) {
			$fromDay = date('Y-m-d',mktime(0,0,0,$fromM,$fromD,$fromY));
			$toDay = date('Y-m-d',mktime(0,0,0,$toM,$toD,$toY));
				
			$this->set('fromDay',date('Y/n/j',mktime(0,0,0,$fromM,$fromD,$fromY)));
			$this->set('toDay',date('Y/n/j',mktime(0,0,0,$toM,$toD,$toY)));
				
			$conditions = array(
				'`Source`.`created` BETWEEN ? AND ?' => array(
					$fromDay,$toDay
				)
			);
			$this->paginate = array(
		    	'Source' => array(
		    		'conditions' => $conditions,
		    		'order' => array('Source.created' => 'desc'),
		    		'limit' => 100
				)
			);
			$datas = $this->paginate('Source');
			$this->set('datas',$datas);
			$max = $this->getMax($datas);
			$this->set('h_data',$max);

			return;
		}
	}
	function rank($fromY,$fromM,$fromD,$toY,$toM,$toD){

		if(checkdate($fromM,$fromD,$fromY) && checkdate($toM,$toD,$toY)) {
			$fromDay = date('Y-m-d',mktime(0,0,0,$fromM,$fromD,$fromY));
			$toDay = date('Y-m-d',mktime(0,0,0,$toM,$toD,$toY));
				
			$this->set('fromDay',date('Y/n/j',mktime(0,0,0,$fromM,$fromD,$fromY)));
			$this->set('toDay',date('Y/n/j',mktime(0,0,0,$toM,$toD,$toY)));
				
			$conditions = array('`Source`.`created` BETWEEN ? AND ?' => array($fromDay,$toDay));
			$datas = $this->Source->find('all',array('conditions' => $conditions,'order' => array('Source.total' => 'desc'),'limit' => 300));
			$this->set('datas',$datas);
			$max = $this->getMax($datas);
			$this->set('h_data',$max);
			return;
		}
	}

}
