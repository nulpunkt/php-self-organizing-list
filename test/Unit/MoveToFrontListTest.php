<?php

namespace Unit;

use Nulpunkt\SAList\MoveToFrontList;

class MoveToFrontListTest extends SAListTest
{
    /**
     * @dataProvider threeElemeentsProvider
     */
    public function testMoveToFront($l)
    {
        $this->find(2, $l);
        $l->rewind();
        $this->assertSame(2, $l->current());
        
        $this->find(3, $l);
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
