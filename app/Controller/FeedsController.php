<?php
App::uses('AppController', 'Controller');
/**
 * Feeds Controller
 *
 * @property Range $Range
 */
class FeedsController extends AppController
{

	var $uses = array('Source', 'Site');

	function index($sourceID)
	{

		$this->Site->unbindModel(array('hasMany' => array('Source')));
		$sites = $this->Site->find('all');
		$this->set('sites', $sites);

		$max = $this->getMaxSites($sites);
		$this->set('s_max', $max);

		/**
		//Get referer set count
		$pattern = '{^https?://([^:/]+)}';
		preg_match($pattern, $this->referer(), $matches);
		$this->set('referer', $matches);

		if ($matches) {
			foreach ($sites as $site) {
				if (strstr($site['Site']['sourceurl'], $matches[0])) {
					$FieldToInc = '`sites`.`count`';
					$this->Site->query("UPDATE `sites` SET " . $FieldToInc . " = " . $FieldToInc . " + 1 WHERE id=" . $site['Site']['id']);
					break;
				}
			}
		}
		*/


		if (is_numeric($sourceID)) {
			$this->set('entryID', $sourceID);

			$datum = $this->Source->findById($sourceID);
			if (!$datum) {
				return;
			}

			$site_id = $datum['Source']['site_id'];
			$this->set('site_name', $datum['Site']['source']);
			$params = array(
				'conditions' => array(
					'Source.site_id' => $site_id,
					'NOT' => array('Source.id' => $sourceID)
				),
				'order' => array('Source.created' => 'desc'),
				'limit' => 50
			);

			$data = $this->Source->find('all', $params);

			$datum = array(0 => $datum);
			$datas = array_merge($datum, $data);

			$this->set('datas', $datas);
			$max = $this->getMax($datas);
			$this->set('hr_data', $max);

			return;
		}
	}
}
