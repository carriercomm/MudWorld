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

        $person = $this->_makePerson();

        $world->add($person);

        $world->init();

        $this->assertTrue($person->isInit());
    }

    public function testPersonRunReturnTrue()
    {

        $world = $this->_makeWorld();

        $person = $this->_makePerson();

        $world->add($person);

        $world->run();

        $this->assertTrue($person->isRun());
    }

    public function testPersonDestroyReturnTrue()
    {
        $world = $this->_makeWorld();

        $person = $this->_makePerson();

        $world->add($person);

        $world->destroy();
        
        $this->assertTrue($person->isDestroy());
    }
}
