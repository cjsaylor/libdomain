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
	 * Get a reference to the items array for this collection.
	 *
	 * @return array
	 */
	protected function &getItems() {
		return $this->entries;
	}

}
