<?php

namespace Cjsaylor\Domain\Behavior;

interface ArraySerializable {

	/**
	 * Array representation of this entity.
	 *
	 * @return array
	 */
	public function toArray();

}
