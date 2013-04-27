<?php
namespace Nulpunk\SAList;

/**
 * MoveToFront implementation
 * Everytime an element is found, we move it to the front
 **/
class MoveToFrontList extends SAList
{
    /**
     * @param mixed $e An element to be added
     */
    public function add($e)
    {
        $this->list[] = $e;
    }

    /**
     * Given a callback, which returns true or false,
     * find an element which the callback returns true on
     * @param callable $comparator function ($e) { return true; }
     * @return mixed The element found (can be any type)
     */
    public function find($comparator)
    {
        foreach ($this->list as $index => $element) {
            if ($comparator($element)) {
                $this->moveToFront($index, $element);
                return $element;
            }
        }
        return null;
    }

    protected function moveToFront($index, $element)
    {
        unset($this->list[$index]);
        array_unshift($this->list, $element);
    }
}
