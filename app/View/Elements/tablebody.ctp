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
<?php $i = 0; foreach($datas as $data) { ?>
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
<?php if($chTable[5]==1) echo '<div style="display: inline;" class="divHitTail"><span class="num">',$data['Source']['total'],'</span><span class="hit">HIT</span></div>';?>
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