<?php

namespace Cjsaylor\Domain\Behavior;

trait PropertyLimitTrait{
	use Accessable {
		Accessable::offsetSet as private accessableOffsetSet;
	}

	/**
	 * Set a value if allowed by the concrete attributes.
	 *
	 * If this object does not implement PropertyLimitable, the value
	 * will always be set.
	 * 
	 * @param mixed $offset
	 * @param mixed $value 
	 * @return void
	 */
	public function offsetSet($offset, $value) {
		if ($this instanceof PropertyLimitable) {
			if (!in_array($offset, $this->concreteAttributes())) {
				return;
			}
		}
		$this->accessableOffsetSet($offset, $value);
	}
}
