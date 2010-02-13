<?php if (class_exists('Ashiato')): ?>
<?php echo link_to(__('Access number No1 member'), '@ranking_access') ?><br>
<?php endif; ?>
<?php echo link_to(__('Member of number No1 of %friend%', array('%friend%' => $op_term['friend']->pluralize())), '@ranking_friend') ?><br>
<?php echo link_to(__('Participation number No1 %community%'), '@ranking_community') ?><br>
<?php if (class_exists('CommunityTopicComment')): ?>
<?php echo link_to(__('No1 %community% at each upsurge'), '@ranking_topic') ?>
<?php endif; ?>
