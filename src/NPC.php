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
        $this->was_init = true;

        return true;
    }

    public function onWorldDestroy(WorldDestroyEvent $event)
    {
        $this->was_destroy = true;

        return true;
    }

    public function onWorldRun(WorldRunEvent $event)
    {
        $this->was_run = true;

        return true;
    }
}
