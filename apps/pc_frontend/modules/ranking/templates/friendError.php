<?php
slot('op_sidemenu');
include_parts('rankingLink', 'RankingLink');
end_slot();
include_box('friend_list', __('Member of number No1 of friends'), __('There is no member who has a MyFriend'));
?>

<?php use_helper('Javascript') ?>
<p><?php echo link_to_function(__('前のページに戻る'), 'history.back()') ?></p>
