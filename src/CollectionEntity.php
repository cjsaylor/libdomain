<?php

namespace Cjsaylor\Domain;

abstract class CollectionEntity implements CollectionInterface, EntityInterface {
	use Accessable, Iteratable, Countable;
	use CollectionTrait {
		CollectionTrait::toArray as collectionToArray;
	}
	use EntityTrait {
		EntityTrait::toArray as entityToArray;
	}

	/**
	 * Array of Entities.
	 * 
	 * @var array
	 */
	protected $entries = [];

	/**
	 * Constructor.
	 *
	 * @param array $initialEntityData
	 */
	public function __construct(array $initialEntityData = []) {
		$this->initialize($initialEntityData);
	}

	/**
	 * Array representation of this collection entity.
	 * @return array
	 */
	public function toArray() {
		$output = $this->entityToArray();
		$output['entries'] = $this->collectionToArray();

		return $output;
	}

}
