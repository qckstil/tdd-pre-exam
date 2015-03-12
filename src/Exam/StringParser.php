<?php

namespace Tdd\Exam;

/**
 * The string parser class.
 */
class StringParser
{
	/**
	 * Parses one line string.
	 *
	 * @param string $stringToParse   The string needed to parse.
	 *
	 * @return array   The array containing the parsed string.
	 */
	public function parseOneLine($stringToParse)
	{
		$parsedString = explode(',', $stringToParse);

		return $parsedString;
	}
}
