<?php
/**
 * Description: 
 */

class HahaTest extends PHPUnit_Framework_TestCase {
	public function testHaha() {
		$a = new Haha();

		$this->assertEquals('haha', $a->getHaha());
	}
}