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
		$output = [];
		foreach ($this->data as $key => $val) {
			$output[$key] = $val instanceof ArraySerializable ? $val->toArray() : $val;
		}
		return $output;
	}

}
