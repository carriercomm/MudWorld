<?php
namespace MudWorld\Core;

use MudWorld\Event\WorldDestroyEvent;
use MudWorld\Event\WorldInitEvent;
use MudWorld\Event\WorldRunEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class MudObject implements EventSubscriberInterface
{

    protected $was_init = false;
    protected $was_destory = false;
    protected $was_run = false;
    protected $log = null;

    public static $subscribe_event = array(
        'world.init' => array('onWorldInit', 0),
        'world.run' => array('onWorldRun', 0),
        'world.destroy' => array('onWorldDestroy', 0),
        'world.after.init' => array('onWorldAfterInit', 0),
        'world.after.run' => array('onWorldAfterRun', 0),
        'world.after.destroy' => array('onWorldAfterDestroy', 0),
    );

    public function reset()
    {
        $this->was_init = false;
        $this->was_run = false;
        $this->was_destroy = false;
    }

    public function isInit()
    {
        return $this->was_init;
    }

    public function isDestroy()
    {
        return $this->was_destroy;
    }

    public function isRun()
    {
        return $this->was_run;
    }

    public static function getSubscribedEvents()
    {
        return self::$subscribe_event;
    }

    abstract public function onWorldInit(WorldInitEvent $event);

    public function onWorldAfterInit(WorldInitEvent $event)
    {
        $this->was_init = true;
    }

    abstract public function onWorldRun(WorldRunEvent $event);

    public function onWorldAfterRun(WorldRunEvent $event)
    {
        $this->was_run = true;
    }

    abstract public function onWorldDestroy(WorldDestroyEvent $event);

    public function onWorldAfterDestroy(WorldDestroyEvent $event)
    {
        $this->was_destroy = true;
    }
}
