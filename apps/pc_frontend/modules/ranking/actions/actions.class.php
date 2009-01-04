<?php

/**
 * ranking actions.
 *
 * @package    OpenPNE
 * @subpackage ranking
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class rankingActions extends sfActions
{
  /**
  * Executes access action
  *
  * @param sfRequest $request A request object
  */
  public function executeAccess($request)
  {
    $this->member_list = RankingPeer::getAccessRanking(10, 0);
    if ($this->member_list['number']) return sfView::SUCCESS;
    return sfView::ERROR;
  }

 /**
  * executes myfriend action
  *
  * @param sfrequest $request a request object
  */
  public function executeFriend($request)
  {
    $this->member_list = RankingPeer::getFriendRanking(10, 0);
    if ($this->member_list['number']) return sfView::SUCCESS;
    return sfView::ERROR;
  }

 /**
  * executes community action
  *
  * @param sfrequest $request a request object
  */
  public function executeCommunity($request)
  {
    $this->ranking = RankingPeer::getCommunityRanking(10, 0);
    if ($this->ranking['number']) return sfView::SUCCESS;
    return sfView::ERROR;
  }

}
