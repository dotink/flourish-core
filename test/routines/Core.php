<?php namespace Dotink\Lab
{
	use Dotink\Flourish\Core;
	use stdClass;

	return [
		'setup' => function($data, $shared) {
			needs($data['root'] . '/src/Core.php');
			needs($data['root'] . '/src/Exception.php');
			needs($data['root'] . '/src/Exceptions/UnexpectedException.php');
			needs($data['root'] . '/src/Exceptions/Unexpected/ProgrammerException.php');
		},

		'tests' => [

			'Seed Random' => function($data, $shared)
			{
				$shared->core = new Core();

				assert('Dotink\Flourish\Core::seedRandom')
					-> equals(TRUE, EXACTLY)
					-> equals(TRUE, EXACTLY)
				;
			},


			'Check OS' => function($data, $shared) {
				assert('Dotink\Flourish\Core::checkOS')
					-> with('foobar')
					-> throws('Dotink\Flourish\ProgrammerException')
				;

				assert('Dotink\Flourish\Core::checkOS')
					-> with('linux')
					-> is(IN, [TRUE, FALSE])

					-> with('freebsd')
					-> is(IN, [TRUE, FALSE])

					-> with('netbsd')
					-> is(IN, [TRUE, FALSE])

					-> with('openbsd')
					-> is(IN, [TRUE, FALSE])

					-> with('windows')
					-> is(IN, [TRUE, FALSE])

					-> with('osx')
					-> is(IN, [TRUE, FALSE])

					-> with('solaris')
					-> is(IN, [TRUE, FALSE])

					-> with('aix')
					-> is(IN, [TRUE, FALSE])
				;
			},

			//
			//
			//

			'Dereference' => function($data, $shared) {
				$struct = [
					'bar' => 'bar',
					'foo' => [
						'bar' => 'bar'
					],
					'foobar' => [
						'foo' => [
							'bar' => 'bar'
						]
					]
				];

				assert('Dotink\Flourish\Core::dereference')
					-> with   ('bar', $struct)
					-> equals ('bar')

					-> with   ('foo[bar]', $struct)
					-> equals ('bar')

					-> with   ('foobar[foo][bar]', $struct)
					-> equals ('bar')

					-> with   ('bogus', $struct)
					-> throws ('Dotink\Flourish\ProgrammerException')
				;
			},
		]
	];
}
