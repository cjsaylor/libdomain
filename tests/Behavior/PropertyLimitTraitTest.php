<?php

namespace Cjsaylor\Test\Domain\Behavior;

use Cjsaylor\Test\Domain\TestConcreteEntity;

class PropertyLimitTraitTest extends \PHPUnit_Framework_TestCase {

    public function testConcrete() {
        $concrete = new TestConcreteEntity();
        $concrete['id'] = 1;
        $concrete['name'] = 'somename';
        $this->assertEquals(['id' => 1, 'name' => 'somename'], $concrete->toArray());
    }

    /**
     * @expectedException \LogicException
     */
    public function testSettingInvalidConcreteProperty() {
        $concrete = new TestConcreteEntity();
        $concrete['invalid'] = 'novalue';
    }

    public function testTolerantCreation() {
        $concrete = new TestConcreteEntity(['id' => 1, 'name' => 'somename', 'invalid' => 'novalue']);
        $this->assertNotEmpty($concrete['id']);
        $this->assertEmpty($concrete['invalid']);
    }

}
