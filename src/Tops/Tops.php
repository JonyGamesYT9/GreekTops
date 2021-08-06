<?php

namespace Tops;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\entity\Entity;
use Tops\ {
  EventsListener,
  Commands\TopsCommand,
  Scheduler\EntityScheduler,
  Entity\EntityManager
};
use Tops\Entity\Types\ {
  Top1,
  Top2,
  Top3
};

/**
* Class Tops
* @package Tops
*/
class Tops extends PluginBase {

  /** @var Tops $instance */
  private static $instance;

  /**
  * @return void
  */
  public function onLoad(): void {
    Tops::$instance = $this;
  }

  /**
  * @return void
  */
  public function onEnable(): void {
    @mkdir($this->getDataFolder() . "/Skins/");
    Tops::$instance->saveResource("Kills.yml");
    Server::getInstance()->getCommandMap()->register("tops", new TopsCommand($this));
    Entity::registerEntity(Top1::class, true);
    Entity::registerEntity(Top2::class, true);
    Entity::registerEntity(Top3::class, true);
    $this->getScheduler()->scheduleRepeatingTask(new EntityScheduler($this), 20);
    Server::getInstance()->getPluginManager()->registerEvents(new EventsListener(), $this);
  }

  /**
  * @return Tops
  */
  public static function getInstance() : Tops {
    return Tops::$instance;
  }
}
