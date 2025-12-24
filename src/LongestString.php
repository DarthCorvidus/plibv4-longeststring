<?php
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */

namespace plibv4\longeststring;

/**
 * LongestString
 * 
 * The purpose of LongestString is to be given string after string and keeping
 * track of the max length. Practical for output with monospaced fonts.
 */
final class LongestString {
	private int $length = 0;
	private string $encoding = "UTF-8";
	/**
	 * 
	 * @param string $encoding Valid encoding as used by mbstring
	 */
	function __construct($encoding = "UTF-8") {
		$this->encoding = $encoding;
	}
	/**
	 * Add a string
	 * 
	 * Adds a string to the comparison. If it is longer than preceding strings,
	 * the length will be set to the length of the string.
	 * Note that float/int can be used as well for convenience.
	 * @param string|float|int $string
	 */
	function addString(string|float|int $string): void {
		$len = mb_strlen((string)$string, $this->encoding);
		if($len>$this->length) {
			$this->length = $len;
		}
	}
	
	/**
	 * Add an array of strings
	 * 
	 * Keeps you from writing foreach if you already have an array of strings of
	 * which you want to have the longest one.
	 * @psalm-suppress PossiblyUnusedMethod
	 * @param list<string> $array
	 */
	function addArray(array $array): void {
		foreach($array as $value) {
			$this->addString($value);
		}
	}
	
	/**
	 * Return highest lenght
	 * 
	 * Returns the highest length, which defaults to 0, if no string was added.
	 * @psalm-suppress PossiblyUnusedMethod
	 * @return int
	 */
	function getLength(): int {
		return $this->length;
	}
}