<?php
namespace Nulpunk\SAList;

/**
 * MoveToFront implementation
 * Everytime an element is found, we move it to the front
 **/
class MoveToFrontList extends SAList
{
    /**
     * Given a callback, which returns true or false,
     * find an element which the callback returns true on
     * @param callable $comparator function ($e) { return true; }
     * @return mixed The element found (can be any type)
     */
    public function find($comparator)
    {
        return $this->findAndMove($comparator, array($this, 'moveToFront'));
    }

    protected function moveToFront($index, $element)
    {
        if ($index == 0) {
            return;
        }
        unset($this->list[$index]);
        array_unshift($this->list, $element);
    }
}
