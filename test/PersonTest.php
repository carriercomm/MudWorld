<?php

namespace MudWorld\Test;

use MudWorld\Person;
use PHPUnit_Framework_TestCase;


class PersonTest extends PHPUnit_Framework_TestCase
{

  public function testInit()
  {

    $person = new Person();

    $this->assertInstanceOf('MudWorld\Person', $person);
  }
}