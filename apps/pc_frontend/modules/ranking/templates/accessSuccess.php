<?php
$list = array();
for ($i = 0; $i < $member_list['number']; $i++)
{
  $member = $member_list['model'][$i];
  $list[$i][sprintf(__('No%s'), $member_list['rank'][$i])] = $member->getName() . sprintf(__(' :%saccess'), $member_list['count'][$i]);

  $self_intro = $member->getProfile('self_intro');
  if ($self_intro && $self_intro->isViewable())
  {
    $list[$i][$self_intro->getCaption()] = nl2br($self_intro);
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
