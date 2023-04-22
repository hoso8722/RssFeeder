      <div class="span9" >
        <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a class="notvisited" href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>
              <?php switch($cid){
					case 1: echo '「VIP」';break;
					case 2: echo '「ニュース」';break;
					case 3: echo '「エンタメ」';break;
					case 4: echo '「スポーツ」';break;
					case 5: echo '「アニメ」';break;
					case 6: echo '「ゲーム」';break;
					case 10: echo '「Vtuber」';break;
					case 7: echo '「アダルト」';break;
					case 8: echo '「趣味」';break;
					case 9: echo '「生活」';break;										
					case 0: echo '「その他」';
                } ?>        
              最新１００件
              </p></a></li>
            </ul>
			<?php echo $this->element('toolbar'); ?>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="home">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="latest">
					<?php echo $this->element('tablebody'); ?>
                </table>
	            <a href="#"><i class='icon-upload'></i>ページ上部へ</a>                
              </div>
        </div>                
      </div>
