<?php

namespace MudWorld\Test;

use MudWorld\Core\MudEvent;
use MudWorld\Core\MudObject;
use MudWorld\Event\WorldRunEvent;
use MudWorld\Person;
use MudWorld\World;
use PHPUnit_Framework_TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

class WorldTest extends PHPUnit_Framework_TestCase
{

    private function _makeWorld()
    {
        return new World(new EventDispatcher());
    }

    private function _makeObject()
    {
        return new MudObject();
    }

    private function _makeEvnet()
    {
        return new MudEvent();
    }

    private function _makeWorldRunEvent()
    {
        return new WorldRunEvent();
    }
    private function _makePerson()
    {
        return new Person();
    }

    public function testInitWorld()
    {
        $world = $this->_makeWorld();

        $this->assertInstanceOf('MudWorld\World', $world);
    }

    public function testAddObjectReturnTrue()
    {
        $world = $this->_makeWorld();

        $object = $this->_makeObject();
        $result = $world->add($object);

        $this->assertTrue($result);
    }

    public function testAddObjectReturnFalse()
    {

        $world = $this->_makeWorld();

        $result = $world->add();

        $this->assertEquals($result, false);
    }

    public function testAddPersonObjectReturnTrue()
    {
        $world = $this->_makeWorld();

        $person = $this->_makePerson();

        $result = $world->add($person);

        $this->assertTrue($result);
    }

    public function testDispatchMudEventReturnTrue()
    {
        $world = $this->_makeWorld();
        $event = $this->_makeEvnet();
        
        $result = $world->dispatch('world.start', $event);

        $this->assertTrue($result);
    }

    public function testDispatchMudEventReturnFalse()
    {
        $world = $this->_makeWorld();

        $result = $world->dispatch();

        $this->assertEquals($result, false);
    }

    public function testDispatchWorldUpdate()
    {

        $world = $this->_makeWorld();

        $event = $this->_makeWorldRunEvent();

        $person = $this->_makePerson();

        $world->add($person);
        
        $result = $world->dispatch('world.run', $event);

        $this->assertTrue($person->isRun());
    }
}
