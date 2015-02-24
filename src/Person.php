<?php

namespace MudWorld;

use MudWorld\Core\MudObject;
use MudWorld\Event\WorldRunEvent;

class Person extends MudObject
{

    public static function getSubscribedEvents()
    {
      return array(
        'world.run' => array('onWorldRun', 0),
      );
    }

    public function onWorldRun(WorldRunEvent $event)
    {
        $this->was_run = true;
        return true;
    }
}
