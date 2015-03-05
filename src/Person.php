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
        return true;
    }

    public function onWorldRun(WorldRunEvent $event)
    {
        return true;
    }

    public function onWorldInit(WorldInitEvent $event)
    {
        return true;
    }
}
