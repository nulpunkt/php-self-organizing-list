<?php

namespace Unit;

use Nulpunk\SAList\CountList;

class CountListTest extends SAListTest
{
    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testFind($l)
    {
        $l->find(
            function ($i) {
                return $i == 2;
            }
        );
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testCountAndMoveOnce($l)
    {
        $this->find(2, $l);
        $l->rewind();
        $this->assertSame(2, $l->current());
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testCountAndNoMove($l)
    {
        $this->find(2, $l);
        $this->find(2, $l);
        $this->find(1, $l);
        $l->rewind();
        $this->assertSame(2, $l->current());
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testTakeTheLead($l)
    {
        $this->find(2, $l);
        $this->find(2, $l);
        $this->find(1, $l);
        $this->find(3, $l);
        $this->find(3, $l);
        $this->find(3, $l);
        $l->rewind();
        $this->assertSame(3, $l->current());
    }

    protected function find($i, $l)
    {
        $l->find(
            function ($e) use ($i) {
                return $e == $i;
            }
        );
    }

    public function threeElemeentsProvider()
    {
        $l = new CountList();
        for ($i = 1; $i < 4; $i++) {
            $l->add($i);
        }
        return array(array($l));
    }

    public function emptyProvider()
    {
        return array(array(new CountList()));
    }
}
