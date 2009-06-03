<?php

/**
 * opRankingPluginRanking actions.
 *
 * @package    OpenPNE
 * @subpackage ranking
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class opRankingPluginRankingActions extends sfActions
{
  /**
  * Executes access action
  *
  * @param sfRequest $request A request object
  */
  public function executeAccess($request)
  {
    $this->forward404Unless(class_exists('Ashiato'));
    $this->member_list = opRankingPlugin::getAccessRanking(10, 0);
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
    $this->member_list = opRankingPlugin::getFriendRanking(10, 0);
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
    $this->ranking = opRankingPlugin::getCommunityRanking(10, 0);
    if ($this->ranking['number']) return sfView::SUCCESS;
    return sfView::ERROR;
  }

 /**
  * executes topic action
  *
  * @param sfrequest $request a request object
  */
  public function executeTopic($request)
  {
    $this->forward404Unless(class_exists('CommunityTopicComment'));
    $this->ranking = opRankingPlugin::getTopicRanking(10, 0);
    if ($this->ranking['number']) return sfView::SUCCESS;
    return sfView::ERROR;
  }
}
