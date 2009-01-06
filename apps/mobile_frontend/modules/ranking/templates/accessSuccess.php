<?php
include_page_title(__('Ranking'));

echo '<div class="rankingHeading">' . __('Access number No1 member') . '</div>'
   . '<div class="rankingDescription">'
   . __('It is a ranking of the member with a lot of numbers of yesterday of accesses.')
   . '</div>';

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
