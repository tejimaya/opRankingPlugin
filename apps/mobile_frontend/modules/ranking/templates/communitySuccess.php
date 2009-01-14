<?php

$include_page_title(__('Ranking'), __('Participation number No1 community'));

echo '<center>' . __('It is a ranking of a lot of communities of the participant that are.') . '</center>';

list = array();
for ($i = 0; $i < $ranking['number']; $i++)
{
  $community = $ranking['model'][$i];
  $list[] = sprintf(__('No%s'), $ranking['rank'][$i]) . '<br />'
          . link_to($community->getName(), 'community/' . $community->getId()) . ' ' . sprintf(__(':%smember'), $ranking['count'][$i]);
}

$options = array(
  'border' => true,
);

include_list_box('rankingList', $list, $options);
include_parts('rankingLink', 'RankingLink');
