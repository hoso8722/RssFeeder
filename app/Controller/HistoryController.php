<?php

App::uses('AppController', 'Controller');

class HistoryController extends AppController
{
    public $components = array('Cookie');

    public $uses = array('Source', 'Site');

    public function table()
    {
        // HTMLを描画しないようにする
        $this->autoRender = false;
        // cookie の有無確認

        // Ajax通信でこのアクションが実行された時だけ処理を行う
        if ($this->request->is('ajax')) {
            // 送られてきたリクエストデータを取得する
            // $str = $this->request->data['histories'];
            // var_dump($str);

            $this->Cookie->name = '2chmatomeru';
            $encrypt = false;
            $expires = '1 month';
            $key = 'histories';
            if ($this->Cookie->check($key) === false) {
                $this->set('datas', array());
                $this->_render();
                return;
            }
            $max = 100;
            $strings = $this->Cookie->read($key);
            $histories = explode('d', $strings, $max + 1);
            foreach ($histories as $i => $v) {
                if (is_numeric($v) and $i < $max) {
                    continue;
                } else if ($i === $max) {
                    array_pop($histories);
                } else {
                    $this->set('datas', array());
                    $this->_render();
                    return;
                }
            }
            // $this->set('str', 'success2');

            // 必要な処理を実装していく
            $params = array(
                'conditions' => array('Source.id' => $histories),
                'order' => 'FIELD(Source.id, ' . implode(',', $histories) . ') DESC',
                'limit' => 100
            );
            //debug($this->Source->sql());
            $datas = $this->Source->find('all', $params);
            $this->set('datas', $datas);

            // 戻り値を返却する
            $this->_render();
            return;
        }
    }

    private function _render()
    {
        $this->layout = 'ajax';
        $this->render('/History/table');
        return;
    }
}
