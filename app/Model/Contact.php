<?php
App::uses('AppModel', 'Model');

/**
 * Rank Model
 *
 */
class Contact extends AppModel
{
    // テーブル使わない
    public $useTable = false;
    // バリデーションルール
    public $validate = array(
	    'email' => array(
	    	array('rule' => 'email', 'required' => true,'message' => 'メールアドレスを正しく入力して下さい。')
	    ),
	    'body' => array(
	    	array('rule' => 'notEmpty','required' => true, 'message' => '本文が入力されていません。')
    	),
	    'url' => array(
	    	array('rule' => 'url', 'allowEmpty' => true,'message' => 'サイトURLを正しく入力して下さい。')
    	),
    	'rss' => array(
	    	array('rule' => 'url', 'allowEmpty' => true,'message' => 'サイトRSSを正しく入力して下さい。')
    	)
    );
}