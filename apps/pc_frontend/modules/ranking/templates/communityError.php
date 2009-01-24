<?php
slot('op_sidemenu');
include_parts('rankingLink', 'RankingLink');
end_slot();
include_box('community_list', __('Participation number No1 community'), __('No community'));
?>

<?php use_helper('Javascript') ?>
<p><?php echo link_to_function(__('前のページに戻る'), 'history.back()') ?></p>
