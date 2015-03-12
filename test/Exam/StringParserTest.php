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
	public function testIfOneLineInputStringIsValid($string, $expectedResult)
	{
		$parser         = new StringParser();
		$validateResult = $parser->isValidInput($string);

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
	 * @param string $string   The input string.
	 *
	 * @dataProvider oneLineStringExceptionDataProvider
	 * @expectedException   \InvalidArgumentException
	 */
	public function testIfOneLineParserThrowsExceptionOnInvalidParameter($string)
	{
		$parser = new StringParser();
		$parser->parseOneLine($string);
	}

		/**
	 * Data provider for the one line string parser.
	 *
	 * @return array
	 */
	public function oneLineStringExceptionDataProvider()
	{
		return array(
			array(543543),
			array(array()),
			array(new \stdClass())
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
	public function testIfOneLineParserReturnsValidArray($string, array $expectedResult)
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

	/**
	 * Checks if the input string is valid for the multi line parsing.
	 *
	 * @param string $string           The input string.
	 * @param array  $expectedResult   The expected result.
	 *
	 * @dataProvider multiLineStringDataProvider
	 */
	public function testIfMultiLineInputStringIsValid($string, array $expectedResult)
	{

	}

	/**
	 * Data provider for the multi line string parser.
	 *
	 * @return array
	 */
	public function multiLineStringDataProvider()
	{
		return array(
			array(
				'211,22,35' . PHP_EOL . '10,20,33',
				array(
					'211,22,35' => array('211', '22', '35'),
					'10,20,33' => array('10', '20', '33')
				)
			)
		);
	}
}
