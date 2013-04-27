<?php

namespace Unit;

use Nulpunk\SAList\TransposeList;

class TransposeListTest extends SAListTest
{
    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testTransposeToFirst($l)
    {
        $this->find(2, $l);
        $l->rewind();
        $this->assertSame(2, $l->current());
    }

    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testTransposeToSecond($l)
    {
        $this->find(3, $l);
        $l->rewind();
        $l->next();
        $this->assertSame(3, $l->current());
        $l->rewind();
        $this->find(3, $l);
        $this->assertSame(3, $l->current());
    }
    
    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testTransposeBackToFront($l)
    {
        $this->assertSame(1, $l->current());
        $this->find(3, $l);
        $this->find(3, $l);
        $l->rewind();
        $this->assertSame(3, $l->current());
    }

    public function threeElemeentsProvider()
    {
        $l = new TransposeList();
        for ($i = 1; $i < 4; $i++) {
            $l->add($i);
        }
        return array(array($l));
    }

    public function emptyProvider()
    {
        return array(array(new TransposeList()));
    }
}
