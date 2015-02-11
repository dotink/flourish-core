# Core
## Provides low-level generic functions that are useful

_Copyright (c) 2007-2015 Will Bond, Matthew J. Sahagian, others_.
_Please reference the LICENSE.md file at the root of this distribution_

#### Namespace

`Dotink\Flourish`

#### Authors

<table>
	<thead>
		<th>Name</th>
		<th>Handle</th>
		<th>Email</th>
	</thead>
	<tbody>
	
		<tr>
			<td>
				Will Bond
			</td>
			<td>
				wb
			</td>
			<td>
				will@flourishlib.com
			</td>
		</tr>
	
		<tr>
			<td>
				Matthew J. Sahagian
			</td>
			<td>
				mjs
			</td>
			<td>
				msahagian@dotink.org
			</td>
		</tr>
	
	</tbody>
</table>

## Properties
### Static Properties
#### <span style="color:#6a6e3d;">$debug</span>

If global debugging is enabled





## Methods
### Static Methods
<hr />

#### <span style="color:#3e6a6e;">seedRandom()</span>

Makes sure that the PRNG has been seeded with a fairly secure value

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">backtrace()</span>

Creates a nicely formatted backtrace to the the point where this method is called

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$remove_lines
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The number of trailing lines to remove from the backtrace
			</td>
		</tr>
					
		<tr>
			<td>
				$backtrace
			</td>
			<td>
									<a href="http://php.net/language.types.array">array</a>
				
			</td>
			<td>
				A backtrace from `debug_backtrace()` to format
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The formatted backtrace
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">checkOS()</span>

Returns is the current OS is one of the OSes passed as a parameter

##### Details

Valid OS strings are:
- `'linux'`
- `'aix'`
- `'bsd'`
- `'freebsd'`
- `'netbsd'`
- `'openbsd'`
- `'osx'`
- `'solaris'`
- `'windows'`

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$os
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The operating system to check
			</td>
		</tr>
					
		<tr>
			<td>
				...
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If the current OS is in the list of OSes passed as parameters
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">checkSAPI()</span>

Checks the current SAPI name

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$sapi
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The SAPI to verify running
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			TRUE if the running SAPI matches, FALSE otherwise
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">checkVersion()</span>

Checks to see if the running version of PHP is greater or equal to the version passed

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If the running version of PHP is greater or equal to the version passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">compose()</span>

Composes text using Text if loaded

##### Details

This method does not support domains and is designed for internal composition only.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$message
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The message to compose
			</td>
		</tr>
					
		<tr>
			<td>
				$component
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				A string or number to insert into the message
			</td>
		</tr>
					
		<tr>
			<td>
				...
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The composed and possible translated message
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">dereference()</span>

Dereferences an array to return nested data based on a string

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$key
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The referenced key to return ex: test[element][subelement]
			</td>
		</tr>
					
		<tr>
			<td>
				$data
			</td>
			<td>
									<a href="http://php.net/language.types.array">array</a>
				
			</td>
			<td>
				The data to dereference
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The value referenced by the key in the data
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">dump()</span>

Creates a string representation of any variable using predefined strings for booleans,
`NULL` and empty strings

##### Details

The string output format of this method is very similar to the output of `print_r()`
except that the following values are represented as special strings:

- `TRUE`: `'{true}'`
- `FALSE`: `'{false}'`
- `NULL`: `'{null}'`
- `''`: `'{empty_string}'`

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$data
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The value to dump
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The string representation of the value
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">enableDebugging()</span>

Enables debug messages globally, i.e. they will be shown for any call to ::debug()

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$flag
			</td>
			<td>
									<a href="http://php.net/language.types.boolean">boolean</a>
				
			</td>
			<td>
				If debugging messages should be shown
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">expose()</span>

Prints the ::dump() of a value

##### Details

The dump will be printed in a `<pre>` tag with the class `exposed` if PHP is running
anywhere but via the command line (cli). If PHP is running via the cli, the data will
be printed, followed by a single line break (`\n`).

If multiple parameters are passed, they are exposed as an array.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$data
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The value to show
			</td>
		</tr>
					
		<tr>
			<td>
				...
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">getDebug()</span>

Determines whether or not debugging is enabled

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$force
			</td>
			<td>
									<a href="http://php.net/language.types.boolean">boolean</a>
				
			</td>
			<td>
				If debugging is forced
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If debugging is enabled
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">random()</span>

Generates a random number using `mt_rand()`` after ensuring a good PRNG seed

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$min
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The minimum number to return
			</td>
		</tr>
					
		<tr>
			<td>
				$max
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The maximum number to return
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			integer
		</dt>
		<dd>
			The psuedo-random number
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">randomString()</span>

Returns a random string of the type and length specified

##### Details

Valid string types include `'base64'`, `'base56'`, `'base36'`, `'alphanumeric'`,
`'alpha'`, `'numeric'`, or `'hexadecimal'`, if a different string is provided, it will
be used for the alphabet.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$length
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The length of string to return
			</td>
		</tr>
					
		<tr>
			<td>
				$type
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The type of string to return
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			A random string of the type and length specified
		</dd>
	
</dl>




### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Forces use as a static class

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>






