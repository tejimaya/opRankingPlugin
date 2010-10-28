<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

include dirname(__FILE__).'/../../bootstrap/functional.php';
include dirname(__FILE__).'/../../bootstrap/database.php';

$browser = new opTestFunctional(new opBrowser(), new lime_test(null, new lime_output_color()));
echo $browser
  ->info('Login')
  ->login('sns@example.com', 'password')
  ->isStatusCode(302)

// XSS
  ->info('/ranking/access - XSS')
  ->get('/ranking/access')
  ->with('html_escape')->begin()
    ->isAllEscapedData('Member', 'name')
    ->countEscapedData(1, 'MemberProfile', 'self_intro', array(
      'width' => 36,
      'etc'   => '',
      'rows'  => 3,
    ))
  ->end()

  ->info('/ranking/friend - XSS')
  ->get('/ranking/friend')
  ->with('html_escape')->begin()
    ->isAllEscapedData('Member', 'name')
    ->countEscapedData(2, 'MemberProfile', 'self_intro', array(
      'width' => 36,
      'etc'   => '',
      'rows'  => 3,
    ))
  ->end()

  ->info('/ranking/community - XSS')
  ->get('/ranking/community')
  ->with('html_escape')->begin()
    ->isAllEscapedData('Community', 'name1')
    ->isAllEscapedData('Community', 'name2')
    ->isAllEscapedData('Member', 'name')
    ->countEscapedData(2, 'CommunityConfig', 'description', array(
      'width' => 36,
      'etc'   => '',
      'rows'  => 3,
    ))
  ->end()

  ->info('/ranking/topic - XSS')
  ->get('/ranking/topic')
  ->with('html_escape')->begin()
    ->isAllEscapedData('Community', 'name1')
    ->isAllEscapedData('Member', 'name')
    ->countEscapedData(1, 'CommunityConfig', 'description', array(
      'width' => 36,
      'etc'   => '',
      'rows'  => 3,
    ))
  ->end()
;
