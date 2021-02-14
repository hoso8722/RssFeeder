<?php
App::uses('AppController', 'Controller');
/**
 * Bookmark Controller
 *
 * @property Blog $Blog
 */
class BookmarkController extends AppController {

	var $uses = array('Source','Site');
    	 
	public function index() {
			if(!empty($_COOKIE['set']))
			{
				$cookie = $_COOKIE['set'];
				if(empty($cookie['bookmark']))
				{
					$this->set('datas',array());
					$this->set('h_data',null);
					return;
				}
				$arr = explode('.', $cookie['bookmark']);
				for($i=0,$len=count($arr);$i<$len;$i++)
				{
					if(!is_numeric($arr[$i]))
					{
						$this->set('datas',array());
						$this->set('h_data',null);
						return;	
					}
				}
				$conditions = array('Source.id' => $arr);
				$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.id' => 'DESC'),'limit' => 300 ));
				$this->set('datas',$datas);
	
				$max = $this->getMax($datas);
				$this->set('h_data',$max);
				
			}
				
	}
}
