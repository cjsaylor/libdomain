<?php

namespace Cjsaylor\Domain\Behavior;

trait Iteratable {

    /**
     * Get the items of this iterable object.
     *
     * @return array
     */
    abstract public function &getItems();

	/**
	 * IteratorAggregate method to use in foreach's
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator() {
		return new \ArrayIterator($this->getItems());
	}

}
