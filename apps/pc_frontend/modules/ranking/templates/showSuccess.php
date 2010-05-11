<?php include_partial('menu', array(
  'isAshiatoUsable' => $isAshiatoUsable,
  'isTopicUsable'   => $isTopicUsable,
)) ?>
<?php include_component('ranking', $type, array('culture' => $sf_user->getCulture())) ?>
