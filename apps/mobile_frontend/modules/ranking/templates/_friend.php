<?php op_mobile_page_title(__('Ranking'), __('Member of number No1 of %friend%', array('%friend%' => $op_term['friend']->pluralize()))); ?>
<?php if ($memberList['number']): ?>
<?php
echo '<center>'.__('It is a ranking of the member with a lot of numbers of registered %friend%.', array('%friend%' => $op_term['friend']->pluralize())).'</center>';

$list = array();
for ($i = 0; $i < $memberList['number']; $i++)
{
  $member = $memberList['model'][$i];
  $list[] = __('No%0%', array('%0%' => $memberList['rank'][$i])).'<br>'
          . __('%0% :%1% member', array('%0%' => link_to($member->getName(), 'member/profile?id='.$member->getId()), '%1%' => $memberList['count'][$i]));
}

$options = array(
  'border' => true,
);

op_include_list('rankingList', $list, $options);
?>
<?php else: ?>
<?php echo '<center>' . __('There is no member who has a %friend%') . '</center>'; ?>
<?php endif; ?>
