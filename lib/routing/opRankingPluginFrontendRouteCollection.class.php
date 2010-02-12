<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opRankingPluginFrontendRouteCollection
 *
 * @package    opRankingPlugin
 * @subpackage routing
 * @author     Shogo Kawahara <kawahara@tejimaya.net>
 */
class opRankingPluginFrontendRouteCollection extends sfRouteCollection
{
  public function __construct(array $options)
  {
    parent::__construct($options);

    $this->routes = array(
      'ranking_access' => new sfRoute(
        '/ranking/access',
        array('module' => 'ranking', 'action' => 'access')
      ),
      'ranking_friend' => new sfRoute(
        '/ranking/friend',
        array('module' => 'ranking', 'action' => 'friend')
      ),
      'ranking_community' => new sfRoute(
        '/ranking/community',
        array('module' => 'ranking', 'action' => 'community')
      ),
      'ranking_topic' => new sfRoute(
        '/ranking/topic',
        array('module' => 'ranking', 'action' => 'topic')
      ),
      'ranking_default' => new sfRoute(
        '/ranking/*',
        array('module' => 'default', 'action' => 'error')
      ),
    );
  }
}
