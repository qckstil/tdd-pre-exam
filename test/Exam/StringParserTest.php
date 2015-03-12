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
	 * @param string $string           The input string.
	 * @param array  $expectedResult   The expected result.
	 *
	 * @dataProvider oneLineStringDataProvider
	 */
	public function testCheckIfOneLineInputStringIsValid($string, array $expectedResult)
	{
		$parser      = new StringParser();
		$parsedArray = $parser->parseOneLine($string);
		$this->assertEquals($parsedArray, $expectedResult);
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
			array('kecske,beka,lo,jo', array('kecske', 'beka', 'lo', 'jo')),
			array('100,982,444,990,1', array('100', '982', '444', '990', '1')),
			array('Mark,Anthony,marka@lib.de', array('Mark', 'Anthony', 'marka@lib.de'))
		);
	}
}
