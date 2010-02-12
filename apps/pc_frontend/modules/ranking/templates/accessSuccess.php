<?php
$list = array();
for ($i = 0; $i < $member_list['number']; $i++)
{
  $member = $member_list['model'][$i];
  $list[$i][sprintf(__('No%s'), $member_list['rank'][$i])] =
    link_to($member->getName(), 'member/profile?id=' . $member->getId()) . sprintf(__(' :%saccess'), $member_list['count'][$i]);
  $selfintoroCaption = __('Self Introduction');
  if ($member->getProfile('op_preset_self_introduction'))
  {
    $list[$i][$selfintoroCaption] = op_truncate($member->getProfile('op_preset_self_introduction'), 36, '', 3);
  }
}

$options = array(
  'title'          => sprintf(__('The No1 of the number of access member is %s'), $member_list['model'][0]->getName()),
  'link_to_detail' => 'member/profile?id=%d',
  'model'          => $member_list['model'],
  'list'           => $list,
  'rank'           => $member_list['rank'],
);

slot('op_sidemenu');
include_parts('rankingLink', 'RankingLink');
end_slot();
include_parts('rankingResultList', 'RankingResultList', $options);
