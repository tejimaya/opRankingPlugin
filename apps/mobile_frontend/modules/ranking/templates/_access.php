<?php op_mobile_page_title(__('Ranking'), __('Access number No1 member')) ?>
<?php if ($memberList['number']): ?>
<?php

echo '<center>' . __('It is a ranking of the member with a lot of numbers of yesterday of accesses.') . '</center>';

$list = array();
for ($i = 0; $i < $memberList['number']; $i++)
{
  $member = $memberList['model'][$i];
  $list[] = __('No%0%', array('%0%' => $memberList['rank'][$i])).'<br>'
          . __('%0% :%1% access', array('%0%' => link_to($member->getName(), 'member/profile?id='.$member->getId()), '%1%' => $memberList['count'][$i]));
}

$options = array(
  'border' => true,
);

op_include_list('rankingList', $list, $options);
?>
<?php else: ?>
<?php echo '<center>' . __('all member is 0 access') . '</center>' ?>
<?php endif; ?>
