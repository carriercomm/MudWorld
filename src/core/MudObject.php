<?php
namespace MudWorld\Core;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MudObject implements EventSubscriberInterface
{

    protected $was_run = false;

    public function isRun()
    {
        return $this->was_run;
    }

    public static function getSubscribedEvents()
    {
      return array();
    }
}
