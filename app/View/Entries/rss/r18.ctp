<?php
$channel = array(
    'title' => '２ちゃんねるまとめるまとめ | アダルトカテゴリ',
    'link' => 'https://2chmatomeru.info',
    'guid' => 'https://2chmatomeru.info',
    'description' => 'アダルトカテゴリ新着10件'
);
$this->set('channel', $channel);
echo $this->Rss->items($entries, 'transformRSS');

function transformRSS($entries)
{
    return array(
        'link' => array('controller' => 'feeds', 'action' => 'index', $entries['Source']['id']),
        'title' => $entries['Source']['title'], //投稿のタイトル
        'description' => $entries['Source']['title'], //投稿の説明文
        'pubDate' => $entries['Source']['created'], //投稿日時
        'dc:creator' => '２ちゃんねるまとめるまとめ'
    );
}
