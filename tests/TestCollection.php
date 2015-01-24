<?php

namespace Cjsaylor\Test\Domain;

class TestCollection extends \Cjsaylor\Domain\Collection {

	public function add(TestEntity $entity) {
		$this->getItems()->append($entity);
	}

}
