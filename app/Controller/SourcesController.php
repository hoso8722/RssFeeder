<?php
App::uses('AppController', 'Controller');

/**
 * Sources Controller
 *
 * @property Source $Source
 */
class SourcesController extends AppController {

	var $uses = array('Site','Source');
	
	public function headers($num)
	{
		$this->Site->recursive = 0;
		$datas = $this->Site->findAllById($num);
		$i = 0;
		$arr = array();
		foreach($datas as $d)
		{
			$headers = get_headers($d['Site']['sourcerss']);
			$arr[$i] = $headers[0];
			$i++;
		}
		$this->set('headers',$arr);
	}
	
	public function index($num)
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
		//$num = 0;
		//file_put_contents('/home/jinchangz/cron/getRss.txt','success');		
		if(0 <= $num && $num <=60)
		{
			//$num = $this->args[0];
			$this->Site->recursive = 0;
			$datas = $this->Site->findAllByRssid($num);
			
			foreach($datas as $d)
			{
				$headers = get_headers($d['Site']['sourcerss']);
				if(strstr($headers[0], '200') || strstr($headers[0],'301'))
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
						
					}
				}
				else{
					
				}
				
			}
			
		}
		
		
		
		$this->set('datas',$datas);
		$this->set('rss',$arrRss);
		$this->set('count',$count);
		$this->set('siteId',$siteId);
		$this->set('categoryId',$categoryId);
		$this->set('date',$date);
	}
	public function setRssId($num)
	{
		$num = intval($num);
		if(is_int($num) && 1<=$num && $num<= 60)
		{
			$total = $this->Site->find('count');
			$num = intval($total / $num);
			$this->set('num',$num);
			$this->set('total',$total);
			
			$this->Site->recursive = -1;
			$order = array('`Site`.`rsscount`' => 'desc');
			$datas = $this->Site->find('all',array('order' => $order));
			$this->set('datas',$datas);
			
			if($num >= 0)
			{
				$div = $num + 1;
				$rssid = 1;
				$count = 1;
				foreach($datas as $d)
				{
					$this->Site->read('rssid',$d['Site']['id']);
					$this->Site->set('rssid',$rssid);
					$this->Site->save();
					
					if(($count%$div) == 0)
					{
						$rssid++;
						$count = 1;
					}else{
						$count++;
					}
				}
				
			}
		}
	}
	
	public function updateCategoryId($num)
	{
		if(is_numeric($num))
		{
			$this->Site->recursive = 0;
			$datas = $this->Site->findAllByCategory($num);
			$FieldToInc = 'category_id';
			foreach($datas as $d)
			{
				$categoryId = $d['Site']['category'];
				$this->Source->query("UPDATE `sources` SET `category_id`= " . $categoryId . " WHERE site_id=" . $d['Site']['id']);
			}
		}
		$this->set('datas',$datas);
	}
	
	public function resetCount()
	{
		$this->Site->unbindModel(array('hasMany' => array('Source')));
		$this->Site->updateAll(
			array('`Site`.`count`' => 0)
		);
	}
	
}
