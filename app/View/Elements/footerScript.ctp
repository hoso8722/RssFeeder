<?php echo $this->Html->script('jquery-1.7.2.min.js'); ?>  
<?php echo $this->Html->script('all.min.js'); ?>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
initCookie('set[chTable]','<?php echo join(".",$chTable); ?>');
//Google feed API
<?php if(!empty($sites)){ ?>
google.load("feeds", "1");
	<?php if(!empty($set['feeds']) || !empty($set['rssList'])) { ?>
	var FA = new Array
	( 
	<?php 
		$str = $set['feeds'];
		$arr = explode(':',$str);
		$arrFeed = array();
		for($i=0,$j=0,$len=count($arr);$i < $len;$i++)
		{
			if(empty($arr[$i]))
			{
				continue;
			}elseif(is_numeric($arr[$i])){
				$arrFeed[$j] = $arr[$i];
				$j++;
			}
		}
		$i = 0;
		foreach($sites as $site) 
		{
			if($i >= 50) break;	
			if(in_array($site['Site']['id'],$arrFeed))
			{
				echo '"'.$site['Site']['sourcerss'].'",';
				$i++;
			}
		}
		$str = $set['rssList'];
		$arr = array();
		$arr = explode('	',$str);
		if(count($arr) > 0){
			foreach($arr as $a){
				echo '"'.$a.'",';
			}
		}
	?>
	""
	);
	
	<?php }else{ 	?>
		var FA = new Array
		( 
			<?php $i=0; foreach($sites as $site) {
					if($i >= 10) break;
					echo '"'.$site['Site']['sourcerss'].'",';
					$i++;
			 } //foreach?>
			 ""
		);
	
<?php }
} //endif ?>
function dateFormat(num){
	str = num.toString();
	if(str.length == 1)
	{
		str = '0'+str;
		return str;
	}
	return str;
}
function initialize() 
{
	$('#RssFeed').html("<div id='loading'></div>").children('#loading').show();;
	 var feedsArr = new Array();
	 var numEntr = <?php if(!$disprss) $disprss = 4; echo h($disprss);?>;
	 var container = document.getElementById("feed");
	 var cnt = FA.length;
	 for (var k=0; k<FA.length; k++) 
	 {
	  var feed = new google.feeds.Feed(FA[k]);
	  feed.setNumEntries(numEntr);
	  feed.includeHistoricalEntries();
	  feed.setResultFormat(google.feeds.Feed.JSON_FORMAT); //JSONフォーマットに整形
	  feed.load(function(result) {
		  if (!result.error) 
		  {
		   for (var i = 0; i < result.feed.entries.length; i++) 
		   {
		    var entry = result.feed.entries[i];
			var attributes = ["title", "link", "publishedDate", "contentSnippet"];
			var ind = feedsArr.length;
			 feedsArr[ind] = new Array();
			 feedsArr[ind][0] = Date.parse(entry[attributes[2]]); // 日付でソート（並び替え）
			 feedsArr[ind][1] = entry[attributes[1]]; // link
				var pubDD = new Date(entry[attributes[2]]);
			    mm = dateFormat(pubDD.getMonth() + 1);
			    dd = dateFormat(pubDD.getDate());
			    hours = dateFormat(pubDD.getHours());
			    minutes = dateFormat(pubDD.getMinutes());
			    var pubDate = mm +'/'+ dd +' ' + hours +':'+ minutes;
			 feedsArr[ind][2] = pubDate; // publishedDate
			 feedsArr[ind][3] = entry[attributes[3]]; // contentSnippet
			 feedsArr[ind][4] = entry[attributes[0]]; // title
			 feedsArr[ind][5] = result.feed.title; // site title
			 feedsArr[ind][6] = result.feed.link; // site link
		  }
	 	}
	 	cnt--;
		 if (cnt == 0) 
		 {
			 feedsArr.sort();
			 feedsArr.reverse();
			 $('#feed').html('');
			 $('#RssFeed').html('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>登録RSSの使い方</strong><br>「ブログ一覧/設定」で登録したRSSを更新時間順に表示します。<br>初期設定では人気ブログ10サイトを4件ずつ取得して表示します。</div><table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="tableRss"><thead><tr role="row"><th id="thDate" class="nosort" style="width:10%;">日時</th><th class="nosort" style="width: 70%;">タイトル</th><th id="thBlog" class="nosort" style="width: 20%;">ブログ</th></tr></thead><tbody id="feed"></tbody></table><a href="#"><i class=\'icon-upload\'></i>ページ上部へ</a>');
			 for (var j = 0; j < feedsArr.length; j++) 
			 {
			 	var str = feedsArr[j][4];
			 	if(str.match(/^PR:/i)) {continue;}
			 	$("#feed").append('<tr></tr>');
			 	$("#feed tr:last-child").append('<td class="tdDate"></td><td class="tdLink"></td><td class="tdBlog"></td>');
			 	$("#feed tr:last-child > td:first-child").text(feedsArr[j][2]);
			 	$("#feed tr:last-child > td:eq(1)").append('<a></a>');
			 	$("#feed tr:last-child > td:eq(1) > a").attr('href',feedsArr[j][1]).attr("target","_blank").text(feedsArr[j][4]);
			 	$("#feed tr:last-child > td:last-child").append('<a></a>');
			 	$("#feed tr:last-child > td:last-child > a").attr('href',feedsArr[j][6]).attr("target","_blank").text(feedsArr[j][5]);
			 	
			 }
			 var cMgr = new H_CookieManager();
			 var str = cMgr.getCookie('set[chTable]');
			 var arr = str.split('.');
			 if(arr[0] == 0) $('#tableRss th#thDate,#tableRss td.tdDate').addClass('hide');
			 if(arr[3] == 0) $('#tableRss th#thBlog,#feed td.tdBlog').addClass('hide');		 
			 if(arr[4] == 1) $('#feed tr td.tdLink a').addClass('ofoff');			 
			 if(arr[6] == 1) {
				$('#feed tr').each(function(n){	
					$('#feed td.tdLink:eq('+n+')').append("<span class='spBlog'>" + this.children[2].children[0].innerHTML +"</span>");
				});
			 }
			 $("#feed tr:even").addClass("odd");
			 $("#feed tr:odd").addClass("even");
		 }
	 });
 	} //--end for
}//--end initialize
//--rssfeed load
$(function() {
	$("#rss").one("click",function() 
	{
		initialize();		
	})
	if($('#rss').hasClass('active'))
	{
		$('#rss').click();
	}	
	//RssFeedback setting
	<?php if(empty($entryID)) $entryID=0;?>
	$('#entry_<?php echo $entryID;?>').attr('style','background-color:rgb(161, 219, 215);');
});

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42251706-1', '2chmatomeru.info');
  ga('send', 'pageview');

</script>	
