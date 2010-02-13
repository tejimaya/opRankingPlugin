<?php

op_mobile_page_title(__('Ranking'), __('Member of number No1 of %friend%', array('%friend%' => $op_term['friend']->pluralize())));
echo '<center>' . __('There is no member who has a %friend%') . '</center>';
op_include_parts('rankingLink', 'RankingLink');
