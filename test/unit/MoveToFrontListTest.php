<?php

use Nulpunk\SAList\MoveToFrontList;

class MoveToFrontListTest extends PHPUnit_Framework_TestCase
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
        $l->clear();
        $this->assertSame(0, $l->size());
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testFind($l)
    {
        $l->find(function ($i) { return $i == 2; });
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testMoveToFront($l)
    {
        $l->find(function ($i) { return $i == 2; });
        $l->rewind();
        $this->assertSame(2, $l->current());
        
        $l->find(function ($i) { return $i == 3; });
        $l->rewind();
        $this->assertSame(3, $l->current());
        $l->next();
        $this->assertSame(2, $l->current());
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

    public function threeElemeentsProvider()
    {
        $l = new MoveToFrontList();
        for ($i = 1; $i < 4; $i++)
            $l->add($i);
        return array(array($l));
    }

    public function emptyProvider()
    {
        return array(array(new MoveToFrontList()));
    }
}
