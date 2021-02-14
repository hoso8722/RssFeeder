<?php
App::uses('AppController', 'Controller');
/**
 * Feeds Controller
 *
 * @property Range $Range
 */
class FeedsController extends AppController {

	var $uses = array('Source','Site');

	function index($toNum)
	{
		$this->Site->unbindModel(array('hasMany' => array('Source')));
		$sites = $this->Site->find('all');
		$this->set('sites',$sites);
		
		$max = $this->getMaxSites($sites);
		$this->set('s_max',$max);
		
		//Get referer set count
		$pattern = '{^https?://([^:/]+)}';
		preg_match($pattern,$this->referer(),$matches);
		$this->set('referer',$matches);

		if($matches)
		{
			foreach($sites as $site)
			{
				if(strstr($site['Site']['sourceurl'],$matches[0]))
				{
					$FieldToInc = '`sites`.`count`';
					$this->Site->query("UPDATE `sites` SET " . $FieldToInc . " = " . $FieldToInc . " + 1 WHERE id=" . $site['Site']['id']);
					break;
				}
			}			
		}
		

		if(is_numeric($toNum)) {
			$this->set('entryID',$toNum);
			mt_srand();
			$fromNum = $toNum - mt_rand(15,25);
			mt_srand();
			$toNum += mt_rand(15,25);
			$conditions = array('`Source`.`id` BETWEEN ? AND ?' => array($fromNum,$toNum));
			$datas = $this->Source->find('all',array('conditions' => $conditions,'order' => array('Source.created' => 'desc'),'limit' => 50 ));
			
			$this->set('datas',$datas);
			$max = $this->getMax($datas);
			$this->set('h_data',$max);

			return;
		}
	}
}
