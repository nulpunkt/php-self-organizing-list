<?php
namespace Nulpunk\SAList;

/**
 * Transpose list implementation
 * When an element is accessed, it is swaped
 * with its predecessor
 **/
class TransposeList extends SAList
{
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
                $this->swap($index-1, $index);
                return $element;
            }
        }
        return null;
    }

    public function add($e)
    {
        $this->list[] = $e;
    }
}
