<?php op_mobile_page_title(__('Ranking'), __('Participation number No1 %community%')); ?>
<?php if ($ranking['number']): ?>
<?php
echo '<center>'.__('It is a ranking of a lot of %community% of the participant that are.', array('%community%' => $op_term['community']->pluralize())).'</center>';

$list = array();
for ($i = 0; $i < $ranking['number']; $i++)
{
  $community = $ranking['model'][$i];
  $list[] = __('No%0%', array('%0%' => $ranking['rank'][$i])).'<br>'
          . link_to($community->getName(), 'community/home?id='.$community->getId()).' '.__(':%0% member', array('%0%' => $ranking['count'][$i]));
}

$options = array(
  'border' => true,
);

op_include_list('rankingList', $list, $options);
?>
<?php else: ?>
<?php echo '<center>' . __('No %community%') . '</center>'; ?>
<?php endif; ?>
