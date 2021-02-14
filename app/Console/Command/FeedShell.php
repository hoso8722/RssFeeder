<?php
/**
 * AppShell file
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Shell', 'Console');
App::uses('Xml', 'Utility');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Shell
 *
 * Add your application-wide methods in the class below, your shells
 * will inherit them.
 *
 * @package       app.Console.Command
 */
class FeedShell extends AppShell
{
	var $uses = array('Site','Source');
	
	function setRssId()
	{
		$all = $this->args[0];
		
		if(is_numeric($all))
		{
			$total = $this->Site->find('count');
			$div = intval($all / $total);
			if($div < 1)
			{
				$div = 1;	
			}
			
			$this->Site->recursive = -1;
			$order = array('`Site`.`rsscount`' => 'desc');
			$datas = $this->Site->find('all',array('order' => $order));
			
			$rssid = 0;
			
			foreach($datas as $d)
			{
				if($d['Site']['rssid'] < 0){
					
				}
				else{
					$this->Site->read('rssid',$d['Site']['id']);
					$this->Site->set('rssid',$rssid);
					$this->Site->save();
					
					if($rssid >= $all)
					{
						$rssid = 0;
					}
					else{
						$rssid = $rssid + $div;
					}
				}
			}
			$this->Site->unbindModel(array('hasMany' => array('Source')));
			$this->Site->updateAll(
				array(
					'`Site`.`rsscount`' => 0,
					'`Site`.`count`' => 0,
				)
			);
		}		
	}
	
	function getRss()
	{
		
		function scanningRss($rss,$link)
		{
			$i = 0;
			foreach($rss as $d)
			{
				if($d['link'] == $link){
					if($i > 10) $i = 10;
					return $i;
				}
				$i++;
			}
			if($i > 10) $i = 10;
			return $i;
		}
		$num = $this->args[0];
		if(0 <= $num && $num < 300)
		{
			//$num = $this->args[0];
			$this->Site->recursive = 0;
			$datas = $this->Site->findAllByRssid($num);
			
			if(empty($datas)){
				return;
			}
			
			foreach($datas as $d)
			{
				$headers = get_headers($d['Site']['sourcerss']);
				if(strstr($headers[0], '200') || strstr($headers[0],'3'))
				{		
					
					$rss = Xml::build($d['Site']['sourcerss']);
					// XMLオブジェクトを配列に変換
					$rss = xml::toArray($rss);
					
					$conditions = array('`Source`.`site_id`' => $d['Site']['id']);
					$order = array('`Source`.`id`' => 'desc');
					$entry = $this->Source->find('first',array('conditions' => $conditions ,'order' => $order));
					if(empty($entry))
					{
						$this->Site->recursive = 0;
						$entry = $this->Site->find('first',array('conditions' => array('`Site`.`id`' => $d['Site']['id'])));
					}
					
					//initialize valiable
					$siteId = $entry['Site']['id'];
					$categoryId = $entry['Site']['category'];
					$date = date('Y-m-d H:i:s',mktime());
					if(!empty($entry['Source']['link']))
					{
						$link = $entry['Source']['link'];
					}else{
						$link = null;
					}
					//scan count
					if(empty($rss['RDF']['item']))
					{
						$arrRss = $rss['rss']['channel']['item'];
					}
					else{
						$arrRss = $rss['RDF']['item'];
					}
					$count = scanningRss($arrRss,$link);
					
					for($i=$count-1;$i >= 0;$i--)
					{
						if(strstr($arrRss[$i]['title'], 'PR:')) continue;
						$this->Source->create();
						$this->Source->set(array(
							'title' => $arrRss[$i]['title'],
							'link' => $arrRss[$i]['link'],
							'created' => $date,
							'modified' => $date,
							'total' => 0,
							'user_ip' => 0,
							'site_id' => $siteId,
						));
						$this->Source->save();
						$id = $this->Source->getLastInsertId();;  					
						
						$this->Source->query("UPDATE `sources` SET `category_id` = " . $categoryId . " WHERE id=" . $id);  					
						
						$FieldToInc = 'rsscount';
						$this->Source->query("UPDATE `sites` SET " . $FieldToInc . " = " . $FieldToInc . " + 1 WHERE id=" . $siteId);  					
						if($i == 0)
						{
							$this->Site->query("UPDATE `sites` SET `modified` = '".$date. "' WHERE `sites`.`id` = '".$siteId."'");
							/*$this->Site->read('modified',$siteId);
							$this->Site->set('modified',$date);
							$this->Site->save();*/
						}
					}
				}else{
					//Send Mail
					$Email = new CakeEmail();
					$Email->config('gmail');// $contact の設定を使う
					$Email->from(array('jinchangz2@gmail.com' => 'ERROR_MESSAGE'));
					$Email->to('jinchangz1@gmail.com');
					
					$Email->subject('Failed RSS');
					$Email->send('rss='.$d['Site']['sourcerss'].'&id='.$d['Site']['id']);	
					
				}
			}
		}	
	}
	
	function resetCount()
	{
		$this->Site->unbindModel(array('hasMany' => array('Source')));
		$this->Site->updateAll(
			array('`Site`.`count`' => 0)
		);
	}
}
