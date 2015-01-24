<?php

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\Collection\CollectionInterface;
use Cjsaylor\Domain\Behavior\Iteratable;
use Cjsaylor\Domain\Behavior\Countable;
use Cjsaylor\Domain\Collection\CollectionTrait;

abstract class Collection implements CollectionInterface {
	use Iteratable, Countable, CollectionTrait;

	/**
	 * Array of Entities.
	 * 
	 * @var \ArrayObject
	 */
	protected $entries;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->entries = new \ArrayObject();
	}

}
