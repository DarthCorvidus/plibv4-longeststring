<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
class LongestStringTest extends TestCase {
	function testUnused() {
		$longest = new LongestString();
		$this->assertEquals(0, $longest->getLength());
	}
	
	function testUtfAScii() {
		$longest = new LongestString();
		$longest->addString("Dog");
		$longest->addString("Cat");
		$longest->addString("Crow");
		$this->assertEquals(4, $longest->getLength());
	}
	
	function testUtf() {
		$longest = new LongestString();
		$longest->addString("Hund");
		$longest->addString("Katze");
		$longest->addString("Aaskrähe");
		$this->assertEquals(8, $longest->getLength());
	}

	function testLatin1() {
		$longest = new LongestString("iso-8859-1");
		$longest->addString("Hund");
		$longest->addString("Katze");
		#UTF-8 String on purpose.
		$longest->addString("Aaskrähe");
		$this->assertEquals(9, $longest->getLength());
	}

	function testFloat() {
		$longest = new LongestString();
		$longest->addString(1.0);
		$longest->addString(10.01);
		$longest->addString(119.201);
		$this->assertEquals(7, $longest->getLength());
	}

	function testInt() {
		$longest = new LongestString();
		$longest->addString(1);
		$longest->addString(10);
		$longest->addString(119);
		$this->assertEquals(3, $longest->getLength());
	}
	
	function testAddArray() {
		$longest = new LongestString();
		$longest->addArray(array("Dog", "Cat", "Mouse"));
		$this->assertEquals(5, $longest->getLength());
		
	}

}
