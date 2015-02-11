# Exception
## An exception that allows for easy l10n, printing, tracing and hooking.

_Copyright (c) 2007-2015 Will Bond, Matthew J. Sahagian, others_.
_Please reference the LICENSE.md file at the root of this distribution_

### Extends

[`\Exception`](http://php.net/class.exception)

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

### Inherited Properties

[`\Exception::$message`](http://php.net/class.exception#message) [`\Exception::$string`](http://php.net/class.exception#string) [`\Exception::$code`](http://php.net/class.exception#code) [`\Exception::$file`](http://php.net/class.exception#file) [`\Exception::$line`](http://php.net/class.exception#line) [`\Exception::$trace`](http://php.net/class.exception#trace) [`\Exception::$previous`](http://php.net/class.exception#previous) 

## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Sets the message for the exception, allowing for interpolation and internationalization

##### Details

The `$message` can contain any number of formatting placeholders for string and number
interpolation via `sprintf()`.  Any `%` signs that do not appear to be part of a valid
formatting placeholder will be automatically escaped with a second `%`.

The following aspects of valid `sprintf()` formatting codes are not
accepted since they are redundant and restrict the non-formatting use of
the `%` sign in exception messages:

- `% 2d`: Using a literal space as a padding character - a space will be used if no
padding character is specified
- `%'.d`: Providing a padding character but no width - no padding will be applied
without a width

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
				The message for the exception
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
					
		<tr>
			<td>
				$code
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
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




### Inherited Methods

[`\Exception::__clone()`](http://php.net/class.exception#__clone) [`\Exception::getMessage()`](http://php.net/class.exception#getMessage) [`\Exception::getCode()`](http://php.net/class.exception#getCode) [`\Exception::getFile()`](http://php.net/class.exception#getFile) [`\Exception::getLine()`](http://php.net/class.exception#getLine) [`\Exception::getTrace()`](http://php.net/class.exception#getTrace) [`\Exception::getPrevious()`](http://php.net/class.exception#getPrevious) [`\Exception::getTraceAsString()`](http://php.net/class.exception#getTraceAsString) [`\Exception::__toString()`](http://php.net/class.exception#__toString) 



