      <div class="span9" >
        <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a class="notvisited" href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i><?php echo $blog,"の記事一覧"; ?></p></a></li>
            </ul>
			<?php echo $this->element('toolbar'); ?>
            <div id="myTabContent" class="tab-content">
<?php
echo $this->Paginator->counter(
    '{:pages}ページ中  {:page}ページ目,　{:count}件中 {:current}件表示'
);?>			
            	
              <div class="tab-pane fade in active" id="home">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="range">
					<?php echo $this->element('tablebodyL'); ?>
                </table>
	            <a href="#"><i class='icon-upload'></i>ページ上部へ</a>
					<div class="span9">
						<div class="pagination Paginator">
							<ul>
							<?php 
								echo $this->Paginator->first(('最初へ'), array('tag' => 'li'));
								echo $this->Paginator->prev(('← 前'), array('tag' => 'li')); 
								echo $this->Paginator->numbers(array('modulus'=>4,'separator' => '','tag' => 'li')); 
								echo $this->Paginator->next(('次 →'), array('tag' => 'li')); 
								echo $this->Paginator->last(('最後へ'), array('tag' => 'li')); ?>					
							</ul>
						</div>
					</div>            
              </div>
        </div>                
      </div>