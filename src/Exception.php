<?php namespace Dotink\Flourish
{
	/**
	 * An exception that allows for easy l10n, printing, tracing and hooking.
	 *
	 *
	 * @copyright Copyright (c) 2007-2015 Will Bond, Matthew J. Sahagian, others
	 * @author Will Bond [wb] <will@flourishlib.com>
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Flourish
	 */
	abstract class Exception extends \Exception
	{
		/**
		 * Sets the message for the exception, allowing for interpolation and internationalization
		 *
		 * The `$message` can contain any number of formatting placeholders for string and number
		 * interpolation via `sprintf()`.  Any `%` signs that do not appear to be part of a valid
		 * formatting placeholder will be automatically escaped with a second `%`.
		 *
		 * The following aspects of valid `sprintf()` formatting codes are not
		 * accepted since they are redundant and restrict the non-formatting use of
		 * the `%` sign in exception messages:
		 *
		 * - `% 2d`: Using a literal space as a padding character - a space will be used if no
		 *    padding character is specified
		 * - `%'.d`: Providing a padding character but no width - no padding will be applied
		 *    without a width
		 *
		 * @param string $message The message for the exception
		 * @param mixed $component  A string or number to insert into the message
		 * @param mixed ...
		 * @param mixed $code The exception code to set
		 * @return void
		 */
		public function __construct($message='')
		{
			$args          = array_slice(func_get_args(), 1);
			$required_args = preg_match_all(
				'/
					(?<!%)                       # Ensure this is not an escaped %
					%(                           # The leading %
					  (?:\d+\$)?                 # Position
					  \+?                        # Sign specifier
					  (?:(?:0|\'.)?-?\d+|-?)     # Padding, alignment and width or just alignment
					  (?:\.\d+)?				 # Precision
					  [bcdeufFosxX]              # Type
					)/x',
				$message,
				$matches
			);

			//
			// Handle %s that weren't properly escaped
			//

			$formats    = $matches[1];
			$delimeters = ($formats) ? array_fill(0, sizeof($formats), '#') : array();
			$lookahead  = join('|', array_map('preg_quote', $formats, $delimeters));
			$regex      = '#(?<!%)%(?!%' . ($lookahead ? '|' . $lookahead : '') . ')#';
			$message    = preg_replace($regex, '%%', $message);

			//
			// If we have an extra argument, it is the exception code
			//

			$code = NULL;

			if ($required_args == sizeof($args) - 1) {
				$code = array_pop($args);
			}

			if (sizeof($args) != $required_args) {
				$message = Core::compose(
					'%1$d components were passed to the %2$s constructor, ' .
					'while %3$d were specified in the message',
					sizeof($args),
					get_class($this),
					$required_args
				);

				throw new \Exception($message);
			}

			$this->code = $code;

			parent::__construct((string) Core::compose($message, array_map(function($arg) {
				return Core::dump($arg);
			}, $args)));
		}
	}
}
