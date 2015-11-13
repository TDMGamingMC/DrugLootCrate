<?php
// Author: CavinMiana | Plugin Name: DrugLootCrate

namespace CavinMiana\DrugLootCrate;

use pocketmine\plugin\PluginManager;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\entity\Effect;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\tile\Tile;
use pocketmine\tile\Sponge;
use pocketmine\event\inventory\InventoryOpenEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\inventory\Inventory;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\Config;
use pocketmine\inventory\DoubleChestInventory;
use pocketmine\inventory\ChestInventory;
use pocketmine\math\Vector3;


class Main extends PluginBase implements Listener{
	
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getServer()->getLogger()->info(TextFormat:: GREEN . "[DrugLootCrate] Plugin Loaded!");
        $this->getServer()->getLogger()->info(TextFormat:: GREEN . "[DrugLootCrate] Plugin made by CavinMiana");
    }
public function onBlockPlaceEvent(BlockPlaceEvent $ev) {
			$bl = $ev->getBlock();
			if($bl->getId() == 39){
			$event->setCancelled(true);
		}
		if($bl->getId() == 32){
			$event->setCancelled(true);
		}
		if ($ev->isCancelled()) return;
		if ($bl->getId() != Block::SPONGE || $bl->getSide(Vector3::SIDE_DOWN)->getId() != Block::SPONGE) return;
		$ev->getPlayer()->sendMessage("Placed Drug Crate...");
	}
		public function onInventoryOpenEvent(InventoryOpenEvent $ev) {
		if ($ev->isCancelled()) return;
		$player = $ev->getPlayer();
		$inv = $ev->getInventory();
		if (!$this->isCrate($inv)) return;
		if($ev->getPlayer()->getInventory()->getItemInHand()->getId() == 341){
			$ev->getPlayer()->getInventory()->removeItem(Item::get(341, 0, 1));
			$drugs = array("357", "357", "357", "357", "338", "338", "338", "338", "338", "338", "338", "338", "353", "353", "353", "353", "353", "353", "32", "32", "32", "32", "32", "32", "32", "32", "32", "32", "39", "39", "39", "39", "39", "39", "287", "287", "287", "361", "361", "362", "289", "289", "289");
			$d = $drugs[array_rand($drugs)];
			$amount = array("10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "10", "32", "32", "32", "32", "32", "32", "32", "32", "32", "32", "32", "32", "32", "32", "64", "64", "64", "64", "64");
			$a = $amount[array_rand($amount)];
			$ev->getPlayer()->getInventory()->addItem(Item::get($d, 0, $a));
	    $ev->getPlayer()->sendMessage(TextFormat::GREEN."---------------");
		$ev->getPlayer()->sendMessage(TextFormat::BOLD."¬ß6Redeemed Crate!");
		$ev->getPlayer()->sendMessage(TextFormat::GREEN."---------------");
		$ev->getPlayer()->sendMessage(TextFormat::BOLD."¬ßbITEMS WON:");
		if($d == 357){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."PotCookie  x".$a);
		}
		elseif($d == 338){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."Weed  x".$a);
		}
		elseif($d == 353){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."Cocaine  x".$a);
		}
		elseif($d == 32){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."Hash  x".$a);
		}
		elseif($d == 39){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."MagicMushroom  x".$a);
		}
		elseif($d == 287){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."Molly  x".$a);
		}
		elseif($d == 361){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."Steroids  x".$a);
		}
		elseif($d == 362){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."Opium  x".$a);
		}
		elseif($d == 289){
			$ev->getPlayer()->sendMessage(TextFormat::GOLD."POWDER x".$a);
		}
		$ev->setCancelled();
		}
		else{
			$ev->getPlayer()->sendMessage(TextFormat::RED."------------------");
			$ev->getPlayer()->sendMessage(TextFormat::YELLOW." DRUG CRATE");
			$ev->getPlayer()->sendMessage(TextFormat::RED."------------------");
			$ev->getPlayer()->sendMessage(TextFormat::AQUA."Win up to 64 drugs!");
			$ev->getPlayer()->sendMessage(TextFormat::RED."------------------");
			$ev->setCancelled();
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
			$ev->getPlayer()->sendTip(TextFormat::AQUA."USE /vote TO GET A CRATEKEY.");
		}
		}
    public function onPlayerItemConsumeEvent(PlayerItemConsumeEvent $event){
        $player = $event->getPlayer();
        $drug = $event->getItem()->getId();
        if($drug == 357){
            $effect = Effect::getEffect(10);
            $effect->setDuration(20 * 150);
            $effect->setAmplifier(8);
            $player->addEffect($effect);
			$effect2 = Effect::getEffect(8);
			$effect2->setDuration(20 * 250);
			$effect2->setAmplifier(3);
			$player->addEffect($effect2);
            $player->sendMessage("Woah! That was not an ordinary cookie...");
        }
    }
    public function onPlayerInteractEvent(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        if($event->getItem()->getId() == 353){
            $effect1 = Effect::getEffect(5);
            $effect1->setDuration(20 * 60);
            $effect1->setAmplifier(3);
            $player->addEffect($effect1);
            $effect2 = Effect::getEffect(11);
            $effect2->setDuration(20 * 65);
            $effect2->setAmplifier(5);
            $player->addEffect($effect2);  
            $effect3 = Effect::getEffect(10);
            $effect3->setDuration(20 * 60);
            $player->addEffect($effect3);
            $effect4 = Effect::getEffect(9);
            $effect4->setDuration(20 * 120);
            $effect4->setAmplifier(2);
            $player->addEffect($effect4);
            $player->sendMessage("Some pretty strong stuff. Wow.");
            $item = Item::get(353, 0, 1);
            $player->getInventory()->removeItem($item);
        }
        if($event->getItem()->getId() == 338){
            $effect1 = Effect::getEffect(1);
            $effect1->setDuration(20 * 120);
            $effect1->setAmplifier(5);
            $player->addEffect($effect1);
        $player->sendMessage("Everything is just great.");
        $item = Item::get(338, 0, 1);
        $player->getInventory()->removeItem($item);
        }
		if($event->getItem()->getId() == 39){
			$player = $event->getPlayer();
			$effect = Effect::getEffect(21);
			$effect->setDuration(20 * 120);
			$effect->setAmplifier(25);
			$player->addEffect($effect);
			$effect2 = Effect::getEffect(3);
			$effect2->setDuration(20 * 120);
			$effect2->setAmplifier(25);
			$player->addEffect($effect2);
			$player->sendMessage("Feelin a bit tingly");
			$item = Item::get(39, 0, 1);
            $player->getInventory()->removeItem($item);
		}
		if($event->getItem()->getId() == 361){
			$player = $event->getPlayer();
			$effect1 = Effect::getEffect(5);
			$effect1->setDuration(20 * 50);
			$effect1->setAmplifier(25);
			$player->addEffect($effect1);
			$effect2 = Effect::getEffect(3);
			$effect2->setDuration(20 * 50);
			$effect2->setAmplifier(25);
			$player->addEffect($effect2);
			$effect3 = Effect::getEffect(11);
			$effect3->setDuration(250);
			$effect3->setAmplifier(25);
			$player->addEffect($effect3);
			$player->sendMessage("Man do I feel strong!");
			$item = Item::get(361, 0, 1);
            $player->getInventory()->removeItem($item);
		}
		if($event->getItem()->getId() == 32){
			$player = $event->getPlayer();
			$effect = Effect::getEffect(1);
			$effect->setDuration(20 * 50);
			$effect->setAmplifier(3);
			$player->addEffect($effect);
			$player->sendMessage("Seems cheap.  Not as potent but still...");
            $item = Item::get(32, 0, 1);
            $player->getInventory()->removeItem($item);
		}
		if($event->getItem()->getId() == 287){
			$effect1 = Effect::getEffect(5);
            $effect1->setDuration(20 * 90);
            $effect1->setAmplifier(6);
            $player->addEffect($effect1);
            $effect2 = Effect::getEffect(11);
            $effect2->setDuration(20 * 95);
            $effect2->setAmplifier(8);
            $player->addEffect($effect2);  
            $effect3 = Effect::getEffect(10);
            $effect3->setDuration(20 * 90);
            $player->addEffect($effect3);
            $effect4 = Effect::getEffect(9);
            $effect4->setDuration(20 * 150);
            $effect4->setAmplifier(999);
            $player->addEffect($effect4);
			$effect5 = Effect::getEffect(2);
			$effect5->setDuration(20 * 90);
			$effect5->setAmplifier(5);
			$player->addEffect($effect5);
            $player->sendMessage("WOW!  STRONG STUFF");
            $item = Item::get(287, 0, 1);
            $player->getInventory()->removeItem($item);
		}
		if($event->getItem()->getId() == 362){
			$effect1 = Effect::getEffect(3);
			$effect1->setDuration(20 * 65);
			$effect1->setAmplifier(15);
			$player->addEffect($effect1);
			$effect2 = Effect::getEffect(2);
			$effect2->setDuration(20 * 65);
			$effect2->setAmplifier(3);
			$player->addEffect($effect2);
			$player->sendMessage("Just soothing...");
			$item = Item::get(362, 0, 1);
			$player->getInventory()->removeItem($item);
		}
		if($event->getItem()->getId() == 289){
			$effect1 = Effect::getEffect(3);
			$effect1->setDuration(20 * 65);
			$effect1->setAmplifier(15);
			$player->addEffect($effect1);
			$player->sendMessage("WOW...");
			$item = Item::get(289, 0, 1);
			$player->getInventory()->removeItem($item);
		}
		
    }
		public function isCrate(Inventory $inv) {
		if ($inv instanceof DoubleChestInventory) return false;
		if (!($inv instanceof ChestInventory)) return false;
		$tile = $inv->getHolder();
		if (!($tile instanceof Chest)) return false;
		$bl = $tile->getBlock();
		if ($bl->getId() != Block::CHEST) return false;
		if ($bl->getSide(Vector3::SIDE_DOWN)->getId() != Item::SPONGE) return false;
		return true;
	}
	public function onPlayerItemHeldEvent(PlayerItemHeldEvent $event){
        $item = $event->getItem();
        $player = $event->getPlayer();
        if($item instanceof Item){
            switch ($item->getId()){
                case 357:
                 $player->sendPopup("¬ß6Pot_Cookie");
                 break;
				 case 353: 
				 $player->sendPopup("¬ß6Cocaine");
				 break;
				 case 338:
				 $player->sendPopup("¬ß6Weed");
				 break;
				 case 39:
				 $player->sendPopup("¬ß6Magic_Mushroom");
				 break;
				 case 361:
				 $player->sendPopup("¬ß6Steroids");
				 break;
				 case 32:
				 $player->sendPopup("¬ß6Hash");
				 break;
				 case 287:
				 $player->sendPopup("¬ß6Molly");
				 break;
				 case 362:
				 $player->sendPopup("¬ß6Opium");
				 break;
				 case 289:
				 $player->sendPopup("¬ß6POWDER");
				 break;
				 case 341:
				 $player->sendPopup(TextFormat::AQUA."Crate Key");
			}
		}
	}
	public function onDisable(){
		$this->getLogger()->info(TextFormat:: RED . "[DrugLootCrate] Plugin Disabled");
		$this->getLogger()->info(TextFormat:: RED . "[DrugLootCrate] Bye!");
	}
}
     

