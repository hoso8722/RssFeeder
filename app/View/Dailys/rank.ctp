<div class="span9">
  <ul id="myTab" class="nav nav-tabs">
    <li class="active"><a class="notvisited" href="#home" data-toggle="tab">
        <p class="brand"><i class="icon-play-circle"></i><?php echo ($thisday) ?>のランキング300</p>
      </a>
    </li>
  </ul>
  <?php echo $this->element('toolbar'); ?>
  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="people">
        <?php echo $this->element('tablebody'); ?>
      </table>
      <a href="#"><i class='icon-upload'></i>ページ上部へ</a>
    </div>
    <div class="btn-toolbar" style="text-align:center;">
      <?php echo $this->Html->link($yesterday . 'のランキング', '/dailys/rank/' . $yesterday, array('class' => 'btn')); ?>
      <?php echo $this->Html->link($tommorow . 'のランキング', '/dailys/rank/' . $tommorow, array('class' => 'btn')); ?>
    </div>
  </div>
</div>