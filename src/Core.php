<?php namespace Dotink\Flourish
{
	/**
	 * Provides low-level generic functions that are useful
	 *
	 * @copyright Copyright (c) 2007-2015 Will Bond, Matthew J. Sahagian, others
	 * @author Will Bond [wb] <will@flourishlib.com>
	 * @author Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license Please reference the LICENSE.md file at the root of this distribution
	 *
	 * @package Flourish
	 */
	class Core
	{
		/**
		 * A shorthand for the DIRECTORY_SEPARATOR
		 *
		 * @var string
		 */
		const DS = DIRECTORY_SEPARATOR;


		/**
		 * If global debugging is enabled
		 *
		 * @static
		 * @access private
		 * @var boolean
		 */
		static private $debug = NULL;


		/**
		 * Makes sure that the PRNG has been seeded with a fairly secure value
		 *
		 * @static
		 * @access private
		 * @return void
		 */
		static private function seedRandom()
		{
			static $seeded = FALSE;

			if ($seeded) {
				return;
			}

			$bytes = NULL;

			//
			// On linux/unix/solaris we should be able to use /dev/urandom
			//

			if (!self::checkOS('windows') && $handle = fopen('/dev/urandom', 'rb')) {
				$bytes = fread($handle, 4);
				fclose($handle);

			//
			// On windows we should be able to use the Cryptographic Application Programming Interface COM object
			//

			} elseif (self::checkOS('windows') && class_exists('COM', FALSE)) {
				try {
					// This COM object no longer seems to work on PHP 5.2.9+, no response on the bug report yet
					$capi  = new COM('CAPICOM.Utilities.1');
					$bytes = base64_decode($capi->getrandom(4, 0));
					unset($capi);
				} catch (Exception $e) { }
			}

			//
			// If we could not use the OS random number generators we get some of the most unique info we can
			//

			if (!$bytes) {
				$string = microtime(TRUE) . uniqid('', TRUE) . join('', stat(__FILE__)) . disk_free_space(dirname(__FILE__));
				$bytes  = substr(pack('H*', md5($string)), 0, 4);
			}

			$seed = (int) (base_convert(bin2hex($bytes), 16, 10) - 2147483647);

			mt_srand($seed);

			$seeded = TRUE;
		}


		/**
		 * Creates a nicely formatted backtrace to the the point where this method is called
		 *
		 * @static
		 * @access public
		 * @param integer $remove_lines The number of trailing lines to remove from the backtrace
		 * @param array $backtrace A backtrace from `debug_backtrace()` to format
		 * @return string The formatted backtrace
		 */
		static public function backtrace($remove_lines = 0, $backtrace = NULL)
		{
			if ($remove_lines !== NULL && !is_numeric($remove_lines)) {
				$remove_lines = 0;
			}

			settype($remove_lines, 'integer');

			$doc_root  = realpath($_SERVER['DOCUMENT_ROOT']);
			$doc_root .= (substr($doc_root, -1) != self::DS) ? self::DS : '';

			if ($backtrace === NULL) {
				$backtrace = debug_backtrace();
			}

			while ($remove_lines > 0) {
				array_shift($backtrace);
				$remove_lines--;
			}

			$backtrace = array_reverse($backtrace);
			$bt_string = '';
			$i         = 0;

			foreach ($backtrace as $call) {
				if ($i) {
					$bt_string .= "\n";
				}

				if (isset($call['file'])) {
					$bt_string .= str_replace($doc_root, '{doc_root}' . self::DS, $call['file']);
					$bt_string .= '(' . $call['line'] . '): ';

				} else {
					$bt_string .= '[internal function]: ';
				}

				if (isset($call['class'])) {
					$bt_string .= $call['class'] . $call['type'];
				}

				if (isset($call['class']) || isset($call['function'])) {
					$bt_string .= $call['function'] . '(';
						$j = 0;
						if (!isset($call['args'])) {
							$call['args'] = array();
						}
						foreach ($call['args'] as $arg) {
							if ($j) {
								$bt_string .= ', ';
							}
							if (is_bool($arg)) {
								$bt_string .= ($arg) ? 'true' : 'false';
							} elseif (is_null($arg)) {
								$bt_string .= 'NULL';
							} elseif (is_array($arg)) {
								$bt_string .= 'Array';
							} elseif (is_object($arg)) {
								$bt_string .= 'Object(' . get_class($arg) . ')';
							} elseif (is_string($arg)) {
								// Shorten the UTF-8 string if it is too long
								if (strlen(utf8_decode($arg)) > 18) {
									// If we can't match as unicode, try single byte
									if (!preg_match('#^(.{0,15})#us', $arg, $short_arg)) {
										preg_match('#^(.{0,15})#s', $arg, $short_arg);
									}
									$arg  = $short_arg[0] . '...';
								}
								$bt_string .= "'" . $arg . "'";
							} else {
								$bt_string .= (string) $arg;
							}
							$j++;
						}
					$bt_string .= ')';
				}
				$i++;
			}

			return $bt_string;
		}


		/**
		 * Returns is the current OS is one of the OSes passed as a parameter
		 *
		 * Valid OS strings are:
		 *  - `'linux'`
		 *  - `'aix'`
		 *  - `'bsd'`
		 *  - `'freebsd'`
		 *  - `'netbsd'`
		 *  - `'openbsd'`
		 *  - `'osx'`
		 *  - `'solaris'`
		 *  - `'windows'`
		 *
		 * @static
		 * @access public
		 * @param string $os The operating system to check
		 * @param string ...
		 * @return boolean If the current OS is in the list of OSes passed as parameters
		 */
		static public function checkOS($os)
		{
			$oses       = func_get_args();
			$valid_oses = [
				'linux', 'aix', 'bsd', 'freebsd', 'openbsd', 'netbsd', 'osx', 'solaris', 'windows'
			];

			if ($invalid_oses = array_diff($oses, $valid_oses)) {
				throw new ProgrammerException(
					'One or more of the OSes specified, %$1s, is invalid. Must be one of: %2$s.',
					join(' ',  $invalid_oses),
					join(', ', $valid_oses)
				);
			}

			$uname = php_uname('s');

			if (stripos($uname, 'linux') !== FALSE) {
				return in_array('linux', $oses);

			} elseif (stripos($uname, 'aix') !== FALSE) {
				return in_array('aix', $oses);

			} elseif (stripos($uname, 'netbsd') !== FALSE) {
				return in_array('netbsd', $oses) || in_array('bsd', $oses);

			} elseif (stripos($uname, 'openbsd') !== FALSE) {
				return in_array('openbsd', $oses) || in_array('bsd', $oses);

			} elseif (stripos($uname, 'freebsd') !== FALSE) {
				return in_array('freebsd', $oses) || in_array('bsd', $oses);

			} elseif (stripos($uname, 'solaris') !== FALSE) {
				return in_array('solaris', $oses);

			} elseif (stripos($uname, 'sunos') !== FALSE) {
				return in_array('solaris', $oses);

			} elseif (stripos($uname, 'windows') !== FALSE) {
				return in_array('windows', $oses);

			} elseif (stripos($uname, 'darwin') !== FALSE) {
				return in_array('osx', $oses);
			}

			throw new EnvironmentException('Unable to determine the current OS');
		}


		/**
		 * Checks the current SAPI name
		 *
		 * @static
		 * @access public
		 * @param string $sapi The SAPI to verify running
		 * @return boolean TRUE if the running SAPI matches, FALSE otherwise
		 */
		static public function checkSAPI($sapi)
		{
			return (strtolower(php_sapi_name()) == strtolower($sapi));
		}


		/**
		 * Checks to see if the running version of PHP is greater or equal to the version passed
		 *
		 * @static
		 * @access public
		 * @return boolean If the running version of PHP is greater or equal to the version passed
		 */
		static public function checkVersion($version)
		{
			static $running_version = NULL;

			if ($running_version === NULL) {
				$running_version = preg_replace(
					'#^(\d+\.\d+\.\d+).*$#D',
					'\1',
					PHP_VERSION
				);
			}

			return version_compare($running_version, $version, '>=');
		}


		/**
		 * Composes text using Text if loaded
		 *
		 * This method does not support domains and is designed for internal composition only.
		 *
		 * @static
		 * @access public
		 * @param string $message The message to compose
		 * @param mixed $component A string or number to insert into the message
		 * @param mixed ...
		 * @return string The composed and possible translated message
		 */
		static public function compose($message)
		{
			$components = array_slice(func_get_args(), 1);

			//
			// Handles components passed as an array
			//

			if (sizeof($components) == 1 && is_array($components[0])) {
				$components = $components[0];
			}

			if (class_exists($text_class = __NAMESPACE__ . '\Text')) {
				return Text::create($message)->compose(NULL, $components);
			} else {
				return vsprintf($message, $components);
			}
		}


		/**
		 * Dereferences an array to return nested data based on a string
		 *
		 * @static
		 * @access public
		 * @param string $key The referenced key to return ex: test[element][subelement]
		 * @param array $data The data to dereference
		 * @return mixed The value referenced by the key in the data
		 */
		static public function dereference($key, $data)
		{
			$keys      = array();
			$value     = $data;
			$reference = NULL;

			if (strpos($key, '[')) {
				$bracket_pos = strpos($key, '[');
				$reference   = substr($key, $bracket_pos);
				$key         = substr($key, 0, $bracket_pos);

				if (preg_match_all('#(?<=\[)[^\[\]]+(?=\])#', $reference, $keys, PREG_SET_ORDER)) {
					$keys = array_map('current', $keys);
				}
			}

			array_unshift($keys, $key);

			foreach ($keys as $key) {
				if (!is_array($value) || !array_key_exists($key, $value)) {
					throw new ProgrammerException (
						'Cannot dereference %s, value is not an array or key does not exist',
						$key
					);
				}

				$value = $value[$key];
			}

			return $value;
		}


		/**
		 * Creates a string representation of any variable using predefined strings for booleans,
		 * `NULL` and empty strings
		 *
		 * The string output format of this method is very similar to the output of `print_r()`
		 * except that the following values are represented as special strings:
		 *
		 *  - `TRUE`: `'{true}'`
		 *  - `FALSE`: `'{false}'`
		 *  - `NULL`: `'{null}'`
		 *  - `''`: `'{empty_string}'`
		 *
		 * @static
		 * @access public
		 * @param mixed $data The value to dump
		 * @return string The string representation of the value
		 */
		static public function dump($data)
		{
			if (is_bool($data)) {
				return ($data) ? '{true}' : '{false}';

			} elseif (is_null($data)) {
				return '{null}';

			} elseif ($data === '') {
				return '{empty_string}';

			} elseif (is_array($data) || is_object($data)) {

				ob_start();
				var_dump($data);

				$output       = ob_get_clean();
				$matches      = [
					0  => '#=>\n(  )+(?=[a-zA-Z]|&)#m',
					1  =>'#string\(0\) ""#',
					2  => '#=> (&)?NULL#',
					3  => '#=> (&)?bool\((false|true)\)#',
					4  => '#(?<=^|\] => )(?:float|int)\((-?\d+(?:.\d+)?)\)#',
					5  => '#string\(\d+\) "#',
					6  => '#"(\n(  )*)(?=\[|\})#',
					7  => '#((?:  )+)\["(.*?)"\]#',
					8  =>'#(?:&)?array\(\d+\) \{\n((?:  )*)((?:  )(?=\[)|(?=\}))#',
					9  => '#object\((\w+)\)\#\d+ \(\d+\) {\n((?:  )*)((?:  )(?=\[)|(?=\}))#',
					10 => '#^((?:  )+)}(?=\n|$)#m'
				];

				$replacements = [
					0  => ' => ',
					1  => '{empty_string}',
					2  => '=> \1{null}',
					3  => '=> \1{\2}',
					4  => '\1',
					5  => '',
					6  => '\1',
					7  => '\1[\2]',
					8  => "Array\n\\1(\n\\1\\2",
					9  => "\\1 Object\n\\2(\n\\2\\3",
					10 => "\\1)\n"
				];

				foreach ($matches as $i => $regex) {
					$output = preg_replace($regex, $replacements[$i], $output);
				}

				$output = substr($output, 0, -2) . ')';

				// Fix indenting issues with the var dump output
				$output_lines = explode("\n", $output);
				$new_output = array();
				$stack = 0;
				foreach ($output_lines as $line) {
					if (preg_match('#^((?:  )*)([^ ])#', $line, $match)) {
						$spaces = strlen($match[1]);
						if ($spaces && $match[2] == '(') {
							$stack += 1;
						}
						$new_output[] = str_pad('', ($spaces)+(4*$stack)) . $line;
						if ($spaces && $match[2] == ')') {
							$stack -= 1;
						}
					} else {
						$new_output[] = str_pad('', ($spaces)+(4*$stack)) . $line;
					}
				}

				return join("\n", $new_output);

			} else {
				return (string) $data;
			}
		}


		/**
		 * Enables debug messages globally, i.e. they will be shown for any call to ::debug()
		 *
		 * @static
		 * @access public
		 * @param boolean $flag If debugging messages should be shown
		 * @return void
		 */
		static public function enableDebugging($flag)
		{
			self::$debug = (boolean) $flag;
		}


		/**
		 * Prints the ::dump() of a value
		 *
		 * The dump will be printed in a `<pre>` tag with the class `exposed` if PHP is running
		 * anywhere but via the command line (cli). If PHP is running via the cli, the data will
		 * be printed, followed by a single line break (`\n`).
		 *
		 * If multiple parameters are passed, they are exposed as an array.
		 *
		 * @static
		 * @access public
		 * @param mixed $data The value to show
		 * @param mixed ...
		 * @return void
		 */
		static public function expose($data)
		{
			$args = func_get_args();

			if (count($args) > 1) {
				$data = $args;
			}

			if (!self::checkSAPI('cli')) {
				echo '<pre class="exposed">';
				echo htmlspecialchars((string) self::dump($data), ENT_QUOTES);
				echo '</pre>';

			} else {
				echo self::dump($data) . "\n";
			}
		}


		/**
		 * Determines whether or not debugging is enabled
		 *
		 * @static
		 * @access public
		 * @param boolean $force If debugging is forced
		 * @return boolean If debugging is enabled
		 */
		static public function getDebug($force = FALSE)
		{
			return self::$debug || $force;
		}


		/**
		 * Generates a random number using `mt_rand()`` after ensuring a good PRNG seed
		 *
		 * @static
		 * @access public
		 * @param integer $min The minimum number to return
		 * @param integer $max The maximum number to return
		 * @return integer The psuedo-random number
		 */
		static public function random($min=NULL, $max=NULL)
		{
			self::seedRandom();

			if ($min !== NULL || $max !== NULL) {
				return mt_rand($min, $max);
			}

			return mt_rand();
		}


		/**
		 * Returns a random string of the type and length specified
		 *
		 * Valid string types include `'base64'`, `'base56'`, `'base36'`, `'alphanumeric'`,
		 * `'alpha'`, `'numeric'`, or `'hexadecimal'`, if a different string is provided, it will
		 * be used for the alphabet.
		 *
		 * @param  integer $length  The length of string to return
		 * @param  string  $type    The type of string to return
		 * @return string  A random string of the type and length specified
		 */
		static public function randomString($length, $type='alphanumeric')
		{
			if ($length < 1) {
				throw new ProgrammerException(
					'The length specified, %1$s, is less than the minimum of %2$s',
					$length,
					1
				);
			}

			switch ($type) {
				case 'base64':
					$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/';
					break;

				case 'alphanumeric':
					$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
					break;

				case 'base56':
					$alphabet = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
					break;

				case 'alpha':
					$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					break;

				case 'base36':
					$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
					break;

				case 'hexadecimal':
					$alphabet = 'abcdef0123456789';
					break;

				case 'numeric':
					$alphabet = '0123456789';
					break;

				default:
					$alphabet = $type;
			}

			$alphabet_length = strlen($alphabet);
			$output = '';

			for ($i = 0; $i < $length; $i++) {
				$output .= $alphabet[self::random(0, $alphabet_length-1)];
			}

			return $output;
		}


		/**
		 * Forces use as a static class
		 *
		 * @access private
		 * @return void
		 */
		private function __construct() { }
	}
}
