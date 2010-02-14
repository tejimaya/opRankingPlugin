<?php

/**
 * opRankingPluginRanking components.
 *
 * @package    OpenPNE
 * @subpackage action
 * @author     Shogo Kawahara <kawahara@tejimaya.net>
 */
class opRankingPluginRankingComponents extends sfComponents
{
 /**
  * Executes access action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeAccess(sfWebRequest $request)
  {
    $this->memberList = opRankingPlugin::getAccessRanking(10, 0);
  }

 /**
  * Executes friend action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeFriend(sfWebRequest $request)
  {
    $this->memberList = opRankingPlugin::getFriendRanking(10, 0);
  }

 /**
  * Executes community action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeCommunity(sfWebRequest $request)
  {
    $this->ranking = opRankingPlugin::getCommunityRanking(10, 0);
  }

 /**
  * Executes topic action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeTopic(sfWebRequest $request)
  {
    $this->ranking = opRankingPlugin::getTopicRanking(10, 0);
  }
}
