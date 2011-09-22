<?php
namespace modules\mafia;

use awesomeircbot\module\Module;
use awesomeircbot\server\Server;
use modules\mafia\MafiaGame;

class MafiaOpt extends Module {
	
	public static $requiredUserLevel = 7;
	
	private function showStates()
	{
		$server = Server::getInstance();
		if ( MafiaGame::$SHOW_MAFIA_COUNT)
			$server->message(MafiaGame::$LOBBY_ROOM,"Show identity on day punish is ON");
		else
			$server->message(MafiaGame::$LOBBY_ROOM,"Show identity on day punish is OFF");
			
		if ( MafiaGame::$WON_STATE_NORMAL)
			$server->message(MafiaGame::$LOBBY_ROOM,"Mafia win state is when mafia cnt = ppl cnt");
		else
			$server->message(MafiaGame::$LOBBY_ROOM,"Mafia win state is when ppl cnt = 0");			
	}
	
	public function run() {
		$server = Server::getInstance();
		$opt =  $this->parameters(1);
		if (!$opt)
		{
			$this->showStates();
			return;
		}
		$value = $this->parameters(2 , true);
		switch (strtoupper($opt))
		{
			case "SHOW-MAFIA":
				 MafiaGame::$SHOW_MAFIA_COUNT = $value;
				 break;
			case "MAFIA-STATE":
				 MafiaGame::$WON_STATE_NORMAL = $value;
				 break;				 
		}
	}
}