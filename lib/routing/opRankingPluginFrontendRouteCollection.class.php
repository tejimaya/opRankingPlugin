<?php

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
      'ranking' => new sfRoute(
        '/ranking',
        array('module' => 'ranking', 'action' => 'show')
      ),
      'ranking_access' => new sfRoute(
        '/ranking/access',
        array('module' => 'ranking', 'action' => 'show', 'type' => 'access')
      ),
      'ranking_friend' => new sfRoute(
        '/ranking/friend',
        array('module' => 'ranking', 'action' => 'show', 'type' => 'friend')
      ),
      'ranking_community' => new sfRoute(
        '/ranking/community',
        array('module' => 'ranking', 'action' => 'show', 'type' => 'community')
      ),
      'ranking_topic' => new sfRoute(
        '/ranking/topic',
        array('module' => 'ranking', 'action' => 'show', 'type' => 'topic')
      ),
      'ranking_default' => new sfRoute(
        '/ranking/*',
        array('module' => 'default', 'action' => 'error')
      ),
    );
  }
}
