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
	 * @param bool   $expectedResult   The expected result.
	 *
	 * @dataProvider oneLineStringValidatorDataProvider
	 */
	public function testCheckIfOneLineInputStringIsValid($string, $expectedResult)
	{
		$parser         = new StringParser();
		$validateResult = $parser->validateInput($string);

		$this->assertEquals($expectedResult, $validateResult);
	}

	/**
	 * Data provider for the one line string parser.
	 *
	 * @return array
	 */
	public function oneLineStringValidatorDataProvider()
	{
		return array(
			array('a,b,c', true),
			array(543543, false),
			array(array(), false),
			array('Mark,Anthony,marka@lib.de', true),
			array(new \stdClass(), false)
		);
	}

	/**
	 * Checks if the input string is valid for the one line parsing.
	 *
	 * @param string $string           The input string.
	 * @param array  $expectedResult   The expected result.
	 *
	 * @dataProvider oneLineStringDataProvider
	 */
	public function testCheckIfOneLineParserReturnsValidArray($string, array $expectedResult)
	{
		$parser      = new StringParser();
		$parsedArray = $parser->parseOneLine($string);
		$this->assertEquals($expectedResult, $parsedArray);
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
