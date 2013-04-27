<?php
namespace Nulpunk\SAList;

/**
 * Count list implementation
 * Every element has a count of how many times it has been
 * access. The most access item is in the front
 **/
class CountList extends SAList
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
            if ($comparator($element->getElement())) {
                $element->increment();
                $this->moveElementToPlace($index);
                return $element->getElement();
            }
        }
        return null;
    }

    protected function moveElementToPlace($index)
    {
        while ($index -1 >= 0 &&
            $this->list[$index]->getCount() > $this->list[$index-1]->getCount()
            ) {
            $this->swap($index-1, $index);
        }
    }

    public function current()
    {
        return $this->list[$this->i]->getElement();
    }

    public function add($e)
    {
        $this->list[] = new CountListElement($e);
    }
}
