<?php
	/**
	 * Application level Controller
	 *
	 * This file is application-wide controller file. You can put all
	 * application-wide controller-related methods here.
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
	 * @package       app.Controller
	 * @since         CakePHP(tm) v 0.2.9
	 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
	 */

	App::uses('Controller', 'Controller');

	/**
	 * Application Controller
	 *
	 * Add your application-wide methods in the class below, your controllers
	 * will inherit them.
	 *
	 * @package       app.Controller
	 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
	 */
	class AppController extends Controller
	{

		public $helpers = array('Html', 'Js');

		var $uses = array('Source', 'Site', 'Ad');

		public function getMax($array)
		{
			$max = 0;
			for ($i = 0, $len = count($array); $i < $len; $i++) {
				if ($max < $array[$i]['Source']['total']) {
					$max = $array[$i]['Source']['total'];
				}
			}
			if ($max == 0) $max = 1;
			return $max;
		}
		public function getMaxSites($array)
		{
			$max = 0;
			for ($i = 0, $len = count($array); $i < $len; $i++) {
				if ($max < $array[$i]['Site']['count']) {
					$max = $array[$i]['Site']['count'];
				}
			}
			if ($max == 0) $max = 1;
			return $max;
		}
		protected function initCookie($sw)
		{

			//Set User setting
			if (!empty($_COOKIE['set'])) {
				$cookieSet = $_COOKIE['set'];
				switch ($sw) {
					case 0:
						if (isset($cookieSet['top'])) {
							switch ($cookieSet['top']) {
								case 0:
									$top = 0;
									break;
								case 1:
									$top = 1;
									break;
								case 2:
									$top = 2;
									break;
								default:
									$top = 0;
							}
						} else {
							$top = 0;
						}
						return $top;
						break;
					case 1:
						if (isset($cookieSet['last'])) {
							switch ($cookieSet['last']) {
								case 0:
									$lastNum = 50;
									break;
								case 1:
									$lastNum = 100;
									break;
								case 2:
									$lastNum = 150;
									break;
								case 3:
									$lastNum = 200;
									break;
								case 4:
									$lastNum = 250;
									break;
								case 5:
									$lastNum = 300;
									break;
								default:
									$lastNum = 100;
							}
						} else {
							$lastNum = 100;
						}
						return $lastNum;
						break;
					case 2:
						if (isset($cookieSet['trand'])) {
							switch ($cookieSet['trand']) {
								case 0:
									$trandNum = 50;
									break;
								case 1:
									$trandNum = 100;
									break;
								case 2:
									$trandNum = 150;
									break;
								case 3:
									$trandNum = 200;
									break;
								case 4:
									$trandNum = 250;
									break;
								case 5:
									$trandNum = 300;
									break;
								default:
									$trandNum = 100;
							}
						} else {
							$trandNum = 100;
						}
						return $trandNum;
						break;
					case 3:
						if (isset($cookieSet['disprss'])) {
							switch ($cookieSet['disprss']) {
								case 0:
									$disprss = 2;
									break;
								case 1:
									$disprss = 4;
									break;
								case 2:
									$disprss = 6;
									break;
								case 3:
									$disprss = 8;
									break;
								case 4:
									$disprss = 10;
									break;
								case 5:
									$disprss = 15;
									break;
								case 6:
									$disprss = 20;
									break;
								case 7:
									$disprss = 25;
									break;
								case 8:
									$disprss = 30;
									break;
								default:
									$disprss = 4;
							}
						} else {
							$disprss = 4;
						}
						return $disprss;
						break;
					case 4:
						if (isset($cookieSet['ocmenu'])) {
							switch ($cookieSet['ocmenu']) {
								case 0:
									$ocmenu = 0;
									break;
								case 1:
									$ocmenu = 1;
									break;
								default:
									$ocmenu = 1;
							}
						} else {
							$ocmenu = 1;
						}
						return $ocmenu;
						break;
				}
			}
		}
		public function beforeFilter()
		{
			$this->set('disprss', $this->initCookie(3));
			$this->set('top', $this->initCookie(0));
			$this->set('ocmenu', $this->initCookie(4));
			if (isset($_COOKIE['set'])) {
				$arr = $_COOKIE['set'];
			} else {
				$arr = array();
			}
			if (empty($arr['chTable'])) {
				//PC　or SP 振り分け
				$ua = $_SERVER['HTTP_USER_AGENT'];
				if ((strpos($ua, 'iPhone') !== false) //iphoneか、
					|| ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)) //またはAndroidMobile端末、
					|| (strpos($ua, 'Windows Phone') !== false)
					|| (strpos($ua, 'BlackBerry') !== false)
				) {
					//SP 
					$str = null;
					$str = '0.0.0.0.1.3.1';
					$arrTable = explode('.', $str);
					$this->set('chTable', $arrTable);
				} else {
					//PC
					$str = null;
					$str = '1.1.1.1.1.3.1';
					$arrTable = explode('.', $str);
					$this->set('chTable', $arrTable);
				}
			} else {
				$arrTable = explode('.', $arr['chTable']);
				$this->set('chTable', $arrTable);
			}

			if (!empty($_COOKIE['set'])) {
				$this->set('set', $_COOKIE['set']);
			}
		}
	}
