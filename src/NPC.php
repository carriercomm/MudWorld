<?php
namespace MudWorld;

use MudWorld\Core\MudObject;
use MudWorld\Event\WorldInitEvent;
use MudWorld\Event\WorldRunEvent;
use MudWorld\Event\WorldDestroyEvent;

class NPC extends MudObject
{

    public function onWorldInit(WorldInitEvent $event)
    {
        return true;
    }

    public function onWorldDestroy(WorldDestroyEvent $event)
    {
        return true;
    }

    public function onWorldRun(WorldRunEvent $event)
    {
        return true;
    }
}
