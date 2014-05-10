<?php

namespace Cjsaylor\Domain;

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
	public function offsetSet($offset, $value) {
		throw new \LogicException('Writing to a read only attribute.');
	}

	/**
	 * Disallow unsetting a key.
	 *
	 * @param string $offset
	 * @return void
	 */
	public function offsetUnset($offset) {
		throw new \LogicException('Writing to a read only attribute.');
	}
}
