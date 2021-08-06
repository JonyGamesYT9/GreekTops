<?php

namespace Tops;

use Himbeer\LibSkin\SkinConverter;
use Tops\Tops;
use Tops\Entity\Types\ {
  Top1,
  Top2,
  Top3
};
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

/**
* Class EventsListener
* @package Tops
*/
class EventsListener implements Listener {
  
  public function onJoin(PlayerJoinEvent $e) {
    $pl = $e->getPlayer();
    SkinConverter::skinDataToImageSave($pl->getSkin()->getSkinData(), Tops::getInstance()->getDataFolder() . "Skins/{$pl->getName()}.png");
  }
  
  /**
  * @param EntityDamageByEntityEvent
  */
  public function onDamageNpcs(EntityDamageByEntityEvent $e) {
    if ($e->getEntity() instanceof Top1 or $e->getEntity() instanceof Top2 or $e->getEntity() instanceof Top3) {
      $pl = $e->getDamager();
      if ($pl instanceof Player) {
        $e->setCancelled(true);
      }
    }
  }

  /**
  * @param PlayerDeathEvent
  */
  public function addKill(PlayerDeathEvent $e) {
    $pl = $e->getPlayer();
    $causa = $e->getEntity()->getLastDamageCause();
    if ($causa instanceof EntityDamageByEntityEvent) {
      $damager = $causa->getDamager();
      if (!$damager instanceof Player) return;
      $kills = new Config(Tops::getInstance()->getDataFolder() . "Kills.yml", Config::YAML);
      $kills->set($damager->getName(), $kills->get($pl->getName()) + 1);
      $kills->save();
    }
  }
}
