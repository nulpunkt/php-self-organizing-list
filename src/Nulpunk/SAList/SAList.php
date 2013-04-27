<?php

namespace Nulpunk\SAList;

/**
 * Abstract SAList
 * This contains the most general thing about the list
 **/
abstract class SAList implements \Iterator
{
    /**
     * return in
     */
    public function size()
    {
        return count($this->list);
    }

    /**
     * Remove all elements
     */
    public function clear()
    {
        $this->list = array();
    }
    
    /**
     * Swap two elements in the list
     * Both CountList and TransposeList uses this
     */
    protected function swap($from, $to)
    {
        $tmp = $this->list[$to];
        $this->list[$to] = $this->list[$from];
        $this->list[$from] = $tmp;
    }


    // Iterator Methods //
    protected $i = 0;
    public function rewind()
    {
        $this->i = 0;
    }

    public function current()
    {
        return $this->list[$this->i];
    }

    public function next()
    {
        $this->i++;
    }

    public function key()
    {
        return $this->i;
    }

    public function valid()
    {
        return $this->i < $this->size();
    }
}
