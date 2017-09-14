<?php

use App\Commands\ExampleCommand;
use Console\Application;
use Console\Command\HelpCommand;


$app = new Application('CLI Application', 'Simple cli application.');

$app->addCommand(new HelpCommand('help', $app));
$app->addCommand(new ExampleCommand('example'));

$app->run();
