<?php

namespace Tops\Commands;

use Tops\Tops;
use Tops\Entity\EntityManager;
use Tops\Entity\Types\ {
  Top1,
  Top2,
  Top3
};
use pocketmine\command\ {
  Command,
  CommandSender
};
use pocketmine\Player;
use pocketmine\Server;

/**
* Class TopsCommand
* @package Tops\Commands;
*/
class TopsCommand extends Command {

  /** @var Tops $plugin */
  private $plugin;

  /**
  * @param Tops $plugin
  */
  public function __construct(Tops $plugin) {
    $this->plugin = $plugin;
    parent::__construct("tops", "GreekTops By: @Jony#6911", null, ["top"]);
  }

  /**
  * @param CommandSender $pl
  * @param string $label
  * @param array $args
  * @return mixed|void
  */
  public function execute(CommandSender $pl, string $label, array $args) {
    $entity = new EntityManager();
    if ($pl instanceof Player) {
      if ($pl->isOp()) {
        if (empty($args[0])) {
          $pl->sendMessage("§cSelect a Top using /tops (1/2/3) or /tops kill");
          return false;
        }
        switch ($args[0]) {
          case '1':
            $entity->setTop1($pl);
            $pl->sendMessage("§aYou placed top number 1");
            break;
          case '2':
            $entity->setTop2($pl);
            $pl->sendMessage("§aYou placed top number 2");
            break;
          case '3':
            $entity->setTop3($pl);
            $pl->sendMessage("§aYou placed top number 3");
            break;
          case 'kill':
            foreach ($pl->getLevel()->getEntities() as $entities) {
              if ($npc instanceof Top1) {
                $npc->kill();
              } else if ($npc instanceof Top2) {
                $npc->kill();
              } else if ($npc instanceof Top3) {
                $npc->kill();
              }
            }
            $pl->sendMessage("§aAll Tops removed correctly.");
            break;
          default:
            $pl->sendMessage("§cTop {$args[0]} not exist try again.");
            break;
        }
      } else {
        $pl->sendMessage("§cYou no have permissions to use this command.");
      }
    }
  }
}
