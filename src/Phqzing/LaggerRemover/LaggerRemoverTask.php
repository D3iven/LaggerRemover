<?php

namespace Phqzing\LaggerRemover;

use pocketmine\scheduler\Task;

class LaggerRemoverTask extends Task {
  
  private $plugin;
  
  public function __construct(Main $plugin){
    $this->plugin = $plugin;
  }
  
  public function onRun(int $tick){
    if($this->plugin->getConfig()->get("always-check") == false){
      $this->plugin->getScheduler()->cancelTask($this->getTaskId());
      return;
    }
    foreach($this->plugin->getServer()->getOnlinePlayers() as $players){
      if(in_array($players->getName(), $this->plugin->getConfig()->get("whitelisted-players"))) return;
      if($players->getPing() >= $this->plugin->getConfig()->get("max-ping")){
        $message = $this->plugin->getConfig()->get("kick-message");
        $message = str_replace("{ping}", $players->getPing(), $message);
        $players->kick($message, false);
      }
    }
  }
}
