<?php
class HelloShell extends AppShell {
    public function main() {
	$cmd = 'date >> ~/.date';
	echo exec($cmd);
    }
}
?>
