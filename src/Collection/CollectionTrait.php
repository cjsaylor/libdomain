<?php

namespace Cjsaylor\Domain\Collection;

use Cjsaylor\Domain\Behavior\ArraySerializable;

trait CollectionTrait {

	/**
	 * Array representation.
	 *
	 * @return array
	 */
	public function toArray() {
		$output = [];
		foreach ($this->entries as $entry) {
			$output[] = $entry instanceof ArraySerializable ? $entry->toArray() : $entry;
		}
		return $output;
	}

	/**
	 * Determine if this collection is empty.
	 *
	 * @return boolean
	 */
	public function isEmpty() {
		return $this->getItems()->count() === 0;
	}

	/**
	 * Get a subset of the collection.
	 *
	 * @param array $keys
	 * @return mixed
	 */
	public function subset(array $keys) {
		$subset = clone $this;
		$items = $subset->getItems();
		$entries = array_intersect_key($subset->getItems()->getArrayCopy(), array_flip(array_values($keys)));
		$items->exchangeArray($entries);
		return $subset;
	}

	/**
	 * Reduce the collection to only provided keys.
	 *
	 * Similar to subset, but has the affects this instead of creating a new set.
	 *
	 * @param array $keys
	 * @return self
	 */
	public function reduce(array $keys) {
		$entries = array_intersect_key($this->getItems()->getArrayCopy(), array_flip(array_values($keys)));
		$this->getItems()->exchangeArray($entries);
		return $this;
	}

	/**
	 * Filter this collection based on callback logic.
	 *
	 * @param Closure $callback
	 * @return self
	 */
	public function filter(callable $callback) {
		$entries = array_filter($this->getItems()->getArrayCopy(), $callback);
		$this->getItems()->exchangeArray($entries);
		return $this;
	}

	/**
	 * Remove all items from the collection.
	 *
	 * @return void
	 */
	public function flush() {
		$this->getItems()->exchangeArray([]);
	}

	/**
	 * Ensure the entries of this class are also cloned.
	 *
	 * @return void
	 */
	public function __clone() {
		$this->entries = clone $this->entries;
	}

	/**
	 * Get a reference to the items array for this collection.
	 *
	 * @return \ArrayObject
	 */
	protected function getItems() {
		return $this->entries;
	}

}
