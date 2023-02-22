<?php
APP::import('vendor','include_path_vendors');
APP::import('vendor','Pager/Pager');
class PagerComponent extends Object
{
	var $controller = null;

	function startup(&$controller)
	{
		$this->controller = $controller;
	}

	function _pager($site_id,$currentPage,$sort)
	{
		$perPage = 2;
		$model = ClassRegistry::init('Source');
		$count = $model->find('count',array('conditions'=>array('Source.site_id' => $site_id)));
		if(empty($count)) {
				
			return;
		}
		$this->controller->set("count",$count);
		switch($sort) {
			case "ca":
				$order = array("Source.created asc");
				break;
			case "ma":
				$order = array("Source.modified asc");
				break;
			case "md":
				$order = array("Source.modified desc");
				break;
			case "ta":
				$order = array("Source.total asc");
				break;
			case "td":
				$order = array("Source.total desc");
				break;
			default:
				$order = array("Source.created desc");
				break;
		}
		$this->controller->set("sort",$sort);

		$path = sprintf("/%s/%s/%s/%s/%%d",$this->controller->params['controller'],$this->controller->params['action'],$site_id,$currentPage,$sort);
		$baseOptions = array(
							'mode' => 'Sliding',
							'append' => false,
							'fileName' => $path,
							'currentPage' => $currentPage,
							'perPage' => $perPage,
							'totalItems' => $count
		);
		$options = array();
		$options = am($baseOptions, $options);
		$pager = Pager::factory($options);

		$data = $model->find('all',array(
									'conditions'=>array('Source.site_id' => $site_id),
									'order' => $order,
									'limit' => $perPage,
									'page' => $pager->_currentPage
		)
		);
		$this->controller->set('data',$data);
		$this->controller->set('site',$data[0]['Source']['source']);
		$this->controller->set('site_id',$site_id);

		//		$links = $pager->getLinks();
		//		$this->controller->set('links',$links);
		$this->controller->set('offset',$pager->_currentPage);

		$page = ceil($count / $perPage);
		$this->controller->set('page',$page);

	}
}
