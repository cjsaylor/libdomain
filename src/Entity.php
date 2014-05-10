<?php

namespace Cjsaylor\Domain;

abstract class Entity implements EntityInterface {
	use Accessable, Iteratable, EntityTrait;

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

	/**
	 * Array representation of this entity.
	 *
	 * @return array
	 */
	public function toArray() {
		return $this->data;
	}

}
