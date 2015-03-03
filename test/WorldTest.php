<?php
namespace MudWorld\Test;

use MudWorld\Core\MudObject;
use MudWorld\Person;
use MudWorld\World;
use PHPUnit_Framework_TestCase;

class WorldTest extends PHPUnit_Framework_TestCase
{

    private function _makeWorld()
    {
        return new World();
    }

    private function _makeObject()
    {
        return new MudObject();
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

    public function testAddObjectReturnFalse()
    {

        $world = $this->_makeWorld();

        $result = $world->add();

        $this->assertFalse($result);
    }

    public function testAddPersonObjectReturnTrue()
    {
        $world = $this->_makeWorld();

        $person = $this->_makePerson();

        $result = $world->add($person);

        $this->assertTrue($result);
    }

    public function testAddNullReturnFalse()
    {
        $world = $this->_makeWorld();

        $result = $world->add(null);

        $this->assertFalse($result);
    }

    public function testDispatchNullEventReturnFalse()
    {
        $world = $this->_makeWorld();

        $result = $world->dispatch();

        $this->assertEquals($result, false);
    }

}
