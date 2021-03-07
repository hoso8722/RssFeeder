<?php 
	echo $this->Html->script('debug/jquery-1.7.2.js');
	// echo $this->Html->script('bootstrap.js'); 
	// echo $this->Html->script('bootstrap-datepicker.js'); 
	// echo $this->Html->script('Cookie.js'); 
	// echo $this->Html->script('jquery.dataTables.js'); 
	// echo $this->Html->script('jquery.powertip-1.1.0.js'); 
	// echo $this->Html->script('DT_bootstrap.js'); 

		echo $this->Html->script('all.org.js');
		// echo $this->Html->script('static.js');

	// echo $this->Html->script('combine.min.js'); 
?>

<script type="text/javascript">
initCookie('set[chTable]','<?php echo join(".",$chTable); ?>');

//google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42251706-1', '2chmatomeru.info');
ga('send', 'pageview');

</script>	
