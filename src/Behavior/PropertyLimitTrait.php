<?php

namespace Cjsaylor\Domain\Behavior;

use Cjsaylor\Domain\Behavior\PropertyLimitable;
use Cjsaylor\Domain\Entity\EntityTrait;

trait PropertyLimitTrait{
	use Accessable {
		Accessable::offsetSet as private accessableOffsetSet;
	}
	use EntityTrait {
		EntityTrait::initialize as private entityInitialize;
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
	 * @throws \LogicException
	 */
	public function offsetSet($offset, $value) {
		if ($this instanceof PropertyLimitable) {
			if (!in_array($offset, $this->concreteAttributes())) {
				throw new \LogicException('Property not defined as a concrete property.');
			}
		}
		$this->accessableOffsetSet($offset, $value);
	}

	/**
	 * Initialize the entity with data.
	 *
	 * @param array $initialData
	 * @return void
	 */
	public function initialize(array $initialData = []) {
		if ($this instanceof PropertyLimitable) {
			$initialData = array_intersect_key($initialData, array_fill_keys($this->concreteAttributes(), true));
		}
		$this->entityInitialize($initialData);
	}
}
