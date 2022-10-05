<?php
/**
 * Autocomplete provider
 * @package cli-module-generator
 * @version 0.0.1
 */

namespace CliModuleGenerator\Library;

use Mim\Library\Fs;

class Autocomplete extends \Cli\Autocomplete
{
	static function files(array $args): string{
		return '2';
	}

	static function command(array $args): string{
		$farg = $args[1] ?? null;
		$result = [
			'generator',
			'run',
			'init'
		];

		if(!$farg)
			return trim(implode(' ', $result));

		return parent::lastArg($farg, $result);
	}
}