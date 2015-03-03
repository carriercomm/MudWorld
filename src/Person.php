<?php
namespace MudWorld;

use MudWorld\Core\MudObject;
use MudWorld\Event\WorldDestroyEvent;
use MudWorld\Event\WorldInitEvent;
use MudWorld\Event\WorldRunEvent;

class Person extends MudObject
{

    public function __construct()
    {

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

    public function onWorldInit(WorldInitEvent $event)
    {
        $this->was_init = true;
        return true;
    }
}
