<?php

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\Entity\EntityInterface;
use Cjsaylor\Domain\Behavior\Accessable;
use Cjsaylor\Domain\Entity\EntityTrait;

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
