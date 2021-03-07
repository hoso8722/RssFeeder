<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 */
class ContactController extends AppController
{


	public $uses = array('Contact');

	public function index()
	{
		$this->redirect(['controller' => 'sites', 'action' => 'index']);
		if ($this->request->is('post') || $this->request->is('pust')) {
			$this->Contact->set($this->request->data);
			if ($this->Contact->Validates()) {
				$vars = $this->request->data['Contact'];
				$email = new CakeEmail();
				// 送信設定
				$email->config('gmail') // $contact の設定を使う
					// 送信元
					->from(array($this->request->data['Contact']['email'] => '○○お問い合わせ'))
					// 送信先
					// ->to()
					// BCC, お問い合わせした人にもコピーを送りたい時とか
					//->bcc($this->request->data['Contact']['email'])
					// テンプレート変数設定
					->viewVars($vars)
					// 使用するテンプレートの設定, 本文の方 contact, レイアウト contact
					->template('contact', 'contact')
					// メール件名
					->subject('お問い合わせ');

				// 送信
				// 送信したメールのヘッダーとメッセージを配列で返します
				if ($email->send()) {
					$this->Session->setFlash('問い合わせが完了しました。');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('問い合わせに失敗しました。');
				}
			}
		}
	}

	public function info()
	{
		$Email = new CakeEmail();
		$Email->from(array('me@example.com' => 'My Site'));
		$Email->to('you@example.com');
		$Email->subject('About');
		$Email->send('My message');
	}
}
