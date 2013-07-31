# Exception
## An exception that allows for easy l10n, printing, tracing and hooking.

_Copyright (c) 2007-2012 Will Bond, others_.
_Please see the LICENSE file at the root of this distribution_

### Extends

[`\Exception`](http://www.php.net/class.exception.php)

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
#### <span style="color:#6a6e3d;">$callbacks</span>

Callbacks for when exceptions are created




### Inherited Properties

[`\Exception::$message`](http://www.php.net/class.exception.php#message) [`\Exception::$string`](http://www.php.net/class.exception.php#string) [`\Exception::$code`](http://www.php.net/class.exception.php#code) [`\Exception::$file`](http://www.php.net/class.exception.php#file) [`\Exception::$line`](http://www.php.net/class.exception.php#line) [`\Exception::$trace`](http://www.php.net/class.exception.php#trace) [`\Exception::$previous`](http://www.php.net/class.exception.php#previous) 

## Methods
### Static Methods
<hr />

#### <span style="color:#3e6a6e;">dump()</span>

Creates a string representation of any variable using predefined strings for booleans,
`NULL` and empty strings

##### Details

The string output format of this method is very similar to the output of
[http://php.net/print_r print_r()] except that the following values
are represented as special strings:

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
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
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

#### <span style="color:#3e6a6e;">registerCallback()</span>

Adds a callback for when certain types of exceptions are created

##### Details

The callback will be called when any exception of this class, or any
child class, specified is tossed. A single parameter will be passed
to the callback, which will be the exception object.

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
				$callback
			</td>
			<td>
									callback				
			</td>
			<td>
				The callback
			</td>
		</tr>
					
		<tr>
			<td>
				$exception_type
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The type of exception to call the callback for
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

#### <span style="color:#3e6a6e;">sortMatchingArray()</span>

Compares the message matching strings by longest first so that the longest matches are made first

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
				$a
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The first string to compare
			</td>
		</tr>
					
		<tr>
			<td>
				$b
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The second string to compare
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
			`-1` if `$a` is longer than `$b`, `0` if they are equal length, `1` if `$a` is shorter than `$b`
		</dd>
	
</dl>




### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Sets the message for the exception, allowing for string interpolation and internationalization

##### Details

The `$message` can contain any number of formatting placeholders for
string and number interpolation via [http://php.net/sprintf `sprintf()`].
Any `%` signs that do not appear to be part of a valid formatting
placeholder will be automatically escaped with a second `%`.

The following aspects of valid `sprintf()` formatting codes are not
accepted since they are redundant and restrict the non-formatting use of
the `%` sign in exception messages:
- `% 2d`: Using a literal space as a padding character - a space will be used if no padding character is specified
- `%'.d`: Providing a padding character but no width - no padding will be applied without a width

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
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The message for the exception. This accepts a subset of [http://php.net/sprintf `sprintf()`] strings - see method description for more details.
			</td>
		</tr>
					
		<tr>
			<td>
				$component
			</td>
			<td>
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
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
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
			</td>
			<td>
				
			</td>
		</tr>
					
		<tr>
			<td>
				$code
			</td>
			<td>
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
			</td>
			<td>
				The exception code to set
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

#### <span style="color:#3e6a6e;">__get()</span>

All requests that hit this method should be requests for callbacks

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
				$method
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The method to create a callback for
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			callback
		</dt>
		<dd>
			The callback for the method requested
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">formatTrace()</span>

Gets the backtrace to currently called exception

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			A nicely formatted backtrace to this exception
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">getCSSClass()</span>

Returns the CSS class name for printing information about the exception

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

#### <span style="color:#3e6a6e;">prepare()</span>

Prepares content for output into HTML

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The prepared content
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">printMessage()</span>

Prints the message inside of a div with the class being 'exception %THIS_EXCEPTION_CLASS_NAME%'

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

#### <span style="color:#3e6a6e;">printTrace()</span>

Prints the backtrace to currently called exception inside of a pre tag with the class being 'exception %THIS_EXCEPTION_CLASS_NAME% trace'

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

#### <span style="color:#3e6a6e;">reorderMessage()</span>

Reorders list items in the message based on simple string matching

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
				$match
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				This should be a string to match to one of the list items - whatever the order this is in the parameter list will be the order of the list item in the adjusted message
			</td>
		</tr>
					
		<tr>
			<td>
				...
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			Exception
		</dt>
		<dd>
			The exception object, to allow for method chaining
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">setMessage()</span>

Allows the message to be overwriten

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
				$new_message
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The new message for the exception
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

#### <span style="color:#3e6a6e;">splitMessage()</span>

Splits an exception with an HTML list into multiple strings each containing part of the original message

##### Details

This method should be called with two or more parameters of arrays of
string to match. If any of the provided strings are matching in a list
item in the exception message, a new copy of the message will be created
containing just the matching list items.

Here is an exception message to be split:

{{{
#!html
<p>The following problems were found:</p>
<ul>
<li>First Name: Please enter a value</li>
<li>Last Name: Please enter a value</li>
<li>Email: Please enter a value</li>
<li>Address: Please enter a value</li>
<li>City: Please enter a value</li>
<li>State: Please enter a value</li>
<li>Zip Code: Please enter a value</li>
</ul>
}}}

The following PHP would split the exception into two messages:

{{{
#!php
list ($name_exception, $address_exception) = $exception->splitMessage(
array('First Name', 'Last Name', 'Email'),
array('Address', 'City', 'State', 'Zip Code')
);
}}}

The resulting messages would be:

{{{
#!html
<p>The following problems were found:</p>
<ul>
<li>First Name: Please enter a value</li>
<li>Last Name: Please enter a value</li>
<li>Email: Please enter a value</li>
</ul>
}}}

and

{{{
#!html
<p>The following problems were found:</p>
<ul>
<li>Address: Please enter a value</li>
<li>City: Please enter a value</li>
<li>State: Please enter a value</li>
<li>Zip Code: Please enter a value</li>
</ul>
}}}

If no list items match the strings in a parameter, the result will be
an empty string, allowing for simple display:

{{{
#!php
fHTML::show($name_exception, 'error');
}}}

An empty string is returned when none of the list items matched the
strings in the parameter. If no list items are found, the first value in
the returned array will be the existing message and all other array
values will be an empty string.

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
				$list_item_matches
			</td>
			<td>
									<a href="http://www.php.net/language.types.array.php">array</a>
				
			</td>
			<td>
				An array of strings to filter the list items by, list items will be ordered in the same order as this array
			</td>
		</tr>
					
		<tr>
			<td>
				...
			</td>
			<td>
									<a href="http://www.php.net/language.types.array.php">array</a>
				
			</td>
			<td>
				
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			array
		</dt>
		<dd>
			This will contain an array of strings corresponding to the parameters passed - see method description for details
		</dd>
	
</dl>




### Inherited Methods

[`\Exception::__clone()`](http://www.php.net/class.exception.php#__clone) [`\Exception::getMessage()`](http://www.php.net/class.exception.php#getMessage) [`\Exception::getCode()`](http://www.php.net/class.exception.php#getCode) [`\Exception::getFile()`](http://www.php.net/class.exception.php#getFile) [`\Exception::getLine()`](http://www.php.net/class.exception.php#getLine) [`\Exception::getTrace()`](http://www.php.net/class.exception.php#getTrace) [`\Exception::getPrevious()`](http://www.php.net/class.exception.php#getPrevious) [`\Exception::getTraceAsString()`](http://www.php.net/class.exception.php#getTraceAsString) [`\Exception::__toString()`](http://www.php.net/class.exception.php#__toString) 



