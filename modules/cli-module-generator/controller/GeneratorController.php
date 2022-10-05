<?php
/**
 * GeneratorController
 * @package cli-module-generator
 * @version 0.0.1
 */

namespace CliModuleGenerator\Controller;

use Cli\Library\Bash;
use CliModuleGenerator\Library\Generator;

class GeneratorController extends \CliModule\Controller
{
    public function generateAction()
    {
        $moduleDir = $this->validateModuleHere();
        if( Generator::build( $moduleDir, $this->req->param->command ) ) {
            Bash::echo('Generator executed succesfully');
        }
    }
}