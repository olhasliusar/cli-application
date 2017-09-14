<?php

namespace Console\Command;


use Console\Application;
use Console\Input\InputInterface;
use Console\Output\OutputInterface;

/**
 * Class HelpCommand
 * @package Console\Commands
 *
 * @property Application $app
 */
class HelpCommand extends Command
{
    protected $app;

    /**
     * HelpCommand constructor.
     *
     * @param string $name
     * @param Application $app
     */
    public function __construct(string $name, Application $app)
    {
        $this->app = $app;

        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->description = 'The help command.';
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            $this->app->getName(),
            $this->app->getDescription(),
            '',
            'Use format:',
            'bin/console [command] [params]',
            '',
            'It\'s possible to use such commands:',
            '',
        ]);

        /** @var CommandInterface $command */
        $commands = $this->app->getCommands();
        foreach ($commands as $command) {
            printf("%10s - %s\n", $command->getName(), $command->getDescription());
        }

        $output->writeln('');

        return true;
    }


}