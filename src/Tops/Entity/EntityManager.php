<?php

namespace Tops\Entity;

use pocketmine\Player;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use Tops\Entity\Types\ {
  Top1,
  Top2,
  Top3
};

/**
* Class EntityManager
* @package Tops\Entity
*/
class EntityManager {

  /**
  * @param Player $pl
  */
  public function setTop1(Player $pl) {
    $nbt = new CompoundTag("", [
      new ListTag("Pos", [
        new DoubleTag("", $pl->getX()),
        new DoubleTag("", $pl->getY()),
        new DoubleTag("", $pl->getZ())
      ]),
      new ListTag("Motion", [
        new DoubleTag("", 0),
        new DoubleTag("", 0),
        new DoubleTag("", 0)
      ]),
      new ListTag("Rotation", [
        new FloatTag("", $pl->yaw),
        new FloatTag("", $pl->pitch)
      ]),
      new CompoundTag("Skin", [
        new StringTag("Data", $pl->getSkin()->getSkinData()),
        new StringTag("Name", $pl->getSkin()->getSkinData()),
      ]),
    ]);
    $human = new Top1($pl->getLevel(), $nbt);
    $human->setScale(0.5);
    $human->setNametagVisible(true);
    $human->setNameTagAlwaysVisible(true);
    $human->setImmobile(true);
    $human->spawnToAll();
  }

  /**
  * @param Player $pl
  */
  public function setTop2(Player $pl) {
    $nbt = new CompoundTag("", [
      new ListTag("Pos", [
        new DoubleTag("", $pl->getX()),
        new DoubleTag("", $pl->getY()),
        new DoubleTag("", $pl->getZ())
      ]),
      new ListTag("Motion", [
        new DoubleTag("", 0),
        new DoubleTag("", 0),
        new DoubleTag("", 0)
      ]),
      new ListTag("Rotation", [
        new FloatTag("", $pl->yaw),
        new FloatTag("", $pl->pitch)
      ]),
      new CompoundTag("Skin", [
        new StringTag("Data", $pl->getSkin()->getSkinData()),
        new StringTag("Name", $pl->getSkin()->getSkinData()),
      ]),
    ]);
    $human = new Top2($pl->getLevel(), $nbt);
    $human->setScale(0.5);
    $human->setNametagVisible(true);
    $human->setNameTagAlwaysVisible(true);
    $human->setImmobile(true);
    $human->spawnToAll();
  }

  /**
  * @param Player $pl
  */
  public function setTop3(Player $pl) {
    $nbt = new CompoundTag("", [
      new ListTag("Pos", [
        new DoubleTag("", $pl->getX()),
        new DoubleTag("", $pl->getY()),
        new DoubleTag("", $pl->getZ())
      ]),
      new ListTag("Motion", [
        new DoubleTag("", 0),
        new DoubleTag("", 0),
        new DoubleTag("", 0)
      ]),
      new ListTag("Rotation", [
        new FloatTag("", $pl->yaw),
        new FloatTag("", $pl->pitch)
      ]),
      new CompoundTag("Skin", [
        new StringTag("Data", $pl->getSkin()->getSkinData()),
        new StringTag("Name", $pl->getSkin()->getSkinData()),
      ]),
    ]);
    $human = new Top3($pl->getLevel(), $nbt);
    $human->setScale(0.5);
    $human->setNametagVisible(true);
    $human->setNameTagAlwaysVisible(true);
    $human->setImmobile(true);
    $human->spawnToAll();
  }
}
