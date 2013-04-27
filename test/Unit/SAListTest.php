<?php

namespace Unit;

use Nulpunk\SAList\MoveToFrontList;

abstract class SAListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider emptyProvider
     */
    public function testAddAndSize($l)
    {
        $l->add("hest");
        $this->assertSame(1, $l->size());
    }

    /**
     * @dataProvider emptyProvider
     */
    public function testClear($l)
    {
        $l->add("hest");
        $l->add("hest");
        $l->add("hest");
        $l->add("hest");
        $l->add("hest");
        $l->clear();
        $this->assertSame(0, $l->size());
    }
    
    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testFind($l)
    {
        $e = $this->find(2, $l);
        $this->assertSame(2, $e);
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testIsIterator($l)
    {
        $this->assertTrue($l instanceof \Iterator);

        $l->rewind();
        $this->assertSame(1, $l->current());
        $l->next();
        $this->assertSame(2, $l->current());
        $l->next();
        $this->assertSame(3, $l->current());
        $l->next();
        $this->assertFalse($l->valid());
    }

    protected function find($i, $l)
    {
        return $l->find(
            function ($e) use ($i) {
                return $e == $i;
            }
        );
    }

    abstract public function threeElemeentsProvider();

    abstract public function emptyProvider();
}
