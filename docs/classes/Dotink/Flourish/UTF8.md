# UTF8
## Provides string functions for UTF-8 strings

_Copyright (c) 2007-2015 Will Bond, Matthew J. Sahagian, others_.
_Please reference the LICENSE.md file at the root of this distribution_

### Details

This class is implemented to provide a UTF-8 version of almost every built-in
PHP string function.

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
#### <span style="color:#6a6e3d;">$canIgnoreInvalid</span>

Depending how things are compiled, NetBSD and Solaris don't support //IGNORE in iconv()

##### Details

If //IGNORE support is not provided strings with invalid characters will be truncated

#### <span style="color:#6a6e3d;">$lowerToUpper</span>

All lowercase UTF-8 characters mapped to uppercase characters

#### <span style="color:#6a6e3d;">$mbLowerToUpperFix</span>

Lowercase to uppercase mapping of UTF-8 characters not handled by `mb_strtoupper`

#### <span style="color:#6a6e3d;">$mbUpperToLowerFix</span>

Uppercase to lowercase mapping of UTF-8 character not handled by `mb_strtolower`

#### <span style="color:#6a6e3d;">$upperToLower</span>

All uppercase UTF-8 characters mapped to lowercase characters

#### <span style="color:#6a6e3d;">$utf8ToAscii</span>

A mapping of all ASCII-based latin characters, puntuation, etc to ASCII.

##### Details

Includes elements from the following unicode blocks:

- Latin-1 Supplement
- Latin Extended-A
- Latin Extended-B
- IPA Extensions
- Latin Extended Additional
- General Punctuation
- Letterlike symbols
- Number Forms

#### <span style="color:#6a6e3d;">$hasMbString</span>

If the `mbstring` extension is available





## Methods
### Static Methods
<hr />

#### <span style="color:#3e6a6e;">ascii()</span>

Maps UTF-8 ASCII-based latin characters, puntuation, symbols and number forms to ASCII

##### Details

Any characters or symbols that can not be translated will be removed.

This function is most useful for situation that only allows ASCII, such
as in URLs.

Translates elements from the following unicode blocks:

- Latin-1 Supplement
- Latin Extended-A
- Latin Extended-B
- IPA Extensions
- Latin Extended Additional
- General Punctuation
- Letterlike symbols
- Number Forms

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to convert
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
			The input string in pure ASCII
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">chr()</span>

Converts a unicode value into a UTF-8 character

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
				$unicode_code_point
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The char to create via `U+hex` or decimal code point
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
			The UTF-8 character
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">clean()</span>

Removes any invalid UTF-8 characters from a string or array of strings

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="3">
				$value
			</td>
			<td>
									<a href="http://php.net/language.types.array">array</a>
				
			</td>
			<td rowspan="3">
				The string or array of strings to clean
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
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
			The cleaned string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">cmp()</span>

Compares strings

##### Details

The resulting order having latin characters that are based on ASCII letters placed after
the relative ASCII characters

Please note that this function sorts based on English language sorting rules only.
Locale-sepcific sorting is done by `strcoll` however there are technical limitations.

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
				$str1
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The first string to compare
			</td>
		</tr>
					
		<tr>
			<td>
				$str2
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
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
			< 0 if $str1 < $str2, 0 if they are equal, > 0 if $str1 > $str2
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">explode()</span>

Explodes a string on a delimiter

##### Details

If no delimiter is provided, the string will be exploded with each characters being an
element in the array.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to explode
			</td>
		</tr>
					
		<tr>
			<td>
				$delimiter
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to explode on.
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
			The exploded string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">icmp()</span>

Compares strings in a case-insensitive manner

##### Details

The resulting order having characters that are based on ASCII letters placed after
the relative ASCII characters

Please note that this function sorts based on English language sorting rules only.
Locale-sepcific sorting is done by `strcoll` however there are technical limitations.

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
				$str1
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The first string to compare
			</td>
		</tr>
					
		<tr>
			<td>
				$str2
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
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
			< 0 if $str1 < $str2, 0 if they are equal, > 0 if $str1 > $str2
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">inatcmp()</span>

Compares strings using a natural order algorithm in a case-insensitive manner

##### Details

The resulting order having characters that are based on ASCII letters placed after
the relative ASCII characters

Please note that this function sorts based on English language sorting rules only.
Locale-sepcific sorting is done by `strcoll` however there are technical limitations.

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
				$str1
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The first string to compare
			</td>
		</tr>
					
		<tr>
			<td>
				$str2
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
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
			< 0 if $str1 < $str2, 0 if they are equal, > 0 if $str1 > $str2
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ipos()</span>

