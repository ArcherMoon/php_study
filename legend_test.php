#! /usr/local/bin/php
<?php

//5牌对决
if (1)
{
	$uid = 1;
	$req = new LGReqInfo(false);
	$req->uid = $uid;
	$req->sender = LGUser::GetUser($uid);
	
	$params = array();
	$req->params = $params;
	_do_start_cards_duel($req);

	
	for ($i = 0; $i < 5; $i++)
	{
	$uid = 1;
	$req = new LGReqInfo(false);
	$req->uid = $uid;
	$req->sender = LGUser::GetUser($uid);
	
	$params = array();
	$params["a"] = 66;
	$params["d"] = 4 - $i;
	$params["r"] = $i + 1;
	$req->params = $params;
	_do_duel($req);
	}
	
	
	$achievements = $req->sender->getAchievements();
	$flag =
	NEWBIE_FLAG_WON_FIRST_DUEL
	;
	$achievements->newbie_flag &= (~$flag);
	$achievements->save();
	
	$duel = LGUserCardsDuel::GetDuelForUser($uid);
	$duel->clearData();
}