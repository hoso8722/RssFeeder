<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
*Forms Controller
*
*@property Form $Form
*/
class FormsController extends AppController {

	var $uses = array('Source','Site');

	public function search(){
		$this->modelClass = null;
		if ($this->request->data){
			$result = Sanitize::stripAll($this->request->data['searchValue']);
			$this->redirect('/searchs/index/'.$result);
		} else {
			$this->redirect('/');
		}
		return;
	}

	public function date(){
		$this->modelClass = null;
		if ($this->request->data){
			$result = Sanitize::stripAll($this->request->data['dateValue']);
			$dates = explode("/",$result);
			if(checkdate($dates[1],$dates[2],$dates[0]) && count($dates) == 3){
				$this->redirect('/dailys/index/'.$result);
			}
			$this->redirect('/searchs/index/'.$result);
		} else {
			$this->redirect('/');
		}
		$this->set("result", $result);
		return;
	}
}