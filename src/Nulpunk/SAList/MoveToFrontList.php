<?php

namespace Nulpunk\SAList;

/**
 * SAList implementation
 **/
class MoveToFrontList implements \Iterator
{
    public function add($e)
    {
        $this->list[] = $e;
    }

    public function size()
    {
        return count($this->list);
    }

    public function clear()
    {
        $this->list = array();
    }

    public function find($comparator)
    {
        foreach ($this->list as $index => $element) {
            if ($comparator($element)) {
                $this->moveToFront($index, $element);
                return $element;
            }
        }
    }

    protected function moveToFront($index, $element)
    {
        unset($this->list[$index]);
        array_unshift($this->list, $element);
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
