<?php
$include_page_title(__('Ranking'), __('No1 community at each upsurge'));

echo '<center>' . __('It is a ranking of the community with a lot of numbers of yesterday of bulletin board writing.') . '</center>';

list = array();
for ($i = 0; $i < $ranking['number']; $i++)
{
  $community = $ranking['model'][$i];
  $list[] = sprintf(__('No%s'), $ranking['rank'][$i]) . '<br />'
          . link_to($community->getName(), 'community/' . $community->getId()) . ' ' . sprintf(__(':%swriting'), $ranking['count'][$i]);
}

$options = array(
  'border' => true,
);

include_list_box('rankingList', $list, $options);
include_parts('rankingLink', 'RankingLink');
