<?php

namespace Console\Command;

use Console\Input\InputInterface;
use Console\Output\OutputInterface;

/**
 * Class Command
 *
 * @property string $name
 * @property string $description
 * @property array $params
 */
abstract class Command implements CommandInterface
{
    protected $name;
    protected $description;
    protected $params;


    /**
     * Constructor.
     *
     * @param string|null $name The name of the command; passing null means it must be set in configure()
     * @throws \LogicException When the command name is empty
     */
    public function __construct($name = null)
    {
        if (null !== $name) {
            $this->name = $name;
        }

        $this->configure();

        if (!$this->name) {
            throw new \LogicException(sprintf('The command defined in "%s" cannot have an empty name.', get_class($this)));
        }
    }

    /**
     * Configures the current command. Could be set default name, description
     */
    protected function configure()
    {
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    abstract protected function execute(InputInterface $input, OutputInterface $output);


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
        return $this->description ?? '';
    }

    /**
     * {@inheritdoc}
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->setParams($input);
        return $this->execute($input, $output);
    }

    /**
     * @param InputInterface $input
     */
    public function setParams(InputInterface $input)
    {
        $params = $input->getArguments();

        # remove the command name
        array_shift($params);

        $this->params = $params;
    }
}