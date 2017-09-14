<?php

namespace Console\Input;


interface InputInterface
{
    /**
     * Returns the first argument from the parameters.
     *
     * @return string The value of the first argument or null
     */
    public function getFirstArgument();

    /**
     * @return array
     */
    public function getArguments(): array;

    /**
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public function getArgument(string $name);

    /**
     * @param string $name
     * @return bool
     */
    public function hasArgument(string $name): bool;
}