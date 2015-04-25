PHP Made a Little Nicer
=======

[![Build Status](https://travis-ci.org/dotink/flourish-core.svg?branch=master)](https://travis-ci.org/dotink/flourish-core)

Flourish core provides a number of helper methods including a full UTF8 class for common string
functions and a nicer exception system which allows for string interpolation as well as providing
some commonly used exception types organized by "expected" (those which are intended to be handled
for control structure and/or user facing errors) and "unexpected" (those which are true failures).

## Exceptions

- Exception
    - UnexpectedException
        - ConnectivityException
        - EnvironmentException
        - ProgrammerException
    - ExpectedException
        - ContinueException
        - NotFoundException
        - ValidationException
        - YieldException

## UTF8

The UTF8 class provides normalization and functionality for working with UTF8 strings independent
of the multibyte string extension.  It contains synonyms for most of PHP's string functions.
