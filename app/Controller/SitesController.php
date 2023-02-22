<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
 * @property Site $Site
 */
class SitesController extends AppController {

	var $uses = array('Source','Site');


	//	var $cacheAction = array('archives/' => '300');

	public function index()
	{
		$this->Site->unbindModel(array('hasMany' => array('Source')));
		$sites = $this->Site->find('all');
		$this->set('sites',$sites);
		
		$max = $this->getMaxSites($sites);
		$this->set('s_max',$max);
				
	}

}
