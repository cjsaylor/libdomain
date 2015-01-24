<?php

namespace Cjsaylor\Test\Domain;

class TestCollectionEntity extends \Cjsaylor\Domain\CollectionEntity {

	public function add(TestEntity $entity) {
        $items = &$this->getItems();
		$items[] = $entity;
	}

}
