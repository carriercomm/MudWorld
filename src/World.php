<?php
namespace MudWorld;

use MudWorld\Core\MudEvent;
use MudWorld\Core\MudObject;
use MudWorld\Core\WorldInterface;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class World implements WorldInterface
{
    protected $dispatcher;
    protected $objs;
    protected $log;

    public function __construct()
    {
        $this->dispatcher = new EventDispatcher;

        // init the log instance
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

        $this->dispatcher->addListener($event_name, $callback);

        return true;

    }

    public function addSubscriber(EventSubscriberInterface $subscriber)
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
}
