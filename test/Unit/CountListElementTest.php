<?php

namespace Unit;

use Nulpunk\SAList\CountListElement;

class CountListElementTest extends \PHPUnit_Framework_TestCase
{
    public function testBasic()
    {
        $e = new CountListElement(42);
        $this->assertSame(42, $e->getElement());
        $e->increment();
        $e->increment();
        $this->assertSame(2, $e->getCount());
    }
}
