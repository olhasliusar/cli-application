<?php

namespace Console;

use Console\Command\CommandInterface;
use Console\Input\ArgvInput;
use Console\Input\InputInterface;
use Console\Output\ConsoleOutput;
use Console\Output\OutputInterface;

/**
 * Console Application
 * @package console
 *
 * @property array $commands
 * @property string $name
 * @property string $description
 */
class Application extends Container implements CommandInterface
{
    protected $commands = [];
    protected $name;
    protected $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * Register command for console
     *
     * @param CommandInterface $command
     */
    public function addCommand(CommandInterface $command)
    {
        $this->commands[$command->getName()] = $command;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function getCommand($name)
    {
        return $this->commands[$name] ?? null;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Runs the current application.
     *
     * @param InputInterface $input An Input instance
     * @param OutputInterface $output An Output instance
     *
     * @return mixed
     * @throws \Exception
     */
    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        if (null === $input) {
            $input = new ArgvInput();
        }

        if (null === $output) {
            $output = new ConsoleOutput();
        }

        try {
            return $this->doRun($input, $output);
        } catch (\Exception $e) {
            return $output->writeln($e->getMessage());
        }
    }


    /**
     * Runs the current application.
     *
     * @param InputInterface $input An Input instance
     * @param OutputInterface $output An Output instance
     *
     * @return mixed
     * @throws \Exception
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {
        # name of command that has been run
        $commandName = $input->getFirstArgument();

        if (null === $commandName) {
            throw new \Exception('No command has been called.');
        }

        $command = $this->getCommand($commandName);

        if (null === $command) {
            throw new \Exception(sprintf('The command "%s" doesn\'t exist. Look to help to get more information.', $commandName));
        }

        return $command->run($input, $output);
    }


    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}