Finds the first position (in characters) of the search value in the string

##### Details

Case is ignored when performing a match

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
				$haystack
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search in
			</td>
		</tr>
					
		<tr>
			<td>
				$needle
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search for
			</td>
		</tr>
					
		<tr>
			<td>
				$offset
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character position to start searching from
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
			The position of the first occurence of the needle or `FALSE` if no match
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ireplace()</span>

Replaces matching parts of the string

##### Details

Matches are done in a a case-insensitive manner.

If `$search` and `$replace` are both arrays and `$replace` is shorter, the extra
`$search` string will be replaced with an empty string. If `$search` is an array and
`$replace` is a string, all `$search` values will be replaced with the string specified.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to perform the replacements on
			</td>
		</tr>
					
		<tr>
			<td>
				$search
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The string (or array of strings) to search for
			</td>
		</tr>
					
		<tr>
			<td>
				$replace
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The string (or array of strings) to replace with
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
			The input string with the specified replacements
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">irpos()</span>

Finds the last position (in characters) of the search value in the string

##### Details

Case is ignored when performing a match.

A negative `$offset` value will stop looking that many characters from the end of the
string.

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
				$haystack
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search in
			</td>
		</tr>
					
		<tr>
			<td>
				$needle
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search for.
			</td>
		</tr>
					
		<tr>
			<td>
				$offset
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character position to start searching from.
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
			The position of the last occurence of the needle or `FALSE` if no match
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">istr()</span>

Get substring from the beginning of the needle to the end of the haystack

##### Details

Can optionally return the part of the haystack before the needle. Matching is done in a
case-insensitive manner.

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
				$haystack
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search in
			</td>
		</tr>
					
		<tr>
			<td>
				$needle
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search for
			</td>
		</tr>
					
		<tr>
			<td>
				$before_needle
			</td>
			<td>
									<a href="http://php.net/language.types.boolean">boolean</a>
				
			</td>
			<td>
				Get substring before the needle instead of after
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
			The specified part of the haystack, or `FALSE` if the needle was not found
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">len()</span>

Determines the length (in characters) of a string

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to measure
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
			The number of characters in the string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">lcfirst()</span>

Converts the first character of the string to lowercase.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to process
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
			The processed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">lower()</span>

Converts all uppercase characters to lowercase

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to convert
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
			The input string with all uppercase characters in lowercase
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ltrim()</span>

Trims whitespace, or any specified characters, from the beginning of a string

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to trim
			</td>
		</tr>
					
		<tr>
			<td>
				$charlist
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The characters to trim
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
			The trimmed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">natcmp()</span>

Compares strings using a natural order algorithm

##### Details

The resulting order having latin characters that are based on ASCII letters placed after
the relative ASCII characters

Please note that this function sorts based on English language sorting rules only.
Locale-sepcific sorting is done by `strcoll` however there are technical limitations.

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
				$str1
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The first string to compare
			</td>
		</tr>
					
		<tr>
			<td>
				$str2
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
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
			< 0 if $str1 < $str2, 0 if they are equal, > 0 if $str1 > $str2
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ord()</span>

Converts a UTF-8 character to a unicode code point

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
				$character
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The character to decode
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
			The U+hex unicode code point for the character
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">pad()</span>

Pads a string to the number of characters specified

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to pad
			</td>
		</tr>
					
		<tr>
			<td>
				$pad_length
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character length to pad the string to
			</td>
		</tr>
					
		<tr>
			<td>
				$pad_string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to pad the source string with
			</td>
		</tr>
					
		<tr>
			<td>
				$pad_type
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The type of padding to do: `'left'`, `'right'`, `'both'`
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
			The input string padded to the specified character width
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">pos()</span>

Finds the first position (in characters) of the search value in the string

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
				$haystack
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search in
			</td>
		</tr>
					
		<tr>
			<td>
				$needle
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search for
			</td>
		</tr>
					
		<tr>
			<td>
				$offset
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character position to start searching from
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
			The position of the first occurence of the needle or `FALSE` if no match
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">replace()</span>

Replaces matching parts of the string

##### Details

