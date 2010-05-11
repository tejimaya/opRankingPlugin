<?php slot('op_sidemenu'); ?>
<div class="parts rankingSideNav">

<?php if ($isAshiatoUsable): ?>
<div class="item">
<div class="partsHeading"><h3><?php echo __('Access number No1 member') ?></h3></div>
<p><?php echo __('It is a ranking of the member with a lot of numbers of yesterday of accesses.') ?></p>
<p class="link"><?php echo link_to(__('Access number No1 member'), 'ranking/access') ?></p>
</div>
<?php endif; ?>

<?php if ($op_config['enable_friend_link']): ?>
<div class="item">
<div class="partsHeading"><h3><?php echo __('Member of number No1 of %friend%', array('%friend%' => $op_term['friend']->pluralize())) ?></h3></div>
<p><?php echo __('It is a ranking of the member with a lot of numbers of registered %friend%.', array('%friend%' => $op_term['friend']->pluralize())) ?></p>
<p class="link"><?php echo link_to(__('Member of number No1 of %friend%', array('%friend%' => $op_term['friend']->pluralize())), 'ranking/friend') ?></p>
</div>
<?php endif; ?>

<div class="item">
<div class="partsHeading"><h3><?php echo __('Participation number No1 %community%') ?></h3></div>
<p><?php echo __('It is a ranking of a lot of %community% of the participant that are.', array('%community%' => $op_term['community']->pluralize())) ?></p>
<p class="link"><?php echo link_to(__('Participation number No1 %community%'), 'ranking/community') ?></p>
</div>

<?php if ($isTopicUsable): ?>
<div class="item">
<div class="partsHeading"><h3><?php echo __('No1 %community% at each upsurge') ?></h3></div>
<p><?php echo __('It is a ranking of the %community% with a lot of numbers of yesterday of bulletin board writing.') ?></p>
<p class="link"><?php echo link_to(__('No1 %community% at each upsurge'), 'ranking/topic') ?></p>
</div>
<?php endif; ?>

</div>
<?php end_slot(); ?>
