<?php
namespace MudWorld\Core;

use Symfony\Component\EventDispatcher\Event;
use MudWorld\Core\WorldInterface;

abstract class MudEvent extends Event
{
  protected $world = null;

  public function __construct(WorldInterface $world)
  {
    $this->world = $world;
  }

  public function getWorld()
  {
    return $this->world;
  }

}
