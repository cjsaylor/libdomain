<?php

namespace Cjsaylor\Domain;

interface EntityInterface extends \ArrayAccess {

	/**
	 * Array representation of this entity.
	 *
	 * @return array
	 */
	public function toArray();

}
