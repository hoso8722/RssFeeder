<div class="btn-toolbar" style="margin: 10px;">
<button id="chTable" class="btn btn-small btn-inverse" style="margin-top: 0px;" type="button">テーブル表示設定</button>
<button id="ad" class="btn btn-small btn-inverse" style="margin-top: 0px;" type="button">表示フィルタ ＯＮ</button>
</div>
<div style="display:none;" class="well sidebar-nav" id="navTable">
<ul id="navButton" class="nav nav-list">
<li><button id='liSmart' class="btn btn-small btn-warning">スマホ向け表示にする</button></li>
<li><button id='liDate' class="btn btn-small <?php if($chTable[0]==0){echo 'btn-inverse">日時を非表示</button>';}else{echo 'btn-info">日時を表示</button>';} ?></li>
<li><button id='liCat' class="btn  btn-small <?php if($chTable[1]==0){echo 'btn-inverse">カテゴリを非表示</button>';}else{echo 'btn-info">カテゴリを表示</button>';} ?></li>
<li><button id='liHit' class="btn  btn-small <?php if($chTable[2]==0){echo 'btn-inverse">HITを非表示</button>';}else{echo 'btn-info">HITを表示</button>';} ?></li>
<li><button id='liBlog' class="btn  btn-small <?php if($chTable[3]==0){echo 'btn-inverse">ブログを非表示</button>';}else{echo 'btn-info">ブログを表示</button>';} ?></li>
<li><button id='liOver' class="btn  btn-small <?php if($chTable[4]==0){echo 'btn-inverse">記事を折り返さない</button>';}else{echo 'btn-info">記事を折り返す</button>';} ?></li>
<li><button id='liHitHead' class="btn  btn-small
<?php if($chTable[5]==1){echo 'btn-info">記事にHIT数を表示１</button>';
}elseif($chTable[5]==2){echo 'btn-info">記事にHIT数を表示２</button>';
}elseif($chTable[5]==3){echo 'btn-info">記事末尾にHIT数を表示</button>';
}elseif($chTable[5]==0){echo 'btn-inverse">記事にHIT数を非表示</button>';
}?>
</li>
<li><button id='liBlogTail' class="btn  btn-small <?php if($chTable[6]==1){echo 'btn-info">記事末尾にブログ名を表示</button>';}else{echo 'btn-inverse">記事末尾にブログ名を非表示</button>';} ?></li>
<li><button id='liReset' class="btn btn-small btn-danger">表示設定をリセットする</button></li>
</ul>
</div>