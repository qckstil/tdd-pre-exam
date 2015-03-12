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
		$this->validateInput($stringToParse);

		$parsedString = explode(',', $stringToParse);

		return $parsedString;
	}

	/**
	 * Validates the input string
	 *
	 * @param string $string   The string that has to be validated.
	 *
	 * @return bool
	 */
	public function validateInput($string)
	{
		$isValid = true;

		if (empty($string))
		{
			$isValid = false;
		}

		if (!is_string($string))
		{
			$isValid = false;
		}

		return $isValid;
	}
}
