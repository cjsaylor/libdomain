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
		foreach ($initialData as $key => $value) {
			$this[$key] = $value;
		}
	}

}
