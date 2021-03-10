<?php
App::uses('AppController', 'Controller');
/**
 * Rss Controller
 *
 * @property Rss $Rss
 */
class EntriesController extends AppController {

	var $uses = array('Source','Site');

	public $components = array('RequestHandler');

	public function index()
	{
		$this->Source->recursive = -1;
		$datas = $this->Source->find('all',array('order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function trand()
	{
		$toArr = getdate();
		$frArr = getdate($toArr[0] - 3600 * 24);
		$fromDay = date('Y-m-d H:i:s',mktime($frArr['hours'],$frArr['minutes'],$frArr['seconds'],$frArr['mon'],$frArr['mday'],$frArr['year']));
		$toDay = date('Y-m-d H:i:s',mktime($toArr['hours'],$toArr['minutes'],$toArr['seconds'],$toArr['mon'],$toArr['mday'],$toArr['year']));
		$conditions = array('`Source`.`created` BETWEEN ? AND ?' => array($fromDay,$toDay));
		
		$this->Source->recursive = -1;
		$datas = $this->Source->find('all',array('conditions' => $conditions,'order' => array('Source.total' => 'desc'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function vip()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 1);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function news()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 2);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function enter()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 3);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function sports()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 4);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function anime()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 5);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function game()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 6);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function r18()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 7);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function other()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 0);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function hobby()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 8);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	public function life()
	{
		$this->Source->recursive = 0;
		$conditions = array('Source.category_id' => 9);
		$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 10 ));
		$this->set('entries',$datas);
	}
	
}
