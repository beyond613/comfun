<?php
/**
 * Test.php结尾的默认可以遍历测试
 * Description: 
 */

class HahaTest extends PHPUnit_Framework_TestCase {
	public function testHaha() {
		$a = new Haha();

		$this->assertEquals('haha', $a->getHaha());
	}
}