<?php

namespace Tdd\Exam;

/**
 * The class for testing the string parser class.
 *
 * @package Tdd\Test
 */
class StringParserTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * Checks if the input string is valid for the one line parsing.
	 *
	 * @dataProvider oneLineStringDataProvider
	 */
	public function testCheckIfOneLineInputStringIsValid()
	{
		$parser = new StringParser();
	}

	/**
	 * Data provider for the one line string parser.
	 *
	 * @return array
	 */
	public function oneLineStringDataProvider()
	{
		return array(
			array('a,b,c', array('a', 'b', 'c')),
			array('100,982,444,990,1', array('100', '982', '444', '990', '1')),
			array('Mark,Anthony,marka@lib.de', array('Mark', 'Anthony', 'marka@lib.de'))
		);
	}
}
