<?php
App::uses('AppController', 'Controller');
/**
 * Blog Controller
 *
 * @property Blog $Blog
 */
class BlogController extends AppController {

	var $uses = array('Source','Site');
	public $components = array('Paginator');
    	 
	public function index($num) {

		if(is_numeric(intval($num))){

			$this->paginate = array(

	    		'conditions' => array('`Source`.`site_id`' => $num),
	    		'order' => array('Source.created' => 'desc'),
	    		'limit' => 100
			
			);
			
			$datas = $this->paginate('Source');
			$this->set('datas',$datas);
			$max = $this->getMax($datas);
			$this->set('h_data',$max);
			$this->set('blog',$datas[0]['Site']['source']);

			return;
			
		}
	}
}
