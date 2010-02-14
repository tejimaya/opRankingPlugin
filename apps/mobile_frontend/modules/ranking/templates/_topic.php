<?php op_mobile_page_title(__('Ranking'), __('No1 %community% at each upsurge')); ?>
<?php if ($ranking['number']): ?>
<?php
echo '<center>'.__('It is a ranking of the %community% with a lot of numbers of yesterday of bulletin board writing.').'</center>';

$list = array();
for ($i = 0; $i < $ranking['number']; $i++)
{
  $community = $ranking['model'][$i];
  $list[] = __('No%0%', array('%0%' => $ranking['rank'][$i])).'<br>'
          . link_to($community->getName(), 'community/home?id='.$community->getId()).' '.__(':%0% writing', array('%0%' => $ranking['count'][$i]));
}

$options = array(
  'border' => true,
);

op_include_list('rankingList', $list, $options);
?>
<?php else: ?>
<?php echo '<center>'.__('Not written').'</center>'; ?>
<?php endif; ?>
