      <div class="span9" >
        <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a class="notvisited" href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i><?php echo $fromDay."～".$toDay."の人気記事300"; ?></p></a></li>
            </ul>
			<?php echo $this->element('toolbar'); ?>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="home">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="range">
					<?php echo $this->element('tablebodyL'); ?>
                </table>
	            <a href="#"><i class='icon-upload'></i>ページ上部へ</a>                
              </div>
        </div>                
      </div>
      


