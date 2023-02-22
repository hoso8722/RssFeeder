<?php
App::uses('AppModel', 'Model');
/**
 * Daily Model
 *
 */
class Daily extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Source';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'site_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
