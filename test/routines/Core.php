<?php namespace Dotink\Lab
{
	use Dotink\Flourish\Core;
	use stdClass;

	return [
		'setup' => function($data, $shared) {
			needs($data['root'] . '/src/Core.php');
			needs($data['root'] . '/src/Exception.php');
			needs($data['root'] . '/src/UnexpectedException.php');
			needs($data['root'] . '/src/ProgrammerException.php');
		},

		'tests' => [

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