<?php if ($memberList['number']): ?>
<?php
$list = array();
for ($i = 0; $i < $memberList['number']; $i++)
{
  $member = $memberList['model'][$i];
  $list[$i][__('No%0%', array('%0%' => $memberList['rank'][$i]))] =
    __('%0% :%1% access', array('%0%' => link_to($member->getName(), 'member/profile?id='.$member->getId()), '%1%' => $memberList['count'][$i]));

  if (sfConfig::get('app_ranking_display_self_introduction', false))
  {
    $selfintoroCaption = __('Self Introduction');
    $selfintoro = $member->getProfile('op_preset_self_introduction');
    if ($selfintoro)
    {
      $acl = $selfintoro->getTable()->getAcl($selfintoro->getRawValue());
      if ($acl->isAllowed('everyone', $selfintoro->getRawValue(), 'view'))
      {
        $list[$i][$selfintoroCaption] = op_truncate($selfintoro, 36, '', 3);
      }
    }
  }
}

$options = array(
  'id'             => 'rankingResultList',
  'title'          => __('The No1 of the number of access member is %0%', array('%0%' => $memberList['model'][0]->getName())),
  'link_to_detail' => 'member/profile?id=%d',
  'model'          => $memberList['model'],
  'list'           => $list,
  'rank'           => $memberList['rank'],
);

include_partial('global/partsRankingResultList', array('options' => $options));
?>
<?php else: ?>
<?php op_include_box('access_list',  __('all member is 0 access'), array(
  'title' => __('Access number No1 member'),
)); ?>
<?php endif; ?>
