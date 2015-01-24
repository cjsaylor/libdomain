<?php

namespace Cjsaylor\Test\Domain;

class TestCollectionEntity extends \Cjsaylor\Domain\CollectionEntity {

	public function add(TestEntity $entity) {
        $this->getItems()->append($entity);
	}

}
