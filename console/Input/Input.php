<?php

namespace Console\Input;

/**
 * Class Input
 * @package Console\Input
 *
 * @property array $arguments
 */
abstract class Input implements InputInterface
{
    protected $arguments = [];


    /**
     * {@inheritdoc}
     */
    public function getFirstArgument()
    {
        return $this->arguments[0] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * {@inheritdoc}
     */
    public function getArgument(string $name)
    {
        if (!$this->arguments[$name]) {
            throw new \Exception(sprintf('The "%s" argument does not exist.', $name));
        }

        return $this->arguments[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasArgument(string $name): bool
    {
        return isset($this->arguments[$name]);
    }
}