<?php
$list = array();
for ($i = 0; $i < $ranking['number']; $i++)
{
  $community = $ranking['model'][$i];
  $list[$i][sprintf(__('No%s'), $ranking['rank'][$i])] = $community->getName() . sprintf(__(' :%smember'), $ranking['count'][$i]);
  $list[$i][__('category')] = "";
  $list[$i][__('manager')] = "";
  $list[$i][__('description')] = CommunityConfigPeer::retrieveByNameandCommunityId('description', $community->getId());
}

$options = array(
  'title'          => sprintf(__('The No1 of the number of community is %s'), $ranking['model'][0]->getName()),
  'link_to_detail' => 'community/%d',
  'model'          => $ranking['model'],
  'list'           => $list,
  'rank'           => $ranking['rank'],
);

include_parts('rankingLink', 'RankingLink');
include_parts('rankingResultList', 'RankingResultList', $options);
