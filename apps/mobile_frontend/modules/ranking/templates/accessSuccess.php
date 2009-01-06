<?php
include_page_title(__('ranking'));

echo __('It is a ranking of the member with a lot of numbers of yesterday of accesses.');

$list = array();
for ($i = 0; $i < $member_list['number']; $i++)
{
  $member = $member_list['model'][$i];
  $list[] = sprintf(__('No%s'), $member_list['rank'][$i]) . '<br />'
          . link_to($member->getName(), 'member/profile?id=' . $member->getId()) . sprintf(__(' :%saccess'), $member_list['count'][$i]);
}

$options = array(
  'border' => true,
);

include_list_box('rankingList', $list, $options);
include_parts('rankingLink', 'RankingLink');
