<?php

namespace Cjsaylor\Domain\Behavior;

trait Accessable {

	/**
	 * Set a value.
	 * 
	 * @param mixed $offset
	 * @param mixed $value 
	 * @return void
	 */
	public function offsetSet($offset, $value) {
		if ($offset !== null) {
			$method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $offset)));
			if (method_exists($this, $method)) {
				$this->$method($value);
				return;
			}
			$this->data[$offset] = $value;
		}
	}

	/**
	 * Key exists.
	 *
	 * @param mixed $offset
	 * @return boolean
	 */
	public function offsetExists($offset) {
		return isset($this->data[$offset]);
	}

	/**
	 * Unset a key.
	 *
	 * @param string $offset
	 * @return void
	 */
	public function offsetUnset($offset) {
		unset($this->data[$offset]);
	}

	/**
	 * Get a key value.
	 *
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet($offset) {
		return isset($this->data[$offset]) ? $this->data[$offset] : null;
	}

}
