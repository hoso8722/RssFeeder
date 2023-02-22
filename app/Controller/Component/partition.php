<?php
App::import('Vendor', 'pager', array('file' => 'Pager/Pager.php'));
class PartitionComponent extends Object
{
	var $controller = null;

	function initialize(&$controller) {
		// saving the controller reference for later use
		$this->controller =& $controller;
	}

	function _pager($site_id,$currentPage,$sort)
	{
		$perPage = 100;
		$model = ClassRegistry::init('Source');
		$count = $model->find('count',array('conditions'=>array('Source.site_id' => $site_id)));
		if(empty($count)) {
				
			return;
		}
		$this->controller->set("count",$count);
		switch($sort) {
			case "cd":
				$order = array("Source.created desc");
				break;
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
	function _mainpager($type,$currentPage)
	{
		$perPage = 50;
		$model = ClassRegistry::init('Source');
		switch($type) {
			case "1":
				$order = array("Source.created desc");
				break;
			case "2":
				$order = array("Source.today desc");
				break;
			case "3":
				$order = array("Source.week desc");
				break;
			case "4":
				$order = array("Source.month desc");
				break;
			case "5":
				$order = array("Source.total desc");
				break;
			case "6":
				$order = "rand";
				break;
			default:
				$order = array("Source.created desc");
				break;
		}

		$path = sprintf("/%s/%s/%s/%s/%%d",$this->controller->params['controller'],$this->controller->params['action'],$type,$currentPage);
		$baseOptions = array(
							'mode' => 'Sliding',
							'append' => false,
							'fileName' => $path,
							'currentPage' => $currentPage,
							'perPage' => $perPage,
							'totalItems' => 250
		);
		$options = array();
		$options = am($baseOptions, $options);
		$pager = Pager::factory($options);
		if($order != 'rand') {
			$data = $model->find('all',array(
										'order' => $order,
										'limit' => $perPage,
										'page' => $pager->_currentPage
			)
			);
		} else {
			$data = $model->query("SELECT * FROM sources as Source ORDER BY RAND() LIMIT 50");
		}
		$this->controller->set('data',$data);
		$this->controller->set('type',$type);

		$this->controller->set('offset',$pager->_currentPage);


	}


}
