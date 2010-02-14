<?php if ($ranking['number']): ?>
<?php
$list = array();
for ($i = 0; $i < $ranking['number']; $i++)
{
  $community = $ranking['model'][$i];
  $list[$i][__('No%0%', array('%0%' => $ranking['rank'][$i]))] =
    link_to($community->getName(), 'community/home?id='.$community->getId()).' '.__(':%0% member', array('%0%' => $ranking['count'][$i]));
  $list[$i][__('Category')] = $community->getCommunityCategory();
  $list[$i][__('Manager')] = link_to($ranking['admin'][$i]->getName(), '@obj_member_profile?id='.$ranking['admin'][$i]->getId());
  $list[$i][__('Description')] = op_truncate($community->getConfig('description'), 36, '', 3);
}

$options = array(
  'id'             => 'rankingResultList',
  'title'          => __("The No1 of the number of %community% member is '%0%'", array('%community%' => $op_term['community'], '%0%' => $ranking['model'][0]->getName())),
  'link_to_detail' => 'community/home?id=%d',
  'model'          => $ranking['model'],
  'list'           => $list,
  'rank'           => $ranking['rank'],
);

include_partial('global/partsRankingResultList', array('options' => $options));
?>
<?php else: ?>
<?php op_include_box('community_list', __('No %community%'), array(
  'title' => __('Participation number No1 %community%'),
)); ?>
<?php endif; ?>
