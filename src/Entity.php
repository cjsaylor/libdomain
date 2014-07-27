<?php

namespace Cjsaylor\Domain;

abstract class Entity implements EntityInterface {
	use Accessable, EntityTrait;

	/**
	 * Data container.
	 *
	 * @var array
	 */
	protected $data = [];

	/**
	 * Construct.
	 *
	 * @param array $initialData
	 */
	public function __construct(array $initialData = []) {
		$this->initialize($initialData);
	}

}
