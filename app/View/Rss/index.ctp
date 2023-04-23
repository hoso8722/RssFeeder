<div class="span9" >
<ul id="myTab" class="nav nav-tabs">
<li class="active"><a href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>RSS配信一覧</p></a></li>
</ul>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>RSS配信について</strong><br>
	RSS配信できるようになったのでお使いください。
</div>
<table style="width:240px;" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
<tbody>
<tr><td><?php echo $this->Html->link('新着記事10件', '/entries/index.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('注目記事10件', '/entries/trand.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('VIPカテゴリ10件', '/entries/vip.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('ニュースカテゴリ10件', '/entries/news.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('エンタメカテゴリ10件', '/entries/enter.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('スポーツカテゴリ10件', '/entries/sports.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('漫画・アニメカテゴリ10件', '/entries/anime.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('ゲームカテゴリ10件', '/entries/game.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('Vtuberカテゴリ10件', '/entries/vtuber.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('趣味カテゴリ10件', '/entries/hobby.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('生活カテゴリ10件', '/entries/life.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('アダルトカテゴリ10件', '/entries/r18.rss'); ?></td></tr>
<tr><td><?php echo $this->Html->link('その他カテゴリ10件', '/entries/other.rss'); ?></td></tr>
</tbody>
</table>
</div>
