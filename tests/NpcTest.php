<?php
namespace MudWorld\Test;

use MudWorld\Core\WorldInterface;
use MudWorld\Event\WorldDestroyEvent;
use MudWorld\Event\WorldInitEvent;
use MudWorld\Event\WorldRunEvent;
use MudWorld\NPC;
use MudWorld\World;
use PHPUnit_Framework_TestCase;

class NpcTest extends PHPUnit_Framework_TestCase
{

    private function _makeNPC()
    {
        return new NPC();
    }

    private function _makeWorld()
    {
        return new World();
    }

    private function _makeWorldRunEvent(WorldInterface $world)
    {
        return new WorldRunEvent($world);
    }

    private function _makeWorldInitEvent(WorldInterface $world)
    {
        return new WorldInitEvent($world);
    }

    private function _makeWorldDestroyEvent(WorldInterface $world)
    {
        return new WorldDestroyEvent($world);
    }

    public function testInit()
    {

        $npc = $this->_makeNPC();

        $this->assertInstanceOf('MudWorld\NPC', $npc);

    }

    public function testNpcInitReturnTrue()
    {

        $world = $this->_makeWorld();

        $event = $this->_makeWorldInitEvent($world);

        $npc = $this->_makeNPC();

        $world->add($npc);

        $result = $world->dispatch('world.init', $event);

        $this->assertTrue($npc->isInit());
    }

    public function testNpcRunReturnTrue()
    {

        $world = $this->_makeWorld();

        $event = $this->_makeWorldRunEvent($world);

        $npc = $this->_makeNPC();

        $world->add($npc);

        $result = $world->dispatch('world.run', $event);

        $this->assertTrue($npc->isRun());
    }

    public function testNpcDestroyReturnTrue()
    {
        $world = $this->_makeWorld();

        $event = $this->_makeWorldDestroyEvent($world);

        $npc = $this->_makeNPC();

        $world->add($npc);

        $result = $world->dispatch('world.destroy', $event);

        $this->assertTrue($npc->isDestroy());
    }

}
