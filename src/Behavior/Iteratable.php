<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Behavior;

trait Iteratable
{

    /**
     * Get the items of this iterable object.
     *
     * @return \ArrayObject
     */
    abstract public function getItems() : \ArrayObject;

    /**
     * IteratorAggregate method to use in foreach's
     *
     * @return \ArrayIterator
     */
    public function getIterator() : \ArrayIterator
    {
        return $this->getItems()->getIterator();
    }
}
