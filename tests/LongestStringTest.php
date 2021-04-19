<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
class LongestStringTest extends TestCase {
	/**
	 * Test Unused
	 * 
	 * Newly initiated LongestString has a longest length of 0.
	 */
	function testUnused() {
		$longest = new LongestString();
		$this->assertEquals(0, $longest->getLength());
	}

	/**
	 * Test UTF8 ASCII
	 * 
	 * Test for longest length (Crow, 4) with three strings that do not leave
	 * the boundaries of ASCII.
	 */
	function testUtfAScii() {
		$longest = new LongestString();
		$longest->addString("Dog");
		$longest->addString("Cat");
		$longest->addString("Crow");
		$this->assertEquals(4, $longest->getLength());
	}
	
	/**
	 * Test UTF8
	 * 
	 * Correctly identify „Aaskrähe“, the german word for corvus corrone corrone
	 * with a length of 8 characters.
	 */
	function testUtf() {
		$longest = new LongestString();
		$longest->addString("Hund");
		$longest->addString("Katze");
		$longest->addString("Aaskrähe");
		$this->assertEquals(8, $longest->getLength());
	}

	/**
	 * Test Latin1
	 * 
	 * Test for Aaskrähe (as UTF8!) with ISO-8859-1 as encoding instead, which
	 * yields a character count of 9 instead of 8.
	 */
	function testLatin1() {
		$longest = new LongestString("iso-8859-1");
		$longest->addString("Hund");
		$longest->addString("Katze");
		#UTF-8 String on purpose.
		$longest->addString("Aaskrähe");
		$this->assertEquals(9, $longest->getLength());
	}

	/**
	 * Test Float
	 * 
	 * Test if a float is treated correctly as a string.
	 */
	function testFloat() {
		$longest = new LongestString();
		$longest->addString(1.0);
		$longest->addString(10.01);
		$longest->addString(119.201);
		$this->assertEquals(7, $longest->getLength());
	}

	/**
	 * Test int
	 * 
	 * Test Int instead of string and identify the longest length.
	 */
	function testInt() {
		$longest = new LongestString();
		$longest->addString(1);
		$longest->addString(10);
		$longest->addString(119);
		$this->assertEquals(3, $longest->getLength());
	}
	
	/**
	 * Test add array
	 * 
	 * Add an array of strings and identify the longest one (Mouse, 5).
	 */
	function testAddArray() {
		$longest = new LongestString();
		$longest->addArray(array("Dog", "Cat", "Mouse"));
		$this->assertEquals(5, $longest->getLength());
	}
}
