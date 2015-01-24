<?php

namespace Cjsaylor\Domain\Behavior;

trait Iteratable {

	/**
	 * Get the items of this iterable object.
	 *
	 * @return \ArrayObject
	 */
	abstract public function getItems();

	/**
	 * IteratorAggregate method to use in foreach's
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator() {
		return $this->getItems()->getIterator();
	}

}
