<!DOCTYPE html>
<html lang="en">
<?php
$detect = new Mobile_Detect;
if($detect->isMobile()){
    echo '<!-- Mobile device -->';
}else{
    echo '<!-- PC device -->';
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>２ちゃんねるまとめるまとめ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="２ちゃんねるまとめサイトの更新情報をお知らせするアンテナサイトです。">
    <meta name="keywords" content="2ch,２ちゃんねる,まとめ,アンテナ,２ちゃんねるまとめ,2chまとめ" />
    <meta name="copyright" content="Copyright (C) ２ちゃんねるまとめるまとめ" />
    <meta name="author" content="２ちゃんねるまとめるまとめ">
    <link rel="alternate" type="application/rss+xml" title="RSS2.0" href="https://2chmatomeru.info/entries/index.rss" />
    <!-- Le styles -->
    <?php echo $this->Html->css('all.min.css'); ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script>
    /*@cc_on 
    var doc = document;
    eval('var document = doc');
    @*/
    </script>
    <![endif]-->
    <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <script type="text/javascript">
        var nend_params = {
            "media": 8705,
            "site": 48315,
            "spot": 116005,
            "type": 2,
            "oriented": 1
        };
    </script>
    <script type="text/javascript" src="https://js1.nend.net/js/nendAdLoader.js"></script>
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <!-- Navbar
================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><?php echo $this->Html->link('Home', '/'); ?></li>
                        <li><?php echo $this->Html->link('ブログ一覧/設定', '/sites/index'); ?></li>
                        <li><?php echo $this->Html->link('お問い合わせ', '/contact/index'); ?></li>
                    </ul>
                    <ul role="navigation" class="nav" id="dropmenu">
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1"><i class="icon-star icon-white"></i>ブックマーク他<b class="caret"></b></a>
                            <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
                                <li role="presentation"><?php echo $this->Html->link('ブックマーク', '/bookmark/index'); ?></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><?php echo $this->Html->link('24Hランキング', '/dailys/people'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('昨日のランキング', '/dailys/rank/' . date('Y/m/d', (time() - (60 * 60 * 24)))); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('1週間内ランキング', '/ranges/rank/' . date('Y/m/d/', (time() - (60 * 60 * 168))) . date('Y/m/d', (time()))); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('1ヶ月内ランキング', '/ranges/rank/' . date('Y/m/d/', (time() - (60 * 60 * 744))) . date('Y/m/d', (time()))); ?></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><?php echo $this->Html->link('VIP', '/category/index/1'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('ニュース', '/category/index/2'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('エンタメ', '/category/index/3'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('スポーツ', '/category/index/4'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('漫画・アニメ', '/category/index/5'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('ゲーム', '/category/index/6'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('趣味', '/category/index/8'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('生活', '/category/index/9'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('アダルト', '/category/index/7'); ?></li>
                                <li role="presentation"><?php echo $this->Html->link('その他', '/category/index/0'); ?></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><?php echo $this->Html->link('RSS配信一覧', '/rss/index'); ?></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="input-append date" data-date="2012/01/02" data-date-format="yyyy/mm/dd" style=" float: right; margin-top: 5px;">
                        <?php
                        echo $this->Form->create(
                            false,
                            array('type' => 'post', 'url' => '/forms/date', 'class' => 'navbar-form pull-left')
                        );
                        echo $this->Form->text('dateValue', array('class' => 'span2', 'id' => 'dp1', 'value' => date('Y/m/d')));
                        echo '<button type="submit" class="add-on" style="height: 30px;"><i class="icon-calendar"></i></button>';
                        echo $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subhead
================================================== -->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav" id="navbar">
                    <h1 id='title'><?php echo $this->Html->image('title.png', array('alt' => '２ちゃんねるまとめるまとめ', 'url' => '/')) ?><span style='display:none;'>２ちゃんねるまとめるまとめ</span></h1>
                    <div class="lead"></div>
                    <ul class="nav nav-list" style="margin-bottom: 15px;">
                        <li class="nav-header">Menu</li>
                        <li id='link'><?php echo $this->Html->link('Home', '/'); ?></li>
                        <li id='blog'><?php echo $this->Html->link('ブログ一覧/設定', '/sites/index'); ?></li>
                        <li id='book'><?php echo $this->Html->link('ブックマーク', '/bookmark/index'); ?></li>
                        <li id='info'><?php echo $this->Html->link('お問い合わせ', '/contact/index'); ?></li>
                    </ul>
                    <?php
                    if ($ocmenu == 0) {
                        echo "<button id='ocmenu'><div class='icon-chevron-up'></div></button><div id='menu' style='display:none;'>";
                    } else {
                        echo "<button id='ocmenu'><div class='icon-chevron-down'></div></button><div id='menu' style='display:block;'>";
                    }
                    ?>
                    <div class="lead"></div>
                    <ul class="nav nav-list" id='rank'>
                        <li class="nav-header">Ranking</li>
                        <li><?php echo $this->Html->link('24Hランキング', '/dailys/people'); ?></li>
                        <li><?php echo $this->Html->link('昨日のランキング', '/dailys/rank/' . date('Y/m/d', (time() - (60 * 60 * 24)))); ?></li>
                        <li><?php echo $this->Html->link('1週間内ランキング', '/ranges/rank/' . date('Y/m/d/', (time() - (60 * 60 * 168))) . date('Y/m/d', (time()))); ?></li>
                        <li><?php echo $this->Html->link('1ヶ月内ランキング', '/ranges/rank/' . date('Y/m/d/', (time() - (60 * 60 * 744))) . date('Y/m/d', (time()))); ?></li>
                    </ul>
                    <div class="lead"></div>
                    <ul class="nav nav-list" id='category'>
                        <li class="nav-header">Category</li>
                        <li><?php echo $this->Html->image('vip.png') . $this->Html->link('VIP', '/category/index/1'); ?></li>
                        <li><?php echo $this->Html->image('news.png') . $this->Html->link('ニュース', '/category/index/2'); ?></li>
                        <li><?php echo $this->Html->image('enter.png') . $this->Html->link('エンタメ', '/category/index/3'); ?></li>
                        <li><?php echo $this->Html->image('sports.png') . $this->Html->link('スポーツ', '/category/index/4'); ?></li>
                        <li><?php echo $this->Html->image('anime.png') . $this->Html->link('漫画・アニメ', '/category/index/5'); ?></li>
                        <li><?php echo $this->Html->image('game.png') . $this->Html->link('ゲーム', '/category/index/6'); ?></li>
                        <li><?php echo $this->Html->image('hobby.png') . $this->Html->link('趣味', '/category/index/8'); ?></li>
                        <li><?php echo $this->Html->image('life.png') . $this->Html->link('生活', '/category/index/9'); ?></li>
                        <li><?php echo $this->Html->image('r18.png') . $this->Html->link('アダルト', '/category/index/7'); ?></li>
                        <li><?php echo $this->Html->image('other.png') . $this->Html->link('その他', '/category/index/0'); ?></li>
                    </ul>
                    <div class="lead"></div>
                    <ul class="nav nav-list">
                        <li class="nav-header">RSS</li>
                        <li><?php echo $this->Html->image('foff.png', array('alt' => 'RSS'));
                            echo $this->Html->link('RSS配信一覧', '/rss/index', array('style' => 'display:inline;')); ?></li>
                    </ul>
                </div>
            </div>
            <?php echo $this->element('headerAd'); ?>
        </div>
        <?php echo $this->element('footerAd'); ?>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <div id="bmmsg" class="span11 alert alert-success">
            <strong>最大300件までです</strong>
        </div>
    </div>
    <footer class="footer">

    </footer>
    <?php echo $this->element('footerScript'); ?>
</body>

</html>
