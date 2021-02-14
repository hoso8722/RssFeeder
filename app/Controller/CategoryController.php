<?php
App::uses('AppController', 'Controller');
/**
 * Category Controller
 *
 * @property Category $Category
 */
class CategoryController extends AppController {

	var $uses = array('Source','Site');
	 
	public function index($num) {

		if(is_numeric($num)){
			$conditions = array('Source.category_id' => $num);
			$datas = $this->Source->find('all',array('conditions' => $conditions ,'order' => array('Source.created' => 'DESC'),'limit' => 100 ));
			$this->set('datas',$datas);

			$max = $this->getMax($datas);
			$this->set('max',$max);
			$this->set('h_data',$max);

			$this->set('cid',$num);

		}

	}
}
