<?php

namespace Cjsaylor\Domain;

abstract class CollectionEntity implements CollectionInterface, EntityInterface {
	use Accessable, Iteratable, Countable, CollectionTrait, EntityTrait;

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

}
