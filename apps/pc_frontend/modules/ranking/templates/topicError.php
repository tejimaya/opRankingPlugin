<?php
slot('op_sidemenu');
include_parts('rankingLink', 'RankingLink');
end_slot();
include_box('community_list', __('No1 community at each upsurge'), __('Not written'));
?>

<?php use_helper('Javascript') ?>
<p><?php echo link_to_function(__('前のページに戻る'), 'history.back()') ?></p>
