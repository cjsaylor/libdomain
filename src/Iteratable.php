<?php

namespace Cjsaylor\Domain;

trait Iteratable {

	/**
	 * IteratorAggregate method to use in foreach's
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator() {
		return new \ArrayIterator($this->getItems());
	}

}
