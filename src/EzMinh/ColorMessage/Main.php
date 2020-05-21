<?php

namespace EzMinh\ColorMessage;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
    }
    public function onChat(PlayerChatEvent $e) {
        $player = $e->getPlayer();
        if($player->hasPermission("color.message")) {
            $msg = $e->getMessage();
            switch($this->getConfig()->get("color")) {
                case "red":
                    $e->setMessage(C::RED . $msg);
                break;
                case "gray":
                    $e->setMessage(C::GRAY . $msg);
                break;
                case "black":
                    $e->setMessage(C::BLACK . $msg);
                break;
                case "yellow":
                    $e->setMessage(C::YELLOW . $msg);
                break;
                case "green":
                    $e->setMessage(C::GREEN . $msg);
                break;
                case "blue":
                    $e->setMessage(C::BLUE . $msg);
                break;
            default:
                $e->setMessage(C::WHITE . $msg);
            break;
            }
        }
    }
}
