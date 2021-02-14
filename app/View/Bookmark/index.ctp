      <div class="span9" >
<div class="alert alert-info" style="margin:10px">
<strong>ブックマーク機能は最大300件まで登録できます。</strong><br>
</div>      
        <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a class="notvisited" href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>ブックマーク一覧</p></a></li>
            </ul>
			<?php echo $this->element('toolbar'); ?>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="home">
              	<div><button id="removeBook" class="btn btn-small btn-danger" style="margin:10px 0";>ブックマークを全削除</button></div>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered bookmark" id="people">
					<?php echo $this->element('tablebody'); ?>
                </table>
	            <a href="#"><i class='icon-upload'></i>ページ上部へ</a>                
              </div>
        </div>                
      </div>
