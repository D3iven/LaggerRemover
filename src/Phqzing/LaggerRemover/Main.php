<?php

namespace Phqzing\LaggerRemover;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {
  
  
  public function onEnable(){
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    
    if($this->getConfig()->get("always-check") == "true"){
      $this->getScheduler()->scheduleRepeatingTask(new LaggerRemoverTask($this), 10);
    }
  }
  
  
  public function onJoin(PlayerJoinEvent $ev){
    $player = $ev->getPlayer();
    if(in_array($player->getName(), $this->getConfig()->get("whitelisted-players"))) return;
    if($player->getPing() >= $this->getConfig()->get("max-ping")){
      $message = $this->getConfig()->get("kick-message");
      $message = str_replace("{ping}", $player->getPing(), $message);
      $player->kick($message, false);
    }
  }
}
