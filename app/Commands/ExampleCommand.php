<?php

namespace App\Commands;


use Console\Command\Command;
use Console\Input\InputInterface;
use Console\Output\OutputInterface;

/**
 * Class ExampleCommand
 * @package App\Commands
 */
class ExampleCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->description = 'The example command.';
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello World!');
    }
}