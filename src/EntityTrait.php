<?php

namespace Cjsaylor\Domain;

trait EntityTrait {

	/**
	 * Initialize the entity with data.
	 *
	 * @param array $initialData
	 * @return void
	 */
	public function initialize(array $initialData = []) {
		$this->data = $initialData;
	}

}
