<?php

namespace Cjsaylor\Domain;

interface ArraySerializable {

	/**
	 * Array representation of this entity.
	 *
	 * @return array
	 */
	public function toArray();

}
