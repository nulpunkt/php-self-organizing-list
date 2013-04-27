<?php
namespace Nulpunkt\SAList;

class CountListElement
{
    protected $element;
    protected $count;

    public function __construct($element)
    {
        $this->element = $element;
        $this->count = 0;
    }

    public function increment()
    {
        $this->count++;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getElement()
    {
        return $this->element;
    }
}
