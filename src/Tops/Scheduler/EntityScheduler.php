<?php

namespace Tops\Scheduler;

use Tops\Tops;
use Tops\Entity\Types\ {
  Top1,
  Top2,
  Top3
};
use Himbeer\LibSkin\SkinConverter;
use pocketmine\scheduler\Task;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\entity\Skin;

/**
* Class EntityScheduler
* @package Tops\Scheduler
*/
class EntityScheduler extends Task {

  /** @var Tops $plugin */
  private $plugin;

  /**
  * @param Tops $plugin
  */
  public function __construct(Tops $plugin) {
    $this->plugin = $plugin;
  }

  /**
  * @param int $tick
  */
  public function onRun(int $tick) {
    foreach (Server::getInstance()->getLevels() as $levels) {
      foreach ($levels->getEntities() as $entities) {
        if ($entities instanceof Top1) {
          $entities->setNameTag(EntityScheduler::setTop1());
          $entities->setNameTagAlwaysVisible(true);
          $entities->setScale(0.7);
        } else if ($entities instanceof Top2) {
          $entities->setNameTag(EntityScheduler::setTop2());
          $entities->setNameTagAlwaysVisible(true);
          $entities->setScale(0.7);
        } else if ($entities instanceof Top3) {
          $entities->setNameTag(EntityScheduler::setTop3());
          $entities->setNameTagAlwaysVisible(true);
          $entities->setScale(0.7);
        }
      }
    }
  }

  /**
  * @return string
  */
  public static function setTop1(): string {
    $kills = new Config(Tops::getInstance()->getDataFolder() . "Kills.yml", Config::YAML);
    $tops = [];
    $title = "§l§6Top #1" . "\n";
    foreach ($kills->getAll() as $key => $top) {
      array_push($tops, $top);
    }
    natsort($tops);
    $pl = array_reverse($tops);
    if (max($tops) != null) {
      $top1 = array_search(max($tops), $kills->getAll());
      $subtitle1 = "§f{$top1}" . "\n" . "§f" . max($tops) . " §cKills";
      foreach (Server::getInstance()->getLevels() as $levels) {
        foreach ($levels->getEntities() as $entities) {
          if ($entities instanceof Top1) {
            $skinData = SkinConverter::imageToSkinDataFromPngPath(Tops::getInstance()->getDataFolder() . "Skins/{$top1}.png");
            $entities->setSkin(new Skin("custom_skin", $skinData));
          }
        }
      }
    } else {
      $subtitle1 = '§cNothing';
    }
    return $title . $subtitle1;
  }

  /**
  * @return string
  */
  public static function setTop2(): string {
    $kills = new Config(Tops::getInstance()->getDataFolder() . "Kills.yml", Config::YAML);
    $tops = [];
    $title = "§l§6Top #2" . "\n";
    foreach ($kills->getAll() as $key => $top) {
      array_push($tops, $top);
    }
    natsort($tops);
    $pl = array_reverse($tops);
    if ($pl[1] != null) {
      $top1 = array_search($pl[1], $kills->getAll());
      $subtitle1 = "§f{$top1}" . "\n" . "§f" . $pl[1] . " §cKills";
      foreach (Server::getInstance()->getLevels() as $levels) {
        foreach ($levels->getEntities() as $entities) {
          if ($entities instanceof Top2) {
            $skinData = SkinConverter::imageToSkinDataFromPngPath(Tops::getInstance()->getDataFolder() . "Skins/{$top1}.png");
            $entities->setSkin(new Skin("custom_skin", $skinData));
          }
        }
      }
    } else {
      $subtitle1 = '§cNothing';
    }
    return $title . $subtitle1;
  }

  /**
  * @return string
  */
  public static function setTop3(): string {
    $kills = new Config(Tops::getInstance()->getDataFolder() . "Kills.yml", Config::YAML);
    $tops = [];
    $title = "§l§6Top #3" . "\n";
    foreach ($kills->getAll() as $key => $top) {
      array_push($tops, $top);
    }
    natsort($tops);
    $pl = array_reverse($tops);
    if ($pl[2] != null) {
      $top1 = array_search($pl[2], $kills->getAll());
      $subtitle1 = "§f{$top1}" . "\n" . "§f" . $pl[2] . " §cKills";
      foreach (Server::getInstance()->getLevels() as $levels) {
        foreach ($levels->getEntities() as $entities) {
          if ($entities instanceof Top3) {
            $skinData = SkinConverter::imageToSkinDataFromPngPath(Tops::getInstance()->getDataFolder() . "Skins/{$top1}.png");
            $entities->setSkin(new Skin("custom_skin", $skinData));
          }
        }
      }
    } else {
      $subtitle1 = '§cNothing';
    }
    return $title . $subtitle1;
  }
}
