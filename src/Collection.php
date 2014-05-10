<?php

namespace Cjsaylor\Domain;

abstract class Collection implements CollectionInterface {
	use Iteratable, Countable, CollectionTrait;

	/**
	 * Array of Entities.
	 * 
	 * @var array
	 */
	protected $entries = [];

}
