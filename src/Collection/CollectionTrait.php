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
		return empty($this->entries);
	}

	/**
	 * Get a subset of the collection.
	 *
	 * @param array $keys
	 * @return mixed
	 */
	public function subset(array $keys) {
		$subset = clone $this;
		$entries = &$subset->getItems();
		$entries = array_intersect_key($entries, array_flip(array_values($keys)));
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
		$entries = &$this->getItems();
		$entries = array_intersect_key($entries, array_flip(array_values($keys)));
		return $this;
	}

	/**
	 * Filter this collection based on callback logic.
	 *
	 * @param Closure $callback
	 * @return self
	 */
	public function filter(callable $callback) {
		$entries = &$this->getItems();
		$entries = array_filter($entries, $callback);
		return $this;
	}

	/**
	 * Remove all items from the collection.
	 *
	 * @return void
	 */
	public function flush() {
		$entries = &$this->getItems();
		$entries = [];
	}

	/**
	 * Get a reference to the items array for this collection.
	 *
	 * @return array
	 */
	protected function &getItems() {
		return $this->entries;
	}

}