If `$search` and `$replace` are both arrays and `$replace` is shorter, the extra
`$search` string will be replaced with an empty string. If `$search` is an array and
`$replace` is a string, all `$search` values will be replaced with the string specified.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to perform the replacements on
			</td>
		</tr>
					
		<tr>
			<td>
				$search
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The string (or array of strings) to search for
			</td>
		</tr>
					
		<tr>
			<td>
				$replace
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The string (or array of strings) to replace with
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
			The input string with the specified replacements
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">rev()</span>

Reverses a string

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to reverse
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
			The reversed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">rpos()</span>

Finds the last position (in characters) of the search value in the string

##### Details

A negative `$offset` value will stop looking that many characters from the end of the
string.

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
				$haystack
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search in
			</td>
		</tr>
					
		<tr>
			<td>
				$needle
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search for.
			</td>
		</tr>
					
		<tr>
			<td>
				$offset
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character position to start searching from.
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
			The position of the last occurence of the needle or `FALSE` if no match
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">rtrim()</span>

Trims whitespace, or any specified characters, from the end of a string

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to trim
			</td>
		</tr>
					
		<tr>
			<td>
				$charlist
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The characters to trim
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
			The trimmed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">str()</span>

Get substring from the beginning of the needle to the end of the haystack

##### Details

Can optionally return the part of the haystack before the needle. Matching is done in a
case-sensitive manner.

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
				$haystack
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search in
			</td>
		</tr>
					
		<tr>
			<td>
				$needle
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to search for
			</td>
		</tr>
					
		<tr>
			<td>
				$before_needle
			</td>
			<td>
									<a href="http://php.net/language.types.boolean">boolean</a>
				
			</td>
			<td>
				Get substring before the needle instead of after
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
			The specified part of the haystack, or `FALSE` if the needle was not found
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">sub()</span>

Extracts part of a string

##### Details

Negative values of `$start` will start the extraction that many characters from the end
of the string.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to extract from
			</td>
		</tr>
					
		<tr>
			<td>
				$start
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The zero-based starting index to extract from.
			</td>
		</tr>
					
		<tr>
			<td>
				$length
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The length of the string to extract, empty for end of line
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
			The extracted subtring or `FALSE` if the start is out of bounds
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">trim()</span>

Trims whitespace, or any specified characters, from the beginning and end of a string

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to trim
			</td>
		</tr>
					
		<tr>
			<td>
				$charlist
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The characters to trim, .. indicates a range
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
			The trimmed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ucfirst()</span>

Converts the first character of the string to uppercase.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to process
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
			The processed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ucwords()</span>

Converts the first character of every word to uppercase

##### Details

Words are considered to start at the beginning of the string, or after any whitespace
character.

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to process
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
			The processed string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">upper()</span>

Converts all lowercase characters to uppercase

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to convert
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
			The input string with all lowercase characters in uppercase
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">wordwrap()</span>

Wraps a string to a specific character width

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to wrap
			</td>
		</tr>
					
		<tr>
			<td>
				$width
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character width to wrap to
			</td>
		</tr>
					
		<tr>
			<td>
				$break
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to insert as a break
			</td>
		</tr>
					
		<tr>
			<td>
				$cut
			</td>
			<td>
									<a href="http://php.net/language.types.boolean">boolean</a>
				
			</td>
			<td>
				If words longer than the character width should be split to fit
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
			The input string with all lowercase characters in uppercase
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">checkMbString()</span>

Checks to see if the `mbstring` extension is available

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

#### <span style="color:#3e6a6e;">convertOffsetToBytes()</span>

Converts an offset in characters to an offset in bytes

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to base the offset on
			</td>
		</tr>
					
		<tr>
			<td>
				$offset
			</td>
			<td>
									<a href="http://php.net/language.types.integer">integer</a>
				
			</td>
			<td>
				The character offset to conver to bytes
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
			The converted offset
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">detect()</span>

Detects if a UTF-8 string contains any non-ASCII characters

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
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to check
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
			If the string contains any non-ASCII characters
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">iconv()</span>

This works around a bug in MAMP 1.9.4+ and PHP 5.3

##### Details

The `iconv()` function does not seem to properly assign the return value to a variable,
but does work when returning the value.

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
				$in_charset
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The incoming character encoding
			</td>
		</tr>
					
		<tr>
			<td>
				$out_charset
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The outgoing character encoding
			</td>
		</tr>
					
		<tr>
			<td>
				$string
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The string to convert
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
			The converted string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">ucwordsCallback()</span>

Handles converting a character to uppercase for ::ucwords()

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
									<a href="http://php.net/language.types.array">array</a>
				
			</td>
			<td>
				The regex match from ::ucwords()
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
			The uppercase character
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






