<?php
namespace MudWorld\Test;

use MudWorld\Core\WorldInterface;
use MudWorld\Event\WorldDestroyEvent;
use MudWorld\Event\WorldInitEvent;
use MudWorld\Event\WorldRunEvent;
use MudWorld\Person;
use MudWorld\World;
use PHPUnit_Framework_TestCase;

class PersonTest extends PHPUnit_Framework_TestCase
{

    private function _makePerson()
    {
        return new Person();
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

        $person = $this->_makePerson();

        $this->assertInstanceOf('MudWorld\Person', $person);

    }

    public function testPersonInitReturnTrue()
    {

        $world = $this->_makeWorld();

        $event = $this->_makeWorldInitEvent($world);

        $person = $this->_makePerson();

        $world->add($person);

        $world->dispatch('world.init', $event);
        $world->dispatch('world.after.init', $event);

        $this->assertTrue($person->isInit());
    }

    public function testPersonRunReturnTrue()
    {

        $world = $this->_makeWorld();

        $event = $this->_makeWorldRunEvent($world);

        $person = $this->_makePerson();

        $world->add($person);

        $world->dispatch('world.run', $event);
        $world->dispatch('world.after.run', $event);

        $this->assertTrue($person->isRun());
    }

    public function testPersonDestroyReturnTrue()
    {
        $world = $this->_makeWorld();

        $event = $this->_makeWorldDestroyEvent($world);

        $person = $this->_makePerson();

        $world->add($person);

        $world->dispatch('world.destroy', $event);
        $world->dispatch('world.after.destroy', $event);
        
        $this->assertTrue($person->isDestroy());
    }
}
