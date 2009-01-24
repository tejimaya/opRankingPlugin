<?php
slot('op_sidemenu');
include_parts('rankingLink', 'RankingLink');
end_slot();
include_box('access_list', __('Access number No1 member'), __('all member is 0 access'));
?>

<?php use_helper('Javascript') ?>
<p><?php echo link_to_function(__('前のページに戻る'), 'history.back()') ?></p>
