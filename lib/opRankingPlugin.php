<?php

class opRankingPlugin
{
  /**
  * get friend access ranking
  * @param $max
  * @param $page
  * @return array
  */
  public static function getAccessRanking($max, $page)
  {
    if (!class_exists('Ashiato'))
    {
      throw new LogicException("opAshiatoPlugin hasn't installed");
    }

    $ashiatos = Doctrine::getTable('Ashiato')->createQuery()
      ->select('COUNT(*), member_id_to')
      ->where('created_at >= ?', date('Y-m-d', time() - 86400))
      ->addWhere('created_at < ?', date('Y-m-d'))
      ->groupBy('member_id_to')
      ->orderBy('COUNT(*) DESC')
      ->offset($page * $max)
      ->limit($max)
      ->fetchArray();

    $list = array();
    $list['rank'] = array();
    $list['count'] = array();
    $list['model'] = array();
    $rank = 1;
    $cnt = -1;
    $i = 0;
    $memberTable = Doctrine::getTable('Member');
    foreach ($ashiatos as $ashiato)
    {
      if ($i && ($cnt != $ashiato['COUNT']))
      {
        $rank++;
      }
      $list['count'][$i] = $cnt = $ashiato['COUNT'];
      $list['model'][$i] = $memberTable->find($ashiato['member_id_to']);
      $list['rank'][$i] = $rank;
      $i++;
    }
    $list['number'] = $i;
    return $list;
  }

 /**
  * get friend ranking
  * @param $max
  * @param $page
  * @return array
  */
  public static function getFriendRanking($max, $page)
  {
    $memberRelationships = Doctrine::getTable('MemberRelationship')->createQuery()
      ->select('COUNT(*), MemberRelationship.member_id_to')
      ->where('MemberRelationship.is_friend = ?', true)
      ->addWhere('m.is_active = ?', true)
      ->leftJoin('MemberRelationship.Member m')
      ->groupBy('m.id')
      ->orderBy('COUNT(*) DESC')
      ->offset($page * $max)
      ->limit($max)
      ->fetchArray();

    $list = array();
    $list['rank'] = array();
    $list['count'] = array();
    $list['model'] = array();
    $rank = 1;
    $cnt = -1;
    $i = 0;
    $memberTable = Doctrine::getTable('Member');
    foreach ($memberRelationships as $memberRelationship)
    {
      if ($i && ($cnt != $memberRelationship['COUNT']))
      {
        $rank++;
      }
      $list['count'][$i] = $cnt = $memberRelationship['COUNT'];
      $list['model'][$i] = $memberTable->find($memberRelationship['member_id_to']);
      $list['rank'][$i] = $rank;
      $i++;
    }
    $list['number'] = $i;
    return $list;
  }

  /**
  * get community ranking
  * @param $max
  * @param $page
  * @return array
  */
  public static function getCommunityRanking($max, $page)
  {
    $communityMembers = Doctrine::getTable('CommunityMember')->createQuery()
      ->select('COUNT(*), community_id')
      ->groupBy('community_id')
      ->orderBy('COUNT(*) DESC')
      ->offset($page * $max)
      ->limit($max)
      ->fetchArray();

    $list = array();
    $list['rank'] = array();
    $list['count'] = array();
    $list['model'] = array();
    $list['admin'] = array();
    $rank = 1;
    $cnt = -1;
    $i = 0;
    $communityTable = Doctrine::getTable('Community');
    $communityMemberTable = Doctrine::getTable('CommunityMember');
    foreach ($communityMembers as $communityMember)
    {
      if ($i && ($cnt != $communityMember['COUNT']))
      {
        $rank++;
      }
      $list['count'][$i] = $cnt = $communityMember['COUNT'];
      $list['model'][$i] = $communityTable->find($communityMember['community_id']);
      $list['rank'][$i] = $rank;
      $adminCommunityMember = $communityMemberTable->getCommunityAdmin($communityMember['community_id']);
      $list['admin'][$i] = $adminCommunityMember->getMember();
      $i++;
    }
    $list['number'] = $i;

    return $list;
  }

  /**
  * get community topic comment ranking
  * @param $max
  * @param $page
  * @return array
  */
  public static function getTopicRanking($max, $page)
  {
    if (!class_exists('CommunityTopicComment'))
    {
      throw new LogicException("opCommunityTopicPlugin hasn't installed");
    }

    $communityTopicComments = Doctrine::getTable('CommunityTopicComment')->createQuery()
      ->select('COUNT(*), ct.community_id community_id, CommunityTopicComment.id')
      ->where('CommunityTopicComment.created_at >= ?', date('Y-m-d', time() - 86400))
      ->addWhere('CommunityTopicComment.created_at < ?', date('Y-m-d'))
      ->leftJoin('CommunityTopicComment.CommunityTopic ct')
      ->groupBy('ct.community_id')
      ->orderBy('COUNT(*) DESC')
      ->offset($page * $max)
      ->limit($max)
      ->fetchArray();

    $list = array();
    $list['rank'] = array();
    $list['count'] = array();
    $list['model'] = array();
    $list['admin'] = array();
    $rank = 1;
    $cnt = -1;
    $i = 0;
    $communityTable = Doctrine::getTable('Community');
    $communityMemberTable = Doctrine::getTable('CommunityMember');
    foreach ($communityTopicComments as $i => $communityTopicComment)
    {
      if ($i && ($cnt != $communityTopicComment['COUNT']))
      {
        $rank++;
      }
      $list['count'][$i] = $cnt = $communityTopicComment['COUNT'];
      $list['model'][$i] = $communityTable->find($communityTopicComment['community_id']);
      $list['rank'][$i] = $rank;
      $adminCommunityMember = $communityMemberTable->getCommunityAdmin($communityTopicComment['community_id']);
      $list['admin'][$i] = $adminCommunityMember->getMember();
      $i++;
    }
    $list['number'] = $i;

    return $list;
  }
}
