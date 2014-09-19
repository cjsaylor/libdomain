<?php

namespace Cjsaylor\Domain\Behavior;

trait ReadAccessable {
	use Accessable {
		Accessable::offsetSet as private traitOffsetSet;
		Accessable::offsetUnset as private traitOffsetUnset;
	}

	/**
	 * Disallow setting a value.
	 * 
	 * @param mixed $offset
	 * @param mixed $value 
	 * @return void
	 */
	final public function offsetSet($offset, $value) {
		throw new \LogicException('Writing to a read only attribute.');
	}

	/**
	 * Disallow unsetting a key.
	 *
	 * @param string $offset
	 * @return void
	 */
	final public function offsetUnset($offset) {
		throw new \LogicException('Writing to a read only attribute.');
	}

	/**
	 * Disallow setting properties.
	 *
	 * @param string $name
	 * @param string $value
	 */
	final public function __set($name, $value) {
		throw new \LogicException('Writing to public properties.');
	}
}
