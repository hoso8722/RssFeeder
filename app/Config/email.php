<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
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
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your send email details.
 *
 * @package       cake.config
 */
/**
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail 		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email.  Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $contact = array(
		'transport' => 'Mail',
		//'from' => 'you@localhost',
		'to' => 'jinchangz1@gmail.com',
		'charset' => 'ISO-2022-JP',
		'headerCharset' => 'ISO-2022-JP',
	);
    public $gmail = array(
        'host' => 'tls://smtp.gmail.com',
        'port' => 465,
        'username' => 'jinchangz2@gmail.com',
        'password' => 'h802165m',
        'transport' => 'Smtp',
		//'from' => array('2ch.matomemo.net@localhost' => 'My Site'),
		'to' => 'jinchangz1@gmail.com',
		//'timeout' => 60,
		'client' => null,
		'log' => false,
		//'charset' => 'ISO-2022-JP',
		//'headerCharset' => 'ISO-2022-JP'
        
    );
	public $smtp = array(
		'transport' => 'Smtp',
		//'from' => array('2ch.matomemo.net@localhost' => 'My Site'),
		'to' => 'hosokawa@m.gmobb.jp',
		'host' => 'smtp.gmobb.jp',
		'port' => 587,
		//'timeout' => 60,
		'username' => 'hosokawa@m.gmobb.jp',
		'password' => 'FrT4kff2',
		'client' => null,
		'log' => false,
		'charset' => 'ISO-2022-JP',
		'headerCharset' => 'ISO-2022-JP'
	);

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
