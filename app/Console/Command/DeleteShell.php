<?php
class DeleteShell extends AppShell {

	var $uses = array('Site');
	public function main() {
		$this->Site->deleteAll(array(
			'Site.source' => '',
			'Site.sourceurl' => '',
			'Site.sourcerss' => '',
			'Site.count' => 1,
			'Site.category' => 0,
			'Site.rssid' => 0,
			'Site.rsscount' => 0,
		), false);
    	}
}
?>
