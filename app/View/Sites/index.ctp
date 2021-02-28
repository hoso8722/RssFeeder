<div class="span9" >
<ul id="myTab" class="nav nav-tabs">
<li class="active"><a href="#home" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>ブログ一覧/設定</p></a></li>

<li><a class="notvisited" href="#profile" data-toggle="tab"><p class="brand"><i class="icon-play-circle"></i>表示設定</p></a></li>
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade in active" id="home">
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>ブログ一覧/設定の使い方</strong><br>
「フィルタ機能による各ブログサイトの表示\非表示」ができます。<br>
デフォルトではすべてのブログを表示されております。<br>
<br>
<strong>「フィルタ機能」</strong>ではテーブル左側の<button class="btn btn-mini btn-primary">表示 O N</button>  <button class="btn btn-mini btn-inverse">表示OFF</button>ボタンで各ブログをフィルタリングしてください。<br>
<br>

</div>
<div id="filter_btn">
<button id="rmFilter" class="btn btn-small btn-warning">フィルターの設定を削除する</button>

</div>
<?php echo $this->element('toolbar'); ?>
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="sight">
<thead>
<tr>
<th class="pbar"></th>
<th class="nosort" style="width:8%;">フィルタ</th>
<th id="thCat" class="center <?php if($chTable[1]==0)echo 'hide';?>" style="width:3%;"><i class="icon-tags"></i></th>
<th style="width:53%;">登録ブログ</th>
<th id="thHit" class="<?php if($chTable[2]==0)echo 'hide';?>" style="width:20%;">HIT</th>
<th class="pbar"></th>
<th id="thDate" class="<?php if($chTable[0]==0)echo 'hide';?>" style="width:10%;">登録日</th>
<th class="dbar"></th>
<th id="thBlog" class="<?php if($chTable[3]==0)echo 'hide';?>" style="width:3%;"><i class="icon-list-alt"></i></th>
<th class="nosort" style="width:3%;"><i class="icon-signal"></i></th>
</tr>
</thead>
<tbody>
<?php $i = 0; foreach($sites as $data) { ?>
<tr id='sid_<?php echo $data['Site']['id']; ?>' class="cat_<?php echo $data['Site']['category']; ?>">
<td class='ibar'><?php echo $data['Site']['id']; ?></td>
<td class="siteFilter"><button class="btn btn-mini btn-primary" type="button">表示 O N</button></td>
<?php switch($data['Site']['category']){
case 1: echo "<td class='tdCat icat_v "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 2: echo "<td class='tdCat icat_n "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 3: echo "<td class='tdCat icat_e "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 4: echo "<td class='tdCat icat_s "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 5: echo "<td class='tdCat icat_a "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 6: echo "<td class='tdCat icat_g "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 7: echo "<td class='tdCat icat_r "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 8: echo "<td class='icat_h tdCat "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
case 0: echo "<td class='tdCat icat_o "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
default : echo "<td class='tdCat icat_o "; if($chTable[1]==0){echo "hide";} echo "'>",$data['Site']['category'],'</td>';break;
} ?>
<td class="tdLink"><?php echo $this->Html->link($data['Site']['source'], '/blog/index/'.$data['Site']['id']); ?></td>
<td class="hbar" ><?php echo $data['Site']['count']; ?></td>
<td class="tdHit <?php if($chTable[2]==0)echo 'hide';?>">
<div class="progress">
<div class="bar" style="width: <?php echo (round(($data['Site']['count'] / $s_max), 2) * 100) ;?>%"></div>
</div>
</td>
<td class="cr"><?php echo substr($data['Site']['created'],0,16); ?></td>
<td class="tdDate <?php if($chTable[0]==0)echo 'hide';?>"><?php echo h(substr($data['Site']['created'],0,10)); ?></td>
<td class="tdBlog <?php if($chTable[3]==0)echo 'hide';?>"><a href="<?php echo h($data['Site']['sourceurl']); ?>" target="_blank"><i class="icon-share"></i></a></td>
<td class='feeds foff'></td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
<a href="#"><i class='icon-upload'></i>ページ上部へ</a>
</div>
<div class="tab-pane fade" id="profile">
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>表示設定の使い方</strong><br>
表示設定ではTOPページの表示をカスタマイズできます。<br>
最初に表示されるページを設定したり各記事の表示件数を設定したりできます。<br>
<strong>設定し終わったら <button id="setDetailDemo"class="btn btn-mini btn-success">表示設定を保存する</button> をクリックして設定を保存してください。</strong>
<br>
</div>
<div>
<span>TOPページ初期表示:</span>
<select id="top">
<option value='0'>新着記事</option>
<option value='1'>注目記事</option>
</select>
</div>
<div>
<span>新着記事の表示件数:</span>
<select id="last">
<option value='0'>50</option>
<option value='1'>100</option>
<option value='2'>150</option>
<option value='3'>200</option>	
<option value='4'>250</option>
<option value='5'>300</option>
</select>
</div>
<div>
<span>注目記事の表示件数:</span>
<select id='trand'>
<option value='0'>50</option>
<option value='1'>100</option>
<option value='2'>150</option>
<option value='3'>200</option>	<option value='4'>250</option>
<option value='5'>300</option>
</select>
</div>

<ul id="btnlist">
<li><button id="setDetail" class="btn btn-small btn-success">表示設定を保存する</button></li>
<li><button id="rmDetails" class="btn btn-small btn-warning">表示設定を削除する</button></li>
<li><button id="rmAll" class="btn btn-small btn-danger">すべての設定を削除する</button></li>
</ul>
</div>


</div>
</div>

</div>
<div id="message" class="span11 alert alert-success">
<strong>表示設定を保存しました</strong>	</div>
