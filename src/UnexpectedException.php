<?php namespace Dotink\Flourish {

	/**
	 * An exception that should probably not be handled by the display code
	 *
	 * @copyright  Copyright (c) 2007-2012 Will Bond, others
	 * @author     Will Bond           [wb]  <will@flourishlib.com>
	 * @author     Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license    Please see the LICENSE file at the root of this distribution
	 *
	 * @package    Flourish
	 */

	class UnexpectedException extends Exception
	{
		/**
		 * Prints out a generic error message inside of a `div` with the class being
		 * `'exception {exception_class_name}'`
		 *
		 * @return void
		 */
		public function printMessage()
		{
			echo '<div class="exception ' . $this->getCSSClass() . '"><p>';
			echo Core::compose(
				'It appears an error has occurred - we apologize for the inconvenience.  ' .
				'The problem may be resolved if you try again.'
			);
			echo '</p></div>';
		}
	}
}
