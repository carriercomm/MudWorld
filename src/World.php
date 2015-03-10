<?php
namespace MudWorld;

use MudWorld\Core\MudEvent;
use MudWorld\Core\MudObject;
use MudWorld\Core\WorldInterface;

use MudWorld\Event\WorldInitEvent;
use MudWorld\Event\WorldDestroyEvent;
use MudWorld\Event\WorldRunEvent;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class World implements WorldInterface
{
    protected $dispatcher = null;
    protected $objs = array();
    protected $log = null;

    public function __construct()
    {
        $this->dispatcher = new EventDispatcher;

        // init the log instance
        $this->log = new Logger('MudWorld');
        $this->log->pushHandler(new StreamHandler('logs/dev.log'), Logger::DEBUG);
    }

    public function getLog()
    {
        return $this->log;
    }

    public function add(MudObject $obj = null)
    {
        if (is_null($obj)) {
            return false;
        }

        $this->objs[] = $obj;

        $this->addSubscriber($obj);

        return true;
    }

    public function addListener($event_name = null, $callback = null)
    {
        if (is_null($event_name) or is_null($callback)) {
            return false;
        }

        if (false === is_callable($callback)) {
            return false;
        }

        $this->dispatcher->addListener($event_name, $callback);

        return true;

    }

    public function addSubscriber(MudObject $subscriber)
    {
        $this->dispatcher->addSubscriber($subscriber);
    }

    public function dispatch($event_name = null, MudEvent $event = null)
    {
        if (is_null($event_name) or is_null($event)) {
            return false;
        }

        $this->dispatcher->dispatch($event_name, $event);

        return true;
    }

    public function init()
    {
        $event = new WorldInitEvent($this);

        $this->dispatch('world.init', $event);
        $this->dispatch('world.after.init', $event);
    }

    public function destroy()
    {
        $event = new WorldDestroyEvent($this);

        $this->dispatch('world.destroy', $event);
        $this->dispatch('world.after.destroy', $event);
    }

    public function run()
    {
        $event = new WorldRunEvent($this);

        $this->dispatch('world.run', $event);
        $this->dispatch('world.after.run', $event);
    }
}
