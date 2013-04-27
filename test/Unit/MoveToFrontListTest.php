<?php

namespace Unit;

use Nulpunk\SAList\MoveToFrontList;

class MoveToFrontListTest extends SAListTest
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
    public function testMoveToFront($l)
    {
        $l->find(
            function ($i) {
                return $i == 2;
            }
        );
        $l->rewind();
        $this->assertSame(2, $l->current());
        
        $l->find(
            function ($i) {
                return $i == 3;
            }
        );
        $l->rewind();
        $this->assertSame(3, $l->current());
        $l->next();
        $this->assertSame(2, $l->current());
    }
    
    public function threeElemeentsProvider()
    {
        $l = new MoveToFrontList();
        for ($i = 1; $i < 4; $i++) {
            $l->add($i);
        }
        return array(array($l));
    }

    public function emptyProvider()
    {
        return array(array(new MoveToFrontList()));
    }
}
