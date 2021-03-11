<div class="span9" >
<div class="alert alert-error">
	<button type="button" class="close" data-dismiss="alert">×</button>
	サーバーの移転を行いますので接続が不安点になることがございます。ご了承ください<br>
</div>
<ul id="myTab" class="nav nav-tabs">
<li <?php if($top==0)echo 'class="active"'?>><a class="notvisited" href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>新着記事</p></a></li>
<li <?php if($top==1 or $top==2)echo 'class="active"'?>><a class="notvisited" href="#profile" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>注目記事</p></a></li>
</ul>
<?php echo $this->element('toolbar'); ?>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade <?php if($top==0)echo 'in active'?>" id="home">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="latest">
<?php echo $this->element('tablebody'); ?>
</table>
<a href="#"><i class='icon-upload'></i>ページ上部へ</a>
<ul class="pager">
<li><?php echo $this->Html->link('昨日の全記事', '/dailys/index/'.date('Y/m/d',time()-3600*24)); ?></li>
<li><?php echo $this->Html->link('本日の全記事', '/dailys/index/'.date('Y/m/d')); ?></li>
</ul>	</div>
<div class="tab-pane fade <?php if($top==1)echo 'in active'?>" id="profile">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="people">
<thead>
<tr>
<th id="thDate" class="<?php if($chTable[0]==0)echo 'hide';?>" style="width:5%;">日時</th>
<th class="dbar"></th>
<th id="thCat" class="center <?php if($chTable[1]==0)echo 'hide';?>" style="width:2%;"><i class="icon-tags"></i></th>
<th id="title" style="width:66%;">タイトル</th>
<th id="thHit" class="<?php if($chTable[2]==0)echo 'hide';?>" style="width:10%;">HIT</th>
<th class="pbar"></th>	<th id="thBlog" class="<?php if($chTable[3]==0)echo 'hide';?>" style="width:15%;">ブログ</th>
<th class="center nosort" style="width:2%;"><i class="icon-filter"></i></th>	</tr>
</thead>
<tbody>
<?php $i = 0; foreach($r_datas as $data) { ?>
<tr class="sid_<?php echo $data['Site']['id']; ?>">
<td class="cr"><?php echo $data['Source']['created'] ?></td>
<td class="tdDate <?php if($chTable[0]==0)echo 'hide';?>"><?php echo substr($data['Source']['created'],10,6); ?></td>	<?php switch($data['Site']['category']){
case 1: echo "<td class='icat_v tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 2: echo "<td class='icat_n tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 3: echo "<td class='icat_e tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 4: echo "<td class='icat_s tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 5: echo "<td class='icat_a tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 6: echo "<td class='icat_g tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 7: echo "<td class='icat_r tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 8: echo "<td class='icat_h tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 9: echo "<td class='icat_l tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 0: echo "<td class='icat_o tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
default : echo "<td class='icat_o tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
} ?>
<td class="tdLink">
<span class="tdDiv">

<a class="<?php if($chTable[4]==1)echo 'ofoff';?>" href="<?php echo h($data['Source']['link']); ?>" onClick="clickCount(<?php echo $data['Source']['id']; ?>);" target="_blank">

<?php echo h($data['Source']['title']); ?>
</a>
<?php if($chTable[5]>=1) echo '<div style="display: inline;" class="divHitTail"><span class="num">',$data['Source']['total'],'</span><span class="hit">HIT</span></div>';?>
<?php if($chTable[6]==1) echo '<span class="spBlog">',$data['Site']['source'],'</span>';?>
</span>
<span id="bm_<?php echo $data['Source']['id'];?>" class="starOff"></span>
</td>
<td class="hbar" ><?php echo $data['Source']['total']; ?></td>
<td class="tdHit <?php if($chTable[2]==0)echo 'hide';?>">
<div class="progress">
<div class="bar" style="width: <?php echo (round(($data['Source']['total'] / $hr_data), 2) * 100) ;?>%"></div>
</div>
</td>
<td class="ss tdBlog <?php if($chTable[3]==0)echo 'hide';?>"><?php echo $this->Html->link($data['Site']['source'], '/blog/index/'.$data['Site']['id']); ?></td>
<td class="filter checkOff"></td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
<a href="#"><i class='icon-upload'></i>ページ上部へ</a>	</div>
<div class="tab-pane fade <?php if($top==2)echo 'in active'?>" id="RssFeed">
</div>	</div>
</div>
