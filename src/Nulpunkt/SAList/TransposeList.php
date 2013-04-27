<?php
namespace Nulpunkt\SAList;

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
        $self = $this;
        $moverStrategy = function ($index, $e) use ($self) {
                $self->swap($index-1, $index);
        };
        return $this->findAndMove($comparator, $moverStrategy);
    }
}
