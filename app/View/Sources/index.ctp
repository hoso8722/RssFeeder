<div class="span12">
Test
<?php 
echo '<p>count:',$count,'</p>';
echo '<p>siteId:',$siteId,'</p>';
echo '<p>categoryId:',$categoryId,'</p>';
echo '<p>date:',$date,'</p>';


foreach($datas[0]['Site'] as $d){
	echo '<p>',$d,'</p>';
}
pr($rss);
foreach($rss as $rs){
	foreach($rs as $r){
		echo '<p>',$r,'</p>';
	}
}
?>
</div>
