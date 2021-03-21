<script type="text/javascript">
	var global_chTable = '<?php echo join(".", $chTable); ?>';
</script>

<?php
// if (!env('HTTP_HOST') == 'localhost') {
echo $this->Html->script('jquery-1.7.2.js');
echo $this->Html->script('all.js');
echo $this->Html->script('static.js');
// } else {
// 	echo $this->Html->script('combine.min.js');
// }
?>

<script type="text/javascript">
	//initialize set[chTable]
	initCookie('set[chTable]', global_chTable);

	$('#getHistory').click(function() {
		// URLを生成する
		var url = "<?= $this->Html->url(array('controller' => 'history', 'action' => 'table')) ?>";
		// Ajaxの処理を呼び出す
		execAjax(url);
	});

	//google Analytics
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-42251706-1', '2chmatomeru.info');
	ga('send', 'pageview');
</script>